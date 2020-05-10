<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Consumer_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Product');
        $this->load->model('User');
        $this->load->model('Inventory');
	}
	
	public function index($vendor_id)
	{
        //
        //$vendor_id=$this->User->getDefaultVendorID($this->consumer['id']);
        $products=$this->Product->getAllProductsByVendorID($vendor_id);
		$this->template_data=array(
			'main_content'=>'studio/consumer/products/index',
            'products'=>$products,
            'JSs'=>array('js/product.js')
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
	}
	/*public function setVendor($id){
        $this->my_cart->destroy();
		$updateData=array(
			'defaultvendor'=>$id
		);
		$this->User->updateProfile($updateData,$this->consumer['id']);
		redirect('consumer/products');
    }*/
    public function view($id){
        $product=$this->Product->getAllRedordsWithCategory(array('products.id'=>$id));
        $inventories=$this->Inventory->getAllRedords(array('product_id'=>$id,'availableqty >'=>0));
        $this->template_data=array(
			'main_content'=>'studio/consumer/products/view',
            'product'=>$product[0],
            'inventories'=>$inventories
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
    }
}
