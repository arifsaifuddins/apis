<?php

//conversi ke json
header('Content-Type:application/json');

// server method
$method = $_SERVER['REQUEST_METHOD'];

//validate
$result = [];

if ($method == 'GET') {

  // check parameter
  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // jika method sesuai
    $result['status'] = [
      'code' => 200,
      'description' => 'Request Valid'
    ];

    // get from database 
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'restful_php';

    //connection
    $conn = new mysqli($server, $user, $pass, $db);

    //query 
    $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
    // $getData = mysqli_query($conn, $sql);
    $getData = $conn->query($sql);

    // insert to array result
    $result['data'] = $getData->fetch_all(MYSQLI_ASSOC);
  } else {

    // jika param tidak sesuai
    $result['status'] = [
      'code' => 400,
      'description' => 'Params Not Valid'
    ];
  }
} else {

  // jika method tidak sesuai
  $result['status'] = [
    'code' => 400,
    'description' => 'Request Not Valid'
  ];
}

echo json_encode($result);
