<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perjalanan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_perjalanan', 'm');
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
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
				'pp' => $d->profile_pic,
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

	function add_perjalanan()
	{
		$html = "";
		$no = 0;
		$tab = 1;
		$uc = 0;
		$parent = $this->m->getkuis(0);
		if(count($parent) > 0){
		foreach($parent as $kp => $p){
			$uc++;
			$no++;
			if($p->kuis_tipe == 'CHECK'){
				$html .= '<div class="col-10 mt-4">'."\n";
				$html .= '<label>'.$no.'. '.$p->title.'</label>'."\n";
				$html .= '<input class="uncheck'.$uc.$kp.'" type="hidden" name="kuis['.$p->kunct_idkuis.']" value="TIDAK">'."\n";
				$html .= '</div>'."\n";
				$html .= '<div class="col mt-4">'."\n";
				$html .= '<input type="checkbox" class="cus-toggle parcat" data-child="child'.$kp.'" data-uncheck="uncheck'.$uc.$kp.'" name="kuis['.$p->kunct_idkuis.']" value="YA" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>'."\n";
				$html .= '</div>'."\n";
			}
			elseif($p->kuis_tipe == 'LAIN'){
				$html .= '<div class="col-10 mt-4">'."\n";
				$html .= '<Label>'.$no.'. '.$p->title.'</Label>'."\n";
				$html .= '<input class="uncheck'.$uc.$kp.'" type="hidden" name="kuis['.$p->kunct_idkuis.']" value="TIDAK">'."\n";
				$html .= '<textarea class="form-control child'.$kp.'" cols="30" rows="3" disabled></textarea>'."\n";
				$html .= '</div>'."\n";
				$html .= '<div class="col-2 mt-4">'."\n";
				$html .= '<input type="checkbox" class="cus-toggle parcat" data-child="child'.$kp.'" data-uncheck="uncheck'.$uc.$kp.'" name="kuis['.$p->kunct_idkuis.']" value="YA" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>'."\n";
				$html .= '</div>'."\n";
			}
			$html .= $this->_getChild($p->kunct_idkuis, $kp, $tab, 0, $uc);
		}
	}
		$data['lokasi'] = $this->m->getlokasi();
		$data['kuis'] = $html;
		$this->load->view('tambah-perjalanan', $data);
	}

	function _getChild($id, $kp, $tab, $idchild, $uc){
		$html = "";
		$child = $this->m->getkuis($id);
		if(count($child) > 0){
			$idchild++;
			$tab++;
			foreach ($child as $kc => $c) {
				$uc++;
				if($c->kuis_tipe == 'CHECK'){
					$col = 11 - $tab;
					$html .= '<div class="col-'.$col.' offset-'.($tab - 1).'">'."\n";
					$html .= '<label>> '.$c->title.'</label>'."\n";
					$html .= '<input class="uncheck'.$uc.$kc.'" type="hidden" name="kuis['.$c->kunct_idkuis.']" value="TIDAK">'."\n";
					$html .= '</div>'."\n";
					$html .= '<div class="col-2">'."\n";
					$html .= '<input type="checkbox" class="cus-toggle subchild'.$idchild.$kp.' child'.$kp.' subparcat" name="kuis['.$c->kunct_idkuis.']" data-child="subchild'.($idchild + 1).$kc.'" data-uncheck="uncheck'.$uc.$kc.'" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>'."\n";
					$html .= '</div>'."\n";
				}
				elseif($c->kuis_tipe == 'SELECT'){
					$col = 10 - $tab;
					$explode = explode("~", $c->title);
					$title = $explode[0];
					for ($i=1; $i<count($explode)-1; $i++) {
						$option = array(
							'val' => $explode[$i]
						);
					}
					$html .= '<div class="col-'.$col.' offset-'.($tab - 1).'">'."\n";
					$html .= '<label>> '.$title.'</label>'."\n";
					$html .= '</div>'."\n";
					$html .= '<div style="padding-right: 45px;" class="col-3">'."\n";
					$html .= '<input class="uncheck'.$uc.$kc.'" type="hidden" name="kuis['.$c->kunct_idkuis.']" value="TIDAK">'."\n";
					$html .= '<select class="custom-select custom-select-sm subchild'.$idchild.$kp.'" name="kuis['.$c->kunct_idkuis.']" disabled required>'."\n";
					$html .= '<option value="">-- '.$title.' --</option>'."\n";
					foreach ($option as $o) {
						$html .= '<option value="'.$o.'">'.$o.'</option>'."\n";
					}
					$html .= '</select>'."\n";
					$html .= '</div>'."\n";
				}
				elseif($c->kuis_tipe == 'LAIN'){
					$col = 11 - $tab;
					$html .= '<div class="col-'.$col.' offset-'.($tab - 1).'">'."\n";
					$html .= '<label>> '.$c->title.'</label>'."\n";
					$html .= '<input class="uncheck'.$uc.$kc.'" type="hidden" name="kuis['.$c->kunct_idkuis.']" value="TIDAK">'."\n";
					$html .= '<textarea class="form-control subchild'.$kc.'" name="kuis['.$c->kunct_idkuis.']" cols="30" rows="3" disabled></textarea>'."\n";
					$html .= '</div>'."\n";
					$html .= '<div class="col-2">'."\n";
					$html .= '<input type="checkbox" class="cus-toggle subchild'.$idchild.$kp.' child'.$kp.' subparcat" name="kuis['.$c->kunct_idkuis.']" data-child="subchild'.$kc.'" data-uncheck="uncheck'.$uc.$kc.'" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>'."\n";
					$html .= '</div>'."\n";
				}
				$html .= $this->_getChild($c->kunct_idkuis, $kc, $tab, $idchild, $uc);
			}
		}
		return $html;
	}

	function add_action(){
		echo json_encode($this->input->post('kuis'));
	}
}
