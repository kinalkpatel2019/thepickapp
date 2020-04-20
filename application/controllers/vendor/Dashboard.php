<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Vendor_Controller {

    public function __construct(){
        parent::__construct();
    }
	public function index(){

        $template_data=array(
            'main_content'=>'vendor/dashboard/index'
        );
        $this->load->view('template/vendor/index',$template_data);
    }
}
