<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login($username,$password){
		$query = $this->db->query("SELECT * FROM karyawan WHERE nip='$username' AND password='$password'");
		return $query;

	}

	

}
