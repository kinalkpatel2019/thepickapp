<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Markets extends Consumer_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Market');
		$this->load->model('User');
	}
	
	public function index()
	{
		//$markets=$this->Market->getAllRedords();
		$markets=$this->Market->getNearbyMarkets($this->consumer['zipcode']);
		$this->template_data=array(
			'main_content'=>'studio/consumer/markets/index',
			'markets'=>$markets,
			'JSs'=>array('js/markets.js')
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
	}
	public function setMarket($id){
		$this->my_cart->destroy();
		$updateData=array(
			'defaultmarket'=>$id,
			'defaultvendor'=>0
		);
		$this->User->updateProfile($updateData,$this->consumer['id']);
		redirect('consumer/vendors');
	}
}
