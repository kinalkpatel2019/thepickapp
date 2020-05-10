<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsettings extends Admin_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Settings');
	}
	public function index(){
		$consumercommission=$this->Settings->getConsumerCommission();
		$this->template_data=array(
			'main_content'=>'studio/admin/settings/index',
			'consumercommission'=>$consumercommission,
			'CSSs'=>array(
                
                ),
            'JSs'=>array(
                
                )
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
    public function updateSettings()
	{
		$keys=$this->input->post('meta_key');
		foreach($keys as $key=>$value){
			$this->Settings->updateValue($key,$value);
		}
		redirect('admin/adminsettings');
	}
}
