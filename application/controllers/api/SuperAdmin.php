<?php
defined('BASEPATH') or exit('No direct script access allowed');


class SuperAdmin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('api/cuti_model');
		$this->load->helper('download');
		$this->load->model('api/user_model');
		$this->load->model('api/user_detail_model');
		$this->load->model('ExcelModel');
		$this->load->model('api/divisi_model');
		$this->load->model('api/anggota_model');
	}
	function keputusan()
	{
		$idStatus = $this->input->post('id_status');
		$idTamu = $this->input->post('id_tamu');
		$alasan = $this->input->post('alasan');

		$data = [
			'id_status' => $idStatus,
			'alasan_verifikasi' => $alasan
		];

		$update = $this->cuti_model->update($idTamu, $data);

		if ($update == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	function addAdmin()
	{

		$username = $this->input->post('username');
		$validateUsername = $this->user_model->validateUsername($username);

		if ($validateUsername == null) {

			$date = date('Y-m-d H:i:s');
			$idUser = md5($date);
			$dataUser = [

				'id_user' => $idUser,
				'username' => $username,
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'id_user_level' => 2,
				'id_user_detail' => $idUser

			];


			$insert = $this->user_model->insertAdmin($dataUser);
			if ($insert == true) {
				$response = [
					'code' => 200
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Terjadi kesalahan'
				];
				echo json_encode($response);
			}
		} else {
			$response = [
				'code' => 404,
				'message' => 'Username telah terdaftar'
			];
			echo json_encode($response);
		}
	}

	function updateAdmin()
	{

		$username = $this->input->post('username');
		$id = $this->input->post('id');
		$validateUsername = $this->user_model->validateUsername($username);

		if ($validateUsername == null) {



			$dataUser = [

				'username' => $username,
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email')

			];


			$update = $this->user_model->update($id, $dataUser);
			if ($update == true) {
				$response = [
					'code' => 200
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Terjadi kesalahan'
				];
				echo json_encode($response);
			}
		} else {

			if ($validateUsername['id_user'] == $id) {
				$dataUser = [

					'username' => $username,
					'password' => $this->input->post('password'),
					'email' => $this->input->post('email')

				];


				$update = $this->user_model->update($id, $dataUser);
				if ($update == true) {
					$response = [
						'code' => 200
					];
					echo json_encode($response);
				} else {
					$response = [
						'code' => 404,
						'message' => 'Terjadi kesalahan'
					];
					echo json_encode($response);
				}
			} else {
				$response = [
					'code' => 404,
					'message' => 'Username telah terdaftar'
				];
				echo json_encode($response);
			}
		}
	}

	function deleteAdmin()
	{
		$id = $this->input->post('id');
		$delete = $this->user_model->delete($id);
		if ($delete == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}


	function getAllDivisi()
	{
		echo json_encode($this->divisi_model->getAllDivisi());
	}

	function insertDivisi()
	{
		$data = [
			'nama_divisi' => $this->input->post('nama_divisi'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		];
		$insert = $this->divisi_model->insert($data);
		if ($insert == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	function deleteDivisi()
	{
		$id = $this->input->post('id');
		$delete = $this->divisi_model->delete($id);
		if ($delete == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	function updateDivisi()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_divisi' => $this->input->post('nama_divisi'),
			'updated_at' => date('Y-m-d H:i:s'),
		];
		$update = $this->divisi_model->update($id, $data);
		if ($update == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	function getAllAnggota()
	{
		echo json_encode($this->anggota_model->getAllAnggota());
	}

	function insertAnggota()
	{
		$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'divisi_id' => $this->input->post('divisi_id'),
			'no_telp' => $this->input->post('no_telp'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		];
		$insert = $this->anggota_model->insert($data);
		if ($insert == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	function deleteAnggota()
	{
		$id = $this->input->post('id');
		$delete = $this->anggota_model->delete($id);
		if ($delete == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	function updateAnggota()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'divisi_id' => $this->input->post('divisi_id'),
			'no_telp' => $this->input->post('no_telp'),
			'updated_at' => date('Y-m-d H:i:s'),
		];
		$update = $this->anggota_model->update($id, $data);
		if ($update == true) {
			$response = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}
}
