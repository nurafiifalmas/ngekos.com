<?php 
    session_start();
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

<section class="py-5">
  <div class="container-fluid h-custom py-5">
    <div class="row d-flex justify-content-center align-items-center py-5">
      <div class="col-md-9 col-lg-6 col-xl-5 text-center">
        <img src="assets/img/ngekos_logo.PNG" class="img-fluid" alt="Sample image" width="300px">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      
        <form method="POST" enctype="multipart/form-data">
          <div class="divider d-flex align-items-center my-4">
            <p class="h3 text-center fw-bold mx-3 mb-0">Form Login</p>
          </div>

          <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control form-control-lg"
              placeholder="Email" required/>
          </div>

          <div class="form-outline mb-3">
            <input type="password" name="password" class="form-control form-control-lg"
              placeholder="Password" required/>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" name="remember"/>
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" name="login" value="Login" class="btn btn-user btn-block bg-default text-white"> 
            <p class="small fw-bold mt-2 pt-1 mb-0 py-1">Belum punya akun? <a href="index.php?p=registrasi" class="link-primary">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

<?php
if (isset($_POST["login"])) {

$email = $_POST["email"];
$pass = mysqli_real_escape_string($koneksi,md5($_POST['password']));

$sql = mysqli_query($koneksi,"SELECT * FROM tb_customer WHERE email='$email'");
$cek_akun = mysqli_num_rows($sql);
$data_akun = mysqli_fetch_assoc($sql);
$password = $data_akun['password'];
$id = $data_akun['id_customer'];

    if ($cek_akun>0) {
        if ($pass == $password) {
          $_SESSION['email']=$email;
          $_SESSION['id']=$id;
            
            if (isset($_POST["remember"])) {
                setcookie('id', $id, time() + 60);
                setcookie('pass', $password, time() + 60);
            }
            echo "<script>location='customer/'</script>";
        }else{
        echo"<script>
                alert('password Anda salah');
            </script>";
            echo "<script>location='index.php?p=login'</script>";
        }
    }
    echo"<script>
            alert('Akun belum terdaftar');
        </script>";
        echo "<script>location='index.php?p=login'</script>";
}
?>