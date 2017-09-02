<?php
/* >_ Developed by Vy Nghĩa */
# Page, mySQL & Database info
$domain = 'domain.com'; //your website domain
$dbhost = 'localhost';
$dbuser = 'username';
$dbpass = 'password';
$dbname = 'db_url';
$page_id = '123456789...'; //find at findmyfbid.com

# Google Short url Api key (console.developers.google.com)
$GoogleApiKey = 'Short Url Api Key';

# Facebook App Api info (developers.facebook.com)
$FacebookAppID = 'APP_ID_FB';
$FacebookAppSecret = 'APP_SECRET_FB';
$GraphApiVersion = 'v2.9'; //default

# Connect mySQL 
$con = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error()); //Error connect
  }
mysql_select_db($dbname, $con);
?>