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
    public function edit($id_pelanggan)
    {
        $pelanggan = $this->Pelanggan_m;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules_edit());
        $data['pelanggan'] = $this->Pelanggan_m->get_by_id_pelanggan($id_pelanggan);
        if ($data['pelanggan']) {
            if ($validation->run() == FALSE) {
                $this->template->load('shared/index', 'pelanggan/edit', $data);
            } else {
                $post = $this->input->post(null, TRUE);
                $pelanggan->update_pelanggan($post, $id_pelanggan);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Update data pelanggan berhasil');
                    redirect('pelanggan', 'refresh');
                } else {
                    $this->session->set_flashdata('warning', 'Update data pelanggan batal');
                    redirect('pelanggan', 'refresh');
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'Data pelanggan tidak ditemukan');
            redirect('pelanggan', 'refresh');
        }
    }
    public function ganti_ktp($id_pelanggan)
    {
        $pelanggan = $this->Pelanggan_m;
        $filename = date('d/m/Y');
        $config['overwrite'] = false;
        $config['upload_path'] = './uploads/pelanggan/ktp';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = 'KTP-' . uniqid() . $filename;
        $config['max_size'] = 2048;
        $data['pelanggan'] = $this->Pelanggan_m->get_by_id_pelanggan($id_pelanggan);
        if ($data['pelanggan']) {
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('flampiran')) {
                $file = $this->upload->data("file_name");
                $pelanggan->ganti_ktp($id_pelanggan, $file);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'KTP berhasil diganti');
                    redirect('pelanggan/edit/' . $id_pelanggan, 'refresh');
                } else {
                    $this->session->set_flashdata('warning', 'KTP gagal diganti');
                    redirect('pelanggan', 'refresh');
                }
            } else {
                $this->template->load('shared/index', 'pelanggan/ganti_ktp', $data);
            }
        } else {
            $this->session->set_flashdata('warning', 'Data pelanggan tidak ditemukan');
            redirect('pelanggan', 'refresh');
        }
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
