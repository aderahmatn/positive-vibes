<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian_m extends CI_Model
{

    private $_table = 'pengembalian';
    public $no_sewa;
    public $tgl_pengembalian;
    public $denda_pengembalian;
    public $note_pengembalian;

    public function rules()
    {
        return [
            [
                'field' => 'fno_sewa',
                'label' => 'no sewa',
                'rules' => 'required'
            ],
            [
                'field' => 'ftgl_pengembalian',
                'label' => 'tanggal pengembalian',
                'rules' => 'required'
            ]
        ];
    }
    public function get_all_pengembalian()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('sewa', 'sewa.no_sewa = pengembalian.no_sewa', 'left');
        // $this->db->join('barang', 'barang.id_barang = sewa.id_barang', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sewa.id_user', 'left');
        $this->db->order_by('id_pengembalian', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id_pengembalian($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('pengembalian.id_pengembalian', $id);
        $this->db->join('sewa', 'sewa.no_sewa = pengembalian.no_sewa', 'left');
        $this->db->join('barang', 'barang.id_barang = sewa.id_barang', 'left');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sewa.id_user', 'left');
        $query = $this->db->get();
        return $query->row();
    }
    public function add_pengembalian()
    {
        $post = $this->input->post();
        $this->no_sewa = $post['fno_sewa'];
        $this->tgl_pengembalian = $post['ftgl_pengembalian'];
        $this->denda_pengembalian = $post['fdenda_pengembalian'];
        $this->note_pengembalian = $post['fnote_pengembalian'];
        $this->db->insert($this->_table, $this);
    }
}

/* End of file Pengembalian_m.php */
