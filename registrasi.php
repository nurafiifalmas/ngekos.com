<section class="py-5">
  <div class="container-fluid h-custom py-5">
    <div class="row d-flex justify-content-center align-items-center py-5">
      <div class="col-md-9 col-lg-6 col-xl-5 text-center">
        <img src="assets/img/ngekos_logo.PNG" class="img-fluid" alt="Sample image" width="300px">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" enctype="multipart/form-data">
          <div class="divider d-flex align-items-center my-4">
            <p class="h3 text-center fw-bold mx-3 mb-0">Form Registrasi</p>
          </div>

          <div class="form-outline mb-4">
            <input type="text" name="nama" class="form-control form-control-lg"
              placeholder="Nama" required/>
          </div>

          <div class="form-outline mb-4">
            <input type="number" name="nik" class="form-control form-control-lg"
              placeholder="NIK" required/>
          </div>

          <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control form-control-lg"
              placeholder="Email" required/>
          </div>

          <div class="form-outline mb-3">
            <input type="password" name="password" class="form-control form-control-lg"
              placeholder="Password" required/>
          </div>

          <div class="form-outline mb-3">
            <input type="password" name="passwordconfirm" class="form-control form-control-lg"
              placeholder="Konfirmasi password" required/>
          </div>
          <div class="form-outline mb-4">
            <input type="text" name="alamat" class="form-control form-control-lg"
              placeholder="Alamat" required/>
          </div>

          <div class="form-outline mb-4">
            <input type="number" name="telepon" class="form-control form-control-lg"
              placeholder="Telepon" required/>
          </div>

          <div class="form-outline mb-3">
                <select class="form-select form-select-lg mb-3 text-muted" name="jenis_kelamin" aria-label=".form-select-lg example" required>
                    <option selected disable="">Pilih Jenis Kelamin</option>
                    <option value="laki-laki">laki-laki</option>
                    <option value="perempuan">perempuan</option>
                </select>
          </div>
          
          <div class="form-outline mb-4">
            <label class="form-check-label text-muted"> Pilih foto profil </label>
            <input type="file" name="foto" class="form-control form-control-lg"
              placeholder="foto" required/>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
          <input type="submit" name="simpan" value="Simpan" class="btn btn-user btn-block bg-default text-white"> 
            <p class="small fw-bold mt-2 pt-1 mb-0 py-1">Sudah punya akun? <a href="index.php?p=login"
                class="link-primary text-decoration">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
<?php 
	if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $email = $_POST['email'];
		$password = $_POST['password'];
    $confirmpassword = $_POST['passwordconfirm'];
		$alamat = $_POST['alamat'];
		$telepon = $_POST['telepon'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
    $foto = $_FILES["foto"]["name"];
	 	$tmp = $_FILES["foto"]["tmp_name"];
    $path = "customer/assets/img/profil/";
    
    $query = mysqli_query($koneksi,"SELECT email FROM tb_customer WHERE email = '$email'");
		if (mysqli_fetch_assoc($query)) {
            echo"<script>
                    alert('Akun sudah terdaftar');
                </script>";
            echo "<script>location='index.php?p=login'</script>";
        }else{
            if ($password == $confirmpassword) {
                move_uploaded_file($tmp, $path.$foto);
                $password = md5($password);
		        $query=mysqli_query($koneksi,"INSERT INTO tb_customer VALUES (NULL,'".$nama."','".$nik."','".$email."','".$password."','".$alamat."','".$telepon."','".$jenis_kelamin."','".$foto."')");
			    if($query){
                    echo"<script>
                        alert('Registrasi berhasil');
                    </script>";
				          echo "<script>location='index.php?p=login'</script>";
				}else{
                    echo"<script>
                            alert('Registrasi gagal');
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