<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_register', 'reg');
		define("RECAPTCHA_V3_SECRET_KEY", '6LfRNswUAAAAAHiZCkAeGgQCs_DVnY0836ZPLtbw');
	}

	public function index()
	{
		$this->load->view('register');
	}

	function add_user()
	{

		$token = $this->input->post('token');
		$action = $this->input->post('action');

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$pw = $this->input->post('pw');
		$kpw = $this->input->post('kpw');

		// call curl to POST request
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		$arrResponse = json_decode($response, true);

		// verify the response
		if ($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
			// valid submission
			// go ahead and do necessary stuff
			$cekemail = $this->reg->cekemail($email);

			if ($cekemail == 0) {
				if ($kpw === $pw) {
					$data = array(
						'nama' => $nama,
						'kunct_email' => $email,
						'kunct_emailstat' => "OFF",
						'kunct_password' => md5($pw),
						'kunct_userlvl' => "2",
						'kunct_created' => date('Y-m-d'),
						'kunct_stat' => 'ON'
					);

					$adduser = $this->reg->add_user("user", $data);
					if ($adduser = true) {
						$this->session->set_flashdata('res', 'Berhasil melakukan pendaftaran, Silahkan melakukan konfirmasi email anda.');
						redirect('register');
					} else {
						$this->session->set_flashdata('res', 'Gagal input data!');
						redirect('register');
					}
				} else {
					$this->session->set_flashdata('res', 'Password tidak sama!');
					redirect('register');
				}
			} else {
				$this->session->set_flashdata('res', 'Email sudah ada, mohon buat dengan email baru!');
				redirect('register');
			}
		} else {
			// spam submission
			// show error message
			$this->session->set_flashdata('res', 'Anda terdeteksi sebagai robot! response : <br/>'.$arrResponse['success']);
			// redirect('register');
		}
	}
}
