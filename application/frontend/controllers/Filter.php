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

  function submit_compaint()
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
      'product_complaint_title' => $review_title,
      'product_id' => $product_id,
      'user_id' => $user_id,
     // 'write_review'=>$note,
      'product_complaint'=>$note,
      'brand_id' => $brand_id,
      'board_id' => $board_id,
      'batch_id' => $batch_id,
      'course_id' => $class_id,
      'product_rating' => $rating,
     // 'review_associated_offline' => $review_associated_offline,
      //'review_discussion' => $review_discussion,
      //'media' => $media,
      'product_complaint_added' => date('Y-m-d H:i:s'),
      'status' => 'active'
    );
    $user_id = $this->common_model->insertData('tbl_product_complaint', $data);
    http_response_code(200);
    echo json_encode(array("status"=>"1","data"=>"Complaint Data Added Successfully")); 
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
    
  }

  
  function complaint_sub_reply()
  {
      $where= '';
      $query = '';
      $user_id =  $this->input->post('user_id');
      $product_id =  $this->input->post('product_id');
      $complaint_id =  $this->input->post('complaint_id');
      $prrId =  $this->input->post('prr_id');
      $sub_comment_content =  $this->input->post('sub_comment_content');
      $data = array(
        'sub_id' => $prrId,
        'complaint_id' => $complaint_id,
        'product_id' => $product_id,
        'user_id' => $user_id,
        'reply'=> $sub_comment_content,
        'status'=>'1',
        'date_added' => date('Y-m-d H:i:s'),
      );
      $inser_id = $this->common_model->insertData('tbl_product_complaint_reply', $data);
      if($inser_id)
      {
        http_response_code(200);
        echo json_encode(array("status"=>"1","data"=>"Data Added Successfully")); 
      }
      else{
        http_response_code(200);
        echo json_encode(array("status"=>"2","data"=>"Invalid")); 
      }
    
  }
  function update_complaint_status()
  {
   
    $user_id =  $this->input->post('user_id');
      $status_val =  $this->input->post('status_val');
      $complaint_id =  $this->input->post('complaint_id');
      $where = "product_complaint_id = $complaint_id and user_id = $user_id"; 
    $data = array(
      'complaint_resolved' => $status_val,
      'product_complaint_resloved_date' => date('Y-m-d'),
    );
    
    $inser_id = $this->common_model->update_entry('tbl_product_complaint', $data, $where);
    if($inser_id)
      {
        http_response_code(200);
        echo json_encode(array("status"=>"1","data"=>"Status Updated Successfully")); 
      }
      else{
        http_response_code(200);
        echo json_encode(array("status"=>"2","data"=>"Invalid")); 
      }

  }
  function event_submit()
  {
      $user_id =  $this->input->post('user_id');
      $event_id =  $this->input->post('event_id');
      $data = array(
        'user_id' => $user_id,
        'event_id' => $event_id,
        'created_on' => date('Y-m-d H:i:s'),
      );
      $interest_db_count = '';

      $query_event_exist =  $this->db->query("select interest_count from tbl_event where event_id = $event_id");
      $res_counselling_exist = $query_event_exist->result();
   
      if($res_counselling_exist)
      {
          $interest_db_count = $res_counselling_exist[0]->interest_count;
        
      }
      if($interest_db_count != '')
      {
        $interest_db_count = $interest_db_count + 1;
      }

      $query_counselling_exist =  $this->db->query("select * from tbl_event_submit_details where user_id = $user_id and event_id = $event_id");
      $res_counselling_exist = $query_counselling_exist->result();
      if($res_counselling_exist)
      { 
        http_response_code(200);
        echo json_encode(array("status"=>"2","data"=>"Event Already Booked")); 
      }
    else
    {
      $inser_id = $this->common_model->insertData('tbl_event_submit_details', $data);
        if($inser_id)
        {
            $data_event = array(
              'interest_count'=>$interest_db_count,
            );
            $where=array('event_id'=>$event_id);
            $this->common_model->updateData('tbl_event',$data_event,$where);
            http_response_code(200);
            echo json_encode(array("status"=>"1","data"=>"Event Booked Successfully")); 
        }
        else{

            http_response_code(200);
            echo json_encode(array("status"=>"2","data"=>"Invalid Entry")); 
        }
    }
  }

  function get_product_id()
	{
   
    $segment_id =  $this->input->post('segment_id');
    $where = 0;
    $i = '1';
    $res ='';
    $res_counselling_exist = '';
    $get_product_id = '';
    $get_seg_id = '';
    $return_product_id ='';
    while($i <='2')
    {
      print_R("jh");
      $res = $this->get_product($segment_id,$where);
      if($res)
      {
              $query_tbl_product =  $this->db->query("select * from tbl_product where product_id=$res");
              $res_query_tbl_product = $query_tbl_product->result();
              $get_seg_id = $res_query_tbl_product[0]->segment_id;
              if($get_seg_id == $segment_id)
              {
                print_R($res_query_tbl_product[0]->product_id);
                $return_product_id = $res_query_tbl_product[0]->product_id;
                $i++;
                return $return_product_id;
              }
              $i = 1;
              $where = $res - 1;
              print_R($res);
              exit;

              
      }
    }
    print_R("jhss");
    exit;

	}

  function get_product($segment_id,$where)
  {
    $get_product_id = '';
    $where = '';
    if($where)
    {
      $where = "product_review_id = $id";
    }
    else
    {
      $order_query = 'order by product_review_id DESC limit 1';
    }
    $query_product_review =  $this->db->query("select * from tbl_product_review $where $order_query");
    $res_query_product_review = $query_product_review->result();
    $get_product_id = $res_query_product_review[0]->product_id;
    return $get_product_id;
  }

  

 
}
?>