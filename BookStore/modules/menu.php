<?php
	if(isset($_POST['logout'])){
		unset($_SESSION['user']);
		header("Refresh:0");
	}
?>
<div class="menu">
    <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="">Sản phẩm</a></li>
        <li><a href="?quanly=dangkymoi">Đăng ký</a></li>
        <li><a href="?quanly=dangnhap">Đăng nhập</a></li>
        <li><a href="?quanly=dathang">Giỏ hàng</a></li>
        <li><a href="?quanly=tintuc">Tin tức </a></li>
        <li><a href="/BookStore/admincp/index.php">Liên hệ</a></li>
        <form action="" method="post" enctype="multipart/form-data">
        <?php
        if($user){
        echo '
        <input type="submit" name="logout" value="Đăng xuất" style="border:none;background-color:red;margin-left:210px;margin-top:7px;font-size: 20px; font-weight:bold;width: auto !important;" />
        </form>
            ';
        }
        ?>
        <li style="margin-right: 50px;margin-bottom:10px;float: right; font-size: 20px; font-weight:bold;width: auto !important;">
        <?php
            if(isset($data_user['tenkhachhang'])){
                echo $data_user['tenkhachhang'];
            }
        ?>
        </li>
    </ul>
</div>