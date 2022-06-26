<div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Tabel Transaksi</h1>
                    <p class="mb-4">Semua data transaksi yang terdapat pada aplikasi koskuy ditampilkan pada tabel ini.</p>
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
                                            <th>Kode Transaksi</th>
                                            <th>Nama Customer</th>
                                            <th>Nama Kos yang dipesan</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Total Pembayaran</th>
                                            <th>Status Pembayaran</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php 

                                            function nominal($angka){
                                                $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
                                                return $hasil_rupiah;
                                            }
                                            $no=1;
                                            $query = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_kos
                                            ON tb_pesan.id_kos = tb_kos.id_kos JOIN tb_pembayaran
                                            ON tb_pesan.id_pesan = tb_pembayaran.id_pesan JOIN tb_customer
                                            ON tb_pesan.id_customer = tb_customer.id_customer ");
                                            while ($row=mysqli_fetch_assoc($query)) {
				                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['kode_pembayaran']; ?></td>
                                            <td><?php echo $row['nama_customer']; ?></td>
                                            <td><?php echo $row['nama_kos']; ?></td>
                                            <td><?php echo $row['tanggal_pesan']; ?></td>
                                            <td><?php echo nominal($row['total_pembayaran']); ?></td>
                                            <td><?php

                                                if($row['status_pembayaran']=="Belum dibayar"){ ?>
                                                    <a class="btn badge bg-danger text-white bold" style="width: 6rem;" href="index.php?p=update_status&id=<?php echo $row['id_pesan'];?>">
                                                        <?php echo $row['status_pembayaran']; ?></td>
                                                    </a>
                                        <?php	}elseif($row['status_pembayaran']=="Lunas"){ ?>
                                                    <a class="btn badge bg-success text-white bold" style="width: 6rem;" href="index.php?p=update_status&id=<?php echo $row['id_pesan'];?>">
                                                        <?php echo $row['status_pembayaran']; ?></td>
                                                    </a>
                                        <?php 	}else{?>
                                                    <a class="btn badge bg-light text-white bold" style="width: 6rem;" href="index.php?p=update_status&id=<?php echo $row['id_pesan'];?>">
                                                        <?php echo $row['status_pembayaran']; ?></td>
                                                    </a>
                                        <?php 	}?>
                                            
                                            <!-- </td>
                                            <td>						
 			                	                <a type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_kos&id=<?php echo $row['id_kos'] ?>">Delete</a>
                                            </td> -->
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