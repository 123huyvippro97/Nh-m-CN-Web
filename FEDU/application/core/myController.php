<?php 

	/**
	* 
	*/
	class myController
	{	
		protected $module;
		function __construct()
		{
			$module = $_GET['c'] ?? '';
		}
		protected function loadHeader($header = [])
		{
			$title 		= $header['title'] ?? '';
			$content 	= $header['content'] ?? '';
			$tabheader  = $this->module;
			//$arrTab		= explode("\\",$tabHeader);
			require 'application/view/partials/header.php';
		}
		protected function loadContent()
		{
			require 'application/view/partials/content.php';
		}
		protected function loadFooter()
		{
			require 'application/view/partials/footer.php';
		}
	}

?>