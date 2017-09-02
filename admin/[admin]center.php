<!-- Developed by Vy Nghĩa -->
<html itemtype="http://schema.org/Organization">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>[Admin Center]</title>
	<meta name="viewport" content="width=device-width"/>
	<!-- Chrome Mobile Theme Color -->
	<meta name="theme-color" content="#8e44ad">
	<!-- info web [meta] -->
	<meta name="author" content="Bo Emelia"/>
	<!-- Fonts -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
	<!-- Main CSS [Home|Bootstrap] -->
	<link rel="stylesheet" href="../assets/css/Emelja.css?v2.0" id="css/+main"/>
	<!-- Narbar -->
	<style>
		.content, .content::before, .portlet, .alert, .portlet .portlet-header, .input-group-addon, .btn, .form-control {border-radius:initial}
		.navbar {
			background:#403667 url("../assets/images/background/tet_2017.jpg");
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
<body>
	<div class="navbar">
	<div class="container">
	<div class="navbar-header">

	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".mainbar-collapse">
	<i class="fa fa-bars"></i>
	</button>
	<!-- Navbar Main [Logo] -->
	<a class="navbar-brand navbar-brand-image" href="/" title="Admin">
	<i class="fa fa-cog" style="color:#fff;font-size:45px;/*padding:4px 0 0 8px;*/padding:10px 0 0 8px;margin-left:15px;white-space:nowrap;"><span style="font-size: 20px;font-family:tahoma;padding-left:10px;vertical-align:9px;">Admin</span><!--<img style="margin-left:-114px;margin-top:-30px" src="/images/noel/santa-hat.png">--></i> <!--<img style="margin-top:-20px;margin-left:-45px" src="/images/linksvip-logo.png?2015" height="45px">-->
	</a>

	</div>
	</div> 
	</div> 
	<!-- Navbar Menu [Dropdown for mobile] -->
	<div class="mainbar">
	<div class="container">
	<div class="mainbar-collapse collapse">
	<ul class="nav navbar-nav mainbar-nav">
	<?php null; ?> 
	</ul>

	</div> <!-- /.navbar-collapse -->   
	</div> <!-- /.container --> 
	</div> <!-- /.mainbar -->

	<div class="container"><div class="content"><div class="content-container">

	<div class="row quangcao-top" style="margin-top:-5px;display:none">
	</div>
<?php require '../data/config.php'; ?>
<div class="row">
<div id="sql_data" class="portlet">
<div class="portlet-header">
<h3>
<i class="fa fa-cogs" aria-hidden="true"></i>
Thông tin điều hành</h3>
</div>
<div class="portlet-content">
<div class="input-group form-group">
	<span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
	<input class="form-control" style="height:38px;z-index:0" id="id" value="Truy cập với quyền: Administrator" type="text" name="id" disabled>
</div>
<div class="input-group form-group">
	<span class="input-group-addon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
	<input class="form-control" style="height:38px;z-index:0" id="id" value="<?php
$db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$number_link ="SELECT * FROM `gen_url`";

if ($number_link_query=mysqli_query($db,$number_link))
  {
  // Return the number of rows in result set
  $linkcount=mysqli_num_rows($number_link_query);
  printf("Tổng số liên kết: %d",$linkcount);
  // Free result set
  mysqli_free_result($number_link_query);
  }

mysqli_close($db);
?>" type="text" name="id" disabled>
</div>
</div> 
</div> 
<div id="sql_data" class="portlet">
<div class="portlet-header">
<h3>
<i class="fa fa-cubes" aria-hidden="true"></i>
Dữ liệu liên kết
</h3>
</div>
<div class="portlet-content">
<table class="table table-bordered" id="order">
  <thead>
    <tr>
      <th>ID liên kết</th>
      <th>Facebook ID</th>
      <th>POST ID</th>
      <th>Hash của url</th>
      <th>#Hashtag</th>
      <th>Url thật</th>
      <th>Goo.gl url</th>
      <th>Thời gian tạo</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
<?php
$data = mysql_query("SELECT `id`, `facebook_user_id`, `post_id`, `hash_url`, `hashtag`, `url`, `short_url`, `time` FROM `gen_url` WHERE 1");

while($row = mysql_fetch_array($data))
  {
  echo "<tr>";
		$id = $row['id'];
        echo '<td>' . $id . '</td>';
        echo '<td>' . $row['facebook_user_id'] . '</td>';
        echo '<td>' . $row['post_id'] . '</td>';
        echo '<td>' . $row['hash_url'] . '</td>';
        echo '<td>' . $row['hashtag'] . '</td>';
        echo '<td><a href="' . $row['url'] . '" target="_blank">Đi đến</a></td>';
		echo '<td>' . $row['short_url'] . '</td>';
		echo '<td>' . $row['time'] . '</td>';
		echo '<td><a href="delete?id='.$id.'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
        echo '</tr>';
  }

mysql_close($con);
?>
  </tbody>
</table>
<hr style="margin-top:10px;margin-bottom:10px">
<small>Cập nhật mới nhất 1:46 - 23/06/2017 (phiên bản thứ 2)</small>
</div> 
</div> 

<div class="portlet">
<div class="portlet-header">
<h3>
<i class="fa fa-comment-o" aria-hidden="true"></i>
Bình luận
</h3>

</div> 
<div class="portlet-content">
<!-- Comment type: Facebook -->
<div class="fb-comments" data-href="https://linhka.com/" data-width="100%" data-numposts="5"></div>
</div> 

</div> 


<div class="row">
<div id="g-page" class="col-sm-6">
	<!-- Google data [lang: vi/vn] -->
	<script src="https://apis.google.com/js/platform.js" async="" defer="" gapi_processed="true">
	  {lang: 'vi'}
	</script>
	<div style="padding-top:10px"></div>
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
  <li><a href="https://example.com/tags" class="tag">example tags</a></li>
</ul>
</div> 

</div>
</div></div></div></div>
	

<!-- [S] Footer -->
<div id="footer" class="footer">
	<div class="container">
		<div class="col-sm-12">
			<div class="inner" style="margin-left: auto; margin-right: auto;">
				<div class="statistic" style="color:#333;line-height:20px;">
					<h6>Thông tin</h6>
					<div class="box">
						IP của bạn là: <?php echo $_SERVER['REMOTE_ADDR']; ?><br>
						Email liên hệ : mail@linhka.com<br>
						<i class="fa fa-lock" aria-hidden="true"></i> Security by BαWorld Team
					</div>
				</div>
				<div class="sinhvienit">
					<h6>Liên kết</h6>
					<a href="https://linhka.com/?ref=emelja_home" title="Dịch vụ Linh Ka" target="_blank">LinhKa.com</a>
					<a href="https://linhkave.com/?ref=emelja_home" title="Linh Kave" target="_blank">LinhKave.com</a>
					<a href="https://suxvat.com/?ref=emelja_home" title="Súc vật hà thành" target="_blank">Suxvat.com</a>
					<a href="https://wellplayedvn.com/?ref=emelja_home" title="Trang web co' hox" target="_blank">WellPlayedVN.com</a>
				</div>
				<hr class="clear">
			</div>
		</div>
	</div>
</div>
<!-- [E] Footer -->

</body>
</html>
<!-- Bo Emeljα -->