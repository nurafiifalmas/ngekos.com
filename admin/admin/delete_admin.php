<div class="container-fluid py-5">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-12 col-md-9">

  			<div class="card o-hidden border-0 shadow-lg my-5">
  			  	<div class="card-body p-0">
      				<div class="row">
      				    <div class="col-lg-12">
      				        <div class="p-5">
                              <div class="text-center">
                                    <h1 class="h1 text-gray-900 mb-4">Konfirmasi Password</h1>    
								</div>
										
								<form class= "card-body" method="POST" enctype="multipart/form-data">
									<div class="form-group cols-sm-6">
                              	        <label>Password</label>
                              	        <input class="form-control" type="password" name="password" placeholder="Massukkan password..." required>
			               			</div>

                                    <input type="submit" name="submit" value="Submit" class="btn btn-success">  
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
	if(isset($_POST['submit'])){
        $password = mysqli_real_escape_string($koneksi,md5($_POST['password']));
        $confirmpassword = $data['password'];

        if ($password == $confirmpassword) {

            unlink('./img/foto_admin/'.$data['foto']);
            $query = mysqli_query($koneksi,"DELETE FROM tb_admin WHERE id_admin ='".$data['id_admin']."'");
            if ($query) {
                echo "<script>alert('Data telah dihapus')</script>";
                echo "<script>location='index.php?p=tabel_admin'</script>";
            }else{
                echo "<script>alert('Gagal menghapus data')</script>";
            }
        }else{
            echo "<script>alert('Password salah')</script>";
            echo "<script>location='index.php?p=tabel_admin'</script>";
        }
    }
?>