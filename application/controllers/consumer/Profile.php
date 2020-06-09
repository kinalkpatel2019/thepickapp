<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Consumer_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Zipcode');
    }
	public function index(){
        $user=$this->User->getUserWithProfile(array('users.id'=>$this->consumer['id']));
        $this->template_data=array(
            'main_content'=>'studio/consumer/profile/index',
            'user'=>$user,
            'JSs'=>array(
                'js/jquery.validate.min.js',
                'js/consumer-validation.js',
            ),
        );
        $this->load->view('studio/template/consumer/index',$this->generateTemplateData());
    }
    public function updateProfile(){
        $this->form_validation->set_rules('address1', 'Address1', 'trim|required');
        $this->form_validation->set_rules('address2', 'Address2', 'trim|required');
        $this->form_validation->set_rules('phonenumber', 'Phonenumber', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|min_length[5]|max_length[5]');
		
		if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to register page
            $this->index();
		}
		else{
                

            $address1=$this->input->post('address1');
            $address2=$this->input->post('address2');
            $phonenumber=$this->input->post('phonenumber');
            $zipcode=$this->input->post('zipcode');

            $zipcode=$this->Zipcode->validate($zipcode);

            $user_id=$this->consumer['id'];
            //get the user profile
            $profile=$this->User->getProfile($user_id);
            if(empty($profile)){
                //upload logo
                $image="";
                $filename="";
                $oldImageFilename=$_FILES['image']['name'];
                $ext_array=explode('.',$oldImageFilename);
                $ext=end($ext_array);
                $filename=uniqid().'.'.$ext;
                $config['upload_path'] = './uploads/users/'; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';
                $config['file_name'] = $filename;
                $this->load->library('upload',$config); 
                if($this->upload->do_upload('image')){
                    $image=$filename;
                     //create thumbail here 600 * 400
                     $this->Common->createThumbnail('./uploads/users/'.$filename,'./uploads/users/thumb/'.$filename,225,225);
                }

                //insert profile
                $insertData=array(
                    'address1'=>$address1,
                    'address2'=>$address2,
                    'phonenumber'=>$phonenumber,
                    'user_id'=>$user_id,
                    'zipcode'=>$zipcode,
                    'image'=>$image,
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s'),
                );
                $this->User->insertProfile($insertData);
            }
            else{
                //update profile
                $updateData=array(              
                    'address1'=>$address1,
                    'address2'=>$address2,
                    'phonenumber'=>$phonenumber,
                    'zipcode'=>$zipcode,
                    'updated_at'=>date('Y-m-d h:i:s'),
                );
                if(isset($_FILES['image']['name'])){
                    //upload processing image
                    $image="";
                    $filename="";
                    $oldFilename=$_FILES['image']['name'];
                    $ext_array=explode('.',$oldFilename);
                    $ext=end($ext_array);
                    $filename=uniqid().'.'.$ext;
                    $config['upload_path'] = './uploads/users/'; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = '5000';
                    $config['file_name'] = $filename;
                    $this->load->library('upload',$config); 
                    $this->upload->initialize($config);
                    if($this->upload->do_upload('image')){
                        $image=$filename;
                        //unlink existing logo from logo folder
                        if(file_exists('./uploads/users/'.$profile['image'])){
                            unlink('uploads/users/'.$profile['image']);
                        }
                        if(file_exists('./uploads/users/thumb/'.$profile['image'])){
                            unlink('./uploads/users/thumb/'.$profile['image']);
                        }
                        //create thumbail here 600 * 400
                        $this->Common->createThumbnail('./uploads/users/'.$filename,'./uploads/users/thumb/'.$filename,225,225);
                    }
                    if(!empty($image))
                        $updateData['image']=$image;
                }
                $this->User->updateProfile($updateData,$user_id);
            }
            $this->session->set_flashdata('success',"Your Profile has been updated!");
            redirect('consumer/profile');
        }
    }
}
