<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/stripe/vendor/autoload.php';
class StripeModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function addStripeAccount($data){
        $this->db->insert('stripeaccounts',$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function getStripeAccount($user_id){
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('stripeaccounts');
        $result=$query->row_array();
        return $result;
    }
    public function getStripeLoginLink($stripe_user_id){
        \Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $login_link=\Stripe\Account::createLoginLink($stripe_user_id);
        return $login_link;
    }
}