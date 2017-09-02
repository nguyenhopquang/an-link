<?php
/* >_ Developed by Vy Nghĩa */
session_start();
require_once 'SDK/Facebook/autoload.php';
require_once 'data/config.php';

$fb = new Facebook\Facebook([
  'app_id' => $FacebookAppID,
  'app_secret' => $FacebookAppSecret,
  'default_graph_version' => $GraphApiVersion,
  ]);
  
$helper = $fb->getRedirectLoginHelper();
$permissions = ['public_profile,user_friends']; //optional

try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();

  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }

if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$profile = $profile_request->getGraphNode()->asArray();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		session_destroy();
		// redirecting user back to app login page
		echo '<script>window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
		include 'data/footer.php';
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	//Get Info Facebook User
	$user = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$accessToken, true)); //user info
	$user_id = $user->id; //get id facebook user 
	$name_user = $profile['name']; //get name facebook user
	
	//Welcome user
	$check = 'Chào mừng '.$name_user.' hãy bắt đầu 1 liên kết [<a href="logout">Đăng xuất</a>]';
	
	//Send user info into mySQL
	$check_user = mysql_query("SELECT * FROM `facebook` WHERE `id` = '$user_id'"); //Check user exists in SQL
    if(mysql_fetch_array($check_user) !== false){
		null;
		} else {
		//User no have in mySQL
		$user_facebook = "INSERT INTO `facebook`(`id`, `name`, `token`) VALUES ('$user_id','$name_user','$accessToken')";
		if (mysql_query($user_facebook)) {
		null;
		} else {
		echo "Error: " . $user_facebook . "<br>" . mysqli_error($con);
		}
	}
	} else {
	$check = 'Chào bạn! Bạn chưa đăng nhập.';
	$loginUrl = $helper->getLoginUrl('https://'.$domain.'/login.php', $permissions);
}
?>