<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('api/cuti_model');
		$this->load->model('api/user_model');
		$this->load->model('api/user_detail_model');
	}

	function getMyCuti()
	{
		$id = $this->input->get('id');
		echo json_encode($this->cuti_model->getCuti($id));
	}

	function getDetailProfile()
	{
		$id = $this->input->get('id');
		echo json_encode($this->user_detail_model->getDetailUser($id));
	}

	function insertDetailUser()
	{
		$data = [
			'id_user_detail' => $this->input->post('id_user_detail'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'id_jenis_kelamin' => $this->input->post('id_jenis_kelamin'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
			'nip' => $this->input->post('nip'),
			'pangkat' => $this->input->post('pangkat'),
			'jabatan' => $this->input->post('jabatan'),
		];
		$insert = $this->user_detail_model->insert($data);
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

	function insertPengajuan()
	{

		$random = substr(md5(rand()), 0, 5);
		$idTamu = 'tamu-' . $random;

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'pdf';


		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('surat')) {
			$response = [
				'code' => 404,
				'message' => $this->upload->display_errors()
			];
			echo json_encode($response);
		} else {

			$data = array('upload_data' => $this->upload->data());
			$fileName = $data['upload_data']['file_name'];

			$data = [
				'id_tamu' => $idTamu,
				'id_user' => $this->input->post('id_user'),
				'tujuan' => $this->input->post('tujuan'),
				'alasan' => $this->input->post('alasan'),
				'tanggal' => $this->input->post('tanggal'),
				'jam' => $this->input->post('jam'),
				'jumlah' => $this->input->post('jumlah'),
				'id_status' => 1,
				'file' => $fileName,
				'tgl_diajukan' => date('Y-m-d'),
				'alasan_verifikasi' => null
			];

			$insert = $this->cuti_model->insert($data);
			if ($insert == true) {
				$response = [
					'code' => 200
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Gagal'
				];
				echo json_encode($response);
			}
		}
	}

	public function download_surat_persetujuan($idtamu)
	{

		$data['cuti'] = $this->cuti_model->getCutiById($idtamu);
		$this->load->library('pdf');
		$this->pdf->setPaper('Letter', 'potrait');
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->filename = "surat-persetujuan.pdf";
		$this->pdf->load_view('v_laporan_persetujuan', $data);
	}

	function getTamuByStatus()
	{

		$id = $this->input->get('id');
		$status = $this->input->get('status');
		echo json_encode($this->cuti_model->getCutiByStatus($id, $status));
	}

	function updatePhotoProfile()
	{
		$config['upload_path']          = './uploads/profile/';
		$config['allowed_types']        = 'jpg|png|jepg';


		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$response = [
				'code' => 404,
				'message' => $this->upload->display_errors()
			];
			echo json_encode($response);
		} else {


			$data = array('upload_data' => $this->upload->data());
			$fileName = $data['upload_data']['file_name'];

			$id = $this->input->post('id');
			$data = [
				'foto' => $fileName
			];

			$update = $this->user_detail_model->update($id, $data);
			if ($update == true) {
				$response = [
					'code' => 200
				];
				echo json_encode($response);
			} else {
				$response = [
					'code' => 404,
					'message' => 'Gagal mengubah foto pprofil'
				];
				echo json_encode($response);
			}
		}
	}

	function updateDetailUser()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'id_jenis_kelamin' => $this->input->post('id_jenis_kelamin'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
			'nip' => $this->input->post('nip'),
			'pangkat' => $this->input->post('pangkat'),
			'jabatan' => $this->input->post('jabatan'),
		];
		$update = $this->user_detail_model->update($id, $data);
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

	function updateProfile()
	{
		$id = $this->input->post('id');
		$data = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		$update = $this->user_model->update($id, $data);
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
