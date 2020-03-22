<?php

class Diagnosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_diagnosa', 'diagnosa');
        $this->load->model('M_periksa', 'periksa');
        $this->load->model('M_obat', 'obat');
        $this->load->library('pdf');
    }

    public function index()
    {
        $data['periksa'] = $this->periksa->get()->result();
        $data['diagnosa'] = $this->diagnosa->get()->result();
        $data['obat'] = $this->obat->get()->result();
        $this->template->load('template/template', 'menu/diagnosa', $data);
    }

    public function tambah()
    {
        $post = $this->input->post(null, true);
        $this->diagnosa->tambah($post);

        if ($this->db->affected_rows() > 0) 
        {
            $status['status'] = 'selesai';
            $this->db->where('id_periksa',$post['idperiksa']);
            $this->db->update('periksa',$status); 
            redirect('diagnosa');
        }
    }

    public function hapus($id)
    {
        $this->diagnosa->hapus($id);

        if ($this->db->affected_rows() > 0) {
            redirect('diagnosa');
        }
    }

    public function cetak_diagnosa($id)
    {
        $data['diagnosa'] = $this->diagnosa->cetak_diagnosa($id)->row();
        // $this->load->view('menu/cetak/cetak_diagnosa',$data);

        $this->pdf->setPaper('A4','landscape');
        $this->pdf->filename = 'Laporan diagnosa pasien.pdf';
        $this->pdf->load_view('menu/cetak/cetak_diagnosa',$data);
    }
}
