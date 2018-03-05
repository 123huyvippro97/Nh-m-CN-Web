<?php
class Route 
{
	public function home()
	{
		require 'application/controller/home.php';
	}
}
$c =isset($_GET['c'])?trim($_GET['c']):'home';
$controller = new Route();
$controller->$c();	
?>