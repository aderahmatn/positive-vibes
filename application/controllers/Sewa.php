<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_member_not_login();
        $this->load->model(['Sewa_m', 'Item_sewa_m']);
        $this->load->helper(['rupiah']);
    }


    public function index()
    {
        $data['sewa'] = $this->Sewa_m->get_all_by_id_pelanggan($this->session->userdata('id_pelanggan'));
        $this->template->load('shared/index', 'sewa/index', $data);
    }
    public function riwayat()
    {
        $data['sewa'] = $this->Sewa_m->get_all_by_id_pelanggan($this->session->userdata('id_pelanggan'));
        $this->template->load('shared/store', 'sewa/riwayat', $data);
    }
    public function show_detail($id_sewa)
    {
        $data['sewa'] = $this->Sewa_m->get_by_id_sewa($id_sewa);
        $data['barang'] = $this->Item_sewa_m->get_by_no_sewa($data['sewa']->no_sewa);
        $this->load->view('sewa/detail', $data);
    }
}

/* End of file Sewa.php */
