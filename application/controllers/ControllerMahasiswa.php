<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerMahasiswa extends CI_Controller {

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
		$this->load->model('M_proposal','prp');
		if($this->session->userdata('status')!='login'){
			redirect('AuthController');
		}
	}

	public function index()
	{
    $data['judul'] = 'Profile';
		$where = array(
			'id_akun' => $this->session->userdata('id_akun')
		);
		$data['mhs'] = $this->mhs->get_dataByAkun($this->session->userdata('id_akun'))->result()[0];
		$data['prestasi'] = $this->prs->get_prestasiByMhs($data['mhs']->id_mhs)->result();
		$data['proposal'] = $this->prp->get_proposalByMhs($data['mhs']->id_mhs)->result();
    $this->load->view('Mahasiswa/template/header',$data);
		$this->load->view('Mahasiswa/VprofileMhs', array('error' => ' ' ));
    $this->load->view('Mahasiswa/template/footer');
	}

  public function Proposal(){
    $data['judul'] = 'Proposal';
    $this->load->view('Mahasiswa/template/header',$data);
		$this->load->view('Mahasiswa/V_pengajuanproposal');
    $this->load->view('Mahasiswa/template/footer');
  }

	public function upload_prestasi(){
		$config['upload_path']          = './assets/prestasi';
		$config['allowed_types']        = 'pdf|docx';
		$config['max_size']             = 1000000;
		$config['file_name']     				= md5(time().$this->session->userdata('id_akun'));

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file_prestasi')){
			$error = '<div class="alert alert-danger">Upload gagal, cek kembali file anda!</div>';
			$data['error'] = $error;
			$data['mhs'] = $this->mhs->get_dataByAkun($this->session->userdata('id_akun'))->result()[0];
			$data['prestasi'] = $this->prs->get_prestasiByMhs($data['mhs']->id_mhs)->result();
			$data['proposal'] = $this->prp->get_proposalByMhs($data['mhs']->id_mhs)->result();
			echo 'upload gagal! <br>';
			echo '<a class="nav-link " href="'.base_url('ControllerMahasiswa').'">Kembali</a>';
		}else{

			$data['mhs'] = $this->mhs->get_dataByAkun($this->session->userdata('id_akun'))->result()[0];

			$prestasi = array(
				'id_mhs' => $data['mhs']->id_mhs,
				'nama' => $this->input->post('nama'),
				'tahun' => $this->input->post('tahun'),
				'tingkat' => $this->input->post('tingkat'),
				'file' => $config['file_name']
			);

			$this->prs->upload_prestasi($prestasi);


			redirect('ControllerMahasiswa');
		}
	}
	public function upload_proposal(){
		$config['upload_path']          = './assets/proposal';
		$config['allowed_types']        = 'pdf';
		$config['file_ext_tolower'] 		= TRUE;
		$config['max_size']             = 1000000;
		$config['file_name']     				= md5(time().$this->session->userdata('id_akun'));


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file_proposal')){
			$error = '<div class="alert alert-danger">Upload gagal, cek kembali file anda!</div>';
			$data['error'] = $error;
			$data['mhs'] = $this->mhs->get_dataByAkun($this->session->userdata('id_akun'))->result()[0];
			$data['prestasi'] = $this->prs->get_prestasiByMhs($data['mhs']->id_mhs)->result();
			$data['proposal'] = $this->prp->get_proposalByMhs($data['mhs']->id_mhs)->result();
			echo 'upload gagal! <br>';
			echo '<a class="nav-link " href="'.base_url('ControllerMahasiswa/Proposal').'">Kembali</a>';
		}else{

			$data['mhs'] = $this->mhs->get_dataByAkun($this->session->userdata('id_akun'))->result()[0];

			$proposal = array(
				'id_mhs' => $data['mhs']->id_mhs,
				'nama' => $this->input->post('nama'),
				'tempat' => $this->input->post('tempat'),
				'tanggal' => $this->input->post('tanggal'),
				'waktu' => $this->input->post('waktu'),
				'deskripsi' => $this->input->post('deskripsi'),
				'status' => "belum ada tanggapan",
				'file' => $config['file_name']
			);

			$this->prp->upload_proposal($proposal);


			redirect('ControllerMahasiswa');
		}
	}
	public function HapusPrestasi($id){
		$this->prs->hapus($id);
		redirect('ControllerMahasiswa');
	}
	public function HapusProposal($id){
		$this->prp->hapus($id);
		redirect('ControllerMahasiswa');
	}

	public function JadwalKegiatan(){
		$data['kegiatan'] = $this->prp->get_Jadwal()->result();
		$data['judul'] = "Jadwal Kegiatan";

		$this->load->view('Mahasiswa/template/header',$data);
		$this->load->view('VJadwalKegiatan',$data);
    $this->load->view('Mahasiswa/template/footer');
	}
}
