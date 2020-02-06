	
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_model');
		$this->load->helper(array('url','form'));
	}

	
	public function data_gaji_keuangan()
	{
		$data['content']=$this->db->get('karyawan')->result();
		$data['gaji']=$this->Laporan_model->tampil_data_keuangan()->result();
		$data['main_view']='keuangan/data_gaji_view';
		$this->load->view('home_view', $data);
	}

	 public function data_gaji_karyawan()
	 {
	 	$nip = $this->session->userdata('ses_id');
	 	$data['content']=$this->db->get('karyawan')->result();
	 	$data['gaji']=$this->Laporan_model->tampil_data_karyawan($nip)->result();
	 	$data['main_view']='karyawan/data_gaji_view';
	 	$this->load->view('home_view', $data);
	 }

	public function all_rekap_gaji(){
		$data['gaji']=$this->Laporan_model->tampil_data_rekap()->result();
		$data['main_view']='laporan_gaji_view';
		$this->load->view('home_view', $data);
	}

	// public function all_rekap_gaji_keuangan(){
	// 	$data['gaji']=$this->Laporan_model->tampil_data_rekap()->result();
	// 	$data['main_view']='keuangan/laporan_gaji_view';
	// 	$this->load->view('home_view', $data);
	// }

	//konfirmasi gaji untuk 
	public function konfirmasi_gaji($id_gaji){
		if($this->Laporan_model->konfirmasi($id_gaji)){
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Konfirmasi Berhasil </h4>
				<p>Anda Telah Menyetujui Transaksi Gaji</p>
				</div>'); 
			redirect('Laporan/data_gaji_keuangan');
		}else{
			exit('Data unknown!');
		}
	}

	public function getByDate()
	{
		if($_POST){
			$data['content']=$this->db->get('karyawan')->result();
			$data['gaji']=$this->Laporan_model->tampil_data_rekap()->result();
			$data['main_view']='laporan_gaji_view';
			$this->load->view('home_view', $data);	
		}
	}

	public function laporan_gaji()
	{	

		$data['content']=$this->db->get('karyawan')->result();
		$data['gaji']=$this->Laporan_model->tampil_all_data_gaji()->result();
		$data['bulan'] = $this->input->post('bulan');
		$data['tahun'] = $this->input->post('tahun');
		//$data['totalGaji']=$this->Laporan_model->total_gaji()->row_array();
		$data['main_view']='laporan_gaji_view';
		$this->load->view('home_view', $data);		
	}

	
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */ ?>