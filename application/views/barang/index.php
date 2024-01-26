<section class="content-header align-content-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mt-2">LIST BARANG</h1>
            </div>
            <div class="col-sm-6">
                <div class=" float-sm-right justify-content-center">
                    <a class="btn btn-md btn-primary mt-2" href="<?= base_url('barang/create') ?>">TAMBAH BARANG</a>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <!-- card-body -->
                    <div class="card-body table-responsive-sm">

                        <table id="tableUSer" class="display nowrap " style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 15px">No</th>
                                    <th>PICTURE</th>
                                    <th>NAMA BARANG</th>
                                    <th>KATEGORI</th>
                                    <th>HARGA</th>
                                    <th>STOK</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <img src="<?= base_url() . 'uploads/tenda1.jpeg' ?>" alt="..." height="70px">

                                    </td>
                                    <td>
                                        Tenda Senaru 2P
                                    </td>
                                    <td>
                                        tenda </td>
                                    <td>
                                        Rp.100.000
                                    </td>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        <button class="btn-primary btn-xs btn">Edit</button>
                                        <button class="btn-danger btn-xs btn">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <img src="<?= base_url() . 'uploads/tenda2.jpeg' ?>" alt="..." height="70px">

                                    </td>
                                    <td>
                                        Tenda Extreme 4P
                                    </td>
                                    <td>
                                        tenda </td>
                                    <td>
                                        Rp.200.000
                                    </td>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        <button class="btn-primary btn-xs btn">Edit</button>
                                        <button class="btn-danger btn-xs btn">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <img src="<?= base_url() . 'uploads/ransel1.jpeg' ?>" alt="..." height="70px">

                                    </td>
                                    <td>
                                        Ransel Blue 20L
                                    </td>
                                    <td>
                                        ransel </td>
                                    <td>
                                        Rp.150.000
                                    </td>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        <button class="btn-primary btn-xs btn">Edit</button>
                                        <button class="btn-danger btn-xs btn">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <img src="<?= base_url() . 'uploads/ransel2.jpeg' ?>" alt="..." height="70px">

                                    </td>
                                    <td>
                                        Ransel Expedition 35L
                                    </td>
                                    <td>
                                        ransel </td>
                                    <td>
                                        Rp.180.000
                                    </td>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        <button class="btn-primary btn-xs btn">Edit</button>
                                        <button class="btn-danger btn-xs btn">Hapus</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</section>

<!--Delete Confirmation-->
<div class="modal fade" id="deleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>
                        <span>Data yang dihapus tidak akan bisa dikembalikan.</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#"> Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirm -->
<script type="text/javascript">
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>