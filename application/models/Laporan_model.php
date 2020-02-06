
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function tampil_data_keuangan()
	{
		$bulanGaji = date('m-Y', strtotime("-1 months"));
		$this->db->join('karyawan','gaji.nip = karyawan.nip');
		$this->db->join('jabatan','karyawan.kode_jabatan = jabatan.kode_jabatan');
		$this->db->where('periode_gaji',$bulanGaji);
		return $this->db->get_where('gaji',['status'=>'0']);
	}


	function tampil_data_karyawan($nip)
	{
		$bulanGaji = date('m-Y', strtotime("-1 months"));
		$bulan = $this->input->post('bulan');
	 	$tahun = $this->input->post('tahun');
	 	$nip = $this->session->userdata('ses_id');
		$this->db->join('karyawan','gaji.nip = karyawan.nip');
		$this->db->join('jabatan','karyawan.kode_jabatan = jabatan.kode_jabatan');
		//$this->db->where('periode_gaji',$bulanGaji);

		//return $this->db->get_where('gaji',['status'=>'1']);

		// return $this->db->query("SELECT * FROM gaji  WHERE periode_gaji ='$bulan-$tahun' AND nip='$nip' AND status='1'");
		return $this->db->query("SELECT * FROM gaji  WHERE  nip='$nip' AND status='1'");

	}

	function tampil_data_rekap()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		return $this->db->query("SELECT * FROM gaji JOIN karyawan ON gaji.nip = karyawan.nip JOIN jabatan ON karyawan.kode_jabatan = jabatan.kode_jabatan WHERE periode_gaji = '$bulan-$tahun' AND status='1'");
	}

	function tampil_all_data_gaji()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		
		return $this->db->query("SELECT * FROM gaji JOIN karyawan ON gaji.nip = karyawan.nip WHERE periode_gaji ='$bulan-$tahun' AND status='1' ");
	}

	function total_gaji(){
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		
		return $this->db->query("SELECT (SUM(gaji_pokok) + SUM(tunjangan_jabatan) +sum(uang_lembur)+ sum(tunjangan_anak) + sum(tunjangan_makan) + sum(tunjangan_transportasi)) - sum(potongan) as totalgaji FROM gaji WHERE EXTRACT(MONTH FROM periode_gaji) = '$bulan' AND EXTRACT(YEAR FROM periode_gaji) = '$tahun'");
				
	}

	public function konfirmasi($id_gaji){
		//data yang mau di edit
		$data = [
			'status' => '1'
		];
		//sintaks edit data
		$this->db->where('id_gaji',$id_gaji);
		$this->db->update('gaji',$data);
		return true;
	}

}

/* End of file Laporan_model.php */
/* Location: ./application/models/Laporan_model.php */ ?>