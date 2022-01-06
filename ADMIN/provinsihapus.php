<?php 
    include "includes/config.php";
    if(isset($_GET['hapus']))
    {
        $kodeprovinsi = $_GET["hapus"];
        mysqli_query($connection, "DELETE FROM provinsi WHERE provinsiID = '$kodeprovinsi'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='provinsi.php'</script>";
    }
?>