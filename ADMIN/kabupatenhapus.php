<?php 
    include "includes/config.php";
    if(isset($_GET['hapus']))
    {
        $kodekabupaten = $_GET["hapus"];
        $hapusdata = mysqli_query($connection, "select * from kabupaten where kabupatenID = '$kodekabupaten'");
        $hapus = mysqli_fetch_array($hapusdata);
        $namafoto = $hapus['kabupatenfoto'];

        mysqli_query($connection, "DELETE FROM kabupaten WHERE kabupatenID = '$kodekabupaten'");
        unlink('../images/'.$namafoto);
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='kabupaten.php'</script>";
    }
?>