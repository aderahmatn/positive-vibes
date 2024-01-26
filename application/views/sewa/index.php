<section class="content-header align-content-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mt-2">LIST PENYEWAAN</h1>
            </div>
            <div class="col-sm-6">
                <div class=" float-sm-right justify-content-center">
                    <!-- <a class="btn btn-md btn-primary mt-2" href="<?= base_url('users/create') ?>">TAMBAH USER</a> -->
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
                                <tr class="text-uppercase">
                                    <th style="width: 15px">No</th>
                                    <th>No Sewa</th>
                                    <th>Pelanggan</th>
                                    <th>Tgl Sewa</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>0124001</td>
                                    <td>Tohirudin</td>
                                    <td>19/01/2024 - 20/01/2024</td>
                                    <td>Rp.720.000</td>
                                    <td><span class="badge badge-pill badge-warning">Belum Kembali</span></td>
                                    <td><button class="btn btn-default btn-sm">Detail</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1223067</td>
                                    <td>Tohirudin</td>
                                    <td>29/12/2023 - 01/01/2024</td>
                                    <td>Rp.500.000</td>
                                    <td><span class="badge badge-pill badge-success">Kembali</span></td>
                                    <td><button class="btn btn-default btn-sm">Detail</button></td>

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