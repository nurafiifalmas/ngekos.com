<!DOCTYPE html>
<html>
<head>
<?php 
    session_start();
    include 'conn.php';
	  if(isset($_SESSION['email'])){
      header('location:customer/');
	}
?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ngekos.com</title>
    <link href="assets/img/ngekos_logo.PNG" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="main.js"></script>
</head>
<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light shadow nav-bg">
        <div class="container d-flex justify-content-between align-items-center">

            <h1 class="logo me-auto"><img src="assets/img/ngekos_logo.PNG" width="40px"></h1>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ngekos_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="ngekos_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=tentang">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=kost">Kost</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=kontak">Kontak</a>
                        </li>
                    </ul>
                </div>
                <a href="index.php?p=login" class="w3-button w3-white w3-border w3-round-large"><i class='fas fa-user-circle'></i>masuk</a>
            </div>            
        </div>
    </nav>

    <?php
    include 'conn.php';
		if(@$_GET['p']==""){
			include_once 'beranda.php';
		}
		elseif(@$_GET['p']=="beranda"){
			include_once 'beranda.php';
    }
		elseif(@$_GET['p']=="tentang"){
			include_once 'tentang_kami.php';
    }
		elseif(@$_GET['p']=="kost"){
			include_once 'kost.php';
    }
		elseif(@$_GET['p']=="detail"){
      $query = mysqli_query($koneksi,"SELECT * FROM tb_kos JOIN tb_pemilik_kos
      ON tb_kos.id_pemilik_kos = tb_pemilik_kos.id_pemiliik_kos WHERE tb_kos.id_kos ='".$_GET['id']."'");
      while ($data = mysqli_fetch_assoc($query)) {
        include_once 'detail_kost.php';
      }
    }
		elseif(@$_GET['p']=="kontak"){
			include_once 'kontak.php';
    }
		elseif(@$_GET['p']=="pesan_kos"){
			include_once 'pesanan.php';
    }

    // login & register
		elseif(@$_GET['p']=="login"){
			include_once 'login.php';
    }
		elseif(@$_GET['p']=="registrasi"){
			include_once 'registrasi.php';
    }
    ?>
<footer id="footer" class="text-white text-center text-lg-start">
  <div class="container py-1">
    <div class="row py-2">
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0 p-3">
        <h5 class="text bold">ngekos.com</h5>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0 p-3">
        <h5 class="text bold">Kantor</h5>

        <ul href="" class="list-unstyled">
          <li>
            <a class="h5 text-white text-dark nonunderline">Ds. Lebak Ayu, Kec. Sawahan, Kab. Madiun, Jawa Timur, Indonesia</a>
          </li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0 p-3">
        <h5 class="text bold">Kontak</h5>

        <ul class="list-unstyled">
          <li>
            <a href="mailto:ngekos_official@gmail.com" class="h5 text-white text-dark text-link">ngekos_official@gmail.com</a>
          </li>
          <li>
            <a href="https://wa.me/+6281337224717" class="h5 text-white text-dark text-link">+6281719873921</a>
          </li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-md-0 p-3">
        <h5 class="text bold">Sosial Media</h5>

        <ul class="list-unstyled">
          <li>
            <a href="" class="me-2 text-reset"><i class="fab fa-twitter"></i></a>
            <a href=""class="me-2 text-reset"><i class="fab fa-instagram"></i></a>
            <a href=""class="me-2 text-reset"><i class="fab fa-tiktok"></i></a>
            <a href=""class="me-2 text-reset"><i class="fab fa-facebook"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="text-center p-3">
    © 2022 Copyright:
    <a class="text-white text-dark nonunderline bold" href="#">Emerof-R_Reborn</a>
  </div>
</footer>
</body>
</html>