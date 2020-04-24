<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Consumer_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Inventory');
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
                    );
                }
            }

        }
        $this->cart->insert($cart_items);
        redirect('consumer/products');
    }
    public function index(){
        $this->template_data=array(
			'main_content'=>'consumer/cart/index',
        );
        $this->load->view('template/consumer/index',$this->generateTemplateData());
    }
}
