<!DOCTYPE html>
<html class="no-js">
<head>
	<title><?=$this->title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?=IMAGE_PATH?>favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>normalize.css?q=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>pure-min.css?q=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>icons.css?q=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>aos.css?q=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>sss.css?q=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>main.css?q=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>pre_styles.css?q=<?=time()?>">
	<link rel="stylesheet" type="text/css" href="<?=CSS_URL?>media.css?q=<?=time()?>">
	<script type="text/javascript" src="<?=JS_PATH?>aos.js?q=<?=time()?>"></script>
	<script type="text/javascript" src="<?=JS_PATH?>jquery.js?q=<?=time()?>"></script>
	<script type="text/javascript" src="<?=JS_PATH?>sss.js?q=<?=time()?>"></script>
	<script type="text/javascript" src="<?=JS_PATH?>main.js?q=<?=time()?>"></script>
</head>
<body class="no-js" id="_<?=$this->pageName?>_">
<?php  
	if (!(($this->pageName === "login") or ($this->pageName === "register"))) {
?>
	<header>
		<div id="preNav">
			<div class="container">
				<div id="logo" class="inl_blck va_top" data-aos="fade">
					<img src="<?=LOGO?>" alt="Silanem Logo">
				</div>
				<div id="info_bar" class="inl_blck">
				</div>
				<div class="inl_blck va_top right" data-aos="fade">
					<a href="login" class="button_tr inl_blck">Log In</a>
					<a href="register" class="button_tr inl_blck">Sign Up</a>
				</div>
			</div>
		</div>
		<nav id="navbar" data-aos="fade">
			<div class="isMobileCaret">
				<div class="menu_toggle">
					<span class="icon icon-bars"></span>
					<span class="blck font12">Menu</span>
				</div>
			</div>
			<ul>
				<a href="<?=APP_URL?>"><li class="inl_blck navLink">Home</li></a>
				<a href="#about-us"><li class="inl_blck navLink">About Us</li></a>
				<a href="#how-it-works"><li class="inl_blck navLink">How it Works</li></a>
				<a href="terms"><li class="inl_blck navLink">Terms of Use</li></a>
				<a href="login"><li class="inl_blck navLink">Log In</li></a>
				<a href="register"><li class="inl_blck navLink">Sign Up</li></a>
			</ul>
		</nav>
	</header>

	<div class="mainContent">
<?php  
	}
?>