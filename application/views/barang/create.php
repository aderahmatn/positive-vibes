<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Barang</h1>
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
                                <label for="fnama_barang" class="control-label">Nama Barang</label>
                                <input type="text" class="form-control <?= form_error('fnama_barang') ? 'is-invalid' : '' ?>" id="fnama_barang" name="fnama_barang" placeholder="Nama barang" value="<?= $this->input->post('fnama_barang') ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fnama_barang') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="fharga_sewa" class="control-label">Harga Sewa</label>
                                <input type="text" class="form-control <?= form_error('fharga_sewa') ? 'is-invalid' : '' ?>" id="fharga_sewa" name="fharga_sewa" placeholder="Harga sewa per hari" value="<?= $this->input->post('fharga_sewa') ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fharga_sewa') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="fstok" class="control-label">Stok Barang</label>
                                <input type="number" class="form-control <?= form_error('fstok') ? 'is-invalid' : '' ?>" id="fstok" name="fstok" placeholder="Stok barang" value="<?= $this->input->post('fstok') ?>" min="0">
                                <div class="invalid-feedback">
                                    <?= form_error('fstok') ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label" for="fkategori">Kategori Barang</label>
                                <select class="form-control <?php echo form_error('fkategori') ? 'is-invalid' : '' ?>" id="fkategori" name="fkategori">
                                    <option hidden value="" selected>Pilih Kategori </option>
                                    <option value="tenda">TENDA</option>
                                    <option value="sepatu">SEPATU</option>
                                    <option value="ransel">RANSEL</option>
                                    <option value="alat-masak">ALAT MASAK</option>
                                    <option value="sleeping-bag">SLEEPING BAG</option>
                                    <option value="lain-lain">LAIN-LAIN</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('fkategori') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="fdeskripsi" class="control-label">Deskripsi Barang</label>
                                <textarea name="fdeskripsi" class="form-control <?= form_error('fdeskripsi') ? 'is-invalid' : '' ?> " id="fdeskripsi" placeholder="Deskripsi barang"><?= $this->input->post('fdeskripsi'); ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('fdeskripsi') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="flampiran" class="control-label">Gambar Barang</label>
                                <input type="file" class="pb-4 form-control <?= form_error('flampiran') ? 'is-invalid' : '' ?>" id="flampiran" name="flampiran">
                                <small id="flampiran" class="form-text text-muted">Format file .png .jpg dan file size
                                    maksimal 2Mb </small>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Tambah Barang</button>
                                <a href="<?= base_url('barang') ?>" class="btn btn-secondary float-left">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>