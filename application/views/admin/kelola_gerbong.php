<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url('assets/t.jpg')?>"  type="image/png/jpg">
    <title>Kelola Gerbong - Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datatables.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datatables-b4.css')?>">
</head>
<body>
  
<?php include 'include/nav.php' ?>


<div class="container-fluid my-4">

<?php if( $this->session->flashdata('pesann')!==null):?>
<div class="alert alert-success">
<?= $this->session->flashdata('pesann')?>
</div>

<?php endif;?>

    
<div class="row">

<div class="col-md-8">
<div class="card">
    <div class="card-header bg-danger text-white">Daftar Bagian Gerbong</div>
    <div class="card-body">
    <div class="alert alert-primary">
                <strong>Perhatian !!!</strong>
                    Tombol <strong>"Hapus Semua Data"</strong> akan Menghapus Semua Data di Gerbong, Bagian, & Kursi dan <strong>Data Tidak Dapat Kembali Lagi</strong>
            </div>
       
        
        <button class="btn btn-primary mb-3" type="button" href="<?= base_url('hapus/semua/kursi')?>" onclick="return confirm('Yakin Ingin Menghapus Semua Data Gerbong, Bagian, Kursi ?')"><i class="fa fa-trash" >   Hapus Semua Data</i></button>

        <table class="table table-bordered table-hover table-striped datatables" style="width:100%" >
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Kereta</th>
                    <th>Nama Bagian</th>
                    <th>Kursi</th>
                    <th colspan="2">Aksi</th>
                </tr>

            </thead>
            <tbody>
              <?php $no=1; foreach($kursi as $kr):?>
               <tr class="text-center">
                 <td><?= $no++?></td>
                 <td><?= $kr->nama_kereta?></td>
                 <td><?= $kr->bagian?></td>
                 <td><?= $kr->kursi?></td>
                 <td>

                 <a href="<?php echo base_url('hapus_kursi/'.$kr->id)?>"class="btn btn-primary text-white"><i class="fa fa-trash">  Hapus</i></a>&nbsp;&nbsp;

                 </td>
               </tr>
              <?php endforeach;?>
            </tbody>
        </table>
     </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card-header bg-success text-white text-center">Form Tambah Stasiun</div>
    <div class="card-body">
    <form action="<?php echo base_url('tambah_kursi')?>" method="POST">

    <div class="form-group">
<label >Jadwal</label>
<select name="jadwal" class="form-control" required>
  <?php foreach($jadwal as $jd):?>
      <option value="<?= $jd->id?>"><?= $jd->nama_kereta?></option>
  <?php endforeach;?>
  </select>
</div>

    <div class="form-group">
<label >Bagian</label>
<select name="bagian" class="form-control" required>
  <option value="a"> Bagian A</option>
  <option value="b"> Bagian B</option>
  </select>
</div>

<div class="form-group">
<label >Jumlah Kursi</label>
<input type="number" name="jumlah" class="form-control" required>

</div>

<button class="btn btn-success btn-block">Tambah Kursi</button>
</form>

  
</div>
</div>
</div>


</div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url('assets/js/datatables.js')?>"></script>
<script src="<?php echo base_url('assets/js/datatables-b4.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<?php include 'include/datatables.php'?>
    
    </body>
    </html>




