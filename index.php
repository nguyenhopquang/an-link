<!-- >_ Developed by Vy Nghĩa -->
<html lang="vi-vn" type="xml" itemtype="http://schema.org/Organization">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>Link Protect</title>
	<meta name="viewport" content="width=device-width"/>
	<!-- Chrome Mobile Theme Color -->
	<meta name="theme-color" content="#8e44ad"/>
	<!-- Facebook Meta -->
	<meta property="fb:app_id" content="APP_ID">
	<meta property="og:url" content="https://domain.com/" />
	<meta property="og:description" content="Description website!" />
	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<!-- Main CSS [Home|Bootstrap] -->
	<link rel="stylesheet" href="assets/css/Emelja.css?v1.0" id="css/+main"/>
	<!-- Narbar -->
	<style>
		.content, .content::before, .portlet, .alert, .portlet .portlet-header, .input-group-addon, .btn, .form-control {border-radius:initial}
		.navbar {
			background:#403667 url("assets/images/background/tet_2017.jpg");
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
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
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
<div id="info_emelja" class="portlet">
<div class="portlet-header">
<h3>
<i class="fa fa-user-circle-o" aria-hidden="true"></i>
<?php echo $check ?>
</h3>
</div>
<!-- Newfeed [content]-->
<div class="portlet-content">
<?php
$token = $accessToken;
if($accessToken == null){
	echo '<center><a href = "'.$loginUrl.'"><button type="button" class="btn btn-danger" >Đăng nhập</button></a><br/>
	<p>Chỉ lấy quyền cơ bản (<strong>xem ID</strong>, <strong>tên</strong> và <strong>danh sách bạn bè</strong>) của bạn. Không đòi hỏi các quyền nhạy cảm như <strong>đăng bài</strong>, <strong>like</strong> và <strong>chia sẻ</strong>.</p></center>';
}
if(isset($accessToken)){
	//Api
	$graph_me = 'https://graph.facebook.com/me?access_token='.$token;
	
	//Get Facebook user_id
	$user = json_decode(file_get_contents($graph_me));
	$user_id = $user->id;
	include __DIR__ .'/form/form_get_url.php';
}
?>
<hr style="margin-top:10px;margin-bottom:10px">
<small>Phát triển bởi <a href="https://www.facebook.com">Vy Nghĩa</a>
<br/>&copy; 2017 Vy Nghĩa - bản quyền phát triển hợp lệ.</small>
</div>
</div>
<!-- Suggest Content -->
<div class="portlet">
<div class="portlet-header">
<h3>
<i class="fa fa-star-o"></i>
Đề xuất
</h3>
<style>
.tags {
  list-style: none;
  margin: 0;
  overflow: hidden; 
  padding: 0;
  font-size: 12px;
  margin: 15px 15px 5px 15px;
  text-decoration: none;
}

.tags li {
  float: left; 
}

.tag {
  background: #eee;
  border-radius: 3px 0 0 3px;
  color: #999;
  display: inline-block;
  height: 26px;
  line-height: 26px;
  padding: 0 20px 0 23px;
  position: relative;
  margin: 0 10px 10px 0;
  text-decoration: none;
  -webkit-transition: color 0.2s;
}

.tag::before {
  background: #fff;
  border-radius: 10px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
  content: '';
  height: 6px;
  left: 10px;
  position: absolute;
  width: 6px;
  top: 10px;
}

.tag::after {
  background: #fff;
  border-bottom: 13px solid transparent;
  border-left: 10px solid #eee;
  border-top: 13px solid transparent;
  content: '';
  position: absolute;
  right: 0;
  top: 0;
}

.tag:hover {
  text-decoration: none;
  background-color: #DDDDDD;
  color: black;
}

.tag:hover::after {
   border-left-color: #DDDDDD;
}
</style>

</div> 
<!-- Tags Area +/Suggest Content -->
<div class="portlet-content" style="margin:0;padding:0">
<ul class="tags">
  <li><a href="https://apps.facebook.com/juno_okyo_apps/?ref=emelja" class="tag">j2team</a></li>
  <li><a href="https://www.facebook.com/groups/j2team.community/?ref=emelja" class="tag">j2team community</a></li>
  <li><a href="https://www.facebook.com/NghiaisGay/?ref=emelja" class="tag">vy nghĩa</a></li>
  <li><a href="http://www.khari-nnt.com/" class="tag">nguyễn khải blog</a></li>
</ul>
</div> 

</div>
</div></div></div>
	

<!-- [S] Footer -->
<div id="footer" class="footer">
	<div class="container">
		<div class="col-sm-12">
			<div class="inner" style="margin-left: auto; margin-right: auto;">
				<div class="statistic" style="color:#333;line-height:20px;">
					<h6>Thông tin</h6>
					<div class="box">
						IP của bạn là: <?php echo $_SERVER['REMOTE_ADDR']; ?><br>
						Email liên hệ : contact@<?php echo $_SERVER['HTTP_HOST']; ?><br>
						<i class="fa fa-lock" aria-hidden="true"></i> Security by BαWorld Team
					</div>
				</div>
				<div class="sinhvienit">
					<h6>Liên kết</h6>
					<a href="https://domain.com" title="Domain title" target="_blank">domain</a>
				</div>
				<hr class="clear">
			</div>
		</div>
	</div>
</div>
<!-- [E] Footer -->
</body>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=577411349118269";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</html>
<!-- Bo Emeljα -->