<?php

class M_periksa extends CI_Model
{
    public function get()
    {
        $this->db->join('pasien','pasien.id_pasien = periksa.id_pasien');
        $this->db->order_by('id_periksa','desc');
        $query = $this->db->get('periksa');
        return $query;
    }

    private function _antri()
    {
        $query = $this->db->query('SELECT MAX(RIGHT(no_antri,3)) AS antri FROM periksa');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $b = ((int) $data->antri) + 1;
                $a = sprintf($b);
            }
        } 
        return $a;
    }

    public function tambah($post)
    {
        $data = array(
            'no_antri' => $this->_antri(),
            'id_pasien' => $post['idp'],
            'id_kasir' => $this->session->userdata('level'),
            'keluhan' => $post['keluhan'],
            'tensi_darah' => $post['tensi'],
            'created' => date('ymd')
        );

        $this->db->insert('periksa',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id_periksa',$id);
        $this->db->delete('periksa');
    } 

    public function cetak_noantri($id)
    {
        $this->db->join('pasien','pasien.id_pasien = periksa.id_pasien');
        $this->db->where('id_periksa',$id);
        $query = $this->db->get('periksa');
        return $query;
    }
}