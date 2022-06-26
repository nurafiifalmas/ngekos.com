<div class="container-fluid py-4">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-12 col-md-9">

  			<div class="card o-hidden border-0 shadow-lg my-5">
  			  	<div class="card-body p-0">
      				<div class="row">
      				    <div class="col-lg-12">
      				        <div class="p-5">
                              <div class="text-center">
                                    <h1 class="h1 text-gray-900 mb-4">Ubah Status Transaksi</h1>    
								</div>
										
								<form class= "card-body text-center py-3" method="POST" enctype="multipart/form-data">
                              	    <label class="h4">Status Pembayaran</label>
									<div class="form-group cols-sm-6">
    					                <select class="form-select form-select-lg mb-3 text-muted" name="status" aria-label="Default select example">
    					                    <option value="Belum dibayar" <?php if ( $row['status_pembayaran'] == 'Belum dibayar') echo 'selected="selected"'; ?>>Belum Dibayar</option>
    					                    <option value="Lunas" <?php if ( $row['status_pembayaran'] == 'Lunas') echo 'selected="selected"'; ?>>Lunas</option>
    					                </select>
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
	$status = $_POST['status'];
	$id_pemesanan = $row['id_pesan'];
	$id_kos_dipesan = $row['id_kos'];
	$stok_kamar_sebelumnya = $row['stok_kamar'];

	if ($status == "Lunas") {
		$query1 = mysqli_query($koneksi,"UPDATE tb_pembayaran
				SET status_pembayaran='$status' 
				WHERE id_pesan='$id_pemesanan'");
		
			if($query1){
				$stok_kamar_terbaru = $stok_kamar_sebelumnya - 1;
				$query2 = mysqli_query($koneksi,"UPDATE tb_kos
							SET stok_kamar ='$stok_kamar_terbaru' 
							WHERE id_kos='$id_kos_dipesan'");
		
						if($query2){
							$status_pemesanan = "selesai";
							$query3 = mysqli_query($koneksi,"UPDATE tb_pesan
										SET status_pemesanan ='$status_pemesanan' 
										WHERE id_pesan='$id_pemesanan'");
					
									if($query3){
										echo "<script>alert('Data berhasil diubah')</script>";
										echo "<script>location='index.php?p=tabel_transaksi'</script>";
									}else{
										echo "<script>alert('Gagal mengubah data pemesanan')</script>";
									}
						}else{
							echo "<script>alert('Gagal mengubah data kos')</script>";
						}
			}else{
				echo "<script>alert('Gagal mengubah data pembayaran')</script>";
			}
	}else{
		echo "<script>location='index.php?p=tabel_transaksi'</script>";
	}
}
?>