<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
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

	function getAllPengajuan()
	{
		echo json_encode($this->cuti_model->getAllCuti());
	}

	function getAllPengajuanByStatus()
	{
		$status = $this->input->get('status');
		echo json_encode($this->cuti_model->getAllCutiByStatus($status));
	}
	function downloadSuratLampiran($id)
	{

		$data = $this->cuti_model->getCutiById($id);
		$filename = $data['file'];
		$file = 'uploads/' . $filename;
		force_download($file, NULL);
	}

	function updatePengajuan()
	{
		$id = $this->input->post('id');
		$data = [
			'alasan' => $this->input->post('alasan'),
			'jam' => $this->input->post('jam'),
			'tanggal' => $this->input->post('tanggal'),
			'jumlah' => $this->input->post('jumlah'),
		];
		$update = $this->cuti_model->update($id, $data);
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

	function deletePengajuan()
	{
		$id = $this->input->post('id');
		$delete = $this->cuti_model->delete($id);
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

	function downloadRekapPengajuan($status, $dateStart, $dateEnd)
	{
		$this->ExcelModel->createExcel($status, $dateStart, $dateEnd);
	}
}
