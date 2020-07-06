<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function insert($data){
        $this->db->insert('users',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getUser($where){
        $this->db->where($where);
        $query=$this->db->get('users');
        $result=$query->row_array();
        return $result;
    }
    public function getUserWithProfile($where){
        $this->db->select('users.*,profiles.businesstype_id,profiles.businessname,profiles.address1,profiles.address2,profiles.phonenumber,profiles.zipcode,profiles.image,profiles.link');
        $this->db->join('profiles','profiles.user_id=users.id','left');
        $this->db->where($where);
        $query=$this->db->get('users');
        $result=$query->row_array();
        return $result;
    }
    public function getUserAllWithProfile($where){
        $this->db->select('users.*,profiles.businesstype_id,profiles.businessname,profiles.address1,profiles.address2,profiles.phonenumber');
        $this->db->join('profiles','profiles.user_id=users.id','left');
        $this->db->where($where);
        $query=$this->db->get('users');
        $result=$query->result_array();
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
        $this->db->update('users',$data);
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
	public function getcustomer($vendorid){
		$this->db->select('orders.*,profiles.address1,profiles.address2,profiles.zipcode,profiles.phonenumber,users.firstname,users.lastname,users.email');
        $this->db->from('orders');
		$this->db->join('orderdetails','orderdetails.order_id=orders.id','left');
		$this->db->join('profiles','profiles.user_id=orders.user_id','left');
		$this->db->join('users','users.id=orders.user_id','left');
		
        $this->db->where('orderdetails.vendor_id',$vendorid);
		$this->db->group_by('orders.user_id'); 
        $query=$this->db->get();
		
        $result=$query->result_array();
		//echo "<pre>";print_r($result);die;
		return $result;
    }
}
