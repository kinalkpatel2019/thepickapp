<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Businesstype extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function insert($data){
        $this->db->insert('businesstypes',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getAllRedords($where=array(),$status=1,$orderby="title",$order="asc"){
        if($status!="all")
        {
            $where['status']=$status;
        }
        $this->db->where($where);
        $this->db->order_by($orderby,$order);
        $query=$this->db->get('businesstypes');
        $result=$query->result_array();
        return $result;
    }

}
