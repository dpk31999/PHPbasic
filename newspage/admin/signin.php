<?php

require_once 'core/init.php';

if (isset($_POST['user_signin']) && isset($_POST['pass_signin']))
{
	$user_signin = trim(htmlspecialchars(addslashes($_POST['user_signin'])));
	$pass_signin = trim(htmlspecialchars(addslashes($_POST['pass_signin'])));

	$show_alert = '<script>$("#formSignin .alert").removeClass("hidden");</script>';
	$hide_alert = '<script>$("#formSignin .alert").addClass("hidden");</script>';
	$success = '<script>$("#formSignin .alert").attr("class", "alert alert-success");</script>';

	if ($user_signin == '' || $pass_signin == '')
	{
		echo $show_alert.'Vui lòng điền đầy đủ thông tin.';
	}
	else
	{
		$sql_check_user_exist = "SELECT username FROM accounts WHERE username = '$user_signin'";
		if ($db->num_rows($sql_check_user_exist))
		{
			$pass_signin = md5($pass_signin);
			$sql_check_signin = "SELECT username, password FROM accounts WHERE username = '$user_signin' AND password = '$pass_signin'";
			if ($db->num_rows($sql_check_signin))
			{
				$sql_check_stt = "SELECT username, password, status FROM accounts WHERE username = '$user_signin' AND password = '$pass_signin' AND status = '0'";
				if ($db->num_rows($sql_check_stt))
				{
					$session->send($user_signin);
					$db->close();
					
					echo $show_alert.$success.'Đăng nhập thành công.';
					new Redirect($_DOMAIN); 
				}
				else
				{
					echo $show_alert.'Tài khoản của bạn đã bị khoá, vui lòng liên hệ quản trị viện để biết thêm thông tin chi tiết.';
				}
			}
			else
			{
				echo $show_alert.'Mật khẩu không chính xác.';
			}
		}
		else
		{
			echo $show_alert.'Tên đăng nhập không tồn tại.';
		}
	}
}
else
{
	new Redirect($_DOMAIN);
}

?>