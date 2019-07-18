<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$uname = trim($_POST['uname']) ?? null;
		$pswd = Hash::create('sha256', $_POST['pswd'], HASH_PASSWORD_KEY) ?? null;
		$rememberMe = $_POST['rememberMe'] ?? false;

		$this->db->query("SELECT * FROM users WHERE 
				username = :user AND pswd = :pswd");
		$this->db->bind(':user', $uname);
		$this->db->bind(':pswd', $pswd);

		$res = $this->db->single();
		$count = $this->db->rowCount();
		$uname = $res['userid'];

		if ($count > 0) {
			// login
			Session::init();
			Session::set('loggedIn', true);
			Session::set('userid', $uname);
			if ($rememberMe) {
				Auth::createCookie("userid", $uname);
				Auth::createCookie("loggedIn", 1);
			}
			header('location: ../dashboard');
		} else {
			echo "Invalid username or password ".$pswd;
			header('location: ../login');
		}
		
	}
	
}