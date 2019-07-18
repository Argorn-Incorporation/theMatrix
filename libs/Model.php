<?php

class Model {

	function __construct() {
		$this->db = new DB();
	}

	public function UserExists($user, $userInfoProvided = 1, $addInfo = 0) //1 = username, 0 = user id, 2 = check both
	{
		if ($userInfoProvided==2) {
			$sql = "SELECT * FROM users WHERE username = :user OR userid = :user LIMIT 1";
		}
		elseif ($userInfoProvided==1) {
			$sql = "SELECT * FROM users WHERE username = :user LIMIT 1";
		}
		else {
			$sql = "SELECT * FROM users WHERE userid = :user LIMIT 1";
		}

		$this->db->query($sql);  
		$this->db->bind(':user', $user);
		$data = null;

		if ($addInfo==1) {
			$data = $this->db->single();
		}
		else {
			$this->db->execute();
		}

		$count = $this->db->rowCount();

		$sth = array('data' => $data, 'rowCount' => $count);

		return $sth;
	}

	public function insertNotification($message, $user_to)
	{
		if ($user_to && $message) {
			$sql = "INSERT INTO notifications(content, user_to) VALUES(:msg, :user)";
			$this->db->query($sql);  
			$this->db->bind(':msg', $message);
			$this->db->bind(':user', $user_to);
			$this->db->execute();
			return true;
		}
		else {
			return false;
		}
	}

	public function getNotification($user_to, $content)
	{
			$sql = "SELECT * FROM notifications WHERE user_to = :user && seen=0 ORDER BY date_sent DESC";
			$this->db->query($sql);  
			$this->db->bind(':user', $user_to);
			$data = '';
			if ($content==1) {
				$data = $this->db->resultset();
			}
			else {
				$this->db->execute();
			}
			$count = $this->db->rowCount();
			return array('data' => $data, 'rowCount' => $count);
	}
	public function __GetUpdateRequests($user_to, $content)
	{
			$sql = "SELECT * FROM upgrade_requests WHERE upline = :user && upgraded=0 ORDER BY req_date ASC";
			$this->db->query($sql);  
			$this->db->bind(':user', $user_to);
			$data = '';
			if ($content==1) {
				$data = $this->db->resultset();
			}
			else {
				$this->db->execute();
			}
			$count = $this->db->rowCount();
			return array('data' => $data, 'rowCount' => $count);
	}

	public function RequestUpgrade($downline, $upline, $currStage=1)
	{
		if ($downline && $upline) {
			$rollback = "";
			if ($currStage>3) {
				$currStage = 1;
				$rollback = ", recycles = recycles+1, recycle_date=NOW()";
			}
			//Insert Upgrade request
			$sql = "INSERT INTO upgrade_requests(downline, upline, stage_to) VALUES(:dwn, :upl, :stg)";
			$this->db->query($sql);  
			$this->db->bind(':dwn', $downline);
			$this->db->bind(':upl', $upline);
			$this->db->bind(':stg', $currStage);
			$this->db->execute();

			//Upine
			$sql = "UPDATE users SET downlines=downlines+1, stage_downlines=stage_downlines+1 WHERE userid=:user";
			$this->db->query($sql);  
			$this->db->bind(':user', $upline);
			$this->db->execute();

			//Downline
			$sql = "UPDATE users SET current_sponsor=:upl, upgrade_requested=1 ".$rollback." WHERE userid=:user";
			$this->db->query($sql);  
			$this->db->bind(':user', $downline);
			$this->db->bind(':upl', $upline);
			$this->db->execute();
			return true;
		}
		else {
			return false;
		}
	}

	public function _UpgradeDownline($downline, $upline, $total_earning, $amountReceived, $uplineStageCompleted=0, $upgradeFee=0)
	{
		
		if ($uplineStageCompleted) {
			$uplineStageCompleted = ",stage_completed = 1";
		}
		else {
			$uplineStageCompleted = "";
		}

		//Upgrade Downline
		$sql = "UPDATE users SET stage=if(stage=3,1,stage+1), total_earning=if(total_earning=0,0,total_earning-".$upgradeFee."), upgrade_requested=0, stage_completed = 0, active=1, amount_received=0, stage_downlines=0 WHERE userid=:user_";
		$this->db->query($sql);  
		$this->db->bind(':user_', $downline);
		$this->db->execute();

		//Update upline's info
		$sql = "UPDATE users SET total_earning=:te, amount_received=:ar ".$uplineStageCompleted."  WHERE userid=:user";
		$this->db->query($sql); 
		$this->db->bind(':user', $upline);
		$this->db->bind(':te', $total_earning);
		$this->db->bind(':ar', $amountReceived);
		$this->db->execute();

		$this->insertNotification("You have been upgraded.", $downline);
		$this->deleteUpgradeRequest(0, $downline, $upline);
		return true;
	}

	public function deleteUpgradeRequest($byID=0, $downline="", $upline="")
	{
		if ($byID) {
			$this->db->query("DELETE FROM upgrade_requests WHERE u_id=".$byID." LIMIT 1");
		}
		else {
			$this->db->query("DELETE FROM upgrade_requests WHERE downline=".$downline." AND upline=".$upline." LIMIT 1");
		}
		$this->db->execute();
	}

	public function SelectRandomSponsor($addInfo=0, $currStage=0)
	{
		$currStage = $currStage+1;
		$sql = "SELECT * FROM users WHERE stage=:stage && active=1 && stage_completed=0 && upgrade_requested=0 ORDER BY recycle_date ASC LIMIT 1";
		$this->db->query($sql);
		$this->db->bind(':stage', $currStage);  
		$data = $this->db->single();

		if ($this->db->rowCount() == 0) {
			$sql = "SELECT * FROM users WHERE username=:user LIMIT 1";
			$this->db->query($sql);  
			$this->db->bind(':user', "default");
			$data = $this->db->single();

		}

		if ($addInfo) {
			return $data;
		}
		return $data['userid'];
		
	}

	public function FindSponsor($sponsor, $addInfo=0, $_currStage=0)
	{
		$currStage = $_currStage+1;
		if ($currStage>3) {
			$currStage = 1;
		}
		$sql = "SELECT * FROM users WHERE userid=:user && stage=:stage && active=1 && stage_completed=0 && upgrade_requested=0 LIMIT 1";
		$this->db->query($sql);
		$this->db->bind(':stage', $currStage);  
		$this->db->bind(':user', $sponsor);  
		$data = $this->db->single();

		if ($this->db->rowCount() == 0) {
			return $this->SelectRandomSponsor($addInfo, $_currStage);
		}
		
		if ($addInfo) {
			return $data;
		}
		else {
			return $data['userid'];
		}
	}

	public function generateID($length = 10)
	{
		$unique_ref_length = $length;
		$unique_ref_found = false;
		$possible_chars =  1234567890;

		while (!$unique_ref_found) {
			$unique_ref = "";
			$i = 0;

			while ($i < $unique_ref_length) {
				$char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);
				$unique_ref .= $char;
				$i++;
			}
			if ($this->UserExists($unique_ref)) {
				$unique_ref_found = true;
			}
		}
		return $unique_ref;
	}

}