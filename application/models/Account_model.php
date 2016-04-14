<?php

class Account_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getAccount($email) {
		$data = array('email' => $email);
		$query = $this->db->get_where('accounts', $data);

		return $query->num_rows();
	}

	public function setAccount() {
	    $data = array(
	        'name' 		=> $this->input->post('name'),
	        'lastname' 	=> $this->input->post('lastname'),
	        'email'		=> $this->input->post('email'),
	        'password'	=> sha1($this->input->post('password'))
	    );

	    if($this->getAccount($data['email']) >= 1) {
	    	return FALSE;
	    } else {
	    	$this->db->insert('accounts', $data);
	    	return TRUE;
		}
	}

	public function loginAccount() {
		$data = array(
			'email'		=> $this->input->post('email'),
			'password'	=> sha1($this->input->post('password'))
		);

		$query = $this->db->get_where('accounts', $data);

		if($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function logoutAccount() {
		// logout function
	}

	public function setServer() {
		$data = array(
			// 'account_id'	=> $this->input->post('account_id'),
			'name'			=> $this->input->post('name'),
			'title'			=> $this->input->post('title'),
			'ip'			=> $this->input->post('ip'),
			'port'			=> $this->input->post('port'),
			'version'		=> $this->input->post('version'),
			'site'			=> $this->input->post('site'),
			'description'	=> $this->input->post('description')
		);

		return $this->db->insert('servers', $data);
	}

	public function editServer($id) {
		$id = $this->input->post('id');
		$data = array(
			// 'account_id'	=> $this->input->post('account_id'),
			'name'			=> $this->input->post('name'),
			'title'			=> $this->input->post('title'),
			'ip'			=> $this->input->post('ip'),
			'port'			=> $this->input->post('port'),
			'version'		=> $this->input->post('version'),
			'site'			=> $this->input->post('site'),
			'description'	=> $this->input->post('description')
		);

		return $this->db->where('id', $id)->update('servers', $data);
		
	}

	public function getVersion() {
		return $this->db->get('versions')->result();
	}

	public function getAllServers() {
		return $this->db->get('servers');
	}

	public function getServer($id) {
		return $this->db->where('id', $id)->get('servers');
	}

}