<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/stripe/vendor/autoload.php';
class Stripe extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('StripeModel');
	}
	
	public function connect_call_back(){
		$code=$this->input->get('code');
		
		\Stripe\Stripe::setApiKey(STRIPE_SECRET);

			$response = \Stripe\OAuth::token([
				'grant_type' => 'authorization_code',
				'code' => $code,
			]);

			// Access the connected account id in the response
			$connected_account_id = $response->stripe_user_id;
			$vendor=$this->session->userdata('vendor');
			$insertData=array(
				'user_id'=>$vendor['id'],
				'access_token'=>$response->access_token,
				'livemode'=>$response->livemode,
				'refresh_token'=>$response->refresh_token,
				'token_type'=>$response->token_type,
				'stripe_publishable_key'=>$response->stripe_publishable_key,
				'stripe_user_id'=>$response->stripe_user_id,
				'scope'=>$response->scope
			);

			$this->StripeModel->addStripeAccount($insertData);

			redirect('vendor/profile/stripe');
    }
}
