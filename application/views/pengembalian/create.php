<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Pengembalian</h1>
            </div>

        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group required">
                                <label class="control-label" for="fno_sewa">No Sewa</label>
                                <select class="form-control <?php echo form_error('fno_sewa') ? 'is-invalid' : '' ?>" id="fno_sewa" name="fno_sewa" onchange="tglPengembalianOnSet()" <?= $sewa == null ? 'disabled' : '' ?>>
                                    <option hidden value="" selected>Pilih No Sewa </option>
                                    <?php foreach ($sewa as $key) : ?>
                                        <option value="<?= $key->no_sewa ?>" data-tglakhir="<?= $key->tgl_akhir ?> " data-tglawal="<?= $key->tgl_awal ?> " data-harga="<?= $key->total_harga ?> " <?= $this->input->post('fno_sewa') == $key->no_sewa ? 'selected' : '' ?>><?= strtoupper($key->no_sewa) . ' - ' . strtoupper($key->nama_pelanggan) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('fno_sewa') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="ftgl_sewa" class="control-label">Tanggal Sewa</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control <?= form_error('ftgl_sewa') ? 'is-invalid' : '' ?>" id="ftgl_awal" name="ftgl_awal" placeholder="Tanggal awal" readonly>
                                    </div>
                                    <div class="col-md-2 text-center mt-1">Sampai</div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control <?= form_error('ftgl_sewa') ? 'is-invalid' : '' ?>" id="ftgl_akhir" name="ftgl_akhir" placeholder="Tanggal akhir" readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group required">
                                <label for="fharga" class="control-label">Total Harga</label>
                                <input type="text" class="form-control <?= form_error('fharga') ? 'is-invalid' : '' ?>" id="fharga" name="fharga" placeholder="Total harga sewa barang" readonly>
                            </div>
                            <div class="form-group required">
                                <label for="ftgl_pengembalian" class="control-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control <?= form_error('ftgl_pengembalian') ? 'is-invalid' : '' ?>" id="ftgl_pengembalian" name="ftgl_pengembalian" placeholder="Harga sewa per hari" value="<?= $this->input->post('ftgl_pengembalian') ?>" onchange="tglPengembalianOnSet()">
                                <div class="invalid-feedback">
                                    <?= form_error('ftgl_pengembalian') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="fterlambat" class="control-label">Total Keterlambatan (hari)</label>
                                <input type="text" class="form-control <?= form_error('fterlambat') ? 'is-invalid' : '' ?>" id="fterlambat" name="fterlambat" placeholder="Total keterlambatan " readonly>
                            </div>
                            <div class="form-group required">
                                <label for="fdenda_pengembalian" class="control-label">Denda Pengembelian</label>
                                <input type="hidden" class="form-control <?= form_error('fdenda_pengembalian') ? 'is-invalid' : '' ?>" id="fdenda_pengembalian" name="fdenda_pengembalian" placeholder="Denda pengembalian" min="0">

                                <input type="text" class="form-control <?= form_error('fdenda_pengembalian_display') ? 'is-invalid' : '' ?>" id="fdenda_pengembalian_display" name="fdenda_pengembalian_display" placeholder="Denda pengembalian" value="0" readonly>
                                <div class="invalid-feedback">
                                    <?= form_error('fdenda_pengembalian') ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="fnote_pengembalian" class="control-label">Catatan</label>
                                <textarea name="fnote_pengembalian" class="form-control <?= form_error('fnote_pengembalian') ? 'is-invalid' : '' ?> " id="fnote_pengembalian" placeholder="Catatan pengembalian"><?= $this->input->post('fnote_pengembalian'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('fnote_pengembalian') ?>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Tambah Pengembalian</button>
                                <a href="<?= base_url('pengembalian') ?>" class="btn btn-secondary float-left">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<script>
    const rupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "decimal",
            currency: "IDR"
        }).format(number);
    }

    function tglPengembalianOnSet() {
        tgl_akhir = $('#fno_sewa').find(':selected').data('tglakhir')
        tgl_awal = $('#fno_sewa').find(':selected').data('tglawal')
        harga = $('#fno_sewa').find(':selected').data('harga')

        var start_date = new Date(tgl_akhir);
        var end_date = new Date(document.getElementById('ftgl_pengembalian').value);
        var time_difference = end_date.getTime() - start_date.getTime();
        var days_difference = time_difference / (1000 * 3600 * 24);

        console.log(start_date)
        console.log(end_date)
        $('#fharga').val('Rp. ' + rupiah(harga))
        $('#ftgl_awal').val(tgl_awal)
        $('#ftgl_akhir').val(tgl_akhir)
        document.getElementById("ftgl_pengembalian").setAttribute("min", tgl_akhir);


        if (isNaN(days_difference)) {
            $('#fdenda_pengembalian_display').val(0)
            $('#fterlambat').val(0)
        } else {
            $('#fterlambat').val(Math.floor(days_difference) + " Hari")
            $('#fdenda_pengembalian').val(harga * Math.floor(days_difference) + 20000)
            $('#fdenda_pengembalian_display').val("Rp. " + rupiah(harga * Math.floor(days_difference) + 20000))

        }
        $('#fdenda_pengembalian').val(harga * Math.floor(days_difference) + 20000)
    }
</script>