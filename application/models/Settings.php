<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getConsumerCommission(){
        $this->db->where('meta_key','CONSUMER_COMMISSION');
        $query=$this->db->get('settings');
        $result=$query->row_array();
        return $result['meta_value'];
    }
    public function updateValue($key,$value){
        $this->db->where('meta_key',$key);
        $this->db->update('settings',array('meta_value'=>$value));
    }
}