<!DOCTYPE html>
<html lang="en">

<head>
<?php 
    session_start();
    include '../conn.php';
    if (isset($_COOKIE['id']) && isset($_COOKIE['pass'])){
        $id = $_COOKIE['id'];
        $pass = $_COOKIE['pass'];

        $sql = mysqli_query($koneksi, "SELECT email FROM tb_akun WHERE id = $id");
        $row = mysqli_fetch_assoc($sql);

            if ($key = $row['password']) { 
                $_SESSION['login'] = true;
            }
    }

    if (isset($_SESSION["login"])) {
        header("Location: index.php");
    }
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="../assets/img/ngekos_logo.PNG" rel="icon">

<title>Admin_ngekos.com</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <h1 class="logo me-auto"><img src="../assets/img/ngekos_logo.PNG" width="40px"></h1>            
        </div>
    </nav>

    <div class="container py-5">

        <!-- Outer Row -->
        <div class="row justify-content-center py-4">

            <div class="col-xl-10 col-lg-12 col-md-9 py-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 text-center d-none d-lg-block py-5">
                                 <img src="../assets/img/ngekos_logo.PNG" class="img-fluid" alt="Sample image" width="400px">
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hallo Admin!</h1>
                                    </div>
                                    <form class="user" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" 
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                            placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember">
                                                <label class="custom-control-label">Remember Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block"> 
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
if (isset($_POST["login"])) {

$email = $_POST["email"];
$pass = mysqli_real_escape_string($koneksi,md5($_POST['password']));

$sql = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE email='$email'");
$cek_akun = mysqli_num_rows($sql);
$data_akun = mysqli_fetch_assoc($sql);
$password = $data_akun['password'];
$id = $data_akun['id_admin'];

    if ($cek_akun>0) {
        if ($pass == $password) {
          $_SESSION['email']=$email;
          $_SESSION['id']=$id;
            
            if (isset($_POST["remember"])) {
                setcookie('id', $id, time() + 60);
                setcookie('pass', $password, time() + 60);
            }
            echo"<script>
                    alert('login berhasil);
                </script>";
            echo "<script>location='index.php'</script>";
        }else{
        echo"<script>
                alert('password Anda salah');
            </script>";
            echo "<script>location='login.php'</script>";
        }
    }
    echo"<script>
            alert('Akun belum terdaftar');
        </script>";
        echo "<script>location='login.php'</script>";
}
?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>