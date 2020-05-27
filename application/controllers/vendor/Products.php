<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Vendor_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Product');
        $this->load->model('Category');
        $this->load->model('Unit');
        $this->load->model('Inventory');
        $this->load->model('Market');
    }
	public function index(){
        $products=$this->Product->getAllRedordsWithCategory(array('products.vendor_id'=>$this->vendor['id']),'all');
        $this->template_data=array(
            'main_content'=>'studio/vendor/products/index',
            'products'=>$products
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    public function add(){
        $categories=$this->Category->getAllRedords();
        $markets=$this->Market->getVendorMarket($this->vendor['id']);
        $this->template_data=array(
            'main_content'=>'studio/vendor/products/add',
            'categories'=>$categories,
            'markets'=>$markets,
            'CSSs'=>array('plugins/bootstrap-select/dist/css/bootstrap-select.min.css'),
            'JSs'=>array('plugins/bootstrap-select/dist/js/bootstrap-select.min.js','js/repeatable-fields.js','js/product.js','js/jquery.validate.min.js',
            'js/vendor-validation.js')
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    public function edit($id){
        $categories=$this->Category->getAllRedords();
        $product=$this->Product->getRedordById($id);
        $images=$this->Product->getImages($id);
        $markets=$this->Market->getVendorMarket($this->vendor['id']);
        $this->template_data=array(
            'main_content'=>'studio/vendor/products/edit',
            'categories'=>$categories,
            'product'=>$product,
            'images'=>$images,
            'markets'=>$markets,
            'CSSs'=>array('plugins/bootstrap-select/dist/css/bootstrap-select.min.css'),
            'JSs'=>array('plugins/bootstrap-select/dist/js/bootstrap-select.min.js','js/repeatable-fields.js','js/product.js','js/jquery.validate.min.js',
            'js/vendor-validation.js')
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    public function insertproduct(){
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('markets[]', 'Markets', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to register page
            $this->add();
		}
		else{
                $title=$this->input->post('title');
                $category_id=$this->input->post('category_id');
                $description=$this->input->post('description');
                $is_taxable=$this->input->post('is_taxable');
                $tax=$this->input->post('tax');
                $is_comment=$this->input->post('is_comment');
                $markets=$this->input->post('markets');
                $market_str=implode(',',$markets);
                

                //upload logo
                $mainimage="";
                $filename="";
                $oldImageFilename=$_FILES['mainimage']['name'];
                $ext_array=explode('.',$oldImageFilename);
                $ext=end($ext_array);
                $filename=uniqid().'.'.$ext;
                $config['upload_path'] = './uploads/products/'; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';
                $config['file_name'] = $filename;
                $this->load->library('upload',$config); 
                if($this->upload->do_upload('mainimage')){
                    $mainimage=$filename;

                    //create thumbail here 230 
                    $this->Common->createThumbnail('./uploads/products/'.$filename,'./uploads/products/thumb230/'.$filename,230);

                    //create thumbail here 600 * 400
                    $this->Common->createThumbnail('./uploads/products/'.$filename,'./uploads/products/thumb600/'.$filename,600,400);
                }

                $images=array();
                $count = count($_FILES['images']['name']);
                for($i=0;$i<$count;$i++){
                    if(!empty($_FILES['images']['name'][$i])){

                    $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                    $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                    $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                    $_FILES['image']['error'] = $_FILES['images']['error'][$i];
                    $_FILES['image']['size'] = $_FILES['images']['size'][$i];

                    $filename="";
                    $oldFilename=$_FILES['images']['name'][$i];
                    $ext_array=explode('.',$oldFilename);
                    $ext=end($ext_array);
                    $filename=uniqid().'.'.$ext;
                    $config['upload_path'] = 'uploads/products/images'; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = '5000';
                    $config['file_name'] =$filename;
                    $this->load->library('upload',$config); 
                    $this->upload->initialize($config);
                        if($this->upload->do_upload('image')){
                            $images[] = $filename;

                            //create thumbail here 230 
                            $this->Common->createThumbnail('./uploads/products/images/'.$filename,'./uploads/products/images/thumb230'.$filename,230);

                            //create thumbail here 600 * 400
                            $this->Common->createThumbnail('./uploads/products/images/'.$filename,'./uploads/products/images/thumb600'.$filename,600,400);
                        }
                    }
                }

                if($is_taxable==0)
                    $tax=0;

                $insertData=array(
                    'title'=>$title,
                    'category_id'=>$category_id,
                    'description'=>$description,
                    'vendor_id'=>$this->vendor['id'],
                    'status'=>1,
                    'image'=>$mainimage,
                    'is_taxable'=>$is_taxable,
                    'tax'=>$tax,
                    'is_comment'=>$is_comment,
                    'markets'=>$market_str,
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s')
                );
                $product_id=$this->Product->insert($insertData);

                $i_data=array();
                $i=0;
                foreach($images as $image){
                    $i_data=array(
                        'product_id'=>$product_id,
                        'image'=>$image,
                        'sortorder'=>$i,
                    );
                    $this->Product->insertImage($i_data);
                    $i++;
                }
                $this->session->set_flashdata('success',"Product has been added!");
                 //send email to market manager
                 $this->Email->sendProductEnrollmentToMarketmanager($this->vendor['id'],$product_id);
                //end 
                redirect('vendor/products/inventories/'.$product_id);
        }
    }
    public function updateProduct(){
        $id=$this->input->post('id');
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('markets[]', 'Markets', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to register page
            $this->edit($id);
		}
		else{
                
            $id=$this->input->post('id');
            $title=$this->input->post('title');
            $category_id=$this->input->post('category_id');
            $description=$this->input->post('description');
            $is_taxable=$this->input->post('is_taxable');
            $tax=$this->input->post('tax');
            $is_comment=$this->input->post('is_comment');

            $markets=$this->input->post('markets');
            $market_str=implode(',',$markets);
            
            $product=$this->Product->getRedordById($id);
            $images_data=$this->Product->getImages($id);
        
            if($is_taxable==0)
                $tax=0;

            $updateData=array(
                'title'=>$title,
                'category_id'=>$category_id,
                'description'=>$description,
                'is_taxable'=>$is_taxable,
                'tax'=>$tax,
                'updated_at'=>date('Y-m-d h:i:s'),
                'is_comment'=>$is_comment,
                'markets'=>$market_str,
            );
            
            if(isset($_FILES['mainimage']['name'])){
                //upload processing image
                $image="";
                $filename="";
                $oldFilename=$_FILES['mainimage']['name'];
                $ext_array=explode('.',$oldFilename);
                $ext=end($ext_array);
                $filename=uniqid().'.'.$ext;
                $config['upload_path'] = 'uploads/products/'; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';
                $config['file_name'] = $filename;
                $this->load->library('upload',$config); 
                $this->upload->initialize($config);
                if($this->upload->do_upload('mainimage')){
                    $image=$filename;
                    //unlink existing logo from logo folder
                    if(file_exists('uploads/products/'.$product['image'])){
                        unlink('uploads/products/'.$product['image']);
                    }
                    if(file_exists('uploads/products/thumb230/'.$product['image'])){
                        unlink('uploads/products/thumb230/'.$product['image']);
                    }
                    if(file_exists('uploads/products/thumb600/'.$product['image'])){
                        unlink('uploads/products/thumb600/'.$product['image']);
                    }
                    //create thumbail here 230 
                    $this->Common->createThumbnail('./uploads/products/'.$image,'./uploads/products/thumb230/'.$image,230);

                    //create thumbail here 600 * 400
                    $this->Common->createThumbnail('./uploads/products/'.$image,'./uploads/products/thumb600/'.$image,600,400);

                }
                if(!empty($image))
                    $updateData['image']=$image;
            }

            /*echo "<pre>";
            print_r($_FILES['images']);*/
            $image_id_array=$this->input->post('image_id');
            
            $removed_images=array();
            foreach($images_data as $key=>$val){
                if(!in_array($val['id'],$image_id_array))
                {
                    $removed_images[]=$val['id'];
                    //remove it from database
                    $this->Product->removeImage($val['id']);
                    //remove it from folder
                    if(file_exists('uploads/products/images/'.$val['image'])){
                        unlink('uploads/products/images/'.$val['image']);
                    }

                    if(file_exists('uploads/products/images/thumb230/'.$val['image'])){
                        unlink('uploads/products/images/thumb230/'.$val['image']);
                    }
                    if(file_exists('uploads/products/images/thumb600/'.$val['image'])){
                        unlink('uploads/products/images/thumb600/'.$val['image']);
                    }

                }
                
            }
            //now add/update upload images with sorting as well
            $start=0;
            foreach($image_id_array as $key=>$item){
                //
                if($item=='new')
                {
                    //upload the item and ready image data
                    $_FILES['image']['name'] = $_FILES['images']['name'][$key];
                    $_FILES['image']['type'] = $_FILES['images']['type'][$key];
                    $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
                    $_FILES['image']['error'] = $_FILES['images']['error'][$key];
                    $_FILES['image']['size'] = $_FILES['images']['size'][$key];

                    $filename="";
                    $oldFilename=$_FILES['images']['name'][$key];
                    $ext_array=explode('.',$oldFilename);
                    $ext=end($ext_array);
                    $filename=uniqid().'.'.$ext;
                    $config['upload_path'] = 'uploads/products/images/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = '5000';
                    $config['file_name'] =$filename;
                    $this->load->library('upload',$config); 
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('image')){
                        $i_data=array(
                            'product_id'=>$id,
                            'image'=>$filename,
                            'sortorder'=>$start,
                        );
                        $this->Product->insertImage($i_data);

                         //create thumbail here 230 
                        $this->Common->createThumbnail('./uploads/products/images/'.$filename,'./uploads/products/images/thumb230/'.$filename,230);

                        //create thumbail here 600 * 400
                        $this->Common->createThumbnail('./uploads/products/images/'.$filename,'./uploads/products/images/thumb600/'.$filename,600,400);
                    }
                }
                else{
                    //update the sortorder
                    $u_data=array(
                        'sortorder'=>$start,
                    );
                    $this->Product->updateImage(array('id'=>$item),$u_data);
                }
                $start++;
            }

            $this->Product->update($updateData,$id);
            $this->session->set_flashdata("success","Product Has been updated!");
            redirect('vendor/products/inventories/'.$id);
        }
    }
    public function inventories($product_id){
        $product=$this->Product->getRedordById($product_id);
        $packsizes=$this->Unit->getAllRedords();
        $units=$this->Unit->getAllRedords(array('iscontainer'=>0));
        $inventories=$this->Inventory->getAllRedords(array('product_id'=>$product_id));
        $this->template_data=array(
            'main_content'=>'studio/vendor/products/inventories',
            'product'=>$product,
            'packsizes'=>$packsizes,
            'units'=>$units,
            'inventories'=>$inventories,
            'product_id'=>$product_id,
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
                'js/jquery.validate.min.js',
                'js/vendor-validation.js',
                )
        );
        $this->load->view('studio/template/vendor/index',$this->generateTemplateData());
    }
    public function addInventory(){
        $this->form_validation->set_rules('product_id', 'Product', 'trim|required');
        $this->form_validation->set_rules('packsize', 'Pack Size', 'trim|required');
        $this->form_validation->set_rules('availableqty', 'Available Qty', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to register page
            $this->inventories();
		}
		else{

            $product_id=$this->input->post('product_id');
            $packsize=$this->input->post('packsize');
            $unit=$this->input->post('unit');
            $quantity=$this->input->post('quantity');
            $availableqty=$this->input->post('availableqty');
            $price=$this->input->post('price');

            //generate unit name 
            $unit_code="";
            $packsize_unit=$this->Unit->getUnitById($packsize);
            if($packsize_unit['iscontainer']==1){
                $unit_unit=$this->Unit->getUnitById($unit);
                $unit_code=$quantity." ".$unit_unit['code']."/".$packsize_unit['code'];
            }
            else{
                $unit_code=$packsize_unit['code'];
            }
            //now add into the inventoris 
            $insertData=array(
                'product_id'=>$product_id,
                'unit'=>$unit_code,
                'price'=>$price,
                'availableqty'=>$availableqty,
                'status'=>1,
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s'),
            );
            $this->Inventory->insert($insertData);

            $this->session->set_flashdata("success","Inventory has been added!");
            redirect('vendor/products/inventories/'.$product_id);
        }
    }
    public function deleteInventory($id,$product_id){
        $this->Inventory->delete($id);
        $this->session->set_flashdata("success","Inventory has been deleted!");
        redirect('vendor/products/inventories/'.$product_id);
    }
    public function updateInventory(){
        $this->form_validation->set_rules('product_id', 'Product', 'trim|required');
        $this->form_validation->set_rules('id', 'Inventory', 'trim|required');
        $this->form_validation->set_rules('availableqty', 'Available Qty', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to register page
            $this->inventories();
		}
		else{
            $id=$this->input->post('id');
            $product_id=$this->input->post('product_id');
            $availableqty=$this->input->post('availableqty');
            $price=$this->input->post('price');
            $updateData=array(
                'price'=>$price,
                'availableqty'=>$availableqty
            );
            $this->Inventory->update($updateData,$id);
            $this->session->set_flashdata("success","Inventory has been updated!");
            redirect('vendor/products/inventories/'.$product_id);
        }
    }
    public function delete($id){
        $this->Product->deleteProduct($id);
        $this->session->set_flashdata("success","Product has been deleted!");
        redirect('vendor/products');
    }
}
