<?php

class M_proposal extends CI_Model{

  function get_allProposal(){
    return $this->db->get('proposal');
  }

  function get_Jadwal(){
    $this->db->where('status', 'disetujui');
    $this->db->order_by('tanggal asc, waktu asc');
    return $this->db->get('proposal');
  }

  function get_proposalById($id){
    $this->db->where('id_proposal', $id);
    return $this->db->get('proposal');
  }

  function get_proposalByMhs($id){
    $this->db->where('id_mhs', $id);
    $this->db->order_by('tanggal asc, waktu asc');
    return $this->db->get('proposal');
  }

  function upload_proposal($data){
    $this->db->insert('proposal',$data);
  }

  function update_proposal($data,$id){
    $this->db->where('id_proposal',$id);
    $this->db->update('proposal',$data);
  }

  function hapus($id){
    $this->db->where('id_proposal',$id);
    $this->db->delete('proposal');
  }
}
