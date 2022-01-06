<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESTINASI WISATA</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<?php
    include "includes/config.php";
    if(isset($_POST['Simpan']))
    {
      $fotokode = $_POST['fotokode'];
      $fotonama = $_POST['fotonama'];
      $destinasiid = $_POST['destinasiid'];

      $fotofile = $_FILES['fotofile']['name'];
      $file_tmp = $_FILES["fotofile"]["tmp_name"];

      $ekstensifile = pathinfo($fotofile, PATHINFO_EXTENSION);

      //PERIKSA EKSTEN FILE HARUS JPG, jpg atau png
      if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png"))
      {
        move_uploaded_file($file_tmp, '/Website_Kevin/ADMIN/img/'.$fotofile); //unggah file ke folder images
        mysqli_query($connection, "INSERT INTO fotodestinasi VALUES ('', '$fotokode',
        '$fotonama', '$destinasiid', '$fotofile')");
        header("location:photodestinasi.php");
      }
    }

    $datadestinasi = mysqli_query($connection, "SELECT * FROM destinasi");
?>
<body>
<?php include "header.php";?>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Input Photo Destinasi Wisata</h1>
    </div>
  </div>

  <form method="POST" enctype="multipart/form-data">
    <div class="form-group row">
      <label for="fotokode" class="col-sm-2 col-form-label">Kode Photo</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fotokode" name="fotokode" placeholder="Kode Photo" maxlength="4" required>
      </div>
    </div>

    <div class="form-group row">
      <label for="fotonama" class="col-sm-2 col-form-label">Nama Photo</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="fotonama" name="fotonama" placeholder="Nama Photo" required>
      </div>
    </div>

    <div class="form-group row">
      <label for="destinasiid" class="col-sm-2 col-form-label">Nama Destinasi</label>
      <div class="col-sm-10">
      <select class="form-control" id="destinasiid" name="destinasiid">
        <?php while($row = mysqli_fetch_array($datadestinasi))
        { ?>
            <option value="<?php echo $row["destinasiID"]?>">
                <?php echo $row["destinasiID"]?>
                <?php echo $row["destinasiNAMA"]?>
            </option>
        <?php } ?>

      </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="fotofile" class="col-sm-2 col-form-label">Photo Wisata</label>
      <div class="col-sm-10">
        <input type="file" id="fotofile" name="fotofile">
        <p class="help-block">Field ini digunakan untuk unggah file</p>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2"></div>
      <div class="col-sm-10">
          <input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
          <input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
      </div>
    </div>

  </form>

</div>
<div class="col-sm-1"></div>
</div>

<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Daftar Photo Destinasi Wisata</h1>
      </div>
    </div>

  <table class="table table-hover table-danger">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Kode Photo</th>
        <th>Nama Photo Wisata</th>
        <th>Kode Destinasi</th>
        <th>Photo Destinasi</th>
        <th colspan="2" style="text-align: center">Action</th>
      </tr>
    </thead>

    <tbody>
      <?php $query = mysqli_query($connection, "SELECT * FROM fotodestinasi");
      $nomor = 1;
      while ($row = mysqli_fetch_array($query))
      { ?>
          <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $row['fotoKODE'];?></td>
            <td><?php echo $row['fotoNAMA'];?></td>
            <td><?php echo $row['destinasiID'];?></td>
            <td>
              <img src="/Website_Kevin/ADMIN/img/<?php echo $row['fotofile']?>" style="width: 80px;">
            </td>

            <td>
              <a href="photodestinasiubah.php?ubahfoto=<?php echo $row['fotoID']?>" class="btn btn-success btn-sm" title="EDIT">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
              </a>
            </td>

            <td>
              <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="photodestinasihapus.php?hapusfoto=<?php echo $row['fotoID']?>" class="btn btn-danger btn-sm" title="DELETE">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
              </a>
            </td>
          </tr>
      <?php $nomor = $nomor + 1;?>
      <?php } ?>
    </tbody>

  </table>
  </div>

  <div class="col-sm-1"></div>

</div>

<?php include "footer.php";?>
</body>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</html>