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
}
