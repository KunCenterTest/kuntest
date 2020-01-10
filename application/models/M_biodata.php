<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_biodata extends CI_Model
{
	function getBiodata($email)
	{
		// $this->db->query("SELECT * FROM user WHERE kunct_email='$email' AND kunct_stat='ON'");
		$where = array('kunct_email' => $email, 'kunct_stat' => 'ON');
		$this->db->where($where);
		return $this->db->get('user')->result();
	}

	function update_user($table, $data, $email)
	{
		$this->db->where('kunct_email', $email);
		$this->db->update($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function ubah_password($table, $data, $email)
	{
		$this->db->where('kunct_email', $email);
		$this->db->update($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}
