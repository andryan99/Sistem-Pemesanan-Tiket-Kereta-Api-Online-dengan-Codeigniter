<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url('assets/t.jpg')?>"  type="image/png/jpg">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
</head>
<body>
    
<?php include 'include/nav.php' ?>

<div class="container-fluid my-4">
<div class="row justify-content-center">

    <div class="col-md-4">
    <div class="card">
        <div class="card-header text-center bg-dark text-white">Edit Jadwal</div>
        <div class="card-body">

        <form action="<?php echo base_url('edit_jadwal')?>" method="POST">
<div class="form-group">
<label >Nama Kereta</label>
<input type="hidden" name="id" value="<?= $data_edit->id?>">
<input type="text" class="form-control" name="nama_kereta" placeholder="Masukkan Nama Kereta" required  value="<?php echo $data_edit->nama_kereta?>">
</div>

<div class="form-group">
<label >Stasiun Asal </label>
<select name="asal" class="form-control "required>
    <optgroup label="TERPILIH">
        <option value="<?= $data_edit->asal ?>"><?= $data_edit->ASAL ?></option>
    </optgroup>
    <optgroup label="PILIHAN">
    <?php foreach($stasiun as $st):?>            
<option value="<?= $st->id?>"><?php echo $st->nama_stasiun?></option>
<?php endforeach;?>
    </optgroup>

</select>
</div>

<div class="form-group">
<label >Stasiun Tujuan</label>
<select name="tujuan" class="form-control "required>
    <optgroup label="TERPILIH">
        <option value="<?= $data_edit->tujuan ?>"><?= $data_edit->TUJUAN ?></option>
    </optgroup>
    <optgroup label="PILIHAN">
    <?php foreach($stasiun as $st):?>            
<option value="<?= $st->id?>"><?php echo $st->nama_stasiun?></option>
<?php endforeach;?>
    </optgroup>

</select>
</div>

<div class="form-group">
<label >Tanggal Berangkat</label>
<?php $date=date_create($data_edit->tgl_berangkat);?>
<input type="datetime-local" name="tgl_berangkat" min="<?php echo date('Y-m-d\TH:i')?>" value="<?php echo date_format($date, 'Y-m-d\TH:i')?>" class="form-control" required>
</div>

<div class="form-group">
<label >Tanggal Sampai</label>
<?php $date=date_create($data_edit->tgl_sampai);?>
<input type="datetime-local"  class="form-control" name="tgl_sampai" min="<?= date('Y-m-d\TH:i')?>" value="<?php echo date_format($date,'Y-m-d\TH:i')?>" required>
</div>

<div class="form-group">
<label >Kelas</label>
<select name="kelas" class="form-control "required>
    <optgroup label="TERPILIH">
        <option value="<?= $data_edit->kelas ?>"><?= $data_edit->kelas ?></option>
    </optgroup>
    <optgroup label="PILIHAN">
   
<option value="EKONOMI">EKONOMI</option>
<option value="BISNIS">BISNIS</option>
<option value="EKSEKUTIF">EKSEKUTIF</option>
    </optgroup>

</select>
</div>

<div class="form-group">
<label >Harga</label>

<input type="text" class="form-control" name="harga" placeholder="Masukkan Harga Tiket" required  value="<?php echo $data_edit->harga?>">
</div>


<button class="btn btn-success btn-block">Update Jadwal</button>
</form>
    </div>
    

      
</div>
</div>
</div>
</div>

<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    
    </body>
    </html>




