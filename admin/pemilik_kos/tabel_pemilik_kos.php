<div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Tabel Pemilik Kos</h1>
                    <p class="mb-4">Semua data pemilik kos yang terdapat pada aplikasi koskuy ditampilkan pada tabel ini.</p>
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
                                            <th>Nama Pemilik Kos</th>
                                            <th>Telp</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php 
					                        $no=1;
					                        $query = mysqli_query($koneksi,"SELECT * FROM tb_pemilik_kos ORDER BY id_pemiliik_kos ASC");
					                        while ($data_pemilik_kos=mysqli_fetch_assoc($query)) {
				                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data_pemilik_kos['nama_pemilik_kos']; ?></td>
                                            <td><?php echo $data_pemilik_kos['tlp_pemilik_kos']; ?></td>
                                            <td><?php echo $data_pemilik_kos['gender_pemilik_kos']; ?></td>
                                            <td><?php echo $data_pemilik_kos['email_pemilik_kos']; ?></td>
                                            <td>						
                                                <a type="button" class="btn btn-primary"  href="index.php?p=update_pemilik_kos&id=<?php echo $data_pemilik_kos['id_pemiliik_kos'];?>">Edit</a>
 			                	                <a type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_kos&id=<?php echo $data_customer['id_customer'] ?>">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a type="button" class="btn btn-success text-white" href="index.php?p=tambah_pemilik_kos" >Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>

  