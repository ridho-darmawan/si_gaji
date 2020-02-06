<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('Jabatan_model');
		$this->load->helper(array('url','form'));
	}

	public function index()
	{
		$data['jabatan']=$this->Jabatan_model->tampil_data()->result();
		$data['kode_unik']=$this->Jabatan_model->get_code();
		$data['main_view']='jabatan_view';
		$this->load->view('home_view', $data);
	}


	function tambah_aksi(){

		$input=array(
			
			$kd_jabatan = $this->input->post('kode_jabatan'),
			$nm_jabatan = htmlspecialchars($this->input->post('nama_jabatan')),
			$tunjangan = htmlspecialchars($this->input->post('tunjangan')),
			$gapok=htmlspecialchars($this->input->post('gapok')),
		);
	
		$data =array(

			'kode_jabatan'=>$kd_jabatan,
			'nama_jabatan' =>$nm_jabatan,
			'tunjangan_jabatan'=>$tunjangan,
			'gaji_pokok'=>$gapok,
		);

		$this->Jabatan_model->input_data($data,'jabatan');  //jabatan mrpkan table didatabse yangingin dituju

		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Tidak ada data yang diinput.</p>
				</div>');    
			$this->load->view('jabatan_view');
		}
		else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Input Jabatan '.$nm_jabatan.'.</p>
				</div>');    
			$this->load->view('jabatan_view');   
		};
		redirect ('Jabatan/index');
	}

	function hapus($kode_jabatan)
	{
		$kode_jabatan=$this->input->post('kode_jabatan');
		$this->Jabatan_model->hapus_data($kode_jabatan);

		if ($kode_jabatan == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('jabatan_view');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('jabatan_view'); 
		}
		redirect('Jabatan/index');
	}


	function edit()
	{
		$input=array(
			
			$kd_jabatan = $this->input->post('kode_jabatan'),
			$nm_jabatan = $this->input->post('nama_jabatan'),
			$tunjangan = $this->input->post('tunjangan'),
			$gapok=$this->input->post('gapok'),
			
		);

		
		$this->Jabatan_model->edit_data($kd_jabatan,$nm_jabatan,$tunjangan,$gapok);
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>	
				<p>Data Gagal Diedit</p>
				</div>');    
			$this->load->view('jabatan_view');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Diedit</p>
				</div>');    
			$this->load->view('jabatan_view'); 
		}
		redirect('Jabatan/index');
		
	}

}
