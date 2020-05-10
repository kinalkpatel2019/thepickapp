<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Adminuser');
	}
	public function index(){
		$adminusers=$this->Adminuser->getAllRecords(array('accounttype'=>1));
		$this->template_data=array(
			'main_content'=>'studio/admin/users/index',
			'adminusers'=>$adminusers
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
	public function login()
	{
		$template_data=array(
			'main_content'=>'studio/admin/users/login'
		);
		$this->load->view('studio/template/beforelogin/index',$template_data);
    }
    public function add()
	{
		$this->template_data=array(
			'main_content'=>'studio/admin/users/add',
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
	public function edit($id)
	{
		$user=$this->Adminuser->getUser(array('id'=>$id));
		$this->template_data=array(
			'main_content'=>'studio/admin/users/edit',
			'user'=>$user
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
	}
	public function insertuser(){
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$accounttype=1;
		$status=1;		//need to update accordigly...current active
		$initial=strtoupper(substr($firstname, 0, 1).substr($lastname, 0, 1));
		$insertData=array(
			'firstname'=>$firstname,
			'lastname'=>$lastname,
			'email'=>$email,
			'initial'=>$initial,
			'password'=>md5($password),
			'accounttype'=>$accounttype,
			'status'=>$status,
			'created_at'=>date('Y-m-d h:i:s'),
			'updated_at'=>date('Y-m-d h:i:s')
		);
		$user_id=$this->Adminuser->insert($insertData);
		//create initial image here  
		redirect('admin/users');
	}
	public function updateuser(){
		$id=$this->input->post('id');
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$updateData=array(
			'firstname'=>$firstname,
			'lastname'=>$lastname
		);
		$this->Adminuser->update($updateData,$id);
		redirect('admin/users');
	}
	public function authenticate(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$where=array(
			'email'=>$email,
			'password'=>md5($password)
		);
		$user=$this->Adminuser->getUser($where);		
		if(!empty($user)){
			//check user type and redirect user accordigly. 
            ///
            $this->session->set_userdata('admin',$user);
            redirect('admin/dashboard');
			/*if($user['accounttype']==1){
				//vendor
				$this->session->set_userdata('vendor',$user);
				redirect('vendor/dashboard');
			}
			else if($user['accounttype']==2){
				//vendor
				$this->session->set_userdata('consumer',$user);
				redirect('consumer/markets');
			}*/
		}
		else{
			redirect('admin/users/login');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/users/login');
	}
	function updatepassword(){
		$password=$this->input->post('password');
		if(empty($password))
		{
			redirect('users/resetpassword');
		}
		$data=array(
			'password'=>md5($password)
		);
		$id=$this->session->userdata('resetuserid');
		if(empty($id))
			redirect('users/login');
		$this->User->update($data,$id);
		$this->session->sess_destroy();
		redirect('users/login');
	}
}
