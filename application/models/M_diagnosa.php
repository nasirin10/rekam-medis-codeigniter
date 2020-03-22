<?php

class M_diagnosa extends CI_Model
{
    public function get()
    {
        $this->db->join('pasien','pasien.id_pasien = diagnosa.id_pasien');
        $this->db->join('user','user.id_user = diagnosa.id_dokter');
        $this->db->join('obat','obat.id_obat = diagnosa.id_obat');
        $query = $this->db->get('diagnosa');
        return $query;
    }

    public function tambah($post)
    {
        $data = array(
            'id_pasien' => $post['idp'],
            'id_obat' => $post['obat'],
            'id_dokter' => $this->session->userdata('iduser'),
            'id_periksa' => $post['idperiksa'],
            'diagnosa' => $post['diagnosa'],
            'saran' => $post['saran'],
            'created' => date('ymd')
        );
        // $this->_update_status($post);
        $this->db->insert('diagnosa',$data);

    }

    public function hapus($id)
    {
        $this->db->where('id_diagnosa',$id);
        $this->db->delete('diagnosa');
    }

    public function cetak_diagnosa($id)
    {
        $this->db->join('pasien','pasien.id_pasien = diagnosa.id_pasien');
        $this->db->join('user','user.id_user = diagnosa.id_dokter');
        $this->db->join('obat','obat.id_obat = diagnosa.id_obat');
        $this->db->where('id_diagnosa',$id);
        $query = $this->db->get('diagnosa');
        return $query;
    }
}