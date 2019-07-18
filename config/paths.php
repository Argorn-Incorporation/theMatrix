<?php  
	define('APP_URL', 'p2precycler.herokuapp.com');  
	define("ORG_NAME", "P2PRecycler");
	define('CONTROLLERS', 'Controllers/');
	define('MODELS', 'Models/');
	define('VIEWS', 'Views/');
	define('PUBLIC_URL', APP_URL.'public/');
	define('CSS_URL', APP_URL.'public/css/');
	define('JS_PATH', APP_URL.'public/js/');
	define('LOGO', APP_URL.'public/images/logo.png');
	define('IMAGE_PATH', APP_URL.'public/images/');
	define('TEAM_IMAGES_PATH', APP_URL.'public/images/team/');

	$GLOBALS['$stage_info'] = [
					"Your account is not active yet,&nbsp;you have 3 hours to make Ghc5 payment to your upline",

					"<li>Register 3 friends under you and receive Ghc5 each from these 3 downlines.</li>
						<li>Upgrade yourself to stage 2 with Ghc10 out of the Ghc15 you earned</li>
						<li>Keep the remaining Ghc5 as your pofit earned from Stage 1.</li>",

						"<li>Earn Ghc50 when you receive Ghc10 each from 5 members who are upgrading from stage 1 to stage 2.</li>
					<li>Upgrade yourself to stage 3 with Ghc30 out of the Ghc50 you earned</li>
					<li>Keep the remaining Ghc20 as your profit at Stage 2</li>",

					"<li>Earn Ghc210 when you receive Ghc30 each from 7 members who are upgrading from stage 2 to stage 3.</li>
					<li>This is the stage where you enjoy your full profit</li>
					<li>At this stage you will recycled out of the system</li>
					<li>Total profit = 210 + 20 + 5 = Ghc235</li>
					<li><em>Chillax&nbsp;</em> and enjoy the results of your hardwork. But don't forget!...You have 3hours to recycle back to stage 1 with Ghc5</li>"];

	$GLOBALS['$stage_colors'] = [
		["#ef5f6c","#dc3545"],
		["#9e0c22","rgba(158, 12, 34, 0.81)"],
		["#3b5998","#3b5998"],
		["#27b95c","#27b95c"]
	];

	$GLOBALS['StageDefaultInfo'] = [1,3,5,7];
	$GLOBALS['StageUpgradeAmount'] = [5,10,30,5];
	$GLOBALS['StageReceivedAmount'] = [0,15,50,210];
	$GLOBALS['StageReceivedAmountEach'] = [0,5,10,30,5];
	$GLOBALS['StageProfit'] = [0,5,20,210];
	$GLOBALS['total_profit_expected'] = 235;
	$GLOBALS['momo_options'] = ["mtn"=>"MTN Mobile Money",
								"airteltigo"=>"AirtelTigo Cash",
								"vodafone"=>"Vodafone Cash",
								"glo"=>"Glo Cash"
	];

?>