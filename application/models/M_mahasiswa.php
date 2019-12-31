<?php

class M_mahasiswa extends CI_Model{

  function get_dataByAkun($key){
    $this->db->where('id_akun',$key);
    return $this->db->get('mahasiswa');
  }

  function get_MhsByNama($key){
    $this->db->where('nama', '%'.$key.'%');
    return $this->db->get('mahasiswa');
  }

  function get_MhsByNim($key){
    $this->db->where('nim', '%'.$key.'%');
    return $this->db->get('mahasiswa');
  }
  function get_MhsById($key){
    $this->db->where('id_mhs', $key);
    return $this->db->get('mahasiswa');
  }

  function search_mahasiswa($key){
    $this->db->like('nim',$key);
    $this->db->or_like('nama',$key);
    $this->db->or_like('alamat',$key);
    $this->db->or_like('email',$key);

    return $this->db->get('mahasiswa');

  }
}
