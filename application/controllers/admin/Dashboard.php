<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }
	public function index(){

        $this->template_data=array(
            'main_content'=>'admin/dashboard/index',
        );
        $this->load->view('template/admin/index',$this->generateTemplateData());
    }
}
