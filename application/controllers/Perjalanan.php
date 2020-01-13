<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perjalanan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_perjalanan', 'm');
		$this->load->model('m_biodata', 'mb');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$email = $this->session->userdata('email');
		$where = array('kunct_email' => $email, 'kunct_stat' => 'ON', 'payment_stat' => 'YES');
		$data['lokasi'] = $this->m->getlokasi();
		$data['perjalanan'] = $this->m->getperjalanan($where, 'kunct_idperjalanan', 30);
		$this->load->view('list-perjalanan', $data);
	}

	function add_perjalanan()
	{
		$biodata = $this->mb->getBiodata($this->session->userdata('email'));
		foreach ($biodata as $b) {
			if (
				$b->notelp == "" || $b->kenegaraan == "" || $b->alamat == "" || $b->pekerjaan == "" ||
				$b->gol_darah == "" || $b->profile_pic == ""
			) {
				$this->session->set_flashdata('res', 'Mohon Lengkapi Biodata anda!');
				redirect(base_url("biodata"));
			}
		}
		$email = $this->session->userdata('email');
		$where = array('kunct_email' => $email, 'kunct_stat' => 'ON', 'payment_stat' => 'NO');
		$getpaystat = $this->m->getpaystat($email);
		if ($getpaystat > 0) {
			$data['keneg'] = $this->mb->getkenegaraan($email);
			$data['perjalanan'] = $this->m->getperjalanan($where, '', 0);
			$this->load->view('payment', $data);
		} else {
			$html = "";
			$no = 0;
			$tab = 1;
			$uc = 0;
			$parent = $this->m->getkuis(0);
			if (count($parent) > 0) {
				foreach ($parent as $kp => $p) {
					$uc++;
					$no++;
					if ($p->kuis_tipe == 'CHECK') {
						$html .= '<div class="col-10 mt-4">' . "\n";
						$html .= '<label>' . $no . '. ' . $p->title . '</label>' . "\n";
						$html .= '<input class="uncheck' . $uc . $kp . '" type="hidden" name="kuis[' . $p->kunct_idkuis . ']" value="TIDAK">' . "\n";
						$html .= '</div>' . "\n";
						$html .= '<div class="col mt-4">' . "\n";
						$html .= '<input type="checkbox" class="cus-toggle parcat" data-child="child' . $kp . '" data-uncheck="uncheck' . $uc . $kp . '" name="kuis[' . $p->kunct_idkuis . ']" value="YA" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>' . "\n";
						$html .= '</div>' . "\n";
					} elseif ($p->kuis_tipe == 'LAIN') {
						$html .= '<div class="col-10 mt-4">' . "\n";
						$html .= '<Label>' . $no . '. ' . $p->title . '</Label>' . "\n";
						$html .= '<input class="uncheck' . $uc . $kp . '" type="hidden" name="kuis[' . $p->kunct_idkuis . ']" value="TIDAK">' . "\n";
						$html .= '<textarea class="form-control child' . $kp . '" name="kuis[' . $p->kunct_idkuis . ']" cols="30" rows="3" disabled></textarea>' . "\n";
						$html .= '</div>' . "\n";
						$html .= '<div class="col-2 mt-4">' . "\n";
						$html .= '<input type="checkbox" class="cus-toggle parcat" data-child="child' . $kp . '" data-uncheck="uncheck' . $uc . $kp . '" value="YA" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>' . "\n";
						$html .= '</div>' . "\n";
					}
					$html .= $this->_getChild($p->kunct_idkuis, $kp, $tab, 0, $uc);
				}
			}
			$data['lokasi'] = $this->m->getlokasi();
			$data['kuis'] = $html;
			$this->load->view('tambah-perjalanan', $data);
		}
	}

	function _getChild($id, $kp, $tab, $idchild, $uc)
	{
		$html = "";
		$child = $this->m->getkuis($id);
		if (count($child) > 0) {
			$idchild++;
			$tab++;
			foreach ($child as $kc => $c) {
				$uc++;
				if ($c->kuis_tipe == 'CHECK') {
					$col = 11 - $tab;
					$html .= '<div class="col-' . $col . ' offset-' . ($tab - 1) . '">' . "\n";
					$html .= '<label>> ' . $c->title . '</label>' . "\n";
					$html .= '<input class="uncheck' . $uc . $kc . '" type="hidden" name="kuis[' . $c->kunct_idkuis . ']" value="TIDAK">' . "\n";
					$html .= '</div>' . "\n";
					$html .= '<div class="col-2">' . "\n";
					$html .= '<input type="checkbox" class="cus-toggle subchild' . $idchild . $kp . ' child' . $kp . ' subparcat" name="kuis[' . $c->kunct_idkuis . ']" value="YA" data-child="subchild' . ($idchild + 1) . $kc . '" data-uncheck="uncheck' . $uc . $kc . '" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>' . "\n";
					$html .= '</div>' . "\n";
				} elseif ($c->kuis_tipe == 'SELECT') {
					$col = 10 - $tab;
					$explode = explode("~", $c->title);
					$title = $explode[0];
					for ($i = 1; $i < count($explode) - 1; $i++) {
						$option = array(
							'val' => $explode[$i]
						);
					}
					$html .= '<div class="col-' . $col . ' offset-' . ($tab - 1) . '">' . "\n";
					$html .= '<label>> ' . $title . '</label>' . "\n";
					$html .= '</div>' . "\n";
					$html .= '<div style="padding-right: 45px;" class="col-3">' . "\n";
					$html .= '<input class="uncheck' . $uc . $kc . '" type="hidden" name="kuis[' . $c->kunct_idkuis . ']" value="TIDAK">' . "\n";
					$html .= '<select class="custom-select custom-select-sm subchild' . $idchild . $kp . '" name="kuis[' . $c->kunct_idkuis . ']" disabled required>' . "\n";
					$html .= '<option value="">-- ' . $title . ' --</option>' . "\n";
					foreach ($explode as $ko => $o) {
						if ($ko > 0) {
							$html .= '<option value="' . $o . '">' . $o . '</option>' . "\n";
						}
					}
					$html .= '</select>' . "\n";
					$html .= '</div>' . "\n";
				} elseif ($c->kuis_tipe == 'LAIN') {
					$col = 11 - $tab;
					$html .= '<div class="col-' . $col . ' offset-' . ($tab - 1) . '">' . "\n";
					$html .= '<label>> ' . $c->title . '</label>' . "\n";
					$html .= '<input class="uncheck' . $uc . $kc . '" type="hidden" name="kuis[' . $c->kunct_idkuis . ']" value="TIDAK">' . "\n";
					$html .= '<textarea class="form-control subchild' . $kc . '" name="kuis[' . $c->kunct_idkuis . ']" cols="30" rows="3" disabled></textarea>' . "\n";
					$html .= '</div>' . "\n";
					$html .= '<div class="col-2">' . "\n";
					$html .= '<input type="checkbox" class="cus-toggle subchild' . $idchild . $kp . ' child' . $kp . ' subparcat" data-child="subchild' . $kc . '" data-uncheck="uncheck' . $uc . $kc . '" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>' . "\n";
					$html .= '</div>' . "\n";
				}
				$html .= $this->_getChild($c->kunct_idkuis, $kc, $tab, $idchild, $uc);
			}
		}
		return $html;
	}

	function add_action()
	{
		$lastid = $this->m->getlastid();
		// echo $lastid;
		$tambah = $lastid + 1;
		if ($tambah < 10) {
			$idpay = "KC" . "00000" . $tambah;
		} elseif ($tambah >= 10 && $tambah < 100) {
			$idpay = "KC" . "0000" . $tambah;
		} elseif ($tambah >= 100 && $tambah < 1000) {
			$idpay = "KC" . "000" . $tambah;
		} elseif ($tambah >= 1000 && $tambah < 10000) {
			$idpay = "KC" . "00" . $tambah;
		} elseif ($tambah >= 10000 && $tambah < 100000) {
			$idpay = "KC" . "0" . $tambah;
		} elseif ($tambah >= 100000) {
			$idpay = "KC" . "" . $tambah;
		}
		$email = $this->session->userdata('email');
		$lokasi = $this->input->post('lokasi');
		$tgl = date('Y-m-d', strtotime($this->input->post('tgl')));
		$form = json_encode($this->input->post('kuis'));
		echo $email . "\n";
		echo $lokasi . "\n";
		echo $tgl . "\n";
		echo $form . "\n";
		if (!empty($email) && !empty($lokasi) && !empty($tgl) && !empty($form)) {
			$data = array(
				'kunct_email' => $email,
				'kunct_idlokasi' => $lokasi,
				'tgl' => $tgl,
				'value' => $form,
				'idpay' => $idpay,
				'payment_stat' => 'NO',
				'kunct_stat' => 'ON'
			);
			$add = $this->m->add_perjalanan("perjalanan", $data);
			if ($add == true) {
				redirect('perjalanan/add_perjalanan');
			} else {
				$this->session->set_flashdata('res', 'Gagal Tambah Perjalanan!');
				redirect('perjalanan/add_perjalanan');
			}
		} else {
			$this->session->set_flashdata('res', 'Mohon isi form dengan benar!');
			redirect('perjalanan/add_perjalanan');
		}
	}

	function bayar_action()
	{
		$email = $this->session->userdata('email');
		$idperjln = $this->input->post('id');
		$data = array(
			'payment_stat' => "YES"
		);
		$where = array(
			'kunct_email' => $email,
			'kunct_stat' => 'ON',
			'kunct_idperjalanan' => $idperjln
		);
		$bayar = $this->m->bayar($where, $data);
		if ($bayar == true) {
			$this->session->set_flashdata('res', 'Berhasil menambah perjalanan');
			redirect('perjalanan');
		} else {
			$this->session->set_flashdata('res', 'Pembayaran Gagal!');
			redirect('perjalanan/add_perjalanan');
		}
	}
}
