<?php

require_once 'core/init.php';

if($user){
    if(isset($_FILES['img_avt'])){
        $dir = "../upload/";
        $name_img = stripslashes($_FILES['img_avt']['name']);
        $source_img = $_FILES['img_avt']['tmp_name'];

        $day_current = substr($date_current,8,2);
        $month_current = substr($date_current,5,2);
        $year_current = substr($date_current,0,4);

        if(!is_dir($dir.$year_current)){
            mkdir($dir.$year_current.'/');
        }

        if(!is_dir($dir.$year_current.'/'.$month_current)){
            mkdir($dir.$year_current.'/'.$month_current.'/');
        }

        if(!is_dir($dir.$year_current.'/'.$month_current.'/'.$day_current)){
            mkdir($dir.$year_current.'/'.$month_current.'/'.$day_current.'/');
        }

        $path_img = $dir.$year_current.'/'.$month_current.'/'.$day_current.'/'.$name_img;
        move_uploaded_file($source_img,$path_img);
        $url_img = substr($path_img,3);

        $sql_up_avt = "UPDATE newspage.accounts SET url_avatar = '$url_img' WHERE id_acc = '$data_user[id_acc]'";
        $db->query($sql_up_avt);
        $db->close();
        echo 'Upload thành công.';
        new Redirect($_DOMAIN .'profile');
    }
    else if(isset($_POST['action'])){
        $action = trim(addslashes(htmlspecialchars($_POST['action'])));
        if($action == 'del_avt'){
            if (file_exists('../'.$data_user['url_avatar']))
            {
                unlink('../'.$data_user['url_avatar']);
            }
            $sql_del_avt = "UPDATE newspage.accounts SET url_avatar = '' WHERE id_acc = '$data_user[id_acc]'";
            $db->query($sql_del_avt);
            echo 'Xóa ảnh thành công';
            $db->close();
        }
        else if($action == 'edit_info'){
            $dn_update = trim(htmlspecialchars(addslashes($_POST['dn_update'])));
            $email_update = trim(htmlspecialchars(addslashes($_POST['email_update'])));
            $fb_update = trim(htmlspecialchars(addslashes($_POST['fb_update'])));
            $gg_update = trim(htmlspecialchars(addslashes($_POST['gg_update'])));
            $tt_update = trim(htmlspecialchars(addslashes($_POST['tt_update'])));
            $phone_update = trim(htmlspecialchars(addslashes($_POST['phone_update'])));
            $desc_update = trim(htmlspecialchars(addslashes($_POST['desc_update'])));

            $show_alert = '<script>$("#formAddAcc .alert").removeClass("hidden");</script>';

            if($dn_update == '' && $email_update == '' && $fb_update == '' && $gg_update == '' && $tt_update == '' && $phone_update == '' && $desc_update == ''){
                echo $show_alert.'Vui lòng nhập đầy đủ thông tin';
            }
            else if(!filter_var($email_update, FILTER_VALIDATE_EMAIL)){
                echo $show_alert.'Định dạng email ko chính xác';
            }
            else if(!filter_var($fb_update, FILTER_VALIDATE_URL)){
                echo $show_alert.'Đinh dạng URL ko chính xác';
            }
            else if(!filter_var($gg_update, FILTER_VALIDATE_URL)){
                echo $show_alert.'Đinh dạng URL ko chính xác';
            }
            else if(!filter_var($tt_update, FILTER_VALIDATE_URL)){
                echo $show_alert.'Đinh dạng URL ko chính xác';
            }
            else if ($phone_update && (strlen($phone_update) < 10 || strlen($phone_update) > 11 || preg_match('/^[0-9]+$/', $phone_update) == false)) {
                echo $show_alert.strlen($phone_update) . 'Số điện thoại không hợp lệ.';
            }
            else{
                $sql_update_info = "UPDATE newspage.accounts SET
                display_name = '$dn_update',
                email = '$email_update',
                facebook = '$fb_update',
                google = '$gg_update',
                twitter = '$tt_update',
                phone = '$phone_update',
                description = '$desc_update' WHERE id_acc = '$data_user[id_acc]'
                 ";
                $db->query($sql_update_info);
                echo 'Update thành công';
                $db->close();
                new Redirect($_DOMAIN.'profile');
            }
        }
        else if($action == 'change_pass'){
            $old_pass = trim(htmlspecialchars(addslashes($_POST['old_pass'])));
            $new_pass = trim(htmlspecialchars(addslashes($_POST['new_pass'])));
            $re_new_pass = trim(htmlspecialchars(addslashes($_POST['re_new_pass'])));

            $show_alert = '<script>$("#formAddAcc .alert").removeClass("hidden");</script>';

            if($old_pass == '' && $new_pass == '' && $re_new_pass == ''){
                echo $show_alert.'Vui lòng điền đầy đủ thông tin';
            }
            else if(strlen($new_pass) < 6){
                echo $show_alert.'Mật khẩu quá ngắn';
            }
            else if($new_pass != $re_new_pass){
                echo $show_alert.'Mật khẩu xác thực không chính xác';
            }
            else{
                $old_pass = md5($old_pass);
                $new_pass = md5($new_pass);
                if($old_pass == $data_user['password']){
                    $sql_change_pass = "UPDATE newspage.accounts SET password = '$new_pass' WHERE id_acc = '$data_user[id_acc]'";
                    $db->query($sql_change_pass);
                    echo 'Thay đổi mật khẩu thành công';
                    $db->close();
                    new Redirect($_DOMAIN.'profile');
                }
                else{
                    echo $show_alert.'Mật khẩu cũ không chính xác';
                }
            }
        }
    }
}
else{
    new Redirect($_DOMAIN);
}

?>