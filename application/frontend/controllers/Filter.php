<?php defined('BASEPATH') OR exit('No direct script access allowed');

class filter extends CI_Controller {

public function __construct()
{
    parent::__construct();

    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->model('common_model');
    $this->load->model('coupon_model');
  
}



  function get_brand_detail()
  {
      $segment= $this->input->post('segment');
     // print_R($segment);
      //getseg_brand_list
      $res_filter_brand_list = $this->common_model->getseg_brand_list($segment);
      /*$options = array(
        array('value' => '1', 'text' => 'Option 1'),
        array('value' => '2', 'text' => 'Option 2'),
        array('value' => '3', 'text' => 'Option 3'),
        // Add more options as needed
    );*/
      http_response_code(200);
      echo json_encode(array("status"=>"1","data"=>$res_filter_brand_list)); 
   

  }
  function get_filter_class_detail()
  {
    $segment= $this->input->post('segment');
    $brand_id= $this->input->post('brand_id');
    $res_filter_brand_list = $this->common_model->get_filter_class_detail($segment,$brand_id);
    http_response_code(200);
    echo json_encode(array("status"=>"1","data"=>$res_filter_brand_list)); 

  }

 
}
?>