<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Anggota_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	function getAllAnggota()
	{
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->join('divisi', 'divisi.divisi_id = anggota.divisi_id', 'left');
		return $this->db->get()->result();
	}

	function getAnggotaJadwal($divisiId, $day)
	{

		$this->db->select('anggota.*, divisi.nama_divisi');
		$this->db->from('anggota');
		$this->db->where('anggota.divisi_id', $divisiId);
		$this->db->join('divisi', 'divisi.divisi_id = anggota.divisi_id', 'left');
		$this->db->where('anggota.day', $day);
		return $this->db->get()->result();
	}

	function delete($id)
	{
		$this->db->where('anggota_id', $id);
		$delete = $this->db->delete('anggota');
		if ($delete) {
			return true;
		} else {
			return false;
		}
	}

	function insert($data)
	{
		$insert = $this->db->insert('anggota', $data);
		if ($insert) {
			return true;
		} else {
			return false;
		}
	}

	function update($id, $data)
	{
		$this->db->where('anggota_id', $id);
		$update = $this->db->update('anggota', $data);
		if ($update) {
			return true;
		} else {
			return false;
		}
	}
}
