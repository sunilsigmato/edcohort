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

  function cnfrm_coupon()
  {
      $segment= $this->input->post('segment');
      $course = $this->input->post('course');
      $date = $this->input->post('date');
      $user_id = $this->input->post('user_id');
      $radio_btn_val = $this->input->post('radio_btn_val');
      $filter_brand_id = $this->input->post('filter_brand_id');
      $filter_board_id = $this->input->post('filter_board_id');
      $filter_class_id = $this->input->post('filter_class_id');
      $filter_course_id = $this->input->post('filter_course_id');
      $filter_batch_id = $this->input->post('filter_batch_id');

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
        'created_on' => date('Y-m-d H:i:s'),
        'filter_brand_id' => $filter_brand_id,
        'filter_board_id' => $filter_board_id,
        'filter_class_id' => $filter_class_id,
        'filter_course_id' => $filter_course_id,
        'filter_batch_id' => $filter_batch_id,
    );
    if($radio_btn_val == 'now')
    {
      $res_now = $this->coupon_model->coupon_exit_check_now($segment,$course,$user_id,$date_time,$formattedTime,$date,$radio_btn_val,$filter_brand_id,$filter_board_id,$filter_class_id,$filter_course_id,$filter_batch_id);
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
      $res = $this->coupon_model->coupon_exit_check_user($segment,$course,$user_id,$date_time,$formattedTime,$date,$radio_btn_val,$filter_brand_id,$filter_board_id,$filter_class_id,$filter_course_id,$filter_batch_id);

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

  function all_coupon_count_list()
  {
      $segment= $this->input->post('segment');
      $course = $this->input->post('course');
      $selected_date = $this->input->post('selected_date');
      $user_id = $this->input->post('user_id');

      $res_today = $this->coupon_model->get_coupon_count_today($segment,$course,$user_id);
      $res_tommorow = $this->coupon_model->get_coupon_count_tommorow($segment,$course,$user_id);
      $res_selected_date = $this->coupon_model->get_coupon_count_selected_date($segment,$course,$user_id,$selected_date);
      http_response_code(200);
      echo json_encode(array("status"=>"1","today"=>$res_today,"tommorow"=>$res_tommorow,"selected_date"=>$res_selected_date)); 
      //print_R($res_today);

  }

  function today_tommorow_coupon_list()
  {
    $segment= $this->input->post('segment');
      $course = $this->input->post('course');
      $user_id = $this->input->post('user_id');

      $res_today = $this->coupon_model->get_coupon_count_today($segment,$course,$user_id);
      $res_tommorow = $this->coupon_model->get_coupon_count_tommorow($segment,$course,$user_id);
      http_response_code(200);
      echo json_encode(array("status"=>"1","today"=>$res_today,"tommorow"=>$res_tommorow)); 
  }
}
?>