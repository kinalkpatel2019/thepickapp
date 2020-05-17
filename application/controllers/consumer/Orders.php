<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Consumer_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Inventory');
        $this->load->model('User');
        $this->load->model('Market');
        $this->load->model('Order');
        $this->load->model('StripeModel');
	}
	public function index(){
        $selected_market=$this->input->get('market');
        $conditions=array(
                'orders.user_id'=>$this->consumer['id']
            );
        if(!empty($selected_market))
            $conditions['orders.market_id']=$selected_market;
        
        $orders=$this->Order->getAllRedords($conditions);
        $consumer_markets=$this->Market->getConsumerMarket($this->consumer['id']);

        
        $this->template_data=array(
            'main_content'=>'studio/consumer/orders/index',
            'orders'=>$orders,
            'consumer_markets'=>$consumer_markets,
            'selected_market'=>$selected_market,
            'CSSs'=>array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                'plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
                'plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'
                ),
            'JSs'=>array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net-buttons/js/dataTables.buttons.min.js',
                'plugins/datatables.net-buttons/js/buttons.colVis.min.js',
                'plugins/datatables.net-buttons/js/buttons.flash.min.js',
                'plugins/datatables.net-buttons/js/buttons.html5.min.js',
                'plugins/datatables.net-buttons/js/buttons.print.min.js',
                'plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
                'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
                'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
                'js/inventories.js',
                )
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
    }
	public function placeOrder()
	{
        

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

        //first get the customer id of stripe
        $stripeToken=$this->input->post('stripeToken');
        if(empty($stripeToken))
            redirect('consumer/cart/checkout');
        
        $customer_id=$this->StripeModel->getStripeCustomer($this->consumer['id']);
        if(empty($customer_id))
            redirect('consumer/cart/checkout');

        $payment_method=$this->StripeModel->setPaymentMethod($customer_id,$stripeToken);
        if(empty($payment_method))
            redirect('consumer/cart/checkout');

        //now we need to insert into the order 
        //$vendorId=$this->User->getDefaultVendorID($this->consumer['id']);
        $marketId=$this->User->getDefaultMarketID($this->consumer['id']);

        //$coupons
        $coupon=$this->my_cart->coupon();
        $orderData=array(
            'user_id'=>$this->consumer['id'],
            'market_id'=>$marketId,
            'total_items'=>$this->my_cart->total_items(),
            'status'=>'pending',
            'totalamount'=>$this->my_cart->format_number($this->my_cart->total()),
            'couponcode'=>$coupon['code'],
            'discount'=>$this->my_cart->format_number($coupon['discount']),
            'fee'=>$this->my_cart->format_number($this->my_cart->fee()),
            'grandtotal'=>$this->my_cart->format_number($this->my_cart->final_total()),
            'customer_id'=>$customer_id,
            'payment_method'=>$payment_method['id'],
            'last4'=>$payment_method['last4'],
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        );
        $order_id=$this->Order->insert($orderData);
        //add order details
        foreach($cart_items as $key=>$value){
            //check the each options qty if it is available or not
            $total=$this->cart->format_number($value['price'])*$value['qty'];
            $tax=$total*$this->cart->format_number($value['tax'])/100;
            $sub_total=$this->my_cart->format_number($value['subtotal']);
            $merket_fee=$this->Market->getMarketFee($marketId);
            $sitefee=$this->my_cart->format_number($sub_total*$merket_fee/100);
            $vendoramount=$sub_total-$sitefee;
            $orderDetails=array(
                'order_id'=>$order_id,
                'vendor_id'=>$value['vendor_id'],
                'itemname'=>$value['name'],
                'comment'=>$value['comment'],
                'unit'=>$value['unit'],
                'qty'=>$value['qty'],
                'price'=>$this->my_cart->format_number($value['price']),
                'tax'=>$this->my_cart->format_number($tax),
                'total'=>$sub_total,
                'sitefee'=>$sitefee,
                'vendoramount'=>$vendoramount,
                'status'=>"pending",
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
            'main_content'=>'studio/consumer/orders/view',
            'order_details'=>$order_details,
            'order'=>$order,
            'mode'=>$mode
        );
        if($order['paymentstatus']=="unpaid")
            $this->template_data['JSs']=array('js/checkout.js');
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());

    }
    public function changePaymentMethod(){
        $stripeToken=$this->input->post('stripeToken');
        $id=$this->input->post('id');

        if(empty($id))
            redirect('consumer/orders');

        if(empty($stripeToken))
            redirect('consumer/orders/view/'.$id);

        $customer_id=$this->StripeModel->getStripeCustomer($this->consumer['id']);
        if(empty($customer_id))
            redirect('consumer/orders/view/'.$id);

        $payment_method=$this->StripeModel->setPaymentMethod($customer_id,$stripeToken);
        if(empty($payment_method))
            redirect('consumer/orders/view/'.$id);
        
        $updatedata=array(
            'payment_method'=>$payment_method['id'],
            'last4'=>$payment_method['last4']
        );
        $this->Order->update($updatedata,$id);
        redirect('consumer/orders/view/'.$id);
    }
}
