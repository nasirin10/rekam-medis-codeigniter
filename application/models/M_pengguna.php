<?php

class M_pengguna extends CI_Model
{
    public function get_all()
    {
        $query = $this->db->get('user');
        return $query;
    }
    public function get_admin()
    {
        $this->db->from('user');
        $this->db->where('id_level = 6');
        $query = $this->db->get();
        return $query;
    }
    public function get_kasir()
    {
        $this->db->from('user');
        $this->db->where('id_level = 7');
        $query = $this->db->get();
        return $query;
    }
    public function get_dokter()
    {
        $this->db->from('user');
        $this->db->where('id_level = 8');
        $query = $this->db->get();
        return $query;
    }

    private function _NIP()
    {
        $query = $this->db->query('SELECT MAX(RIGHT(NIP,3)) AS nonip FROM user');
        $a = "";
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $b = ((int) $data->nonip) + 1;
                $a = sprintf('%003s', $b);
            }
        } else {
            $a = '001';
        }

        $post = $this->input->post(null, true);
        if (isset($post['tadmin'])) {
            return "ADM" . $a;
        } elseif (isset($post['tkasir'])) {
            return "KAS" . $a;
        } elseif (isset($post['tdokter'])) {
            return "Dr" . $a;
        }
    }

    public function tambah($post)
    {
        if (isset($post['tkasir'])) {
            $data['id_level'] = 7;
        } elseif (isset($post['tadmin'])) {
            $data['id_level'] = 6;
        } elseif (isset($post['tdokter'])) {
            $data['id_level'] = 8;
        }

        $data['NIP'] = $this->_NIP();
        $data['nama_user'] = $post['nama'];
        $data['jenis_kelamin'] = $post['jk'];
        $data['notelp'] = $post['notelp'];
        $data['alamat'] = $post['alamat'];
        $data['created'] = date('ymd');

        $this->db->insert('user', $data);
    }

    public function ubah($post)
    {
        $data['nama_user'] = $post['nama'];
        $data['jenis_kelamin'] = $post['jk'];
        $data['notelp'] = $post['notelp'];
        $data['alamat'] = $post['alamat'];
        $data['updated'] = date('ymd');

        $this->db->where('id_user',$post['id']);
        $this->db->update('user',$data);

    }

    public function hapus($post)
    {
        $this->db->where('id_user', $post);
        $this->db->delete('user');
    }
}
