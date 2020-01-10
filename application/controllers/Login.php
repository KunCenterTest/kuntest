<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login', 'm');
		define("RECAPTCHA_V3_SECRET_KEY", '6Le9E84UAAAAAPYXHMBHYpSYqPE2aY18Ur37UMpt');
    }

    public function index()
    {
        if ($this->session->userdata('auth')) {
            redirect(base_url());
        }
        $token = $this->input->post('token');
        $action = $this->input->post('action');

        $email = $this->input->post('email');
        $password = $this->input->post('pswd');

        // call curl to POST request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $arrResponse = json_decode($response, true);
        echo var_dump($arrResponse);

        // verify the response
        if ($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
            // valid submission
            // go ahead and do necessary stuff
            $where = array(
                'kunct_email' => $email,
                'kunct_password' => md5($password),
                'kunct_stat' => "ON"
            );
            $cek = $this->m->cek_login("user", $where);
            if (!empty($cek)) {

                $data_session = array(
                    'auth' => true,
                    'email' => $cek->kunct_email,
                    'nama' => $cek->nama,
                    'level' => $cek->kunct_userlvl,
                    'status' => "login"
                );

                $this->session->set_userdata($data_session);
                redirect('biodata');
            } else {
                $this->session->set_flashdata('res', 'Username atau Password salah!');
                redirect('auth');
            }
        } else {
			// spam submission
			// show error message
			$this->session->set_flashdata('res', 'Anda terdeteksi sebagai robot!');
			redirect('auth');
		}
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('res', 'Berhasil logout.');
        redirect('auth');
    }
}
