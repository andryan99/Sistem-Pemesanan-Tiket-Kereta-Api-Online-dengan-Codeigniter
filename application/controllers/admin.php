<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function kehalaman_login()
	{
		$data['judul']='Administrator';
		$this->load->view('admin/login',$data);
		
	}
	public function login()
	{
		$data=array(
			'username'=>$this->input->post('username'),
			'password'=>sha1($this->input->post('password')),
		);
		
		$cek=$this->admin_model->cekLogin($data);
		if($cek>0){
			$sess=array(
				'status'=>TRUE,
				'level'=>'admin',

			);
			$this->session->set_userdata($sess);
			redirect(base_url('admin/dashboard'));
		}else{
			redirect(base_url('login'));
		}
	}
		public function kehalaman_dashboard()
		{
			if($this->session->status===TRUE){
				$data['stasiun']=$this->admin_model->stasiun()->result();
			
			$this->load->view('admin/dashboard',$data);
		}else{
			redirect(base_url('login'));
		}
	}
	public function tambah_stasiun()
	{
		$nama=$this->input->post('stasiun');
		$input=$this->admin_model->tambah_stasiun($nama);

		redirect(base_url('admin/dashboard'));
	}

	public function hapus_stasiun($id)
	{
		$delete=$this->admin_model->delete($id);
		redirect(base_url('admin/dashboard'));
	}
	public function edit_stasiun($id)
	{
	$data['stasiun']=	$this->admin_model->edit($id)->row();
	$this->load->view('admin/edit_stasiun',$data);
	}
		public function logout()
		{
			session_destroy();
			redirect(base_url());
		}
		public function edit()
		{
			$nama=$this->input->post('nama_stasiun');
			$edit=$this->admin_model->edit_stasiun($nama);

			redirect(base_url('admin/dashboard'));
		}
		
public function kelola_gerbong()
{
	$data['kursi']=$this->admin_model->getKursi()->result();
	$data['jadwal']=$this->admin_model->getjadwal()->result();
	$this->load->view('admin/kelola_gerbong', $data);
}
		public function kelola_jadwal()
		{
			$data['stasiun']=$this->admin_model->stasiun()->result();
			$data['jadwal']=$this->admin_model->getjadwal()->result();
			$this->load->view('admin/kelola_jadwal', $data);
		}
		public function tambah_jadwal()
		{
			$data=array
			(
				'nama_kereta'=>$this->input->post('nama_kereta'),
				'asal'=>$this->input->post('asal'),
				'tujuan'=>$this->input->post('tujuan'),
				'tgl_berangkat'=>$this->input->post('tgl_berangkat'),
				'tgl_sampai'=>$this->input->post('tgl_sampai'),
				'kelas'=>$this->input->post('kelas'),
				'harga'=>$this->input->post('harga'),
			);

			$this->admin_model->tambah_jadwal($data);
			redirect(base_url('admin/kelola_jadwal'));
		}
		public function hapus_jadwal($id)
		{		$this->admin_model->delete_jadwal($id);
			redirect(base_url('admin/kelola_jadwal'));# code...
		}
		public function edit_jadwal($id)
	{
	$data['data_edit']=	$this->admin_model->editJadwal($id)->row();
	$data['stasiun']=$this->admin_model->stasiun()->result();
	$this->load->view('admin/edit_jadwal',$data);
	}

	public function editJadwal()
	{
		$data=array
		(
			'nama_kereta'=>$this->input->post('nama_kereta'),
			'asal'=>$this->input->post('asal'),
			'tujuan'=>$this->input->post('tujuan'),
			'tgl_berangkat'=>$this->input->post('tgl_berangkat'),
			'tgl_sampai'=>$this->input->post('tgl_sampai'),
			'kelas'=>$this->input->post('kelas'),
			'harga'=>$this->input->post('harga'),
		);
		$this->admin_model->edit_jadwal($data);
		redirect(base_url('admin/kelola_jadwal'));
	}
public function konfirmasi_pembayaran()
{
	$data['list']=$this->admin_model->getKonfirmasi()->result();
	$this->load->view('admin/konfirmasi_pembayaran', $data);
}
public function verifikasi($id)
{
	$update=$this->admin_model->updatePembayaran($id);
	if ($update) {
		$this->session->set_flashdata('pesan','Berhasil Verifikasi');
		
		redirect('admin/konfirmasi_pembayaran');
	}else{
		echo "gagal";
	}
}

public function berangkat_jadwal($id)
{
	$update=$this->admin_model->berangkat($id);

	if ($update) {
		$this->session->set_flashdata('pesann','Berhasil Mengubah Status Jadwal');
		redirect('admin/dashboard/kelola_jadwal');
		
	}else{
		echo "gagal";
	}
}

public function tambah_kursi()
{
	$jumlah=$this->input->post('jumlah');
	$bagian=$this->input->post('bagian');
	$jadwal=$this->input->post('jadwal');
	$insert=$this->admin_model->insertKursi($jumlah,$bagian,$jadwal);

	if ($insert) {
		$this->session->set_flashdata('pesann','Berhasil Menambah '.$jumlah.' kursi Pada Bagian '.$bagian.'di Jadwal '.$jadwal.'');

		redirect('admin/dashboard/kelola_gerbong');
		
	}else{
		echo "gagal";
	}
}
public function hapus_semua($table)
{
	$truncate=$this->db->truncate($table);

	if ($table==='stasiun') {
		$redirect='admin/dashboard';
	}else if($table==='kursi'){
		$redirect='admin/kelola_gerbong';
	}else if($table==='jadwal'){
		$redirect='admin/kelola_jadwal';
	}
	if ($truncate) {
		$this->session->set_flashdata('pesann','Berhasil Menghapus Data '.$table.'');

		redirect($redirect);
		
	}else{
		echo "Gagal";
	}
}

	}

