<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Adminuser');
	}
	
	public function login()
	{
		$template_data=array(
			'main_content'=>'admin/users/login'
		);
		$this->load->view('template/beforelogin/index',$template_data);
    }
    public function add()
	{
		$template_data=array(
			'main_content'=>'users/register'
		);
		$this->load->view('template/beforelogin/index',$template_data);
	}
	public function insertuser(){
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$accounttype=$this->input->post('accounttype');
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
		$user_id=$this->User->insert($insertData);
		//create initial image here  
		redirect('users/login');
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
