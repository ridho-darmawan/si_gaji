<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pembayaran_model');
		$this->load->helper(array('url','form'));
	}
	public function index()
	{		
		$data['content']=$this->db->get('karyawan')->result();
		$data['gaji']=$this->Pembayaran_model->tampil_data()->result();
		$data['kode_unik']=$this->Pembayaran_model->get_code();
		$data['main_view']='pembayaran_gaji_view';
		$this->load->view('home_view', $data);		

	}

	public function getByDate()
	{
		if($_POST){
			$data['content']=$this->db->get('karyawan')->result();
			
			$data['gaji']=$this->Pembayaran_model->tampil_data__()->result();
			$data['kode_unik']=$this->Pembayaran_model->get_code();
			$data['main_view']='pembayaran_gaji_view';
			$this->load->view('home_view', $data);	
		}
	}

	public function tambah(){

		$nip = $this->input->post('nip');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$periode_gaji=$this->input->post('bulan').'-'.$this->input->post('tahun');
		$karyawanInfo = $this->db->get_where('karyawan',['nip' => $nip])->row_array();
		$absenInfo = $this->db->get_where('absen',['nip'=>$nip])->row_array();
		//$anakInfo=$this->db->get_where('data_anak', ['nip'=>$nip])->row_array();
		//getTunjangan
		$jabatanInfo = $this->db->get_where('jabatan',['kode_jabatan' => $karyawanInfo['kode_jabatan']])->row_array();
		$gapok=$jabatanInfo['gaji_pokok'];
		//tunjangan pegawai
		$tunjangan = $jabatanInfo['tunjangan_jabatan'];

		//getUangLembur
		$lemburInfo = $this->db->query("SELECT SUM(lama_lembur) as totalLembur FROM lembur WHERE nip = '$nip' AND EXTRACT(MONTH FROM tgl_lembur) = '$bulan' AND EXTRACT(YEAR FROM tgl_lembur) = '$tahun'")->row_array();

		$jmlAnak=$this->db->query("SELECT nip from data_anak WHERE nip='$nip'");

		$uangLembur = $lemburInfo['totalLembur'] * ($jabatanInfo['gaji_pokok']*1/173);
		
		$potAbsen = $absenInfo['jumlah_alfa'] * ($jabatanInfo['gaji_pokok']/30);
		
		//tunjangan_anak
		$tunj_anak=($jmlAnak->num_rows())*200000;

		//tunjangan makan
		$tunj_makan=$absenInfo['jumlah_hadir']*15000;

		//tunjangan transportasi
		$tunj_trans=$absenInfo['jumlah_hadir']*20000;

		//$cek_data=$this->Lembur_model->cek_lembur($nip,$tgl,$lama);

		$data = array(
			'id_gaji' => $this->input->post('id'),
			'nip' => $nip,
			'periode_gaji' => $periode_gaji,
			'tanggal' => $this->input->post('tanggal'),
			'gaji_pokok' => $gapok,
			'tunjangan_jabatan' => $tunjangan,
			'uang_lembur' => $uangLembur,
			'potongan' => $potAbsen,
			'tunjangan_anak'=>$tunj_anak,
			'tunjangan_transportasi'=>$tunj_trans,
			'tunjangan_makan'=>$tunj_makan,

		);


		$cek_data=$this->Pembayaran_model->cek_gaji($nip,$periode_gaji);
		if ($cek_data->num_rows()>0) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Maaf</h4>
				<p>Anda Telah menghitung Gaji tersebut Pada Bulan Ini</p>
				</div>');    
			$this->load->view('pembayaran_gaji_view');
				
		} else {
			$this->Pembayaran_model->tambah_data($data,'gaji');
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Melakukan Transaksi Gaji</p>
				</div>'); 
			$this->load->view('pembayaran_gaji_view');
			//redirect('Pembayaran/index');
		};
		
		redirect('Pembayaran/index');
	}

	function hapus($id_gaji)
	{
		$id_gaji=$this->input->post('id_gaji');
		$this->Pembayaran_model->hapus_data($id_gaji);

		if ($id_gaji == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('pembayaran_gaji_view');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('pembayaran_gaji_view'); 
		}
		redirect('Pembayaran/index');
	}


}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */