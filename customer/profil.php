<section id="detail_profil" class="py-5">
    <div class="container-fluid text-dark py-5">
        <div class="row py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1 py-4 bold text-default">Profil Anda</h1>
        </div>
        </div>
    </div>
</section>
                <section class="container col-md-8 m-auto">
                    <div class="row">
                    <div class="col-md-6 col-lg-12 pb-5">
                        <div class="h-100 py-5 services-icon-wap text-center" style="padding: 6rem;">
                                <div class="py-1">
                                    <img class="py-3" src="assets/img/profil/<?php echo $profile['foto_customer']; ?>" alt="" width="250px" style="border-radius: 50%">
                                    <div class="py-5">
                                        <a type="button" class="text-default"  href="index.php?p=ubah_data_profil">Ubah Profil</a> 
                                        <a class="text-default">|</a>
                                        <a type="button" class="text-default"  href="index.php?p=ubah_password_profil">Ubah Password</a>
                                    </div>
                                    <h6 class="h3 bold py-1"><?php echo $profile['nama_customer']; ?>
                                </div>
                            <hr>
                                    <div class="container py-1">
                                        <div class="row">
                                            <div class="col-lg-6 desc text-start" data-aos="fade-left" data-aos-delay="200">
                                                <h6 class="h3 text-muted py-3">NIK</h6>
                                                <h6 class="h3 text-muted py-3">Email</h6>
                                                <h6 class="h3 text-muted py-3">Alamat</h6>
                                                <h6 class="h3 text-muted py-3">Telepon</h6>
                                                <h6 class="h3 text-muted py-3">Jenis Kelamin</h6>
                                            </div>  
        
                                            <div class="col-lg-6 about-decs text-end" data-aos="fade-right" data-aos-delay="200">
                                                <h6 class="h3 text-default bold py-3"><?php echo $profile['nik_customer']; ?></h6>
                                                <h6 class="h3 text-default bold py-3"><?php echo $profile['email']; ?></h6>
                                                <h6 class="h3 text-default bold py-3"><?php echo $profile['alamat_customer']; ?></h6>
                                                <h6 class="h3 text-default bold py-3"><?php echo $profile['tlp_customer']; ?></h6>
                                                <h6 class="h3 text-default bold py-3"><?php echo $profile['gender_customer']; ?></h6>
                                            </div> 
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                        </div>
                </div>
            </section>