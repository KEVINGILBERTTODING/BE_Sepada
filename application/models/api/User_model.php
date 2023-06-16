<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function validateUsername($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get()->row_array();
	}

	function insert($data)
	{
		$insert = $this->db->insert('user', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}
}
