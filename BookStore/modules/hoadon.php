<h1 style="text-align: center; border: none ">Hóa Đơn Bán Hàng</h1>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <p>Tên khách hàng: <?php echo $data_user['tenkhachhang']  ?></p>
            <p>Số điện thoại: <?php echo $data_user['dienthoai']  ?></p>
            <p>Địa chỉ nhận hàng: <?php echo $data_user['diachinhan']  ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <p>Ngày đặt hàng: 
            <?php 
            date_default_timezone_set("Asia/Bangkok");
            echo date("d/m/Y");
            ?></p>
            <p>
            Thời gian đặt hàng:
            <?php
            echo date("H:i:sa")
            ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <h4>Sản phẩm đã đặt</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
        <?php
        echo '<div class="box_giohang">';
        echo '  <table width="100%" border="1" style="border-collapse:collapse; margin:5px; text-align:center;">';
        
        echo'  <tr>';
        echo '<td>Số thứ tự</td>';
        echo'<td>Tên SP</td>';
        echo'<td>Giá sp</td>';
        echo'<td>SL</td>';
        echo'<td>Tổng tiền</td>';
        echo'</tr>';
        $thanhtien=0;
        $x = 1;
        foreach($_SESSION['product'] as $cart_item){
                $id=$cart_item['id'];
                $stt = count($_SESSION['product']);
                $sql="select * from sanpham where idsanpham='$id'";
                $row=mysqli_query($conn,$sql);
                $dong=mysqli_fetch_array($row);
                echo'<tr>';    
                echo '<td>'.$x.'</td>';
                echo'<td>'.$dong['tensp'].'</td>';
                echo'<td>'.number_format($dong['giadexuat']).'</td>';
                echo'<td>'.$cart_item['soluong'].'</td>';
                $soluong = $dong['soluong'] - $cart_item['soluong'];
                $update_soluong = "update sanpham set soluong = '$soluong' where idsanpham = '$id'";
                mysqli_query($conn,$update_soluong);
                $tongtien=0;
                $tongtien=$cart_item['soluong']*$cart_item['gia'];
                $thanhtien=($thanhtien + $tongtien);
                echo'<td>'.number_format($tongtien).'</td>';
                echo'</tr>';
                echo '<tr>';
                echo'</tr>';
                $x++;
          }
          echo 
            '<tr>
                <td colspan="4"></td>	
				<td >Thành tiền : '.number_format($thanhtien).'VNĐ'.'</td>
            </tr>
            ';
            unset($_SESSION['product']);
            
        ?>
        </div>
    </div>
</div>