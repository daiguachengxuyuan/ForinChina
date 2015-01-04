<?php
session_start();
$userName = $_POST["userName"];
$passWord = $_POST["passWord"];
$verifyCode = $_POST["verifyCode"];
$queryString = "select name=$userName and password=$passWord from user_info";

$mysqli = new mysqli("127.0.0.1","root","520025","ForinChina");
$result = $mysqli->query($queryString);

if(!$result){
  echo "username or password wrong!";
  exit;
}

if($verifyCode != $_SESSION['authnum_session']){
  echo "verifyCode is wrong!";
}
$_SESSION['user'] = $userName;
