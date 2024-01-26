<div class="row py-5">
    <div class="col-md-6">
        <h1 class="font-weight-bold display-5 mb-3">Register <small class="h4 font-weight-light"> / Positive Vibes</small></h1>
        <div class="pr-5">
            <hr class="my-3 pr-5">
            <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group required">
                    <label for="fnik_ktp" class="control-label">NIK KTP</label>
                    <input type="text" class="form-control <?= form_error('fnik_ktp') ? 'is-invalid' : '' ?>" id="fnik_ktp" name="fnik_ktp" placeholder="NIK KTP" value="<?= $this->input->post('fnik_ktp'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('fnik_ktp') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="fnama_pelanggan" class="control-label">Nama Lengkap</label>
                    <input type="text" class="form-control <?= form_error('fnama_pelanggan') ? 'is-invalid' : '' ?>" id="fnama_pelanggan" name="fnama_pelanggan" placeholder="Nama lengkap" value="<?= $this->input->post('fnama_pelanggan'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('fnama_pelanggan') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="ftelepon_pelanggan" class="control-label">No. Handphone</label>
                    <input type="text" class="form-control <?= form_error('ftelepon_pelanggan') ? 'is-invalid' : '' ?>" id="ftelepon_pelanggan" name="ftelepon_pelanggan" placeholder="Nomor handphone" value="<?= $this->input->post('ftelepon_pelanggan'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('ftelepon_pelanggan') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="femail_pelanggan" class="control-label">Email</label>
                    <input type="email" class="form-control <?= form_error('femail_pelanggan') ? 'is-invalid' : '' ?>" id="femail_pelanggan" name="femail_pelanggan" placeholder="Email" value="<?= $this->input->post('femail_pelanggan'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('femail_pelanggan') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="fusername" class="control-label">Username</label>
                    <input type="text" class="form-control <?= form_error('fusername') ? 'is-invalid' : '' ?>" id="fusername" name="fusername" placeholder="Username" value="<?= $this->input->post('fusername'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('fusername') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="fpassword" class="control-label">Password</label>
                    <input type="password" class="form-control <?= form_error('fpassword') ? 'is-invalid' : '' ?>" id="fpassword" name="fpassword" placeholder="Password" value="<?= $this->input->post('fpassword'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('fpassword') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="falamat_pelanggan" class="control-label">Alamat Lengkap</label>
                    <textarea name="falamat_pelanggan" class="form-control <?= form_error('falamat_pelanggan') ? 'is-invalid' : '' ?> " id="falamat_pelanggan" placeholder="Alamat lengkap"><?= $this->input->post('falamat_pelanggan'); ?></textarea>
                    <div class="invalid-feedback">
                        <?= form_error('falamat_pelanggan') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label for="flampiran" class="control-label">Foto KTP</label>
                    <input type="file" class="pb-4 form-control <?= form_error('flampiran') ? 'is-invalid' : '' ?>" id="flampiran" name="flampiran">
                    <small id="flampiran" class="form-text text-muted">Format file .png .jpg dan file size
                        maksimal 2Mb </small>
                </div>
                <button type="submit" class="btn btn-lg bg-gradient-warning  mt-2 text-bold">Daftar Sekarang</button>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <img src="<?= base_url() . 'assets/images/register.png' ?>" class="img-fluid" alt="Responsive image" width="100%">
    </div>
</div>