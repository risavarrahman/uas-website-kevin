<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVINSI</title>
</head>

<?php 
ob_start();
session_start();
if(!isset($_SESSION['adminEMAIL']))
    header("location:login.php");
?>

<?php include "header.php";?>

<div class="container-fluid">
<div class="card shadow mb-4">

<?php 
include "includes/config.php";

$provinsiid = $_GET["ubah"];

if(isset($_POST['Batal']))
{
    header("location:provinsi.php");
}

if(isset($_POST['Edit']))
{
    $provinsikode   = $_POST['provinsikode']; 
    $provinsinama   = $_POST['provinsinama'];
    $provinsialamat = $_POST['provinsialamat'];
    $provinsiket    = $_POST['provinsiket'];
    
    $sql = mysqli_query($connection, "UPDATE provinsi SET
    provinsiKODE    ='$provinsikode', 
    provinsiNAMA    ='$provinsinama', 
    provinsiALAMAT  ='$provinsialamat', 
    provinsiKET     ='$provinsiket' 
    WHERE provinsiID='$provinsiid'");
    header("location:provinsi.php");
}

$dataprovinsi = mysqli_query($connection, "SELECT * FROM provinsi");
$datakategori = mysqli_query($connection, "SELECT * FROM kategori");
$dataarea = mysqli_query($connection, "SELECT * FROM area");

$editprovinsi = mysqli_query($connection, "SELECT * FROM provinsi WHERE provinsiID = '$provinsiid'");
$rowedit = mysqli_fetch_array($editprovinsi);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provinsi</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<div class="row">
<div class="col-sm-1">
</div>
<div class="col-sm-10">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Edit Provinsi</h1>
            </div>
        </div> <!-- penutup jumbotron -->

<form method="POST">
  <div class="form-group row">
    <label for="provinsiid" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="provinsiid" name="provinsiid" value="<?php echo $rowedit["provinsiID"]?>" maxlength="4" disabled>
    </div>
  </div>

  <div class="form-group row">
    <label for="provinsikode" class="col-sm-2 col-form-label">Kode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="provinsikode" name="provinsikode" value="<?php echo $rowedit["provinsiKODE"]?>" maxlength="4" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="provinsinama" class="col-sm-2 col-form-label">Nama Provinsi</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="provinsinama" id="provinsinama" value="<?php echo $rowedit["provinsiNAMA"]?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="provinsialamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="provinsialamat" id="provinsialamat" value="<?php echo $rowedit["provinsiALAMAT"]?>" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="provinsiket" class="col-sm-2 col-form-label">Keterangan</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="provinsiket" id="provinsiket" required><?php echo $rowedit["provinsiKET"]?></textarea>
    </div>
  </div>

  

  <div class="form-group row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
        <input type="submit" class="btn btn-success" value="Update" name="Edit">
        <input type="submit" class="btn btn-danger" value="Batal" name="Batal">
    </div>
  </div>

</form>
</div>

<div class="col-sm-1">
</div>
</div> <!-- penutup class row -->

<!-- memulai dengan menampilkan data -->
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Daftar Provinsi</h1>
                <h2>Hasil Entri data pada Tabel Provinsi</h2>
            </div>
        </div> <!-- penutup jumbotron -->

    <form method="POST">
        <div class="form-group row mb-2">
            <label for="search" class="col-sm-3">Nama Provinsi</label>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Provinsi">
            </div>
            <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
        </div>
    </form>

    <table class="table table-hover table-danger">
        <thead class="thead-dark">
            <tr>
                <th>Nomor</th>
                <th>Kode</th>
                <th>Nama Provinsi</th>
                <th>Alamat Provinsi</th>
                <th>Keterangan</th>
                <th colspan="2" style="text-align: center">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php  
        if(isset($_POST["kirim"]))
        {
            $search = $_POST['search'];
            $query = mysqli_query($connection, "SELECT * FROM provinsi
                where provinsiNAMA like '%".$search."%'");
        }else
            {
                $query = mysqli_query($connection, "SELECT * FROM provinsi");
            }

            $nomor = 1;
            while ($row = mysqli_fetch_array($query))
            { ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $row['provinsiKODE'];?></td>
                    <td><?php echo $row['provinsiNAMA'];?></td>
                    <td><?php echo $row['provinsiALAMAT'];?></td>
                    <td><?php echo $row['provinsiKET'];?></td>
<!-- untuk icon edit dan delete -->
<td>
<a href="provinsiedit.php?ubah=<?php echo $row["provinsiID"]?>"
  class="btn btn-success btn-sm" title="EDIT">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
</a>
</td>

<td>
<a href="provinsihapus.php?hapus=<?php echo $row["provinsiID"]?>"
  class="btn btn-danger btn-sm" title="HAPUS">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
</a>
</td>

<!-- akhir icon edit dan delete -->
                    
                </tr>
            <?php $nomor = $nomor + 1;?>
            <?php } ?>
        </tbody>
    </table>

    </div>
    <div class="col-sm-1"></div>

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#kodekategori').select2({
            allowClear: true,
            placeholder: "Pilih Kategori Wisata"
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#kodearea').select2({
            allowClear: true,
            placeholder: "Pilih Area Wisata"
        });
    });
</script>

</div>
</div> <!-- penutup container-fluid -->
<?php include "footer.php";?>
<?php 
mysqli_close($connection);
ob_end_flush();
?>
</html>