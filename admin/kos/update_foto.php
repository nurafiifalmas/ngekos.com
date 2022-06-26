<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-12 col-md-9">

  			<div class="card o-hidden border-0 shadow-lg my-5">
  			  	<div class="card-body p-0">
      				<div class="row">
      				    <div class="col-lg-12">
      				        <div class="p-5">
                              <div class="text-center">
                                    <h1 class="h1 text-gray-900 mb-4">Form Ubah Foto</h1>    
								</div>
										
								<form class= "card-body" method="POST" enctype="multipart/form-data">
									<div class="form-group cols-sm-6">
                                    <?php if ($data['foto1'] != "") {?> 
                                    <img width="100px" src="./img/foto_kos/<?php echo $data['foto1']; ?>"><?php
                                        }else{
                                            echo "<a>kosong</a>";
                                        }
                                    ?>
                              	        <label>foto 1</label>
                              	        <input class="form-control" type="file" name="foto1">
									</div>

									<div class="form-group cols-sm-6">
                                    <?php if ($data['foto2'] != "") {?> 
                                    <img width="100px" src="./img/foto_kos/<?php echo $data['foto2']; ?>"><?php
                                        }else{
                                            echo "<a>kosong</a>";
                                        }
                                    ?>
                              	        <label>foto 2</label>
                              	        <input class="form-control" type="file" name="foto2">
									</div>

									<div class="form-group cols-sm-6">
                                    <?php if ($data['foto3'] != "") {?> 
                                    <img width="100px" src="./img/foto_kos/<?php echo $data['foto3']; ?>"><?php
                                        }else{
                                            echo "<a>kosong</a>";
                                        }
                                    ?>
                              	        <label>foto 3</label>
                              	        <input class="form-control" type="file" name="foto3">
									</div>

									<div class="form-group cols-sm-6">
                                    <?php if ($data['foto4'] != "") {?> 
                                    <img width="100px" src="./img/foto_kos/<?php echo $data['foto4']; ?>"><?php
                                        }else{
                                            echo "<a>kosong</a>";
                                        }
                                    ?>
                              	        <label>foto 4</label>
                              	        <input class="form-control" type="file" name="foto4">
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
		$foto1 = $_FILES['foto1']["name"];
		$foto2 = $_FILES['foto2']["name"];
		$foto3 = $_FILES['foto3']["name"];
		$foto4 = $_FILES['foto4']["name"];
		$tmp1 = $_FILES['foto1']["tmp_name"];
		$tmp2 = $_FILES['foto2']["tmp_name"];
		$tmp3 = $_FILES['foto3']["tmp_name"];
		$tmp4 = $_FILES['foto4']["tmp_name"];
        $path = "./img/foto_kos/";
        
        $query=mysqli_query($koneksi,"SELECT * FROM tb_kos
        WHERE id_kos='".$data['id_kos']."'");
        $foto_lama=mysqli_fetch_array($query);
        
            if (isset($foto1) && $foto2 == "" && $foto3 == "" && $foto4 == ""){
                unlink('./img/foto_kos/'.$foto_lama['foto1']);        
                move_uploaded_file($tmp1, $path.$foto1);        
                $query = mysqli_query($koneksi,"UPDATE tb_kos SET 
                foto1='$foto1'
                WHERE id_kos='".$data['id_kos']."'");
                
                if($query){
                    echo "<script>alert('Data berhasil diubah')</script>";
                    echo "<script>location='index.php?p=tabel_kos'</script>";
                }else {
                    echo "<script>alert('Data gagal diubah')</script>";
                }
            } elseif (isset($foto1) && isset($foto2) && $foto3 == "" && $foto4 == "") {
                unlink('./img/foto_kos/'.$foto_lama['foto1']);
                unlink('./img/foto_kos/'.$foto_lama['foto2']);             
                move_uploaded_file($tmp1, $path.$foto1);     
                move_uploaded_file($tmp2, $path.$foto2);    
                $query = mysqli_query($koneksi,"UPDATE tb_kos SET 
                foto1='$foto1',
                foto2='$foto2'
                WHERE id_kos='".$data['id_kos']."'");
                
                if($query){
                    echo "<script>alert('Data berhasil diubah')</script>";
                    echo "<script>location='index.php?p=tabel_kos'</script>";
                }else {
                    echo "<script>alert('Data gagal diubah')</script>";
                }
            } elseif  (isset($foto1) && isset($foto2) && isset($foto3) && $foto4 == ""){
                unlink('./img/foto_kos/'.$foto_lama['foto1']);
                unlink('./img/foto_kos/'.$foto_lama['foto2']);   
                unlink('./img/foto_kos/'.$foto_lama['foto3']);              
                move_uploaded_file($tmp1, $path.$foto1);     
                move_uploaded_file($tmp2, $path.$foto2);     
                move_uploaded_file($tmp3, $path.$foto3);   
                $query = mysqli_query($koneksi,"UPDATE tb_kos SET 
                foto1='$foto1',
                foto2='$foto2',
                foto3='$foto3'
                WHERE id_kos='".$data['id_kos']."'");
                
                if($query){
                    echo "<script>alert('Data berhasil diubah')</script>";
                    echo "<script>location='index.php?p=tabel_kos'</script>";
                }else {
                    echo "<script>alert('Data gagal diubah')</script>";
                }
            } elseif (isset($foto1) && isset($foto2) && isset($foto3) && isset($foto4)) {
                unlink('./img/foto_kos/'.$foto_lama['foto1']);
                unlink('./img/foto_kos/'.$foto_lama['foto2']);   
                unlink('./img/foto_kos/'.$foto_lama['foto3']);   
                unlink('./img/foto_kos/'.$foto_lama['foto4']);           
                move_uploaded_file($tmp1, $path.$foto1);     
                move_uploaded_file($tmp2, $path.$foto2);     
                move_uploaded_file($tmp3, $path.$foto3);     
                move_uploaded_file($tmp4, $path.$foto4);
                $query = mysqli_query($koneksi,"UPDATE tb_kos SET 
                foto1='$foto1',
                foto2='$foto2',
                foto3='$foto3',
                foto4='$foto4'
                WHERE id_kos='".$data['id_kos']."'");
                
                if($query){
                    echo "<script>alert('Data berhasil diubah')</script>";
                    echo "<script>location='index.php?p=tabel_kos'</script>";
                }else {
                    echo "<script>alert('Data gagal diubah')</script>";
                }
            }
	}
?>