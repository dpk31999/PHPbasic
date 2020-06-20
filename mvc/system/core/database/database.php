<?php

require_once(PATH_SYSTEM.'/config/config.php');

$conn = null;

function db_connect(){
    global $conn;
    if(!$conn){
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
        or die('Cant connect DB');
        mysqli_set_charset($conn,'UTF-8');
    }
}

function db_close(){
    global $conn;
    if($conn){
        mysqli_close($conn);
    }
}

function excute_query($sql){
    db_connect();
    global $conn;
    mysqli_query($conn,$sql);
}

function num_rows($sql){
    db_connect();
    global $conn;
    $reusult = mysqli_query($conn,$sql);
    $row = array();
    if(mysqli_num_rows($reusult) > 0){
        $row = mysqli_fetch_assoc($reusult);
    }
    return $row;
}

function db_get_list($sql){
    db_connect();
    global $conn;
    $data  = array();
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    return $data;
}