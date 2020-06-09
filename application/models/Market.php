<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->Model('Zipcode');
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
        $result=$query->result_array();
        return $result;
    }
    public function getAllApprovedVendorsByMarketID($market_id){
        $sql="select 
            users.*,vendormarkets.vendor_id,vendormarkets.market_id,profiles.businessname,vendormarkets.isapprove,vendormarkets.status,profiles.image
            from
                vendormarkets
            left join
                users on users.id=vendormarkets.vendor_id
            left join
                profiles on users.id=profiles.user_id
            where
                vendormarkets.market_id=$market_id
                and
                vendormarkets.isapprove=1
            order by
                -vendormarkets.sortorder desc
            ";
        $query=$this->db->query($sql);    
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
    public function getNearbyMarkets($zipcode){
        $result=array();
        $zip=$this->Zipcode->getZipcode($zipcode);
        
        if(empty($zip))
            return $this->getAllRedords();

        $lat=$zip['lat'];
        $lng=$zip['lng'];

        $sql="select
        markets.*,
        111.111 *
        DEGREES(ACOS(LEAST(1.0, COS(RADIANS(markets.lat))
             * COS(RADIANS($lat))
             * COS(RADIANS(markets.lng - $lng))
             + SIN(RADIANS(markets.lat))
             * SIN(RADIANS($lat))))) AS distance
        from
             markets
        order by
            -distance desc";
        $query=$this->db->query($sql);
        $result=$query->result_array();
        if(empty($result))
            return $this->getAllRedords();
        return $result;
    }
    function getMarketManagers($market_id){
        $this->db->where("FIND_IN_SET(".$market_id.",markets) >",0);
        $this->db->where('accounttype',2);
        $query=$this->db->get('adminusers');
        $result=$query->result_array();
        return $result;
    }
    function getMarketPopup($vendor_id,$market_id){
        $this->db->select('vendormarkets.vendor_id,vendormarkets.market_id,marketpopups.message,marketpopups.status,markets.title');
        $this->db->from('vendormarkets');
        $this->db->join('marketpopups','marketpopups.vendor_id=vendormarkets.vendor_id and marketpopups.market_id=vendormarkets.market_id','left');
        $this->db->join('markets','markets.id=vendormarkets.market_id','left');
        $this->db->where("vendormarkets.vendor_id",$vendor_id);
        $this->db->where("vendormarkets.market_id",$market_id);
        $query=$this->db->get();
        $result=$query->row_array();
        return $result;
    }
    function updatePopMessage($vendor_id,$market_id,$status,$message){
        //check if record is available or not
        $this->db->where("vendor_id",$vendor_id);
        $this->db->where("market_id",$market_id);
        $query=$this->db->get('marketpopups');
        $result=$query->row_array();
        if(!empty($result)){
            //update
            $data=array(
                'message'=>$message,
                'status'=>$status
            );
            $this->db->where("vendor_id",$vendor_id);
            $this->db->where("market_id",$market_id);
            $this->db->update('marketpopups',$data);
        }
        else{
            //insert
            $data=array(
                'vendor_id'=>$vendor_id,
                'market_id'=>$market_id,
                'message'=>$message,
                'status'=>$status
            );
            $this->db->insert('marketpopups',$data);
        }
    }
}
