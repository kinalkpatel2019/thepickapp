<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Model {

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
        $query=$this->db->get('inventories');
        $result=$query->result_array();
        return $result;
    }    
    public function insert($data){
        $this->db->insert('inventories',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getInventoryById($id){
        $this->db->select('inventories.*,products.title as product');
        $this->db->from('inventories');
        $this->db->join('products','products.id=inventories.product_id');
        $this->db->where('inventories.id',$id);
        $query=$this->db->get();
        $result=$query->row_array();
        return $result;
    }
    public function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('inventories',$data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('inventories');
    }
}
