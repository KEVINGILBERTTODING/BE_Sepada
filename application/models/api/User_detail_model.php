<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_detail_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function getDetailUser($id)
	{

		$this->db->select('*');
		$this->db->from('user_detail');
		$this->db->join('user', 'user. id_user = user_detail.id_user_detail', 'left');
		$this->db->where('user_detail.id_user_detail', $id);
		return $this->db->get()->row_array();
	}

	function insert($data)
	{
		$insert = $this->db->insert('user_detail', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}
}

/* End of file User_detail_model.php */
/* Location: ./application/models/User_detail_model.php */
