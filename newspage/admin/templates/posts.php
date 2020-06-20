<?php

if($user){
    echo '<h3>Bài viết</h3>';
    if(isset($_GET['ac'])){
        $ac = trim(addslashes(htmlspecialchars($_GET['ac'])));
    }
    else{
        $ac = '';
    }
    
    if(isset($_GET['id'])){
        $id = trim(addslashes(htmlspecialchars($_GET['id'])));
    }
    else{
        $id = '';
    }

    if($ac != ''){
        if($ac == 'add'){
            echo 
            '
                <a href="' . $_DOMAIN . 'posts " class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                </a>
            ';

            echo
            '
                <p class="form-add-post">
                    <form method="POST" id="formAddPost" onsubmit="return false;">
                        <div class="form-group">
                            <label>Tiêu đề bài viết</label>
                            <input type="text" class="form-control title" id="title_add_post">
                        </div>
                        <div class="form-group">
                            <label>URL bài viết</label>
                            <input type="text" class="form-control slug" placeholder="Nhấp vào để tự tạo" id="slug_add_post">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                        <div class="alert alert-danger hidden"></div>
                    </form>
                </p>
            ';
        }
        else if($ac == 'edit'){
            $sql_check_id_cate = "SELECT id_post, author_id FROM posts WHERE id_post = $id";
            if($db->num_rows($sql_check_id_cate)){
                $data_post = $db->fetch_assoc($sql_check_id_cate,1);
                if($data_post['author_id'] == $data_user['id_acc'] || $data_user['position'] == '1'){
                    echo
                    '
                        <a href="' . $_DOMAIN . 'posts" class="btn btn-default">
                            <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                        </a>
                        <a class="btn btn-danger" id="del_post" data-id="' . $id . '">
                            <span class="glyphicon glyphicon-trash"></span> Xoá
                        </a> 
                    ';
                    $sql_get_data_post = "SELECT *FROM newspage.posts WHERE id_post = '$id'";
                    $data_post = $db->fetch_assoc($sql_get_data_post,1);
                    echo 
                    '
                        <p class="from-edit-post">
                            <form method="POST" id="formEditPost" data-id="'.$id.'" onsubmit = "return false;">
                                <div class="form-group">
                                <label>Trạng thái bài viết</label>
                    ';
                if($data_user['position'] == 1){
                    if($data_post['status'] == '1'){
                        echo 
                        '
                            <div class="radio">
                                <label>
                                    <input type = "radio" name = "stt_edit_post" value = "1" checked> Xuất bản
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type = "radio" name = "stt_edit_post" value = "0"> Ẩn
                                </label>
                            </div>
                        ';
                    }
                    else if($data_post['status'] == '0'){
                        echo
                        '
                            <div class="radio">
                                <label>
                                    <input type = "radio" name = "stt_edit_post" value = "1"> Xuất bản
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type = "radio" name = "stt_edit_post" value = "0" checked> Ẩn
                                </label>
                            </div>
                        ';
                    }
                }
                else{
                    echo '
                        <div class="radio">
                            <label>
                                <input type = "radio" name = "stt_edit_post" value = "0" checked> Ẩn
                            </label>
                        </div>
                    ';
                }
                    echo
                    '
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề bài viết</label>
                            <input type="text" class="form-control title" value="' . $data_post['title'] . '" id="title_edit_post">
                        </div>
                        <div class="form-group">
                            <label>Slug bài viết</label>
                            <input type="text" class="form-control slug" value="' . $data_post['slug'] . '" id="slug_edit_post">
                        </div>
                        <div class="form-group">
                            <label>Url thumbnail</label>
                            <input type="text" class="form-control" value="' . $data_post['url_thumb'] . '" id="url_thumb_edit_post">
                        </div>
                        <div class="form-group">
                            <label>Mô tả bài viết</label>
                            <textarea id="desc_edit_post" class="form-control">' . $data_post['descr'] . '</textarea>
                        </div>
                        <div class="form-group">
                            <label>Từ khoá bài viết</label>
                            <input type="text" class="form-control" value="' . $data_post['keywords'] . '" id="keywords_edit_post">
                        </div>
                        <div class="form-group cate_post_1">
                            <label>Chuyên mục</label>
                            <select class="form-control" id="cate_post">
                    ';
                    $sql_get_cate_post = "SELECT label, id_cate FROM categories";
                    if ($db->num_rows($sql_get_cate_post)) {
                        if ($data_post['cate_id'] == '0') {
                            echo '<option value="">Vui lòng chọn chuyên mục</option>';
                        }
                        foreach ($db->fetch_assoc($sql_get_cate_post, 0) as $key => $data_cate) {
                            if ($data_cate['id_cate'] == $data_post['cate_id']) {
                                echo '<option value="' . $data_cate['id_cate'] . '" selected>' . $data_cate['label'] . '</option>';
                            } else {
                                echo '<option value="' . $data_cate['id_cate'] . '">' . $data_cate['label'] . '</option>';
                            }
                        }
                    } else {
                        echo '<option value="">Chưa có chuyên mục nào</option>';
                    }
                     
                    echo '
                     
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Nội dung bài viết</label>
                                <textarea id="body_edit_post" class="form-control">' . $data_post['body'] . '</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            </div>
                            <div class="alert alert-danger hidden"></div>
                        </form>
                    </p>
                    ';

                }
                else{
                    echo '<div class="alert alert-danger">ID bài viết không thuộc quyền sở hữu của bạn.</div>';
                }
            }
            else{
                echo
                '
                    <div class="alert alert-danger">ID bài viết đã bị xoá hoặc không tồn tại.</div>
                ';  
            }
        }
    }
    else{
        echo
        '
            <a href="' . $_DOMAIN . 'posts/add" class="btn btn-default">
                <span class="glyphicon glyphicon-plus"></span> Thêm
            </a> 
            <a href="' . $_DOMAIN . 'posts" class="btn btn-default">
                <span class="glyphicon glyphicon-repeat"></span> Reload
            </a> 
            <a class="btn btn-danger" id="del_post_list">
                <span class="glyphicon glyphicon-trash"></span> Xoá
            </a> 
        ';
        if($data_user['position'] == '1'){
            $sql_get_list_post = "SELECT *FROM newspage.posts ORDER BY id_post DESC";
        }
        else{
            $sql_get_list_post = "SELECT *FROM newspage.posts WHERE author_id = '$data_user[id_acc]' ORDER BY id_post DESC";
        }
        if($db->num_rows($sql_get_list_post)){
            if(isset($_GET['page'])){
                $current_page = trim(htmlspecialchars(addslashes($_GET['page']))); 
            }
            else{
                $current_page = '0';
            }
            $limit = 10;
            $total_page = ceil($db->num_rows($sql_get_list_post) / $limit);
            $start = ($current_page - 1) * $limit;

            if($current_page > $total_page){
                new Redirect($_DOMAIN.'posts&page='.$total_page);
            }
            else if($current_page <1){
                new Redirect($_DOMAIN.'posts&page=1');
            }

            echo
            '
                <p>
                    <form method="POST" id="formSearchPost" onsubmit="return false;">
                        <div class="input-group">         
                            <input type="text" class="form-control" id="kw_search_post" placeholder="Nhập ID, tiêu đề, slug ...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    </form>
                </p>
            ';

            echo
            '
                <div class="table-responsive" id="list_post">
                    <table class="table table-striped list">
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><strong>ID</strong></td>
                            <td><strong>Tiêu đề</strong></td>
                            <td><strong>Trạng thái</strong></td>
                            <td><strong>Chuyên mục</strong></td>
                            <td><strong>Lượt xem</strong></td>
            ';

            if($data_user['position'] == '1'){
                echo '<td><strong>Tác giả</strong></td>';
            }

            echo
            '
                            <td><strong>Tools</strong></td>
                        </tr>
            ';

            if($data_user['position'] == '1'){
                $sql_get_list_post_limit = "SELECT * FROM newspage.posts ORDER BY id_post DESC LIMIT $start , $limit";
            }
            else{
                $sql_get_list_post_limit = "SELECT *FROM newspage.posts WHERE author_id = '$data_user[id_acc]' ORDER BY id_post DESC LIMIT $start, $limit ";
            }
            foreach ($db->fetch_assoc($sql_get_list_post_limit, 0) as $key => $data_post){
                if($data_post['status'] == 0){
                    $stt_post = '<label class= "label label-warning">Ẩn</label>';
                }
                else if($data_post['status'] == 1){
                    $stt_post = '<label class= "label label-success">Xuất bản</label>';
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

                $sql_get_author = "SELECT display_name FROM newspage.accounts WHERE id_acc = '$data_post[author_id]'";
                if($db->num_rows($sql_get_author)){
                    $data_author = $db->fetch_assoc($sql_get_author,1);
                    $author_post = $data_author['display_name'];
                }
                else{
                    $author_post = '<span class= "text_danger">Lỗi</span>';
                }

                echo 
                '
                    <td><input type="checkbox" name="id_post[]" value="' . $data_post['id_post'] .'"></td>
                    <td>' . $data_post['id_post'] . '</td>
                    <td style="width: 30%;"><a href="' . $_DOMAIN . 'posts/edit/' . $data_post['id_post'] . '">' . $data_post['title'] . '</a></td>
                    <td>' . $stt_post . '</td>
                    <td>' . $cate_post . '</td>
                    <td>' . $data_post['view'] . '</td>
                ';

                if($data_user['position'] == '1'){
                    echo '<td>' .$author_post. '</td>';
                }

                echo
                '
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
            echo
            '
                </table>
            ';

            echo '<div class="btn-group" id="paging_post">';

            if($current_page > 1 && $total_page >1){
                echo '<a class="btn btn-default" href="' . $_DOMAIN . 'posts&page=' . ($current_page - 1) . '"><span class="glyphicon glyphicon-chevron-left"></span> Prev</a>';
            }

            for($i = 1;$i <= $total_page; $i++){
                if($i == $current_page){
                    echo '<a class="btn btn-default active">' . $i . '</a>';
                }
                else{
                    echo '<a class="btn btn-default" href="' . $_DOMAIN . 'posts&page=' . $i . '">' . $i . '</a>';
                }
            }

            if($current_page < $total_page && $total_page > 1){
                echo '<a class="btn btn-default" href="' . $_DOMAIN . 'posts&page=' . ($current_page + 1) . '">Next <span class="glyphicon glyphicon-chevron-right"></span></a>';
            }
            echo '<br><br><br></div>';

            echo '
                </div>
            ';
        }
        else{
            echo '<br><br><div class="alert alert-info">Chưa có bài viết nào.</div>';
        }
    }
}
else{
    new Redirect($_DOMAIN);
}
?>