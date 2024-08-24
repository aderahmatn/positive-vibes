<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_m extends CI_Model
{

    private $_table = "barang";
    public $nama_barang;
    public $harga_sewa;
    public $stok;
    public $gambar;
    public $kategori;
    public $deskripsi;
    public $deleted;

    public function rules()
    {
        return [
            [
                'field' => 'fnama_barang',
                'label' => 'nama barang',
                'rules' => 'required'
            ],
            [
                'field' => 'fharga_sewa',
                'label' => 'harga sewa',
                'rules' => 'required'
            ],
            [
                'field' => 'fstok',
                'label' => 'stok',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'fdeskripsi',
                'label' => 'deskripsi',
                'rules' => 'required'
            ],
            [
                'field' => 'fkategori',
                'label' => 'kategori',
                'rules' => 'required'
            ],
        ];
    }

    public function get_all_barang()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by('id_barang', 'desc');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_jumlah_barang()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by('id_barang', 'desc');
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function add_barang($post, $file)
    {
        $post = $this->input->post();
        $this->nama_barang = $post['fnama_barang'];
        $this->harga_sewa = $post['fharga_sewa'];
        $this->stok = $post['fstok'];
        $this->deskripsi = $post['fdeskripsi'];
        $this->kategori = $post['fkategori'];
        $this->gambar = $file;
        $this->deleted = 0;
        $this->db->insert($this->_table, $this);
    }
    public function update_barang($post, $id)
    {
        $post = $this->input->post();
        $this->db->set('nama_barang', $post['fnama_barang']);
        $this->db->set('harga_sewa', $post['fharga_sewa']);
        $this->db->set('stok', $post['fstok']);
        $this->db->set('deskripsi', $post['fdeskripsi']);
        $this->db->set('kategori', $post['fkategori']);
        $this->db->where('id_barang', $id);
        $this->db->update($this->_table);
    }
    public function ganti_gambar($id_barang, $file)
    {
        $this->db->set('gambar', $file);
        $this->db->where('id_barang', $id_barang);
        $this->db->update($this->_table);
    }
    public function get_by_id_barang($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('barang.id_barang', $id);
        $this->db->where('barang.deleted', 0);
        $query = $this->db->get();
        return $query->row();
    }
    public function get_stok_by_id_barang($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('barang.id_barang', $id);
        $this->db->where('barang.deleted', 0);
        $query = $this->db->get();
        return $query->row()->stok;
    }
    public function get_by_kategori_barang($kategori)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('barang.kategori', $kategori);
        $this->db->where('barang.deleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function delete_barang($id)
    {
        $this->db->set('deleted', 1);
        $this->db->where('id_barang', $id);
        $this->db->update($this->_table);
    }
    public function update_stok($id, $new_stok)
    {
        $this->db->set('stok', $new_stok);
        $this->db->where('id_barang', $id);
        $this->db->update($this->_table);
    }
}

/* End of file Barang_m.php */
