<!DOCTYPE html>
<html lang="en">

<head>

<?php 
    include "includes/config.php";
    ob_start(); //merupakan fungsi untuk mengaktifkan penyimpanan
    session_start();

    if(isset($_POST['login']))
    {
        $adminemail = $_POST['adminEMAIL'];
        $adminpassword = $_POST['adminPASSWORD'];
        $result = mysqli_query($connection, "SELECT * FROM admin WHERE adminEMAIL = '$adminemail' AND adminPASSWORD = '$adminpassword'");
        if(mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['adminEMAIL'] = $adminemail;
            $_SESSION['adminPASSWORD'] = $adminpassword;
            
            header("location:index.php");
        }
    }

?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Our styles -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="mb-4">Welcome Back!</h1>
                    </div>
                    <form method="POST" class="user">
                        <div class="form-group">
                            <input type="email" name="adminEMAIL" class="form-control form-control-user"
                                id="adminEMAIL" placeholder="Enter Email Address...">
                        </div>
                        <div class="form-group">
                            <input type="password" name="adminPASSWORD" class="form-control form-control-user"
                                id="adminPASSWORD" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-danger btn-user btn-block" name="login">Login</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

<?php 
mysqli_close($connection);
ob_end_flush();
?>

</html>