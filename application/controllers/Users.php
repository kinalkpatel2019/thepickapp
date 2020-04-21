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
		$this->createAvatarImage($initial,$user_id,$accounttype);
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
	private function createAvatarImage($string,$user_id,$type)
	{
		if (!file_exists(FCPATH."/uploads/".$type."/".$user_id."/")) {
			mkdir(FCPATH."/uploads/".$type."/".$user_id."/", 0777, true);
		}
		$imageFilePath = FCPATH."/uploads/".$type."/".$user_id."/".$string . ".png";
	
		//base avatar image that we use to center our text string on top of it.
		$avatar = imagecreatetruecolor(60,60);
		$bg_color = imagecolorallocate($avatar, 211, 211, 211);
		imagefill($avatar,0,0,$bg_color);
		$avatar_text_color = imagecolorallocate($avatar, 0, 0, 0);
		// Load the gd font and write 
		$font = imageloadfont('gd-files/gd-font.gdf');
		imagestring($avatar, $font, 10, 10, $string, $avatar_text_color);
		imagepng($avatar, $imageFilePath);
		imagedestroy($avatar);
	 
		return $imageFilePath;
	}
}
