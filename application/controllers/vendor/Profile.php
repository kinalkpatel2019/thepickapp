<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Vendor_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Businesstype');
        $this->load->model('User');
        $this->load->model('Market');
        $this->load->model('StripeModel');
        $this->load->model('Zipcode');
    }
	public function index(){
        $businesstypes=$this->Businesstype->getAllRedords();
        $user=$this->User->getUserWithProfile(array('users.id'=>$this->vendor['id']));
        $this->template_data=array(
            'main_content'=>'studio/vendor/profile/index',
            'businesstypes'=>$businesstypes,
            'user'=>$user
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    public function stripe(){
        $state_value=uniqid();
        $this->session->set_userdata('stripe_state',$state_value);
        $stripeaccount=$this->StripeModel->getStripeAccount($this->vendor['id']);
        $stripe_button_url=STRIPE_AUTHORISED_URL."?redirect_uri=".site_url('stripe/connect_call_back')."&client_id=".STRIPE_CLIENT_ID."&state=".$state_value;

        $login_link=array();
        if(!empty($stripeaccount))
            $login_link=$this->StripeModel->getStripeLoginLink($stripeaccount['stripe_user_id']);

        $this->template_data=array(
            'main_content'=>'studio/vendor/profile/stripe',
            'stripe_button_url'=>$stripe_button_url,
            'stripeaccount'=>$stripeaccount,
            'login_link'=>$login_link
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    public function updateProfile(){
        $businesstype_id=$this->input->post('businesstype_id');
        $businessname=$this->input->post('businessname');
        $address1=$this->input->post('address1');
        $address2=$this->input->post('address2');
        $phonenumber=$this->input->post('phonenumber');
        $user_id=$this->vendor['id'];
        $zipcode=$this->input->post('zipcode');

        $zipcode=$this->Zipcode->validate($zipcode);
        //get the user profile
        $profile=$this->User->getProfile($user_id);
        if(empty($profile)){

            //upload logo
            $image="";
            $filename="";
            $oldImageFilename=$_FILES['image']['name'];
            $ext_array=explode('.',$oldImageFilename);
            $ext=end($ext_array);
            $filename=uniqid().'.'.$ext;
            $config['upload_path'] = 'uploads/users/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '5000';
            $config['file_name'] = $filename;
            $this->load->library('upload',$config); 
            if($this->upload->do_upload('image')){
                $image=$filename;
            }

            //insert profile
            $insertData=array(
                'businesstype_id'=>$businesstype_id,
                'businessname'=>$businessname,
                'address1'=>$address1,
                'address2'=>$address2,
                'phonenumber'=>$phonenumber,
                'zipcode'=>$zipcode,
                'user_id'=>$user_id,
                'image'=>$image,
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
                'zipcode'=>$zipcode,
                'updated_at'=>date('Y-m-d h:i:s'),
            );

            if(isset($_FILES['image']['name'])){
                //upload processing image
                $image="";
                $filename="";
                $oldFilename=$_FILES['image']['name'];
                $ext_array=explode('.',$oldFilename);
                $ext=end($ext_array);
                $filename=uniqid().'.'.$ext;
                $config['upload_path'] = 'uploads/users/'; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';
                $config['file_name'] = $filename;
                $this->load->library('upload',$config); 
                $this->upload->initialize($config);
                if($this->upload->do_upload('image')){
                    $image=$filename;
                     //unlink existing logo from logo folder
                    if(file_exists('uploads/users/'.$profile['image'])){
                        unlink('uploads/users/'.$profile['image']);
                    }
                }
                if(!empty($image))
                    $updateData['image']=$image;
            }

            $this->User->updateProfile($updateData,$user_id);
        }
        redirect('vendor/profile');
    }
    public function settings(){
        $markets=$this->Market->getAllRedords();
        $vendormarkets=$this->Market->getVendorMarkets($this->vendor['id']);
        $vendormarkets_ids=array();
        $vendormarkets_ids = array_column($vendormarkets, 'market_id');
        $this->template_data=array(
            'main_content'=>'studio/vendor/profile/settings',
            'markets'=>$markets,
            'vendormarkets_ids'=>$vendormarkets_ids,
            'vendormarkets'=>$vendormarkets,
            'CSSs'=>array(
                'plugins/bootstrap-select/dist/css/bootstrap-select.min.css',
            ),
            'JSs'=>array(
                'plugins/bootstrap-select/dist/js/bootstrap-select.min.js'
            ),
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    public function updateSettings(){
        $markets=$this->input->post('markets');

        $existing_markets=$this->Market->getVendorMarkets($this->vendor['id']);
        $saved_markets=array_column($existing_markets, 'market_id');
        $new_market=array();
        foreach($saved_markets as $item){
            if(!in_array($item,$markets)){
                //this need to be deleted
                $this->Market->removeMarkets($this->vendor['id'],$item);
            }
        }
        foreach($markets as $item){
            if(!in_array($item,$saved_markets)){
                //this need to be added
                $insertData=array(
                    'vendor_id'=>$this->vendor['id'],
                    'market_id'=>$item,
                    'status'=>1,
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s'),
                );
                $this->Market->insertMarket($insertData);
            }
        }
        redirect('vendor/profile/settings');
    }
    public function updateMarketStatus(){
        $markets=$this->input->post('market');
        foreach($markets as $key=>$item){
            if(empty($item['status']))
                $status=0;
            else
                $status=1;       
            
            $this->Market->updateVendorMarketStatus($key,$status);
        }
        redirect('vendor/profile/settings');
    }
}
