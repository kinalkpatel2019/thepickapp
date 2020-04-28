<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Consumer_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Inventory');
        $this->load->model('User');
        $this->load->model('Market');
        $this->load->model('Order');
	}
	public function index(){
        $orders=$this->Order->getAllRedords(array('orders.user_id'=>$this->consumer['id']));
        
        $this->template_data=array(
            'main_content'=>'consumer/orders/index',
            'orders'=>$orders
        );
        $this->load->view('template/consumer/index',$this->generateTemplateData());
    }
	public function placeOrder()
	{
        //
        $cart_items=$this->my_cart->contents();
        $canproceed=true;
        foreach($cart_items as $key=>$value){
            //check the each options qty if it is available or not
            if($value!=0){
                $inventory=$this->Inventory->getInventoryById($value['id']);
                if($inventory['availableqty'] < $value['qty'])
                {
                    $canproceed=false;
                    break;
                }
            }

        }
        if(!$canproceed)
            redirect('consumer/cart');
        //now we need to insert into the order 
        $vendorId=$this->User->getDefaultVendorID($this->consumer['id']);
        $marketId=$this->User->getDefaultMarketID($this->consumer['id']);

        //$coupons
        $coupon=$this->my_cart->coupon();
        $orderData=array(
            'user_id'=>$this->consumer['id'],
            'vendor_id'=>$vendorId,
            'market_id'=>$marketId,
            'total_items'=>$this->cart->total_items(),
            'status'=>'pending',
            'totalamount'=>$this->cart->format_number($this->cart->total()),
            'couponcode'=>$coupon['code'],
            'discount'=>$this->cart->format_number($coupon['discount']),
            'grandtotal'=>$this->cart->format_number($this->cart->final_total()),
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        );
        $order_id=$this->Order->insert($orderData);
        //add order details
        foreach($cart_items as $key=>$value){
            //check the each options qty if it is available or not
            $orderDetails=array(
                'order_id'=>$order_id,
                'itemname'=>$value['name'],
                'unit'=>$value['unit'],
                'qty'=>$value['qty'],
                'price'=>$this->cart->format_number($value['price']),
                'total'=>$this->cart->format_number($value['subtotal']),
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s')
            );
            $this->Order->insertOrderDetails($orderDetails);
            //decrease qty
            $this->Inventory->deductQty($value['id'],$value['qty']);
        }
        // cart clear 
        $this->my_cart->destroy();
        //place order here 
        redirect('consumer/orders/view/'.$order_id.'/?status=new');
    }
    public function view($id){
        $order=$this->Order->getOrderById($id);
        $order_details=$this->Order->getOrderDetails($id);
        $mode=$this->input->get('status');
        $this->template_data=array(
            'main_content'=>'consumer/orders/view',
            'order_details'=>$order_details,
            'order'=>$order,
            'mode'=>$mode
        );
        $this->load->view('template/consumer/index',$this->generateTemplateData());

    }
}
