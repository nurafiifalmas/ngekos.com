<div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Tabel Kos</h1>
                    <p class="mb-4">Semua data kos yang terdapat pada aplikasi koskuy ditampilkan pada tabel ini.</p>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-white border-0 small" placeholder="Cari kos..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                     </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemilik</th>
                                            <th>Nama Kos</th>
                                            <th>Deskripsi</th>
                                            <th>Harga Sewa</th>
                                            <th>Jumlah Kamar</th>
                                            <th>Stok Kamar</th>
                                            <th>Alamat Kos</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php 

                                            function nominal($angka){
                                                $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
                                                return $hasil_rupiah;
                                            }
					                        $no=1;
					                        $query = mysqli_query($koneksi,"SELECT * FROM tb_kos JOIN tb_pemilik_kos
                                            ON tb_kos.id_pemilik_kos = tb_pemilik_kos.id_pemiliik_kos");
					                        while ($row=mysqli_fetch_assoc($query)) {
				                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama_pemilik_kos']; ?></td>
                                            <td><?php echo $row['nama_kos']; ?></td>
                                            <td><?php echo $row['desc_kos']; ?></td>
                                            <td><?php echo nominal($row['harga_sewa']); ?></td>
                                            <td><?php echo $row['jumlah_kamar']; ?></td>
                                            <td><?php echo $row['stok_kamar']; ?></td>
                                            <td><?php echo $row['alamat_kos']; ?></td>
                                            <td>
                                                <img width="100px" src="./img/foto_kos/<?php echo $row['foto1']; ?>">
                                                <img width="100px" src="./img/foto_kos/<?php echo $row['foto2']; ?>"> 
                                                <img width="100px" src="./img/foto_kos/<?php echo $row['foto3']; ?>">
                                                <img width="100px" src="./img/foto_kos/<?php echo $row['foto4']; ?>">
                                            </td>
                                            <td>						
                                                <a type="button" class="btn btn-primary"  href="index.php?p=update_kos&id=<?php echo $row['id_kos'];?>">Edit</a>
                                                <a type="button" class="btn btn-warning"  href="index.php?p=update_foto_kos&id=<?php echo $row['id_kos'];?>">Edit Foto</a>
 			                	                <a type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_kos&id=<?php echo $row['id_kos'] ?>">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a type="button" class="btn btn-success text-white" href="index.php?p=tambah_kos" >Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>

  