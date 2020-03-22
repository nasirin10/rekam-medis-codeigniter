<?php

class M_auth extends CI_Model
{
    public function get()
    {
        # code...
    }

    public function login($post)
    {
        $this->db->from('user');
        $this->db->where('nip',$post['nip']);
        // $this->db->where('password',$post['']);
        $query = $this->db->get();
        return $query;
    }
}