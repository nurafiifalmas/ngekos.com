<section id="kost" class="d-flex align-items-center">
      <div class="container">
        <div class="row">
            <div class="col-lg-12 desc" data-aos="fade-left" data-aos-delay="200">
            <h1 class="text-center"><span class="text-warning">ngekos</span>.com</h1>
            <div class="d-flex justify-content-center justify-content-lg-start">
                <div id='container'>  
                <div class='cell'>
                    <input type='search' placeholder='Search'>
                </div>
                <div class='cell'>
                    <div class='button'>cari</div>
                </div>
            </div>
          </div>
        </div> 
        </div>
      </div>
</section>

<section>
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4 bold">Kategori
                        <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <ul class="collapse show list-unstyled pl-3">
                            <div class="d-flex col-4 py-4">
                                <select class="form-control">
                                    <option>Semua</option>
                                    <option>Kost</option>
                                    <option>Kontrakan</option>
                            </select>
                        </div>
                        </ul>
                    </li>
                </ul>
            </div>
            

            <div class="col-lg-9 border-radius">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="list-inline shop-top-menu pb-3 pt-1 py-4">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3 bold" href="#">Daftar Kost & Kontrakan</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">

            <?php
            function nominal($angka){
                $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
                return $hasil_rupiah;
            }
            $query = mysqli_query($koneksi,"SELECT * FROM tb_kos JOIN tb_pemilik_kos
            ON tb_kos.id_pemilik_kos = tb_pemilik_kos.id_pemiliik_kos");
            while($data = mysqli_fetch_assoc($query)){
            ?>
                <div class="col-12 col-md-3 mb-3">
                    <div class="card h-100 border-radius">
                        <a href="index.php?p=detail&id=<?php echo $data['id_kos']; ?>">
                            <img src="admin/img/foto_kos/<?php echo $data['foto1']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <a href="shop-single.html" class="h5 text-decoration-none text-dark"><?php echo $data['alamat_kos']; ?></a>
                        
                            <p class="h5 text-muted">Mulai <?php echo nominal($data['harga_sewa']); ?>/bulan</p>
                        </div>
                    </div>
                </div>
        <?php
        }
        ?>
        </div>
    </div>
    <!-- End Content -->
</section>