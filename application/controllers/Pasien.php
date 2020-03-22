<?php

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pasien','pasien');
    }

    public function index()
    {
        $data['pasien'] = $this->pasien->get()->result();
        $this->template->load('template/template','menu/pasien',$data);
    }

    public function tambah()
    {
        $post = $this->input->post(null, true);
        $this->pasien->tambah($post);

        if ($this->db->affected_rows() > 0) {
            redirect('pasien');
        }
    }

    public function ubah()
    {
        $post = $this->input->post(null, true);
        $this->pasien->ubah($post);

        if ($this->db->affected_rows() > 0) {
            redirect('pasien');
        }
    }

    public function hapus($post)
    {
        $this->pasien->hapus($post);
        if ($this->db->affected_rows() > 0) {
            redirect('pasien');
        }
    }
}