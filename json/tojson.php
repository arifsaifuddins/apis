<?php

// $mahasiswa = [
//   [
//     "nama" => "arief",
//     "nrp" => "938948228",
//     "email" => "arief@mail.com",
//   ],
//   [
//     "nama" => "dodo",
//     "nrp" => "938948228",
//     "email" => "dodo@mail.com",
//   ],
//   [
//     "nama" => "hanif",
//     "nrp" => "938948228",
//     "email" => "hanif@mail.com",
//   ],
//   [
//     "nama" => "aldi",
//     "nrp" => "938948228",
//     "email" => "aldi@mail.com",
//   ],
//   [
//     "nama" => "umar",
//     "nrp" => "938948228",
//     "email" => "umar@mail.com",
//   ],
//   [
//     "nama" => "alif",
//     "nrp" => "938948228",
//     "email" => "alif@mail.com",
//   ],
// ];

// array
// var_dump($mahasiswa);

$dbh = new PDO( 'mysql:host=localhost;dbname=basicphp', 'root', '' );
$db = $dbh->prepare( 'SELECT * FROM mahasiswa' );
$db->execute();

$mahasiswa = $db->fetchAll( PDO::FETCH_ASSOC );

// array to json
$data = json_encode( $mahasiswa );
print_r( $data );

?>