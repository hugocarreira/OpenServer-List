<?php

class Blog_model extends CI_Model {

	private $id;
	public $title;
	public $author;
	public $body;

	public function __construct() {
		$this->load->database();
	}

	public function get_news() {

		$query = $this->db->get('news');
         return $query->result_array();

	}

	public function read_news($id) {
		$query = $this->db->where('id',$this->id)->get('news');
	return $query->result_array();
	}
}
