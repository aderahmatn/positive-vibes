<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_admin_not_login();
		$this->load->model(['Sewa_m', 'Barang_m']);

		$this->load->helper(['auth']);
	}

	public function index()
	{
		$data['semua_sewa'] = $this->Sewa_m->get_jumlah_semua_sewa();
		$data['sewa_kembali'] = $this->Sewa_m->get_jumlah_sewa_kembali();
		$data['sewa_belum_kembali'] = $this->Sewa_m->get_jumlah_sewa_belum_kembali();
		$data['jumlah_barang'] = $this->Barang_m->get_jumlah_barang();
		$this->template->load('shared/index', 'dashboard/index', $data);
	}
	public function katalog()
	{
		$this->template->load('shared/store', 'welcome_message');
	}
}
