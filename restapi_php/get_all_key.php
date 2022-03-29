<?php

//conversi ke json
header('Content-Type:application/json');

// // key header
// $header =  apache_request_headers();

// $key = $header['key'];

// key url
$key = $_GET['key'];

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
  // server method
  $method = $_SERVER['REQUEST_METHOD'];

  //validate
  $result = [];

  if ($method == 'GET') {

    // jika method sesuai
    $result['status'] = [
      'code' => 200,
      'description' => 'Request Valid'
    ];

    //query
    $sql = 'SELECT * FROM mahasiswa ';
    $getData = mysqli_query($conn, $sql);
    // $getData = $conn->query($sql);

    // insert to array result
    $result['data'] = $getData->fetch_all(MYSQLI_ASSOC);
  } else {

    // jika method tidak sesuai
    $result['status'] = [
      'code' => 400,
      'description' => 'Request Not Valid'
    ];
  }
} else {

  $result['status'] = [
    'code' => 400,
    'description' => 'key Not Valid'
  ];
}

echo json_encode($result);
