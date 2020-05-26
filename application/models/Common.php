<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function createThumbnail($source,$destination,$width="",$height=""){
        $this->load->library('image_lib');

        $config['image_library'] = 'gd2';
        $config['source_image'] = $source;
        $config['new_image'] = $destination;
        //$config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        if(!empty($width))
            $config['width'] = $width;
        if(!empty($height))
            $config['height'] = $height;

        $this->image_lib->initialize($config);
        $this->image_lib->resize();

    }
    
}