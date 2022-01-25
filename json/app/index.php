<?php

$data = file_get_contents( './menu.json' );
$menu = json_decode( $data, true )['menu'];

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
  </head>

  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid container">
        <a class="navbar-brand" href="#">
          <img src="./logo.png" alt="pizza" width="30" height="24">
          Pizza JSON
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">All Menu</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row my-3">
        <div class="col">
          <h1>All Menu</h1>
        </div>
      </div>

      <div class="row">
        <?php foreach ( $menu as $m ): ?>
        <div class="col-lg-3 mr-3 mb-3">
          <div class="card">
            <img src="./img/<?=$m['gambar'];?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?=$m['nama'];?></h5>
              <p class="card-text"><?=$m['deskripsi'];?></p>
              <h5 class="card-title">Rp. <?=$m['harga'];?></h5>
              <a href="#" class="btn btn-primary">Order Now</a>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>

    <script src="./js/bootstrap.js"></script>
  </body>

</html>