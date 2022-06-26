<?php
    function nominal($angka){
        $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }

$query = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_pembayaran
ON tb_pesan.id_pesan = tb_pembayaran.id_pesan WHERE tb_pesan.id_customer ='$_SESSION[id]'");
$cek_data = mysqli_num_rows($query);

?>

<section id="pesan" class="py-5">
    <div class="container-fluid text-dark py-5">
        <div class="row py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1 py-4 bold text-default">Daftar Pemesanan Anda</h1>
            <p>
                Lakukan pembayaran agar pesanan Anda segera diproses.
            </p>
        </div>
        </div>
    </div>
</section>
 
<?php
if ($cek_data > 0) { 

$query = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_pembayaran
ON tb_pesan.id_pesan = tb_pembayaran.id_pesan WHERE tb_pesan.id_customer ='$_SESSION[id]'");
while($data = mysqli_fetch_assoc($query)){
    $status = $data['status_pemesanan'];
}

if ($status == "baru") { 
    $query_kos = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_kos
    ON tb_pesan.id_kos = tb_kos.id_kos JOIN tb_pembayaran
    ON tb_pesan.id_pesan = tb_pembayaran.id_pesan JOIN tb_pemilik_kos
    ON tb_kos.id_pemilik_kos = tb_pemilik_kos.id_pemiliik_kos 
    WHERE tb_pesan.id_customer ='$_SESSION[id]' AND tb_pesan.status_pemesanan ='baru'");
    $data_pesanan_baru = mysqli_fetch_assoc($query_kos);

    if ($data_pesanan_baru) {
        ?>
        <section class="container col-md-6 m-auto text-center py-5">
            <div class="row">

            <div class="col-md-6 col-lg-12 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow" style="padding: 6rem;">
                        <h1 class="h3 text-uppercase bold"><?php echo $data_pesanan_baru['nama_kos']; ?></h1>
                        <hr>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Pemilik Kos</h6>
                                    <h6>Nomor Telepon pemilik kos</h6>
                                    <h6>Total pembayaran</h6>
                                    <h6>Kode pembayaran</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6>:</h6>
                                    <h6>:</h6>
                                    <h6>:</h6>
                                    <h6>:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <h6 class="text-default bold"><?php echo $data_pesanan_baru['nama_pemilik_kos']; ?></h6>
                                    <h6 class="text-default bold"><?php echo $data_pesanan_baru['tlp_pemilik_kos']; ?></h6>
                                    <h6 class="text-default bold"><?php echo nominal($data_pesanan_baru['total_pembayaran']); ?></h6>
                                    <h6 class="text-default bold"><?php echo $data_pesanan_baru['kode_pembayaran']; ?></h6>
                                </li>
                            </ul>
                    <a type="button" class="btn btn-danger mt-4 text-center" data-bs-toggle="modal" data-bs-target="#batal">Batal</a>
                    <a type="button" class="btn btn-success mt-4 text-center" data-bs-toggle="modal" data-bs-target="#modal">Bayar</a>
                </div>
            </div>
        </div>
    </section>

    <?php } ?>
    
    <?php
    } else { ?>
        <section class="container col-md-6 m-auto text-center py-5">
            <div class="row">

            <div class="col-md-6 col-lg-12 pb-5">
                <div class="h-100 py-5 services-icon-wap">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h6 class="text-muted">Tidak ada pemesanan baru</h6>
                        </li>
                    </ul>   
                </div>
            </div>
            </div>
        </section>
    <?php
    }
    ?>
    <hr>
    <?php
    
    if ($status == "selesai") {  

        $query_kos = mysqli_query($koneksi,"SELECT * FROM tb_pesan JOIN tb_kos
        ON tb_pesan.id_kos = tb_kos.id_kos JOIN tb_pembayaran
        ON tb_pesan.id_pesan = tb_pembayaran.id_pesan JOIN tb_pemilik_kos
        ON tb_kos.id_pemilik_kos = tb_pemilik_kos.id_pemiliik_kos 
        WHERE tb_pesan.id_customer ='$_SESSION[id]' AND tb_pesan.status_pemesanan ='selesai'");
        while($data_pesanan_selesai = mysqli_fetch_assoc($query_kos)){ ?>
        
                <section class="container col-md-6 m-auto text-center py-5">
                    <div class="row">
        
                    <div class="col-md-6 col-lg-12 pb-5">
                        <div class="h-100 py-5 services-icon-wap shadow" style="padding: 6rem;">
                                <h1 class="h3 text-uppercase bold"><?php echo $data_pesanan_selesai['nama_kos']; ?></h1>
                                <hr>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h6>Pemilik Kos</h6>
                                            <h6>Nomor Telepon pemilik kos</h6>
                                            <h6>Total pembayaran</h6>
                                            <h6>Kode Transaksi</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <h6>:</h6>
                                            <h6>:</h6>
                                            <h6>:</h6>
                                            <h6>:</h6>
                                        </li>
                                        <li class="list-inline-item">
                                            <h6 class="text-default bold"><?php echo $data_pesanan_selesai['nama_pemilik_kos']; ?></h6>
                                            <h6 class="text-default bold"><?php echo $data_pesanan_selesai['tlp_pemilik_kos']; ?></h6>
                                            <h6 class="text-default bold"><?php echo nominal($data_pesanan_selesai['total_pembayaran']); ?></h6>
                                            <h6 class="text-default bold"><?php echo $data_pesanan_selesai['kode_pembayaran']; ?></h6>
                                        </li>
                                    </ul>
 			                <a type="button" class="btn mt-5 text-center text-white bg-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_pemesanan_selesai&id=<?php echo $data_pesanan_selesai['id_pesan'];?>">Hapus</a>
                            <a href="index.php?p=detail_pemesanan&id=<?php echo $data_pesanan_selesai['id_pesan'];?>" type="button" class="btn mt-5 text-center text-white bg-default">Detail</a>
                        </div>
                    </div>
        
                </div>
            </section>
<?php
} 
?>
    <?php
    } else { ?>
        <section class="container col-md-6 m-auto text-center py-5">
            <div class="row">

            <div class="col-md-6 col-lg-12 pb-5">
                <div class="h-100 py-5 services-icon-wap">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h6 class="text-muted">Belum ada pemesanan yang selesai</h6>
                        </li>
                    </ul>   
                </div>
            </div>
            </div>
        </section>
    <?php
    }
    ?>
   
<?php
} else { ?>

       <section class="container col-md-6 m-auto text-center py-5">
            <div class="row">

            <div class="col-md-6 col-lg-12 pb-5">
                <div class="h-100 py-5 services-icon-wap">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6 class="text-muted">Anda belum melakukan pemesanan</h6>
                                </li>
                            </ul>
                        <a href="index.php?p=kost" class="h5 btn btn-get-started scrollto bg-default text-white">Lakukan pemesanan sekarang</a>     
                    </div>
                </div>
            </div>
        </section>
<?php
}
?>