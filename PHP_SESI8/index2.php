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
    <a class="navbar-brand" href="index.php">
      <img src="/Website_Kevin/PHP_SESI8/images/logo.jpg" alt="" width="150">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
  



<!-- GALERI -->

  <div class="container">
    <h2 class="display-6 fw-bold mb-3">Galeri</h2>
    <div class="row row-cols-2 row-cols-sm-4 row-cols-lg-4 g-3 g-lg-4">
    <?php if(mysqli_num_rows($foto) > 0){
      while($row3 = mysqli_fetch_assoc($foto)) {
      ?>
      <figure class="figure">
        <img src="/Website_Kevin/PHP_SESI8/images/<?= $row3['fotofile']; ?>" class="figure-img img-fluid rounded" alt="Galeri">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <?= $row3['fotoNAMA']; ?>
        </button>
      
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <img src="/Website_Kevin/PHP_SESI8/images/<?= $row3['fotofile']; ?>" class="figure-img img-fluid rounded" alt="Galeri">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $row3['fotoNAMA']; ?></h5>
                  </div>
                </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
      </figure>
      <?php } } ?>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
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