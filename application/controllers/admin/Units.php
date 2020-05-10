<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Units extends Admin_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Unit');
	}
	public function index(){
		$units=$this->Unit->getAllRedords(array('1'=>1),'all');
		$this->template_data=array(
			'main_content'=>'studio/admin/units/index',
			'units'=>$units,
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
			'main_content'=>'studio/admin/units/add',
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
	public function edit($id)
	{
		
		$unit=$this->Unit->getUnitById($id);
		$this->template_data=array(
			'main_content'=>'studio/admin/units/edit',
			'unit'=>$unit,
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
	public function insertunit(){
		$title=$this->input->post('title');
		$code=$this->input->post('code');
		$iscontainter=$this->input->post('iscontainer');
		$insertData=array(
			'title'=>$title,
			'code'=>$code,
			'iscontainer'=>$iscontainter,
			'status'=>1,
			'created_at'=>date('Y-m-d h:i:s'),
			'updated_at'=>date('Y-m-d h:i:s')
		);
		$type_id=$this->Unit->insert($insertData);
		//create initial image here  
		redirect('admin/units');
	}
	public function updateunit(){
		$id=$this->input->post('id');
		$title=$this->input->post('title');
		$code=$this->input->post('code');
		$iscontainter=$this->input->post('iscontainer');
		$updateData=array(
			'title'=>$title,
			'code'=>$code,
			'iscontainer'=>$iscontainter,
		);
		$this->Unit->update($updateData,$id);
		redirect('admin/units');
	}
}
