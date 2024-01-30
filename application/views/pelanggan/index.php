<section class="content-header align-content-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mt-2">LIST PELANGGAN</h1>
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
                                <tr>
                                    <th style="width: 15px">No</th>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>PHONE</th>
                                    <th>EMAIL</th>
                                    <th>ALAMAT</th>
                                    <th>STATUS</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pelanggan as $key) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key->nik_ktp ?></td>
                                        <td><?= $key->nama_pelanggan ?></td>
                                        <td><?= $key->telepon_pelanggan ?></td>
                                        <td><?= $key->email_pelanggan ?></td>
                                        <td><?= $key->alamat_pelanggan ?></td>

                                        <td><span class="badge badge-pill <?= $key->isactive == 1 ? 'badge-primary' : 'badge-warning' ?>"><?= $key->isactive == 1 ? 'aktif' : 'nonaktif' ?></span></td>
                                        <td>
                                            <a href="<?= base_url('uploads/pelanggan/ktp/') . $key->lampiran ?>" class="btn-default btn-xs btn" target="_blank">Lihat KTP</a>
                                            <a href="<?= base_url('pelanggan/edit/') . $key->id_pelanggan ?>" class="btn-success btn-xs btn">Edit Data</a>
                                            <?php if ($key->isactive == 1) { ?>
                                                <a href="<?= base_url('pelanggan/nonaktifkan/') . $key->id_pelanggan ?>" class="btn-warning btn-xs btn">Nonaktifkan</a>
                                            <?php } else { ?>
                                                <a href="<?= base_url('pelanggan/aktifkan/') . $key->id_pelanggan ?>" class="btn-primary btn-xs btn">Aktifkan</a>
                                            <?php  } ?>


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

<!-- Delete Confirm -->
<script type="text/javascript">
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>