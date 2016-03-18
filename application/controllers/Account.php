<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_controller {

	public function __construct() {
		parent::__construct();
        $this->load->model('Account_model');
	}

	public function index() {
		$this->load->view('home');
	}

	public function create() {
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
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title_page'] = 'Login into System';

		$this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');

	    if ($this->form_validation->run() === FALSE) {
	    	$this->load->view('account/login', $data);
	    } else {
	    	if($this->Account_model->loginAccount() === TRUE) {
	    		// $this->load->library('session');
	    		// $session_data = array('email', $data['email']);
	    		// $this->session->userdata($session_data);
	    		$data['title_page'] = 'Account Administration - Home';
	    		$data['servers'] 	= $this->Account_model->getAllServers();
	    		$this->load->view('account/admin/home',$data);
	    	} else {
	    		$data['error'] = 'Wrong Login or Password';
	    		$this->load->view('account/login', $data);
	    	}
	    }
	}

	public function saveServer() {
		$this->load->helper('form');
		$this->load->libray('form_validation');

		$id = $this->input->post('id');

		if($id != '') {
			$this->editServer($id);
		} else {
			$this->createServer();
		}
	}

	public function createServer() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title_page'] = 'Register Server into System';
		$data['versions'] 	= $this->Account_model->getVersion();

		// $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('ip', 'IP', 'required');
		$this->form_validation->set_rules('port', 'Port', 'required');
		$this->form_validation->set_rules('version', 'Version', 'required');
		$this->form_validation->set_rules('site', 'Site');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('account/admin/formserver', $data);
		} else {
			if ($this->Account_model->setServer()) {
				$data['sucess'] = 'Server OK!';
				$this->load->view('account/admin/formserver', $data);
			} else {
				$data['error'] = 'Error on create server';
				$this->load->view('account/admin/formserver', $data);
			}
		}
	}

	public function editServer($id) {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title_page'] = 'Edit your Server';
		$data['versions']	= $this->Account_model->getVersion();
		$data['server'] 	= $this->Account_model->getServer($id);

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('ip', 'IP', 'required');
		$this->form_validation->set_rules('port', 'Port', 'required');
		$this->form_validation->set_rules('version', 'Version', 'required');
		$this->form_validation->set_rules('site', 'Site');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('account/admin/formserver/'.$id, $data);
		} else {
			if ($this->Account_model->saveServer()) {
				$data['sucess'] = 'Server OK!';
				$this->load->view('account/admin/formserver/'.$id, $data);
			} else {
				$data['error'] = 'Error on edit server';
				$this->load->view('account/admin/formserver/'.$id, $data);
			}
		}
	}
}