<?php

class M_obat extends CI_Model
{
    public function get()
    {
        // $this->db->join('stokin_obat','stokin_obat.id_obat = obat.id_obat');
        $query = $this->db->get('obat');
        return $query;
    }

    public function get_stokin()
    {
        $this->db->join('obat','obat.id_obat = stokin_obat.id_obat', 'left');
        $query = $this->db->get('stokin_obat');
        return $query;
    }

    public function tambah($post)
    {
        $data= array(
            'nama_obat' => $post['nama'],
            'quantity' => $post['qty'],
            'supplier' => $post['supplier'],
            'harga_supplier' => $post['hsupplier'],
            'harga_jual' => $post['hjual'],
            'created' => date('ymd')
        );
        $this->db->insert('obat',$data);
    }

    public function ubah($post)
    {
        $data= array(
            'nama_obat' => $post['nama'],
            'quantity' => $post['qty'],
            'supplier' => $post['supplier'],
            'harga_supplier' => $post['hsupplier'],
            'harga_jual' => $post['hjual'],
            'updated' => date('ymd')
        );
        $this->db->where('id_obat',$post['id']);
        $this->db->update('obat',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id_obat',$id);
        $this->db->delete('obat');
    }

    // STOK IN

    public function tambah_stokin($post)
    {
        $data = array(
            'id_obat' => $post['idobat'],
            'quantity_stokin' => $post['qty'],
            'supplier_stokin' => $post['supplier'],
            'harga_supplier_stokin' => $post['hsupplier'],
            'created' => date('ymd')
        );
        $this->db->insert('stokin_obat',$data);
    }
    
    public function hapus_stokin($id)
    {
        $this->db->where('id_stokin',$id);
        $this->db->delete('stokin_obat');
    }
}