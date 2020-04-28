<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getAllRedords($where=array(),$status=1,$orderby="id",$order="desc"){
        if($status!="all")
        {
            $where['status']=$status;
        }
        $this->db->where($where);
        $this->db->order_by($orderby,$order);
        $query=$this->db->get('coupons');
        $result=$query->result_array();
        return $result;
    }
    public function insert($data){
        $this->db->insert('coupons',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('coupons',$data);
    }
    public function getCouponByCode($code,$vendor_id){
        $this->db->where('code',$code);
        $this->db->where('vendor_id',$vendor_id);
        $this->db->where('status',1);
        $query=$this->db->get('coupons');
        $result=$query->row_array();
        return $result;
    }
}
