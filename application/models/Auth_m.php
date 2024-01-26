<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{

    private $_table = "auth";
    public $username;
    public $password;
    public $user_auth;
    public $level;
    public function rules()
    {
        return [
            [
                'field' => 'fusername',
                'label' => 'username',
                'rules' => 'required'
            ],
            [
                'field' => 'fpassword',
                'label' => 'password',
                'rules' => 'required'
            ],
        ];
    }

    public function add_auth($user_auth, $level)
    {
        $post = $this->input->post();
        $this->username = $post['fusername'];
        $this->password = md5($post['fpassword']);
        $this->user_auth = $user_auth;
        $this->level = $level;
        $this->db->insert($this->_table, $this);
    }

    public function login($post, $level)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('username', $post['fusername']);
        $this->db->where('password', md5($post['fpassword']));
        $this->db->where('level', $level);
        if ($level == 'pelanggan') {
            $this->db->where('isactive', 1);
            $this->db->join('pelanggan', 'pelanggan.user_auth = auth.user_auth', 'left');
        }
        if ($level == 'admin') {
            $this->db->join('admin', 'admin.user_auth = auth.user_auth', 'left');
        }
        $query = $this->db->get();
        return $query;
    }
}

/* End of file Auth_m.php */
