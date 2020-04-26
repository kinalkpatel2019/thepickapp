<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Consumer_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Inventory');
        $this->load->model('User');
        $this->load->model('Market');
	}
	
	public function addtocart()
	{
        //
        $qty=$this->input->post('qty');
        $cart_items=array();
        foreach($qty['inventory'] as $key=>$value){
            //check the each options qty if it is available or not
            if($value!=0){
                $inventory=$this->Inventory->getInventoryById($key);
                if($inventory['availableqty'] >= $value){
                    //if available qty
                    $cart_items[]=array(
                        'id'      => $key,
                        'qty'     => $value,
                        'price'   => $inventory['price'],
                        'unit'   => $inventory['unit'],
                        'name'    => $inventory['product'],
                        'product_id'=>$inventory['product_id']
                    );
                }
            }

        }
        $this->cart->insert($cart_items);
        redirect('consumer/products');
    }
    public function index(){
        /*$cart_items=$this->cart->contents();
        foreach($cart_items as $key=>$item){
            echo $key;
            print_r($item);
        }*/
        $this->template_data=array(
			'main_content'=>'consumer/cart/index',
        );
        $this->load->view('template/consumer/index',$this->generateTemplateData());
    }
    public function updateCart(){
        $data=$this->input->post();
        $this->cart->update($data);
        redirect('consumer/cart');
    }
    public function checkout(){
        $vendorId=$this->User->getDefaultVendorID($this->consumer['id']);
        $marketId=$this->User->getDefaultMarketID($this->consumer['id']);
        $vendor=$this->User->getUserWithProfile(array('users.id'=>$vendorId));
        $market=$this->Market->getMarketById($marketId);
        $this->template_data=array(
            'main_content'=>'consumer/cart/checkout',
            'vendor'=>$vendor,
            'market'=>$market
        );
        $this->load->view('template/consumer/index',$this->generateTemplateData());
    }
}
