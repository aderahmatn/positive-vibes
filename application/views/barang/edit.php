<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Data Barang</h1>
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
                        <form role="form" method="POST" action="" autocomplete="off">
                            <div class="form-group required">
                                <label for="fnama_barang" class="control-label">Nama Barang</label>
                                <input type="text" class="form-control <?= form_error('fnama_barang') ? 'is-invalid' : '' ?>" id="fnama_barang" name="fnama_barang" placeholder="Nama barang" value="<?= $barang->nama_barang ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fnama_barang') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="fharga_sewa" class="control-label">Harga Sewa</label>
                                <input type="text" class="form-control <?= form_error('fharga_sewa') ? 'is-invalid' : '' ?>" id="fharga_sewa" name="fharga_sewa" placeholder="Harga sewa per hari" value="<?= $barang->harga_sewa ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fharga_sewa') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="fstok" class="control-label">Stok Barang</label>
                                <input type="number" class="form-control <?= form_error('fstok') ? 'is-invalid' : '' ?>" id="fstok" name="fstok" placeholder="Stok barang" value="<?= $barang->stok ?>" min="0">
                                <div class="invalid-feedback">
                                    <?= form_error('fstok') ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label" for="fkategori">Kategori Barang</label>
                                <select class="form-control <?php echo form_error('fkategori') ? 'is-invalid' : '' ?>" id="fkategori" name="fkategori">
                                    <option hidden value="" selected>Pilih Kategori </option>
                                    <option value="tenda" <?= $barang->kategori == 'tenda' ? 'selected' : '' ?>>TENDA</option>
                                    <option value="sepatu" <?= $barang->kategori == 'sepatu' ? 'selected' : '' ?>>SEPATU</option>
                                    <option value="ransel" <?= $barang->kategori == 'ransel' ? 'selected' : '' ?>>RANSEL</option>
                                    <option value="alat-masak" <?= $barang->kategori == 'alat masak' ? 'selected' : '' ?>>ALAT MASAK</option>
                                    <option value="sleeping-bag" <?= $barang->kategori == 'sleeping bag' ? 'selected' : '' ?>>SLEEPING BAG</option>
                                    <option value="lain-lain" <?= $barang->kategori == 'lain lain' ? 'selected' : '' ?>>LAIN-LAIN</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('fkategori') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="fdeskripsi" class="control-label">Deskripsi Barang</label>
                                <textarea name="fdeskripsi" class="form-control <?= form_error('fdeskripsi') ? 'is-invalid' : '' ?> " id="fdeskripsi" placeholder="Deskripsi barang"><?= $barang->deskripsi ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('fdeskripsi') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="flampiran" class="control-label">Gambar Barang</label>
                                <img src="<?= base_url('uploads/barang/') . $barang->gambar ?>" alt="foto barang" class="img-thumbnail">
                            </div>
                            <div class="mb-4">
                                <a href="<?= base_url('barang/edit_gambar/') . $barang->id_barang ?>" class="btn btn-sm btn-default">Ganti foto barang</a>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Edit Barang</button>
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