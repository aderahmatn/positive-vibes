<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa_m extends CI_Model
{

    private $_table = 'sewa';
    public $no_sewa;
    public $id_user;
    public $tgl_awal;
    public $tgl_akhir;
    public $total_hari;
    public $total_harga;
    public $total_bayar;
    public $tgl_transaksi;
    public $is_return;
    public $is_payment;
    public $deleted;

    public function rules_report()
    {
        return [
            [
                'field' => 'ftgl_awal',
                'label' => 'tanggal awal',
                'rules' => 'required'
            ],
            [
                'field' => 'ftgl_akhir',
                'label' => 'tanggal akhir',
                'rules' => 'required'
            ],
        ];
    }

    public function add_sewa($post, $no_sewa)
    {
        $post = $this->input->post();
        $this->no_sewa = $no_sewa;
        $this->id_user = $this->session->userdata('id_pelanggan');
        $this->tgl_awal = $post['date1'];
        $this->tgl_akhir = $post['date2'];
        $this->tgl_akhir = $post['date2'];
        $this->total_harga = $post['ftotal_harga'];
        $this->total_hari = $post['ftotal_hari'];
        $this->total_bayar = $post['ftotal_bayar'];
        $this->tgl_transaksi = date('Y-m-d');
        $this->is_return = 0;
        $this->is_payment = 0;
        $this->deleted = 0;
        $this->db->insert($this->_table, $this);
    }
    public function get_all_by_id_pelanggan($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->where('id_user', $id_pelanggan);
        $this->db->where('sewa.deleted', 0);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_range_tgl_transaksi($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->where('tgl_transaksi>=', $tgl_awal);
        $this->db->where('tgl_transaksi<=', $tgl_akhir);
        $this->db->where('sewa.deleted', 0);
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sewa.id_user', 'left');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_total_bayar_by_range_tgl_transaksi($tgl_awal, $tgl_akhir)
    {
        $this->db->select_sum('total_bayar');
        $this->db->where('tgl_transaksi>=', $tgl_awal);
        $this->db->where('tgl_transaksi<=', $tgl_akhir);
        $this->db->where('sewa.deleted', 0);
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sewa.id_user', 'left');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->row()->total_bayar;
    }
    public function get_all_sewa()
    {
        $this->db->select('*');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sewa.id_user', 'left');
        $this->db->where('sewa.deleted', 0);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_sewa_no_return()
    {
        $this->db->select('*');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sewa.id_user', 'left');
        $this->db->where('sewa.deleted', 0);
        $this->db->where('sewa.is_return', 0);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function set_payment($id)
    {
        $this->db->set('is_payment', 1);
        $this->db->where('id_sewa', $id);
        $this->db->update($this->_table);
    }
    public function set_return($no_sewa)
    {
        $this->db->set('is_return', 1);
        $this->db->where('no_sewa', $no_sewa);
        $this->db->update($this->_table);
    }
    public function get_by_id_sewa($id_sewa)
    {
        $this->db->select('*');
        $this->db->where('id_sewa', $id_sewa);
        $this->db->where('sewa.deleted', 0);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->row();
    }
}

/* End of file Sewa.php */
