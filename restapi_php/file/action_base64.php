<?php

if (isset($_FILES['foto'])) {

  $nama = $_POST['nama'];
  $jurusan = $_POST['jurusan'];
  $usia = $_POST['usia'];
  $alamat = $_POST['alamat'];

  // data gambar
  $file_nama = $_FILES['foto']['name'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  // init gambar
  $data_part = pathinfo($file_nama);
  $data_foto = file_get_contents($file_tmp);
  $data_ext = $data_part['extension'];

  // ubah jadi string
  $foto_base64 = base64_encode($data_foto);

  // echo $foto_base64;

  // input post
  $input_post = [
    'nama' => $nama,
    'jurusan' => $jurusan,
    'usia' => $usia,
    'alamat' => $alamat,
    'fotostr' => $foto_base64,
    'extfoto' => $data_ext
  ];

  // buat curl 
  $curl = curl_init();
  curl_setopt_array($curl, [

    CURLOPT_URL => 'http://localhost/api/restapi_php/file/base64.php',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $input_post,
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);

  if ($err) {

    var_dump($err);
  } else {

    var_dump($response);
  }
}
