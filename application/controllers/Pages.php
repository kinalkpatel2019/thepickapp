<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function home()
	{
		$template_data=array(
			'main_content'=>'pages/home'
		);
		$this->load->view('template/front/index',$template_data);
	}
}
