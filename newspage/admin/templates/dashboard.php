
<h3>Bài viết</h3>
<div class="row">
<?php
    if($data_user['position'] == '1'){
        $sql_get_count_all_post = "SELECT id_post FROM newspage.posts";
        $count_all_post = $db->num_rows($sql_get_count_all_post);

            echo '
                <div class="col-md-4">
                    <div class="alert alert-info">
                        <h1>'.$count_all_post.'</h1>
                        <p>Tổng bài viết</p>
                    </div>
                </div>
            ';
        }
        else{
            $sql_get_count_post_author = "SELECT id_post FROM newspage.posts WHERE author_id = '$data_user[id_acc]'";
            $count_post_author = $db->num_rows($sql_get_count_post_author);
            
            echo '
                <div class="col-md-4">
                    <div class="alert alert-info">
                        <h1>'.$count_post_author.'</h1>
                        <p>Bài viết của bạn</p>
                    </div>
                </div>
            ';
        }
?>
    <div class="col-md-4">
        <div class="alert alert-info">
            <h1>
                <?php

                if($data_user['position'] == '1'){
                    $sql_get_count_post_public = "SELECT id_post FROM newspage.posts WHERE status = '1'";
                }
                else{
                    $sql_get_count_post_public = "SELECT id_post FROM newspage.posts WHERE status = '1' AND author_id = '$data_user[id_acc]'";
                }
                echo $db->num_rows($sql_get_count_post_public);

                ?>
            </h1>
            <p>Bài viết xuất bản</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-warning">
            <h1>
                <?php

                if($data_user['position'] == '1'){
                    $sql_get_count_post_private = "SELECT id_post FROM newspage.posts WHERE status = '0'";
                }
                else{
                    $sql_get_count_post_private = "SELECT id_post FROM newspage.posts WHERE status = '0' AND author_id = '$data_user[id_acc]'";
                }
                echo $db->num_rows($sql_get_count_post_private);

                ?>
            </h1>
            <p>Bài viết bị ẩn</p>
        </div>
    </div>
</div>

<h3>Hình ảnh</h3>
<div class="row">
    <div class="col-md-4">
        <div class="alert alert-info">
            <h1>
                <?php
                    if($data_user['position'] == '1'){
                        $sql_get_all_img = "SELECT id_img FROM newspage.images";
                        echo $db->num_rows($sql_get_all_img);
                    }
                    else{
                        $sql_get_img_author = "SELECT id_img FROM newspage.images WHERE uploader_id = '$data_user[id_acc]' ";
                        echo $db->num_rows($sql_get_img_author);
                    }
                ?>
            </h1>
            <p>Tổng hình ảnh</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-info">
            <h1>
                <?php
                    if($data_user['position'] == '1'){
                        $sql_get_size_img = "SELECT size FROM newspage.images";
                    }
                    else{
                        $sql_get_size_img = "SELECT size FROM newspage.images WHERE uploader_id = '$data_user[id_acc]'";
                    }
                    
                    if ($db->num_rows($sql_get_size_img)) {
                        $count_size_img = 0;
                        foreach ($db->fetch_assoc($sql_get_size_img, 0) as $data_img) {
                        $count_size_img = $count_size_img + $data_img['size'];
                        }
                    } else {
                        $count_size_img = 0 . ' B';
                    }
                    
                    // Gán đơn vị cho dung lượng
                    if ($count_size_img < 1024) {
                        $count_size_img = $count_size_img . ' B';
                    } else if ($count_size_img < 1048576) {
                        $count_size_img = round($count_size_img / 1024) . ' KB';
                    } else if ($count_size_img < 1073741824) {
                        $count_size_img = round($count_size_img / 1024 / 1024) . ' MB';
                    } else if ($count_size_img < 1099511627776) {
                        $count_size_img = round($count_size_img / 1024 / 1024 / 1024) . ' GB';
                    }
                    echo $count_size_img;
                ?>
            </h1>
            <p>Dung lượng hình ảnh</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-warning">
            <h1>
                <?php
                    $count_img_error = 0;
                    if($data_user['position'] == '1'){
                        $sql_get_count_img_error = "SELECT url FROM newspage.images";
                    }
                    else{
                        $sql_get_count_img_error = "SELECT url FROM newspage.images WHERE uploader_id = '$data_user[id_acc]' ";
                    }
                    if($db->num_rows($sql_get_count_img_error)){
                        foreach($db->fetch_assoc($sql_get_count_img_error,0) as $key => $data_img){
                            if(!file_exists('../'.$data_img['url'])){
                                $count_img_error++;
                            }
                        }
                    }
                    echo $count_img_error;
                ?>
            </h1>
            <p>Ảnh bị lỗi</p>
        </div>
    </div>
</div>
<h3>Chuyên mục</h3>
<div class="row">
    <div class="col-md-3">
        <div class="alert alert-info">
            <h1>
                <?php
                    $sql_get_num_cate = "SELECT id_cate FROM newspage.categories";
                    echo $db->num_rows($sql_get_num_cate);
                ?>
            </h1>
            <p>Số chuyên mục</p>
        </div>
    </div>  
</div>
<h3>Tài khoản</h3>
<div class="row">
    <div class="col-md-4">
        <div class="alert alert-info">
            <h1>
                <?php
                    $sql_get_account = "SELECT id_acc FROM newspage.accounts";
                    echo $db->num_rows($sql_get_account);
                ?>
            </h1>
            <p>Số tài khoản</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-info">
            <h1>
                <?php
                    $sql_get_account = "SELECT id_acc FROM newspage.accounts WHERE status='0'";
                    echo $db->num_rows($sql_get_account);
                ?>
            </h1>
            <p>Tài khoản hoạt động</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-warning">
            <h1>
                <?php
                    $sql_get_account = "SELECT id_acc FROM newspage.accounts WHERE status='1'";
                    echo $db->num_rows($sql_get_account);
                ?>
            </h1>
            <p>Tài khoản bị khóa</p>
        </div>
    </div>
</div>