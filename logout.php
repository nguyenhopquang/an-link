<?php
/*
* Developed by Vy Nghĩa
*/
require_once 'login.php';
session_start();

unset($_SESSION["facebook_access_token"]);
header("Location: ./")
?>