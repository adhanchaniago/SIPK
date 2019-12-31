<?php

class M_kemahasiswaan extends CI_Model{

  function get_dataByAkun($id){
    $this->db->where('id_akun',$id);
    return $this->db->get('kemahasiswaan');
  }
}
