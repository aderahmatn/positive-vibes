<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ransel extends CI_Controller
{

    public function index()
    {
        $this->template->load('shared/store', 'ransel/index');
    }
}

/* End of file Ransel.php */
