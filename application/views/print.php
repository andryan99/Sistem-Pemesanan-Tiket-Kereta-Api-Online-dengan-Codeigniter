<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center card-header bg-success text-white" ><b>E-Kereta</b></h1>
                    <hr>
                    <div class="row">
                        <!--kiri-->
                        <div class="col-md-6">
                            <p>Nama Pemesan : <strong><?= $detail->nama_pemesan?></strong></p>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <?php $date=date_create($detail->tanggal)?>
                            <p class="">Tanggal Pesan <br>   <strong><?= date_format($date, "d F Y")?>, Jam : <?= date_format($date, "h:i:s") ?></strong></p>
                                                    
                            
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-md-5">
                           
                            <p>Jumlah Penumpang :   <strong><?= $jml_penumpang ?></strong></p>
                            <p class="text-left">Harga/Tiket        :   <strong><?= "Rp.". number_format($detail->harga, 2,'.', '.') ?></strong></p>
                            <p class="text-left">Harga Total        :   <strong><?= "Rp.". number_format($detail->harga*$jml_penumpang, 2,'.', '.')?></strong></p>
                        </div>
                      
                        <!--kanan-->
                        
                        <div class="col-md-7">
                            <p class="">Nama Kereta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:   <strong><?= $detail->nama_kereta?></strong></p>                
                        <?php $dat=date_create($detail->tgl_berangkat)?>              
                            <p class="">Tanggal Berangkat :  <strong><?= date_format($dat, "d F Y")?>, Jam : <?= date_format($dat, "h:i:s") ?></strong></p>                
                            <?php $da=date_create($detail->tgl_sampai)?>              
                            <p class="">Tanggal Sampai&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:  <strong><?= date_format($da, "d F Y")?>, Jam : <?= date_format($da, "h:i:s") ?></strong></p>                
                            <p class="">Kelas :   <strong><?= $detail->kelas?></strong></p>                
                            
                            </div>
                        </div>
                        <hr>
                        <p class="text-center">Rute :   <strong><?= $detail->ASAL?> - <?= $detail->TUJUAN?></strong></p>                
          
                    
                </div>
            </div>
        </div>
    </div>
</div>