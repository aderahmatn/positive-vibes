<section class="content-header align-content-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mt-2">LIST PENGEMBALIAN</h1>
            </div>
            <div class="col-sm-6">
                <div class=" float-sm-right justify-content-center">
                    <a class="btn btn-md btn-primary mt-2" href="<?= base_url('pengembalian/create') ?>">TAMBAH PENGEMBALIAN</a>

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
                                    <th>No</th>
                                    <th>No Sewa</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tgl Sewa</th>
                                    <th>Tgl Pengembalian</th>
                                    <th>Total Bayar</th>
                                    <th>Tgl Transaksi</th>
                                    <th>Denda</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pengembalian as $key) : ?>
                                    <tr class="text-uppercase">
                                        <td><?= $no++ ?></td>
                                        <td><?= $key->no_sewa ?></td>
                                        <td><?= $key->nama_pelanggan ?></td>
                                        <td><?= TanggalIndo($key->tgl_awal)  . ' - ' . TanggalIndo($key->tgl_akhir) ?></td>
                                        <td><?= TanggalIndo($key->tgl_pengembalian)  ?></td>
                                        <td><?= rupiah($key->total_bayar) ?></td>
                                        <td><?= TanggalIndo($key->tgl_transaksi)  ?></td>
                                        <td><?= rupiah($key->denda_pengembalian) ?></td>
                                        <td><a data-toggle="modal" onclick="showDetail(<?= $key->id_sewa ?>)" href="#modal_detail" class="btn  btn-outline-dark btn-xs">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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
<div class="modal fade" id="modal_detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="body_detail">
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirm -->
<script type="text/javascript">
    function showDetail(id) {
        $.ajax({
            type: "get",
            url: "<?= site_url('sewa/show_detail/'); ?>" + id,
            dataType: "html",
            success: function(response) {
                $('#body_detail').empty();
                $('#body_detail').append(response);
            }
        });
    }

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>