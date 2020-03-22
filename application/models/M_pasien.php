<?php

class M_pasien extends CI_Model
{
    public function get()
    {
        $this->db->from('pasien');
        $query = $this->db->get();
        return $query;
    }

    private function _norm()
    {
        $query = $this->db->query('SELECT MAX(RIGHT(no_rm,3)) AS norm FROM pasien');
        $kd = '';
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $a = ((int) $data->norm) + 1;
                $kd = sprintf('%03s', $a);
            }
        } else {
            $kd = '001';
        }
        return "RM" . date('my') . $kd;
    }

    public function tambah($post)
    {
        $data = array(
            'no_rm' => $this->_norm(),
            'NIK' => $post['nik'],
            'nama_pasien' => $post['nama'],
            'jenis_kelamin' => $post['jk'],
            'gol_darah' => $post['goldarah'],
            'nama_ibu_kandung' => $post['namaibu'],
            'umur' => $post['umur'],
            'tgl_lahir' => $post['tgllahir'],
            'notelp' => $post['notelp'],
            'alamat' => $post['alamat'],
            'pekerjaan' => $post['pekerjaan'],
            'created' => date('ymd')
        );
        $this->db->insert('pasien', $data);
    }

    public function ubah($post)
    {
        $data = array(
            'no_rm' => $post['norm'],
            'NIK' => $post['nik'],
            'nama_pasien' => $post['nama'],
            'jenis_kelamin' => $post['jk'],
            'gol_darah' => $post['goldarah'],
            'nama_ibu_kandung' => $post['namaibu'],
            'umur' => $post['umur'],
            'tgl_lahir' => $post['tgllahir'],
            'notelp' => $post['notelp'],
            'alamat' => $post['alamat'],
            'pekerjaan' => $post['pekerjaan'],
            'updated' => date('ymd')
        );

        $this->db->where('id_pasien', $post['id']);
        $this->db->update('pasien', $data);
    }

    public function hapus($post)
    {
        $this->db->where('id_pasien', $post);
        $this->db->delete('pasien');
    }
}
