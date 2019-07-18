<?php

class Dashboard_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		Session::init();
		$uname = Session::get('userid');
		
		return $this->UserExists($uname, 2, 1)['data'];
	}

	public function _GetUserData($user)
	{
		return $this->UserExists($user, 2, 1)['data'];
	}

	public function notifications($content=1)
	{
		Session::init();
		$uname = Session::get('userid');
		
		return $this->getNotification($uname, $content);
	}

	public function GetUpdateRequests($content=1)
	{
		Session::init();
		$uname = Session::get('userid');
		
		return $this->__GetUpdateRequests($uname, $content);
	}

	public function __UpgradeDownline($downline, $upline, $total_earning=0, $amountReceived=0, $uplineStageCompleted=0, $upgradeFee=0)
	{
		return $this->_UpgradeDownline($downline, $upline, $total_earning, $amountReceived, $uplineStageCompleted, $upgradeFee);
	}

	public function _RequestUpgrade($downline, $upline, $currStage)
	{
		$upline = $this->FindSponsor($upline, 0, $currStage) ?? null;
		if ($upline) {
			return $this->RequestUpgrade($downline, $upline, $currStage+1);
		}
		else {
			return false;
		}
		
	}
	
}