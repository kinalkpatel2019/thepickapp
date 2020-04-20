<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User');
	}
	
	public function login()
	{
		$template_data=array(
			'main_content'=>'users/login'
		);
		$this->load->view('template/beforelogin/index',$template_data);
    }
    public function register()
	{
		$template_data=array(
			'main_content'=>'users/register'
		);
		$this->load->view('template/beforelogin/index',$template_data);
	}
	public function doRegister(){
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$accounttype=$this->input->post('accounttype');
		$status=1;		//need to update accordigly...current active

		$insertData=array(
			'firstname'=>$firstname,
			'lastname'=>$lastname,
			'email'=>$email,
			'password'=>md5($password),
			'accounttype'=>$accounttype,
			'status'=>$status,
			'created_at'=>date('Y-m-d h:i:s'),
			'updated_at'=>date('Y-m-d h:i:s')
		);
		$this->User->insert($insertData);
		
		redirect('users/login');
	}
	public function authenticate(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$where=array(
			'email'=>$email,
			'password'=>md5($password)
		);
		$user=$this->User->getUser($where);		
		if(!empty($user)){
			//check user type and redirect user accordigly. 
			///
			if($user['accounttype']==1){
				//vendor
				$this->session->set_userdata('vendor',$user);
				redirect('vendor/dashboard');
			}
		}
		else{
			redirect('users/login');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('users/login');
	}
}
