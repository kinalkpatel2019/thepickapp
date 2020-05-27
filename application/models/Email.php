<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Market');
        $this->load->model('Product');
        $this->from_address="info@example.com";
        $this->from_name="The Pick App";
        $this->config=array(
            'charset'=>'utf-8',
            'wordwrap'=> TRUE,
            'mailtype' => 'html'
        );
    }

    public function sendRegisterEmailtoUser($userdata){
        $email_content=$this->load->view('template/email/users/registeruser',$userdata,true);
        $this->send($this->from_address,$this->from_name,$userdata['email'],"Welcome to ".THE_APP_NAME."!",$email_content);
    }
    public function sendRegisterEmailtoAdmin($userdata){
        $email_content=$this->load->view('template/email/users/registeradmin',$userdata,true);
        $actype=($userdata['accounttype']==1) ? "Vendor" : "Customer";
        $this->send($this->from_address,$this->from_name,ADMIN_EMAIL,"New ".$actype." has been registered!",$email_content);
    }
    public function sendOTPtoUser($userdata){
        $email_content=$this->load->view('template/email/users/otp',$userdata,true);
        $actype=($userdata['accounttype']==1) ? "Vendor" : "Customer";
        $this->send($this->from_address,$this->from_name,$userdata['email'],"Password Reset! - OTP",$email_content);
    }
    public function sendResetPassword($userdata){
        $email_content=$this->load->view('template/email/users/resetpassword',$userdata,true);
        $this->send($this->from_address,$this->from_name,$userdata['email'],"Reset Password",$email_content);
    }
    public function sendVendorEnrollmentToMarketmanager($vendor_id,$market_id){
        //get the vendor information
        $where=array(
            'users.id'=>$vendor_id,
        );
        $user=$this->User->getUserWithProfile($where);   
        //get the market information
        $market=$this->Market->getMarketById($market_id);

        if(!empty($user) && !empty($market))
        {
            //get the market managers
            $managers=$this->Market->getMarketManagers($market_id);
            
            foreach($managers as $manager){
                $data=array(
                    'market'=>$market,
                    'manager'=>$manager,
                    'vendor'=>$user
                );
                $email_content=$this->load->view('template/email/vendor/profile/updateSettings',$data,true);
                $this->send($this->from_address,$this->from_name,$manager['email'],"New Vendor Enrolled To the Market! - ".$market['title'],$email_content);
            }
        }
    }
    public function sendProductEnrollmentToMarketmanager($vendor_id,$product_id){
         //get the vendor information
        $where=array(
            'users.id'=>$vendor_id,
        );
        $vendor=$this->User->getUserWithProfile($where);   

        //get product information 
        $product=$this->Product->getRedordById($product_id);

        $markets=$product['markets'];
        $market_array=explode(',',$markets);
        foreach($market_array as $market_id){
            //get market info 
            $market=$this->Market->getMarketById($market_id);

            if(!empty($vendor) && !empty($market))
            {
                //get the market managers
                $managers=$this->Market->getMarketManagers($market_id);
                
                foreach($managers as $manager){
                    $data=array(
                        'market'=>$market,
                        'manager'=>$manager,
                        'vendor'=>$vendor,
                        'product'=>$product,
                    );
                    $email_content=$this->load->view('template/email/vendor/products/add',$data,true);
                    $this->send($this->from_address,$this->from_name,$manager['email'],"New Item Added To the Market! - ".$market['title'],$email_content);
                }
            }
        }
    }

    public function send($fromaddress,$fromname,$to,$subject,$email_content){
        $this->email->initialize($this->config);            
        $this->email->from($fromaddress, $fromname);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($email_content);
        $this->email->send();
    }
    
    
}