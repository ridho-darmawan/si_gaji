<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_anak_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	function tampil_data($nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->get('data_anak');	//mengambil data dari database dengan nama table
    }
    function jumlah_anak($nip){
		return $this->db->query("SELECT * from data_anak WHERE nip='$nip'");
    }

    function input_data_anak($data,$table)
	{
		$this->db->insert($table, $data);
	}

	function hapus_data($id)
	{

		$hapus =$this->db->query("DELETE FROM data_anak WHERE id_anak='$id'");
		return $hapus;
	}

	function edit_data($id,$no_akta,$nama_anak)
	{
		$edit= $this->db->query("UPDATE data_anak SET no_akta_anak='$no_akta', nama_anak='$nama_anak' WHERE id_anak='$id'");
		return $edit;
	}


}

/* End of file Data_anak_model.php */
/* Location: ./application/models/Data_anak_model.php */ ?>