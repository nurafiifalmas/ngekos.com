<section id="detail_profil" class="py-5">
    <div class="container-fluid text-dark py-5">
        <div class="row py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1 py-4 bold text-default">Edit profil Anda</h1>
        </div>
        </div>
    </div>
</section>
            <section class="container col-md-8 m-auto">
                <div class="row">
                    <div class="col-md-6 col-lg-12 pb-5">
                            <div class="h-100 py-5 services-icon-wap" style="padding: 6rem;">
                            <div class="text-center py-3">
                                <img class="py-4" src="assets/img/profil/<?php echo $data_profile['foto_customer']; ?>" alt="" width="250px" style="border-radius: 50%"><br>
                                <a type="button" class="text-default py-4" data-bs-toggle="modal" data-bs-target="#foto_profil">Ubah foto</a> 
                            </div>
                            <hr>
                                <div class="container py-1">
                                        <div class="row">
                                            <div class="col-lg-6 desc text-start" data-aos="fade-left" data-aos-delay="200">
									            <div class="form-group cols-sm-6 py-4">
                              	                    <label>Nama</label>
			               			            </div>
									            <div class="form-group cols-sm-6 py-4">
                              	                    <label>NIK</label>
			               			            </div>
									            <div class="form-group cols-sm-6 py-4">
                              	                    <label>Email</label>
			               			            </div>
									            <div class="form-group cols-sm-6 py-4">
                              	                    <label>Alamat</label>
			               			            </div>
									            <div class="form-group cols-sm-6 py-4">
                              	                    <label>Jenis Kelamin</label>
			               			            </div>
									            <div class="form-group cols-sm-6 py-5">
                              	                    <label>Telepon</label>
			               			            </div>
                                            </div>  
        
                                            <div class="col-lg-6 about-decs text-end" data-aos="fade-right" data-aos-delay="200">
                                                <form class= "card-body" method="POST" enctype="multipart/form-data">
									            <div class="form-group cols-sm-6 py-3">
                              	                    <input class="form-control text-muted" type="text" name="nama" value="<?php echo $data_profile['nama_customer'];?>" required>
			               			            </div>
									            <div class="form-group cols-sm-6 py-3">
                              	                    <input class="form-control text-muted" type="number" name="nik" value="<?php echo $data_profile['nik_customer'];?>" required>
			               			            </div>
									            <div class="form-group cols-sm-6 py-3">
                              	                    <input class="form-control text-muted" type="email" name="email" value="<?php echo $data_profile['email'];?>" required>
			               			            </div>
									            <div class="form-group cols-sm-6 py-3">
                              	                    <input class="form-control text-muted" type="text" name="alamat" value="<?php echo $data_profile['alamat_customer'];?>" required>
			               			            </div>
									            <div class="form-group cols-sm-6 py-3">
                                                <select class="form-select form-select-lg mb-3 text-muted" name="jenis_kelamin" aria-label=".form-select-lg example" required>
                                                    <option value="<?php echo $data_profile['gender_customer'];?>" <?php if ( $data_profile['gender_customer'] == $data_profile['gender_customer']) echo 'selected="selected"'; ?>>
                                                        <a  class="text-dark"><?php echo $data_profile['gender_customer'];?></a>
                                                    </option>
                                                    <option value="laki-laki">laki-laki</option>
                                                    <option value="perempuan">perempuan</option>
                                                </select>
			               			            </div>
									            <div class="form-group cols-sm-6 py-3">
                              	                    <input class="form-control text-muted" type="number" name="telp" value="<?php echo $data_profile['tlp_customer'];?>" required>
			               			            </div>  
                                                    
                                                <input type="submit" name="ubah" value="Ubah" class="btn btn-success">
								                </form> 
                                            </div> 
                                        </div>
                                    </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </section>

            
<?php 
	if(isset($_POST['ubah'])){
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telp'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        $query = mysqli_query($koneksi,"UPDATE tb_customer SET 
        nama_customer='$nama',
        nik_customer='$nik',
        email='$email',
        alamat_customer='$alamat',
        tlp_customer='$telepon',
        gender_customer='$jenis_kelamin'
        WHERE id_customer = '$_SESSION[id]'");
                
            if($query){
                echo "<script>alert('Data berhasil diubah')</script>";
                echo "<script>location='index.php?p=ubah_data_profil'</script>";
            }else{
                echo "<script>alert('Data gagal diubah')</script>";
            }
	}
?>