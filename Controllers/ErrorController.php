<?php  
/**
 * 
 */
class ErrorController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->title = "Page not Found";
		$this->view->pageName = "error";
		$this->view->render("error", 1);
	}
}
?>