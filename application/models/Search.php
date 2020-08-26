<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	public function getSearchMarkets($searchstring){
		$searchs=explode(" ",$searchstring);
		foreach($searchs as $search){
			$sql[] = "title LIKE '%$search%'";
		}
		$sqlquery="select * from markets WHERE ".implode(" OR ", $sql);
        $query=$this->db->query($sqlquery);    
        $result=$query->result_array();
        return $result;
	}
	public function getSearchVendors($searchstring){
		$searchs=explode(" ",$searchstring);
		foreach($searchs as $search){
			$sql[] = "users.firstname LIKE '%$search%' or users.lastname LIKE '%$search%'";
		}
		$sqlquery="select users.*,profiles.businessname,profiles.image 
		from users 
		left join
                profiles on profiles.user_id=users.id
				
		WHERE ".implode(" OR ", $sql) ." and accounttype=1";
        $query=$this->db->query($sqlquery);    
        $result=$query->result_array();
        return $result;
	}
	public function getSearchProducts($searchstring){
		$searchs=explode(" ",$searchstring);
		foreach($searchs as $search){
			$sql[] = "title LIKE '%$search%'";
		}
		$sqlquery="select * from products  WHERE ".implode(" OR ", $sql);
        $query=$this->db->query($sqlquery);    
        $result=$query->result_array();
        return $result;
	}
}
