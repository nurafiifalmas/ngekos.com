<?php
    function nominal($angka){
        $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
?>
  <section class="bg-light py-5">
        <div class="container pb-5 py-5">
            <div class="row">
                <div class="col-lg-5 mt-5 py-5">
                    <div class="row">

                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>

                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../admin/img/foto_kos/<?php echo $data['foto1']; ?>">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../admin/img/foto_kos/<?php echo $data['foto2']; ?>">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../admin/img/foto_kos/<?php echo $data['foto3']; ?>">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                 <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../admin/img/foto_kos/<?php echo $data['foto4']; ?>">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h3 text-uppercase bold"><?php echo $data['nama_kos']; ?></h1>
                            <p class="h2 text-dark bold py-1"><?php echo nominal($data['harga_sewa']); ?>/bulan</p>
                            <hr>
                            <p class="h3 text-default bold">Detail</p>
                            <hr>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Pemilik :</h6>
                                    <h6>Jumlah Kamar :</h6>
                                    <h6>Stok Kamar :</h6>
                                    <h6>Nomor Telepon :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6 class="text-default bold"><?php echo $data['nama_pemilik_kos']; ?></h6>
                                    <h6 class="text-default bold"><?php echo $data['jumlah_kamar']; ?></h6>
                                    <h6 class="text-default bold"><?php echo $data['stok_kamar']; ?></h6>
                                    <h6 class="text-default bold"><?php echo $data['tlp_pemilik_kos']; ?></h6>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p class="h4"><?php echo $data['desc_kos']; ?>.</p>
                            
                            <form action="" method="">
                                <input type="hidden" name="product-title">
                                <div class="row">
                                </div>
                                <div class="row pb-3 py-3">
                                    <div class="col d-grid">

                                    <?php 
                                    $stok_kos = $data['stok_kamar'];
                                    if ($stok_kos > 0) { ?>
                                        <a href="index.php?p=pesan_kos&id=<?php echo $data['id_kos'];?>" class="btn btn-lg text-white bg-default" onclick="return confirm('Apakah Anda yakin untuk melakukan pemesanan?')">pesan sekarang</a>
                                    <?php
                                    } else { ?>
                                        <a class="btn btn-lg text-white bg-default disabled">pesan sekarang</a> 
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>