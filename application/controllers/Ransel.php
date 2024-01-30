<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ransel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Ransel_m', 'Barang_m', 'Item_sewa_m', 'Sewa_m']);
        $this->load->helper(['rupiah']);
    }


    public function index()
    {
        $ransel = $this->Ransel_m;
        $validation = $this->form_validation;
        $validation->set_rules($ransel->rules_co());
        $data['ransel'] = $this->Ransel_m->get_ransel_by_id_pelanggan($this->session->userdata('id_pelanggan'));
        $data['total_harga'] = $this->Ransel_m->get_total_harga_by_pelanggan($this->session->userdata('id_pelanggan'));
        if ($data['ransel']) {
            if ($validation->run() == FALSE) {
                $this->template->load('shared/store', 'ransel/index', $data);
            } else {
                $post = $this->input->post(null, TRUE);
                $no_sewa = uniqid('sw');
                $this->Sewa_m->add_sewa($post, $no_sewa);
                foreach ($data['ransel'] as $key) {
                    $this->Item_sewa_m->add_item($key->id_barang, $no_sewa);
                    $this->Ransel_m->delete($key->id_ransel);
                }
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Pesanan berhasil dibuat');
                    redirect('sewa/riwayat', 'refresh');
                } else {
                    $this->session->set_flashdata('warning', 'Pesanan gagal dibuat');
                    redirect('ransel', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Ransel anda masih kosong');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function bayar()
    {
        $this->template->load('shared/store', 'ransel/bayar');
    }
    public function add_to_ransel($id_barang)
    {
        $data['barang'] = $this->Barang_m->get_by_id_barang($id_barang);
        if ($data['barang']) {
            $this->Ransel_m->add_to_ransel($id_barang);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil dimasukan ke ransel');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('danger', 'Gagal dimasukan ke ransel');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('warning', 'Data barang tidak ditemukan');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function delete($id_ransel)
    {
        $this->Ransel_m->delete($id_ransel);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data barang berhasil dihapus!');
            $data['ransel'] = $this->Ransel_m->get_ransel_by_id_pelanggan($this->session->userdata('id_pelanggan'));
            if ($data['ransel']) {
                # code...
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                redirect('katalog', 'refresh');
            }
        }
    }
}

/* End of file Ransel.php */
