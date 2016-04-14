<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Account_model');
	}

	public function index() {
		$data['title_page'] = 'Account Administration - Home';
	    $data['servers'] 	= $this->Account_model->getAllServers();

	    $this->load->view('layout/head');
	    $this->load->view('admin/home', $data);
	    $this->load->view('layout/footer');
	}

	public function createServer() {
		$this->validaFormServer();
		$data['versions'] 	= $this->Account_model->getVersion();
		$data['title_page'] = 'Register Server into System';

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/createserver', $data);
		} else {
			if ($this->Account_model->setServer()) {
				$data['sucess'] = 'Server OK!';
				$this->load->view('layout/head');
				$this->load->view('admin/createserver', $data);
	    		$this->load->view('layout/footer');
			} else {
				$data['error'] = 'Error on create server';
				$this->load->view('layout/head');
				$this->load->view('admin/createserver', $data);
	    		$this->load->view('layout/footer');
			}
		}
	}

	public function editserver() {
		$this->validaFormServer();
		$data['server'] 	= $this->Account_model->getServer($id);
		$data['versions'] 	= $this->Account_model->getVersion();
		$data['title_page'] = 'Edit Server';
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/editserver', $data);
		} else {
			if ($this->Account_model->editServer($id)) {
				$data['sucess'] = 'Server OK!';
				$this->load->view('layout/head');
				$this->load->view('admin/createserver', $data);
	    		$this->load->view('layout/footer');
			} else {
				$data['error'] = 'Error on create server';
				$this->load->view('layout/head');
				$this->load->view('admin/createserver', $data);
	    		$this->load->view('layout/footer');
			}
		}
	}

	private function validaFormServer() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['versions'] 	= $this->Account_model->getVersion();

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('ip', 'IP', 'required');
		$this->form_validation->set_rules('port', 'Port', 'required');
		$this->form_validation->set_rules('version', 'Version', 'required');
		$this->form_validation->set_rules('site', 'Site');
		$this->form_validation->set_rules('description', 'Description', 'required');

	}
}