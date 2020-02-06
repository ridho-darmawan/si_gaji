<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Jabatan_model extends CI_Model {

	function tampil_data()
	{
		return $this->db->get('jabatan');	//mengambil data dari database dengan nama table
	}

	function input_data($data,$table)
	{
		$this->db->insert($table, $data);
	}


	function get_code()
	{
		$this->db->select('RIGHT(jabatan.kode_jabatan,3) as kode');
		$this->db->order_by('kode_jabatan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('jabatan');

		if ($query->num_rows() > 0){
			$data = $query->row();      
			$kode = intval($data->kode) + 1; 
		}
		else{
			$kode=1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		$kodejadi = "KJ".$kodemax;     
		return $kodejadi;  
	}

	function hapus_data($kode_jabatan)
	{
		$hapus =$this->db->query("DELETE FROM jabatan WHERE kode_jabatan='$kode_jabatan'");
		return $hapus;
	}

	function edit_data($kd_jabatan,$nm_jabatan,$tunjangan,$gapok)
	{
		$edit= $this->db->query("UPDATE jabatan SET kode_jabatan='$kd_jabatan', nama_jabatan='$nm_jabatan', tunjangan_jabatan='$tunjangan', gaji_pokok='$gapok' WHERE kode_jabatan='$kd_jabatan'");
		return $edit;
	}

}
