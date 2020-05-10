<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminuser extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function insert($data){
        $this->db->insert('adminusers',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getUser($where){
        $this->db->where($where);
        $query=$this->db->get('adminusers');
        $result=$query->row_array();
        return $result;
    }
    public function getAllRecords($where){
        $this->db->where($where);
        $query=$this->db->get('adminusers');
        $result=$query->result_array();
        return $result;
    }
    public function getUserWithProfile($where){
        $this->db->select('adminusers.*,profiles.businesstype_id,profiles.businessname,profiles.address1,profiles.address2,profiles.phonenumber');
        $this->db->join('profiles','profiles.user_id=adminusers.id','left');
        $this->db->where($where);
        $query=$this->db->get('adminusers');
        $result=$query->row_array();
        return $result;
    }
    public function getProfile($user_id){
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('profiles');
        $result=$query->row_array();
        return $result;
    }
    public function insertProfile($data){
        $this->db->insert('profiles',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('adminusers',$data);
    }
    public function updateProfile($data,$user_id){
        $this->db->where('user_id',$user_id);
        $this->db->update('profiles',$data);
    }
    public function getDefaultMarketID($user_id){
        $this->db->select('defaultmarket');
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('profiles');
        $result=$query->row_array();
        return $result['defaultmarket'];
    }
    public function getDefaultVendorID($user_id){
        $this->db->select('defaultvendor');
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('profiles');
        $result=$query->row_array();
        return $result['defaultvendor'];
    }
   
}
