<?php defined('BASEPATH') OR exit('No direct script access allowed');

class filter extends CI_Controller {

public function __construct()
{
    parent::__construct();

    $this->load->library('pagination');
    $this->load->helper('form');
    $this->load->model('common_model');
    $this->load->model('coupon_model');
    $this->load->model('admin_model');
    $this->load->model('product_model');
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
  function add_product_details()
  {
    $segment= $this->input->post('segment');
    $board_id= $this->input->post('board');
    $brand_id= $this->input->post('brand_id');
    $class_id= $this->input->post('class');
    $course_id= $this->input->post('course');
    $batch_id= $this->input->post('batch');
    $product_title =  $this->input->post('product_title');
    $product_description =  $this->input->post('product_description');
    $product_short_description =  $this->input->post('product_short_description');
    $product_status =  $this->input->post('product_status');

    $slug = makeSlug($this->input->post("product_title"));
    $wheres = " product_slug like '".$slug."%'";
    $slug_list = $this->product_model->getProductSlug($wheres);
    if(!empty($slug_list)){
        foreach($slug_list as $row)
        {
            $slug_arr[] = $row->product_slug;
        }
        if(in_array($slug, $slug_arr))
        {
            for ($i=1; in_array(($slug.'-'.$i),$slug_arr); $i++) { }                    
            $slug = $slug.'-'.$i;
        }
    }
    $data = array(
                        
      'product_name' => $product_title,
      'segment_id' => $segment,
      'board_id' => $board_id,
      'brand_id' => $brand_id,
      'class_id' => $class_id,
      'course_id' => $course_id,
      'batch_id' => $batch_id,
      'product_status' => $product_status,
      'product_description' => $product_description,
      'product_short_description' => $product_short_description,
      'product_slug'=>$slug,  
      
  );

$user_id = $this->common_model->insertData('tbl_product', $data);
http_response_code(200);
echo json_encode(array("status"=>"1","data"=>"Product Data Added Successfully")); 

  }

  function add_event_detail()
  {
    $product_id = '';
    $segment= $this->input->post('segment');
    $board_id= $this->input->post('board');
    $brand_id= $this->input->post('brand_id');
    $class_id= $this->input->post('class');
    $course_id= $this->input->post('course');
    $batch_id= $this->input->post('batch');
    
    $event_code= $this->input->post('event_code');
    $event_title =  $this->input->post('event_title');
    $event_date =  $this->input->post('event_date');
    $event_from_time =  $this->input->post('event_from_time');
    $event_to_time =  $this->input->post('event_to_time');
    $event_description =  $this->input->post('event_description');
    $event_status =  $this->input->post('event_status');
    $event_role = $this->input->post('event_role');
    $event_type = $this->input->post('event_type');
    $link = $this->input->post('link');
    $image_path = $this->input->post('img_upload');
    $interest_count = $this->input->post('interested');
    $brand_image = '';

    $new_name1 = str_replace(".","",microtime());
    $new_name=str_replace(" ","_",$new_name1);
    if(isset($_FILES['file'])) {
      // File details
      $file_name = $_FILES['file']['name'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $ext=substr(strrchr($file_name,'.'),1);
     
      if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
    {
      move_uploaded_file($file_tmp,"../uploads/event/".$new_name.".".$ext);
      $brand_image=$new_name.".".$ext;
    }
     
  } else {
      // No file uploaded
      echo "No file uploaded!";
  }
  //print_R($brand_image);
  
    $res = '';
    $res = $this->common_model->get_filter_result_detail($segment,$board_id,$brand_id,$class_id,$course_id,$batch_id);
    if($res)
    {
      $product_id = $res[0]->product_id;
    }


    if($product_id)
    {

      $starttimestamp = strtotime($event_from_time);
	    $endtimestamp = strtotime($event_to_time);
	    $difference = abs($endtimestamp - $starttimestamp)/3600;
     
      $data = array(
        'event_code' => $event_code,
        'event_title' => $event_title,
        'event_date' => $event_date,
        'event_start_time' => $event_from_time,
        'event_end_time' => $event_to_time,
        'total_duration' => $difference,
        'event_description' => $event_description,
        'status' => $event_status,
        'taken_by' => $event_role,
        'product_id' => $product_id,
        'created_on' => date('Y-m-d H:i:s'),
        'created_by' => '123', 
        'event_type' => $event_type,
        'link' =>$link,
        'image_path'=>$brand_image,
        'interest_count'=>$interest_count,
        'segment_id'=>$segment,
        'brand_id'=>$brand_id,
        'board_id'=>$board_id,
        'class_id'=>$class_id,
        'course_id'=>$course_id,
        'batch_id'=>$batch_id,
        //'image_path'=>$brand_image
      );
      $user_id = $this->common_model->insertData('tbl_event', $data);
      http_response_code(200);
      echo json_encode(array("status"=>"1","data"=>"Event Data Added Successfully")); 
    }
    else
    {
      http_response_code(200);
      echo json_encode(array("status"=>"1","data"=>" Invaild Data ")); 
    }
     
  }

  function update_event_detail()
  {
    $product_id = '';
    $segment= $this->input->post('segment');
    $board_id= $this->input->post('board');
    $brand_id= $this->input->post('brand_id');
    $class_id= $this->input->post('class');
    $course_id= $this->input->post('course');
    $batch_id= $this->input->post('batch');
    
    $event_code= $this->input->post('event_code');
    $event_title =  $this->input->post('event_title');
    $event_date =  $this->input->post('event_date');
    $event_from_time =  $this->input->post('event_from_time');
    $event_to_time =  $this->input->post('event_to_time');
    $event_description =  $this->input->post('event_description');
    $event_status =  $this->input->post('event_status');
    $event_role = $this->input->post('event_role');
    $event_type = $this->input->post('event_type');
    $event_id = $this->input->post('event_id');
    $link = $this->input->post('link');
    $image_path = $this->input->post('img_upload');
    $interest_count = $this->input->post('interested');
    
   $brand_image = '';
    
    $new_name1 = str_replace(".","",microtime());
    $new_name=str_replace(" ","_",$new_name1);
    if(isset($_FILES['file'])) {
      // File details
      $file_name = $_FILES['file']['name'];
      $file_tmp = $_FILES['file']['tmp_name'];
      $ext=substr(strrchr($file_name,'.'),1);
     
      if($ext=="png" || $ext=="gif" || $ext=="jpg" || $ext=="jpeg")
    {
      move_uploaded_file($file_tmp,"../uploads/event/".$new_name.".".$ext);
      $brand_image=$new_name.".".$ext;
    }
     
  } else {
      // No file uploaded
      echo "No file uploaded!";
      $brand_image = '';
  }


    $res = '';
    $res = $this->common_model->get_filter_result_detail($segment,$board_id,$brand_id,$class_id,$course_id,$batch_id);
    if($res)
    {
      $product_id = $res[0]->product_id;
    }
    if($product_id)
    {

      $starttimestamp = strtotime($event_from_time);
	    $endtimestamp = strtotime($event_to_time);
	    $difference = abs($endtimestamp - $starttimestamp)/3600;
     
     

      $data = array(
        'event_code' => $event_code,
        'event_title' => $event_title,
        'event_date' => $event_date,
        'event_start_time' => $event_from_time,
        'event_end_time' => $event_to_time,
        'total_duration' => $difference,
        'event_description' => $event_description,
        'status' => $event_status,
        'taken_by' => $event_role,
        'product_id' => $product_id,
        'created_on' => date('Y-m-d H:i:s'),
        'created_by' => '123', 
        'event_type' => $event_type,
        'link' =>$link,
        'interest_count'=>$interest_count,
        'segment_id'=>$segment,
        'brand_id'=>$brand_id,
        'board_id'=>$board_id,
        'class_id'=>$class_id,
        'course_id'=>$course_id,
        'batch_id'=>$batch_id,
      );
      if($brand_image !='')
      {
        $data['image_path'] = $brand_image;
      }
      
     // $user_id = $this->common_model->insertData('tbl_event', $data);
     $where=array('event_id'=>$event_id);
     /*print_R($event_id);
     exit;*/
     $this->admin_model->updateData('tbl_event',$data,$where);
      http_response_code(200);
      echo json_encode(array("status"=>"1","data"=>"Event Data Updated Successfully")); 
    }
    else
    {
      http_response_code(200);
      echo json_encode(array("status"=>"1","data"=>" Invaild Data "));
    }
     
  }


 
}
?>