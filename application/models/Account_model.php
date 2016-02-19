<?php

class Account_model extends CI_Model {

	public function __construc() {
		parent::__construct();
		
	}

	public function setAccount() {
		$this->load->database();
	    $this->load->helper('url');

	    $data = array(
	        'name' 		=> $this->input->post('name'),
	        'lastname' 	=> $this->input->post('lastname'),
	        'email'		=> $this->input->post('email'),
	        'password'	=> sha1($this->input->post('password'))
	    );

	    return $this->db->insert('accounts', $data);
	}

	public function loginAccount() {
		$this->load->database();

		$data = array(
			'email'		=> $this->input->post('email'),
			'password'	=> sha1($this->input->post('password'))
		);

		return $this->db->get_where('accounts', $data);
	}
}