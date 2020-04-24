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
        $this->template_data=array(
            'main_content'=>'vendor/products/edit',
            'categories'=>$categories,
            'product'=>$product
        );
        $this->load->view('template/vendor/index',$this->generateTemplateData());
    }
    public function insertproduct(){
        $title=$this->input->post('title');
        $category_id=$this->input->post('category_id');
        $description=$this->input->post('description');

        $insertData=array(
			'title'=>$title,
			'category_id'=>$category_id,
			'description'=>$description,
			'vendor_id'=>$this->vendor['id'],
			'status'=>1,
			'created_at'=>date('Y-m-d h:i:s'),
			'updated_at'=>date('Y-m-d h:i:s')
		);
        $product_id=$this->Product->insert($insertData);
        redirect('vendor/products');
        
    }
    public function updateProduct(){
        $id=$this->input->post('id');
        $title=$this->input->post('title');
        $category_id=$this->input->post('category_id');
        $description=$this->input->post('description');

        $updateData=array(
			'title'=>$title,
			'category_id'=>$category_id,
			'description'=>$description,
			'updated_at'=>date('Y-m-d h:i:s')
		);
        $product_id=$this->Product->update($updateData,$id);
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
