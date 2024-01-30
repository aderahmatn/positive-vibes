<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_admin_not_login();
        $this->load->model(['Barang_m']);
        $this->load->helper(['rupiah']);
    }

    public function index()
    {
        $data['barang'] = $this->Barang_m->get_all_barang();
        $this->template->load('shared/index', 'barang/index', $data);
    }
    public function create()
    {
        $filename = date('d/m/Y');
        $config['overwrite'] = false;
        $config['upload_path'] = './uploads/barang';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = 'BRG-' . uniqid() . "-" . $filename;
        $config['max_size'] = 2048;
        $post = $this->input->post(null, TRUE);
        $barang = $this->Barang_m;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());
        if ($validation->run() == FALSE) {
            $this->template->load('shared/index', 'barang/create');
        } else {
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('flampiran')) {
                $file = $this->upload->data("file_name");
                $barang->add_barang($post, $file);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Tambah barang berhasil');
                    redirect('barang', 'refresh');
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('barang', 'refresh');
            }
        }
    }
    public function edit($id_barang)
    {
        $barang = $this->Barang_m;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());
        $data['barang'] = $this->Barang_m->get_by_id_barang($id_barang);
        if ($data['barang']) {
            if ($validation->run() == FALSE) {
                $this->template->load('shared/index', 'barang/edit', $data);
            } else {
                $post = $this->input->post(null, TRUE);
                $barang->update_barang($post, $id_barang);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Update data barang berhasil');
                    redirect('barang', 'refresh');
                } else {
                    $this->session->set_flashdata('warning', 'Update data barang batal');
                    redirect('barang', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Data barang tidak ditemukan');
            redirect('barang', 'refresh');
        }
    }
    public function edit_gambar($id_barang)
    {
        $barang = $this->Barang_m;
        $filename = date('d/m/Y');
        $config['overwrite'] = false;
        $config['upload_path'] = './uploads/barang';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = 'BRG-' . uniqid() . "-" . $filename;
        $config['max_size'] = 2048;
        $data['barang'] = $this->Barang_m->get_by_id_barang($id_barang);
        if ($data['barang']) {
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('flampiran')) {
                $file = $this->upload->data("file_name");
                $barang->ganti_gambar($id_barang, $file);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Foto barang berhasil diganti');
                    redirect('barang/edit/' . $id_barang, 'refresh');
                } else {
                    $this->session->set_flashdata('warning', 'Foto barang gagal diganti');
                    redirect('barang', 'refresh');
                }
            } else {
                $this->template->load('shared/index', 'barang/ganti_gambar', $data);
            }
        } else {
            $this->session->set_flashdata('warning', 'Data barang tidak ditemukan');
            redirect('barang', 'refresh');
        }
    }
    public function delete($id)
    {
        $this->Barang_m->delete_barang($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data barang berhasil dihapus!');
            redirect('barang', 'refresh');
        }
    }
}
