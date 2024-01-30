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
        // $this->db->join('barang', 'barang.id_barang = ransel.id_barang', 'left');
        $this->db->where('id_user', $id_pelanggan);
        $this->db->where('sewa.deleted', 0);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
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