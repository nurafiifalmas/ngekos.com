<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-12 col-md-9">

  			<div class="card o-hidden border-0 shadow-lg my-5">
  			  	<div class="card-body p-0">
      				<div class="row">
      				    <div class="col-lg-12">
      				        <div class="p-5">
                              <div class="text-center">
                                    <h1 class="h1 text-gray-900 mb-4">Form Ubah Password</h1>    
								</div>
										
								<form class= "card-body" method="POST" enctype="multipart/form-data">
									<div class="form-group cols-sm-6">
                              	        <label>Password Lama</label>
                              	        <input class="form-control" type="password" name="passwordlama" placeholder="Masukkan password lama..." required>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>Password Baru</label>
                              	        <input class="form-control" type="password" name="passwordbaru" placeholder="Masukkan password baru..." required>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>Konfirmasi Password</label>
                              	        <input class="form-control" type="password" name="passwordconfirm" placeholder="Konfirmasi password baru..." required>
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
        $passwordlama = mysqli_real_escape_string($koneksi,md5($_POST['passwordlama']));
        $passwordbaru = $_POST['passwordbaru'];
        $confirmpassword = $_POST['passwordconfirm'];
        $password = $data['password'];

        if ($passwordlama == $password) {
            if($passwordbaru == $confirmpassword){
                $passwordbaru = md5($passwordbaru);
                $query = mysqli_query($koneksi,"UPDATE tb_admin SET password='$passwordbaru'
                    WHERE id_admin = '".$data['id_admin']."'");
                
                    if($query){
                        echo "<script>alert('Password berhasil diubah')</script>";
                        echo "<script>location='index.php?p=tabel_admin'</script>";
                    }else{
                        echo "<script>alert('Data gagal diubah')</script>";
                    }
            }else {
                echo "<script>alert('Konfirmasi password salah')</script>";
            }
        }else {
            echo "<script>alert('Password lama Anda tidak sesuai dangan akun yang terdaftar')</script>";
        }
	}
?>