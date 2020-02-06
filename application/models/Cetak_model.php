<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Cetak_model extends CI_Model {

	function tampil_rekap($id){
		return $this->db->query("SELECT * FROM gaji JOIN karyawan ON gaji.nip = karyawan.nip JOIN jabatan ON karyawan.kode_jabatan = jabatan.kode_jabatan WHERE id_gaji='$id'");
	}
	
	function tampil_cetak_laporan($bulan,$tahun){
		return $this->db->query("SELECT * FROM gaji JOIN karyawan ON gaji.nip = karyawan.nip WHERE periode_gaji ='$bulan-$tahun' AND status='1' ");
	}
}
