<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak_pdf extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Absensi_model');
		$this->load->model('Pembayaran_model');
		$this->load->model('Cetak_model');
		$this->load->helper(array('url','form','bulanGaji'));
	}

	function cetak($id){
		$data['absen']= $this->Absensi_model->tampil_data();
		$data['gaji']=$this->Cetak_model->tampil_rekap($id)->result();
		$this->load->view('cetak_view',$data);
		redirect('Pembayaran/index');
	}

	function cetak_karyawan($id){
		
		$data['gaji']=$this->Cetak_model->tampil_rekap($id)->result();
		$this->load->view('karyawan/cetak_view1',$data);
		
	}

	function cetak_hrga($id){
		
		$data['gaji']=$this->Cetak_model->tampil_rekap($id)->result();
		$this->load->view('cetak_view_hrga',$data);
	
	}

	function cetak_laporan(){
		$bulan = $this->uri->segment(3);
		$tahun = $this->uri->segment(4);
		$data['gaji']=$this->Cetak_model->tampil_cetak_laporan($bulan,$tahun)->result();
		$this->load->view('cetak_laporan_view', $data);
		
	}
	
}

