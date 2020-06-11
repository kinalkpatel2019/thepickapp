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
                'js/inventories.js',
            )
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function add(){
        $this->template_data=array(
            'main_content'=>'studio/admin/markets/add',
            'EX'=>array(
                'https://maps.googleapis.com/maps/api/js?key='.GOOGLE_MAP_API_KEY.'&&libraries=places&callback=initMap'
            ),
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function insertmarket(){
        $title=$this->input->post('title');
        $location=$this->input->post('location');
        $description=$this->input->post('description');
        $fee=$this->input->post('fee');

        $lat=$this->input->post('lat');
        $lng=$this->input->post('lng');
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
            'lat'=>$lat,
            'lng'=>$lng,
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
            'EX'=>array(
                'https://maps.googleapis.com/maps/api/js?key='.GOOGLE_MAP_API_KEY.'&&libraries=places&callback=initMap'
            ),
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function updatemarket(){
        $id=$this->input->post('id');
        $title=$this->input->post('title');
        $location=$this->input->post('location');
        $description=$this->input->post('description');
        $fee=$this->input->post('fee');

        $lat=$this->input->post('lat');
        $lng=$this->input->post('lng');

        $market=$this->Market->getMarketById($id);

        $updateData=array(
			'title'=>$title,
			'location'=>$location,
			'description'=>$description,
			'fee'=>$fee,
            'status'=>1,
            'lat'=>$lat,
            'lng'=>$lng,
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
    public function vendors($id){
        if(empty($id))
            redirect('admin/markets');
        $market=$this->Market->getMarketById($id);
        $vendors=$this->Market->getAllVendorsByMarketID($id);
        $this->template_data=array(
            'market'=>$market,
            'vendors'=>$vendors,
            'main_content'=>'studio/admin/markets/vendors',            
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());

    }
    public function setStatus(){
        $market_id=$this->input->get('market_id');
        $vendor_id=$this->input->get('vendor_id');
        $status=$this->input->get('status');
        if(empty($market_id) || empty($vendor_id))
            redirect('admin/markets');
        
        $this->Market->updateManagerMarketStatus($market_id,$vendor_id,$status);

        redirect('admin/markets/vendors/'.$market_id);
    }

    public function arrange($id){
        if(empty($id))
            redirect('admin/markets');
        $market=$this->Market->getMarketById($id);
        $vendors=$this->Market->getAllVendorsByMarketID($id);
        $this->template_data=array(
            'market'=>$market,
            'vendors'=>$vendors,
            'main_content'=>'studio/admin/markets/arrange',
            'EXC'=>array(
                '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
            ),
            'EX'=>array(
                'https://code.jquery.com/ui/1.12.1/jquery-ui.js'
            ),
            'JSs'=>array(
                'js/vendorsort.js'
            ),

        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function updateSort(){
        $id=$this->input->post('id');
        $vendor=$this->input->post('vendor');
        foreach($vendor as $vendor_id=>$order){
            $this->Market->updateMarketSortOrder($id,$vendor_id,$order);
        }
        redirect('admin/markets/arrange/'.$id);
    }
    public function settings($id){
        if(empty($id))
        redirect('admin/markets');
        $market=$this->Market->getMarketById($id);
        $settings=$this->Market->getMarketSettings($id);
        if(empty($settings))
        {
            for($i=0;$i<7;$i++){
                $settings[]=array(
                    'day'=>($i+1),
                    'openingtime'=>"09:00",
                    'closingtime'=>"18:00",
                    'slotinterval'=>"15",
                    'slotlimit'=>"0",
                    'status'=>1,
                );
            }
        }
        $this->template_data=array(
            'market'=>$market,
            'main_content'=>'studio/admin/markets/settings',
            'settings'=>$settings
        );
        $this->load->view('studio/template/admin/index',$this->generateTemplateData());
    }
    public function updateSettings(){
        $id=$this->input->post('id');
        $post=$this->input->post();
        if(empty($id))
        redirect('admin/markets');
            $market=$this->Market->getMarketById($id);
        
        $this->Market->updateTimimg($post,$id);

        $this->session->set_flashdata('success','Settings have been updated!');
        redirect('admin/markets');
        
    }
}
