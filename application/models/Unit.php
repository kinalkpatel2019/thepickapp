<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getAllRedords($where=array(),$status=1,$orderby="title",$order="asc"){
        if($status!="all")
        {
            $where['status']=$status;
        }
        $this->db->where($where);
        $this->db->order_by($orderby,$order);
        $query=$this->db->get('units');
        $result=$query->result_array();
        return $result;
    }    
    public function insert($data){
        $this->db->insert('units',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getUnitById($id){
        $this->db->where('id',$id);
        $query=$this->db->get('units');
        $result=$query->row_array();
        return $result;
    }
    public function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('units',$data);
    }
}
