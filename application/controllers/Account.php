<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_controller {

	public function index() {
		$this->load->view('home');
	}

	public function create() {
		$this->load->model('Account_model');
	    $this->load->helper('form');
	    $this->load->library('form_validation');

	    $data['title'] = 'Create a New Account';

	    $this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('lastname', 'Lastname', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('account/create', $data);
	    } else {
	        $this->Account_model->setAccount();
	        echo 'Criado com sucesso';
	    }
	}

	public function login() {
		$this->load->model('Account_model');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title_page'] = 'Login into System';

		$this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');

	    if ($this->form_validation->run() === FALSE) {
	    	$this->load->view('account/login', $data);
	    } else {
	    	if($this->Account_model->loginAccount() == TRUE) {
	    		// $this->load->library('session');
	    		// $session_data = array('email', $data['email']);
	    		// $this->session->userdata($session_data);
	    		$data['page_title'] = 'Account Administration - Home';
	    		$this->load->view('account/admin/home');
	    	}
	    }
	}
}