<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= base_url('assets/t.jpg')?>"  type="image/png/jpg">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">

</head>

<body>
    <div class="container-fluid">
   <div class="row justify-content-center">
       <div class="col-md-4">
<div class="card my-5">
    <div class="card-header bg-dark text-white text-center">
        Login Sebagai Admin
    </div>
    <div class="card-body">
    <form action="<?php echo base_url('proses_login')?>" method="POST">
        <div class="form-group">
            <label >Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
        </div>
        <div class="form-group">
            <label >Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
        </div>
        <button class="btn btn-primary btn-block">
            <i class="fa fa-check">  Login</i>
        </button>

    </form>

    </div>
    </div>
</div>
   </div> 
   </div>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>