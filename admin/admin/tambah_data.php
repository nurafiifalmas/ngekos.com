<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-12 col-md-9">

  			<div class="card o-hidden border-0 shadow-lg my-5">
  			  	<div class="card-body p-0">
      				<div class="row">
      				    <div class="col-lg-12">
      				        <div class="p-5">
                              <div class="text-center">
                                    <h1 class="h1 text-gray-900 mb-4">Form Tambah Data</h1>    
								</div>
										
								<form class= "card-body" method="POST" enctype="multipart/form-data">
									<div class="form-group cols-sm-6">
                              	        <label>Nama Admin</label>
                              	        <input class="form-control" type="text" name="nama" placeholder="Masukkan nama..." required>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>Email</label>
                              	        <input class="form-control" type="email" name="email" placeholder="Masukkan nama..." required>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>Password</label>
                              	        <input class="form-control" type="password" name="password" placeholder="Masukkan nama..." required>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>Konfirmasi Password</label>
                              	        <input class="form-control" type="password" name="passwordconfirm" placeholder="Masukkan nama..." required>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>foto</label>
                              	        <input class="form-control" type="file" name="foto">
									</div>

                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success">  
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
	if(isset($_POST['simpan'])){
		$nama_admin = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['passwordconfirm'];
		$foto = $_FILES['foto']["name"];
		$tmp = $_FILES['foto']["tmp_name"];
        $path = "./img/foto_admin/";
        
        $query = mysqli_query($koneksi,"SELECT email FROM tb_admin WHERE email = '$email'");
		if (mysqli_fetch_assoc($query)) {
            echo"<script>
                    alert('Akun sudah terdaftar');
                </script>";
            echo "<script>location='index.php?p=tambah_data'</script>";
        }else{
            if ($password == $confirmpassword) {
                move_uploaded_file($tmp, $path.$foto);
                $password = md5($password);
				$query = mysqli_query($koneksi,"INSERT INTO tb_admin
				VALUES (NULL,'$nama_admin','".$email."','".$password."','$foto')");
			    if($query){
                    echo"<script>
                        alert('Data berhasil ditambahkan');
                    </script>";
				          echo "<script>location='index.php?p=tabel_admin'</script>";
				}else{
                    echo"<script>
                            alert('Data gagal ditambahkan');
                        </script>";
                }
            }else{
                echo"<script>
                        alert('Konfirmasi password tidak sesuai');
                    </script>";
            }
        }
	
	}
?>