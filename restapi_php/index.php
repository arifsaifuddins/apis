<?php

// get dengan cURL
// initialisation
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/restapi_php/get/get_all.php');

// grab URL and pass it to the browser
$row = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

$result = json_decode($row, true);

var_dump($result);

// echo $row;

// // get dengan file_get_contents
// $youtube = file_get_contents('http://localhost/api/restapi_php/get/get_all.php');

// // echo $youtube;

// $row = json_decode($youtube, true);

// var_dump($row);

?>

<title>RESTful API</title>
<script>
  fetch('http://localhost/api/restapi_php/get/get_all.php').then(d => d.json()).then(a => console.log(a));
</script>