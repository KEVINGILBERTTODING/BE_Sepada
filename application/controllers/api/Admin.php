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
		$this->load->model('api/anggota_model');
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

	function getAllUsersByRole()
	{
		$role = $this->input->get('role');
		echo json_encode($this->user_model->getAllUserByRole($role));
	}

	function addUser()
	{

		$date = date('Y-m-d H:i:s');
		$idUser = md5($date);
		$dataUser = [

			'id_user' => $idUser,
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'id_user_level' => 1,
			'id_user_detail' => $idUser

		];
		$dataUserDetail = [
			'id_user_detail' => $idUser,
			'id_jenis_kelamin' => $this->input->post('id_jenis_kelamin'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat')
		];

		$insert = $this->user_model->insertUser($dataUser, $dataUserDetail);
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

	function updateUser()
	{


		$idUser = $this->input->post('id');
		$dataUser = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email')

		];
		$dataUserDetail = [

			'id_jenis_kelamin' => $this->input->post('id_jenis_kelamin'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat')
		];

		$insert = $this->user_model->updateUser($idUser, $dataUser, $dataUserDetail);
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

	function deleteUser()
	{
		$id  = $this->input->post('id');
		$delete = $this->user_model->deleteUser($id);
		if ($delete == true) {
			$response  = [
				'code' => 200
			];
			echo json_encode($response);
		} else {
			$response  = [
				'code' => 404
			];
			echo json_encode($response);
		}
	}

	function getAnggotaJadwal()
	{
		$divisiId = $this->input->get('divisi_id');
		$day =  $this->input->get('day');
		echo json_encode($this->anggota_model->getAnggotaJadwal($divisiId, $day));
	}

	function updateAnggota()
	{
		$id = $this->input->post('id');
		$data = [
			'day' => $this->input->post('day'),
			'updated_at' => date('Y-m-d H:i:s')
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
