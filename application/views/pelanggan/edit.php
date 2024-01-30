<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Pelanggan</h1>
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
                                <label for="fnik_ktp" class="control-label">NIK KTP</label>
                                <input type="text" class="form-control <?= form_error('fnik_ktp') ? 'is-invalid' : '' ?>" id="fnik_ktp" name="fnik_ktp" placeholder="NIK KTP" value="<?= $pelanggan->nik_ktp ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fnik_ktp') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="fnama_pelanggan" class="control-label">Nama Lengkap</label>
                                <input type="text" class="form-control <?= form_error('fnama_pelanggan') ? 'is-invalid' : '' ?>" id="fnama_pelanggan" name="fnama_pelanggan" placeholder="Nama lengkap" value="<?= $pelanggan->nama_pelanggan ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('fnama_pelanggan') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="ftelepon_pelanggan" class="control-label">No. Handphone</label>
                                <input type="text" class="form-control <?= form_error('ftelepon_pelanggan') ? 'is-invalid' : '' ?>" id="ftelepon_pelanggan" name="ftelepon_pelanggan" placeholder="Nomor handphone" value="<?= $pelanggan->telepon_pelanggan ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('ftelepon_pelanggan') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="femail_pelanggan" class="control-label">Email</label>
                                <input type="email" class="form-control <?= form_error('femail_pelanggan') ? 'is-invalid' : '' ?>" id="femail_pelanggan" name="femail_pelanggan" placeholder="Email" value="<?= $pelanggan->email_pelanggan ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('femail_pelanggan') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="falamat_pelanggan" class="control-label">Alamat Lengkap</label>
                                <textarea name="falamat_pelanggan" class="form-control <?= form_error('falamat_pelanggan') ? 'is-invalid' : '' ?> " id="falamat_pelanggan" placeholder="Alamat lengkap"><?= $pelanggan->alamat_pelanggan ?></textarea>
                                <div class="invalid-feedback">
                                    <?= form_error('falamat_pelanggan') ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="falamat_pelanggan" class="control-label">KTP</label>
                                <img src="<?= base_url('uploads/pelanggan/ktp/') . $pelanggan->lampiran ?>" alt="foto ktp" class="img-thumbnail">
                            </div>
                            <div class="mb-4">
                                <a href="<?= base_url('pelanggan/ganti_ktp/') . $pelanggan->id_pelanggan ?>" class="btn btn-sm btn-default">Ganti foto KTP</a>
                                <a href="<?= base_url('auth/edit/') . $pelanggan->id_pelanggan ?>" class="btn btn-sm btn-default">Edit Username & Password</a>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Update Data</button>
                                <a href="<?= base_url('pelanggan') ?>" class="btn btn-secondary float-left">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>