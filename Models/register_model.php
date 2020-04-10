<?php

class Register_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		//print_r($this->UserExists("Clement"));
		$fname = trim($_POST['fname']) ?? null;
		$uname = trim($_POST['uname']) ?? null;
		$pswd = Hash::create('sha256', $_POST['pswd'], HASH_PASSWORD_KEY) ?? null;
		$sid = $_POST['sid'] ?? null;
		$email = trim($_POST['email']) ?? null;
		$mobile = trim($_POST['mobile']) ?? null;
		$momo_type = trim($_POST['momo_type']) ?? null;

		//$timer = strtotime(date('Y-m-d h:i:sa'), + time()*3*60*60);
		$timer = date('Y-m-d H:i:s');
		$timer = strtotime($timer . "+3hours");
		$timer = date('Y-m-d H:i:s', $timer);
		$userid = $this->generateID ?? time();
		$hasErrors = false;
		Session::init();
		if (empty($fname)) {
			Session::set('errMsg','Please provide your Full name');
			$hasErrors = true;
		}
		elseif (empty($uname)) {
			Session::set('errMsg',"Please choose a username");
			$hasErrors = true;
		}
		elseif (($this->UserExists($uname, 2)['rowCount']) or $uname == "default") {
			Session::set('errMsg',"Username ".$uname." already exits.&nbsp;Please choose a different username...");
			$hasErrors = true;
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			Session::set('errMsg',"The email you entered is invalid");
			$hasErrors = true;
		}
		elseif (empty($mobile) or strlen($mobile)>10) {
			Session::set('errMsg',"Enter a valid mobile number");
			$hasErrors = true;
		}
		elseif (empty($momo_type)) {
			Session::set('errMsg',"Select your mobile money operator");
			$hasErrors = true;
		}
		
		$sid = $this->UserExists($sid, 2, 1);
		$admin = $this->UserExists('default', 2, 1);
		if (($sid['rowCount']<1)) {
			Session::set('errMsg',"Please enter a valid sponsor id");
            $hasErrors = true;
		}
		if ($hasErrors===true) {
		    header('Location: '.APP_URL.'register');
        }
		else {
            $sid = ($sid['data']['stage'] > 0 or $sid['data']['stage_completed'] > 0) ? $this->SelectRandomSponsor() : $sid['data']['userid'];
            $admin = $admin['data']['userid'];

            $this->db->beginTransaction();
            try {
                $this->db->query('INSERT INTO `users` (`userid`,`fullname`, `username`, `pswd`, `sponsor_id`, `email`, `current_sponsor`, `timer`,`mobile`,`momo_type`,`momo_name`) VALUES (:userid, :fname, :uname, :pswd, :sid, :email, :sid, :timer, :mobile, :momo_type, :fname)');
                $this->db->bind(':userid', $userid);
                $this->db->bind(':fname', $fname);
                $this->db->bind(':uname', $uname);
                $this->db->bind(':pswd', $pswd);
                $this->db->bind(':sid', $sid);
                $this->db->bind(':email', $email);
                $this->db->bind(':timer', $timer);
                $this->db->bind(':mobile', $mobile);
                $this->db->bind(':momo_type', $momo_type);
                $this->db->execute();
                $this->insertNotification($fname . " with user ID " . $userid . " is now your downline.", $sid);
                $this->insertNotification($fname . " with user ID " . $userid . " has joined ".APP_NAME.". Check and upgrade them after you receive their payment.", $admin);
                $this->RequestUpgrade($userid, $admin);
                $this->db->endTransaction();
                Session::init();
                Session::set('loggedIn', true);
                Session::set('userid', $uname);
                Auth::createCookie("userid", $uname);
                Auth::createCookie("loggedIn", 1);
                header('location: ../dashboard');
                echo true;

            } catch (PDOException $e) {
                $this->db->cancelTransaction();
                Session::set('errMsg',"An error occurred. " . $e);
                header('Location: '.APP_URL.'register');
            }
        }
	}
	
}