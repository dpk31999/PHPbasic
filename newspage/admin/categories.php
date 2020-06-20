<?php

require_once 'core/init.php';

if ($user) 
{
	
	if (isset($_POST['action']))
	{
		
		$action = trim(addslashes(htmlspecialchars($_POST['action'])));

		
		if ($action == 'add_cate')
		{
			
			$label_add_cate = trim(addslashes(htmlspecialchars($_POST['label_add_cate'])));
			$url_add_cate = trim(addslashes(htmlspecialchars($_POST['url_add_cate'])));
		
			$show_alert = '<script>$("#formAddCate .alert").removeClass("hidden");</script>';
			$hide_alert = '<script>$("#formAddCate .alert").addClass("hidden");</script>';
			$success = '<script>$("#formAddCate .alert").attr("class", "alert alert-success");</script>';

			
			if ($label_add_cate == '' || $url_add_cate == '')
			{
				echo $show_alert.'Vui lòng điền đầy đủ thông tin';
			}
			
			else
			{
				$sql_add_cate = "INSERT INTO newspage.categories(label,url,date_created) VALUES (
					'$label_add_cate',
					'$url_add_cate',
					'$date_current'
				)";
				$db->query($sql_add_cate);
				echo $show_alert.$success.'Tạo chuyên mục thành công.';
				$db->close(); 
				new Redirect($_DOMAIN.'categories'); 
			}
		}
		else if ($action == 'edit_cate') 
		{
			
			$label_edit_cate = trim(addslashes(htmlspecialchars($_POST['label_edit_cate'])));
			$url_edit_cate = trim(addslashes(htmlspecialchars($_POST['url_edit_cate'])));
			$id_edit_cate = trim(addslashes(htmlspecialchars($_POST['id_edit_cate'])));

			
			$show_alert = '<script>$("#formEditCate .alert").removeClass("hidden");</script>';
			$hide_alert = '<script>$("#formEditCate .alert").addClass("hidden");</script>';
			$success = '<script>$("#formEditCate .alert").attr("class", "alert alert-success");</script>';

			
			if ($label_edit_cate == '' || $url_edit_cate == '')
			{
				echo $show_alert.'Vui lòng điền đầy đủ thông tin';
			}
			
			else
			{
				$sql_edit_cate = "UPDATE categories SET 
					label = '$label_edit_cate',
					url = '$url_edit_cate'
					WHERE id_cate = '$id_edit_cate'
				";
				$db->query($sql_edit_cate);
				echo $show_alert.$success.'Sửa chuyên mục thành công.';
				$db->close(); 
				new Redirect($_DOMAIN.'categories'); 
				
			}
		}
		
		else if ($action == 'delete_cate_list')
		{
			foreach ($_POST['id_cate'] as $key => $id_cate)
			{
				$sql_check_id_cate_exist = "SELECT id_cate FROM categories WHERE id_cate = '$id_cate'";
				if ($db->num_rows($sql_check_id_cate_exist))
				{
					$sql_delete_cate = "DELETE FROM categories WHERE id_cate = '$id_cate'";
					$db->query($sql_delete_cate);
				}
			}	
			$db->close();
		}
		
		else if ($action == 'delete_cate')
		{		
			$id_cate = trim(htmlspecialchars(addslashes($_POST['id_cate'])));
			$sql_check_id_cate_exist = "SELECT id_cate FROM categories WHERE id_cate = '$id_cate'";
			if ($db->num_rows($sql_check_id_cate_exist))
			{
				$sql_delete_cate = "DELETE FROM categories WHERE id_cate = '$id_cate'";
				$db->query($sql_delete_cate);
				$db->close();
			}		
		}
	}
	
	else
	{
		new Redirect($_DOMAIN);
	}
}
// Nếu không đăng nhập
else
{
	new Redirect($_DOMAIN);
}

?>