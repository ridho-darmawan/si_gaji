<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->load->model('Karyawan_model');		
	}

	public function index()
	{
		$data['karyawan']=$this->Karyawan_model->tampil_data();
		$this->load->view('login_view');
	}


	public function dologin(){

		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

		$cek_user=$this->login_model->login($username,$password);

		if ($cek_user->num_rows()>0) {
			$data=$cek_user->row_array();
			$this->session->set_userdata('masuk',TRUE);
			if ($data['level']== '1') { //1 akses admin
				$this->session->set_userdata('akses','1');
				$this->session->set_userdata('ses_id',$data['nip']);
				$this->session->set_userdata('ses_nama',$data['nama']);
				$this->session->set_userdata('ses_level',$data['level']);
				$this->session->set_userdata('ses_pass',$data['password']);
				$this->session->set_userdata('ses_foto',$data['foto']);
				//$this->session->set_userdata('ses_jabatan',$data['kode_jabatan']);


				redirect('home');

			}else if ($data['level']=='2') {
				$this->session->set_userdata('akses','2');

				$this->session->set_userdata('ses_id',$data['nip']);
				$this->session->set_userdata('ses_nama',$data['nama']);
				$this->session->set_userdata('ses_level',$data['level']);
				$this->session->set_userdata('ses_pass',$data['password']);
				$this->session->set_userdata('ses_foto',$data['foto']);
				redirect('home');

			}else if ($data['level']=='3') {
				$this->session->set_userdata('akses','3');

				$this->session->set_userdata('ses_id',$data['nip']);
				$this->session->set_userdata('ses_nama',$data['nama']);
				$this->session->set_userdata('ses_level',$data['level']);
				$this->session->set_userdata('ses_pass',$data['password']);
				$this->session->set_userdata('ses_foto',$data['foto']);
				redirect('home');
			}
			else{
				$data['notif']='Maaf, Username dan Password Salah';
				$this->load->view('login_view', $data);
			}
		}else{
			$data['notif']='Maaf, Username dan Password Salah';
			$this->load->view('login_view', $data);
		}

		
	}

	

	function keluar()
	{
		$this->session->sess_destroy();
		redirect('Login/index');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */