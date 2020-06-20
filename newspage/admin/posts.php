<?php

require_once 'core/init.php';

if($user){
    if(isset($_POST['action'])){
        $action = trim(addslashes(htmlspecialchars($_POST['action'])));

        if($action == 'add_post'){
            $title_add_post = trim(addslashes(htmlspecialchars($_POST['title_add_post'])));
            $slug_add_post = trim(addslashes(htmlspecialchars($_POST['slug_add_post'])));

            $show_alert = '<script>$("#formAddPost .alert").removeClass("hidden");</script>';
            $hide_alert ='<script>$($formAddPost .alert).addClass("hidden");</script>';
            $success = '<script>$(formAddPost .alert).attr("class", "alert alert-success");</script>';

            if($title_add_post == '' || $slug_add_post == ''){
                echo $show_alert.'Vui lòng điền đầy đủ thông tin';
            }
            else{
                $sql_check_post_exist = "SELECT title, slug FROM posts WHERE title = '$title_add_post' OR slug = '$slug_add_post'";
                if($db->num_rows($sql_check_post_exist)){
                    echo $show_alert.'Bài viết có tiêu đề  hoặc slug đã tồn tại ';
                }
                else{
                    $sql_add_post = "INSERT INTO newspage.posts(title,descr,url_thumb,slug,keywords,body,cate_id,author_id,status,view,date_posted) VALUES (
                        '$title_add_post',
                        '',
                        '',
                        '$slug_add_post',
                        '',
                        '',
                        '0',
                        '$data_user[id_acc]',
                        '0',
                        '0',
                        '$date_current'
                    )";
                    $db->query($sql_add_post);
                    echo $show_alert.$success.'Thêm bài viết thành công.';
                    $db->close();
                    new Redirect($_DOMAIN.'posts&page=1');
                }
            }
        }
        else if ($action == 'edit_post')
        {
            
            $id_post = trim(htmlspecialchars(addslashes($_POST['id_post'])));
            $stt_edit_post = trim(htmlspecialchars(addslashes($_POST['stt_edit_post'])));
            $title_edit_post = trim(htmlspecialchars(addslashes($_POST['title_edit_post'])));
            $slug_edit_post = trim(htmlspecialchars(addslashes($_POST['slug_edit_post'])));
            $url_thumb_edit_post = trim(htmlspecialchars(addslashes($_POST['url_thumb_edit_post'])));
            $desc_edit_post = trim(htmlspecialchars(addslashes($_POST['desc_edit_post'])));
            $keywords_edit_post = trim(htmlspecialchars(addslashes($_POST['keywords_edit_post'])));
            $cate_edit_post = trim(htmlspecialchars(addslashes($_POST['cate_edit_post'])));
            $body_edit_post = trim(htmlspecialchars(addslashes($_POST['body_edit_post'])));
         
            $show_alert = '<script>$("#formEditPost .alert").removeClass("hidden");</script>';
            $hide_alert = '<script>$("#formEditPost .alert").addClass("hidden");</script>';
            $success = '<script>$("#formEditPost .alert").attr("class", "alert alert-success");</script>';
         
            $sql_check_id_post = "SELECT id_post FROM posts WHERE id_post = '$id_post'";
         
            if ($stt_edit_post == '' || $title_edit_post == '' || $slug_edit_post == '' || $cate_edit_post == '' || $body_edit_post == '') 
            {
                echo $show_alert.'Vui lòng điền đầy đủ thông tin.';
            } 
            else if (!$db->num_rows($sql_check_id_post))
            {
                echo $show_alert.'Đã có lỗi xảy ra, vui lòng thử lại.';
            }
            else if ($url_thumb_edit_post != '' && filter_var($url_thumb_edit_post, FILTER_VALIDATE_URL) === false)
            {
                echo $show_alert.'Vui lòng nhập url thumbnail hợp lệ.';
            }
            else
            {
                $sql_edit_post = "UPDATE newspage.posts SET
                    status = '$stt_edit_post',
                    title = '$title_edit_post',
                    slug = '$slug_edit_post',
                    url_thumb = '$url_thumb_edit_post',
                    descr = '$desc_edit_post',
                    keywords = '$keywords_edit_post',
                    cate_id = '$cate_edit_post',
                    body = '$body_edit_post'
                    WHERE id_post = '$id_post';
                ";
                $db->query($sql_edit_post);
                $db->close();
                echo $show_alert.$success.'Chỉnh sửa bài viết thành công.';
                new Redirect($_DOMAIN.'posts');
            }
        }
        else if ($action == 'search_post')
        {
            $kw_search_post = trim(htmlspecialchars(addslashes($_POST['kw_search_post'])));
         
            if ($kw_search_post != '')
            {
                $sql_search_post = "SELECT * FROM newspage.posts WHERE 
                    id_post LIKE '%$kw_search_post%' OR
                    title LIKE '%$kw_search_post%' OR
                    slug LIKE '%$kw_search_post%'
                    ORDER BY id_post DESC
                ";
         
                
                if ($db->num_rows($sql_search_post)) 
                {
                    echo
                    '
                        <table class="table table-striped list">
                            <tr>
                                <td><input type="checkbox"></td>
                                <td><strong>ID</strong></td>
                                <td><strong>Tiêu đề</strong></td>
                                <td><strong>Trạng thái</strong></td>
                                <td><strong>Chuyên mục</strong></td>
                                <td><strong>Lượt xem</strong></td>
                    ';
         
                    
                    if ($data_user['position'] == '1') {
                        echo '<td><strong>Tác giả</strong></td>';
                    }
         
                    echo '
                                    <td><strong>Tools</strong></td>
                                </tr>
                    ';
         
                   
                    foreach ($db->fetch_assoc($sql_search_post, 0) as $key => $data_post) 
                    {
                        
                        if ($data_post['status'] == 0) {
                            $stt_post = '<label class="label label-warning">Ẩn</label>';
                        } else if ($data_post['status'] == 1) {
                            $stt_post = '<label class="label label-success">Xuấn bản</label>';
                        }
                                 
                        $cate_post = '';
                        $sql_check_id_cate = "SELECT label,id_cate FROM newspage.categories WHERE id_cate = '$data_post[cate_id]'";
                        if($db->num_rows($sql_check_id_cate)){
                            $data_cate = $db->fetch_assoc($sql_check_id_cate, 1);
                            $cate_post = $data_cate['label'];
                        }
                        else{
                            $cate_post .= '<span class="text-danger">Chưa có chuyên mục</span>';
                        }
                        
                        $sql_get_author = "SELECT display_name FROM accounts WHERE id_acc = '$data_post[author_id]'";
                        if ($db->num_rows($sql_get_author)) {
                            $data_author = $db->fetch_assoc($sql_get_author, 1);
                            $author_post = $data_author['display_name'];
                        } else {
                            $author_post = '<span class="text-danger">Lỗi</span>';
                        }
         
                        echo
                        '
                            <tr>
                                <td><input type="checkbox" name="id_post[]" value="' . $data_post['id_post'] .'"></td>
                                <td>' . $data_post['id_post'] . '</td>
                                <td style="width: 30%;"><a href="' . $_DOMAIN . 'posts/edit/' . $data_post['id_post'] . '">' . $data_post['title'] . '</a></td>
                                <td>' . $stt_post . '</td>
                                <td>' . $cate_post . '</td>
                                <td>' . $data_post['view'] . '</td>
                        ';
         
                        if ($data_user['position'] == '1') {
                            echo '<td>' . $author_post . '</td>';
                        }
         
                        echo '
                                <td>
                                    <a href="' . $_DOMAIN . 'posts/edit/' . $data_post['id_post'] .'" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a class="btn btn-danger btn-sm del-post-list" data-id="' . $data_post['id_post'] . '">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        ';
                    }
                    echo '</table>';
                } 
                else
                {
                    echo '<div class="alert alert-info">Không tìm thấy kết quả nào cho từ khoá <strong>' . $kw_search_post . '</strong>.</div>';
                }
            }
        }
        else if ($action == 'delete_post_list')
        {
            foreach ($_POST['id_post'] as $key => $id_post)
            {
                $sql_check_id_post_exist = "SELECT id_post FROM posts WHERE id_post = '$id_post'";
                if ($db->num_rows($sql_check_id_post_exist))
                {
                    $sql_delete_post = "DELETE FROM posts WHERE id_post = '$id_post'";
                    $db->query($sql_delete_post);
                }
            }   
            $db->close();
        }
        else if ($action == 'delete_post')
        {   
            echo 'dsadas';
            $id_post = trim(htmlspecialchars(addslashes($_POST['id_post'])));
            $sql_check_id_post_exist = "SELECT id_post FROM posts WHERE id_post = '$id_post'";
            if ($db->num_rows($sql_check_id_post_exist))
            {
                $sql_delete_post = "DELETE FROM posts WHERE id_post = '$id_post'";
                $db->query($sql_delete_post);
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