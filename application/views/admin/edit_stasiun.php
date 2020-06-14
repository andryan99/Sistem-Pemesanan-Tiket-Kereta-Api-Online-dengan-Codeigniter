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
        <div class="card-header text-center bg-dark text-white">Edit Stasiun</div>
        <div class="card-body">

            <form action="<?php echo base_url('edit_stasiun')?>" method="post">
                <div class="form-group">
                    <label >Nama Stasiun</label>
                    <input type="hidden" name="id" value="<?php echo $stasiun->id?>">
                    <input type="text" class="form-control" name="nama_stasiun" value="<?php echo $stasiun->nama_stasiun?>">
                </div>
                <button class="btn btn-primary btn-block">Edit Nama Stasiun</button>
            </form>
           
        
    </div>
    

      
</div>
</div>
</div>
</div>

<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    
    </body>
    </html>




