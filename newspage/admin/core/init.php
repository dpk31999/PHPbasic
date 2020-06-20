<?php

require_once 'classes/DB.php';
require_once 'classes/Session.php';
require_once 'classes/Functions.php';

$db = new DB();
$db->connect();
$db->set_char('utf8');

$_DOMAIN = 'http://localhost/newspage/admin/';

date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$date_current = '';
$date_current = date("Y-m-d H:i:s");

$session = new Session();
$session->start();

if ($session->get() != '')
{
	$user = $session->get();
}
else
{
	$user = '';
}

if ($user)
{
	$sql_get_data_user = "SELECT * FROM accounts WHERE username = '$user'";
	if ($db->num_rows($sql_get_data_user))
	{
		$data_user = $db->fetch_assoc($sql_get_data_user, 1);
	}
}

?>