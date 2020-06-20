<div class="col-md-9 content">
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
		if ($tab == 'profile')
		{
			require_once 'templates/profile.php';
		}
		else if ($tab == 'posts')
		{
			require_once 'templates/posts.php';
		}
		else if ($tab == 'photos')
		{
			require_once 'templates/photos.php';
		}
		else if ($tab == 'categories')
		{
			require_once 'templates/categories.php';
		}
		else if ($tab == 'setting')
		{
			require_once 'templates/setting.php';
		}
		else if($tab == 'accounts')
		{
			require_once 'templates/accounts.php';
		}
	}
	else
	{
		require_once 'templates/dashboard.php';
	}

	?>
</div>