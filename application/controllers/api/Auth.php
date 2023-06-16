<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('api/user_model');
	}

	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$validateUsername = $this->user_model->validateUsername($username);
		if ($validateUsername != null) {
			if ($validateUsername['password'] == $password) {
				$response = [
					'code' => 200,
					'user_id' => $validateUsername['id_user'],
					'username' => $validateUsername['username'],
					'role' => $validateUsername['id_user_level']
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Password salah'
				];
				echo json_encode($response);
			}
		} else {
			$response = [
				'code' => 404,
				'message' => 'Username belum terdaftar'
			];
			echo json_encode($response);
		}
	}

	function register()
	{
		$date = date('Y-m-d H:i:s');
		$idUser = md5($date);
		$data = [
			'id_user' => $idUser,
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'id_user_level' => 1,
			'id_user_detail' => $idUser
		];

		$register = $this->user_model->insert($data);
		if ($register == true) {
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
