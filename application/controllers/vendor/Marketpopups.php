<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketpopups extends Vendor_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Businesstype');
        $this->load->model('User');
        $this->load->model('Market');
    }
	public function index(){
        $markets=$this->Market->getVendorMarket($this->vendor['id']);
        $this->template_data=array(
            'main_content'=>'studio/vendor/marketpopups/index',
            'markets'=>$markets,
            'CSSs'=>array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                'plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
                'plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'
                ),
            'JSs'=>array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net-buttons/js/dataTables.buttons.min.js',
                'plugins/datatables.net-buttons/js/buttons.colVis.min.js',
                'plugins/datatables.net-buttons/js/buttons.flash.min.js',
                'plugins/datatables.net-buttons/js/buttons.html5.min.js',
                'plugins/datatables.net-buttons/js/buttons.print.min.js',
                'plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
                'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
                'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
                'js/inventories.js'
                )
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    public function edit($id){
        //get market info and also get the market message for the vendor 
        $message=$this->Market->getMarketPopup($this->vendor['id'],$id);
        $this->template_data=array(
            'main_content'=>'studio/vendor/marketpopups/edit',
            'message'=>$message,
			'CSSs'=>array(
                'plugins/summernote/dist/summernote.css',
                'plugins/summernote/dist/summernote-bs4.css'
                ),
            'JSs'=>array(
                'plugins/summernote/dist/summernote.min.js',
                'plugins/summernote/dist/summernote-bs4.min.js',
                'js/demo/email-compose.demo.js'
                )
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    public function updatepopup(){
        $market_id=$this->input->post('market_id');
        $message=$this->input->post('text');
        $status=$this->input->post('status');
        $this->Market->updatePopMessage($this->vendor['id'],$market_id,$status,$message);
        $this->session->set_flashdata('success',"Message has been updated!");
        redirect('vendor/marketpopups');
    }
    
}
