<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa extends CI_Controller
{

    public function index()
    {
        $this->template->load('shared/index', 'sewa/index');
    }
    public function riwayat()
    {
        $this->template->load('shared/store', 'sewa/riwayat');
    }
}

/* End of file Sewa.php */
