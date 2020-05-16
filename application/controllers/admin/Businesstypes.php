<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Businesstypes extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Businesstype');
	}
	public function index(){
		$businesstypes=$this->Businesstype->getAllRedords(array('1'=>1),'all');
		$this->template_data=array(
			'main_content'=>'studio/admin/businesstypes/index',
			'businesstypes'=>$businesstypes,
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
    public function add()
	{
		$this->template_data=array(
			'main_content'=>'studio/admin/businesstypes/add',
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
	public function edit($id)
	{
		
		$businesstype=$this->Businesstype->getRecordById($id);
		$this->template_data=array(
			'main_content'=>'studio/admin/businesstypes/edit',
			'businesstype'=>$businesstype,
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
	public function insertbusinesstype(){
		$title=$this->input->post('title');
		$insertData=array(
			'title'=>$title,
			'status'=>1,
			'created_at'=>date('Y-m-d h:i:s'),
			'updated_at'=>date('Y-m-d h:i:s')
		);
		$type_id=$this->Businesstype->insert($insertData);
		//create initial image here  
		redirect('admin/businesstypes');
	}
	public function updatebusinesstype(){
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$updateData=array(
			'title'=>$title,
		);
		$this->Businesstype->update($updateData,$id);
		redirect('admin/businesstypes');
	}
}
