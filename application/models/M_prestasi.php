<?php

class M_prestasi extends CI_Model{

  function get_allPrestasi(){
    return $this->db->get('prestasi');
  }

  function get_prestasiByMhs($id){
    $this->db->where('id_mhs', $id);
    return $this->db->get('prestasi');
  }

  function upload_prestasi($data){
    $this->db->insert('prestasi',$data);
  }

  function hapus($id){
    $this->db->where('id_prestasi',$id);
    $this->db->delete('prestasi');
  }
}
