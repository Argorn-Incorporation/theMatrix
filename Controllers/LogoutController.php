<?php  
/**
 * 
 */
class LogoutController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		session_start();
		session_destroy();
		header("Location: ".APP_URL."login");
	}
}
?>