<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getAllRedords($where=array(),$orderby="created_at",$order="desc"){
        $this->db->select('messages.*,adminusers.firstname,adminusers.lastname,adminusers.email');
        $this->db->from('messages');
        $this->db->join('adminusers','adminusers.id=messages.adminuser_id');
        $this->db->where($where);
        $this->db->order_by($orderby,$order);
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }    
    public function insert($data){
        $this->db->insert('messages',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getMessageById($id){
        $this->db->select('messages.*,adminusers.firstname,adminusers.lastname,adminusers.email');
        $this->db->from('messages');
        $this->db->join('adminusers','adminusers.id=messages.adminuser_id');
        $this->db->where('messages.id',$id);
        $query=$this->db->get();
        $result=$query->row_array();
        return $result;
    }
    public function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('messages',$data);
    }
}
