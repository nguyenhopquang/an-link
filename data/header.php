<!-- >_ Developed by Vy Nghĩa -->
<html lang="vi-vn" type="xml" itemtype="http://schema.org/Organization">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>Link Protect</title>
	<meta name="viewport" content="width=device-width"/>
	<!-- Chrome Mobile Theme Color -->
	<meta name="theme-color" content="#8e44ad">
	<!-- Facebook Meta -->
	<meta property="fb:app_id" content="APP_ID">
	<meta property="og:url" content="https://domain.com/" />
	<meta property="og:title" content="Link Protect" />
	<meta property="og:description" content="Description website!" />
	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<!-- Main CSS [Home|Bootstrap] -->
	<link rel="stylesheet" href="/assets/css/Emelja.css?v1.0" id="css/+main"/>
	<!-- Narbar -->
	<style>
		.content, .content::before, .portlet, .alert, .portlet .portlet-header, .input-group-addon, .btn, .form-control {border-radius:initial}
		.navbar {
			background:#403667 url("/assets/images/background/tet_2017.jpg");
		}
		.navbar .navbar-toggle {
			/*margin-top: 4px;*/
			color: #fff;
		}
		.navbar .navbar-toggle:hover, .navbar .navbar-toggle:focus {
			background-color: #fff;
			color: #666;
		}
		#back-to-top {
			bottom: 40px;
		}
	</style>

	<style id="at4-share-offset" type="text/css" media="screen">#at4-share,#at4-soc {top:230px !important;bottom:auto}</style>
	<!-- Aciton JS [jQuery|Bootstrap] -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body xml="vi-vn">
	<div class="navbar">
	<div class="container">
	<div class="navbar-header">

	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
	<i class="fa fa-bars"></i>
	</button>
	<!-- Navbar Main [Logo] -->
	<a class="navbar-brand navbar-brand-image" href="/" title="Link Protect">
	<i class="fa fa-chain-broken" style="color:#fff;font-size:45px;/*padding:4px 0 0 8px;*/padding:10px 0 0 8px;margin-left:15px;white-space:nowrap;"><span style="font-size: 20px;font-family:tahoma;padding-left:10px;vertical-align:9px;">Link Protect</span></i>
	</a>

	</div>
	</div> 
	</div> 
	<!-- Navbar Menu [Dropdown for mobile] -->
	<div class="mainbar">
	<div class="container">
	<div class="mainbar-collapse collapse">
	<ul class="nav navbar-nav mainbar-nav">
	<li>
		<a href="/" title="Trang chủ">
			<i class="fa fa-home"></i>
			Trang chủ
		</a>
	</li>
	</ul>

	</div> <!-- /.navbar-collapse -->   
	</div> <!-- /.container --> 
	</div> <!-- /.mainbar -->

	<div class="container"><div class="content"><div class="content-container">

	<div class="row quangcao-top" style="margin-top:-5px;display:none">
	</div>
<?php 
require_once 'login.php';
?>
<div id="link_protect" class="portlet">
<div class="portlet-header">
<h3>
<i class="fa fa-lock" aria-hidden="true"></i>
Khóa liên kết <?php if(!empty($accessToken)){ echo '[<a href="/logout">Đăng xuất</a>]'; }?>
</h3>
</div>
<!-- Newfeed [content]-->
<div class="portlet-content">