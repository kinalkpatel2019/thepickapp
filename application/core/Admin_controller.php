<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Common Controller for all vendor controllers
 */
class Admin_Controller extends My_Controller
{
	/**
	 * Constructor for the class
	 */
	public function __construct()
	{
		parent::__construct();
		//check login
        $this->admin=$this->session->userdata('admin');
        $method=$this->router->fetch_method();
		if(empty($this->admin) && !in_array($method,array('login','authenticate')))
			redirect('admin/users/login');
		$this->data['admin']=$this->admin;
		$this->data['CSSs']=array();
		$this->data['JSs']=array();
		$this->template_data=array();
		
	}
	public function generateTemplateData(){
		return array_merge($this->data,$this->template_data);
	}

}
