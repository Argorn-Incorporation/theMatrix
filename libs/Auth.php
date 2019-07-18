<?php

class Auth
{
	public static function handleLogin()
	{
		@session_start();
		$logged = $_SESSION['loggedIn'] ?? false;
		if ($logged == false)
		{
			session_destroy();
			header('location: '.APP_URL.'login');
			exit;
		}

		/*Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: '. URL . 'login');
			exit;
		}*/
	}

	public static function Login()
	{
		@session_start();
		$logged = $_SESSION['loggedIn'] ?? false;
		if ($logged == true)
		{
			header('location: '.APP_URL.'dashboard');
			exit;
		}

		/*Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: '. URL . 'login');
			exit;
		}*/
	}

	public static function createCookie($cookieName='', $cookieVal='', $secure=false, $httponly=false, $cookieTime='')
	{
		if (!$cookieTime) {
			$cookieTime=time()+60*60*24*100;
		}
		setcookie($cookieName, $cookieVal, $cookieTime,"/chitchat","localhost",$secure, $httponly);
	}

}