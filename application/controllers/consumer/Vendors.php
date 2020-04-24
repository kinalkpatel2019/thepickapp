<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends Consumer_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Market');
		$this->load->model('User');
	}
	
	public function index()
	{
        //
        $market_id=$this->User->getDefaultMarketID($this->consumer['id']);
        $vendors=$this->Market->getAllVendorsByMarketID($market_id);
		$this->template_data=array(
			'main_content'=>'consumer/vendors/index',
			'vendors'=>$vendors
        );
        $this->load->view('template/consumer/index',$this->generateTemplateData());
	}
	public function setVendor($id){
		$updateData=array(
			'defaultvendor'=>$id
		);
		$this->User->updateProfile($updateData,$this->consumer['id']);
		redirect('consumer/products');
	}
}
