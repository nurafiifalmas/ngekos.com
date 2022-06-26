<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     </div>
                    <?php
                    $sql_kos = mysqli_query($koneksi,"SELECT * FROM tb_kos");
                    $banyak_data_kos = mysqli_num_rows($sql_kos);
                    ?>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Banyak Kos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $banyak_data_kos ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    $sql_customer = mysqli_query($koneksi,"SELECT * FROM tb_customer");
                    $banyak_data_customer = mysqli_num_rows($sql_customer);
                    ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Banyak Customer</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $banyak_data_customer ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    $sql_customer = mysqli_query($koneksi,"SELECT * FROM tb_pemilik_kos");
                    $banyak_data_customer = mysqli_num_rows($sql_customer);
                    ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Banyak Mitra</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $banyak_data_customer ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $sql_pembayaran1 = mysqli_query($koneksi,"SELECT * FROM tb_pembayaran WHERE status_pembayaran='Belum dibayar'");
                    $banyak_data_pembayaran1 = mysqli_num_rows($sql_pembayaran1);
                    ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pesanan Baru</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $banyak_data_pembayaran1 ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="col-lg-12 mb-5 py-3">
                            <div class="card shadow mb-5">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>
                                <div class="card-body">
                                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            