<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Vendor_Controller {

    public function __construct(){
        parent::__construct();
    }
	public function index(){

        $this->template_data=array(
            'main_content'=>'studio/vendor/dashboard/index',
            'CSSs'=>array(),
            'JSs'=>array()
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
}