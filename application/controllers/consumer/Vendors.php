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
		$vendors=$this->Market->getAllApprovedVendorsByMarketID($market_id);
		$this->template_data=array(
			'main_content'=>'studio/consumer/vendors/index',
			'vendors'=>$vendors,
			'JSs'=>array('js/vendors.js')
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
	}
}
