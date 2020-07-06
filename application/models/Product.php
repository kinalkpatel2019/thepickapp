<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

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
        $query=$this->db->get('products');
        $result=$query->result_array();
        return $result;
    }
    public function getAllRedordsWithCategory($where=array(),$status=1,$orderby="products.id",$order="desc"){
        $this->db->select('products.*,categories.title as category');
        $this->db->from('products');
        $this->db->join('categories','categories.id=products.category_id','left');
        if($status!="all")
        {
            $where['products.status']=$status;
        }
        $this->db->where($where);
        $this->db->order_by($orderby,$order);
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }
    public function insert($data){
        $this->db->insert('products',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getRedordById($id){
        $this->db->where('id',$id);
        $query=$this->db->get('products');
        $result=$query->row_array();
        return $result;
    }
    public function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('products',$data);
    }
    public function getAllProductsByVendorID($vendor_id){
        $this->db->where('vendor_id',$vendor_id);
        $query=$this->db->get('products');
        $result=$query->result_array();
        return $result;
    }
    public function getAllVendorMarketProducts($vendor_id,$market_id){
        $this->db->where('vendor_id',$vendor_id);
        $where = "FIND_IN_SET('".$market_id."', markets)"; 
        $this->db->where($where);
        $query=$this->db->get('products');
        $result=$query->result_array();
        return $result;
    }
	 public function getAllVendorProducts($vendor_id){
        $this->db->where('vendor_id',$vendor_id);
        //$where = "FIND_IN_SET('".$market_id."', markets)"; 
        //$this->db->where($where);
        $query=$this->db->get('products');
        $result=$query->result_array();
        return $result;
    }
    public function insertImage($data){
        $this->db->insert('productimages',$data);
    }
    public function getImages($id){
        $this->db->where('product_id',$id);
        $this->db->order_by('sortorder',"asc");
        $query=$this->db->get('productimages');
        $result=$query->result_array();
        return $result;
    }
    public function removeImage($id){
        $this->db->where('id',$id);
        $this->db->delete('productimages');
    }
    public function updateImage($condition,$data){
        $this->db->where($condition);
        $this->db->update('productimages',$data);
    }
    /*public function getImages($id){
        $this->db->where('product_id',$id);
        $this->db->order_by('sortorder',"asc");
        $query=$this->db->get('productimages');
        $result=$query->result_array();
        return $result;
    }*/
    public function deleteProduct($id){
        $this->db->where('id',$id);
        $this->db->delete('products');
    }
}
