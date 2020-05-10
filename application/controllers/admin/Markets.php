<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Markets extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Market');
    }
	public function index(){
        $markets=$this->Market->getAllRedords(array('1'=>1),'all');
        $this->template_data=array(
            'main_content'=>'studio/admin/markets/index',
            'markets'=>$markets,
            'CSSs'=>array(
                'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                'plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
                'plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'
                ),
            'JSs'=>array(
                'plugins/datatables.net/js/jquery.dataTables.min.js',
                'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'plugins/datatables.net-buttons/js/dataTables.buttons.min.js',
                'plugins/datatables.net-buttons/js/buttons.colVis.min.js',
                'plugins/datatables.net-buttons/js/buttons.flash.min.js',
                'plugins/datatables.net-buttons/js/buttons.html5.min.js',
                'plugins/datatables.net-buttons/js/buttons.print.min.js',
                'plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
                'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
                'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
                'js/inventories.js'
                )
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function add(){
        $this->template_data=array(
            'main_content'=>'studio/admin/markets/add',
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function insertmarket(){
        $title=$this->input->post('title');
        $location=$this->input->post('location');
        $description=$this->input->post('description');
        $fee=$this->input->post('fee');

        //upload logo
        $image="";
        $filename="";
        $oldImageFilename=$_FILES['image']['name'];
        $ext_array=explode('.',$oldImageFilename);
        $ext=end($ext_array);
        $filename=uniqid().'.'.$ext;
        $config['upload_path'] = 'uploads/markets/'; 
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '5000';
        $config['file_name'] = $filename;
        $this->load->library('upload',$config); 
        if($this->upload->do_upload('image')){
            $image=$filename;
        }

        $insertData=array(
			'title'=>$title,
			'location'=>$location,
			'description'=>$description,
			'fee'=>$fee,
            'status'=>1,
            'image'=>$image,
			'created_at'=>date('Y-m-d h:i:s'),
			'updated_at'=>date('Y-m-d h:i:s')
		);
        $market_id=$this->Market->insert($insertData);
        redirect('admin/markets/');
    }

    public function edit($id){
        $market=$this->Market->getMarketById($id);
        $this->template_data=array(
            'market'=>$market,
            'main_content'=>'studio/admin/markets/edit',
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function updatemarket(){
        $id=$this->input->post('id');
        $title=$this->input->post('title');
        $location=$this->input->post('location');
        $description=$this->input->post('description');
        $fee=$this->input->post('fee');

        $market=$this->Market->getMarketById($id);

        $updateData=array(
			'title'=>$title,
			'location'=>$location,
			'description'=>$description,
			'fee'=>$fee,
            'status'=>1,
			'created_at'=>date('Y-m-d h:i:s'),
			'updated_at'=>date('Y-m-d h:i:s')
        );
        
        if(isset($_FILES['image']['name'])){
            //upload processing image
            $image="";
            $filename="";
            $oldFilename=$_FILES['image']['name'];
            $ext_array=explode('.',$oldFilename);
            $ext=end($ext_array);
            $filename=uniqid().'.'.$ext;
            $config['upload_path'] = 'uploads/markets/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '5000';
            $config['file_name'] = $filename;
            $this->load->library('upload',$config); 
            $this->upload->initialize($config);
            if($this->upload->do_upload('image')){
                $image=$filename;
                 //unlink existing logo from logo folder
                if(file_exists('uploads/markets/'.$market['image'])){
                    unlink('uploads/markets/'.$market['image']);
                }
            }
            if(!empty($image))
                $updateData['image']=$image;
        }
 
        $market_id=$this->Market->update($updateData,$id);
        redirect('admin/markets/');
    }
}
