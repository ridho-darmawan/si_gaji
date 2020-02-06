<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pembayaran_model extends CI_Model {

	function tampil_data()
	{
		$bulanGaji = date('m-Y', strtotime("-1 months"));
		$this->db->join('karyawan','gaji.nip = karyawan.nip');
		$this->db->join('jabatan','karyawan.kode_jabatan = jabatan.kode_jabatan');

		$this->db->where('periode_gaji',$bulanGaji);
		return $this->db->get('gaji');
	}

	function tampil_data__()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		return $this->db->query("SELECT * FROM gaji JOIN karyawan ON gaji.nip = karyawan.nip JOIN jabatan ON karyawan.kode_jabatan = jabatan.kode_jabatan WHERE periode_gaji = '$bulan-$tahun' ");
	}
	
	function get_code()
	{
		$this->db->select('RIGHT(gaji.id_gaji,3) as kode');
		$this->db->order_by('id_gaji', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('gaji');

		if ($query->num_rows() > 0){
			$data = $query->row();      
			$kode = intval($data->kode) + 1; 
		}
		else{
			$kode=1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		$kodejadi = "PG".$kodemax;     
		return $kodejadi;  
	}

	public function tambah_data($data,$table){
		$this->db->insert($table, $data);
		
		return true;
	}

	function hapus_data($id_gaji)
	{
		$hapus =$this->db->query("DELETE FROM gaji WHERE id_gaji='$id_gaji'");
		return $hapus;
	}

	function cek_gaji($nip,$periode_gaji){

		

		$query=$this->db->query("SELECT * FROM gaji WHERE nip='$nip' AND  periode_gaji='$periode_gaji'");
		return $query;
	}

	
	
}
