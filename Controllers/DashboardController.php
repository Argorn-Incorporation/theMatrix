<?php  
/**
 * 
 */
class DashboardController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		Auth::handleLogin();
		$this->view->title = "Dashboard";
		$this->view->pageName = "dashboard";

		$this->InitDashboardUser();


		$this->view->userdata['timer'] = date('M d, Y h:i:sa', strtotime($this->view->userdata['timer']));

        $this->view->userdata['stage_progress'] = [0,0,0,0,0,0,0,0,0,0];
		if ($this->view->userdata['stage']==0) {
			$this->view->userdata['stage_name'] = "Newbie";
			$this->view->userdata['stage_info'] = $GLOBALS['stage_info'][0];
		}
		else {
			$this->view->userdata['stage_name'] = "Stage ".$this->view->userdata['stage'];
			$this->view->userdata['stage_info'] = "";

		}

		for ($i=0; $i<10; $i++) {
            if ($this->view->userdata['stage']==$i) {
                $this->view->userdata['stage_progress'][$i] = ((double)($this->view->userdata['stage_downlines'])/($GLOBALS['StageDefaultInfo'][$i]))*100;
                break;
            }
            else {
                $this->view->userdata['stage_progress'][$i] = 100;
            }
        }

		$this->view->userdata['upliner_details'] = [];

		if ($this->view->userdata['upgrade_requested']) {
			$this->view->userdata['upliner_details'] = $this->GetUserData($this->view->userdata['current_sponsor'], 0);
		}

		$this->view->notifs = $this->notifications(0,0);
		$this->view->UpdateReqs = $this->GetUpdateRequests(0,0);
		$this->view->render("dashboard", 2, 1);
	}

	public function account()
	{
		Auth::handleLogin();
		$this->view->title = "Account Information";
		$this->view->pageName = "account";

		$this->InitDashboardUser();
		$this->view->notifs = $this->notifications(0,0);
		$this->view->UpdateReqs = $this->GetUpdateRequests(0,0);
		$this->view->render("account", 2, 1);
	}

	public function InitDashboardUser()
	{
		$this->view->userdata = $this->model->run();
	}

	public function notifications($content=1, $echo=1)
	{
		if ($echo) {
			echo json_encode($this->model->notifications($content));
		}
		else {
			return $this->model->notifications($content);
		}
	}

	public function GetUpdateRequests($content=1, $echo=1)
	{
		if ($echo) {
			echo json_encode($this->model->GetUpdateRequests($content));
		}
		else {
			return $this->model->GetUpdateRequests($content);
		}
	}

	public function GetUserData($user="", $echo=1)
	{
		$user = $_POST['user_id'] ?? $user;
		if ($echo) {
			echo json_encode($this->model->_GetUserData($user));
		}
		return $this->model->_GetUserData($user);
	}

	public function upgradeDownline($downline=null, $stage_to=0, $echo=1)
	{
		$downline = $_REQUEST['downline'] ?? $downline;
		$stage_to = $_REQUEST['stage_to'] ?? $stage_to;
		if ($downline && $stage_to) {
			$this->InitDashboardUser();
			if (($this->view->userdata['stage']==0) && ($this->view->userdata['username'] != "default")) {
				if ($echo) {
					echo "You are a Newbie. You cannnot upgrade any downline till you upgrade to stage 1.";
					return;
				}
				return false;
			}
			$upline = $this->view->userdata['userid'];
			$total_earning = ($this->view->userdata['total_earning']) + ($GLOBALS['StageReceivedAmountEach'][$this->view->userdata[$stage_to]]);
			$stageCompleted = 0;
			$amtRcvd = ($this->view->userdata['amount_received']) + ($GLOBALS['StageReceivedAmountEach'][$this->view->userdata[$stage_to]]);
			if ($amtRcvd == $GLOBALS['StageReceivedAmount'][$this->view->userdata['stage']]) {
				$stageCompleted = 1;
			}
			return $this->model->__UpgradeDownline($downline, $upline, $total_earning, $amtRcvd, $stageCompleted, $GLOBALS['StageReceivedAmountEach'][$stage_to]);
		}
	}

	public function upgrade()
	{
		Auth::handleLogin();
		$this->InitDashboardUser();
		if ($this->view->userdata['stage_completed'] && $this->view->userdata['upgrade_requested']==0) {
			$this->model->_RequestUpgrade($this->view->userdata['userid'], $this->view->userdata['current_sponsor'], $this->view->userdata['stage']);
		}

		header("location: ../dashboard");
	}

	public function ____def()
	{
		$upgradeFee = 15;
		$this->db = new DB();
		$sql = "UPDATE users SET total_earning=total_earning-".$upgradeFee." WHERE username='default'";
		$this->db->query($sql);
		if ($this->db->execute()) {
			$sql = "UPDATE users SET total_earning=5 WHERE username='default'";
			$this->db->query($sql);
		}
		$this->db = null;
	}
}
?>