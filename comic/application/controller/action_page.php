<?php 
	namespace App\Controler;
	require 'application/model/action_model.php';
	require 'application/core/My_Controller.php';
	use Application\Core\My_Controller;
	use App\Model\Action_Model;
	class Action_Control extends My_Controller
	{
		private $_actionModel;
		function __construct()
		{
			parent::__construct();
			$this->_actionModel = new Action_Model();
		}
		function action(){
			$header['title']="Find Page";
			$data=[];
			$sidebar['getUpdate'] = $this->_actionModel->getDataByUpdate_time();
			$keyword = $_GET['search'] ?? '';
			$keyword = trim($keyword);
			$data['keyword'] = $keyword;

			$page = $_GET['page'] ?? '';
			$page = (is_numeric($page) && $page >0) ? $page : 1;

			$dataLink =[
				'c' => 'action',
				'm' => 'action',
				'page'=> '{page}',
				'search' => $keyword
			];
			$links = $this->_actionModel->create_link_manga($dataLink);
			//die($links);

			$manga=$this->_actionModel->getAllDataMangaByKeyword($keyword);

			$panigate = panigation(count($manga), $page, 4,$keyword,$links);

			$data['mangas'] = $this->_actionModel->getDataMangaByPage($panigate['keyword'],$panigate['start'],$panigate['limit']);
			//$data['getdata'] = $this->_actionModel->getMaxChapter();
			//echo"<pre/>";print_r($data['getdata']);die();
			$data['panigation'] = $panigate['panigationHtml'];
			$this->loadHeader($header);
			$this->loadActionPage($data);
			$this->loadSidebarPage($sidebar);
			$this->loadFooter();
		}


		function category(){

			$header['title']="Find Page";
			$data=[];
			$sidebar['getUpdate'] = $this->_actionModel->getAllDataByUpdate_time();
			$keyword = $_GET['cat'] ?? '';
			$keyword = trim($keyword);
			$data['keyword'] = $keyword;

			$page = $_GET['page'] ?? '';
			$page = (is_numeric($page) && $page >0) ? $page : 1;
			//die($page);
			$dataLink =[
				'c' => 'action',
				'm' => 'category',
				'page'=> '{page}',
				'cat' => $keyword
			];
			$links = $this->_actionModel->create_link_manga($dataLink);
			//die($links);

			$manga=$this->_actionModel->getAllDataMangaByKeywordCategory($keyword);

			$panigate = panigation(count($manga), $page, 4,$keyword,$links);
			$data['mangas'] = $this->_actionModel->getDataMangaByCategory($panigate['keyword'],$panigate['start'],$panigate['limit']);
			//$data['getdata'] = $this->_actionModel->getMaxChapter();
			//echo"<pre/>";print_r($data['mangas']);die();
			$data['panigation'] = $panigate['panigationHtml'];
			$this->loadHeader($header);
			$this->loadActionPage($data);
			$this->loadSidebarPage($sidebar);
			$this->loadFooter();
		}


		function authors(){

			$header['title']="Find Page";
			$data=[];
			$sidebar['getUpdate'] = $this->_actionModel->getDataByUpdate_time();
			$keyword = $_GET['author'] ?? '';
			$keyword = trim($keyword);
			$data['keyword'] = $keyword;

			$page = $_GET['page'] ?? '';
			$page = (is_numeric($page) && $page >0) ? $page : 1;
			//die($page);
			$dataLink =[
				'c' => 'action',
				'm' => 'authors',
				'page'=> '{page}',
				'author' => $keyword
			];
			$links = $this->_actionModel->create_link_manga($dataLink);
			//die($links);

			$manga=$this->_actionModel->getAllDataMangaByKeywordAuthor($keyword);

			$panigate = panigation(count($manga), $page, 4,$keyword,$links);
			$data['mangas'] = $this->_actionModel->getDataMangaByAuthor($panigate['keyword'],$panigate['start'],$panigate['limit']);
			//$data['getdata'] = $this->_actionModel->getMaxChapter();
			//echo"<pre/>";print_r($data['mangas']);die();
			$data['panigation'] = $panigate['panigationHtml'];
			$this->loadHeader($header);
			$this->loadActionPage($data);
			$this->loadSidebarPage($sidebar);
			$this->loadFooter();
		}
		function handle(){

			$header['title']="Find Page";
			$data=[];
			$sidebar['getUpdate'] = $this->_actionModel->getAllDataByUpdate_time();
			$keyword = $_GET['gender'] ?? '';
			$keyword = trim($keyword);
			$data['gioitinh'] = $keyword;
			//die($keyword);
			$page = $_GET['page'] ?? '';
			$page = (is_numeric($page) && $page >0) ? $page : 1;
			//die($page);
			$dataLink =[
				'c' => 'action',
				'm' => 'handle',
				'page'=> '{page}',
				'gender' => $keyword
			];
			$links = $this->_actionModel->create_link_manga($dataLink);
			//die($links);
			if ($keyword=="Nu") {
			$manga=$this->_actionModel->getAllDataMangaByWoman();

			$panigate = panigation(count($manga), $page, 4,$keyword,$links);
			$data['mangas'] = $this->_actionModel->getDataMangaByWoman($panigate['start'],$panigate['limit']);
			//$data['getdata'] = $this->_actionModel->getMaxChapter();
			//echo"<pre/>";print_r($data['mangas']);die();
			$data['panigation'] = $panigate['panigationHtml'];
			}
			elseif($keyword=="Nam"){
				$manga=$this->_actionModel->getAllDataMangaByMan();

				$panigate = panigation(count($manga), $page, 4,$keyword,$links);
				$data['mangas'] = $this->_actionModel->getDataMangaByMan($panigate['start'],$panigate['limit']);
				//$data['getdata'] = $this->_actionModel->getMaxChapter();
				//echo"<pre/>";print_r($data['mangas']);die();
				$data['panigation'] = $panigate['panigationHtml'];
			}
			elseif($keyword=="views"){
				$manga=$this->_actionModel->getAllTopManga();

				$panigate = panigation(count($manga), $page, 4,$keyword,$links);
				$data['mangas'] = $this->_actionModel->getTopManga($panigate['start'],$panigate['limit']);
				//$data['getdata'] = $this->_actionModel->getMaxChapter();
				//echo"<pre/>";print_r($data['mangas']);die();
				$data['panigation'] = $panigate['panigationHtml'];
			}
			elseif($keyword=="mangaFull"){
				$manga=$this->_actionModel->getAllMangaFinish();

				$panigate = panigation(count($manga), $page, 4,$keyword,$links);
				$data['mangas'] = $this->_actionModel->getMangaFinish($panigate['start'],$panigate['limit']);
				//$data['getdata'] = $this->_actionModel->getMaxChapter();
				//echo"<pre/>";print_r($data['mangas']);die();
				$data['panigation'] = $panigate['panigationHtml'];
			}
			$this->loadHeader($header);
			$this->loadActionPage($data);
			$this->loadSidebarPage($sidebar);
			$this->loadFooter();
		}

	}
	$m = isset($_GET['m'])? $_GET['m'] : "action";
	$action = new Action_Control();
	//echo $m;die();
	$action->$m();

?>