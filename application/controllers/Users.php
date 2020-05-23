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
			'main_content'=>'studio/users/login',
			'error'=>$this->session->flashdata('error'),
			'success'=>$this->session->flashdata('success'),
		);
		$this->load->view('studio/template/beforelogin/index',$template_data);
    }
    public function register()
	{
		$template_data=array(
			'main_content'=>'studio/users/register',
			'error'=>$this->session->flashdata('error'),
			'success'=>$this->session->flashdata('success'),
		);
		$this->load->view('studio/template/beforelogin/index',$template_data);
	}
	public function doRegister(){
		
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]',array(
			'is_unique'     => 'This %s already exists.'
		));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('accounttype', 'Account Type', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to register page
            $this->register();
		}
		else{
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
			$accounttype=($accounttype==1) ? 'vendors' : 'consumers';
			//send an email to user and admin 
			$this->session->set_flashdata('success','Your account has been created successfully!');
			$where=array(
				'email'=>$email,
			);
			$user=$this->User->getUserWithProfile($where);	
			//send email
			$this->Email->sendRegisterEmailtoUser($user);
			$this->Email->sendRegisterEmailtoAdmin($user);
			//check account type
			if($user['accounttype']==1){
				//vendor
				$this->session->set_userdata('vendor',$user);
				redirect('vendor/profile');
			}
			else if($user['accounttype']==2){
				//vendor
				$this->session->set_userdata('consumer',$user);
				redirect('consumer/profile');
			}
		}
	}
	public function authenticate(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->login();
		}
		else{

			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$where=array(
				'email'=>$email,
				'password'=>md5($password)
			);
			$user=$this->User->getUserWithProfile($where);	
			if(!empty($user)){
				// remember me
				if(!empty($this->input->post("remember"))) {
					setcookie ("email", $email, time()+ (10 * 365 * 24 * 60 * 60));  
					setcookie ("password", $password,  time()+ (10 * 365 * 24 * 60 * 60));
				  } else {
					setcookie ("email",""); 
					setcookie ("password","");
				  }        
				//check user type and redirect user accordigly. 
				///
				if($user['accounttype']==1){
					//vendor
					$this->session->set_userdata('vendor',$user);
					redirect('vendor/dashboard');
				}
				else if($user['accounttype']==2){
					//vendor
					$this->session->set_userdata('consumer',$user);
					redirect('consumer/markets');
				}
			}
			else{
				$this->session->set_flashdata('error','Invalid email or Password!');
				redirect('users/login');
			}
		}
		

	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('users/login');
	}
	public function forgotpassword(){
		$template_data=array(
			'main_content'=>'studio/users/forgotpassword',
			'error'=>$this->session->flashdata('error'),
			'success'=>$this->session->flashdata('success'),
		);
		$this->load->view('studio/template/beforelogin/index',$template_data);
	}
	public function otp(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to register page
            $this->forgotpassword();
		}
		else{
			$email=$this->input->post('email');
			$user=$this->User->getUser(array('email'=>$email));
			if(empty($user)){
				$this->session->set_flashdata('error',"This email is not registered with the site!");
				redirect('studio/users/forgotpassword');
			}
				
			$otp=rand(1000,9999);
			$data=array(
				'otp'=>$otp
			);
			$this->User->update($data,$user['id']);
			//email to this user 
			$user=$this->User->getUser(array('email'=>$email));	
				//send email
			$this->Email->sendOTPtoUser($user);
			$template_data=array(
				'main_content'=>'studio/users/otp',
				'email'=>$email
			);
			$this->load->view('studio/template/beforelogin/index',$template_data);
		}
	}
	public function verifyotp(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('otp', 'OTP', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to register page
			//$this->otp();
			$this->session->set_flashdata('error',"Invalid Email or OTP. Please try Again!");
			redirect('users/forgotpassword');
		}
		else{
			$email=$this->input->post('email');
			$otp=$this->input->post('otp');
			$user=$this->User->getUser(array('email'=>$email,'otp'=>$otp));
			if(empty($user))
			{
				$this->session->set_flashdata('error',"Invalid Email or OTP. Please try Again!");
				redirect('users/forgotpassword');
			}
			$data=array(
				'otp'=>null
			);
			$this->User->update($data,$user['id']);
			
			$this->session->set_userdata('resetuserid',$user['id']);
			redirect('users/resetpassword');	
		}
	}
	function resetpassword(){
		$template_data=array(
			'main_content'=>'studio/users/resetpassword',
		);
		$this->load->view('studio/template/beforelogin/index',$template_data);
	}
	function updatepassword(){
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');
		if ($this->form_validation->run() == FALSE) {
            $this->resetpassword();
		}
		else{
			$password=$this->input->post('password');
			$data=array(
				'password'=>md5($password)
			);
			$id=$this->session->userdata('resetuserid');
			if(empty($id))
				redirect('users/login');
			$this->User->update($data,$id);

			$where=array(
				'users.id'=>$id,
			);
			$user=$this->User->getUserWithProfile($where);	

			//send email
			$this->Email->sendResetPassword($user);

			$this->session->unset_userdata('resetuserid');
			$this->session->set_flashdata('success','Your Password has been reset successfully!');
			redirect('users/login');
		}
	}
	public function checkemail($mode){
		$email=$this->input->post('email');
		$where=array(
			'email'=>$email,
		);
		$user=$this->User->getUserWithProfile($where);	
		if(!empty($user)){
			if(!empty($mode))
				echo "true";
			else
				echo "false";
		}
		else{
			if(!empty($mode))
				echo "false";
			else
				echo "true";
		}
	}
}
