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
}
