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

	function update($id, $data)
	{

		$this->db->where('id_user', $id);
		$update = $this->db->update('user', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	function getAllUserByRole($role)
	{

		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_detail', 'user_detail.id_user_detail = user.id_user', 'left');
		$this->db->where('user.id_user_level', $role);
		return $this->db->get()->result();
	}

	function insertUser($dataUser, $dataDetailUser)
	{
		$this->db->trans_start();
		$this->db->insert('user', $dataUser);
		$this->db->insert('user_detail', $dataDetailUser);
		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}

	function updateUser($id, $dataUser, $dataDetailUser)
	{
		$this->db->trans_start();
		$this->db->where('id_user', $id);
		$this->db->update('user', $dataUser);
		$this->db->where('id_user_detail', $id);
		$this->db->update('user_detail', $dataDetailUser);
		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}

	function deleteUser($id)
	{
		$this->db->trans_start();
		$this->db->where('id_user', $id);
		$this->db->delete('user');
		$this->db->where('id_user_detail', $id);
		$this->db->delete('user_detail');
		$this->db->trans_complete();
		if ($this->db->trans_status() == true) {
			return true;
		} else {
			return false;
		}
	}
}
