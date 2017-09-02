<?php
/**
 * Vy Nghia
 */
require_once 'config.php';
error_reporting(0);
if (isset($_GET['url'])) {
    $url      = $_GET['url'];
    $temp     = explode(".", $url);
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

	$real_url = $_GET['url'];
	$rd1 = rand(10000, 999999);
	$rd2 = rand(100, 999);
	$hash_url = $hs1.$str_hs2.$hs2.$str_hs.$hs3;
	$hashtag = $hash_url;
	$url_hash = 'https://'.$domain.'/url/'.$hash_url;
	$id = time();
	
	# TimeZone/Time #
	date_default_timezone_set('Asia/Ho_Chi_Minh'); //TimeZone VietNam
	$time = date("h:i:s");
	
	#Short URL
    $longUrl = $url_hash;
	$apiKey  = 'AIzaSyBN8vnC-IaYjpuH2fUrRPQpIzQTQJIS4ko';
		 
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
        
    $message = array(
        "messages" => array(
            array(
                "text" => "URL rút gọn: $short_url\nURL không rút gọn: $url_hash\nHashtag bài viết:  #url@$hashtag@"
            ),
        )
    );
    echo json_encode($message);
    header("Status: 200");
	#Insert into SQL
	$user_facebook = "INSERT INTO `gen_url`(`id`, `facebook_user_id`, `post_id`, `hash_url`, `hashtag`, `url`, `short_url`, `time`) VALUES ('$id','0', '', '$hash_url', '$hashtag', '$real_url', '$short_url', '$time')";
	mysql_query($user_facebook);
    }
?>