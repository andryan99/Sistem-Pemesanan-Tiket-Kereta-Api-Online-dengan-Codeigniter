
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="<?= base_url('admin/dashboard')?>">Admin Panel</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url()?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard/kelola_jadwal')?>">Kelola Jadwal <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/kelola_gerbong')?>">Kelola Gerbong <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/konfirmasi_pembayaran')?>">Konfirmasi Pembayaran <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text">
    <a href="<?php echo base_url('admin/logout')?>" style="text-decoration:none">
    
    Logout</a>
    </span>
  </div>
</nav>