<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Barang_m']);
        $this->load->helper(['rupiah']);
    }
    public function index()
    {
        $data['barang'] = $this->Barang_m->get_all_barang();
        $data['kategori'] = null;
        $this->template->load('shared/store', 'katalog/index', $data);
    }
    public function kategori($kategori)
    {
        $data['barang'] = $this->Barang_m->get_by_kategori_barang($kategori);
        $data['kategori'] = $kategori;
        $this->template->load('shared/store', 'katalog/index', $data);
    }
    public function show_detail($id)
    {
        $data = $this->Barang_m->get_by_id_barang($id); ?>
        <div class="row">
            <div class="col-md-5">
                <img src="<?= base_url('uploads/barang/') . $data->gambar ?>" alt="foto barang" class="img-thumbnail">
            </div>
            <div class="col-md-7">
                <h3 class="text-bold"><?= $data->nama_barang ?></h3>
                <hr>
                <div class="mb-4">
                    <p class="mb-0">Harga Sewa :</p>
                    <h4 class="text-bold mt-0"><?= rupiah($data->harga_sewa) ?> <small>/ Hari</small></h4>
                </div>
                <div class="mb-4">
                    <p class="mb-0">Barang Tersedia :</p>
                    <h4 class="text-bold mt-0"><?= $data->stok ?> <small>/ Unit</small></h4>
                </div>
                <div class="mb-4">
                    <p class="mb-0">Kategori :</p>
                    <h4 class="text-bold text-uppercase mt-0"><?= $data->kategori ?></h4>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <h4 class="mb-0">Keterangan :</h4>
            <p class=" text-justify"><?= $data->deskripsi ?> </p>
        </div>
        <hr>
        <button class="btn btn-primary float-right" id="closemodal">TUTUP</button>
        <script>
            $(document).ready(function() {
                $('#closemodal').click(function() {
                    $('#modal_detail').modal('hide');
                });
            });
        </script>
<?php
    }
}

/* End of file Katalog.php */
