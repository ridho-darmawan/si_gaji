<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Karyawan_model');
		$this->load->model('Jabatan_model');
		$this->load->helper(array('url','form'));
		$this->load->library(array('form_validation','session'));
	}
	

	public function index()
	{
		$data['kode_nip']=$this->Karyawan_model->get_code();
		$data['karyawan']=$this->Karyawan_model->tampil_data();
		$data['jabatan']=$this->Jabatan_model->tampil_data()->result();
		$data['main_view']='dt_karyawan_view';
		$this->load->view('home_view', $data);
	}


	function tambah_karyawan()
	{
		$input=array(

			$nip=$this->input->post('nip'),
			$nm=htmlspecialchars($this->input->post('nama_karyawan')),
			$jk=$this->input->post('jk'),
			$tl=$this->input->post('tempat_lahir'),
			$tgl_lhr=$this->input->post('tanggal_lahir'),
			$kd = $this->input->post('jabatan'),
			$aga = $this->input->post('agama'),
			$ala = $this->input->post('alamat'),
			$no= $this->input->post('no_telp'),
			$pass=$this->input->post('pass'),
			$lev=$this->input->post('level'),
			$file_path = "assets/images/".$this->input->post('nip').".jpg"

		);

		$data=array(

			'nip'=>$nip,
			'nama'=>$nm,
			'jenis_kelamin'=>$jk,
			'tempat_lahir'=>$tl,
			'tanggal_lahir'=>$tgl_lhr,
			'kode_jabatan'=>$kd,
			'agama'=>$aga,
			'alamat'=>$ala,
			'nomor_telpon'=>$no,
			'password'=>$pass,
			'level'=>$lev,
			'foto'=>$file_path,
			

		);

		$file_tmp = $_FILES['foto']['tmp_name'];
		$file_type = $_FILES['foto']['type'];
		$file_error = $_FILES['foto']['error'];
		$file_size = $_FILES['foto']['size'];
		$file_path = "assets/images/".$this->input->post('nip').".jpg";

		if ($file_type == "image/jpeg" || $file_type == "image/png") {
			if ($file_size > 0 and  $file_error == 0) {
				move_uploaded_file($file_tmp,"assets/images/".$this->input->post('nip').".jpg" );
			}
		}

		$this->Karyawan_model->input_data($data,'karyawan');

		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Tidak ada data yang diinput.</p>
				</div>');    
			$this->load->view('dt_karyawan_view');
		}
		else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Menambah Data Karyawan '.$nm.'.</p>
				</div>');    
			$this->load->view('dt_karyawan_view');   
		};

		redirect('Karyawan/index');
	}


	function edit_karyawan()
	{
		$input=array(

			$nip=$this->input->post('nip'),
			$nm=$this->input->post('nama_karyawan'),
			$jk=$this->input->post('jk'),
			$tl=$this->input->post('tempat_lahir'),
			$tgl_lhr=$this->input->post('tanggal_lahir'),
			$kd = $this->input->post('jabatan'),
			$aga = $this->input->post('agama'),
			$ala = $this->input->post('alamat'),
			$no= $this->input->post('no_telp'),
			$pass=$this->input->post('pass'),
			$lev=$this->input->post('level'),	
			$foto=$this->input->post('foto'),
			$file_path = "assets/images/".$nm.date('h-i-s').".jpg"
		);

		if ($_FILES['foto']['name'] == '') {
			
			$data=array(

			'nip'=>$nip,
			'nama'=>$nm,
			'jenis_kelamin'=>$jk,
			'tempat_lahir'=>$tl,
			'tanggal_lahir'=>$tgl_lhr,
			'kode_jabatan'=>$kd,
			'agama'=>$aga,
			'alamat'=>$ala,
			'nomor_telpon'=>$no,
			'password'=>$pass,
			'level'=>$lev,
			// 'foto'=>$file_path,
			

		);

		}else{
			$data=array(

			'nip'=>$nip,
			'nama'=>$nm,
			'jenis_kelamin'=>$jk,
			'tempat_lahir'=>$tl,
			'tanggal_lahir'=>$tgl_lhr,
			'kode_jabatan'=>$kd,
			'agama'=>$aga,
			'alamat'=>$ala,
			'nomor_telpon'=>$no,
			'password'=>$pass,
			'level'=>$lev,
			'foto'=>$file_path,
			

		);

		$file_tmp = $_FILES['foto']['tmp_name'];
		$file_type = $_FILES['foto']['type'];
		$file_error = $_FILES['foto']['error'];
		$file_size = $_FILES['foto']['size'];
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

		$where = array('nip'=>$nip);

		$this->Karyawan_model->edit_data($where,$data,'karyawan');

		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Tidak ada data yang diedit.</p>
				</div>');    
			$this->load->view('jabatan_view');
		}
		else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Mengedit Data Karyawan '.$nm.'.</p>
				</div>');    
			$this->load->view('jabatan_view');   
		};

		redirect('Karyawan/index');
	}

	function hapus_data($nip)
	{
		$nip=$this->input->post('nip');
		$this->Karyawan_model->hapus($nip);

		if ($nip == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('dt_karyawan_view');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('dt_karyawan_view'); 
		}
		redirect('Karyawan/index');
	}

	
	

}

