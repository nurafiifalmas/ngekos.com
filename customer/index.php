<!DOCTYPE html>
<html>
<head>
<?php 
    session_start();
    include '../conn.php';
	  if(!isset($_SESSION['email'])){
        echo"<script>
                alert('Mohon untuk melakukan login dahulu');
            </script>";
            echo "<script>location='../index.php'</script>";
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

    <?php
        $query = mysqli_query($koneksi,"SELECT * FROM tb_customer WHERE id_customer = '$_SESSION[id]'");
		$row = mysqli_fetch_assoc($query);
    ?>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light shadow nav-bg">
        <div class="container d-flex justify-content-between align-items-center">

            <h1 class="logo me-auto"><img src="assets/img/ngekos_logo.PNG" width="40px"></h1>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#ngekos_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="ngekos_nav">
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
                            <a class="nav-link" href="index.php?p=daftar_pesanan">Pemesanan</a>
                        </li>
                    </ul>
                </div>
            <ul class="navbar-nav me-3">
                <li class="nav-item dropdown">
                    <a class="h4 nav-link dropdown-toggle text-muted" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="assets/img/profil/<?php echo $row['foto_customer']; ?>" class="mr-2 rounded-circle mb-2" height="30" />
                      <span class="d-none d-lg-inline text-gray-600 small"><?php echo $row['nama_customer']; ?></span>                
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="h4 dropdown-item" href="index.php?p=profil">
                                <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profil
                            </a>
                            <a class="h4 dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Keluar
                            </a>
                        </ul>
                </li> 
            </ul>
            </div>            
        </div>
    </nav>

    <?php
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
		elseif(@$_GET['p']=="pesan_kos"){
      $sql_cek_pesanan = mysqli_query($koneksi,"SELECT * FROM tb_pembayaran JOIN tb_pesan
      ON tb_pembayaran.id_pesan = tb_pesan.id_pesan  WHERE tb_pembayaran.status_pembayaran ='Belum dibayar' AND tb_pesan.id_customer ='$_SESSION[id]'");
      $cek_pesanan = mysqli_num_rows($sql_cek_pesanan);

        if ($cek_pesanan>0) {
            echo "<script>alert('Silahkan melakukan pembayaran terlebih dahulu untuk menyelesaikan transaksi')</script>";
            echo "<script>location='index.php?p=daftar_pesanan'</script>";
        }else {
          $query_select = mysqli_query($koneksi,"SELECT * FROM tb_kos WHERE id_kos ='".$_GET['id']."'");
          $data = mysqli_fetch_assoc($query_select);

          $id_customer = $_SESSION['id'];
          $id_kos = $data['id_kos'];
          $tanggal = date("Y-m-d");

          $query_insert = mysqli_query($koneksi,"INSERT INTO tb_pesan
          VALUES (NULL,'$id_kos','$id_customer','$tanggal','baru')");
      
          if($query_insert){
            $sql = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_kos
            ON tb_pesan.id_kos = tb_kos.id_kos WHERE tb_pesan.id_customer ='$_SESSION[id]' AND tb_pesan.status_pemesanan ='baru'");
            $data_harga = mysqli_fetch_assoc($sql);

            $id_pesan = $data_harga['id_pesan'];
            $harga_sewa = $data_harga['harga_sewa'];

            $hari = date("d");
            $nomor_random = rand(01, 100);
            $kode_pembayaran = 'KK'.$hari.'N'.$nomor_random;
       
            $query_insert_pembayaran = mysqli_query($koneksi,"INSERT INTO tb_pembayaran
            VALUES (NULL,'$id_pesan','$harga_sewa','Belum dibayar','$kode_pembayaran')");

            echo "<script>alert('Pesanan Anda berhasil, lakukan pembayaran terlebih dahulu untuk melakukan pemesanan selanjutnya  ')</script>";
            echo "<script>location='index.php?p=daftar_pesanan'</script>";
          }else{
            echo "<script>alert('Pe')</script>";
          }
        }          
    }
		elseif(@$_GET['p']=="daftar_pesanan"){
			include_once 'pesanan.php';
    }
    elseif(@$_GET['p']=="detail_pemesanan"){
        $query_kos = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_kos
        ON tb_pesan.id_kos = tb_kos.id_kos JOIN tb_pembayaran
        ON tb_pesan.id_pesan = tb_pembayaran.id_pesan JOIN tb_pemilik_kos
        ON tb_kos.id_pemilik_kos = tb_pemilik_kos.id_pemiliik_kos 
        WHERE tb_pesan.id_pesan ='".$_GET['id']."'");

            while($data_pesanan_selesai = mysqli_fetch_assoc($query_kos)){ 
                include_once 'detail_pemesanan.php';
            }
    }
    elseif(@$_GET['p']=="batal_pemesanan"){
        $query_pesanan = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_pembayaran
        ON tb_pesan.id_pesan = tb_pembayaran.id_pesan 
        WHERE tb_pesan.id_customer ='$_SESSION[id]' AND tb_pesan.status_pemesanan ='baru'");
        $data_pesanan= mysqli_fetch_assoc($query_pesanan);

        if ($data_pesanan) {
            $query_delete_pembayaran = mysqli_query($koneksi,"DELETE FROM tb_pembayaran WHERE id_pesan ='".$data_pesanan['id_pesan']."'");
            if ($query_delete_pembayaran) {
                $query = mysqli_query($koneksi,"DELETE FROM tb_pesan WHERE id_pesan ='".$data_pesanan['id_pesan']."'");

                echo "<script>alert('Pemesanan berhasil dibatalkan')</script>";
                echo "<script>location='index.php?p=daftar_pesanan'</script>";
            }else{
                echo "<script>alert('Pemesanan gagal dibatalkan')</script>";
                echo "<script>location='index.php?p=daftar_pesanan'</script>";
            }
        }else{
            echo "<script>alert('Pemesanan gagal dibatalkan')</script>";
            echo "<script>location='index.php?p=daftar_pesanan'</script>";
        }
    }
    elseif(@$_GET['p']=="delete_pemesanan_selesai"){
        $query_pesanan = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_pembayaran
        ON tb_pesan.id_pesan = tb_pembayaran.id_pesan 
        WHERE tb_pesan.id_pesan ='".$_GET['id']."'");
        $data_pesanan= mysqli_fetch_assoc($query_pesanan);

        if ($data_pesanan) {
            $query_delete_pembayaran = mysqli_query($koneksi,"DELETE FROM tb_pembayaran WHERE id_pesan ='".$data_pesanan['id_pesan']."'");
            if ($query_delete_pembayaran) {
                $query = mysqli_query($koneksi,"DELETE FROM tb_pesan WHERE id_pesan ='".$data_pesanan['id_pesan']."'");

                echo "<script>alert('Pemesanan berhasil dihapus')</script>";
                echo "<script>location='index.php?p=daftar_pesanan'</script>";
            }else{
                echo "<script>alert('Pemesanan gagal dihapus')</script>";
                echo "<script>location='index.php?p=daftar_pesanan'</script>";
            }
        }else{
            echo "<script>alert('Pemesanan gagal dihapus')</script>";
            echo "<script>location='index.php?p=daftar_pesanan'</script>";
        }
    }

    //profil
    elseif(@$_GET['p']=="profil"){
        $query_profil = mysqli_query($koneksi,"SELECT * FROM tb_customer
        WHERE id_customer ='$_SESSION[id]' ");
            while($profile = mysqli_fetch_assoc($query_profil)){ 
                include_once 'profil.php';
            }
    }
    elseif(@$_GET['p']=="ubah_password_profil"){
        $query=mysqli_query($koneksi,"SELECT * FROM tb_customer 
        WHERE id_customer ='$_SESSION[id]'");
        while ($data = mysqli_fetch_assoc($query)) {
            include_once 'ubah_password.php';
        }
    }
    elseif(@$_GET['p']=="ubah_data_profil"){
        $query=mysqli_query($koneksi,"SELECT * FROM tb_customer 
        WHERE id_customer ='$_SESSION[id]'");
        while ($data_profile = mysqli_fetch_assoc($query)) {
            include_once 'ubah_data_customer.php';
        }
    }
    elseif(@$_GET['p']=="ubah_foto_profil"){       
	if(isset($_POST['ubah'])){
        $foto = $_FILES["foto"]["name"];
        $tmp = $_FILES["foto"]["tmp_name"];
        $path = "assets/img/profil/";
        
        $query=mysqli_query($koneksi,"SELECT * FROM tb_customer 
        WHERE id_customer ='$_SESSION[id]'");
        $data_foto_profil = mysqli_fetch_assoc($query);

        unlink($path.$data_foto_profil['foto_customer']);
        move_uploaded_file($tmp, $path.$foto);
        $query_ubah = mysqli_query($koneksi,"UPDATE tb_customer SET foto_customer='$foto' 
        WHERE id_customer ='$_SESSION[id]'");
                
        if($query_ubah){
            echo "<script>alert('Data berhasil diubah')</script>";
            echo "<script>location='index.php?p=profil'</script>";
        }else {
           echo "<script>alert('Data gagal diubah')</script>";
        }
    }
    }
		elseif(@$_GET['p']=="logout"){
			include_once '../logout.php';
    }

    include 'footer.php';
    ?>
                      
    <!-- Modal bayar -->
      <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PEMBAYARAN VIA TRANSFER BANK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h6 class="text-dark bold">No. Rekening</h6>
                            <h6>BCA</h6>
                            <h6>MANDIRI</h6>
                            <h6>BRI</h6>
                            <h6>BNI</h6>
                        </li><li class="list-inline-item">
                            <h6>:</h6>
                            <h6>:</h6>
                            <h6>:</h6>
                            <h6>:</h6>
                        </li>
                        <li class="list-inline-item">
                            <h6 class="text-default bold">0881530819085</h6>
                            <h6 class="text-default bold">0881530819</h6>
                            <h6 class="text-default bold">087827381937298</h6>
                            <h6 class="text-default bold">1925937298</h6>
                        </li>
                    </ul>
                    <form method="post" class="modal-content modal-body border-0 p-0" enctype="multipart/form-data">
                        <label class="text-dark bold"><span class="h3 text-danger">*</span>PERHATIAN</label>   
                        <div>
                        <p class="h4">
                            Setelah Anda melakukan pembayaran mohon untuk konfirmasi melalui nomor WhatsApp,
                            Konfirmasi dapat dilakukan dengan mengirimkan <span class="text-dark bold">BUKTI TRANSFER & KODE TRANSAKSI</span>,
                            Nomor WhatsApp : <a href="https://wa.me/+6281337224717" class="h4 text-default text-link">+6281337224717</a></p></div>
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
            </div>
        </div> 
    </div>


     <!-- Modal ubah foto profil -->
     <div class="modal fade" id="batal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"> 
                <h5 class="modal-title">Apakah Anda yakin untuk membatalkan pemesanan?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" class="modal-content modal-body border-0 p-0" enctype="multipart/form-data">
                        <label class="text-dark bold"><span class="h3 text-danger">*</span>PERHATIKAN</label>   
                        <div>
                        <p class="h4">
                            Klik tombol "Batal" untuk membatalkan pemesanan</p></div>
                    </form>
                </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</a>
                        <a type="button" class="btn btn-danger" href="index.php?p=batal_pemesanan">Batal</a>
                    </div>
            </div>
        </div>
    </div> 

     <!-- Modal batal -->
     <div class="modal fade" id="foto_profil" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"> 
                <h5 class="modal-title">Pilih foto profil Anda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php?p=ubah_foto_profil" method="post" class="modal-content modal-body border-0 p-0" enctype="multipart/form-data">
                        <div class="form-outline mb-4">
                          <input type="file" name="foto" class="form-control form-control-lg" placeholder="foto" required/>
                        </div>

                        <input type="submit" name="ubah" value="Ubah" class="btn bg-default text-white"/>
                    </form>
                </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                    </div>
            </div>
        </div>
    </div> 

    <!-- Modal logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"> 
                    <h5 class="modal-title">Apakah Anda yakin ingin keluar?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Klik tombol "Keluar" untuk keluar dari halaman.
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</a>
                    <a type="button" class="btn btn-danger" href="index.php?p=logout">Keluar</a>
                </div>
            </div>
        </div>
    </div> 
    
</body>
</html>