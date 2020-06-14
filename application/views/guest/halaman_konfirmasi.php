
<div class="container-fluid">
    <div class="row justify-content-center my-5">
    <?php if ($this->session->flashdata('pesan')!==null) :?>
            <div class="alert alert-success">
<?php echo $this->session->flashdata('pesan')?>
            </div>
        <?php endif;?>
    <div class="col-md-7 ">
  
        <div class="card">
        <div class="card-header bg-primary text-white text-center">
            Konfirmasi Pembayaran
        </div>
        <div class="card-body">

        <form action="<?= base_url('cekKonfirmasi')?>" method="POST">
        <div class="form-group">
            <label>Kode Booking</label>
        <input type="text" name="kode" class="form-control" placeholder="Masukkan Kode Booking">

        </div>
    
<button class="btn btn-success"><i class="fa fa-check-circle">  Cek Kode Booking</i></button>

</form>
    </div>
        </div>

        <hr>
        <?php if (isset($_GET['kode'])) :?>
        <h4>Kode Pesan : <?= $_GET['kode']?></h4>
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                Detail Pembayaran Anda
            </div>
            <div class="card-body">
                <h1 class="text-center">
                    <?php if ($no_tiket->status==='0'){?>
                    <i class="fa fa-times text-primary">
                            Belum Dibayar
                    </i>
                    <?php } else if ($no_tiket->status==='2'){?>
                            <i class="fa fa-check text-success">
                            Sudah Dibayar
                    </i>
                        <?php };?>
                </h1>
<?php
if ($this->session->flashdata('dipesan')!==null):?>
    <div class="alert alert-danger text-center">
    <?= $this->session->flashdata('dipesan')?>
    </div>

