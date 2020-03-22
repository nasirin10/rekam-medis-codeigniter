<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('m_auth','login');    
    }
    
    public function index()
    {
        check_already_login();
        $this->load->view('pages/login');
    }

    public function login()
    {
        $post = $this->input->post(null, true);
        $data = $this->login->login($post);

        if ($this->db->affected_rows() > 0) {
            $query = $data->row();
            $sesi = array(
                'iduser' => $query->id_user,
                'level' => $query->id_level,
                'nama' => $query->nama_user
            );
            $this->session->set_userdata($sesi);
            redirect('dashboard');
        }else{
            redirect('auth');
        }
    }

    public function logout()
    {
        $sess = array('iduser','level','nama');
        $this->session->unset_userdata($sess);
        redirect('auth');
    }
}