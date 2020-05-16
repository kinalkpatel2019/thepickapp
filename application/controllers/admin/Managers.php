<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managers extends Admin_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Adminuser');
		$this->load->model('Market');
	}
	public function index(){
		$adminusers=$this->Adminuser->getAllRecords(array('accounttype'=>2));
		$this->template_data=array(
			'main_content'=>'studio/admin/managers/index',
			'adminusers'=>$adminusers
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
    public function add()
	{
		$markets=$this->Market->getAllRedords();
		$this->template_data=array(
			'main_content'=>'studio/admin/managers/add',
			'CSSs'=>array(
                'plugins/bootstrap-select/dist/css/bootstrap-select.min.css',
            ),
            'JSs'=>array(
                'plugins/bootstrap-select/dist/js/bootstrap-select.min.js'
			),
			'markets'=>$markets
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
	public function edit($id)
	{
		$markets=$this->Market->getAllRedords();
		$user=$this->Adminuser->getUser(array('id'=>$id));
		$this->template_data=array(
			'main_content'=>'studio/admin/managers/edit',
			'user'=>$user,
			'CSSs'=>array(
                'plugins/bootstrap-select/dist/css/bootstrap-select.min.css',
            ),
            'JSs'=>array(
                'plugins/bootstrap-select/dist/js/bootstrap-select.min.js'
			),
			'markets'=>$markets
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
	public function insertuser(){
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$accounttype=2;
		$status=1;		//need to update accordigly...current active
		$initial=strtoupper(substr($firstname, 0, 1).substr($lastname, 0, 1));
		$markets=$this->input->post('markets');
		$market_str=implode(',',$markets);
		$insertData=array(
			'firstname'=>$firstname,
			'lastname'=>$lastname,
			'email'=>$email,
			'initial'=>$initial,
			'password'=>md5($password),
			'accounttype'=>$accounttype,
			'status'=>$status,
			'markets'=>$market_str,
			'created_at'=>date('Y-m-d h:i:s'),
			'updated_at'=>date('Y-m-d h:i:s')
		);
		$user_id=$this->Adminuser->insert($insertData);
		//create initial image here  
		redirect('admin/managers');
	}
	public function updateuser(){
		$id=$this->input->post('id');
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$markets=$this->input->post('markets');
		$market_str=implode(',',$markets);
		$updateData=array(
			'firstname'=>$firstname,
			'lastname'=>$lastname,
			'markets'=>$market_str,
		);
		$this->Adminuser->update($updateData,$id);
		redirect('admin/managers');
	}
}
