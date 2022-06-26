<!DOCTYPE html>
<html lang="en">

<head>
<?php 
    session_start();
    include '../conn.php';
	  if(!isset($_SESSION['email'])){
        header('location:login.php');
	}
?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../assets/img/ngekos_logo.PNG" rel="icon">

    <title>Admin_koskuy.com</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php
        $query = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin = '$_SESSION[id]'");
		$row = mysqli_fetch_assoc($query);
    ?>

    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?p=dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hallo Admin</sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?p=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                daftar data koskuy
            </div>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=tabel_admin">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=tabel_customer">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel Customer</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=tabel_pemilik_kos">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel Pemilik Kos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=tabel_kos">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel Kos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?p=tabel_transaksi">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel Transaksi</span></a>
            </li>
        </ul>


        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="mr-2 img-profile rounded-circle" src="img/foto_admin/<?php echo $row['foto']; ?>"> 
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['nama_admin']; ?></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin keluar?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Klik tombol "Keluar" untuk keluar dari halaman.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="logout.php">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>

             <?php
            include '../conn.php';
		    if(@$_GET['p']==""){
			    include_once 'dashboard.php';
		    }
		    elseif(@$_GET['p']=="dashboard"){
			    include_once 'dashboard.php';
            }
            //admin
		    elseif(@$_GET['p']=="tabel_admin"){
			    include_once 'admin/tabel_admin.php';
            }
            elseif(@$_GET['p']=="tambah_admin"){
			    include_once 'admin/tambah_data.php';
            }
            elseif(@$_GET['p']=="update_admin"){
                $query=mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin ='".$_GET['id']."'");
                while ($data = mysqli_fetch_assoc($query)) {
                    include_once 'admin/update_admin.php';
                }
            }
            elseif(@$_GET['p']=="ubah_password"){
                $query=mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin ='".$_GET['id']."'");
                while ($data = mysqli_fetch_assoc($query)) {
                    include_once 'admin/ubah_password.php';
                }
            }
            elseif(@$_GET['p']=="delete_admin"){
                $query=mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin ='".$_GET['id']."'");
                while ($data = mysqli_fetch_assoc($query)) {
                    include_once 'admin/delete_admin.php';
                }     
            }

            //kos
		    elseif(@$_GET['p']=="tabel_kos"){
			    include_once 'kos/tabel_kos.php';
            }
		    elseif(@$_GET['p']=="tambah_kos"){
			    include_once 'kos/tambah_data.php';
            }
            elseif(@$_GET['p']=="update_kos"){
                $query = mysqli_query($koneksi,"SELECT * FROM tb_kos WHERE id_kos ='".$_GET['id']."'");
                while ($data = mysqli_fetch_assoc($query)) {
                    include_once 'kos/update_kos.php';
                }
            }
            elseif(@$_GET['p']=="update_foto_kos"){
                $query = mysqli_query($koneksi,"SELECT * FROM tb_kos WHERE id_kos ='".$_GET['id']."'");
                while ($data = mysqli_fetch_assoc($query)) {
                    include_once 'kos/update_foto.php';
                }
            }
            elseif(@$_GET['p']=="delete_kos"){
                $query=mysqli_query($koneksi,"SELECT * FROM tb_kos WHERE id_kos ='".$_GET['id']."'");
                $foto_lama=mysqli_fetch_array($query);
                unlink('./img/foto_kos/'.$foto_lama['foto1']);
                unlink('./img/foto_kos/'.$foto_lama['foto2']);
                unlink('./img/foto_kos/'.$foto_lama['foto3']);
                unlink('./img/foto_kos/'.$foto_lama['foto4']);
                
                $query = mysqli_query($koneksi,"DELETE FROM tb_kos WHERE id_kos ='".$_GET['id']."'");
                if ($query) {
                    echo "<script>alert('Data telah dihapus')</script>";
                    echo "<script>location='index.php?p=tabel_kos'</script>";
                }else{
                    echo "<script>alert('erorr')</script>";
                }
                
            }

            //customer
		    elseif(@$_GET['p']=="tabel_customer"){
			    include_once 'customer/tabel_customer.php';
            }

            //Pemilik Kos
		    elseif(@$_GET['p']=="tabel_pemilik_kos"){
			    include_once 'pemilik_kos/tabel_pemilik_kos.php';
            }
		    elseif(@$_GET['p']=="tambah_pemilik_kos"){
			    include_once 'pemilik_kos/tambah_data.php';
            }
            elseif(@$_GET['p']=="update_pemilik_kos"){
                $query = mysqli_query($koneksi,"SELECT * FROM tb_pemilik_kos WHERE id_pemiliik_kos ='".$_GET['id']."'");
                while ($data = mysqli_fetch_assoc($query)) {
                    include_once 'pemilik_kos/update_data.php';
                }
            }
            elseif(@$_GET['p']=="delete_kos"){
                $query=mysqli_query($koneksi,"SELECT * FROM tb_kos WHERE id_kos ='".$_GET['id']."'");
                $foto_lama=mysqli_fetch_array($query);
                unlink('./img/foto_kos/'.$foto_lama['foto1']);
                unlink('./img/foto_kos/'.$foto_lama['foto2']);
                unlink('./img/foto_kos/'.$foto_lama['foto3']);
                unlink('./img/foto_kos/'.$foto_lama['foto4']);
                
                $query = mysqli_query($koneksi,"DELETE FROM tb_kos WHERE id_kos ='".$_GET['id']."'");
                if ($query) {
                    echo "<script>alert('Data telah dihapus')</script>";
                    echo "<script>location='index.php?p=tabel_kos'</script>";
                }else{
                    echo "<script>alert('erorr')</script>";
                }
                
            }

            //transaksi
		    elseif(@$_GET['p']=="tabel_transaksi"){
			    include_once 'transaksi/tabel_transaksi.php';
            }
            elseif(@$_GET['p']=="update_status"){
                $query = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_kos
                ON tb_pesan.id_kos = tb_kos.id_kos JOIN tb_pembayaran
                ON tb_pesan.id_pesan = tb_pembayaran.id_pesan JOIN tb_customer
                ON tb_pesan.id_customer = tb_customer.id_customer 
                WHERE tb_pesan.id_pesan = '".$_GET['id']."'");
                while ($row=mysqli_fetch_assoc($query)) {
                    include_once 'transaksi/ubah_status.php';
                }
            }
            ?>   
     
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> &copy; 2022 Copyright: Emerof-R_Reborn</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>