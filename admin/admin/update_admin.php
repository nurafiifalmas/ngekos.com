<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-12 col-md-9">

  			<div class="card o-hidden border-0 shadow-lg my-5">
  			  	<div class="card-body p-0">
      				<div class="row">
      				    <div class="col-lg-12">
      				        <div class="p-5">
                              <div class="text-center">
                                    <h1 class="h1 text-gray-900 mb-4">Form Ubah Data</h1>    
								</div>
										
								<form class= "card-body" method="POST" enctype="multipart/form-data">
                                       <div class="form-group cols-sm-6">
                              	        <label>Nama Admin</label>
                              	        <input class="form-control" type="text" name="nama" value="<?php echo $data['nama_admin'];?>" required>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>Email</label>
                              	        <input class="form-control" type="email" name="email" value="<?php echo $data['email'];?>" required>
			               			</div>
									<div class="form-group cols-sm-6">
                                    <?php if ($data['foto'] != "") {?> 
                                    <img width="100px" src="./img/foto_admin/<?php echo $data['foto']; ?>"><?php
                                        }else{
                                            echo "<a>kosong</a>";
                                        }
                                    ?>
                              	        <label>foto</label>
                              	        <input class="form-control" type="file" name="foto">
									</div>
									<div class="form-group cols-sm-6">
                              	        <label>Konfirmasi Password</label>
                              	        <input class="form-control" type="password" name="passwordconfirm" placeholder="Konfirmasi password..." required>
			               			</div>

                                    <input type="submit" name="ubah" value="Ubah" class="btn btn-success">  
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
	if(isset($_POST['ubah'])){
		$nama_admin = $_POST['nama'];
        $email = $_POST['email'];
        $confirmpassword = mysqli_real_escape_string($koneksi,md5($_POST['passwordconfirm']));
        $password = $data['password'];
		$foto = $_FILES['foto']["name"];
		$tmp = $_FILES['foto']["tmp_name"];
        $path = "./img/foto_admin/";

        if ($confirmpassword == $password) {
            if(empty($foto)){
                $query = mysqli_query($koneksi,"UPDATE tb_admin SET nama_admin='$nama_admin',email='$email'
                    WHERE id_admin = '".$data['id_admin']."'");
                
                    if($query){
                        echo "<script>alert('Data berhasil diubah')</script>";
                        echo "<script>location='index.php?p=tabel_admin'</script>";
                    }else{
                        echo "<script>alert('Data gagal diubah')</script>";
                    }
            }else {
    
                unlink('./img/foto_admin/'.$data['foto']);
                move_uploaded_file($tmp, $path.$foto);
                $query = mysqli_query($koneksi,"UPDATE tb_admin SET nama_admin='$nama_admin',email='$email',foto='$foto' 
                 WHERE id_admin = '".$data['id_admin']."'");
                
                if($query){
                    echo "<script>alert('Data berhasil diubah')</script>";
                    echo "<script>location='index.php?p=list'</script>";
                }else {
                    echo "<script>alert('Data gagal diubah')</script>";
                }
            }
        }else {
            echo "<script>alert('Password akun email Anda tidak sesuai')</script>";
        }
	}
?>