<section id="beranda" class="d-flex align-items-center">
      <div class="container">
        <div class="row">
        <div class="col-lg-6 desc py-5" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/ngekos_logo.png" class="img-fluid animated" alt="">
        </div> 
        
        <div class="col-lg-6 beranda-img py-5" data-aos="fade-right" data-aos-delay="200">
            <div class="py-5">
          <h1><span class="text-warning">ngekos</span>.com</h1>
          <h2>Sekarang cari kos dapat <br> hanya dengan modal rebahan.</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#rekomendasi" class="btn btn-get-started scrollto">Cari Kos Sekarang</a>
          </div></div>
        </div> 
        </div>
      </div>
</section>

<section class="bg-light" id="rekomendasi">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-12 m-auto p-5">
                <a class="h3 text-decoration-none text-dark bold">Rekomendasi</a>
            </div>
            <div class="col-lg-6 m-auto text-center">
                <a class="h4 text-decoration-none text-dark">Temukan pilihan anda disini, dapatkan harga sewa kos di bawah Rp500.000,00. Kami mencoba membantu Anda dalam mencari kos di daerah Caruban dengan 
                harga sewa yang paling murah.</a>
            </div>
        </div>

            <div class="row">
            <?php
            function nominal($angka){
                $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
                return $hasil_rupiah;
            }
            $query1 = mysqli_query($koneksi,"SELECT * FROM tb_kos JOIN tb_pemilik_kos
            ON tb_kos.id_pemilik_kos = tb_pemilik_kos.id_pemiliik_kos WHERE harga_sewa = 300000");
            $req_kos1 = mysqli_fetch_assoc($query1);

            $query3 = mysqli_query($koneksi,"SELECT * FROM tb_kos JOIN tb_pemilik_kos
            ON tb_kos.id_pemilik_kos = tb_pemilik_kos.id_pemiliik_kos WHERE harga_sewa = 480000");
            $req_kos3 = mysqli_fetch_assoc($query3);
            ?>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card h-100 border-radius">
                        <a href="index.php?p=detail&id=<?php echo $req_kos1['id_kos']; ?>">
                            <img src="admin/img/foto_kos/<?php echo $req_kos1['foto1']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a class="h4 text-decoration-none text-dark"><?php echo $req_kos1['alamat_kos']; ?></a>
                        
                            <p class="h5 text-muted">Mulai <?php echo nominal($req_kos1['harga_sewa']); ?>/bulan</p>
                        </div>
                    </div>
                </div>
            <?php
            $query2 = mysqli_query($koneksi,"SELECT * FROM tb_kos JOIN tb_pemilik_kos
            ON tb_kos.id_pemilik_kos = tb_pemilik_kos.id_pemiliik_kos WHERE harga_sewa = 350000");
            while($req_kos2 = mysqli_fetch_assoc($query2)){ ?>

                <div class="col-12 col-md-3 mb-3">
                    <div class="card h-100 border-radius">
                        <a href="index.php?p=detail&id=<?php echo $req_kos2['id_kos']; ?>">
                            <img src="admin/img/foto_kos/<?php echo $req_kos2['foto1']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a class="h4 text-decoration-none text-dark"><?php echo $req_kos2['alamat_kos']; ?></a>
                        
                            <p class="h5 text-muted">Mulai <?php echo nominal($req_kos2['harga_sewa']); ?>/bulan</p>
                        </div>
                    </div>
                </div>
            <?php } ?>

               <div class="col-12 col-md-3 mb-3">
                    <div class="card h-100 border-radius">
                        <a href="index.php?p=detail&id=<?php echo $req_kos3['id_kos']; ?>">
                            <img src="admin/img/foto_kos/<?php echo $req_kos3['foto1']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a class="h4 text-decoration-none text-dark"><?php echo $req_kos3['alamat_kos']; ?></a>
                        
                            <p class="h5 text-muted">Mulai <?php echo nominal($req_kos3['harga_sewa']); ?>/bulan</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<section id="beranda-3">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <a href="" class="h3 text-decoration-none text-dark bold">Apakah Anda pemilik kos? </a>
                </div>
                    <a href="" class="h4 text-decoration-none text-dark">Segera promosikan kos Anda! </a>
            </div>
            
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                <a href="#" class="btn scrollto bg-default text-white" style="padding-left:50px; padding-right: 50px; padding-top:10px; padding-bottom:10px;">Promosikan di sini</a>
                </div>
            </div>
        </div>
</section>    