<?php

// // echo file_get_contents("php://input");

//conversi ke json
header('Content-Type:application/json');

// server method
$method = $_SERVER['REQUEST_METHOD'];

//validate
$result = [];

if ($method == 'DELETE') {

  // pasring data buat global variable $_DELETE
  parse_str(file_get_contents("php://input"), $_DELETE);

  // check parameter
  if (isset($_DELETE['id'])) {

    // tangkap value
    $id = $_DELETE['id'];

    // jika method sesuai
    $result['status'] = [
      'code' => 200,
      'description' => 'One Data Deleted'
    ];

    // get from database 
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'restful_php';

    //connection
    $conn = new mysqli($server, $user, $pass, $db);

    //query 
    $sql = "DELETE FROM mahasiswa WHERE id = '$id'";
    // mysqli_query($conn, $sql);
    $conn->query($sql);

    // show to array result
    $result['new'] = [
      'id' => $id . ' was deleted',
    ];
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
    'description' => 'Method Not Valid'
  ];
}

echo json_encode($result);
