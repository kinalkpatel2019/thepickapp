<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Model {

    public function getVendorWeekEarning($vendor_id,$currentWeek,$currentYear){
        $start=$this->week_start_date($currentWeek,$currentYear);
        $end=date('Y-m-d',strtotime("+6 days",strtotime($start)));
        $this->db->select("vendoramount");
        $this->db->where('vendor_id',$vendor_id);
        $this->db->where('created_at >=',$start." 00:00:00");
        $this->db->where('created_at <=',$end." 23:59:59");
        $this->db->where('vendoramount IS NOT NULL');
        $query=$this->db->get('orderdetails');
        $result=$query->result_array();
        return $result;
    }
    public function week_start_date($week, $year, $format = 'Y-m-d', $date = FALSE) {
   
        if ($date) {
            $week = date("W", strtotime($date));
            $year = date("o", strtotime($date));
        }
    
        $week = sprintf("%02s", $week);
    
        $desiredMonday = date($format, strtotime("$year-W$week-1"));
    
        return $desiredMonday;
    }
    public function getOrders($vendor_id,$market_id="",$itemname="",$fromdate="",$todate=""){
        $orderdetailsqry="";
        if(!empty($itemname))
            $orderdetailsqry.=" and orderdetails.itemname='".$itemname."'";
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
            orders.id IN (select order_id from orderdetails where vendor_id=$vendor_id $orderdetailsqry)
            ";
        
        if(!empty($market_id))
            $sql.=" and markets.id=".$market_id;

        
        if(!empty($fromdate))
            $sql.=" and orders.created_at >= '".$fromdate." 00:00:00'";
        else
            $sql.=" and orders.created_at >= '".date('Y-m-d')." 00:00:00'";
        
        if(!empty($todate))
            $sql.=" and orders.created_at >= '".$todate." 23:59:59'";
        else
            $sql.=" and orders.created_at >= '".date('Y-m-d')." 23:59:59'";

        if(!empty($market_id))
            $sql.=" and markets.id=".$market_id;

        $query=$this->db->query($sql);
        $result=$query->result_array();
        return $result;
    }
	public function getVendorReports($vendor_id,$orderby="orders.id",$order="desc"){
        $sql="select orders.id,orders.created_at,
                (select sum(qty) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as items,
                (select sum(tax) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as tax,
                (select sum(total) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as total,
                (select sum(sitefee) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as sitefee,
                (select sum(vendoramount) from orderdetails where orderdetails.order_id=orders.id and orderdetails.vendor_id=$vendor_id) as vendoramount
            from orders
            where 
            orders.id IN (select order_id from orderdetails where vendor_id=$vendor_id)
            ";
       
        $query=$this->db->query($sql);
        $result=$query->result_array();
        return $result;
    }
	public function getcategories($where=array(),$status=1,$orderby="title",$order="asc"){
        if($status!="all")
        {
            $where['status']=$status;
        }
        $this->db->where($where);
        $this->db->order_by($orderby,$order);
        $query=$this->db->get('categories');
        $result=$query->result_array();
        return $result;
    }    
}