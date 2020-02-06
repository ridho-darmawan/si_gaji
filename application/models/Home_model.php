<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function tampil_data()
	{
		$this->db->select('karyawan.*');
		$this->db->from('karyawan');
		$query=$this->db->get();
		return $query->result();
	}

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */