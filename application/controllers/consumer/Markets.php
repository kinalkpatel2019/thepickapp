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
		$markets=$this->Market->getAllRedords();
		$this->template_data=array(
			'main_content'=>'consumer/markets/index',
			'markets'=>$markets
        );
        $this->load->view('template/consumer/index',$this->generateTemplateData());
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
