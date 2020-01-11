<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_perjalanan extends CI_Model
{
	function getlokasi()
	{
		$where = array('kunct_stat' => 'ON');
		$this->db->where($where);
		return $this->db->get('lokasi')->result();
	}

	function getkuis($id)
	{
		// $this->db->query("SELECT * FROM user WHERE kunct_email='$email' AND kunct_stat='ON'");
		$where = array('kunct_idprtkuis' => $id, 'kunct_stat' => 'ON');
		$this->db->where($where);
		return $this->db->get('kuis')->result();
	}
}
