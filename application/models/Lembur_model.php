<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Lembur_model extends CI_Model {
	
	
	function tampil_data()
	{
		$d=date('y-m-d');
		$date=$d;	
		$this->db->select('a.*, b.nama, b.nip,(SELECT SUM(lama_lembur) AS lama FROM lembur c WHERE EXTRACT(MONTH FROM tgl_lembur) = '.date('m').' AND c.nip = a.nip) AS lama_lembur2');
		$this->db->from('lembur a');
		$this->db->join('karyawan b', 'b.nip = a.nip');
		$this->db->where('tgl_lembur',$date);
		
		$query=$this->db->get();
		return $query->result();
	}

	function input_data($data,$table)
	{
		$this->db->insert($table, $data);
	}
	
	function hapus_data($no_surat)
	{
		$hapus =$this->db->query("DELETE FROM lembur WHERE no_surat='$no_surat'");
		return $hapus;
	}

	function edit_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}


	function cek_lembur($nip,$tgl_lembur,$lama)
	{
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');

		$query=$this->db->query("SELECT * FROM lembur WHERE nip='$nip' AND tgl_lembur= '$tgl_lembur' AND EXTRACT(MONTH FROM tgl_lembur) = '$bulan' AND EXTRACT(YEAR FROM tgl_lembur) = '$tahun'");
		return $query;
	}

	function cek_jumlah_lembur($nip)
	{
		$bulan=$this->input->post('bulan');
		$tahun=$this->input->post('tahun');

		$lemburInfo = $this->db->query("SELECT SUM(lama_lembur) as totalLembur  FROM lembur WHERE nip = '$nip' AND EXTRACT(MONTH FROM tgl_lembur) = '$bulan' AND EXTRACT(YEAR FROM tgl_lembur) = '$tahun'");

		if($lemburInfo->num_rows()>0){
					return $lemburInfo->row()->totalLembur;
		}
		 return false;
	}


}
