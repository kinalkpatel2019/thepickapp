<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Order');
    }
	public function index(){
        $orders=$this->Order->getAllRedords();
        $this->template_data=array(
            'main_content'=>'studio/admin/orders/index',
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
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function view($id){
        $order=$this->Order->getOrderById($id);
        $order_details=$this->Order->getOrderDetails($id);
        $mode=$this->input->get('status');
        $this->template_data=array(
            'main_content'=>'studio/admin/orders/view',
            'order_details'=>$order_details,
            'order'=>$order,
            'mode'=>$mode
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function updatepickup(){
        $orderid=$this->input->post('orderid');
        $pickup=$this->input->post('pickup');
        $this->Order->updatePickup($pickup,$orderid);
        redirect('admin/orders/view/'.$orderid);
    }
}
