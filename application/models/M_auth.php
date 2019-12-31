<?php

class M_auth extends CI_Model{

  function cek($where){
		return $this->db->get_where('akun',$where);
	}

  function get_data($table,$where){
    return $this->db->get_where($table,$where);
  }
}
