<?php
    function nominal($angka){
        $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
?>

<section id="detail_pesan" class="py-5">
    <div class="container-fluid text-dark py-5">
        <div class="row py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1 py-4 bold text-default">Detail Pemesanan Anda</h1>
        </div>
        </div>
    </div>
</section>
 
        
                <section class="container col-md-8 m-auto">
                    <div class="row">
                    <div class="col-md-6 col-lg-12 pb-5">
                        <div class="h-100 py-5 services-icon-wap shadow" style="padding: 6rem;">
                                <h1 class="h4 text-uppercase bold"><?php echo $data_pesanan_selesai['status_pemesanan']; ?></h1>
                                <ul class="list-inline text-end">
                                        <li class="list-inline-item">
                                            <h6 class="h5 text-muted">Tanggal Pemesanan</h6>
                                            <h6 class="h5 text-muted">Kode Pembayaran</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <h6 class="h5 text-muted"><?php echo date('d F Y', strtotime($data_pesanan_selesai['tanggal_pesan'])); ?></h6>
                                            <h6 class="h5 text-muted"><?php echo $data_pesanan_selesai['kode_pembayaran']; ?></h6>
                                        </li>
                                    </ul>
                                <hr>
                                    <h6 class="h3 bold">Detail Kos</h6>
                                    <div class="container py-3">
                                        <div class="row">
                                            <div class="col-lg-6 desc" data-aos="fade-left" data-aos-delay="200">
                                                <img class="" src="../admin/img/foto_kos/<?php echo $data_pesanan_selesai['foto1']; ?>" alt="" width="250px">
                                            </div>  
        
                                            <div class="col-lg-6 about-decs" data-aos="fade-right" data-aos-delay="200">
                                                <h1 class="h3 text-uppercase bold"><?php echo $data_pesanan_selesai['nama_kos']; ?></h1>
                                                <hr>
                                            </div> 
                                        </div>
                                    </div>
                                    <ul class="list-inline py-3">
                                        <li class="list-inline-item">
                                            <h6 class="h5">Pemilik kos</h6>
                                            <h6 class="h5">Alamat kos</h6>
                                            <h6 class="h5">Harga sewa kos</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <h6 class="h5">:</h6>
                                            <h6 class="h5">:</h6>
                                            <h6 class="h5">:</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <h6 class="h5 text-default bold"><?php echo $data_pesanan_selesai['nama_pemilik_kos']; ?></h6>
                                            <h6 class="h5 text-default bold"><?php echo $data_pesanan_selesai['alamat_kos']; ?></h6>
                                            <h6 class="h5 text-default bold"><?php echo nominal($data_pesanan_selesai['harga_sewa']); ?></h6>
                                        </li>
                                    </ul>
                                    <hr>
                                    <h6 class="h3 bold">Detail Pembayaran</h6>
                                    <div class="container py-3">
                                        <div class="row">
                                            <div class="col-lg-6 desc" data-aos="fade-left" data-aos-delay="200">
                                                <h6>Total Pembayaran</h6>
                                            </div>  
        
                                            <div class="col-lg-6 about-decs" data-aos="fade-right" data-aos-delay="200">
                                                <h6 class="text-default bold text-end"><?php echo nominal($data_pesanan_selesai['harga_sewa']);?></h6>
                                            </div> 
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="container py-1">
                                        <div class="row">
                                            <div class="col-lg-6 desc" data-aos="fade-left" data-aos-delay="200">
                                                <h6 class="h3 bold">Status Pembayaran</h6>
                                            </div>  
        
                                            <div class="col-lg-6 about-decs" data-aos="fade-right" data-aos-delay="200">
                                                <h6 class="h3 text-default bold text-end"><?php echo $data_pesanan_selesai['status_pembayaran'];?></h6>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </section>