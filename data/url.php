<?php
/*
* Developed by Vy Nghĩa
*/
require_once '../login.php';

if($_POST['url'] == null){
	echo 'Nhập url vào đi man!';
	exit;
}

#Hash & Link
$if_num = rand(1,3);
$hs1 = rand(100, 1000);
$hs2 = rand(1, 1000);
$hs3 = rand(1, 1000);

//Text radnom Generator
function _u31ato($i = 1) {
	return substr(str_shuffle(str_repeat($x='abcdegmnorstuvwxyz', ceil($i/strlen($x)) )),1,$i);
}
$str_hs = _u31ato();
if($if_num == 1){
function _x3w5sj($i = 1) {
	return substr(str_shuffle(str_repeat($x='abcdegmnorstuvwxyz', ceil($i/strlen($x)) )),1,$i);
}
$str_hs2 = _x3w5sj();
}

$real_url = $_POST['url'];
$rd1 = rand(10000, 999999);
$rd2 = rand(100, 999);
$hash_url = $hs1.$str_hs2.$hs2.$str_hs.$hs3;
$hashtag = $hash_url;
$url = 'https://'.$domain.'/url/'.$hash_url;
$id = time();
# TimeZone/Time #
date_default_timezone_set('Asia/Ho_Chi_Minh'); //TimeZone VietNam
$time = date("h:i:s");
# Short URL
if(isset($_POST['url'])&&!empty($_POST['url'])){	
$longUrl = $url;
$apiKey  = $GoogleApiKey;
	 
$postData = array('longUrl' => $longUrl);
$jsonData = json_encode($postData);
	 
$curlObj = curl_init();
	 
curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);
curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlObj, CURLOPT_HEADER, 0);
curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
curl_setopt($curlObj, CURLOPT_POST, 1);
curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
	 
$reply = curl_exec($curlObj);
	 
$json = json_decode($reply);
	 
curl_close($curlObj);
	
if(isset($json->error)){
echo $json->error->message;
}else{
	$short_url = $json->id;
}
echo 'Liên kết rút gọn: '.$short_url.'<br/>
Liên kết đẩy đủ: '.$url.'<br/>
Hashtag: #url@'.$hashtag.'@';

#Insert into SQL
$user_facebook = "INSERT INTO `gen_url`(`id`, `facebook_user_id`, `post_id`, `hash_url`, `hashtag`, `url`, `short_url`, `time`) VALUES ('$id','$user_id', '', '$hash_url', '$hashtag', '$real_url', '$short_url', '$time')";
	if (mysql_query($user_facebook)) {
		null;
	} else {
		echo "</br>Đã xảy ra lỗi với SQL: " . $user_facebook . "<br>" . mysql_error($con);
	}
}
?>