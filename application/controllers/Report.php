<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_admin_not_login();
        $this->load->model(['Sewa_m', 'Pengembalian_m']);
        $this->load->helper('rupiah');

        include_once APPPATH . '/third_party/fpdf/fpdf.php';
    }


    public function index()
    {
        $sewa = $this->Sewa_m;
        $validation = $this->form_validation;
        $validation->set_rules($sewa->rules_report());
        $this->load->helper(['rupiah']);
        if ($validation->run() == FALSE) {
            $data['sewa'] = null;
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
            $data['total_bayar'] = null;
            $this->template->load('shared/index', 'report/index', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $tgl_awal = $post['ftgl_awal'];
            $tgl_akhir = $post['ftgl_akhir'];
            $data['tgl_awal'] = $post['ftgl_awal'];
            $data['tgl_akhir'] = $post['ftgl_akhir'];
            $data['sewa'] = $this->Sewa_m->get_by_range_tgl_transaksi($tgl_awal, $tgl_akhir);
            $data['total_bayar'] = $this->Sewa_m->get_total_bayar_by_range_tgl_transaksi($tgl_awal, $tgl_akhir);
            $this->template->load('shared/index', 'report/index', $data);
        }
    }
    public function pdf($tgl_awal, $tgl_akhir)
    {
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['sewa'] = $this->Sewa_m->get_by_range_tgl_transaksi($tgl_awal, $tgl_akhir);
        $data['total_bayar'] = $this->Sewa_m->get_total_bayar_by_range_tgl_transaksi($tgl_awal, $tgl_akhir);
        $this->load->view('report/pdf', $data);
    }
}

/* End of file Report.php */
