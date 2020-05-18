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
        /* manager query */
        $manager=$this->session->userdata('admin');
        if(!empty($manager) && $manager['accounttype']==2){
            $this->db->where_in('markets.id',explode(',',$manager['markets']));
        }
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
        $this->db->select('vendormarkets.*,markets.title');
        $this->db->join('markets','markets.id=vendormarkets.market_id');
        $this->db->where('vendormarkets.vendor_id',$vendor_id);
        $query=$this->db->get('vendormarkets');
        $result=$query->result_array();
        return $result;
    }
    public function removeMarkets($vendor_id,$market_id){
        $this->db->where('vendor_id',$vendor_id);
        $this->db->where('market_id',$market_id);
        $this->db->delete('vendormarkets');
    }
    public function insertMarket($data){
        $this->db->insert('vendormarkets',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getAllVendorsByMarketID($market_id){
        $sql="select 
            users.*,vendormarkets.vendor_id,vendormarkets.market_id,profiles.businessname,vendormarkets.isapprove,profiles.image
            from
                vendormarkets
            left join
                users on users.id=vendormarkets.vendor_id
            left join
                profiles on users.id=profiles.user_id
            where
                vendormarkets.market_id=$market_id
            order by
                -vendormarkets.sortorder desc
            ";
        $query=$this->db->query($sql);    
        /*$this->db->select('users.*,vendormarkets.vendor_id,vendormarkets.market_id,profiles.businessname,vendormarkets.isapprove,profiles.image');
        $this->db->join('users','users.id=vendormarkets.vendor_id','left');
        $this->db->join('profiles','users.id=profiles.user_id','left');
        $this->db->where('vendormarkets.market_id',$market_id);
        $this->db->order_by('-vendormarkets.sortorder desc');
        $query=$this->db->get('vendormarkets');*/
        $result=$query->result_array();
        return $result;
    }
    public function getMarketFee($market_id){
        $this->db->where('id',$market_id);
        $query=$this->db->get('markets');
        $result=$query->row_array();
        return $result['fee'];
    }
    public function getConsumerMarket($consumer_id){
        $this->db->select('markets.id,markets.title');
        $this->db->join('orders','orders.market_id=markets.id');
        $this->db->where('orders.user_id',$consumer_id);
        $this->db->group_by('markets.id');
        $query=$this->db->get('markets');
        $result=$query->result_array();
        return $result;
    }
    public function getVendorMarket($vendor_id){
        $this->db->select('markets.id,markets.title');
        $this->db->join('vendormarkets','vendormarkets.market_id=markets.id');
        $this->db->where('vendormarkets.vendor_id',$vendor_id);
        $query=$this->db->get('markets');
        $result=$query->result_array();
        return $result;
    }
    public function updateVendorMarketStatus($id,$status){
        $this->db->where('id',$id);
        $this->db->update('vendormarkets',array('status'=>$status));
    }
    public function updateManagerMarketStatus($market_id,$vendor_id,$status){
        $this->db->where('market_id',$market_id);
        $this->db->where('vendor_id',$vendor_id);
        $this->db->update('vendormarkets',array('isapprove'=>$status));
    }
    public function updateMarketSortOrder($market_id,$vendor_id,$order){
        $this->db->where('market_id',$market_id);
        $this->db->where('vendor_id',$vendor_id);
        $this->db->update('vendormarkets',array('sortorder'=>$order));

    }
}
