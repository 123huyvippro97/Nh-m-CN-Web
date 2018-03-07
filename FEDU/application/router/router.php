<?php 

	class Router
	{
		
		function __construct()
		{
			
		}
		function home()
		{
			require 'application/controller/home.php';
		}
	}
	$c = isset($_GET['c']) ? trim($_GET['c']): 'home';
	// echo "string ++".$c;
	$controller = new Router();
	$controller->$c();
?>