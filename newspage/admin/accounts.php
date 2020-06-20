<?php

require_once 'core/init.php';

if($user){
    if(isset($_POST['action'])){
        $action = trim(addslashes(htmlspecialchars($_POST['action'])));
        if($action == 'add_acc'){
            $un_add_acc = trim(htmlspecialchars(addslashes($_POST['un_add_acc'])));
            $pw_add_acc = trim(htmlspecialchars(addslashes($_POST['pw_add_acc'])));
            $repw_add_acc = trim(htmlspecialchars(addslashes($_POST['repw_add_acc'])));

            $show_alert = '<script>$("#formAddAcc .alert").removeClass("hidden");</script>';
            $hide_alert = '<script>$("#formAddAcc .alert").addClass("hidden");</script>';
            $success = '<script>$("#formAddAcc .alert").attr("class", "alert alert-success");</script>';

            $sql_check_un_exist = "SELECT username FROM newspage.accounts WHERE username ='$un_add_acc' ";
            if($db->num_rows($sql_check_un_exist)){
                echo $show_alert.'Tên đăng nhập đã tồn tại';
            }
            else if(strlen($un_add_acc) < 6 || strlen($un_add_acc) >32){
                echo $show_alert.'Tên đăng nhập phải dài hơn 6 kí tự và ít hơn 32 kí tự';
            }
            else if(preg_match('/\W/', $un_add_acc)){
                echo $show_alert.'Tên đăng nhập không được chứ kí tự đặc biệt và khoảng trắng';
            }
            else if(strlen($pw_add_acc) < 6){
                echo $show_alert.'Mật khẩu quá ngắn.';
            }
            else if ($pw_add_acc != $repw_add_acc) {
                echo $show_alert.'Mật khẩu nhập lại không khớp.';
            }
            else{
                $pw_add_acc = md5($pw_add_acc);
                $sql_add_acc = "INSERT INTO newspage.accounts(username,password,display_name,email,position,status,date_created,facebook,google,twitter,phone,description,url_avatar) VALUES (
                    '$un_add_acc',
                    '$pw_add_acc',
                    '',
                    '',
                    '0',
                    '0',
                    '$date_current',
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                ) ";
                $db->query($sql_add_acc);
                $db->close();

                echo $show_alert.'Tạo tài khoản thành công!';
                new Redirect($_DOMAIN.'accounts');
            }
        }
        
        else if($action == 'lock_acc_list'){
            foreach($_POST['id_acc'] as $key => $id_acc){
                $sql_check_id_acc_exist = "SELECT id_acc FROM newspage.accounts WHERE id_acc = '$id_acc'";
                if($db->num_rows($sql_check_id_acc_exist)){
                    $sql_lock_acc_list = "UPDATE newspage.accounts SET status = '1' WHERE id_acc = '$id_acc'";
                    $db->query($sql_lock_acc_list);
                }
            }
            $db->close();
        }

        else if($action == 'lock_acc'){
            $id_acc = trim(htmlspecialchars(addslashes($_POST['id_acc'])));
            $sql_check_id_acc_exist = "SELECT id_acc FROM newspage.accounts WHERE id_acc = '$id_acc'";
            if($db->num_rows($sql_check_id_acc_exist)){
                $sql_lock_acc = "UPDATE newspage.accounts SET status = '1' WHERE id_acc ='$id_acc'";
                $db->query($sql_lock_acc);
                $db->close();
            }
        }

        else if($action == 'unlock_acc'){
            $id_acc = trim(htmlspecialchars(addslashes($_POST['id_acc'])));
            $sql_check_id_acc_exist = "SELECT id_acc FROM newspage.accounts WHERE id_acc = '$id_acc'";
            if($db->num_rows($sql_check_id_acc_exist)){
                $sql_unlock_acc = "UPDATE newspage.accounts SET status = '0' WHERE id_acc = '$id_acc'";
                $db->query($sql_unlock_acc);
                $db->close();
            }
        }

        else if($action == 'unlock_acc_list'){
            foreach($_POST['id_acc'] as $key => $id_acc){
                $sql_check_id_acc_exist = "SELECT id_acc FROM newspage.accounts WHERE id_acc = '$id_acc'";
                if($db->num_rows($sql_check_id_acc_exist)){
                    $sql_unlock_acc_list = "UPDATE newspage.accounts SET status  ='0' WHERE id_acc = '$id_acc'";
                    $db->query($sql_unlock_acc_list);
                }
            }
            $db->close();
        }
        else if($action == 'del_acc_list'){
            foreach($_POST['id_acc'] as $key => $id_acc){
                $sql_check_id_acc_exist = "SELECT id_acc FROM newspage.accounts WHERE id_acc = '$id_acc'";
                if($db->num_rows($sql_check_id_acc_exist)){
                    $sql_del_acc_list = "DELETE FROM newspage.accounts WHERE id_acc = '$id_acc'";
                    $db->query($sql_del_acc_list);
                }
            }
            $db->close();
        }
        else if($action == 'del_acc'){
            $id_acc = trim(htmlspecialchars(addslashes($_POST['id_acc'])));
            $sql_check_id_acc_exist = "SELECT id_acc FROM newspage.accounts WHERE id_acc = '$id_acc'";
            if($db->num_rows($sql_check_id_acc_exist)){
                $sql_del_acc = "DELETE FROM newspage.accounts WHERE id_acc = '$id_acc'";
                $db->query($sql_del_acc);
                $db->close();
            }
        }
    }
    else{
        new Redirect($_DOMAIN);
    }
}
else{
    new Redirect($_DOMAIN);
}

?>