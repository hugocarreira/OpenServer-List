<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {

	// public function __construc() {
	// 	$this->load->database();
	// }

	public function index() {
		$this->load->view('list/lista');
	}
}