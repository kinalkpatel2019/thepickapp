<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends Admin_controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Message');
	}
	public function compose(){
		$this->template_data=array(
			'main_content'=>'studio/admin/messages/compose',
			'CSSs'=>array(
                'plugins/summernote/dist/summernote.css',
                'plugins/summernote/dist/summernote-bs4.css'
                ),
            'JSs'=>array(
                'plugins/summernote/dist/summernote.min.js',
                'plugins/summernote/dist/summernote-bs4.min.js',
                'js/demo/email-compose.demo.js'
                )
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function send(){
        $subject=$this->input->post('subject');
        $content=$this->input->post('text');

        $insertdata=array(
            'subject'=>$subject,
            'content'=>$content,
            'adminuser_id'=>$this->admin['id'],
            'created_at'=>date('Y-m-d h:i:s')
        );
        $this->Message->insert($insertdata);
        redirect('admin/messages/sent');
    }
    public function sent(){
        $messages=$this->Message->getAllRedords();
        $this->template_data=array(
            'main_content'=>'studio/admin/messages/sent',
            'messages'=>$messages,
			'CSSs'=>array(
                
                ),
            'JSs'=>array(
                
                )
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function view($id){
        $detail=$this->Message->getMessageById($id);
        $messages=$this->Message->getAllRedords();
        $this->template_data=array(
            'main_content'=>'studio/admin/messages/view',
            'detail'=>$detail,
            'messages'=>$messages,
			'CSSs'=>array(
                
                ),
            'JSs'=>array(
                
                )
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
}
