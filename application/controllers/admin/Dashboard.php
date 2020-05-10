<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }
	public function index(){

        $this->template_data=array(
            'main_content'=>'studio/admin/dashboard/index',
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
}
