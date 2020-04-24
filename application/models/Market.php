<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Model {

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
        $query=$this->db->get('markets');
        $result=$query->result_array();
        return $result;
    }    
    public function insert($data){
        $this->db->insert('markets',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getMarketById($id){
        $this->db->where('id',$id);
        $query=$this->db->get('markets');
        $result=$query->row_array();
        return $result;
    }
    public function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('markets',$data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('markets');
    }
    public function getVendorMarkets($vendor_id){
        $this->db->where('vendor_id',$vendor_id);
        $query=$this->db->get('vendormarkets');
        $result=$query->result_array();
        return $result;
    }
    public function removeMarkets($vendor_id){
        $this->db->where('vendor_id',$vendor_id);
        $this->db->delete('vendormarkets');
    }
    public function insertMarket($data){
        $this->db->insert('vendormarkets',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getAllVendorsByMarketID($market_id){
        $query="select * from users where status=1 and id in (select vendor_id from vendormarkets where status=1 and market_id=$market_id)";
        $query=$this->db->query($query);
        $result=$query->result_array();
        return $result;
    }
}
