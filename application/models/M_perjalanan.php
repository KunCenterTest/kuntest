<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_perjalanan extends CI_Model
{
	function getperjalanan($where, $ordby, $limit)
	{
		$this->db->where($where);
		if ($limit > 0) {
			$this->db->order_by($ordby);
			$this->db->limit($limit);
		}
		return $this->db->get('perjalanan')->result();
	}

	function getlokasi()
	{
		$where = array('kunct_stat' => 'ON');
		$this->db->where($where);
		return $this->db->get('lokasi')->result();
	}

	function getlastid()
	{
		$this->db->select_max('kunct_idperjalanan');
		$where = array('kunct_stat' => 'ON');
		$this->db->where($where);
		$id = $this->db->get('perjalanan')->row();
		return $id->kunct_idperjalanan;
	}

	function getpaystat($email)
	{
		$where = array('kunct_email' => $email, 'kunct_stat' => 'ON', 'payment_stat' => 'NO');
		$this->db->where($where);
		$pay = $this->db->get('perjalanan')->result();
		return count($pay);
	}

	function getkuis($id)
	{
		// $this->db->query("SELECT * FROM user WHERE kunct_email='$email' AND kunct_stat='ON'");
		$where = array('kunct_idprtkuis' => $id, 'kunct_stat' => 'ON');
		$this->db->where($where);
		return $this->db->get('kuis')->result();
	}

	function add_perjalanan($table, $data)
	{
		$this->db->insert($table, $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function bayar($where, $data)
	{
		$this->db->where($where);
		$this->db->update("perjalanan", $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}
