<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url('assets/t.jpg')?>"  type="image/png/jpg">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datatables.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datatables-b4.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
 
</head>
<body>
<?php include 'include/nav.php' ?>
 
<div class="container-fluid my-4">
<div class="row">

    <div class="col-md-8">
    <div class="card">
        <div class="card-header bg-danger text-white">Daftar Stasiun</div>
        <div class="card-body">
            <div class="alert alert-primary">
                <strong>Perhatian !!!</strong>
                    Tombol <strong>"Hapus Semua Data"</strong> akan Menghapus Semua Data di Stasiun dan <strong>Data Tidak Dapat Kembali Lagi</strong>
            </div>
        <button class="btn btn-primary" type="button" href="<?= base_url('hapus/semua/stasiun')?>" onclick="return confirm('Yakin Ingin Menghapus Semua Data Stasiun ?')"><i class="fa fa-trash" >   Hapus Semua Data</i></button><br><br>
            <table class="table table-bordered table-hover table-striped datatables" style="width:100%" >
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Stasiun</th>
                        <th colspan="2">Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    <?php $no=1;?>
                    <?php foreach($stasiun as $st):?>
                    <tr class="text-center">
                        <th><?php echo $no++?></th>
                        <th><?php echo $st->nama_stasiun?></th>
                        <th>
                            <a class="btn btn-warning text-white" href="<?php echo base_url('admin/dashboard/edit/'.$st->id)?>"><i class="fa fa-edit">  Edit</i></a> &nbsp; &nbsp;
                            <a class="btn btn-primary text-white" href="<?php echo base_url('hapus_stasiun/'.$st->id)?>"class="text-danger"><i class="fa fa-trash">  Hapus</i></a>
                        </th>
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
        <form action="<?php echo base_url('tambah_stasiun')?>" method="POST">
<div class="form-group">
<label >Nama Stasiun</label>
<input type="text" class="form-control" name="stasiun" placeholder="Masukkan Nama Stasiun">
</div>

<button class="btn btn-success btn-block">Tambah Stasiun</button>
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




