<?php 
if ($this->session->flashdata('nomor')===null) :?>

<div class="container-fluid">
<div class="row justify-content-center my-3">
    
<div class="col-md-5">
    <div class="alert alert-danger">
        <h4>ANDA TELAH REFERESH HALAMAN</h4><br>
        <p>Silahkan Pesan Kembali</p>
    </div>
    
  <?php else:?> 
    <div class="container-fluid">
<div class="row justify-content-center my-3">
<div class="col-md-5">
    <div class="alert alert-danger">
        <h4>JANGAN REFERESH HALAMAN</h4><br>
        <p>Untuk Menghindari Kegagalan Sistem</p>
    </div> 
<div class="card">
    <div class="card-body">
        <h1 class="text-success">Selamat !</h1>
<h3>Anda Berhasil Melakukan Pemesanan Tiket</h3>
<hr>
<h5 class="text-warning text-center">Silahkan Lakukan Pembayaran Sesuai Detail Berikut :</h5>   
<br>
<hr>
            <h3 class="text-center">9882344927923</h3>
            <p class="text-center font-weight-bold mb-0">a/n PT KAI</p>
            <p class="text-center">BNI Syariah Kode Bank 002</p>
           <h5 class="text-center">Total Yang Harus Dibayar</h5>
           <h2 class="text-center"><?= $this->session->flashdata('nomor');
           ?></h2>

<h5 class="text-center">Kode Pembayaran Anda</h5>
           <h2 class="text-center"><?= $this->session->flashdata('kode');
           ?></h2>

           <br><br><hr>
            <p class="text-danger">Jika Sudah Transfer Lakukan Konfirmasi Pembayaran pada Link Berikut :
                <a target="blank" href="<?= base_url('konfirmasi')?>">Konfirmasi Pembayaran</a>
            </p>
           <h4 class="text-center">TERIMA KASIH</h4>

        </div>
            </div>
        </div>
    </div>
</div> 
<?php endif; ?>