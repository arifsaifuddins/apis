<?php

function cURL($url, $token) {

  $curl = curl_init($url);

  // config
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_HEADER, true);

  // GET
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json',
    $token
  ]);

  // $data = [
  //   'collection' => 'RapidAPI'
  // ];

  // // POST
  // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  // curl_setopt($curl, CURLOPT_POST, true);
  // curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
  // curl_setopt($curl, CURLOPT_HTTPHEADER, [
  //   'Content-Type: application/json'
  // ]);

  // // PUT
  // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
  // curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
  // curl_setopt($curl, CURLOPT_HTTPHEADER, [
  //   'Content-Type: application/json'
  // ]);

  // // DELETE
  // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
  // curl_setopt($curl, CURLOPT_HTTPHEADER, [
  //   $token,
  //   'Content-Type: application/json'
  // ]);

  $response = curl_exec($curl);

  curl_close($curl);
  // echo $response . PHP_EOL;

  var_dump($response);
  // var_dump(json_decode($response, true));
}

cURL("https://quranme-api.vercel.app/quran/surah/80", 'auth-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI2MmE3NTU5MTAzYzc5YzAyM2I1OTVlYjIiLCJpYXQiOjE2NTUxMzQwOTd9.eF0HAthc6ZNasRXmGcps6oF6neH5jHAfZXGRON51kAg');
