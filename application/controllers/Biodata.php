<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_biodata', 'm');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$dtuser = $this->m->getBiodata($this->session->userdata('email'));
		foreach ($dtuser as $d) {
			$biodata = array(
				'nama' => $d->nama,
				'notelp' => $d->notelp,
				'kenegaraan' => $d->kenegaraan,
				'alamat' => $d->alamat,
				'tempat_lahir' => $d->tempat_lahir,
				'tgl_lahir' => date('d-m-Y', strtotime($d->tgl_lahir)),
				'pekerjaan' => $d->pekerjaan,
				'gol_darah' => $d->gol_darah,
				'email' => $d->kunct_email,
				'emailstat' => $d->kunct_emailstat,
				'password' => $d->kunct_password
			);
		}
		$data['biodata'] = $biodata;
		$this->load->view('biodata', $data);
	}

	function update()
	{

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$gol_darah = $this->input->post('gol_darah');
		$notelp = $this->input->post('notelp');
		$kenegaraan = $this->input->post('kenegaraan');
		$alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$pekerjaan = $this->input->post('pekerjaan');

		$data = array(
			'nama' => $nama,
			'notelp' => $notelp,
			'kenegaraan' => $kenegaraan,
			'gol_darah' => $gol_darah,
			'alamat' => $alamat,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' => date('Y-m-d', strtotime($tgl_lahir)),
			'pekerjaan' => $pekerjaan
		);

		$adduser = $this->m->update_user("user", $data, $email);
		if ($adduser = true) {
			$this->session->set_flashdata('res', 'Berhasil update Biodata.');
			redirect('biodata');
		} else {
			$this->session->set_flashdata('res', 'Gagal update data!');
			redirect('biodata');
		}
	}

	function ubah_pwd()
	{

		$pw = $this->input->post('pw');
		$kpw = $this->input->post('kpw');
		$email = $this->session->userdata('email');

		if ($pw === $kpw) {
			$data = array(
				'kunct_password' => md5($pw)
			);

			$adduser = $this->m->ubah_password("user", $data, $email);
			if ($adduser = true) {
				$this->session->set_flashdata('res', 'Berhasil mengubah password.');
				redirect('biodata');
			} else {
				$this->session->set_flashdata('res', 'Gagal ubah password!');
				redirect('biodata');
			}
		} else {
			$this->session->set_flashdata('res', 'Password tidak sama!');
			redirect('biodata');
		}
	}
}
