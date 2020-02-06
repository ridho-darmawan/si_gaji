
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absensi extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Absensi_model');
		$this->load->model('Karyawan_model');
		$this->load->model('Jabatan_model');
		$this->load->helper(array('url','form','bulanGaji'));
		$this->load->library('calendar');
	}

	function index()
	{
		$data['karyawan']= $this->Karyawan_model->tampil_data();
		$data['absen']= $this->Absensi_model->tampil_data();
		$data['main_view']='absensi_view';
		$this->load->view('home_view', $data);
	}


	public function tambah()
	{
		$input = array(
			$nip=$this->input->post('nip'),
			$bln=$this->input->post('bulan'),
			$thn=$this->input->post('tahun'),
			$kerja=$this->input->post('hari_kerja'),
			$sakit=$this->input->post('hari_sakit'),
			$alfa=$this->input->post('hari_alfa'),
			$izin=$this->input->post('hari_izin'),
			 );
		$data=array(
			'nip'=>$nip,
			'bulan'=>$bln,
			'tahun'=>$thn,
			'jumlah_hadir'=>$kerja,
			'jumlah_sakit'=>$sakit,
			'jumlah_alfa'=>$alfa,
			'jumlah_izin'=>$izin,
		);
			

		$cek_data=$this->Absensi_model->cek_absen($nip,$bln,$thn);
		if ($cek_data->num_rows()>0) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Maaf</h4>
				<p>Anda Telah Menginputkan Absen Bulan Ini</p>
				</div>');    
			$this->load->view('absensi_view');
			redirect('Absensi/index');	
		}else{
			$this->Absensi_model->input_data($data,'absen');  //jabatan mrpkan table didatabse yangingin dituju
					if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Tidak ada data yang diinput.</p>
				</div>');    
			$this->load->view('absensi_view');
		}
		else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Input Absensi.</p>
				</div>');    
			$this->load->view('absensi_view');   
		};
	
		}

		
		redirect ('Absensi/index');
	}

	function edit(){
		$input = array(
			$nip=$this->input->post('nip'),
			$bln=$this->input->post('bulan'),
			$thn=$this->input->post('tahun'),
			$kerja=$this->input->post('hari_kerja'),
			$sakit=$this->input->post('hari_sakit'),
			$alfa=$this->input->post('hari_alfa'),
			$izin=$this->input->post('hari_izin'),
			 );


		$this->Absensi_model->edit_data($nip,$bln,$thn,$kerja,$sakit,$alfa,$izin);
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>	
				<p>Data Gagal Diedit</p>
				</div>');    
			$this->load->view('Absensi_view');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Diedit</p>
				</div>');    
			$this->load->view('Absensi_view'); 
		}
		redirect('Absensi/index');
	}

}


