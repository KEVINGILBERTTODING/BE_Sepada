<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_Tamu extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cuti');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}
	
	public function view_pegawai()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$this->load->view('pegawai/form_pengajuan_cuti', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

	}
	
	public function proses_cuti()
	{
	if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

		$id_user = $this->input->post("id_user");
		$alasan = $this->input->post("alasan");
		$tujuan = $this->input->post("tujuan");
		$tanggal = $this->input->post("tanggal");
		$jam = $this->input->post("jam");
		$jumlah = $this->input->post("jumlah");
		$id_tamu = md5($id_user.$alasan.$jam);
		
		$id_status = 1;

		$hasil = $this->m_cuti->insert_data_cuti('tamu-'.substr($id_tamu, 0, 5),$id_user, $alasan, $tujuan, $jam, $tanggal, $jumlah, $id_status);

		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		
		}else{
			$this->session->set_flashdata('input','input');
		}
		redirect('Form_Tamu/view_pegawai');

	}else{

		$this->session->set_flashdata('loggin_err','loggin_err');
		redirect('Login/index');

	}

	}
    
}