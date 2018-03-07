<?php 
	if (file_exists('application/router/router.php')) {
		require 'application/router/router.php';
	}
	else
	{
		echo "Hệ thống đang được bảo trì";
	}

?>