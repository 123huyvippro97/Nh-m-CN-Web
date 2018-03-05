<?php
require 'application/model/home_model.php';
class Home
{
	public function index()
	{
		//yeu cau chay file index_view.php
		require 'application/view/home/index_view.php';
	}
}

$m =$_GET['m']??'index';
$home =new Home();
$home->$m();
?>

