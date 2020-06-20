<?php
function set_logged($username, $level,$fullname){
    session_set('ss_user_token', array(
        'fullname' => $fullname,
        'username' => $username,
        'level' => $level
    ));
}
 
// Hàm thiết lập đăng xuất
function set_logout(){
    session_delete('ss_user_token');
}
 
// Hàm kiểm tra trạng thái người dùng đã đăng hập chưa
function is_logged(){
    $user = session_get('ss_user_token');
    return $user;
}
 
// Hàm kiểm tra có phải là admin hay không
function is_admin(){
    $user  = is_logged();
    if (!empty($user['level']) && $user['level'] == '1'){
        return true;
    }
    return false;
}

function is_supper_admin(){
    $user = is_logged();
    if (!empty($user['level']) && $user['level'] == '1' && $user['username'] == 'admin'){
        return true;
    }
    false;
}

function get_current_username(){
    $user  = is_logged();
    return isset($user['username']) ? $user['username'] : '';
}
 
// Lấy level người dùng hiện tại
function get_current_level(){
    $user  = is_logged();
    return isset($user['level']) ? $user['level'] : '';
}

function get_current_fullname(){
    $user = is_logged();
    return isset($user['fullname']) ? $user['fullname'] : '';
}