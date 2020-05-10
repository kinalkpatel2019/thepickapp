<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Cart extends CI_Cart {
    public function __construct($params = array())
	{
        parent::__construct();
        if ($this->_cart_contents === NULL)
		{
			// No cart exists so we'll set some base values
			$this->_cart_contents = array('cart_total' => 0, 'total_items' => 0, 'coupon'=>'','discount'=>0,'final_total'=>0,'fee'=>0);
		}
    }
    public function addCoupon($data){
        if(empty($data['code']) || empty($data['discount']))
            return;
        
        $this->_cart_contents['coupon']=$data['code'];
        $this->_cart_contents['discount']=$data['discount'];
        $this->_save_cart();
	}
	public function setFee($fee){
        if(empty($fee))
            return;
        
        $this->_cart_contents['fee']=$fee;
        $this->_save_cart();
    }
    public function removeCoupon(){
        $this->_cart_contents['coupon']="";
        $this->_cart_contents['discount']=0;
        $this->_save_cart();
    }
    public function final_total()
	{
		return (empty($this->_cart_contents['final_total'])) ? 0 : $this->_cart_contents['final_total'];
    }
    public function coupon()
	{
        $result=array(
            'code'=>(empty($this->_cart_contents['coupon'])) ? '' : $this->_cart_contents['coupon'],
            'discount'=>(empty($this->_cart_contents['discount'])) ? 0 : $this->_cart_contents['discount']
        );
		return $result;
	}
	public function fee()
	{
		return (empty($this->_cart_contents['fee'])) ? 0 : $this->_cart_contents['fee'];
	}
	public function removefee()
	{
		$this->_cart_contents['fee']=0;
        $this->_save_cart();
    }
    protected function _save_cart()
	{
		// Let's add up the individual prices and set the cart sub-total
        $this->_cart_contents['total_items'] = $this->_cart_contents['cart_total'] = $this->_cart_contents['final_total'] = 0;
		foreach ($this->_cart_contents as $key => $val)
		{
			// We make sure the array contains the proper indexes
			if ( ! is_array($val) OR ! isset($val['price'], $val['qty']))
			{
				continue;
			}
			if(!empty($val['tax']))
				$this->_cart_contents['cart_total'] += (($val['price'] * $val['qty']) + ($val['price'] * $val['qty'] * $val['tax']/100));
			else
				$this->_cart_contents['cart_total'] += ($val['price'] * $val['qty']);
			
			$this->_cart_contents['total_items'] += $val['qty'];

			if(!empty($this->_cart_contents[$key]['tax']))
				$this->_cart_contents[$key]['subtotal'] = ($this->_cart_contents[$key]['price'] * $this->_cart_contents[$key]['qty']) + (($this->_cart_contents[$key]['price'] * $this->_cart_contents[$key]['qty'] * $this->_cart_contents[$key]['tax']/100));
			else
				$this->_cart_contents[$key]['subtotal'] = ($this->_cart_contents[$key]['price'] * $this->_cart_contents[$key]['qty']);
		}

		// Is our cart empty? If so we delete it from the session
		if (count($this->_cart_contents) <= 2)
		{
			$this->CI->session->unset_userdata('cart_contents');
			// Nothing more to do... coffee time!
			return FALSE;
		}
		if($this->_cart_contents['total_items'] == 0){
			$this->CI->session->unset_userdata('cart_contents');
			// Nothing more to do... coffee time!
			return FALSE;
		}
        if(!empty($this->_cart_contents['coupon']) && !empty($this->_cart_contents['discount']))
            $this->_cart_contents['final_total'] = $this->_cart_contents['cart_total'] - $this->_cart_contents['discount'];
        else
			$this->_cart_contents['final_total']=$this->_cart_contents['cart_total'];

		if(!empty($this->_cart_contents['fee']))
			$this->_cart_contents['final_total']=$this->_cart_contents['final_total']+$this->_cart_contents['fee'];

		// If we made it this far it means that our cart has data.
		// Let's pass it to the Session class so it can be stored
		$this->CI->session->set_userdata(array('cart_contents' => $this->_cart_contents));

		// Woot!
		return TRUE;
    }
    public function contents($newest_first = FALSE)
	{
		// do we want the newest first?
		$cart = ($newest_first) ? array_reverse($this->_cart_contents) : $this->_cart_contents;

		// Remove these so they don't create a problem when showing the cart table
		unset($cart['total_items']);
        unset($cart['cart_total']);
        unset($cart['coupon']);
		unset($cart['discount']);
		unset($cart['fee']);
		unset($cart['final_total']);
		
		return $cart;
	}

}