<?php
require 'application/model/home_model.php';
class Home
{
	public function index()
	{
		require 'application/view/home/index_view.php';
	}
}

$m =$_GET['m']??'index';
$home =new Home();
$home->$m();	
?>