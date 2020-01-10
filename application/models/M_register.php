<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_register extends CI_Model
{
	function add_user($table, $data)
	{
		$this->db->insert($table,$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function cekemail($email){
		$query = $this->db->query("SELECT * FROM user WHERE kunct_email='$email'")->num_rows();
		return $query;
	}
}
