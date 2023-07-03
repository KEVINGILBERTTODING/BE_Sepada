<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cuti_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	function getCuti($id)
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('user', 'user.id_user = cuti. id_user', 'left');
		$this->db->join('user_detail', 'user_detail.id_user_detail = cuti. id_user', 'left');
		$this->db->where('cuti.id_user', $id);
		$this->db->order_by('cuti. tgl_diajukan', 'desc');
		return $this->db->get()->result();
	}

	function getAllCuti()
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('user', 'user.id_user = cuti. id_user', 'left');
		$this->db->join('user_detail', 'user_detail.id_user_detail = cuti. id_user', 'left');
		$this->db->order_by('cuti. tgl_diajukan', 'desc');
		return $this->db->get()->result();
	}

	function getCutiByStatus($id, $status)
	{
		if ($status == 'all') {
			$this->db->select('*');
			$this->db->from('cuti');
			$this->db->join('user', 'user.id_user = cuti. id_user', 'left');
			$this->db->join('user_detail', 'user_detail.id_user_detail = cuti. id_user', 'left');
			$this->db->where('cuti.id_user', $id);
			$this->db->order_by('cuti. tgl_diajukan', 'desc');
			return $this->db->get()->result();
		} else {
			$this->db->select('*');
			$this->db->from('cuti');
			$this->db->join('user', 'user.id_user = cuti. id_user', 'left');
			$this->db->join('user_detail', 'user_detail.id_user_detail = cuti. id_user', 'left');
			$this->db->where('cuti.id_user', $id);
			$this->db->where('cuti.id_status', $status);
			$this->db->order_by('cuti. tgl_diajukan', 'desc');
			return $this->db->get()->result();
		}
	}


	function getAllCutiByStatus($status)
	{
		if ($status == 'all') {
			$this->db->select('*');
			$this->db->from('cuti');
			$this->db->join('user', 'user.id_user = cuti. id_user', 'left');
			$this->db->join('user_detail', 'user_detail.id_user_detail = cuti. id_user', 'left');
			$this->db->order_by('cuti. tgl_diajukan', 'desc');
			return $this->db->get()->result();
		} else {
			$this->db->select('*');
			$this->db->from('cuti');
			$this->db->join('user', 'user.id_user = cuti. id_user', 'left');
			$this->db->join('user_detail', 'user_detail.id_user_detail = cuti. id_user', 'left');
			$this->db->where('cuti.id_status', $status);
			$this->db->order_by('cuti. tgl_diajukan', 'desc');
			return $this->db->get()->result();
		}
	}


	function getCutiById($id)
	{
		$this->db->select('cuti.*, user.*, user_detail.*, anggota.nama_lengkap as nama_anggota');
		$this->db->from('cuti');
		$this->db->join('user', 'user.id_user = cuti. id_user', 'left');
		$this->db->join('user_detail', 'user_detail.id_user_detail = cuti. id_user', 'left');
		$this->db->join('anggota', 'anggota.anggota_id = cuti.anggota_id', 'left');
		$this->db->where('cuti.id_tamu', $id);
		$this->db->order_by('cuti. tgl_diajukan', 'desc');
		return $this->db->get()->row_array();
	}

	function insert($data)
	{
		$insert = $this->db->insert('cuti', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}

	function update($id, $data)
	{

		$this->db->where('id_tamu', $id);
		$update = $this->db->update('cuti', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}

	function delete($id)
	{

		$this->db->where('id_tamu', $id);
		$delete = $this->db->delete('cuti');
		if ($delete) {
			return true;
		} else {
			return false;
		}
	}
}
