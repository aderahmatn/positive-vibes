<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Pelanggan_m', 'Auth_m']);
        $this->load->helper(['auth']);
    }


    public function login_admin()
    {
        check_admin_already_login();
        $auth = $this->Auth_m;
        $validation = $this->form_validation;
        $validation->set_rules($auth->rules());
        if ($validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $post = $this->input->post(null, TRUE);
            $query = $auth->login($post, 'admin');
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id_admin' => $row->id_admin,
                    'nama_admin' => $row->nama_admin,
                    'username' => $row->username,
                    'level' => $row->level,
                    'status' => 'login'
                );
                $this->session->set_userdata($params);
                redirect('dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'username / password salah');
                redirect('auth/login_admin', 'refresh');
            }
        }
    }
    public function register()
    {
        check_member_already_login();
        $filename = date('d/m/Y');
        $config['overwrite'] = false;
        $config['upload_path'] = './uploads/pelanggan/ktp';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = 'KTP-' . uniqid() . $filename;
        $config['max_size'] = 2048;

        $pelanggan = $this->Pelanggan_m;
        $auth = $this->Auth_m;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());
        if ($validation->run() == FALSE) {
            $this->template->load('shared/store', 'auth/register');
        } else {
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('flampiran')) {
                $file = $this->upload->data("file_name");
                $user_auth = uniqid();
                $pelanggan->add_pelanggan($user_auth, $file);
                $auth->add_auth($user_auth, 'pelanggan');
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Register Berhasil - Silahkan Log In');
                    redirect('', 'refresh');
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('auth/register', 'refresh');
            }
        }
    }
    public function login_member()
    {
        check_member_already_login();
        $auth = $this->Auth_m;
        $validation = $this->form_validation;
        $validation->set_rules($auth->rules());
        if ($validation->run() == FALSE) {
            $this->template->load('shared/store', 'auth/login_member');
        } else {
            $post = $this->input->post(null, TRUE);
            $query = $auth->login($post, 'pelanggan');
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id_pelanggan' => $row->id_pelanggan,
                    'nama_pelanggan' => $row->nama_pelanggan,
                    'username' => $row->username,
                    'level' => $row->level,
                    'status' => 'login'
                );
                $this->session->set_userdata($params);
                $this->session->set_flashdata('success', 'Selamat Datang Kembali!');
                redirect('', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'username / password salah');
                redirect('auth/login_member', 'refresh');
            }
        }
    }
    public function logout_member()
    {
        check_member_not_login();
        $params = array('id_pelanggan', 'nama_pelanggan', 'username', 'level', 'status');
        $this->session->unset_userdata($params);
        $this->session->set_flashdata('success', 'Anda berhasil log out');
        redirect('', 'refresh');
    }
    public function logout_admin()
    {
        // check_member_not_login();
        $params = array(
            'id_admin',
            'nama_admin',
            'username',
            'level',
            'status'
        );
        $this->session->unset_userdata($params);
        $this->session->set_flashdata('success', 'Anda berhasil log out');
        redirect('auth/login_admin', 'refresh');
    }
}

/* End of file Auth.php */
