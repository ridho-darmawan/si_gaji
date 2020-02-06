<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan_model extends CI_Model {


	function tampil_data()
	{
		$this->db->select('karyawan.*, jabatan.*');
		$this->db->from('karyawan');
		$this->db->join('jabatan', 'jabatan.kode_jabatan = karyawan.kode_jabatan');
		$query=$this->db->get();
		return $query->result();
	}
		
	function input_data($data,$table)
	{
		return $this->db->insert($table, $data);
	}

	function get_code()
	{
		$this->db->select('RIGHT(karyawan.nip,3) as kode');
		$this->db->order_by('nip', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('karyawan');

		if ($query->num_rows() > 0){
			$data = $query->row();      
			$kode = intval($data->kode) + 1; 
		}
		else{
			$kode=1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		//$kodejadi = "2018".$kodemax;     
		return $kodemax;  
	}
	
	function edit_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus($nip)
	{
		$hapus =$this->db->query("DELETE FROM karyawan WHERE nip='$nip'");
		return $hapus;
	}


}
