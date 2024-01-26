<div class="row py-5">
    <div class="col-md-6">
        <span class="font-weight-normal h3">Positive Vibes</span>
        <?php if (!$this->session->userdata('id_pelanggan')) { ?>
            <h1 class="font-weight-bold display-4 mb-4">Partner terbaik untuk petualangan anda</h1>

        <?php } else { ?>
            <h1 class="font-weight-bold display-4 mb-4">Hallo, <?= ucwords($this->session->userdata('nama_pelanggan')) ?></h1>
        <?php } ?>
        <p class="lead">Jadikan setiap momen di alam terbuka berharga dengan alat outdoor terbaik dari kami, Mulailah petualangan Anda sekarang dan buat kenangan yang tak terlupakan bersama kami!</p>
        <hr class="my-4">
        <a href="<?= base_url('katalog') ?>" class="btn btn-lg bg-gradient-warning mr-3 text-bold">Jelajahi Sekarang</a>
        <?php if (!$this->session->userdata('id_pelanggan')) { ?>
            <a href="<?= base_url('auth/register') ?>" class="btn btn-lg btn-outline-secondary ">Daftar </a>
        <?php  } ?>
    </div>
    <div class="col-md-6">

        <img src="<?= base_url() . 'assets/images/hero.png' ?>" class="img-fluid" alt="Responsive image" width="100%">
    </div>
</div>