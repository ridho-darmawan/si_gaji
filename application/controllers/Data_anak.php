<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_anak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('Data_anak_model');
		$this->load->model('Karyawan_model');
	}

	public function index()
	{
		 $nip = $this->uri->segment(3);
		$data['data']=$this->Data_anak_model->tampil_data($nip)->result();
		$data['main_view']='data_anak_view';
		$this->load->view('home_view', $data);
	}

	function tambah()
	{
		$input= array(
			$nip = $this->input->post('nip'),
			$no_akta=$this->input->post('no_akta_anak'),
			$nama=$this->input->post('nama_anak'),
		);

		$data= array(
		    'id_anak'=>'',
			'nip'=>$nip,
			'no_akta_anak'=>$no_akta,
			'nama_anak'=>$nama,

		);

		$this->Data_anak_model->input_data_anak($data,'data_anak');

		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
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
		$this->Data_anak_model->hapus_data($id);

		if ($id == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('data_anak_view');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('data_anak_view'); 
		}
		redirect('Riwayat_keluarga/index');
	}


	function edit()
	{


        $nip=$this->input->post('nip');
		$input= array(
            $id=$this->input->post('id'),
            $no_akta=$this->input->post('no_akta'),
            $nama=$this->input->post('nama_anak'),
		);

		
		$this->Data_anak_model->edit_data($id,$no_akta,$nama);
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>	
				<p>Data Gagal Diedit</p>
				</div>');
            redirect("Data_anak/index/".$nip);
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Diedit</p>
				</div>');
            redirect("Data_anak/index/".$nip);
		}
		redirect("Data_anak/index/".$nip);
		
	}

}

/* End of file Data_anak.php */
/* Location: ./application/controllers/Data_anak.php */ ?>