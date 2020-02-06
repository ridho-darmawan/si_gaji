
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absensi_model extends CI_Model {

	function input_data($data,$table)
	{
		$this->db->insert($table, $data);
	}

	function tampil_data()
	{
		$d=date('m',strtotime("-1 months"));
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->where('bulan',$d);
		$query=$this->db->get();
		return $query->result();
	}
	function cek_absen($nip,$bln,$thn){
		$query = $this->db->query("SELECT * FROM absen WHERE nip='$nip' AND bulan = '$bln' AND tahun='$thn'");
		return $query;

	}

	function edit_data($nip,$bln,$thn,$kerja,$sakit,$alfa,$izin)
	{
		
		$edit= $this->db->query("UPDATE absen SET nip='$nip', bulan=$bln, tahun=$thn, jumlah_hadir=$kerja, jumlah_sakit=$sakit, jumlah_alfa=$alfa, jumlah_izin=$izin WHERE nip='$nip'");
		return $edit;
	}



}

