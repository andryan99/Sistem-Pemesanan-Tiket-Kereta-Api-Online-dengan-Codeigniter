
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <div class="row">
<div class="col-md-8">
  
<h1 class="display-4 text-black shado"><b style="font-weight: 500;">Selamat Datang di E-Kereta</b></h1>
<p class="lead  text-black shad"><b>Anda dapat melakukan pemesanan Tiket Kereta Api Online dengan Mudah</b></p>
</div>

<div class="col-md-4">

<form action="<?php echo base_url('cari_tiket')?>" method="POST">
    <div class="form-group  text-white shadow">
        <label><b><b><b>Stasiun Asal</b></b></b></label>
        <select name="asal" class="form-control">
<?php foreach($stasiun as $st):?>
        <option value="<?php echo $st->id?>"><?php echo $st->nama_stasiun?></option>
      <?php endforeach ;?> 
      </select>
        
    </div>

    <div class="form-group text-white shadow">
        <label><b>Stasiun Tujuan</b></label>
        <select name="tujuan" class="form-control">
        <?php foreach($stasiun as $st):?>
        <option value="<?php echo $st->id?>"><?php echo $st->nama_stasiun?></option>
      <?php endforeach ;?> 
        </select>
        
    </div>

    <div class="form-group text-white shadow">
        <label><b>Tanggal Berangkat</b></label>
        <input type="date" class="form-control" name="tanggal" min="<?php echo date('Y-m-d')?>" value="<?php echo date('Y-m-d')?>">
        
    </div>

    <div class="form-group text-white shadow">
        <label><b>Jumlah Penumpang</b></label>
        <select name="jumlah" class="form-control">
<?php for($i=1; $i<=4;$i++){?>
  <option value="<?php echo $i ?>"><?php echo $i ?> Penumpang</option>
<?php }?>
        
        </select>
        
    </div>

    <button class="btn btn-success btn-block "><i class="fa fa-search">   Cari Tiket</i></button>
</form>

</div>
    </div>
    
  </div>
</div>


<div class="container">
<hr>
<?php if(!isset($tiket)): ?>
  
  <?php else :?>
<div class="table-responsive">
<table class="table table-hover table-striped table-bordered">
  <thead class="bg-success text-white text-center">
    <tr>
      <th>No</th>
      <th>Nama Kereta</th>
      <th>Tanggal Berangkat</th>
      <th>Tanggal Sampai</th>
      <th colspan="1">Aksi</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php if($tiket===null) :?>
      <p class="text-center"> Maaf Tiket tidak tersedia</p>
      <?php endif;?>
    <?php $no=1;?>
    <?php foreach($tiket as $tk):?>
      <tr>
        <td><?= $no++?></td>
        <td><?= $tk->nama_kereta?></td>
        <td><?php $date=date_create($tk->tgl_berangkat); echo date_format($date,"d-m-Y h:i:s") ?></td>
        <td><?php $date=date_create($tk->tgl_sampai); echo date_format($date,"d-m-Y h:i:s") ?></td>
        <td>
          <a class="btn btn-primary" href="<?= base_url('pesan/'.$tk->id.'?p='.$penumpang)?>"><i class="fa fa-check">   Pesan</i></a>
        </td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>
    <?php endif;?>
</div>