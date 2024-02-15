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
      date_default_timezone_set('Asia/Kolkata');
      $currentDateTime = new DateTime();
      $formattedTime = $currentDateTime->format('H:i:s');
      $date_time =$date.' '.$formattedTime;
      $data = array(
        'segment' => $segment, 
        'date' => $date,   
        'time' => $formattedTime, 
        'date_time'=> $date_time,               
        'course' => $course, 
        'user_id' => $user_id,
        'radio_btn_selection' => $radio_btn_val,
        'created_on' => date('Y-m-d H:i:s')
    );
    if($radio_btn_val == 'now')
    {
      $res_now = $this->coupon_model->coupon_exit_check_now($segment,$course,$user_id,$date_time,$formattedTime,$date,$radio_btn_val);
      /*print_R($res_now);
      exit;*/
      if($res_now)
      {
         
        http_response_code(200);
        echo json_encode(array("message" => "Now coupon  already booked","status"=>"1"));
          
      }
      else{
        $inst_id = $this->common_model->insertData('tbl_coupon_buyer_list', $data);  
         http_response_code(200);
         echo json_encode(array("message" => "Now coupon booked successfully","status"=>"1"));    
      }
    }
    else
    {
      $res = $this->coupon_model->coupon_exit_check_user($segment,$course,$user_id,$date_time,$formattedTime,$date,$radio_btn_val);

      if($res)
      {
          http_response_code(200);
          echo json_encode(array("message" => "Coupon already booked","status"=>"1")); 
      }
      else
      { 
          $inst_id = $this->common_model->insertData('tbl_coupon_buyer_list', $data);
          http_response_code(200);
          echo json_encode(array("message" => "Coupon booked successfully","status"=>"1")); 
      }
    
    
    }
  }
}
?>