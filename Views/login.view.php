
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>login_reg.css">
<div class='login'>
  <div style="width: 100%; text-align: center;">
  	<div style="text-align: center; max-width: 150px; max-height: 150px; margin: 0 auto;" data-aos="fade">
	 	 <img class="pure-img" src="<?=LOGO?>" alt="P2P Recycler Logo"> 
    </div>
  </div>
  <form method="post" action="./login/session">
    <input name='uname' placeholder='Username' type='text'>
  <input id='pw' name='pswd' placeholder='Password' type='password'>
  <div class='agree'>
      <input id='agree' name='rememberMe' type='checkbox'>
      <label for='agree' class="agree__">Keep Me Logged In</label>
    </div>
  <input class='animated' type='submit' value='Login'>
  </form>
  <a class='forgot' href='<?=APP_URL ?>register'>Don't have an account?</a>
</div>