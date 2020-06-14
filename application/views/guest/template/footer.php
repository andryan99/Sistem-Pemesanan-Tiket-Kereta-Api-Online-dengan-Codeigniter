    
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script>
$('.bagian_a').hide();
$('.bagian_b').hide();

<?php  if ($this->uri->segment(1)==="konfirmasi"):?>
    cekBagian();
    $(document).ready(function() {
    
    $("select.select_gerbong").change(function(){
        var gerbong=$(this).children('option:selected').val();

        if(gerbong==="1"){
gambar.attr('src','<?= base_url('assets/gerbong/1.png')?>')
}else if(gerbong==="2"){
    gambar.attr('src','<?= base_url('assets/gerbong/2.png')?>')
}else if(gerbong==="3"){
    gambar.attr('src','<?= base_url('assets/gerbong/3.png')?>')
}else if(gerbong==="4"){
    gambar.attr('src','<?= base_url('assets/gerbong/4.png')?>')
}else if(gerbong==="5"){
    gambar.attr('src','<?= base_url('assets/gerbong/5.png')?>')
}

    var bagian=$('.bagian').val();
    var button=$('#btn_konfirmasi');
    var pesan=$('.pesan');
if (gerbong === "0" || bagian === "0" ) {
    button.attr("disabled",true);
    pesan.removeClass("d-none");
    pesan.text("Pastikan Pilih Gerbong dan Bagian Gerbong !");
    pesan.addClass("text-warning");
}else {
    button.attr("disabled",false);
    pesan.addClass("d-none");
    pesan.removeClass("text-warning");
}
    
    });
    });
   

<?php  endif; ?>
var gambar=$('.img_gerbong');
 var gerbong=$('.select_gerbong').val();

function cekBagian() {
    var bagian=$('.bagian');
    var bagian_a=$('.bagian_a');
    var bagian_b=$('.bagian_b');

    if(bagian.val()==="a"){
bagian_a.show();
bagian_b.hide();
bagian_b.removeAttr('name');
bagian_b.removeAttr('required');
bagian_a.Attr('name','kursi');

}else if(bagian.val()==="b"){
    bagian_b.show();
    bagian_a.hide();
    bagian_b.Attr('name','kursi');
    bagian_a.removeAttr('name');
    bagian_b.removeAttr('required');
}


var bagian=$('.bagian').val();
    var button=$('#btn_konfirmasi');
    var pesan=$('.pesan');
if (gerbong === "0" || bagian === "0" ) {
    button.attr("disabled",true);
    pesan.removeClass("d-none");
    pesan.text("Pastikan Pilih Gerbong dan Bagian Gerbong !");
    pesan.addClass("text-warning");
}else {
    button.attr("disabled",false);
    pesan.addClass("d-none");
    pesan.removeClass("text-warning");
}

}
$('.foto').change(function () {
    var gerbong=$('.select_gerbong').val();
    var bagian=$('.bagian').val();
    var button=$('#btn_konfirmasi');
    var pesan=$('.pesan');
if (gerbong === "0" || bagian === "0" ) {
    button.attr("disabled",true);
    pesan.removeClass("d-none");
    pesan.text("Pastikan Pilih Gerbong dan Bagian Gerbong !");
    pesan.addClass("text-warning");
}else {
    button.attr("disabled",false);
    pesan.addClass("d-none");
    pesan.removeClass("text-warning");
}

});


</script>

</body>
    </html>