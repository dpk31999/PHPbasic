<?php

$title_error_404 = 'Không tìm thấy trang';

if(isset($_GET['sp']) && isset($_GET['id'])){
    $slug_post = trim(htmlspecialchars($_GET['sp']));
    $id_post = trim(htmlspecialchars($_GET['id']));

    $sql_check_post = "SELECT *FROM newspage.posts WHERE slug = '$slug_post' AND id_post = '$id_post'";
    if($db->num_rows($sql_check_post)){
        $data_post = $db->fetch_assoc($sql_check_post,1);

        $title = $data_post['title'];
        $description = $data_post['descr'];
        $keyword = $data_post['keywords'];
    }
    else{
        $title = $title_error_404;
    }
}
else if(isset($_GET['sc'])){
    $slug_cate = trim(htmlspecialchars($_GET['sc']));

    $sql_check_cate = "SELECT url, label FROM newspage.categories WHERE url='$slug_cate'";
    if($db->num_rows($sql_check_cate)){
        $data_cate = $db->fetch_assoc($sql_check_cate,1);

        $title = $data_cate['label'];
        $description = $data_web['descr'];
        $keyword = $data_web['keywords'];
    } 
    else{
        $title = $title_error_404;
    }
}
else{
    $title = $data_web['title'];
    $description = $data_web['descr'];
    $keyword = $data_web['keywords'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <!-- ... -->
 
    <link rel="stylesheet" href="<?php echo $_DOMAIN; ?>admin/bootstrap/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $_DOMAIN; ?>">Thời báo 247</a>
        </div>
 
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                         
                $sql_get_list_menu = "SELECT * FROM categories ORDER BY id_cate ASC";
                if ($db->num_rows($sql_get_list_menu)) {
                    foreach ($db->fetch_assoc($sql_get_list_menu, 0) as $data_menu) {
                        echo '<li><a href="' . $_DOMAIN . 'category/' . $data_menu['url'] . '">' . $data_menu['label'] . '</a></li>';
                    }
                }
 
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li data-toggle="modal" data-target="#boxSearch"><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
            </ul>
        </div>
    </div>
</nav>