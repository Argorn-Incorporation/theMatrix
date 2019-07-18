<?php  
/**
 * 
 */
class IndexController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		Auth::Login();
		$this->view->title = "Home - P2P Recycler";
		$this->view->pageName = "index";
		$this->view->render("index");
	}
}
?>