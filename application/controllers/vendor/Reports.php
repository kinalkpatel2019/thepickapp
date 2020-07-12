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
        $orders=$this->Report->getVendorReports($this->vendor['id'],"orders.id","desc");
		$categories=$this->Report->getcategories();
        $vendor_markets=$this->Market->getVendorMarket($this->vendor['id']);
        $this->template_data=array(
            'main_content'=>'studio/vendor/reports/index',
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
    public function view($id){
        $order=$this->Order->getOrderById($id);
        
        $order_details=$this->Order->getOrderDetails($id,$this->vendor['id']);
        $mode=$this->input->get('status');
        $this->template_data=array(
            'main_content'=>'studio/vendor/orders/view',
            'order_details'=>$order_details,
            'order'=>$order,
            'mode'=>$mode,
            'JSs'=>array('js/printThis.js','js/print.js')
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());

    }
    public function changestatus(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $data=array(
            'status'=>$status,
            'updated_at'=>date('Y-m-d h:i:s')
        );
        $this->Order->update($data,$id);
        redirect('vendor/orders/view/'.$id);
    }
    public function approveOrderItem($id){
        
        $order_details=$this->Order->getOrderDetailsByID($id);
        if(empty($order_details))
            redirect('vendor/orders');
        $order_id=$order_details['order_id'];
        $order=$this->Order->getOrderById($order_id);
        
       
        //update the order item staus to approved
        $this->Order->changeItemStatus($id,"approved");

        //now get the all item status if all are approved make order status approved

        //$this->Order->changeOrderStatus($order_details['order_id'],"approved");
        $totalItems=$this->Order->getTotalStatus($order_id);
        $totalApproved=$this->Order->getTotalStatus($order_id,'approved');

        if($totalApproved==$totalItems){
            ///update the order status 
            $this->Order->changeOrderStatus($order_details['order_id'],"approved");
            //payment things can be done here
            //prepare trasfer data 

            //1. make charge first 
            $charge_id=$this->StripeModel->doCharge($order);

            if($charge_id){
                $this->Order->changePaymentStatus($order_details['order_id'],"paid");

                //2. make trasfer to the acount
                /*$vendors=$this->Order->getVendorDetailsByOrder($order_id);

                foreach($vendors as $vendor){
                    $this->StripeModel->doTransfer($vendor,$order_id,$charge_id);
                }*/
            }
            
            //prepare transfer data to 
            //from here you need to make stripe payment and update the payment stus

        }
        
        redirect('vendor/orders/view/'.$order_id);
        
    }
}
