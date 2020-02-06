
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Riwayat_keluarga extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('Riwayat_keluarga_model');
		$this->load->model('Karyawan_model');
		$this->load->model('Data_anak_model');
		
	}

	public function index()
	{
		
		$data['data']=$this->Riwayat_keluarga_model->tampil_data()->result();
		$data['karyawan']=$this->Karyawan_model->tampil_data();
		

		$data['main_view']='riwayat_keluarga_view';
		$this->load->view('home_view', $data);		
	}

	function tambah(){
		$input= array(
			$nip = $this->input->post('nip'),
			$sta='Menikah',
			$akta_nikah=$this->input->post('no_akta'),
			$nm_pas=$this->input->post('pasangan'),
			$tgl=$this->input->post('tgl_nikah'),
		);

		$data= array(
			'nip'=>$nip,
			'status'=>$sta,
			'no_akta_nikah'=>$akta_nikah,
			'nm_pasangan'=>$nm_pas,
			'tgl_nikah'=>$tgl,
		);

		$this->Riwayat_keluarga_model->input_data($data,'riwayat_keluarga');

		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Tidak ada data yang diinput.</p>
				</div>');    
			$this->load->view('riwayat_keluarga_view');
		}
		else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Input Data.</p>
				</div>');    
			$this->load->view('riwayat_keluarga_view');   
		};
		redirect ('Riwayat_keluarga/index');

	}

	function hapus($id)
	{
		$id=$this->input->post('id');
		$this->Riwayat_keluarga_model->hapus_data($id);

		if ($id == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('riwayat_keluarga_view');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('riwayat_keluarga_view'); 
		}
		redirect('Riwayat_keluarga/index');
	}


	function edit()
	{

		$input= array(
			
			$id=$this->input->post('id'),
			$nip = $this->input->post('nip'),
			$sta=$this->input->post('status'),
			$akta_nikah=$this->input->post('no_akta'),
			$nm_pas=$this->input->post('pasangan'),
			$tgl=$this->input->post('tgl_nikah'),
		);
		

		
		$this->Riwayat_keluarga_model->edit_data($id,$nip,$sta,$akta_nikah,$nm_pas,$tgl);
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>	
				<p>Data Gagal Diedit</p>
				</div>');    
			$this->load->view('riwayat_keluarga_view');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Diedit</p>
				</div>');    
			$this->load->view('riwayat_keluarga_view'); 
		}
		redirect('Riwayat_keluarga/index');
		
	}

}

/* End of file Riwayat_keluarga.php */
/* Location: ./application/controllers/Riwayat_keluarga.php */ ?>