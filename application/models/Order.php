<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getAllRedords($where=array(),$orderby="orders.id",$order="desc"){
        $this->db->select('orders.*,profiles.businessname,markets.title,users.firstname,users.lastname');
        $this->db->from('orders');
        $this->db->join('profiles','profiles.user_id=orders.vendor_id','left');
        $this->db->join('users','users.id=orders.user_id','left');
        $this->db->join('markets','markets.id=orders.market_id','left');
        $this->db->where($where);
        $this->db->order_by($orderby,$order);
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
    public function insert($data){
        $this->db->insert('orders',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function insertOrderDetails($data){
        $this->db->insert('orderdetails',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getOrderById($id){
        $this->db->select('orders.*,profiles.businessname,markets.title,users.firstname,users.lastname');
        $this->db->from('orders');
        $this->db->join('profiles','profiles.user_id=orders.vendor_id','left');
        $this->db->join('users','users.id=orders.user_id','left');
        $this->db->join('markets','markets.id=orders.market_id','left');
        $this->db->where('orders.id',$id);
        //$this->db->order_by($orderby,$order);
        $query=$this->db->get();
        $result=$query->row_array();
        return $result;
    }
    public function getOrderDetails($id){
        $this->db->where('order_id',$id);
        $query=$this->db->get('orderdetails');
        $result=$query->result_array();
        return $result;
    }
    public function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('orders',$data);
    }
}
