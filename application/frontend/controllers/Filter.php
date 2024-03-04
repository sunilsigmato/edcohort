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
      $res_filter_brand_list = $this->common_model->getseg_brand_list($segment);
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

  function get_filter_course_detail()
  {
    $segment= $this->input->post('segment');
    $board_id= $this->input->post('board');
    $brand_id= $this->input->post('brand_id');
    $class_id= $this->input->post('class');
    $get_filter_course_detail = $this->common_model->get_filter_course_detail($segment,$board_id,$brand_id,$class_id);
    http_response_code(200);
    echo json_encode(array("status"=>"1","data"=>$get_filter_course_detail)); 

  }

  function get_filter_batch_detail()
  {
    $segment= $this->input->post('segment');
    $board_id= $this->input->post('board');
    $brand_id= $this->input->post('brand_id');
    $class_id= $this->input->post('class');
    $course_id= $this->input->post('course');
    $get_filter_batch_detail = $this->common_model->get_filter_batch_detail($segment,$board_id,$brand_id,$class_id,$course_id);
    http_response_code(200);
    echo json_encode(array("status"=>"1","data"=>$get_filter_batch_detail)); 

  }

  function get_filter_batch_detail_write_review()
  {
    $segment= $this->input->post('segment');
    //$board_id= $this->input->post('board');
    $brand_id= $this->input->post('brand_id');
    $class_id= $this->input->post('class');
    $course_id= $this->input->post('course');
    $get_filter_batch_detail_review = $this->common_model->get_filter_batch_detail_write_review($segment,$brand_id,$class_id,$course_id);
    http_response_code(200);
    echo json_encode(array("status"=>"1","data"=>$get_filter_batch_detail_review)); 

  }

  function get_filter_result_detail()
  {
    $segment= $this->input->post('segment');
    $board_id= $this->input->post('board');
    $brand_id= $this->input->post('brand_id');
    $class_id= $this->input->post('class');
    $course_id= $this->input->post('course');
    $batch_id= $this->input->post('batch');
    $get_filter_result_detail = $this->common_model->get_filter_result_detail($segment,$board_id,$brand_id,$class_id,$course_id,$batch_id);
    http_response_code(200);
    echo json_encode(array("status"=>"1","data"=>$get_filter_result_detail)); 
  }

  function submit_review()
  {
    $segment= $this->input->post('segment');
    $board_id= $this->input->post('board');
    $brand_id= $this->input->post('brand_id');
    $class_id= $this->input->post('class');
    $course_id= $this->input->post('course');
    $batch_id= $this->input->post('batch');
    $rating= $this->input->post('rating');
    $note =  $this->input->post('note');
    $review_title =  $this->input->post('review_title');
    $user_id =  $this->input->post('user_id');
    $email =  $this->input->post('email');
    $name =  $this->input->post('name');
    $product_id =  $this->input->post('product_id');
    $note = $this->input->post('note');
    $data = array(
      'user_name' => $name,
      'user_email' => $email,
      'product_review_title' => $review_title,
      'product_id' => $product_id,
      'user_id' => $user_id,
     // 'write_review'=>$note,
      'product_review'=>$note,
      'brand_id' => $brand_id,
      'board_id' => $board_id,
      'batch_id' => $batch_id,
      'course_id' => $class_id,
      'product_rating' => $rating,
     // 'review_associated_offline' => $review_associated_offline,
      //'review_discussion' => $review_discussion,
      //'media' => $media,
      'product_review_added' => date('Y-m-d H:i:s'),
      'status' => 'active'
    );
    $user_id = $this->common_model->insertData('tbl_product_review', $data);
    http_response_code(200);
    echo json_encode(array("status"=>"1","data"=>"Review Data Added Successfully")); 
  }

  function review_sub_reply()
  {
      $where= '';
      $query = '';
      $user_id =  $this->input->post('user_id');
      $product_id =  $this->input->post('product_id');
      $reviewId =  $this->input->post('review_id');
      $prrId =  $this->input->post('prr_id');
      $sub_comment_content =  $this->input->post('sub_comment_content');
      $data = array(
        'sub_id' => $prrId,
        'review_id' => $reviewId,
        'product_id' => $product_id,
        'user_id' => $user_id,
        'reply'=> $sub_comment_content,
        'status'=>'1',
        'date_added' => date('Y-m-d H:i:s'),
      );
      $inser_id = $this->common_model->insertData('tbl_product_review_reply', $data);
      if($inser_id)
      {
        http_response_code(200);
        echo json_encode(array("status"=>"1","data"=>"Data Added Successfully")); 
      }
      else{
        http_response_code(200);
        echo json_encode(array("status"=>"2","data"=>"Invalid")); 
      }

      /*$where.=" c.prr_id = ".$prrId." and c.review_id = ".$reviewId." and c.product_id = ".$product_id." and c.user_id = ".$user_id." ";
      $this->db->select('c.sub_id ,c.set_level');
      $this->db->from('tbl_product_review_reply c');
      $this->db->where($where);
      $query=$this->db->get();
      $res_sql = $query->result();*/

      /*print_R($res_sql);
      exit;*/

    
  }

 
}
?>