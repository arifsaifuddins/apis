<?php

$url = "https://quranme-api.vercel.app/quran/surah/80";
$token = 'auth-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2MmE3NTU5MTAzYzc5YzAyM2I1OTVlYjIiLCJpYXQiOjE2NTUxMzQwOTd9.eF0HAthc6ZNasRXmGcps6oF6neH5jHAfZXGRON51kAg';

// curl()
$ch = curl_init($url);

// config
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// GET
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  $token
]);

// $data = [
//   'collection' => 'RapidAPI'
// ];

// // POST
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($data));
// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//   'Content-Type: application/json'
// ]);

// // PUT
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
// curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($data));
// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//   'Content-Type: application/json'
// ]);

// // DELETE
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//   $token,
//   'Content-Type: application/json'
// ]);

$res = curl_exec($ch);

curl_close($ch);
// echo $res . PHP_EOL;
// var_dump($res);
var_dump(json_decode($res, true));



// // file_get_contents()
// $opts = [
//   'http' => [
//     'method'  => 'GET',   // POST, PUT, DELETE
//     'header'  => 'auth-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2MmE3NTU5MTAzYzc5YzAyM2I1OTVlYjIiLCJpYXQiOjE2NTUxMzQwOTd9.eF0HAthc6ZNasRXmGcps6oF6neH5jHAfZXGRON51kAg',
//     // 'content' => null // for POST request
//   ]
// ];

// $context  = stream_context_create($opts);
// $json = file_get_contents('https://quranme-api.vercel.app/quran/surah', false, $context);

// // var_dump(json_decode($json, true));
// echo $json . PHP_EOL;
