<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/stripe/vendor/autoload.php';
class StripeModel extends CI_Model {

    public function __construct(){
        parent::__construct();
        \Stripe\Stripe::setApiKey(STRIPE_SECRET);
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
        
        $login_link=\Stripe\Account::createLoginLink($stripe_user_id);
        return $login_link;
    }
    public function getStripeCustomer($consumer_id){
        $this->db->where('user_id',$consumer_id);
        $query=$this->db->get('stripecustomers');
        $result=$query->row_array();
        if(!empty($result))
            return $result['customer_id'];
        
        //create new customer and add in stripecustomers
        $response=\Stripe\Customer::create([
            'email' => $this->consumer['email'],
            'name'=>$this->consumer['firstname']." ".$this->consumer['lastname']
        ]);

        $insertdata=array(
            'user_id'=>$consumer_id,
            'customer_id'=>$response->id
        );
        $this->db->insert('stripecustomers',$insertdata);

        return $response->id;
    }  
    public function setPaymentMethod($customer_id,$token){
        $response=\Stripe\Customer::createSource(
            $customer_id,
            ['source' => $token]
          );
        $result=array(
            "id"=>$response->id,
            'last4'=>$response->last4
        );
        return $result;
    }
    public function doCharge($order){
        $response=\Stripe\Charge::create([
            'amount' => ($order['grandtotal']*100),
            'currency' => STRIPE_CURRENCY,
            'customer'=>$order['customer_id'],
            'source' => $order['payment_method'],
            'transfer_group'=>'ORDER-'.$order['id']
          ]);

        if(!empty($response->id)){
            //id is there 
            $insertData=array(
                'order_id'=>$order['id'],
                'user_id'=>$order['user_id'],
                'charge_id'=>$response->id,
                'amount'=>($response->amount)/100,
                'amount_refunded'=>($response->amount_refunded)/100,
                'created'=>$response->created,
                'currency'=>$response->currency,
                'livemode'=>$response->livemode,
                'payment_method'=>$response->payment_method,
                'receipt_url'=>$response->receipt_url,
                'status'=>$response->status,
            );
            $this->db->insert('stripecharges',$insertData);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        else
            return false;
    }
    public function doTransfer($vendor,$order_id,$charge_id){
        if(empty($vendor['stripe_user_id']))
            return false;
        
        $response=\Stripe\Transfer::create([
                'amount' => $vendor['vendoramount']*100,
                'currency' => STRIPE_CURRENCY,
                'destination' => $vendor['stripe_user_id'],
                'transfer_group' => 'ORDER-'.$order_id,
              ]);
        if(!empty($response->id)){
            $insertData=array(
                'order_id'=>$order_id,
                'charge_id'=>$charge_id,
                'vendor_id'=>$vendor['vendor_id'],
                'transfer_id'=>$response->id,
                'amount'=>($response->amount)/100,
                'amount_reversed'=>$response->amount_reversed/100,
                'created'=>$response->created,
                'currency'=>$response->currency,
                'livemode'=>$response->livemode,
                'destination'=>$response->destination,
                'destination_payment'=>$response->destination_payment,
                'transfer_group'=>$response->transfer_group,
            );
            $this->db->insert('stripetransfers',$insertData);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        else
            return false;
    }
}