	<!-- Liên kết thư viện jQuery Form -->
	<script src="<?php echo $_DOMAIN; ?>js/jquery.form.min.js"></script>	

	<!-- Liên kết thư viện hàm xử lý form -->
	<script src="<?php echo $_DOMAIN; ?>js/form.js"></script>

	<script src="<?php echo $_DOMAIN; ?>ckeditor/ckeditor.js"></script>	
	<?php


	if (isset($_GET['tab']))
	{
		$tab = trim(addslashes(htmlspecialchars($_GET['tab'])));
	}
	else
	{
		$tab = '';
	}

	if ($tab != '')
	{
		echo '<script>$(".sidebar ul a:eq(1)").removeClass("active");</script>';
		if ($tab == 'profile')
		{
			echo '<script>$(".sidebar ul a:eq(2)").addClass("active");</script>';
		}
		else if ($tab == 'posts')
		{
			echo '<script>$(".sidebar ul a:eq(3)").addClass("active");</script>
				<script>
					config = {};
					config.entities_latin = false;
					config.language = "vi";
					CKEDITOR.replace("body_edit_post", config);
				</script>
			';
			
		}
		else if ($tab == 'photos')
		{
			echo '<script>$(".sidebar ul a:eq(4)").addClass("active");</script>';
		}
		else if($tab == 'accounts')
		{
			echo '<script>$(".sidebar ul a:eq(5)").addClass("active");</script>';
		}
		else if ($tab == 'categories')
		{
			echo '<script>$(".sidebar ul a:eq(6)").addClass("active");</script>';
		}
		else if ($tab == 'setting')
		{
			echo '<script>$(".sidebar ul a:eq(7)").addClass("active");</script>';
		}
	}

	?>
</body>
</html>