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
		$controller=$this->router->fetch_class();
		$restrict_class=array('users','managers','vendors','consumers','businesstypes','categories','units');
		if(empty($this->admin) && !in_array($method,array('login','authenticate')))
			redirect('admin/users/login');
		if($this->admin['accounttype']==2 && !in_array($method,array('logout'))){
			$this->admin['markets']=explode(',',$this->admin['markets']);
			//if he is a manager than restict certain controllers
			if(in_array($controller,$restrict_class))
				redirect('admin/dashboard');

		}
		$this->data['admin']=$this->admin;
		$this->data['CSSs']=array();
		$this->data['JSs']=array();
		$this->data['EX']=array();
		$this->template_data=array();
		
	}
	public function generateTemplateData(){
		return array_merge($this->data,$this->template_data);
	}

}
