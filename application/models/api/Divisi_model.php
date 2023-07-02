<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	function getAllDivisi()
	{
		$this->db->select('*');
		$this->db->from('divisi');
		return $this->db->get()->result();
	}

	function update($id, $data)
	{
		$this->db->where('divisi_id', $id);
		$update = $this->db->update('divisi', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}
	function insert($data)
	{
		$insert = $this->db->insert('divisi', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}

	function delete($id)
	{
		$this->db->where('divisi_id', $id);
		$delete = $this->db->delete('divisi');
		if ($delete) {
			return true;
		} else {
			return false;
		}
	}
}