<?php endif;?>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Nama</th>
                                <th>Identitas</th>
                                <th>Gerbong</th>
                                <th>Bagian</th>
                                <th>Kursi</th>
                                <?php if ($no_tiket->status!=='2'):?>
                                <th>Aksi</th>
                                <?php else: endif?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach ($detail as $dt):?>
                                <tr class="text-center">
                                    <td><?= $dt->nama?></td>
                                    <td><?= $dt->no_identitas?></td>
                                    <td>  <?= $dt->gerbong?>    </td>

                                    <td>   <?= $dt->bagian?></td>

                                    <td>  <?=$dt->kursi?>     </td>
                                    <?php if ($no_tiket->status!=='2'):?>
                                   <td>
                                   <?php if ($dt->gerbong===null || $dt->bagian===null || $dt->kursi===null):  ?>
                                        <button type="button" data-toggle="modal" data-target="#pilihGerbong<?= $dt->id?>"  class="btn btn-sm btn-warning">Pilih </button>
                                    <?php else: ?>
                               <button type="button" data-toggle="modal" data-target="#gantiGerbong<?= $dt->id?>"  class="btn btn-sm btn-success">Ganti </button>
                                    <?php endif;?>
                                   </td>
                                   <?php else: endif?>
                                    </tr>


                                    <?php if($dt->gerbong!==null && $dt->kursi!==null && $dt->bagian!==null) :?>
                                   
                                    <div class="modal fade" id="gantiGerbong<?= $dt->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ganti Gerbong</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="<?= base_url('PilihGerbong')?>" method="post">
                                    <input type="hidden" name="kode" value="<?= $_GET['kode']?>">
                                    <input type="hidden" name="nama" value="<?= $dt->nama?>">

                            <div class="modal-body">
                                        <img  class="img-fluid img_gerbong" alt="">
                            <select class="form-control select_gerbong" name="gerbong"  required ">
                                <option value="0" >=== GANTI GERBONG ===</option>
                                
                                <?php for ($i=1; $i <=5; $i++) :?>
                                    <?php if ($dt->gerbong==$i): 
                                        $select ='selected';
                                    else:
                                        $select='';
                                    endif;
                                    ?>
                                
                            <option <?= $select?> value="<?php echo $i ?>" > Gerbong <?= $i?></option>
                                <?php endfor;?>
                            </select><br>
                            <select class="form-control bagian" name="bagian"  required>
                            <option value="0" >=== PILIH BAGIAN ===</option>
                            <?php for ($i='a'; $i<='b'; $i++) :?>
                                    <?php if ($dt->bagian==$i): 
                                        $select ='selected';
                                    else:
                                        $select='';
                                    endif;
                                    ?>  
                            
                            <option <?= $select?> value="<?= $i?>"><?= $i?></option>
                            <?php endfor;?>
                            </select><br>
                            <select class="form-control bagian_a" name="kursi" required>
                            <?php foreach($bagian_a as $bagian):?>
                                
                                <?php if ($dt->kursi==$i): 
                                        $select ='selected';
                                    else:
                                        $select='';
                                    endif;
                                    ?>  
                                    <option $select value="<?= $bagian->id ?>"><?= $bagian->KURSI?></option>
                                <?php endforeach;?>
                            </select>

                            <select class="form-control bagian_b" name="kursi"  required>
                            <?php foreach($bagian_b as $bagian):?>  
                           
                                    <?php if ($dt->kursi==$i): 
                                        $select ='selected';
                                    else:
                                        $select='';
                                    endif;
                                    ?>  
                                <option $select value="<?= $bagian->id ?>"><?= $bagian->KURSI?></option>
                                <?php endforeach;?>
                            </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ganti Gerbong</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                        <?php else : ?>

                        <!-- Modal pilh -->
                        
                                    <div class="modal fade" id="pilihGerbong<?=$dt->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pilih Gerbong</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                                    <form action="<?= base_url('PilihGerbong')?>" method="post">
                                    <input type="hidden" name="kode" value="<?= $_GET['kode']?>">
                                    <input type="hidden" name="nama" value="<?= $dt->nama?>">

                            <div class="modal-body">
                                        <img  class="img-fluid img_gerbong"  alt="">
                            <select class="form-control select_gerbong" name="gerbong"  required onchange="cekGerbong()">
                                <option value="0" >=== PILIH GERBONG ===</option>
                            <option value="1">Gerbong 1</option>
                                <option value="2">Gerbong 2</option>
                                <option value="3">Gerbong 3</option>
                                <option value="4">Gerbong 4</option>
                                <option value="5">Gerbong 5</option>

                            </select>
                            <br>
                            <select class="form-control bagian" name="bagian"  required onchange="cekBagian()">
                            <option value="0" >=== PILIH BAGIAN ===</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                            </select>
                            
                            <br>
                            <p class="text-primary"><strong>Pilihan Kursi Hanya Yang Belum DiPesan</strong></p>
                            <select class="form-control bagian_a" name="kursi" required>
                                <?php foreach($bagian_a as $bagian):?>
                                
                                <option value="<?= $bagian->id?>"><?= $bagian->KURSI?></option>
                                <?php endforeach;?>
                            </select>

                            <select class="form-control bagian_b" name="kursi"  required>
                            <?php foreach($bagian_b as $bagian):?>
                                <option value="<?= $bagian->id ?>"><?= $bagian->KURSI?></option>
                                <?php endforeach;?>
                            </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Pilih Gerbong</button>
                            </div>
                            </form>
                            </div>
                                
                        </div>
                        </div>

                        <?php endif; ?>

                        


                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <p><b>Total Pembayaran Anda : Rp. 
                <?= $no_tiket->total_pembayaran ?></b><br><br>
                <?php if ($no_tiket->status==='2'):?>
                    <form action="<?= base_url('print')?>" method="post">
                        <input type="hidden" value="<?= $no_tiket->no_tiket?>" name="no_tiket">
                        <button type="submit"  class="btn btn-success"  >
                    
                        <i class="fa fa-print  text-white">  PRINT</i>
                        
                </button>
                   
                    </form>
               
                
                <?php endif;?>
                
                <?php if ($no_tiket->status==='0'):?>
                </p>
                <?= form_open_multipart('kirimKonfirmasi');?>
                <p class="text-success">Silahkan Kirim Bukti Pembayaran Anda pada Kolom di Bawah</p>
                <input type="hidden" name="no_pembayaran" value="<?= $no_tiket->no_pembayaran?>">
               
                

                <p>Form Bukti Pembayaran</p>
                            <input id="foto" type="file" name="gambar" class="form-control" required >    
                            <br>
                            <p class="d-none" id="pesan">
                                
                            </p>
                            <button id="btn_konfirmasi" class="btn btn-success btn-block text-center" type="submit"> Kirim Bukti Pembayaran </button>
                <?= form_close();?>
                <?php else: ?>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
    </div>
</div>
