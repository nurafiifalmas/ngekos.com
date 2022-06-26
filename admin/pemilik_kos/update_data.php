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
                              	        <label>Nama Pemilik Kos</label>
                              	        <input class="form-control" type="text" name="nama" value="<?php echo $data['nama_pemilik_kos'];?>" required>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>Telp Pemilik Kos</label>
                              	        <input class="form-control" type="text" name="telp" value="<?php echo $data['tlp_pemilik_kos'];?>" required>
									</div>
									<div class="form-group cols-sm-6">
                              	        <label>Jenis Kelamin</label><br>
                						<select class="form-select form-select-lg mb-3 text-muted" name="pemilik_kos" required>
										    <option selected disable="">Pilih Jenis Kelamin</option>
											<?php
                							$query = mysqli_query($koneksi,"SELECT * FROM tb_pemilik_kos");
                							while ($data_pemilik = mysqli_fetch_assoc($query)) {
											?>
                    						<option value="<?php echo $data_pemilik['gender_pemilik_kos'];?>" <?php if ( $data_pemilik['gender_pemilik_kos'] == $data['gender_pemilik_kos']) echo 'selected="selected"'; ?>>
                                                <a  class="text-dark"><?php echo $data_pemilik['gender_pemilik_kos'];?></a>
                                            </option>
											<?php } ?>
                						</select>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>Email</label>
                              	        <input class="form-control" type="email" name="email" value="<?php echo $data['email_pemilik_kos'];?>" required>
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
		$id_pemilik = $_POST['pemilik_kos'];
		$nama_kos = $_POST['nama'];
		$deskripsi = $_POST['deskripsi'];
		$harga_sewa = $_POST['harga_sewa'];
		$jml_kamar = $_POST['jml_kamar'];
		$stok_kamar = $_POST['stok_kamar'];
		$alamat = $_POST['alamat'];
		$foto1 = $_FILES['foto1']["name"];
		$foto2 = $_FILES['foto2']["name"];
		$foto3 = $_FILES['foto3']["name"];
		$foto4 = $_FILES['foto4']["name"];
		$tmp1 = $_FILES['foto1']["tmp_name"];
		$tmp2 = $_FILES['foto2']["tmp_name"];
		$tmp3 = $_FILES['foto3']["tmp_name"];
		$tmp4 = $_FILES['foto4']["tmp_name"];
		$path = "./img/foto_kos/";

				move_uploaded_file($tmp1, $path.$foto1);
				move_uploaded_file($tmp2, $path.$foto2);
				move_uploaded_file($tmp3, $path.$foto3);
				move_uploaded_file($tmp4, $path.$foto4);
				$query = mysqli_query($koneksi,"INSERT INTO tb_kos VALUES (NULL,'$id_pemilik','$nama_kos','$deskripsi','$harga_sewa','$jml_kamar','$stok_kamar','$alamat','$foto1','$foto2','$foto3','$foto4')");
				
						if($query){
							echo "<script>alert('Data berhasil ditambahkan')</script>";
							echo "<script>location='index.php?p=tabel_kos'</script>";
						}else{
							echo "<script>alert('Gagal menambahkan data')</script>";
						}
	
	}
?>
