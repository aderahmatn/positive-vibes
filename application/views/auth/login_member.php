<div class="row py-5">
    <div class="col-md-6">
        <h1 class="font-weight-bold display-5 mb-3">Log In <small class="h4 font-weight-light"> / Positive Vibes</small></h1>
        <div class="pr-5">
            <hr class="my-3 pr-5">
            <form role="form" method="POST" action="" autocomplete="off">

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
                <button type="submit" class="btn btn-lg bg-gradient-warning  mt-2 text-bold">Log In</button>
            </form>
            <hr class="mb-2 mt-4">
            <small class="text-muted">Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar Disini</a></small>
        </div>
    </div>
    <div class="col-md-6">
        <img src="<?= base_url() . 'assets/images/login.png' ?>" class="img-fluid" alt="Responsive image" width="100%">
    </div>
</div>