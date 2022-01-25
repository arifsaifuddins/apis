<?php

//conversi ke json
header('Content-Type:application/json');

// server method
$method = $_SERVER['REQUEST_METHOD'];

//validate
$result = [];

if ($method == 'POST') {

  // check parameter
  if (isset($_POST['nama']) && isset($_POST['jurusan']) && isset($_POST['usia']) && isset($_POST['alamat'])) {

    // tangkap params
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $usia = $_POST['usia'];
    $alamat = $_POST['alamat'];

    // jika method sesuai
    $result['status'] = [
      'code' => 200,
      'description' => 'One Data Inserted'
    ];

    // get from database 
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'restful_php';

    //connection
    $conn = new mysqli($server, $user, $pass, $db);

    //query 
    $sql = "INSERT INTO mahasiswa (nama, jurusan, usia, alamat) VALUES('$nama', '$jurusan', '$usia', '$alamat')";
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
