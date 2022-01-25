<?php

$header =  apache_request_headers();

$key = $header['key'];

// get from database 
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'restful_php';

//connection
$conn = new mysqli($server, $user, $pass, $db);

//query
$sql = "SELECT * FROM admin WHERE token = '$key'";
$getData = $conn->query($sql);

// session
if ($getData->num_rows > 0) {

  echo 'key valid';
} else {

  echo 'key salah';
}
