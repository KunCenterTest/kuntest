<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        if ($this->session->userdata('auth')) {
            redirect(base_url());
        }
		$this->load->view('auth');
	}
}
