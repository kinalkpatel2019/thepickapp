<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Vendor_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Product');
        $this->load->model('Category');
        $this->load->model('Unit');
        $this->load->model('Inventory');
    }
	public function index(){
        $products=$this->Product->getAllRedordsWithCategory(array('products.vendor_id'=>$this->vendor['id']),'all');
        $this->template_data=array(
            'main_content'=>'vendor/products/index',
            'products'=>$products
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());
    }
    public function add(){
        $categories=$this->Category->getAllRedords();
        $this->template_data=array(
            'main_content'=>'vendor/products/add',
            'categories'=>$categories
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());
    }
    public function edit($id){
        $categories=$this->Category->getAllRedords();
        $product=$this->Product->getRedordById($id);
        $images=$this->Product->getImages($id);
        $this->template_data=array(
            'main_content'=>'vendor/products/edit',
            'categories'=>$categories,
            'product'=>$product,
            'images'=>$images
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());
    }
    public function insertproduct(){
        $title=$this->input->post('title');
        $category_id=$this->input->post('category_id');
        $description=$this->input->post('description');

        //upload logo
        $mainimage="";
        $filename="";
        $oldImageFilename=$_FILES['mainimage']['name'];
        $ext_array=explode('.',$oldImageFilename);
        $ext=end($ext_array);
        $filename=uniqid().'.'.$ext;
        $config['upload_path'] = 'uploads/products/'; 
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '5000';
        $config['file_name'] = $filename;
        $this->load->library('upload',$config); 
        if($this->upload->do_upload('mainimage')){
            $mainimage=$filename;
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
                }
            }
        }

        $insertData=array(
			'title'=>$title,
			'category_id'=>$category_id,
			'description'=>$description,
			'vendor_id'=>$this->vendor['id'],
            'status'=>1,
            'image'=>$mainimage,
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
        redirect('vendor/products');
        
    }
    public function updateProduct(){
        $id=$this->input->post('id');
        $title=$this->input->post('title');
        $category_id=$this->input->post('category_id');
        $description=$this->input->post('description');

        $product=$this->Product->getRedordById($id);
        $images_data=$this->Product->getImages($id);

        $updateData=array(
			'title'=>$title,
			'category_id'=>$category_id,
			'description'=>$description,
			'updated_at'=>date('Y-m-d h:i:s')
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
        redirect('vendor/products');
    }
    public function inventories($product_id){
        $product=$this->Product->getRedordById($product_id);
        $packsizes=$this->Unit->getAllRedords();
        $units=$this->Unit->getAllRedords(array('iscontainer'=>0));
        $inventories=$this->Inventory->getAllRedords(array('product_id'=>$product_id));
        $this->template_data=array(
            'main_content'=>'vendor/products/inventories',
            'product'=>$product,
            'packsizes'=>$packsizes,
            'units'=>$units,
            'inventories'=>$inventories,
            'product_id'=>$product_id
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());
    }
    public function addInventory(){
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
        redirect('vendor/products/inventories/'.$product_id);
    }
    public function deleteInventory($id,$product_id){
        $this->Inventory->delete($id);
        redirect('vendor/products/inventories/'.$product_id);
    }
    public function updateInventory(){
        $id=$this->input->post('id');
        $product_id=$this->input->post('product_id');
        $availableqty=$this->input->post('availableqty');
        $price=$this->input->post('price');
        $updateData=array(
            'price'=>$price,
            'availableqty'=>$availableqty
        );
        $this->Inventory->update($updateData,$id);
        redirect('vendor/products/inventories/'.$product_id);
    }
}
