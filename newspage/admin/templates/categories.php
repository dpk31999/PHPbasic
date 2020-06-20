<?php

if ($user)
{
	if ($data_user['position'] == 0)
	{
		echo '<div class="alert alert-danger">Bạn không có đủ quyền để vào trang này.</div>';
	}
	else if ($data_user['position'] == 1)
	{
		echo '<h3>Chuyên mục</h3>';
		if (isset($_GET['ac']))
		{
			$ac = trim(addslashes(htmlspecialchars($_GET['ac'])));
		}
		else
		{
			$ac = '';
		}

		if (isset($_GET['id']))
		{
			$id = trim(addslashes(htmlspecialchars($_GET['id'])));
		}
		else
		{
			$id = '';
		}
		if ($ac != '') 
		{
			if ($ac == 'add')
			{
				echo 
				'
					<a href="' . $_DOMAIN . 'categories" class="btn btn-default">
						<span class="glyphicon glyphicon-arrow-left"></span> Trở về
					</a> 
				';

				echo 
				'	
					<p class="form-add-cate">
						<form method="POST" id="formAddCate" onsubmit="return false;">
							<div class="form-group">
								<label>Tên chuyên mục</label>
								<input type="text" class="form-control title" id="label_add_cate">
							</div>
							<div class="form-group">
								<label>URL chuyên mục</label>
								<input type="text" class="form-control slug" placeholder="Nhấp vào để tự tạo" id="url_add_cate">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Tạo</button>
							</div>
							<div class="alert alert-danger hidden"></div>
						</form>
					</p>
				';
			} 
			else if ($ac == 'edit')
			{
				$sql_check_id_cate = "SELECT id_cate FROM categories WHERE id_cate = '$id'";
				if ($db->num_rows($sql_check_id_cate)) 
				{
					echo 
					'
						<a href="' . $_DOMAIN . 'categories" class="btn btn-default">
							<span class="glyphicon glyphicon-arrow-left"></span> Trở về
						</a> 
						<a class="btn btn-danger" id="del_cate" data-id="' . $id . '">
							<span class="glyphicon glyphicon-trash"></span> Xoá
						</a> 
					';	

					$sql_get_data_cate = "SELECT * FROM categories WHERE id_cate = '$id'";
					if ($db->num_rows($sql_get_data_cate))
					{
						$data_cate = $db->fetch_assoc($sql_get_data_cate, 1);	
					}

					echo
					'	<p class="form-edit-cate">
							<form method="POST" id="formEditCate" data-id="' . $data_cate['id_cate'] . '" onsubmit="return false;" class="form-cate">
								<div class="form-group">
									<label>Tên chuyên mục</label>
									<input type="text" class="form-control title" value="' . $data_cate['label'] . '" id="label_edit_cate">
								</div>
								<div class="form-group">
									<label>URL chuyên mục</label>
									<input type="text" class="form-control slug" value="' . $data_cate['url'] . '" id="url_edit_cate">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
								</div>
								<div class="alert alert-danger hidden"></div>
							</form>
						</p>
					';
				}
				else
				{
					echo 
					'
						<div class="alert alert-danger">ID chuyên mục đã bị xoá hoặc không tồn tại.</div>
					';
				}
			}
		}
		
		else
		{
			echo 
			'
				<a href="' . $_DOMAIN . 'categories/add" class="btn btn-default">
					<span class="glyphicon glyphicon-plus"></span> Thêm
				</a> 
				<a href="' . $_DOMAIN . 'categories" class="btn btn-default">
					<span class="glyphicon glyphicon-repeat"></span> Reload
				</a> 
				<a class="btn btn-danger" id="del_cate_list">
					<span class="glyphicon glyphicon-trash"></span> Xoá
				</a> 
			';

			$sql_get_list_cate = "SELECT * FROM categories ORDER BY id_cate DESC";
			if ($db->num_rows($sql_get_list_cate))
			{
				echo 
				'
					<br><br>
					<div class="table-responsive">
						<table class="table table-striped list" id="list_cate">
						  	<tr>
								<td><input type="checkbox"></td>
								<td><strong>ID</strong></td>
								<td><strong>Tên chuyên mục</strong></td>
								<td><strong>Tools</strong></td>
						  	</tr>
				';

				foreach ($db->fetch_assoc($sql_get_list_cate, 0) as $key => $data_cate)
				{
					echo 
					'
						<tr>
							<td><input type="checkbox" name="id_cate[]" value="' . $data_cate['id_cate'] .'"></td>
							<td>' . $data_cate['id_cate'] .'</td>
							<td><a href="' . $_DOMAIN . 'categories/edit/' . $data_cate['id_cate'] .'">' . $data_cate['label'] . '</a></td>
							<td>
								<a href="' . $_DOMAIN . 'categories/edit/' . $data_cate['id_cate'] .'" class="btn btn-primary btn-sm">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								<a class="btn btn-danger btn-sm del-cate-list" data-id="' . $data_cate['id_cate'] . '">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
							</td>
						</tr>
					';
				}

				echo 
				'
						</table>
					</div>
				';
			}
			else
			{
				echo '<br><br><div class="alert alert-info">Chưa có chuyên mục nào.</div>';
			}
		}
	}
}
else
{
	new Redirect($_DOMAIN); 
}

?>