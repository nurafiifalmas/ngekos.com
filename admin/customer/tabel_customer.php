<div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Tabel Customer</h1>
                    <p class="mb-4">Semua data customer yang terdapat pada aplikasi koskuy ditampilkan pada tabel ini.</p>
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
                                            <th>Nama Customer</th>
                                            <th>NIK</th>
                                            <th>Email</th>
                                            <th>Alamat Customer</th>
                                            <th>Telp Customer</th>
                                            <th>Gender Customer</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php 
					                        $no=1;
					                        $query = mysqli_query($koneksi,"SELECT * FROM tb_customer ORDER BY id_customer ASC");
					                        while ($data_customer=mysqli_fetch_assoc($query)) {
				                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data_customer['nama_customer']; ?></td>
                                            <td><?php echo $data_customer['nik_customer']; ?></td>
                                            <td><?php echo $data_customer['email']; ?></td>
                                            <td><?php echo $data_customer['alamat_customer']; ?></td>
                                            <td><?php echo $data_customer['tlp_customer']; ?></td>
                                            <td><?php echo $data_customer['gender_customer']; ?></td>
                                            <td>
                                                <img width="100px" src="../customer/assets/img/profil/<?php echo $data_customer['foto_customer']; ?>">
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

  