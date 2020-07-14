<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function getAllRedords($where=array(),$orderby="orders.id",$order="desc"){
		$this->db->select('orders.*,markets.title,users.firstname,users.lastname,users.email');
        $this->db->from('orders');
		//$this->db->join('users','users.id=orderdetails.vendor_id','left');
		$this->db->join('users','users.id=orders.vendor_id','left');
        $this->db->join('markets','markets.id=orders.market_id','left');
        $this->db->where($where);
        $this->db->order_by($orderby,$order);
        $query=$this->db->get();
        $result=$query->result_array();
		//echo "<pre>";print_r($result);die;
		return $result;
    }
	public function getRedordsByMarkets($marketid="",$orderby="orders.id",$order="desc"){
		$this->db->select('orders.*,markets.title,users.firstname,users.lastname,users.email');
        $this->db->from('orders');
		//$this->db->join('users','users.id=orderdetails.vendor_id','left');
		$this->db->join('users','users.id=orders.vendor_id','left');
        $this->db->join('markets','markets.id=orders.market_id','left');
        $this->db->where_in('orders.market_id',$marketid);
        $this->db->order_by($orderby,$order);
        $query=$this->db->get();
        $result=$query->result_array();
		return $result;
    }
    public function getAllVendorRedords($vendor_id,$orderby="orders.id",$order="desc",$market_id=""){
        $sql="select orders.id,orders.created_at,markets.title,
                (select sum(qty) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as items,
                (select sum(tax) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as tax,
                (select sum(total) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as total,
                (select sum(sitefee) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as sitefee,
                (select sum(vendoramount) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as vendoramount
            from orders
            join
            markets on markets.id=orders.market_id
            where 
            orders.id IN (select order_id from orderdetails where vendor_id=$vendor_id)
            ";
        if(!empty($market_id))
            $sql.=" and markets.id=".$market_id;
        $query=$this->db->query($sql);
        $result=$query->result_array();
        return $result;
    }
    public function insert($data){
        $this->db->insert('orders',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function insertOrderDetails($data){
        $this->db->insert('orderdetails',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getOrderById($id){
        $this->db->select('orders.*,markets.title,stripecharges.receipt_url,users.firstname,users.lastname,users.email,profiles.phonenumber,profiles.address1,profiles.address2,profiles.zipcode');
        $this->db->from('orders');
        $this->db->join('stripecharges','stripecharges.order_id=orders.id','left');
        $this->db->join('users','users.id=orders.user_id','left');
        $this->db->join('profiles','users.id=profiles.user_id','left');
        $this->db->join('markets','markets.id=orders.market_id','left');
        $this->db->where('orders.id',$id);
        //$this->db->order_by($orderby,$order);
        $query=$this->db->get();
        $result=$query->row_array();
        return $result;
    }
    public function getOrderDetails($id,$vendor_id=null){
        $this->db->where('order_id',$id);
        if(!empty($vendor_id))
            $this->db->where('vendor_id',$vendor_id);
        $query=$this->db->get('orderdetails');
        $result=$query->result_array();
        return $result;
    }
	public function getOrderDetailsByVendor($id){
		$this->db->select('users.*,vendor_id,sum(vendoramount) as total');
		$this->db->where('order_id',$id);
		$this->db->group_by('vendor_id');
		$this->db->join('users','users.id=orderdetails.vendor_id','left');
		$query=$this->db->get('orderdetails');	
        $result=$query->result_array();
        return $result;
    }
    public function update($data,$id){
        $this->db->where('id',$id);
        $this->db->update('orders',$data);
    }
    public function getOrderDetailsByID($id){
        $this->db->where('id',$id);
        $query=$this->db->get('orderdetails');
        $result=$query->row_array();
        return $result;
    }
    public function changeItemStatus($id,$status){
        $this->db->where('id',$id);
        $this->db->update('orderdetails',array('status'=>$status));
    }
    public function changeOrderStatus($id,$status){
        $this->db->where('id',$id);
        $this->db->update('orders',array('status'=>$status));
    }
    public function changePaymentStatus($id,$status){
        $this->db->where('id',$id);
        $this->db->update('orders',array('paymentstatus'=>$status));
    }
    public function getTotalStatus($id,$status=""){
        $this->db->select('count(*) total');
        $this->db->where('order_id',$id);
        if(!empty($status))
            $this->db->where('status',$status);
        $query=$this->db->get('orderdetails');
        $result=$query->row_array();
        return $result['total'];

    }
    public function getVendorDetailsByOrder($order_id){
        $this->db->select('orderdetails.vendor_id,stripeaccounts.stripe_user_id,sum(orderdetails.vendoramount) as vendoramount');
        $this->db->join('stripeaccounts','stripeaccounts.user_id=orderdetails.vendor_id','left');
        $this->db->where('orderdetails.order_id',$order_id);
        $this->db->group_by('orderdetails.vendor_id');
        $query=$this->db->get('orderdetails');
        $result=$query->result_array();
        return $result;
    }
    public function updatePickup($pickup,$id){
        $this->db->where('id',$id);
        $this->db->update('orders',array('pickup'=>$pickup));
        return true;
    }

}
