<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Consumer_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User');
    }
	public function index(){
        $user=$this->User->getUserWithProfile(array('users.id'=>$this->consumer['id']));
        $this->template_data=array(
            'main_content'=>'studio/consumer/profile/index',
            'user'=>$user
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
    }
    public function updateProfile(){
        $address1=$this->input->post('address1');
        $address2=$this->input->post('address2');
        $phonenumber=$this->input->post('phonenumber');
        $user_id=$this->consumer['id'];
        //get the user profile
        $profile=$this->User->getProfile($user_id);
        if(empty($profile)){
            //insert profile
            $insertData=array(
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
                'address1'=>$address1,
                'address2'=>$address2,
                'phonenumber'=>$phonenumber,
                'updated_at'=>date('Y-m-d h:i:s'),
            );
            $this->User->updateProfile($updateData,$user_id);
        }
        redirect('consumer/profile');
    }
    /*public function settings(){
        $markets=$this->Market->getAllRedords();
        $vendormarkets=$this->Market->getVendorMarkets($this->vendor['id']);
        $vendormarkets_ids=array();
        $vendormarkets_ids = array_column($vendormarkets, 'market_id');
        $this->template_data=array(
            'main_content'=>'vendor/profile/settings',
            'markets'=>$markets,
            'vendormarkets'=>$vendormarkets_ids,
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());
    }
    public function updateSettings(){
        $markets=$this->input->post('markets');

        $this->Market->removeMarkets($this->vendor['id']);
        foreach($markets as $market){
            $insertData=array(
                'vendor_id'=>$this->vendor['id'],
                'market_id'=>$market,
                'status'=>1,
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s'),
            );
            $this->Market->insertMarket($insertData);
        }
        redirect('vendor/profile/settings');
    }*/
}
