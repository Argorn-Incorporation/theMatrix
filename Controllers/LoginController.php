<?php  
/**
 * 
 */
class LoginController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		Auth::Login();
		$this->view->title = "Log In - P2P Recycler";
		$this->view->pageName = "login";
		$this->view->render("login");
	}

	public function session()
	{
		$this->model->run();
	}
}
?>