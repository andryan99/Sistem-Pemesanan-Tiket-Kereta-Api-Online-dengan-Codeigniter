<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url('assets/t.jpg')?>"  type="image/png/jpg">
    <title>Konfirmasi Pembayaran - Admin</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/datatables.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datatables-b4.css')?>">


</head>
<body>
<?php include 'include/nav.php' ?>

<div class="container-fluid my-4">
<div class="card">
        <div class="card-header">Daftar Pembayaran</div>
        <div class="card-body">
<?php echo $this->session->flashdata('pesan')?>
<div class="card-header"><h3 class="text-center">Daftar Bukti Pembayaran</h3></div>
    <div class="row">
    
        <div class="card-body">
        <div class="table-responsive ">
            <table class="table table-striped table-bordered table-hover datatables">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">No. Pembayaran</th>
                        <th class="text-center">Nomor Tiket</th>
                        <th class="text-center">Total Pembayaran</th>
                        <th class="text-center" width="20%">Bukti Pembayaran</th>
                        <th class="text-center" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody><?php $no=1 ?>
                    <?php foreach($list as $li):?>
                    <tr>
                        <td class="text-center"><?= $no++?></td>
                        <td class="text-center"><?= $li->no_pembayaran?></td>
                        <td class="text-center"><?= $li->no_tiket?></td>
                        <td class="text-center"><?= $li->total_pembayaran?></td>
                        <td class="text-center">
                            <a href="<?= base_url('assets/bukti/'.$li->bukti)?>" target="blank">
                            <img width="50%"  src="<?= base_url('assets/bukti/'.$li->bukti)?>" alt="">
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-success">
                            
                                <a onclick="return confirm('Yakin Ingin Verifikasi No. Pembayaran <?= $li->no_pembayaran ?>?')" href="<?=base_url('verifikasi/'.$li->id) ?>" class="btn btn-sm btn-group-success"><i class="fa fa-check"> Verifikasi</i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        
        </div>
    </div>
    </div>
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




