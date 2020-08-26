<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchs extends Consumer_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Search');
	}
	
	public function index(){
		$search=$this->input->post('search');
		$markets=$this->Search->getSearchMarkets($search);
		//echo "<pre>";print_r($markets);die;
		$vendors=$this->Search->getSearchVendors($search);
		$products=$this->Search->getSearchProducts($search);
		$this->template_data=array(
			'main_content'=>'studio/consumer/search/index',
			'markets'=>$markets,
			'vendors'=>$vendors,
			'products'=>$products,
			'JSs'=>array(
				'js/markets.js',
				'js/vendors.js',
				'js/product.js'
			)
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
	}
}
