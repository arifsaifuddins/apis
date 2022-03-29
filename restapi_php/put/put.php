<?php

// // echo file_get_contents("php://input");

//conversi ke json
header('Content-Type:application/json');

// server method
$method = $_SERVER['REQUEST_METHOD'];

//validate
$result = [];

if ($method == 'PUT') {

  // pasring data buat global variable $_PUT
  parse_str(file_get_contents("php://input"), $_PUT);

  // check parameter
  if (isset($_PUT['nama']) && isset($_PUT['id']) && isset($_PUT['jurusan']) && isset($_PUT['usia']) && isset($_PUT['alamat'])) {

    // tangkap value
    $id = $_PUT['id'];
    $nama = $_PUT['nama'];
    $jurusan = $_PUT['jurusan'];
    $usia = $_PUT['usia'];
    $alamat = $_PUT['alamat'];

    // jika method sesuai
    $result['status'] = [
      'code' => 200,
      'description' => 'One Data Updated'
    ];

    // get from database 
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'restful_php';

    //connection
    $conn = new mysqli($server, $user, $pass, $db);

    //query 
    $sql = "UPDATE mahasiswa SET 
      nama = '$nama',
      jurusan = '$jurusan',
      usia = '$usia',
      alamat = '$alamat'
      WHERE id = '$id' 
      ";
    // mysqli_query($conn, $sql);
    $conn->query($sql);

    // show to array result
    $result['new'] = [
      'nama' => $nama,
      'jurusan' => $jurusan,
      'usia' => $usia,
      'alamat' => $alamat
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
