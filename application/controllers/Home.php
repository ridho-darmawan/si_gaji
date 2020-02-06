<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Karyawan_model');
		$this->load->helper('url');
		$this->load->helper(array('form','url'));

		if ($this->session->userdata('masuk')!= TRUE) {
			$url=base_url();
			redirect($url);
		}
	}
	

	public function index()
	{
		$data['karyawan']=$this->Karyawan_model->tampil_data();
		$data['jumlah']=$this->db->get('karyawan')->num_rows()	;
		$data['main_view']='beranda_view';
		$this->load->view('home_view',$data);
	}

}

/* End of file Index.php */
/* Location: ./application/controllers/Index.php */