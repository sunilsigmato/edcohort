<?php defined('BASEPATH') OR exit('No direct script access allowed');

class couponadd extends CI_Controller {

public function __construct()
{
    parent::__construct();

    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->model('jewelry_model');
    $this->load->model('coupon_model');
    $this->load->model('review_model');
}

function test()
{
    $segment= $this->input->post('segment');
    $course = $this->input->post('course');
    $date = $this->input->post('date');
    $user_id = $this->input->post('user_id');
    $radio_btn_val = $this->input->post('radio_btn_val');
    $data = array(
      'segment' => $segment, 
      'date' => $date,                 
      'course' => $course, 
      'user_id' => $user_id,
      'radio_btn_selection' => $radio_btn_val,
      'created_on' => date('Y-m-d H:i:s')
  );
  //$inst_id = $this->common_model->insertData('tbl_coupon_buyer_list', $data);
  print_R($data);
  exit;
}
}
?>