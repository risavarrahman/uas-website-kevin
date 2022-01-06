<!DOCTYPE html>
<?php 
  include "includes/config.php";
  $query = mysqli_query($connection, "SELECT * FROM area");

  $query1 = mysqli_query($connection, "SELECT * FROM kategori");
  
  $destinasi = mysqli_query($connection, "SELECT *
    FROM kategori, destinasi, fotodestinasi
    WHERE kategori.kategoriID = destinasi.kategoriID
    AND destinasi.destinasiID = fotodestinasi.destinasiID");

  $sql = mysqli_query($connection, "SELECT * FROM destinasi");
  $jumlah = mysqli_num_rows($sql);

  $foto = mysqli_query($connection, "SELECT * FROM fotodestinasi");
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pesona UAS</title>
  </head>
  <body>

<!-- AWAL MENU -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #fbde25;">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/Website_Kevin/PHP_SESI8/images/logo.jpg" alt="" width="150">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php if(mysqli_num_rows($query1) > 0) {
          while ($row = mysqli_fetch_array($query1))
          { ?>
            <a class="dropdown-item" href="#"><?php echo $row["kategoriNAMA"]?></a>
          <?php } } ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Events
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="events.php">Calender of Events</a>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- AKHIR MENU -->
  

<!-- SLIDER -->
<div class="container mt-3">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/Website_Kevin/PHP_SESI8/images/slide 1.jpg" class="d-block w-100" alt="doraemon">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/Website_Kevin/PHP_SESI8/images/slide 2.jpg" class="d-block w-100" alt="doraemon">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/Website_Kevin/PHP_SESI8/images/slide 3.jpg" class="d-block w-100" alt="doraemon">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="break-line mt-5"><hr></div>
</div>

<!-- AKHIR SLIDER -->

<!-- MEMBUAT TAMPILAN OBYEK -->

<div class="container mt-3">
  <div class="row">
    <div class="col-sm-8">
      <?php if(mysqli_num_rows($destinasi) > 0){
        while($row2 = mysqli_fetch_array($destinasi)) {
      ?>
      <div class="card mb-3" style="max-width: 980px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/Website_Kevin/PHP_SESI8/images/<?= $row2['fotofile']; ?>" class="img-fluid rounded-start" alt="Wisata">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $row2['destinasiNAMA']; ?></h5>
              <p class="card-text"><small class="text-muted"><?= $row2['destinasiALAMAT']; ?></small></p>
              <p class="card-text"><?= $row2['kategoriKET']; ?></p>
            </div>
          </div>
        </div>
      </div>
      <?php } } ?>  
    </div>
    <div class="col-sm-4">
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Jumlah Obyek Wisata
          <span class="badge rounded-pill bg-primary"><?= $jumlah; ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Dapibus ac facilisis in
          <span class="badge rounded-pill bg-primary">2</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Morbi leo risus
          <span class="badge rounded-pill bg-primary">1</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="break-line mt-5"><hr></div>
</div>

<!-- END OBYEK -->

<!-- GALERI -->

  <div class="container">
    <h2 class="display-6 fw-bold mb-3">Galeri</h2>
    <div class="row row-cols-2 row-cols-sm-4 row-cols-lg-4 g-3 g-lg-4">
      <figure class="figure">
        <img src="/Website_Kevin/PHP_SESI8/images/red.jpg" class="figure-img img-fluid rounded" alt="Galeri">
        <h5 class="modal-title" id="exampleModalLabel">Red</h5>
      </figure>
      <figure class="figure">
        <img src="/Website_Kevin/PHP_SESI8/images/blue.jpg" class="figure-img img-fluid rounded" alt="Galeri">
        <h5 class="modal-title" id="exampleModalLabel">Blue</h5>
      </figure>
      <figure class="figure">
        <img src="/Website_Kevin/PHP_SESI8/images/orange.jpg" class="figure-img img-fluid rounded" alt="Galeri">
        <h5 class="modal-title" id="exampleModalLabel">Orange</h5>
      </figure>
      <figure class="figure">
        <img src="/Website_Kevin/PHP_SESI8/images/green.jpg" class="figure-img img-fluid rounded" alt="Galeri">
        <h5 class="modal-title" id="exampleModalLabel">Green</h5>
      </figure>

    </div>
    <div class="row justify-content-center">
      

      <a class="btn btn-primary col-md-4 mt-3" href="index2.php">More..</a>
      

    </div>
    
  </div>
  <div class="break-line mt-5"><hr></div>

<!-- END GALERI -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>