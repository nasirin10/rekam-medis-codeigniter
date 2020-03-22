<?php

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_obat', 'obat');
    }

    public function index()
    {
        $data['obat'] = $this->obat->get();
        $data['stokin'] = $this->obat->get_stokin();
        $this->template->load('template/template', 'menu/obat', $data);
    }

    public function tambah()
    {
        $post = $this->input->post(null, true);

        if (isset($post['tobat'])) {
            $this->obat->tambah($post);
        } else {
            $this->obat->tambah_stokin($post);
        }

        if ($this->db->affected_rows() > 0) {
            redirect('obat');
        }
    }

    public function ubah()
    {
        $post = $this->input->post(null, true);
        $this->obat->ubah($post);

        if ($this->db->affected_rows() > 0) {
            redirect('obat');
        } else {
            redirect('obat');
        }
    }

    public function hapus($id)
    {
        $post = $this->input->post(null, true);
        if (isset($post['hobat'])) {
            $this->obat->hapus($id);
        } else {
            $this->obat->hapus_stokin($id);
        }

        if ($this->db->affected_rows() > 0) {
            redirect('obat');
        }
    }
}
