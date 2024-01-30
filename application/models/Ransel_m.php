<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ransel_m extends CI_Model
{

    private $_table = 'ransel';
    public $id_barang;
    public $id_user;
    public $deleted;

    public function rules_co()
    {
        return [
            [
                'field' => 'date1',
                'label' => 'tanggal awal',
                'rules' => 'required'
            ],
            [
                'field' => 'date2',
                'label' => 'tanggan akhir',
                'rules' => 'required'
            ],
        ];
    }
    public function add_to_ransel($id_barang)
    {
        $this->id_barang = $id_barang;
        $this->id_user = $this->session->userdata('id_pelanggan');
        $this->deleted = 0;
        $this->db->insert($this->_table, $this);
    }
    public function total_ransel_by_pelanggan($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->where('id_user', $id_pelanggan);
        $this->db->where('deleted', 0);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_ransel_by_id_pelanggan($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->join('barang', 'barang.id_barang = ransel.id_barang', 'left');
        $this->db->where('id_user', $id_pelanggan);
        $this->db->where('ransel.deleted', 0);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_total_harga_by_pelanggan($id_pelanggan)
    {
        $this->db->select_sum('harga_sewa');
        $this->db->join('barang', 'barang.id_barang = ransel.id_barang', 'left');
        $this->db->where('id_user', $id_pelanggan);
        $this->db->where('ransel.deleted', 0);
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->row()->harga_sewa;
    }
    public function delete($id_ransel)
    {
        $this->db->set('deleted', 1);
        $this->db->where('id_ransel', $id_ransel);
        $this->db->update($this->_table);
    }
}

/* End of file Ransel_m.php */
