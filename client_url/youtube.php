<?php

// Youtube API
$youtube = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=snippet&id=UCII3AozmHo0vA5W1E0rBiNw&key=AIzaSyATfBeJH7ND8fXhnfnGd3w9VCzrVYZOhRo');

$row = json_decode($youtube, true);
var_dump($row);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Client URL</title>
  <link rel="stylesheet" href="main.css">
</head>

<body>

  <div class="container">
    <div class="youtube"><?= $row['items'][0]['kind']; ?></div>
  </div>

  <script>
    fetch(
      'https://www.googleapis.com/youtube/v3/channels?part=statistics,snippet&id=UCII3AozmHo0vA5W1E0rBiNw&key=AIzaSyATfBeJH7ND8fXhnfnGd3w9VCzrVYZOhRo'
    ).then(m => m.json()).then(d => console.log(d));
  </script>
</body>

</html>