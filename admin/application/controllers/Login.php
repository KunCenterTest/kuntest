<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		if ($this->session->userdata('auth')) {
			redirect(base_url());
		}
		$this->load->view('login');
	}

	function aksi_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('pswd');
		$where = array(
			'kunct_email' => $email,
			'kunct_password' => md5($password),
			'kunct_stat' => "ON"
		);
		$cek = $this->m_login->cek_login("user", $where);
		if (!empty($cek)) {

			$data_session = array(
				'auth' => true,
				'email' => $cek->kunct_email,
				'nama' => $cek->nama,
				'level' => $cek->kunct_userlvl,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			redirect("dashboard");
		} else {
			$this->session->set_flashdata('res', 'Username atau Password salah!');
			redirect('login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
