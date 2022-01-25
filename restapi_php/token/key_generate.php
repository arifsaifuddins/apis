<?php

// tangkap inputan
$uname = $_POST['user'];
$pwd = $_POST['pass'];
$token = md5($uname . $pwd);
$token1 = sha1($uname . $pwd);



// get from database 
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'restful_php';

//connection
$conn = new mysqli($server, $user, $pass, $db);

//query
$sql = "UPDATE admin SET token = '$token' WHERE nama = '$uname' AND pass = '$pwd'";
$getData = $conn->query($sql);

echo 'key anda = ' . $token;
echo '<br>';
echo 'key anda = ' . $token1;
