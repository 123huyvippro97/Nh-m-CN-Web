<?php 
	require 'application/model/home_model.php';
	require 'application/core/myController.php';
	class Home extends myController
	{
		private $_homeModel;
		function __construct()
		{
			# code...
		}
		function index()
		{
			$data = [];
			$header['title'] = "Home Page";
			$header['content'] = "This is content Home";
			$this->loadHeader($header);
			//$this->loadContent();
			$this->loadFooter();
		}
	}
	$m = isset($_GET['m'])? trim($_GET['m']) : 'index';
	$home = new Home();
	$home->$m();
?>