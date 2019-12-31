<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerKemahasiswaan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 function __construct(){
 		parent::__construct();
 		$this->load->model('M_mahasiswa','mhs');
 		$this->load->model('M_prestasi','prs');
 		$this->load->model('M_kemahasiswaan','kmhs');
 		$this->load->model('M_proposal','prp');
 		if($this->session->userdata('status')!='loginkmhs'){
 			redirect('AuthController');
 		}
 	}
	public function index()
	{
    $data['judul'] = 'Profile';
		$data['kmhs'] = $this->kmhs->get_dataByAkun($this->session->userdata('id_akun'))->result()[0];
    $this->load->view('Kemahasiswaan/template/header',$data);
		$this->load->view('Kemahasiswaan/VprofileKmhs',$data);
    $this->load->view('Kemahasiswaan/template/footer');
	}
  public function Proposal(){
    $data['judul'] = 'Proposal';
		$data['proposal'] = $this->prp->get_allProposal()->result();
    $this->load->view('Kemahasiswaan/template/header',$data);
		$this->load->view('Kemahasiswaan/Vproposalmasuk',$data);
    $this->load->view('Kemahasiswaan/template/footer');
  }

	public function TanggapiProposal($id){
		$data['proposal'] = $this->prp->get_proposalById($id)->result()[0];
		$data['judul'] = "Tanggapi Proposal";
		$this->load->view('Kemahasiswaan/template/header',$data);
		$this->load->view('Kemahasiswaan/Vtanggapi',$data);
    $this->load->view('Kemahasiswaan/template/footer');
	}

	public function AksiTanggapi(){
		$proposal = array(
			'status' => $this->input->post('status'),
			'komentar' => $this->input->post('komentar')
		);
		$this->prp->update_proposal($proposal,$this->input->post('id_proposal'));
		redirect('ControllerKemahasiswaan/Proposal');
	}

	public function CariMahasiswa($key = ''){
		if($key!=''){
			$data['mahasiswa'] = $this->mhs->search_mahasiswa($key)->result();
		}else{
			$data['mahasiswa'] = NULL;
		}
		$data['judul'] = "Cari Mahasiswa";
		$this->load->view('Kemahasiswaan/template/header',$data);
		$this->load->view('Kemahasiswaan/Vcarimahasiswa',$data);
		$this->load->view('Kemahasiswaan/template/footer');

	}

	public function AksiCariMahasiswa(){
		redirect('ControllerKemahasiswaan/CariMahasiswa/'.$this->input->post('key'));

	}

	public function LihatProfil($id){
		$data['mhs'] = $this->mhs->get_MhsById($id)->result()[0];
		$data['prestasi'] = $this->prs->get_prestasiByMhs($data['mhs']->id_mhs)->result();
		$data['judul'] ='Profil Mahasiswa';

		$this->load->view('Kemahasiswaan/template/header',$data);
		$this->load->view('Kemahasiswaan/VprofileMahasiswa',$data);
		$this->load->view('Kemahasiswaan/template/footer');
	}

	public function JadwalKegiatan(){
		$data['kegiatan'] = $this->prp->get_Jadwal()->result();
		$data['judul'] = "Jadwal Kegiatan";

		$this->load->view('Kemahasiswaan/template/header',$data);
		$this->load->view('VJadwalKegiatan',$data);
		$this->load->view('Kemahasiswaan/template/footer');
	}
}
