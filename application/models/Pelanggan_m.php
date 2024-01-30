<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_m extends CI_Model
{
    private $_table = "pelanggan";
    public $id_pelanggan;
    public $nik_ktp;
    public $nama_pelanggan;
    public $telepon_pelanggan;
    public $email_pelanggan;
    public $alamat_pelanggan;
    public $lampiran;
    public $isactive;
    public $user_auth;


    public function rules()
    {
        return [
            [
                'field' => 'fnik_ktp',
                'label' => 'NIK KTP',
                'rules' => 'required|numeric|max_length[16]|min_length[3]'
            ],
            [
                'field' => 'fnama_pelanggan',
                'label' => 'nama lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'ftelepon_pelanggan',
                'label' => 'nomor handphone',
                'rules' => 'required|numeric|min_length[11]|max_length[13]'
            ],
            [
                'field' => 'femail_pelanggan',
                'label' => 'email',
                'rules' => 'required|valid_emails'
            ],
            [
                'field' => 'falamat_pelanggan',
                'label' => 'alamat lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'fusername',
                'label' => 'username',
                'rules' => 'required|is_unique[auth.username]'
            ],
            [
                'field' => 'fpassword',
                'label' => 'password',
                'rules' => 'required'
            ]
        ];
    }
    public function rules_edit()
    {
        return [
            [
                'field' => 'fnik_ktp',
                'label' => 'NIK KTP',
                'rules' => 'required|numeric|max_length[16]|min_length[3]'
            ],
            [
                'field' => 'fnama_pelanggan',
                'label' => 'nama lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'ftelepon_pelanggan',
                'label' => 'nomor handphone',
                'rules' => 'required|numeric|min_length[11]|max_length[13]'
            ],
            [
                'field' => 'femail_pelanggan',
                'label' => 'email',
                'rules' => 'required|valid_emails'
            ],
            [
                'field' => 'falamat_pelanggan',
                'label' => 'alamat lengkap',
                'rules' => 'required'
            ],
        ];
    }
    public function get_all_pelanggan()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by('id_pelanggan', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id_pelanggan($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('pelanggan.id_pelanggan', $id);
        $this->db->join('auth', 'auth.user_auth = pelanggan.user_auth', 'left');
        $query = $this->db->get();
        return $query->row();
    }
    public function add_pelanggan($user_auth, $file)
    {
        $post = $this->input->post();
        $this->nik_ktp = $post['fnik_ktp'];
        $this->nama_pelanggan = $post['fnama_pelanggan'];
        $this->telepon_pelanggan = $post['ftelepon_pelanggan'];
        $this->email_pelanggan = $post['femail_pelanggan'];
        $this->alamat_pelanggan = $post['falamat_pelanggan'];
        $this->lampiran = $file;
        $this->isactive = 1;
        $this->user_auth = $user_auth;
        $this->db->insert($this->_table, $this);
    }
    public function update_pelanggan($post, $id)
    {
        $post = $this->input->post();
        $this->db->set('nik_ktp', $post['fnik_ktp']);
        $this->db->set('nama_pelanggan', $post['fnama_pelanggan']);
        $this->db->set('telepon_pelanggan', $post['ftelepon_pelanggan']);
        $this->db->set('email_pelanggan', $post['femail_pelanggan']);
        $this->db->set('alamat_pelanggan', $post['falamat_pelanggan']);
        $this->db->where('id_pelanggan', $id);
        $this->db->update($this->_table);
    }
    public function ganti_ktp($id_pelanggan, $file)
    {
        $this->db->set('lampiran', $file);
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update($this->_table);
    }
    public function nonaktifkan($id)
    {
        $this->db->set('isactive', 0);
        $this->db->where('id_pelanggan', $id);
        $this->db->update($this->_table);
    }
    public function aktifkan($id)
    {
        $this->db->set('isactive', 1);
        $this->db->where('id_pelanggan', $id);
        $this->db->update($this->_table);
    }
    public function delete_customer($id)
    {
        $this->db->set('deleted', 1);
        $this->db->where('uid_customer', $id);
        $this->db->update($this->_table);
    }
}

/* End of file Customers_m.php */