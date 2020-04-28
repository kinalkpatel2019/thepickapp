<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Vendor_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Inventory');
        $this->load->model('User');
        $this->load->model('Market');
        $this->load->model('Order');
	}
	public function index(){
        $orders=$this->Order->getAllRedords(array('orders.vendor_id'=>$this->vendor['id']));
        
        $this->template_data=array(
            'main_content'=>'vendor/orders/index',
            'orders'=>$orders
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());
    }
    public function view($id){
        $order=$this->Order->getOrderById($id);
        $order_details=$this->Order->getOrderDetails($id);
        $mode=$this->input->get('status');
        $this->template_data=array(
            'main_content'=>'vendor/orders/view',
            'order_details'=>$order_details,
            'order'=>$order,
            'mode'=>$mode
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());

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
}
