<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{

    public function index()
    {
        $this->template->load('shared/store', 'katalog/index');
    }
}

/* End of file Katalog.php */
