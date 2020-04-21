<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Vendor_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Businesstype');
        $this->load->model('User');
    }
	public function index(){
        $businesstypes=$this->Businesstype->getAllRedords();
        $user=$this->User->getUserWithProfile(array('users.id'=>$this->vendor['id']));
        $this->template_data=array(
            'main_content'=>'vendor/profile/index',
            'businesstypes'=>$businesstypes,
            'user'=>$user
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());
    }
    public function updateProfile(){
        $businesstype_id=$this->input->post('businesstype_id');
        $businessname=$this->input->post('businessname');
        $address1=$this->input->post('address1');
        $address2=$this->input->post('address2');
        $phonenumber=$this->input->post('phonenumber');
        $user_id=$this->vendor['id'];
        //get the user profile
        $profile=$this->User->getProfile($user_id);
        if(empty($profile)){
            //insert profile
            $insertData=array(
                'businesstype_id'=>$businesstype_id,
                'businessname'=>$businessname,
                'address1'=>$address1,
                'address2'=>$address2,
                'phonenumber'=>$phonenumber,
                'user_id'=>$user_id,
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s'),
            );
            $this->User->insertProfile($insertData);
        }
        else{
            //update profile
            $updateData=array(
                'businesstype_id'=>$businesstype_id,
                'businessname'=>$businessname,
                'address1'=>$address1,
                'address2'=>$address2,
                'phonenumber'=>$phonenumber,
                'updated_at'=>date('Y-m-d h:i:s'),
            );
            $this->User->updateProfile($updateData,$user_id);
        }
        redirect('vendor/profile');
    }
}
