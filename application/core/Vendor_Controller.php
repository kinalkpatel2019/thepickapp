<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Common Controller for all vendor controllers
 */
class Vendor_Controller extends My_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		//check login
		$this->vendor=$this->session->userdata('vendor');
		if(empty($this->vendor))
			redirect('users/login');
		$this->data['vendor']=$this->vendor;
		$this->data['CSSs']=array();
		$this->data['JSs']=array();
		/* flash messages */
		$this->data['error']=$this->session->flashdata('error');
		$this->data['success']=$this->session->flashdata('success');
		$this->template_data=array();
		
	}
	public function generateTemplateData(){
		return array_merge($this->data,$this->template_data);
	}

}
