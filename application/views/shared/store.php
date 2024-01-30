<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url() . 'assets/images/favicon.svg' ?>" type="image/jpeg">

    <title>Positive Vibes </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/fontawesome-free/css/all.min.css' ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css' ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css' ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/jqvmap/jqvmap.min.css' ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/adminlte.min.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/custom.css' ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css' ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/summernote/summernote-bs4.min.css' ?>">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/sweetalert2/dark.css' ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/toastr/toastr.min.css' ?>">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" />

    <!-- jQuery -->
    <script src="<?= base_url() . 'assets/plugins/jquery/jquery.min.js' ?>"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url() ?>" class="navbar-brand">
                    <i class="fas fa-campground"></i>
                    <span class="brand-text font-weight-light">Positive Vibes</span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url() . "home" ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() . "katalog" ?>" class="nav-link">Katalog</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('katalog/kategori/tenda') ?>" class="dropdown-item">Tenda </a></li>
                                <li><a href="<?= base_url('katalog/kategori/ransel') ?>" class="dropdown-item">Ransel</a></li>
                                <li><a href="<?= base_url('katalog/kategori/sepatu') ?>" class="dropdown-item">Sepatu</a></li>
                                <li><a href="<?= base_url('katalog/kategori/alat-masak') ?>" class="dropdown-item">Alat Masak</a></li>
                                <li><a href="<?= base_url('katalog/kategori/sleeping-bag') ?>" class="dropdown-item">Sleeping Bag</a></li>
                                <li><a href="<?= base_url('katalog/kategori/lain-lain') ?>" class="dropdown-item">Lain-lain</a></li>


                            </ul>
                        </li>
                    </ul>
                </div>

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <?php if ($this->session->userdata('level') == 'pelanggan') { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?= base_url() . 'ransel' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backpack2" viewBox="0 0 16 16">
                                    <path d="M4.04 7.43a4 4 0 0 1 7.92 0 .5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14" />
                                    <path fill-rule="evenodd" d="M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z" />
                                    <path d="M6 2.341V2a2 2 0 1 1 4 0v.341c2.33.824 4 3.047 4 5.659v1.191l1.17.585a1.5 1.5 0 0 1 .83 1.342V13.5a1.5 1.5 0 0 1-1.5 1.5h-1c-.456.607-1.182 1-2 1h-7a2.5 2.5 0 0 1-2-1h-1A1.5 1.5 0 0 1 0 13.5v-2.382a1.5 1.5 0 0 1 .83-1.342L2 9.191V8a6 6 0 0 1 4-5.659M7 2v.083a6 6 0 0 1 2 0V2a1 1 0 0 0-2 0M3 13.5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5V8A5 5 0 0 0 3 8zm-1-3.19-.724.362a.5.5 0 0 0-.276.447V13.5a.5.5 0 0 0 .5.5H2zm12 0V14h.5a.5.5 0 0 0 .5-.5v-2.382a.5.5 0 0 0-.276-.447L14 10.309Z" />
                                </svg>
                                <span class="badge badge-warning navbar-badge badge_pill"><?= total_ransel($this->session->userdata('id_pelanggan')) ?></span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <?= ucwords($this->session->userdata('nama_pelanggan'))  ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-header"><?= ucwords($this->session->userdata('nama_pelanggan'))  ?></span>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('sewa/riwayat') ?>" class="dropdown-item">
                                    <i class="fas fa-file mr-2"></i> Riwayat Pemesanan
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('auth/logout_member') ?>" class="dropdown-item dropdown-footer">Log Out</a>
                            </div>
                        </li>
                    <?php } else { ?>
                        <a href="<?= base_url('auth/login_member') ?>" class="btn btn-warning">Log In</a>
                    <?php } ?>
                </ul>
            </div>
        </nav>


        <div class="content-wrapper">
            <div class="container">
                <?= $contents ?>
            </div>
        </div>


        <aside class="control-sidebar control-sidebar-dark">

        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2024 <a href="<?= base_url() ?>">Positive Vibes</a>.</strong> All rights reserved.
        </footer>
    </div>


    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url() . 'assets/plugins/jquery-ui/jquery-ui.min.js' ?>"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url() . 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js' ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() . 'assets/plugins/chart.js/Chart.min.js' ?>"></script>
    <!-- Sparkline -->
    <script src="<?= base_url() . 'assets/plugins/sparklines/sparkline.js' ?>"></script>
    <!-- JQVMap -->
    <script src="<?= base_url() . 'assets/plugins/jqvmap/jquery.vmap.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/jqvmap/maps/jquery.vmap.usa.js' ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url() . 'assets/plugins/jquery-knob/jquery.knob.min.js' ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url() . 'assets/plugins/moment/moment.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() . 'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js' ?>"></script>
    <!-- Summernotassets/e -->
    <script src="<?= base_url() . 'assets/plugins/summernote/summernote-bs4.min.js' ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() . 'assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() . 'assets/dist/js/adminlte.js' ?>"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url() . 'assets/plugins/toastr/toastr.min.js' ?>"></script>
    <script src="<?= base_url() . '/assets/dist/js/datatablesConfig.js' ?>"></script>
    <script src="<?= base_url() . '/assets/dist/js/goa.js' ?>"></script>
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>



</body>

</html>
<script>
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000
        });
        <?php if ($this->session->flashdata('success')) { ?> Toast.fire({
                icon: 'success',
                title: '<?= $this->session->flashdata('success'); ?>'
            });
        <?php } else if ($this->session->flashdata('error')) { ?> Toast.fire({
                icon: 'error',
                title: '<?= $this->session->flashdata('error'); ?>'
            });
        <?php } else if ($this->session->flashdata('warning')) { ?> Toast.fire({
                icon: 'warning',
                title: '<?= $this->session->flashdata('warning'); ?>'
            });
        <?php } else if ($this->session->flashdata('info')) { ?> Toast.fire({
                icon: 'info',
                title: '<?= $this->session->flashdata('info'); ?>'
            });
        <?php } ?>
    });
</script>