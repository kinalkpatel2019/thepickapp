<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Vendor_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Inventory');
        $this->load->model('User');
        $this->load->model('Market');
        $this->load->model('Order');
	}
	public function index(){
        $orders=$this->Order->getAllRedords(array('orders.vendor_id'=>$this->vendor['id']));
        
        $this->template_data=array(
            'main_content'=>'vendor/orders/index',
            'orders'=>$orders
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());
    }
	/*public function placeOrder()
	{
        //
        $cart_items=$this->cart->contents();
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
        $orderData=array(
            'user_id'=>$this->consumer['id'],
            'vendor_id'=>$vendorId,
            'market_id'=>$marketId,
            'total_items'=>$this->cart->total_items(),
            'status'=>'pending',
            'totalamount'=>$this->cart->format_number($this->cart->total()),
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
        $this->cart->destroy();
        //place order here 
        redirect('consumer/orders/order/'.$order_id.'/?status=new');
    }*/
    public function view($id){
        $order=$this->Order->getOrderById($id);
        $order_details=$this->Order->getOrderDetails($id);
        $mode=$this->input->get('status');
        $this->template_data=array(
            'main_content'=>'vendor/orders/view',
            'order_details'=>$order_details,
            'order'=>$order,
            'mode'=>$mode
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());

    }
    public function changestatus(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $data=array(
            'status'=>$status,
            'updated_at'=>date('Y-m-d h:i:s')
        );
        $this->Order->update($data,$id);
        redirect('vendor/orders/view/'.$id);
    }
}
