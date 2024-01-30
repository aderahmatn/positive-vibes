<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_sewa_m extends CI_Model
{

    private $_table = 'item_sewa';
    public $id_barang;
    public $no_sewa;

    function add_item($id_barang, $no_sewa)
    {
        $this->id_barang = $id_barang;
        $this->no_sewa = $no_sewa;
        $this->db->insert($this->_table, $this);
    }
    public function get_by_no_sewa($no_sewa)
    {
        $this->db->select('*');
        $this->db->where('item_sewa.no_sewa', $no_sewa);
        $this->db->join('barang', 'barang.id_barang = item_sewa.id_barang', 'left');
        $this->db->from($this->_table, $this);
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file Item_sewa_m.php */
