<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_admin_not_login();
        $this->load->helper(['auth']);
        $this->load->model(['Pelanggan_m']);
    }
    public function index()
    {
        $data['pelanggan'] = $this->Pelanggan_m->get_all_pelanggan();
        $this->template->load('shared/index', 'pelanggan/index', $data);
    }
    public function nonaktifkan($id)
    {
        $this->Pelanggan_m->nonaktifkan($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data pelanggan berhasil nonaktif');
            redirect('pelanggan', 'refresh');
        }
    }
    public function aktifkan($id)
    {
        $this->Pelanggan_m->aktifkan($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data pelanggan berhasil aktif');
            redirect('pelanggan', 'refresh');
        }
    }
}
