<?php  
/**
 * 
 */
class View
{

	function __construct()
	{
		//echo "This is the view";
	}

	public function render($name, $noinclude=0, $loggedIn = false)
	{
		if ($noinclude==1) {
			require VIEWS.$name.".view.php";
		}
		elseif ($noinclude==2 && $loggedIn) {
			require VIEWS."addons/logged_in_header.php";
			require VIEWS."addons/sidebar.php";
			require VIEWS.$name.".view.php";
			require VIEWS."addons/logged_in_footer.php";
		}
		else {
			require VIEWS."addons/header.php";
			require VIEWS.$name.".view.php";
			require VIEWS."addons/footer.php";
		}
	}
}
?>