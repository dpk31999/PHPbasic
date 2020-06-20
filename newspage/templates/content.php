<?php

$sql_check_stt_web = "SELECT status FROM website";
$data_web = $db->fetch_assoc($sql_check_stt_web,1);
if($data_web['status'] == 0){
    require_once 'templates/404.php';
}
else{
    if(isset($_GET['sp']) && isset($_GET['id'])){
        require_once 'templates/posts.php';
    }
    else if(isset($_GET['sc'])){
        require_once 'templates/categories.php';
    }
    else if(isset($_GET['s'])){
        require_once 'templates/search.php';
    }
    else{
        require 'templates/latest-news.php';
    }
}
?>