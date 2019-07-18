<?php  
/**
 * 
 */
class RegisterController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		Auth::Login();
		$this->view->title = "Register - P2P Recycler";
		$this->view->pageName = "register";
		$this->view->render("register");
	}

	public function session()
	{
		$this->model->run();
	}
}
?>