<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Account_model');
	}

	public function index() {
		$this->load->view('layout/head');
		$this->load->view('account/home');
		$this->load->view('layout/footer');
	}

	public function create() {
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    $data['title_page'] = 'Create a New Account';

	    $this->form_validation->set_rules('name', 'Name');
	    $this->form_validation->set_rules('lastname', 'Lastname');
	    $this->form_validation->set_rules('email', 'Email');
	    $this->form_validation->set_rules('password', 'Password');

	    if ($this->form_validation->run() === FALSE) {
	    	$this->load->view('layout/head');
	        $this->load->view('account/create', $data);
	        $this->load->view('layout/footer');
	    } else {
	    	if($this->Account_model->setAccount() === TRUE) {
	        	echo 'Criado com sucesso';
	    	} else {
	    		echo 'Erro ao criar conta';
	    	}
	    }
	}

	public function login() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title_page'] = 'Login into System';

		$this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');

	    if ($this->form_validation->run() === FALSE) {
	    	$this->load->view('layout/head');
	    	$this->load->view('account/login', $data);
	    	$this->load->view('layout/footer');
	    } else {
	    	if($this->Account_model->loginAccount() === TRUE) {
	    		// $this->load->library('session');
	    		// $session_data = array('email', $data['email']);
	    		// $this->session->userdata($session_data);
	    		redirect('admin/home');
	    	} else {
	    		$data['error'] = 'Wrong Login or Password';
	    		$this->load->view('layout/head');
	    		$this->load->view('account/login', $data);
	    		$this->load->view('layout/footer');
	    	}
	    }
	}
}