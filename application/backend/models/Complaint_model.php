<?php
class complaint_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getProductcomplaintLimit($where,$limit='',$offset=0)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_complaint as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id  ".$where." order by product_complaint_id desc limit ".$offset." , ".$limit);
        return $query->result();  
    }
	
	
    function getProductcomplaint($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug,b.brand_name,p.product_type,cl.title FROM tbl_product_complaint as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id
		  join tbl_brand as b ON pr.brand_id=b.brand_id
		  join tbl_class as cl ON p.class_id=cl.class_id
		  ".$where." order by product_complaint_id DESC");
        return $query->result();  
    }
    function getProductcomplaintCount($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT count(p.product_id) as complaint_count FROM tbl_product_complaint as pr 
           join tbl_product as p ON pr.product_id=p.product_id
          ".$where."");
        return $query->result();  
    }
    function getProductcomplaintSum($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT SUM(product_rating) as complaint_sum FROM tbl_product_complaint as pr ".$where."");
        return $query->result();  
    }
	
	 function getProductcomplaintReply($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT prr.*,c.firstname,c.lastname,p.product_name,c.email,c.phone,p.product_name,p.product_slug,pr.product_rating,pr.product_complaint_title,pr.product_complaint,b.brand_name,p.product_type,cl.title FROM tbl_product_complaint_reply as prr 
		  join tbl_product_complaint as pr ON prr.complaint_id=pr.product_complaint_id
		  join tbl_product as p ON prr.product_id=p.product_id 
          join tbl_customer as c ON prr.user_id=c.customer_id 
          join tbl_brand as b ON p.brand_id=b.brand_id
          join tbl_class as cl ON p.class_id=cl.class_id
          ".$where." order by product_complaint_id DESC");
        return $query->result();  
    }

     /* upload excel file to server */
     function upload_files()
     {
 
         $this->load->library('upload');
         $final_files_data = array();
 
 
         $_FILES['userfile']['name'] = $_FILES['prd_file']['name'];
         $_FILES['userfile']['type'] = $_FILES['prd_file']['type'];
         $_FILES['userfile']['tmp_name'] = $_FILES['prd_file']['tmp_name'];
         $_FILES['userfile']['error'] = $_FILES['prd_file']['error'];
         $_FILES['userfile']['size'] = $_FILES['prd_file']['size'];
 
         $config['upload_path'] = '../uploads/brand_complaint/';
         $config['allowed_types'] = 'xlsx';
         $config['max_size'] = '25600';
         $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
         $file_original = pathinfo($_FILES['userfile']['name'], PATHINFO_FILENAME);
 
 
         // remove single quote
         //$file_original=str_replace("'","",$file_original);
 
         $config['file_name'] = $file_original . time() . '-' . uniqid() . "." . $ext;
 
         $this->upload->initialize($config);
 
         if (!$this->upload->do_upload()) {
             $final_files_data = array(
                 "error" => 1,
                 "msg" => $this->upload->display_errors("", ""),
                 "file_name" => $_FILES['userfile']['name']);
 
         } else {
             $file = $this->upload->data();
             $final_files_data = array(
                 "error" => 0,
                 "file_name" => $file["client_name"],
                 "file_path" => $file["orig_name"],
                "full_path" => $file["full_path"],);
             //$this->insert_file_values_to_db($final_files_data);
         }
         return $final_files_data;
     }

     function push_excel_values_db()
     {
         
         
         $json = $this->input->post("file");
         // $json="file/storage/example_r1517997296-5a7accf04b619.json";
         if (file_exists($json)) {
             if ($file = fopen($json, "r")) {
                 $contents = (json_decode(fread($file, filesize($json))));
 
                 $page = !isset($_POST['page']) ? 1 : $_POST['page'];
                 $limit = 10000; // five rows per page
                 $start = ($page * $limit) - $limit;
 
                 $total_items = count($contents); // total items
 
                 $final = array_splice($contents, $start, $limit);
                 fclose($file);
                 $result = $this->excel_stage1_validation($final);
 
                 if ($this->input->post("validation_failed_total")) {
                     $total = $this->input->post("validation_failed_total");
                     $result["validation_failed"]["total"] = $result["validation_failed"]["total"] +
                         $total;
                 }
                 
                 if ($this->input->post("imported_total")) {
                     $total = $this->input->post("imported_total");
                 }
 
                 if ($this->input->post("processed")) {
                     $total = $this->input->post("processed");
                     $result["processed"] = $result["processed"] + $total;
                 }
 
                 $result["total"] = $total_items;
                 $result['page'] = 0;
                 if ($total_items > ($page * $limit)) {
                     $next = ++$page;
                     $result["page"] = $next;
                 }
                 $result['file'] = $json;
                 $result["error"] = 0;
                 $result['msg'] = "ok";
                 if ($page == "0")
                     $this->reset_all_excel_values($json);
                 return $result;
             }
 
         }
         return array("error" => 1, "msg" => "No information added");
 
     }

     function excel_stage1_validation($final)
     {
         
         if ($final) {
             $stage2 = array();
             $result = array(
                 "validation_failed" => array("total" => 0, "data" => array()),
                 "complaint_duplicates" => array("total" => 0, "data" => array()),
                // "present_duplicates" => array("total" => 0, "data" => array()),
                 "updated" => array("total" => 0),
                 "imported" => array("total" => 0, "data" => array()),
                 "processed" => 0,
                 );
             $i = 0;
             foreach ($final as $f) {
                 $i++;
                 $d = $this->excel_validation_list($f,$stage2);
                 if ($d["error"] == 1) {
                     $f->msg = sprintf("%s%s%s", "<span class='red'>", $d["msg"], "</span>");
                     $result["validation_failed"]["total"] = $result["validation_failed"]["total"] +
                         1;
                     $result["validation_failed"]["data"][] = $f;
                 } else {
                     $stage2[] = $f;
 
                 }
                 $result["processed"] = $i;
 
             }
 
             // Stage 2 verify employee added in db
             if (count($stage2))
                 $result = $this->excel_stage2_service_insert($stage2, $result);
 
 
             return $result;
         }
     }

     function excel_validation_list($f,$stage2)
     {
         $array = array("error" => 0, "msg" => "");
         $dt = count((array )$f);
         if(count($stage2) >= 10000 ) {
             $array["error"] = 1;
             $array["msg"] = "Only 10000 lines of excel can be bulk inserted at a time";
             return $array;
         }    
 
         if($dt < 1) {
             $array["error"] = 1;
             $array["msg"] = "No  Data Uploaded";
             return $array;
         }

         if(($f->{"0"} == "" || $f->{"0"} == "undefined")) {
             $array["error"] = 1;
             $array["msg"] = "Segment Field is required";
             return $array;
        }
        if(($f->{"1"} == "" || $f->{"1"} == "undefined")) {
         $array["error"] = 1;
         $array["msg"] = "Brand Field is required";
         return $array;
       }
       if(($f->{"2"} == "" || $f->{"2"} == "undefined")) {
         $array["error"] = 1;
         $array["msg"] = "Board Field is required";
         return $array;
       }
       if(($f->{"3"} == "" || $f->{"3"} == "undefined")) {
         $array["error"] = 1;
         $array["msg"] = "Class Field is required";
         return $array;
       }
       if(($f->{"4"} == "" || $f->{"4"} == "undefined")) {
         $array["error"] = 1;
         $array["msg"] = "Course Field is required";
         return $array;
       }
       if(($f->{"5"} == "" || $f->{"5"} == "undefined")) {
         $array["error"] = 1;
         $array["msg"] = "Cohort Field is required";
         return $array;
       }
       if(($f->{"6"} == "" || $f->{"6"} == "undefined")) {
         $array["error"] = 1;
         $array["msg"] = "Rating Field is required";
         return $array;
       }
       if(($f->{"7"} == "" || $f->{"7"} == "undefined")) {
         $array["error"] = 1;
         $array["msg"] = "Email Field is required";
         return $array;
       }
       if(($f->{"8"} == "" || $f->{"8"} == "undefined")) {
         $array["error"] = 1;
         $array["msg"] = "Name Field is required";
         return $array;
       }
       if(($f->{"9"} == "" || $f->{"9"} == "undefined")) {
        $array["error"] = 1;
        $array["msg"] = "title Field is required";
        return $array;
      }
      if(($f->{"10"} == "" || $f->{"10"} == "undefined")) {
        $array["error"] = 1;
        $array["msg"] = "Complaint Field is required";
        return $array;
      }
      if(($f->{"11"} == "" || $f->{"11"} == "undefined")) {
        $array["error"] = 1;
        $array["msg"] = "Complaint Date Field is required";
        return $array;
      }
      if(($f->{"12"} == "" || $f->{"12"} == "undefined")) {
        $array["error"] = 1;
        $array["msg"] = "Complaint Close Field is required";
        return $array;
      }
        return $array;
     }
     
     function excel_stage2_service_insert($stage2, $result)
     { 
         $data=array();
       
         $array = array("error" => 0, "msg" => "");
         $temp = "";
         $idcheck = "";
         $i=0;
         $k=0;
         $j=0;
         foreach($stage2 as $s)
         {
            $course_name= '';
            $data=array();
            $segment = '"'.$s->{0}.'"';  
            $brand_name = '"'.$s->{1}.'"'; 
            $board = '"'.$s->{2}.'"'; 
            $class = '"'.$s->{3}.'"';
            $course = '"'.$s->{4}.'"';
            $cohort = '"'.$s->{5}.'"';
            $rating = '"'.$s->{6}.'"';
            $customer_email = '"'.$s->{7}.'"';
            $customer_name = '"'.$s->{8}.'"';
            $complaint_title = '"'.$s->{9}.'"';
            $complaint = '"'.$s->{10}.'"';
            $complaint_date = date("Y-m-d", strtotime($s->{11}->date));
            $complaint_close_date = date("Y-m-d", strtotime($s->{12}->date));

           //echo gettype($s->{11});
          
            $password = '12345';
            $db_email = '';
            $db_firstname = '';
            $user_id = '';
            $segment_id ='';
            $brand_id = '';
            $board_id = '';
            $class_id ='';
            $course_id  ='';
            $batch_id = '';
            $product_id  = '';
            $complaint_id ='';

            /** Customer Check start */
            $sql_customer_check = 'select email,customer_id,firstname from tbl_customer where email = '."$customer_email";
            $sql_customer_check_query = $this->db->query($sql_customer_check);
            $res_customer_email = $sql_customer_check_query->result();
            if($res_customer_email)
            {
               //print_R($res_customer_email);
               $db_email = $res_customer_email[0]->email;
               $db_firstname = $res_customer_email[0]->firstname;
               $user_id = $res_customer_email[0]->customer_id;
            }
            else
            {
               $data_customer = array(
                 'email' => $s->{7}, 
                 'firstname'=>$s->{8},
                 'customer_type' => '1',
                 'password' => getHash($password), 
                 'date_added' => date('Y-m-d H:i:s'),
                 'brand_id'=>'', 
                 'status' => 1, 
               );
               $user_id = $this->admin_model->insertData('tbl_customer', $data_customer);
            }
               /** Customer Check End */

               /** Segment Check Start */
           $sql_segment_check = 'select id from tbl_segment where segment_name = '."$segment";
           $sql_segment_check_query = $this->db->query($sql_segment_check);
           $res_segment = $sql_segment_check_query->result();
           if($res_segment)
           {
             $segment_id = $res_segment[0]->id;
           }
           else
           {
             $segment_slug=$this->admin_model->url_slug($s->{0});
               $segemnt=array(
                 'segment_name'=>$s->{0},
                 'slug_name' =>$segment_slug,
                 'status'=>'1',
                 'created_by' =>'1',
                 'created_on'=>date('Y-m-d H:i:s'),
               );
               $segment_id = $this->admin_model->insertData('tbl_segment', $segemnt);
           }
               /** Segment Check End */

               /**Brand check Start*/
           $sql_brand_check = 'select brand_id  from tbl_brand where brand_name = '."$brand_name";
           $sql_brand_check_query = $this->db->query($sql_brand_check);
           $res_brand = $sql_brand_check_query->result();
           if($res_brand)
           {
             $brand_id = $res_brand[0]->brand_id ;
           }
           else
           {
             $brand_slug=$this->admin_model->url_slug($s->{1});
               $brand_array=array(
                 'brand_name'=>$s->{1},
                 'brand_slug' =>$brand_slug,
                 'brand_status'=>'1',
                 'brand_image'=>'no_image.jpg',
                 'date_added'=>date('Y-m-d H:i:s'),
               );
               $brand_id = $this->admin_model->insertData('tbl_brand', $brand_array);
           }
               /** Brand Check Ends */
              /** Board Check Start */
           $sql_board_check = 'select board_id  from tbl_board where board_name = '."$board";
           $sql_board_check_query = $this->db->query($sql_board_check);
           $res_board = $sql_board_check_query->result();
           if($res_board)
           {
             $board_id = $res_board[0]->board_id ;
           }
           else{
             if($s->{2} == 'Online')
             {
               $board_id = 1;
             }
             if($s->{2} == 'Offline')
             {
               $board_id = 2;
             }
           }
              /** Board Check Ends */
              /** Class Check Start */
         $sql_class_check = 'select class_id from tbl_class where title = '."$class";
         $sql_class_check_query = $this->db->query($sql_class_check);
         $res_class = $sql_class_check_query->result();
         if($res_class)
         {
           $class_id = $res_class[0]->class_id  ;
         }
         else{
               
               $class_array=array(
                 'title'=>$s->{3},
                 'date_added'=>date('Y-m-d H:i:s'),
               );
               $class_id = $this->admin_model->insertData('tbl_class', $class_array); 
         }
              /** Class Check Ends */
               /** Course Check Start */
         $sql_course_check = 'select id from tbl_course where course_name = '."$course";
         $sql_course_check_query = $this->db->query($sql_course_check);
         $res_course = $sql_course_check_query->result();
         if($res_course)
         {
           $course_id = $res_course[0]->id  ;
         }
         else{
               $course_slug=$this->admin_model->url_slug($s->{4});
               $course_array=array(
                 'course_name'=>$s->{4},
                 'slug_name' =>$course_slug,
                 'created_on'=>date('Y-m-d H:i:s'),
               );
               $course_id = $this->admin_model->insertData('tbl_course', $course_array); 
         }
              /** Course Check Ends */
              /** Batch Check Starts */
         $sql_batch_check = 'select batch_id from tbl_batch where batch_name = '."$cohort";
         $sql_batch_check_query = $this->db->query($sql_batch_check);
         $res_batch = $sql_batch_check_query->result();
         if($res_batch)
         {
           $batch_id = $res_batch[0]->batch_id  ;
         }
         else{
               $batch_array=array(
                 'batch_name'=>$s->{5},
                 'added_by' =>'1',
                 'date_added'=>date('Y-m-d H:i:s'),
               );
               $batch_id = $this->admin_model->insertData('tbl_batch', $batch_array); 
         }
         /** Batch Check Ends */

         /** Check Product Exist Check Start */
         $sql_product_check = 'select product_id from tbl_product where segment_id = '.'"'.$segment_id.'" and brand_id = '.'"'.$brand_id.'" and board_id = '.'"'.$board_id.'" and class_id = '.'"'.$class_id.'" and course_id = '.'"'.$course_id.'" and batch_id = '.'"'.$batch_id.'"' ;
         $sql_product_check_query = $this->db->query($sql_product_check);
         $res_product = $sql_product_check_query->result();
         if($res_product)
         {
           $product_id  = $res_product[0]->product_id   ;
         }
         else{
               $product_array=array(
                 'segment_id'=>$segment_id,
                 'brand_id' =>$brand_id,
                 'board_id' =>$board_id,
                 'class_id' =>$class_id,
                 'course_id' =>$course_id,
                 'batch_id' =>$batch_id,
                 'product_name' => 'Excel Upload',
                 'product_brand'=>$brand_id,
               );
               $product_id = $this->admin_model->insertData('tbl_product', $product_array); 

              /** For Dummy Insertion */
          /*     $data_category=array(
                 'product_id'=>$product_id,
                  'category_id'=>1,
             );
             $this->admin_model->insertData('tbl_product_category',$data_category);
             $data_image=array(
               'product_id'=>$product_id,
               'product_image'=>'about_us.jpg',
               'product_image_sort_order'=>'1',
           );
           $this->admin_model->insertData('tbl_product_image',$data_image);
           $data_feature=array(
             'product_id'=>$product_id,
             'product_feature'=>''
           );
           $this->admin_model->insertData('tbl_product_feature',$data_feature);
           $data_video=array(
             'product_id' => $product_id,
             'product_video' => '',
             'video_type' => 'file',
         );
         $this->admin_model->insertData('tbl_product_video',$data_video);*/
           /** For Dummy Insertion */
         }
          /** Check Product Exist Check Ends */

          /** Check Compalaint Start */
         $sql_complaint_check = 'select product_complaint_id from tbl_product_complaint where segment_id = '.'"'.$segment_id.'" and brand_id = '.'"'.$brand_id.'" and board_id = '.'"'.$board_id.'" and class_id = '.'"'.$class_id.'" and course_id = '.'"'.$course_id.'" and batch_id = '.'"'.$batch_id.'" and product_id = '.'"'.$product_id.'" and user_id = '.'"'.$user_id.'"';
         $sql_complaint_check_query = $this->db->query($sql_complaint_check);
         $res_complaint = $sql_complaint_check_query->result();
      
         if($res_complaint)
         {
           if (!isset($result["complaint_duplicates"]["data"][$j]) || !is_array($result["complaint_duplicates"]["data"][$j])) {
             $result["complaint_duplicates"]["data"][$j] = array();
         }
           $complaint_id  = $res_complaint[0]->product_complaint_id;
           $result["complaint_duplicates"]["total"]=$result["complaint_duplicates"]["total"]+1;
           
           array_push($result["complaint_duplicates"]["data"][$j], $s->{0}, $s->{1}, $s->{2},$s->{3},$s->{4},$s->{5},$s->{6},$s->{7},$s->{8},$s->{9},$s->{10},$complaint_date,$complaint_close_date);
           $j++;
         }
         else{
           if (!isset($result["imported"]["data"][$k]) || !is_array($result["imported"]["data"][$k])) {
             $result["imported"]["data"][$k] = array();
         }
         $complaint_resloved ='';
         if($complaint_close_date)
         {
            $complaint_resloved = 1;
         }else
         {
            $complaint_resloved = 0;
         }
               $complaint_array=array(
                 'segment_id'=>$segment_id,
                 'brand_id' =>$brand_id,
                 'board_id' =>$board_id,
                 'class_id' =>$class_id,
                 'course_id' =>$course_id,
                 'batch_id' =>$batch_id,
                 'product_id'=>$product_id,
                 'user_id'=>$user_id,
                 'user_name' =>$s->{8},
                 'user_email'=>$s->{7},
                 'product_complaint_added'=>$complaint_date,
                 'product_complaint_title'=>$s->{9},
                 'product_complaint'=>$s->{10},
                 'product_rating'=>$s->{6},
                 'product_complaint_resloved_date'=> $complaint_close_date,
                 'complaint_resolved' =>$complaint_resloved,
                 //'date_added'=>date('Y-m-d H:i:s'),
               );

               $complaint_id = $this->admin_model->insertData('tbl_product_complaint', $complaint_array);

               $result["imported"]["total"]=$result["imported"]["total"]+1;
               array_push($result["imported"]["data"][$k], $s->{0}, $s->{1}, $s->{2},$s->{3},$s->{4},$s->{5},$s->{6},$s->{7},$s->{8},$s->{9},$s->{10},$complaint_date,$complaint_close_date);
               $k++; 
            
         }
          /** Check Review Ends */
         $i++;
         }
         
         return $result;
     }

   
   

  }
?>
