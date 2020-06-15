<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Consumer_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Inventory');
        $this->load->model('User');
        $this->load->model('Market');
        $this->load->model('Coupon');
        $this->load->model('Product');
	}
	
	public function addtocart()
	{
        //
        $qty=$this->input->post('qty');
        $cart_items=array();
        $vendor_id=0;
        foreach($qty['inventory'] as $key=>$value){
            //check the each options qty if it is available or not
            if($value!=0){
                $inventory=$this->Inventory->getInventoryById($key);
                $product=$this->Product->getRedordById($inventory['product_id']);
                $vendor_id=$product['vendor_id'];
                $vendor_profile=$this->User->getProfile($vendor_id);
                if($inventory['availableqty'] >= $value){
                    //if available qty
                    $cart_items[]=array(
                        'id'      => $key,
                        'qty'     => $value,
                        'price'   => $inventory['price'],
                        'unit'   => $inventory['unit'],
                        'name'    => $inventory['product'],
                        'product_id'=>$inventory['product_id'],
                        'vendor_id'=>$vendor_id,
                        'tax'      => $product['tax'],
                        'is_comment'  => $product['is_comment'],
                        'comment'   => "",
                        'vendor'    => $vendor_profile['businessname']
                    );
                }
            }

        }
        $this->my_cart->insert($cart_items);
        redirect('consumer/products/index/'.$vendor_id);
    }
    public function index(){
        //set fee
        $this->my_cart->removefee();
        $consumer_fee=$this->Settings->getConsumerCommission();

        $cart_total=$this->my_cart->final_total();

        $fee=($cart_total*$consumer_fee)/100;

        $this->my_cart->setFee($fee);
        $this->template_data=array(
			'main_content'=>'studio/consumer/cart/index',
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
    }
    public function updateCart(){
        $data=$this->input->post();
        $this->my_cart->update($data);
        redirect('consumer/cart');
    }
    public function checkout(){
        $vendorId=$this->User->getDefaultVendorID($this->consumer['id']);
        $marketId=$this->User->getDefaultMarketID($this->consumer['id']);
        //get available timiming //get next two week timing 
        $marketTimings=$this->Market->getMarketSettings($marketId);
        $datedropdown=array();
        $todayday=date('N');
        for($i=$todayday;$i<=7;$i++){
            if($marketTimings[$i-1]["status"]==1 && !empty($marketTimings[$i-1]["slotinterval"]))
            {
                $openingtime=$marketTimings[$i-1]["openingtime"];
                $closingtime=$marketTimings[$i-1]["closingtime"];
                $interval=$marketTimings[$i-1]["slotinterval"];
                $endTime = strtotime($closingtime);
                $start=$openingtime;
                $next=null;
                $datedropdown[]=date('Y-m-d',strtotime("+ ".($i-1)." days"))." ".$start;
                

                while($next<$endTime){
                    $next = strtotime("+".$interval." minutes", strtotime($start));
                    $start=date('H:i:s', $next);
                    $datedropdown[]=date('Y-m-d',strtotime("+ ".($i-1)." days"))." ".$start;
                } 
              
            }
        }
        $timingdropdown=array();
        $vendor=$this->User->getUserWithProfile(array('users.id'=>$vendorId));
        $market=$this->Market->getMarketById($marketId);
        $this->template_data=array(
            'main_content'=>'studio/consumer/cart/checkout',
            'vendor'=>$vendor,
            'datedropdown'=>$datedropdown,
            'marketTimings'=>$marketTimings,
            'market'=>$market,
            'JSs'=>array('js/checkout.js')
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
    }
    public function applyCoupon(){
        $code=$this->input->post('code');
        if(empty($code))
            redirect('consumer/cart/checkout');
        $vendorId=$this->User->getDefaultVendorID($this->consumer['id']);
        $coupon=$this->Coupon->getCouponByCode($code,$vendorId);
        if(empty($coupon))
            redirect('consumer/cart/checkout');
        
        //get the cart total 
        $cart_total=$this->my_cart->total();
        $code="";
        $discount=0;
        if($coupon['discount_type']==1){
            //fixed
            $discount=$coupon['amount'];
            $code=$coupon['code'];
        }
        else{
            //percentage
            $discount=($cart_total*$coupon['amount'])/100;
            $code=$coupon['code'];
        }
        if($code!="" && $discount!=0)
        {
            $final=$cart_total-$discount;
            if($final > 0 )
            {
                //apply coupon
                $this->my_cart->addCoupon(array('code'=>$code,'discount'=>$discount));
            }
        }
        redirect('consumer/cart/checkout');
    }
    public function removeCoupon(){
        $this->my_cart->removeCoupon();
        redirect('consumer/cart/checkout');
        //$this->my_cart->addCoupon(array('code'=>'TEST','discount'=>5));
    }

}
