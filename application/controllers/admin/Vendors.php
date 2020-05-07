<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User');
    }
	public function index(){
        $vendors=$this->User->getUserWithProfile(array('users.accounttype'=>1));
        $this->template_data=array(
            'main_content'=>'admin/vendors/index',
        );
        $this->load->view('template/admin/index',$this->generateTemplateData());
    }
}
