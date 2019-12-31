<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

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
		$this->load->model('M_auth');
	}

	public function index()
	{

		$this->load->view('Login.php');

	}

	public function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$where = array(
			'email' => $email,
			'password' => md5($password)
		);

		$cek = $this->M_auth->cek($where)->result()[0];
		if($cek){
			$where = array('id_akun'=>$cek->id_akun);
			if($cek->role ==  'mhs'){
				$data_session = array(
					'id_akun' => $cek->id_akun,
					'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				redirect('ControllerMahasiswa');
			}else if($cek->role == 'kmhs'){
				$data_session = array(
					'id_akun' => $cek->id_akun,
					'status' => 'loginkmhs'
				);
				$this->session->set_userdata($data_session);
				redirect('kmhs');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Email/password salah!</div>');
			redirect('AuthController');
		}

	}

	function logout(){
		$this->session->sess_destroy();
		redirect('AuthController');
	}





}
