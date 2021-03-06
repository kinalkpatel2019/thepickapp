<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Vendor_Controller {

	public function __construct(){
        parent::__construct();
		 $this->load->model('Report');
        $this->load->model('Inventory');
        $this->load->model('User');
        $this->load->model('Market');
        $this->load->model('StripeModel');
	}
	public function index(){
		$category_id=$this->input->get('category_id');
		$from_date=$this->input->get('from_date');
		$to_date=$this->input->get('to_date');
        $orders=$this->Report->getVendorReports($this->vendor['id'],$category_id,$from_date,$to_date,"orders.id","desc");
		$categories=$this->Report->getcategories();
        $vendor_markets=$this->Market->getVendorMarket($this->vendor['id']);
		
        $this->template_data=array(
            'main_content'=>'studio/vendor/reports/direct/index',
			'selected_category'=>$category_id,
			'selected_from_date'=>$from_date,
			'selected_to_date'=>$to_date,
            'vendor_markets'=>$vendor_markets,
			'categories'=>$categories,
            'orders'=>$orders,
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
    public function market(){
        $selected_market=$this->input->get('market_id');
		$category_id=$this->input->get('category_id');
		$from_date=$this->input->get('from_date');
		$to_date=$this->input->get('to_date');
        $conditions=array(
			'orders.vendor_id'=>$this->vendor['id']
         );
        if(!empty($selected_market))
            $conditions['orders.market_id']=$selected_market;
		
        $orders=$this->Report->getAllMarketVendorRedords($this->vendor['id'],"orders.id","desc",$selected_market,$category_id,$from_date,$to_date);
		//echo "<pre>";print_r($orders);die;
        $vendor_markets=$this->Market->getVendorMarket($this->vendor['id']);
		$categories=$this->Report->getcategories();
        $this->template_data=array(
             'main_content'=>'studio/vendor/reports/market/index',
			 'selected_category'=>$category_id,
			'selected_from_date'=>$from_date,
			'selected_to_date'=>$to_date,
            'vendor_markets'=>$vendor_markets,
            'selected_market'=>$selected_market,
			'categories'=>$categories,
            'orders'=>$orders,
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
}
