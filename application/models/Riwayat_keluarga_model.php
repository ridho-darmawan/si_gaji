<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Riwayat_keluarga_model extends CI_Model {

	function tampil_data()
	{

		$this->db->join('karyawan','riwayat_keluarga.nip = karyawan.nip');
		
		//$this->db->join('data_anak', 'riwayat_keluarga.nip = data_anak.nip');
		return $this->db->get('riwayat_keluarga');	//mengambil data dari database dengan nama table
	}
	
	function input_data($data,$table){
		$this->db->insert($table, $data);
	}


	function hapus_data($id)
	{

		$hapus =$this->db->query("DELETE FROM riwayat_keluarga WHERE id='$id'");
		return $hapus;
	}

	function edit_data($id,$nip,$sta,$akta_nikah,$nm_pas,$tgl)
	{
		$edit= $this->db->query("UPDATE riwayat_keluarga SET nip='$nip', status='$sta', no_akta_nikah='$akta_nikah', nm_pasangan='$nm_pas', tgl_nikah='$tgl' WHERE id='$id'");
		return $edit;
	}

}

/* End of file Riwayat_keluarga_model.php */
/* Location: ./application/models/Riwayat_keluarga_model.php */ ?>