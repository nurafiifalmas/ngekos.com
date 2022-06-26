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
                              	        <label>Pemilik Kos</label>
                						<select class="form-select form-select-lg mb-3 text-muted" name="pemilik_kos" required>
										    <option selected disable="">Pilih Jenis Kelamin</option>
											<?php 
												$query = mysqli_query($koneksi,"SELECT * FROM tb_pemilik_kos");
												while ($row=mysqli_fetch_assoc($query)) {
													$nama = $row['nama_pemilik_kos'];
													$id = $row['id_pemiliik_kos'];
											?>
                    						<option value="<?php echo $id?>" <?php if ( $data['id_pemilik_kos'] == $id) echo 'selected="selected"'; ?>>
                                                <a  class="text-dark"><?php echo $nama ?></a>
                                            </option>
											<?php
                                            }
                                            
											?>
                						</select>
			               			</div>
									<div class="form-group cols-sm-6">
                              	        <label>Nama Kos</label>
                              	        <input class="form-control" type="text" name="nama" value="<?php echo $data['nama_kos'];?>" required>
			               			</div>
							
									<div class="form-group cols-sm-6">
                              	        <label>Deskripsi Kos</label>
                              	        <input class="form-control" type="text" name="deskripsi" value="<?php echo $data['desc_kos'];?>" required>
			               			</div>
							
									<div class="form-group cols-sm-6">
                              	        <label>Harga Sewa / bulan</label>
                              	        <input class="form-control" type="number" name="harga_sewa"  value="<?php echo $data['harga_sewa'];?>" required>
			               			</div>
							
									<div class="form-group cols-sm-6">
                              	        <label>Jumlah Kamar</label>
                              	        <input class="form-control" type="number" name="jml_kamar"  value="<?php echo $data['jumlah_kamar'];?>" required>
									</div>
							
									<div class="form-group cols-sm-6">
                              	        <label>Stok Kamar</label>
                              	        <input class="form-control" type="number" name="stok_kamar"  value="<?php echo $data['stok_kamar'];?>" required>
									</div>

									<div class="form-group cols-sm-6">
                              	        <label>Alamat</label>
                              	        <input class="form-control" type="text" name="alamat"  value="<?php echo $data['alamat_kos'];?>" required>
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
		$id_pemilik = $_POST['pemilik_kos'];
		$nama_kos = $_POST['nama'];
		$deskripsi = $_POST['deskripsi'];
		$harga_sewa = $_POST['harga_sewa'];
		$jml_kamar = $_POST['jml_kamar'];
		$stok_kamar = $_POST['stok_kamar'];
		$alamat = $_POST['alamat'];
			
		$query = mysqli_query($koneksi,"UPDATE tb_kos SET 
		id_pemilik_kos='$id_pemilik',
		nama_kos='$nama_kos',
		desc_kos='$deskripsi',
		harga_sewa='$harga_sewa',
		jumlah_kamar='$jml_kamar',
		stok_kamar='$stok_kamar',
		alamat_kos='$alamat' 
        WHERE id_kos='".$data['id_kos']."'");
            
            if($query){
                echo "<script>alert('Data berhasil diubah')</script>";
                echo "<script>location='index.php?p=tabel_kos'</script>";
            }else{
                echo "<script>alert('Data gagal diubah')</script>";
            }
		
	}
?>