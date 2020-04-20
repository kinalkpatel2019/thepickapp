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

}
