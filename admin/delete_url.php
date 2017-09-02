<!-- Developed by Vy Nghĩa -->
<html>
<head>
<meta charset="utf-8"/>
<title>Xóa đơn hàng</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://cdn.emelja.com/wellplayedvn/home/main/css/styles" rel="stylesheet">
</head>
<body>
<?php
require '../data/config.php';
$id = $_GET['id'];

if(!empty($id)){
$delete = "DELETE FROM `".$dbname."`.`gen_url` WHERE `gen_url`.`id` = ".$id;
if(mysql_query($delete)){
    echo "<p>Đơn hàng ID ".$id." đã được xóa hoàn tất!</p>";
	echo '<script>window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
} else {
    echo "Lỗi hệ thống mySQL";
}

mysql_close($con);
}
?>
  </body>
</html>