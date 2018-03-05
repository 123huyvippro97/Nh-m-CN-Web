<?php
session_start();
class Route 
{
	public function home()
	{
		require 'application/controller/home.php';
	}
}
?>