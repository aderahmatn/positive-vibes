<div class="row py-5 d-flex flex-row-reverse">
    <div class="col-md-6">
        <img src="<?= base_url() . 'assets/images/ransel2.png' ?>" class="img-fluid" alt="Responsive image" width="100%">
    </div>
    <div class="col-md-6">
        <h1 class="font-weight-bold display-5 mb-3">Ransel Anda <small class="h4 font-weight-light"> / Positive Vibes</small></h1>
        <div class="pr-lg-5 ">
            <hr class="my-3 pr-5">
            <?php foreach ($ransel as $key) : ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?= base_url('uploads/barang/') . $key->gambar ?>" class="" height="70px">
                            </div>
                            <div class="col-md-9">
                                <div class=" d-flex justify-content-between">
                                    <div>

                                        <span class="text-bold">
                                            <?= $key->nama_barang ?>
                                        </span>
                                        <div class=" d-flex  ">
                                            <p class="card-text text-sm text-muted">
                                                <i class="fas fa-tags fa-xs"></i> <?= ucwords($key->kategori)  ?>
                                            </p>
                                            <a href="#" onclick="deleteConfirm('<?= base_url() . 'ransel/delete/' . $key->id_ransel ?>')" class="btn btn-xs btn-default float-left ml-2 mb-3">Hapus Barang </a>
                                        </div>
                                    </div>
                                    <div>

                                        <p class="card-text text-muted my-0">
                                            <small>Harga Sewa</small>
                                        </p>
                                        <p class="card-text text-bold my-0">
                                            <?= rupiah($key->harga_sewa) ?> <small>/hari</small>
                                        </p>

                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach ?>
            <hr class="my-3 pr-5">
            <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tanggal Penyewaan</label>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group required">
                                <input type="date" class="form-control <?= form_error('date1') ? 'is-invalid' : '' ?>" id="date1" name="date1" placeholder="Stok barang" value="<?= $this->input->post('date1') ?>" onchange="getDays()">
                                <div class="invalid-feedback">
                                    <?= form_error('date1') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center align-middle">Sampai</div>
                        <div class="col-md-5">
                            <div class="form-group required">
                                <input type="date" class="form-control <?= form_error('date2') ? 'is-invalid' : '' ?>" id="date2" name="date2" placeholder="Stok barang" value="<?= $this->input->post('date2') ?>" onchange="getDays()">
                                <div class="invalid-feedback">
                                    <?= form_error('date2') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-3 pr-5">
                <div class=" d-flex justify-content-between">
                    <span class="text-bold h5">
                        Total Harga Sewa
                    </span>
                    <p class="card-text float-left text-bold h5">
                        <?= rupiah($total_harga) ?>
                    </p>
                </div>
                <div class=" d-flex justify-content-between">
                    <span class="text-bold h5">
                        Total Hari Sewa
                    </span>
                    <p class="card-text float-left text-bold h5">
                        <span id="selisih">0</span> Hari
                    </p>
                </div>
                <div class=" d-flex justify-content-between">
                    <span class="text-bold h5">
                        Total Bayar
                    </span>
                    <p class="card-text float-left text-bold h5">
                        Rp. <span id="total"><?= rupiah_no_rp($total_harga) ?></span>
                    </p>
                </div>
                <hr class="my-3 pr-5">

        </div>

        <input type="hidden" id="total_harga" value="<?= $total_harga ?>" name="ftotal_harga">
        <input type="hidden" id="total_hari" name="ftotal_hari">
        <input type="hidden" id="total_bayar" name="ftotal_bayar">
        <button type="submit" class="btn btn-lg bg-gradient-warning  mt-2 text-bold">Pesan Sekarang</button>
        </form>
    </div>
</div>
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
                        <span>Data barang akan dihapus pada ransel anda.</span>
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
<script>
    const rupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "decimal",
            currency: "IDR"
        }).format(number);
    }

    function getDays() {

        var start_date = new Date(document.getElementById('date1').value);
        var end_date = new Date(document.getElementById('date2').value);
        var time_difference = end_date.getTime() - start_date.getTime();
        var days_difference = time_difference / (1000 * 3600 * 24);

        // jika hasil NaN
        if (isNaN(days_difference)) {
            document.getElementById('selisih').innerHTML = 0;
            document.getElementById("date1").setAttribute("max", document.getElementById('date2').value);
            document.getElementById("date2").setAttribute("min", document.getElementById('date1').value);
        } else {
            var total_bayar = <?= $total_harga ?> * days_difference;
            document.getElementById("date1").setAttribute("max", document.getElementById('date2').value);
            document.getElementById("date2").setAttribute("min", document.getElementById('date1').value);
            document.getElementById('total_bayar').value = total_bayar
            document.getElementById('total_hari').value = days_difference;
            document.getElementById('selisih').innerHTML = days_difference;
            document.getElementById('total').innerHTML = rupiah(total_bayar);
        }
    }

    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>