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
		$parent = $this->m->getkuis(0);
		if(count($parent) > 0){
		foreach($parent as $kp => $p){
			$no++;
			if($p->kuis_tipe == 'CHECK'){
				$html .= '<div class="col-10 mt-4">'."\n";
				$html .= '<label>'.$no.'. '.$p->title.'</label>'."\n";
				$html .= '<input type="hidden" name="kuis[]" value="TIDAK">'."\n";
				$html .= '</div>'."\n";
				$html .= '<div class="col mt-4">'."\n";
				$html .= '<input type="checkbox" class="cus-toggle parcat" data-child="child'.$kp.'" name="kuis[]" value="YA" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>'."\n";
				$html .= '</div>'."\n";
			}
			elseif($p->kuis_tipe == 'LAIN'){
				$html .= '<div class="col-10 mt-4">'."\n";
				$html .= '<Label>'.$no.'. '.$p->title.'</Label>'."\n";
				$html .= '<input type="hidden" name="kuis[]" value="TIDAK">'."\n";
				$html .= '<textarea class="form-control child'.$kp.'" cols="30" rows="3" disabled></textarea>'."\n";
				$html .= '</div>'."\n";
				$html .= '<div class="col-2 mt-4">'."\n";
				$html .= '<input type="checkbox" class="cus-toggle parcat" data-child="child'.$kp.'" name="kuis[]" value="YA" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>'."\n";
				$html .= '</div>'."\n";
			}
			$html .= $this->_getChild($p->kunct_idkuis, $kp, $tab, 0);
		}
	}
		$data['lokasi'] = $this->m->getlokasi();
		$data['kuis'] = $html;
		$this->load->view('tambah-perjalanan', $data);
	}

	function _getChild($id, $kp, $tab, $idchild){
		$html = "";
		$child = $this->m->getkuis($id);
		if(count($child) > 0){
			$idchild++;
			$tab++;
			foreach ($child as $kc => $c) {
				if($c->kuis_tipe == 'CHECK'){
					$col = 11 - $tab;
					$html .= '<div class="col-'.$col.' offset-'.($tab - 1).'">'."\n";
					$html .= '<Label>> '.$c->title.' child ke '.$idchild.'</Label>'."\n";
					$html .= '</div>'."\n";
					$html .= '<div class="col-2">'."\n";
					$html .= '<input type="checkbox" class="cus-toggle subchild'.$idchild.$kp.' child'.$kp.' subparcat" data-child="subchild'.($idchild + 1).$kc.'" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>'."\n";
					$html .= '</div>'."\n";
				}
				elseif($c->kuis_tipe == 'TEXT'){
					$col = 11 - $tab;
					$html .= '<div class="col-'.$col.' offset-'.($tab - 1).'">'."\n";
					$html .= '<Label>> '.$c->title.' child ke '.$idchild.'</Label>'."\n";
					$html .= '<textarea class="form-control subchild'.$kp.'" cols="30" rows="3" disabled></textarea>'."\n";
					$html .= '</div>'."\n";
					$html .= '<div class="col-2">'."\n";
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
					$html .= '<Label>> '.$title.' child ke '.$idchild.'</Label>'."\n";
					$html .= '</div>'."\n";
					$html .= '<div style="padding-right: 45px;" class="col-3">'."\n";
					$html .= '<select class="custom-select custom-select-sm subchild'.$idchild.$kp.'" name="" disabled>'."\n";
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
					$html .= '<Label>> '.$c->title.' child ke '.$idchild.'</Label>'."\n";
					$html .= '<textarea class="form-control subchild'.$kc.'" cols="30" rows="3" disabled></textarea>'."\n";
					$html .= '</div>'."\n";
					$html .= '<div class="col-2">'."\n";
					$html .= '<input type="checkbox" class="cus-toggle subchild'.$idchild.$kp.' child'.$kp.' subparcat" data-child="subchild'.$kc.'" data-toggle="toggle" data-size="sm" data-on="YA" data-off="TIDAK" disabled>'."\n";
					$html .= '</div>'."\n";
				}
				$html .= $this->_getChild($c->kunct_idkuis, $kc, $tab, $idchild);
			}
		}
		return $html;
	}
}
