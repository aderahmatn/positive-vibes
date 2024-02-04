<section class="content-header align-content-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="mt-2">LAPORAN PENYEWAAN</h1>
            </div>
            <div class="col-sm-6">
                <div class=" float-sm-right justify-content-center">
                    <!-- <a class="btn btn-md btn-primary mt-2" href="<?= base_url('users/create') ?>">TAMBAH USER</a> -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <section class="content-header align-content-center">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Filter Data</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group required">
                                <label for="ftgl_awal" class="control-label">Tanggal Transaksi Awal</label>
                                <input type="date" class="form-control <?= form_error('ftgl_awal') ? 'is-invalid' : '' ?>" id="ftgl_awal" name="ftgl_awal" placeholder="Harga sewa per hari" value="<?= $this->input->post('ftgl_awal') ?>" onchange="tglPengembalianOnSet()">
                                <div class="invalid-feedback">
                                    <?= form_error('ftgl_awal') ?>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-1 ">
                        <p class="text-center align-middle  text-bold " style="margin-top: 2.1rem;"> Sampai</p>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="ftgl_akhir" class="control-label">Tanggal Transaksi Akhir</label>
                            <input type="date" class="form-control <?= form_error('ftgl_akhir') ? 'is-invalid' : '' ?>" id="ftgl_akhir" name="ftgl_akhir" placeholder="Harga sewa per hari" value="<?= $this->input->post('ftgl_akhir') ?>" onchange="tglPengembalianOnSet()">
                            <div class="invalid-feedback">
                                <?= form_error('ftgl_akhir') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <button type="submit" class="btn btn-primary  btn-block " style="margin-top: 1.9rem;">Filter Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if ($sewa != null) { ?>
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url('report/pdf/') . $tgl_awal . '/' . $tgl_akhir ?>"> Download PDF</a>
                    <table class="table table-sm table-striped table-bordered"">
                    <thead>
                        <tr class=" text-center">
                        <th>NO</th>
                        <th>NO SEWA</th>
                        <th>TGL TRANSAKSI</th>
                        <th>PELANGGAN</th>
                        <th>HARI SEWA</th>
                        <th>TOTAL BAYAR</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($sewa as $key) : ?>
                                <tr class="text-uppercase">
                                    <td><?= $no++ ?></td>
                                    <td><?= $key->no_sewa ?></td>
                                    <td><?= TanggalIndo($key->tgl_transaksi)  ?></td>
                                    <td><?= $key->nama_pelanggan ?></td>
                                    <td><?= $key->total_hari ?></td>
                                    <td><?= rupiah($key->total_bayar) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" class="text-right">TOTAL PENDAPATAN</th>
                                <th> <?= rupiah($total_bayar) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        <?php } else { ?>


            <div class="alert alert-light text-center">Belum ada data</div>
        <?php  } ?>


    </section>
</section>