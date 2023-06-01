<?php
$user ='root';
$pass='';
$db='testdb';

$db=new mysqli('localhost',$user,$pass,$db) or die("unable to connect");
$_SESSION['user_logged_in'] = TRUE;
echo "Welcome to php"

?>