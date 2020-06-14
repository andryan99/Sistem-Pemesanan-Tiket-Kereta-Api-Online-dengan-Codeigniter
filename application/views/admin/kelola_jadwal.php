<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url('assets/t.jpg')?>"  type="image/png/jpg">
    <title>Kelola Jadwal - Admin</title>
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


    <div class="card">
        <div class="card-header bg-danger text-white ">Daftar Jadwal</div>
        <div class="card-body">
        <div class="alert alert-primary">
                <strong>Perhatian !!!</strong>
                    Tombol <strong>"Hapus Semua Data"</strong> akan Menghapus Semua Data di Jadwal Kereta dan <strong>Data Tidak Dapat Kembali Lagi</strong>
            </div>
       
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus">  Tambah Jadwal</i></button> &nbsp;&nbsp;
        <button class="btn btn-primary mb-3" type="button" href="<?= base_url('hapus/semua/jadwal')?>" onclick="return confirm('Yakin Ingin Menghapus Semua Data Jadwal ?')"><i class="fa fa-trash" >   Hapus Semua Data</i></button>

            <table class="table table-bordered table-hover table-striped datatables">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Kereta</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Tanggal Berangkat</th>
                        <th>Tanggal Sampai</th>
                        <th>Kelas </th>
                        <th>Harga</th>
                        <th colspan="2">Aksi</th>
                    </tr>

                </thead>
                <tbody>
                <?php $no=1;?>
                <?php foreach($jadwal as $jd):?> 
                    
                   
                    <tr class="text-center">
                        <td><?php echo $no++?></td>
                       <td><?php echo $jd->nama_kereta?></td>
                       <td><?php echo $jd->ASAL?></td>
                       <td><?php echo $jd->TUJUAN?></td>
                       <td><?php $date=date_create($jd->tgl_berangkat); echo date_format($date,"d-m-Y h:i:s") ?></td>
        <td><?php $date=date_create($jd->tgl_sampai); echo date_format($date,"d-m-Y h:i:s") ?></td>
                       <td><?php echo $jd->kelas?></td>
                       <td><?php echo 'Rp. ', number_format($jd->harga, 0,'.','.') ?></td>
                       <td>
                            <div class="btn-group btn-group-sm">

                            
                            <a href="<?php echo base_url('admin/dashboard/edit_jadwal/'.$jd->id)?>" class="btn btn-danger text-white"><i class="fa fa-edit">  Edit</i></a>&nbsp;&nbsp;
                            <a href="<?php echo base_url('hapus_jadwal/'.$jd->id)?>"class="btn btn-primary text-white"><i class="fa fa-trash">  Hapus</i></a>&nbsp;&nbsp;

                            <?php if($jd->status==='0'):?>
                            <a href="<?php echo base_url('admin/dashboard/berangkat_jadwal/'.$jd->id)?>"class="btn btn-success text-white"><i class="fa fa-check">  Berangkat</i></a>
                            <?php else:?>
                            <button class="btn btn-success text-white" disabled> <i class="fa fa-check"> Sudah Berangkat</i></button>
                            <?php endif;?>
                        </td>
                        </div>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
         </div>
        </div>
        

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('tambah_jadwal')?>" method="POST">
      <div class="modal-body">
      
      
       
<div class="form-group">
<label >Nama Kereta</label>
<input type="text" class="form-control" name="nama_kereta" placeholder="Masukkan Nama Kereta" required>
</div>

<div class="form-group">
<label >Stasiun Asal </label>
<select name="asal" class="form-control "required>
<?php foreach($stasiun as $st):?>            
<option value="<?= $st->id?>"><?php echo $st->nama_stasiun?></option>
<?php endforeach;?>
</select>
</div>

<div class="form-group">
<label >Stasiun Tujuan</label>
<select name="tujuan" class="form-control" required>
<?php foreach($stasiun as $st):?>            
<option value="<?= $st->id?>"><?php echo $st->nama_stasiun?></option>
<?php endforeach;?>
</select>
</div>

<div class="form-group">
<label >Tanggal Berangkat</label>
<input type="datetime-local" name="tgl_berangkat" min="<?php echo date('Y-m-d\TH:i')?>" value="<?php echo date('Y-m-d\TH:i')?>" class="form-control" required>
</div>

<div class="form-group">
<label >Tanggal Sampai</label>
<input type="datetime-local"  class="form-control" name="tgl_sampai" min="<?= date('Y-m-d\TH:i')?>" value="<?php echo date('Y-m-d\TH:i')?>" required>
</div>

<div class="form-group">
<label >Kelas</label>
<select name="kelas" class="form-control" required>
<option value="EKONOMI">EKONOMI</option>
<option value="BISNIS">BISNIS</option>
<option value="EKSEKUTIF">EKSEKUTIF</option>
</select>
</div>

<div class="form-group">
<label >Harga</label>
<input type="number" name="harga" class="form-control" placeholder="Masukkan Harga" required>
</div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button class="btn btn-success">Tambah Jadwal</button>
      </div>
      </form>
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




