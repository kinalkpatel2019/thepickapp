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
        $market_id=$this->User->getDefaultMarketID($this->consumer['id']);
		$directvendorid=$this->session->userdata('vendorshop');
		//print_r($directvendorid);die;
		if(!empty($directvendorid)){
			//redirect('consumer/products/index/'.$directvendorid['vendorid']);
			$products=$this->Product->getAllVendorProducts($directvendorid['vendorid']);
		}else{
			$products=$this->Product->getAllVendorMarketProducts($vendor_id,$market_id);
		}
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
        $images=$this->Product->getImages($id);
        $this->template_data=array(
			'main_content'=>'studio/consumer/products/view',
            'product'=>$product[0],
            'inventories'=>$inventories,
            'images'=>$images,
            'CSs'=>array(
                'plugins/photoswipe/dist/photoswipe.css',
                'plugins/photoswipe/dist/default-skin/default-skin.css'
            ),
            'JSs'=>array(
                'plugins/photoswipe/dist/photoswipe-ui-default.min.js',
                'plugins/photoswipe/dist/photoswipe.min.js',
                'js/demo/page-gallery.demo.js'
            ),
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
    }
}
