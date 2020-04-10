<?php  
$SponsorId = $_REQUEST['u'] ?? ($_COOKIE['sponsor_id'] ?? null);
$InputDisabled = "";
if ($SponsorId) {
    setcookie('sponsor_id', $SponsorId);
    $InputDisabled = " disabled";
}
?>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>login_reg.css">

<div class='login'>

  <div style="width: 100%; text-align: center;">
    <div style="text-align: center; max-width: 150px; max-height: 150px; margin: 0 auto;" data-aos="fade">
     <img class="pure-img" src="<?=LOGO?>" alt="P2P Recycler Logo">
    </div>
  </div>

  <form action="./register/session" method="post">
    
    <input name='fname' placeholder='Full Name' type='text'>
    <input name='uname' placeholder='Username' type='text'>
    <input id='pw' name='pswd' placeholder='Password' type='password'>
    <input name='email' placeholder='E-Mail Address' type='text'>
    <input name='mobile' placeholder='Mobile Money Number' type='text'>

    <select name="momo_type" id="SelectLm" class="form-control-sm form-control">
      <option>Select Network Operator</option>
      <?php  
      foreach ($GLOBALS['momo_options'] as $options => $optvalue) {
      ?>
        <option value="<?=$optvalue?>"><?=$optvalue?></option>
      <?php
      }
      ?>
    </select>

    <input name='sid' title="Sponsor ID" placeholder='Sponsor ID' type='text' value="<?=$SponsorId?>"<?=$InputDisabled?>>
    
    <div class='agree'>
      <input id='agree' name='agree' type='checkbox'>
      <label for='agree' class="agree__">Accept rules and conditions</label>
    </div>
    
    <input class='animated' type='submit' value='Register'>

  </form>

  <a class='forgot' href='<?=APP_URL ?>login'>Already have an account?</a>

</div>