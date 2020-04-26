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
        $sql="select * from products where id in (select distinct(inventories.product_id) as ids 
            from inventories 
            join products on products.id=inventories.product_id
            where inventories.status=1 and products.vendor_id=$vendor_id and inventories.availableqty > 0)";
        $query=$this->db->query($sql);
        $result=$query->result_array();
        return $result;
    }
}
