<?php

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengguna','pengguna');
    }

    public function kasir()
    {
        $data['kasir'] = $this->pengguna->get_kasir()->result();
        $this->template->load('template/template','menu/pengguna/kasir',$data);
    }

    public function admin()
    {
        $data['admin'] = $this->pengguna->get_admin()->result();
        $this->template->load('template/template','menu/pengguna/admin',$data);
    }

    public function dokter()
    {
        $data['dokter'] = $this->pengguna->get_dokter()->result();
        $this->template->load('template/template','menu/pengguna/dokter',$data);
    }

    public function tambah()
    {
        $post = $this->input->post(null, true);
        $this->pengguna->tambah($post);
        
        if ($this->db->affected_rows() > 0) {
            if (isset($post['tkasir'])) {
                redirect('pengguna/kasir');
            }elseif (isset($post['tadmin'])) {
                redirect('pengguna/admin');
            }else {
                redirect('pengguna/dokter');
            }
        }
    }

    public function ubah()
    {
        $post = $this->input->post(null, true);
        $this->pengguna->ubah($post);

        if ($this->db->affected_rows() > 0) {
            if (isset($post['ukasir'])) {
                redirect('pengguna/kasir');
            }elseif (isset($post['uadmin'])) {
                redirect('pengguna/admin');
            }elseif (isset($post['udokter'])) {
                redirect('pengguna/dokter');
            }
        }
    }

    public function hapus($post)
    {
        $data = $this->input->post(null, true);
        $this->pengguna->hapus($post);

        if ($this->db->affected_rows() > 0) {
            if (isset($data['hadmin'])) {
                redirect('pengguna/admin');
            }elseif (isset($data['hkasir'])) {
                redirect('pengguna/kasir');
            }elseif (isset($data['hdokter'])) {
                redirect('pengguna/dokter');
            }
        }
    }

}