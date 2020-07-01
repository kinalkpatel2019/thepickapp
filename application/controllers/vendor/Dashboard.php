<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Vendor_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Report');
        $this->load->model('Order');
        $this->load->model('Product');
    }
	public function index(){
        $date = new DateTime(date('Y-m-d'));
        $currentWeek = $date->format("W");
        $currentYear=date('Y');
        
        $thisweek=$this->Report->getVendorWeekEarning($this->vendor['id'],$currentWeek,$currentYear);

        $twe=0;
        foreach($thisweek as $item){
            
            $twe+=$item['vendoramount'];
        }

        $lastweek=$this->Report->getVendorWeekEarning($this->vendor['id'],$currentWeek-1,$currentYear);

        $lwe=0;
        foreach($lastweek as $item){
            $lwe+=$item['vendoramount'];
        }

        if($twe > $lwe)
            $flag="up";
        else
            $flag="down";
        $percentage=(($twe-$lwe)/$lwe)*100;
        $earning=array(
            'weekly'=>number_format($twe,2),
            'lastweek'=>number_format($lwe,2),
            'weeklypercentage'=>number_format($percentage,2),
            'updownflag'=>$flag
        );

        $orders=array(
            'weekly'=>count($thisweek),
            'lastweek'=>count($lastweek),
        );
        
        $this->template_data=array(
            'main_content'=>'studio/vendor/dashboard/index',
            'CSSs'=>array(),
            'JSs'=>array(),
            'earning'=>$earning,
            'orders'=>$orders,
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    function today(){
        //$orders=$this->Order->getAllVendorRedords($this->vendor['id'],"orders.id","desc",$selected_market);
        $market_id=$this->input->get('market_id');
        $itemname=$this->input->get('itemname');
        

        $fromdate=date('Y-m-d')." 00:00:00";
        $todate=date('Y-m-d')." 23:59:59";

        $orders=$this->Report->getOrders($this->vendor['id'],$market_id,$itemname,$fromdate,$todate);
        $vendor_markets=$this->Market->getVendorMarket($this->vendor['id']);
        $items=$this->Product->getAllProductsByVendorID($this->vendor['id']);
        $this->template_data=array(
            'main_content'=>'studio/vendor/dashboard/today',
            'vendor_markets'=>$vendor_markets,
            'selected_market'=>$market_id,
            'selected_item'=>$itemname,
            'orders'=>$orders,
            'items'=>$items,
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

    function thisweek(){
        //$orders=$this->Order->getAllVendorRedords($this->vendor['id'],"orders.id","desc",$selected_market);
        $market_id=$this->input->get('market_id');
        $itemname=$this->input->get('itemname');

        
        $date = new DateTime(date('Y-m-d'));
        $currentWeek = $date->format("W");
        $currentYear=date('Y');

        $fromdate=$this->Report->week_start_date($currentWeek,$currentYear)." 00:00:00";
        $todate=date('Y-m-d',strtotime("+6 days",strtotime($start)))." 23:59:59";

        $orders=$this->Report->getOrders($this->vendor['id'],$market_id,$itemname,$fromdate,$todate);
        $vendor_markets=$this->Market->getVendorMarket($this->vendor['id']);
        $items=$this->Product->getAllProductsByVendorID($this->vendor['id']);
        $this->template_data=array(
            'main_content'=>'studio/vendor/dashboard/thisweek',
            'vendor_markets'=>$vendor_markets,
            'selected_market'=>$market_id,
            'selected_item'=>$itemname,
            'orders'=>$orders,
            'items'=>$items,
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