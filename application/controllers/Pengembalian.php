<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_admin_not_login();
        $this->load->model(['Pengembalian_m', 'Sewa_m','Item_sewa_m', 'Barang_m']);
        $this->load->helper(['rupiah']);
    }
    public function index()
    {
        $data['pengembalian'] = $this->Pengembalian_m->get_all_pengembalian();
        $this->template->load('shared/index', 'pengembalian/index', $data);
    }
    public function create()
    {
        $post = $this->input->post(null, TRUE);
        $pengembalian = $this->Pengembalian_m;
        $validation = $this->form_validation;
        $validation->set_rules($pengembalian->rules());
        if ($validation->run() == FALSE) {
            $data['sewa'] = $this->Sewa_m->get_all_sewa_no_return();
            $this->template->load('shared/index', 'pengembalian/create', $data);
        } else {
            $pengembalian->add_pengembalian($post);
            $this->Sewa_m->set_return($post['fno_sewa']);
            $data['barang'] = $this->Item_sewa_m->get_by_no_sewa($post['fno_sewa']);
            foreach ($data['barang'] as $key ) {
                $last_stok = $this->Barang_m->get_stok_by_id_barang($key->id_barang);
                $new_stok = $last_stok+1;
                $this->Barang_m->update_stok($key->id_barang, $new_stok);
             }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Tambah pengembalian berhasil');
                redirect('pengembalian', 'refresh');
            }
        }
    }
}

/* End of file Pengembalian.php */
