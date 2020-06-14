<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function kehalamandepan()
	{
		$data['judul']='E-KERETA';
		$data['stasiun']=$this->guest_model->tampil()->result();
		$this->load->view('guest/template/header',$data);
		$this->load->view('guest/halaman_depan');
		$this->load->view('guest/template/footer');
	}
	public function kehalaman_konfirmasi()
	{
		
		$data['judul']='E-KERETA => Konfirmasi';
	if(isset($_GET['kode'])): 
		$kode=$_GET['kode'];
		$data['no_tiket']=$this->guest_model->getPembayaranwhere($kode)->row();
		$data['detail']=$this->guest_model->cekKonfirmasi($data['no_tiket']->no_tiket)->result();
		$tiket=$this->guest_model->getTiketWhere($data['no_tiket']->no_tiket)->row();
		$data['bagian_a']=$this->guest_model->getKursiWhere('a', $tiket->id_jadwal)->result();
		$data['bagian_b']=$this->guest_model->getKursiWhere('b', $tiket->id_jadwal)->result();
	endif;

		$this->load->view('guest/template/header',$data);
		$this->load->view('guest/halaman_konfirmasi',$data);
		$this->load->view('guest/template/footer');
	}
	public function cari_tiket()
	{
		$data=array(
			'asal'=>$this->input->post('asal'),
			'tujuan'=>$this->input->post('tujuan'),
			'status'=>0,
		);
		$data['tiket']=$this->guest_model->cari_tiket($data)->result();
		$data['penumpang']=$this->input->post('jumlah');
		$dat['judul']='E-KERETA';
		$data['stasiun']=$this->guest_model->tampil()->result();
		
		
		$this->load->view('guest/template/header',$dat);
		$this->load->view('guest/halaman_depan',$data);
		$this->load->view('guest/template/footer');

	}
	public function pesan($id)
	{
		$dat['judul']='E-KERETA => Formulir Data Diri';
		$data['info']=$this->guest_model->info_pesan($id)->row();
		$data['id_jadwal']=$id;
		$this->load->view('guest/template/header',$dat);
		$this->load->view('guest/data_diri',$data);
		$this->load->view('guest/template/footer');

	}
	public function pesanTiket()
	{
		$penumpang=$this->input->post('penumpang');
		//generate nomor pembayaran
		$cek=$this->guest_model->getPembayaran()->num_rows()+1;
		$no_pembayaran='TR246'.$cek;
		$harga=$this->input->post('harga');
		$total=$penumpang*$harga;
		$no_tiket='TIKET'.$cek;
		$data=array
		(
			'no_pembayaran'=>$no_pembayaran,
			'no_tiket'=>$no_tiket,
			'total_pembayaran'=>$total,
			'status'=>0,
		);
		$this->guest_model->insertPembayaran($data);
		//generate nomor tiket
		$cek=$this->guest_model->getTiket()->num_rows()+1;
		$no_tiket='TIKET'.$cek;
		
		//input data penumpang
		for ($i=1; $i<=$penumpang ; $i++) { 
			$data=array
			(
				'nomor_tiket'=>$no_tiket,
				'nama'=>$this->input->post('nama'.$i),
				'no_identitas'=>$this->input->post('identitas'.$i),
				
			);
			$this->guest_model->insertPenumpang($data);
		}
		//input data pemesan
		$data=array
		(
			'nomor_tiket'=>$no_tiket,
			'id_jadwal'=>$this->input->post('id_jadwal',$i),
			'nama_pemesan'=>$this->input->post('nama_pemesan'),
			'email'=>$this->input->post('email'),
			'no_telepon'=>$this->input->post('no_telepon'),
			'alamat'=>$this->input->post('alamat'),
			'tanggal'=>date('Y-m-d h:i:s'),
			
		);
		$this->guest_model->insertPemesan($data);
		$this->session->set_flashdata('kode', $no_pembayaran);
		$this->session->set_flashdata('nomor', $total);
		
		redirect('pembayaran',$total);
		
	}
public function halaman_pembayaran()
{	
	

	$dat['judul']='E-KERETA => Konfirmasi Pembayaran';
	$this->load->view('guest/template/header',$dat);
	$this->load->view('guest/pembayaran');
	$this->load->view('guest/template/footer');
}

public function cekKonfirmasi()
{
	$kode=$this->input->post('kode');
	redirect('konfirmasi?kode='.$kode);
}
public function PilihGerbong()
{
	$kodenya=$this->input->post('kode');
	$nama=$this->input->post('nama');
	$kode=$this->guest_model->getPembayaranwhere($kodenya)->row();

	$gerbong=$this->input->post('gerbong');
	$bagian=$this->input->post('bagian');
	$kursi=$this->input->post('kursi');
	$query="select kursi from kursi where id=$kursi";
	$sql=$this->db->query($query)->row();
	$data=array
	(
		'gerbong'=>$gerbong,
		'bagian'=>$bagian,
		'kursi'=>$sql->kursi,
	);

	//validasi data kursi  tidak sama
	$tiket=$this->guest_model->getTiketWhere($kode->no_tiket)->row();
	$cek=$this->guest_model->validasiGerbong($gerbong, $bagian, $sql->kursi, $tiket->id_jadwal)->num_rows();
	
	if ($cek>0) {
		$this->session->set_flashdata('dipesan', 'Mohon Maaf Gerbong, Bagian & Kursi Sudah Dipesan');
		
		redirect('konfirmasi?kode='.$kodenya);
	}else{
		$update=$this->guest_model->PilihGerbong($data, $kode->no_tiket, $nama);
	}

	//update kursi
	$tiket=$this->guest_model->getTiketWhere($kode->no_tiket)->row();
	$update=$this->guest_model->updateKursi($kursi);
	
	
	if ($update) {
		redirect('konfirmasi?kode='.$kodenya);
	}else{
		echo "gagal";
	}


}

public function kirimKonfirmasi()
{ 	
	//upload gambar
	$config['upload_path']          = './assets/bukti';
	$config['allowed_types']        = 'gif|jpg|png|jpeg|tiff';
	// $config['max_size']             = 2048;//2MB
	// $config['max_width']            = 1024;
	// $config['max_height']           = 768;

	$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload('gambar'))
	{
			$error = array('error' => $this->upload->display_errors());

			redirect('konfirmasi',$error);
			echo "Gagal Upload"; die();
	}
	else
	{
		$no=$this->input->post('no_pembayaran');
			// $data = $this->upload->data();
			// $filename=$data['file_name'];
			$filename=$this->upload->data('file_name');
			$this->guest_model->insertbukti($filename, $no);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil Mengirim Bukti, Silahkan Cek Kembali 12 jam Kemudian untuk mengecek Pembayaran anda
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
			redirect('konfirmasi');
	}

}
public function print()
{
	$no_tiket=$this->input->post('no_tiket');

	$data['detail']=$this->guest_model->getPrint($no_tiket)->row();

	$data['jml_penumpang']=$this->guest_model->cekKonfirmasi($no_tiket)->num_rows();
	$dat['judul']='E-KERETA => Print Tiket';
	$this->load->view('guest/template/header',$dat);
	$this->load->view('print',$data);
	$this->load->view('guest/template/footer');
}
}

