<?php

session_start();

if (isset($_POST['submit'])) {

  // tangkap inputan
  $uname = $_POST['user'];
  $pwd = $_POST['pass'];

  // get from database 
  $server = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'restful_php';

  //connection
  $conn = new mysqli($server, $user, $pass, $db);

  //query
  $sql = "SELECT * FROM admin WHERE nama = '$uname' AND pass = '$pwd'";
  $getData = $conn->query($sql);

  // session
  if ($getData->num_rows > 0) {

    $_SESSION['user'] = $uname;
    $_SESSION['pass'] = $pwd;
  } else {

    echo 'login salah';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>token</title>
</head>

<body>
  <form action="./key_generate.php" method="post">
    <input type="hidden" name="user" value="<?= $_SESSION['user']; ?>">
    <input type="hidden" name="pass" value="<?= $_SESSION['pass']; ?>">

    <h1>the token/key api</h1>

    <!-- button -->
    <button type="submit" name="submit">generate the token</button>
  </form>
</body>

</html>