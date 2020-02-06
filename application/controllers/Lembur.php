<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Lembur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Lembur_model');
		$this->load->model('Karyawan_model');
		$this->load->helper(array('url','form')); 
	}

	public function index()
	{
		$data['lembur']=$this->Lembur_model->tampil_data();
		$data['karyawan']=$this->Karyawan_model->tampil_data();
		$data['main_view']='lembur_view';
		
		

		$this->load->view('home_view', $data);
	}

	function tambah()
	{	
		$input=array(
			
			$nip = $this->input->post('nip'),
			$tgl=$this->input->post('tahun').'-'.$this->input->post('bulan').'-'.$this->input->post('hari'),
			$lama = $this->input->post('lama'),
			$no_surat=$this->input->post('no_surat'),
			$file_path = "assets/images/lembur/".$this->input->post('no_surat').".jpg"

		);

		$data =array(
			
			'nip'=>$nip,
			'tgl_lembur' =>$tgl,
			'lama_lembur'=>$lama,
			'no_surat'=>$no_surat,
			'surat_lembur'=>$file_path,
		);

	
		$file_tmp = $_FILES['surat_lembur']['tmp_name'];
		$file_type = $_FILES['surat_lembur']['type'];
		$file_error = $_FILES['surat_lembur']['error'];
		$file_size = $_FILES['surat_lembur']['size'];
		$file_path = "assets/images/lembur/".$this->input->post('no_surat').".jpg";

		if ($file_type == "image/jpeg" || $file_type == "image/png") {
			if ($file_size > 0 and  $file_error == 0) {
				move_uploaded_file($file_tmp,"assets/images/lembur/".$this->input->post('no_surat').".jpg" );
			}
		}

		$cek_data=$this->Lembur_model->cek_lembur($nip,$tgl,$lama);
		$cek_jumlah=$this->Lembur_model->cek_jumlah_lembur($nip);
		
		$jam = $cek_jumlah+$lama;

		if ($cek_data->num_rows()>0) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Maaf</h4>
				<p>Nip '.$nip. ' Sudah Mengajukan Lembur Pada Tanggal'.tgl($tgl).'</p>
				</div>');    
			$this->load->view('lembur_view');
			redirect('Lembur/index');
	
		}
		else {

			if ($jam<=9){
			$this->Lembur_model->input_data($data,'lembur'); 
				if ($input == null) {
				$this->session->set_flashdata('msg', 
					'<div class="alert alert-danger">
					<h4>Gagal	</h4>
					<p>Tidak ada data yang diinput.</p>
					</div>');    
				$this->load->view('lembur_view');
			}
				else {
					$this->session->set_flashdata('msg', 
						'<div class="alert alert-success">
						<h4>Berhasil </h4>
						<p>Anda Berhasil Input Data</p>
						</div>');    
					$this->load->view('lembur_view');   
				
					}
				redirect ('Lembur/index');
			
			}
			else{
			
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Maaf</h4>
				<p>NIP '.$nip. ' Sudah melebihi batas maksimum Lembur Pada bulan ini </p>
				</div>');    
			$this->load->view('lembur_view');
			redirect('Lembur/index');
			}
		}
	
}

	function hapus($no_surat)
	{
		$no_surat=$this->input->post('no_surat');
		$this->Lembur_model->hapus_data($no_surat);

		if ($no_surat == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('lembur_view');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('lembur_view'); 
		}
		redirect('Lembur/index');
	}

	function edit()
	{
		$input=array(
			$nip = $this->input->post('nip'),
			$tgl=$this->input->post('tahun').'-'.$this->input->post('bulan').'-'.$this->input->post('hari'),
			$lama = $this->input->post('lama'),
			$no_surat=$this->input->post('no_surat'),
			$foto_surat=$this->input->post('surat_lembur'),
			$file_path = "assets/images/".$nip.date('h-i-s').".jpg"

		);

		if ($_FILES['surat_lembur']['name'] == '') {
			
			$data=array(

			'no_surat'=>$no_surat,
			'nip'=>$nip,
			'tgl_lembur'=>$tgl,
			'lama_lembur'=>$lama,
		);

		}else{
			$data=array(
			'no_surat'=>$no_surat,
			'nip'=>$nip,
			'tgl_lembur'=>$tgl,
			'lama_lembur'=>$lama,
			'surat_lembur'=>$file_path,
			

		);

		$file_tmp = $_FILES['surat_lembur']['tmp_name'];
		$file_type = $_FILES['surat_lembur']['type'];
		$file_error = $_FILES['surat_lembur']['error'];
		$file_size = $_FILES['surat_lembur']['size'];
		// $file_path = "assets/images/".$_POST['nip'].".jpg";
		//$file_path = "assets/images/".$this->input->post('nip').".jpg";

		if ($file_type == "image/jpeg" || $file_type == "image/png") {
			if ($file_size > 0 and  $file_error == 0) {
				if(!move_uploaded_file($file_tmp,$file_path)){
					exit(3);
				}
			}else{
				exit(2);
			}
		}else{
			exit(1);
		}

		}

		$where = array('no_surat'=>$no_surat);

		$this->Lembur_model->edit_data($where,$data,'lembur');

		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Tidak ada data yang diedit.</p>
				</div>');    
			$this->load->view('lembur_view');
		}
		else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Mengedit Data Lembur</p>
				</div>');    
			$this->load->view('lembur_view');   
		};

		redirect('Lembur/index');
	}



}

/* End of file Lembur.php */
/* Location: ./application/controllers/Lembur.php */