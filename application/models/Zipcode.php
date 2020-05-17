<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/stripe/vendor/autoload.php';
class Zipcode extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    public function validate($zipcode=""){
        if(empty($zipcode))
            return $zipcode;
        
        //check if this zipcode is in db or not 
        $this->db->where('zipcode',$zipcode);
        $query=$this->db->get('zipcodes');
        $result=$query->row_array();
        if(!empty($result))
            return $zipcode;
        
        //check the third party api from here and get the zipcode from them
        $url=ZIP_URL.ZIP_API."/info.json/".$zipcode."/degrees";
        $json_response=file_get_contents($url,false, stream_context_create(['http' => ['ignore_errors' => true]]));
        $response=json_decode($json_response);
        if(empty($response->error_code)){
            //valid zip add data entry
            $insertData=array(
                'zipcode'=>$response->zip_code,
                'lat'=>$response->lat,
                'lng'=>$response->lng,
                'city'=>$response->city,
                'state'=>$response->state
            );
            $this->db->insert('zipcodes',$insertData);

            return $zipcode;
        }   
        else
            return "";
    }
}