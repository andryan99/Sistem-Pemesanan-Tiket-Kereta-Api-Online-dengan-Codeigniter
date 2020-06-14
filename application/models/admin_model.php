<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function cekLogin($data)
	{
		return $this->db->get_where('admin',$data)->num_rows();

	}
	public function stasiun()
	{
		return $this->db->get('stasiun');

	}
	public function tambah_stasiun($nama)
	{
		$data=array(
			'nama_stasiun'=>$nama
		);
		return $this->db->insert('stasiun',$data);

	}
	public function delete($id){
$this->db->where('id',$id);
return $this->db->delete('stasiun');
	}
	public function delete_jadwal($id){
		$this->db->where('id',$id);
		return $this->db->delete('jadwal');
			}
	public function edit($id){
		$data=array(
			'id'=>$id,
		);
		
		return $this->db->get_where('stasiun',$data);
			}
	public function edit_stasiun($nama){
		$data=array(
			'nama_stasiun'=>$nama,
		);
		$this->db->where('id',$this->input->post('id'));
		return $this->db->update('stasiun',$data);
					}


		public function tambah_jadwal($data)
		{
		return $this->db->insert('jadwal',$data);
		}
	public function getjadwal()
	{
		$this->db->select('jadwal.*, Asal.nama_stasiun as ASAL, Tujuan.nama_stasiun as TUJUAN');
		$this->db->from('jadwal');
		$this->db->join('stasiun as Asal','jadwal.asal=Asal.id','left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan=Tujuan.id','left');
		return $this->db->get();
	}
	public function editJadwal($id){
		$data=array(
			'jadwal.id'=>$id,
		);
		
		$this->db->select('jadwal.*, Asal.nama_stasiun as ASAL, Tujuan.nama_stasiun as TUJUAN');
		$this->db->from('jadwal');
		$this->db->where($data);

		$this->db->join('stasiun as Asal','jadwal.asal=Asal.id','left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan=Tujuan.id','left');
		return $this->db->get();
			}
	public function edit_jadwal($data){

		$this->db->where('id',$this->input->post('id'));
		return $this->db->update('jadwal',$data);
					}
public function getKonfirmasi()
		{
			$where=array(
				'status'=>1,
			);
			return $this->db->get_where('pembayaran',$where);
		}
		public function updatePembayaran($id)
		{
			
		$data=array(
			'status'=>2,
		);
		$this->db->where('id',$id);
		return $this->db->update('pembayaran',$data);
		}

		public function berangkat($id)
		{
			$data=array(
				'status'=>1,
			);
			$this->db->where('id',$id);
			return $this->db->update('jadwal',$data);
		}

		public function getKursi()
		{
			$this->db->join('jadwal','jadwal.id=kursi.id_jadwal');
			return $this->db->get('kursi');
		}

		public function insertKursi($jumlah,$bagian,$id_jadwal)
		{
			for ($i=1; $i <=$jumlah ; $i++) { 
				$data=array(
					'kursi'=>$i,
					'bagian'=>$bagian,
					'id_jadwal'=>$id_jadwal,
				);
				$insert=$this->db->insert('kursi',$data);
			}
			return $insert;
		}
}
