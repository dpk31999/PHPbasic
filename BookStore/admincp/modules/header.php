<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<link rel="stylesheet" type="text/css" href="style/css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
   
<title>Trang quản lý website</title>

</head>
<?php
	if(!$_SESSION['dangnhap']){
		header('location:login.php');
	}
?>
<body>
	<div class="wrapper">
