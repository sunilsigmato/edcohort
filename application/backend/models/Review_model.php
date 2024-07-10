<?php
class Review_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getProductReviewLimit($where,$limit='',$offset=0)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug,b.brand_name,p.product_type,cl.title FROM tbl_product_review as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id
		  join tbl_brand as b ON pr.brand_id=b.brand_id
		  join tbl_class as cl ON p.class_id=cl.class_id
		  ".$where." order by product_review_id desc limit ".$offset." , ".$limit);
        return $query->result();  
    }
	
	
    function getProductReview($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug,b.brand_name,p.product_type,cl.title FROM tbl_product_review as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id
		  join tbl_brand as b ON pr.brand_id=b.brand_id
		  join tbl_class as cl ON p.class_id=cl.class_id
		  ".$where." order by product_review_id DESC");
        return $query->result();  
    }
    function getProductReviewCount($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT count(p.product_id) as review_count FROM tbl_product_review as pr 
           join tbl_product as p ON pr.product_id=p.product_id
          ".$where."");
        return $query->result();  
    }
    function getProductReviewSum($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT SUM(product_rating) as review_sum FROM tbl_product_review as pr ".$where."");
        return $query->result();  
    }
	
	 function getProductReviewReply($where)
    {
        if($where!=""){        
          $where="WHERE ".$where;
        }
        $query=$this->db->query("SELECT prr.*,c.firstname,c.lastname,c.email,c.phone,p.product_name,p.product_slug,pr.product_rating,pr.product_review_title,pr.product_review,b.brand_name,p.product_type,cl.title FROM tbl_product_review_reply as prr 
		  join tbl_product_review as pr ON prr.review_id=pr.product_review_id
		  join tbl_product as p ON prr.product_id=p.product_id 
          join tbl_customer as c ON prr.user_id=c.customer_id 
          join tbl_brand as b ON p.brand_id=b.brand_id
          join tbl_class as cl ON p.class_id=cl.class_id
          ".$where." order by product_review_id DESC");
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
  
          $config['upload_path'] = '../uploads/brand_review/';
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
                  "file_path" => $file["orig_name"]);
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
                  $limit = 1000; // five rows per page
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
                  "brand_duplicates" => array("total" => 0, "data" => array()),
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
          $array["msg"] = "Review Field is required";
          return $array;
        }
        if(($f->{"8"} == "" || $f->{"8"} == "undefined")) {
          $array["error"] = 1;
          $array["msg"] = "Email Field is required";
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
             $review = '"'.$s->{7}.'"';
             $customer_email = '"'.$s->{8}.'"';
             $customer_name = '"'.$s->{9}.'"';
             $password = '12345';
             $db_email = '';
             $db_firstname = '';
             $db_customer_id ='';
             $user_id = '';

             /** Customer Check start */
             $sql_customer_check = 'select email,customer_id,firstname from tbl_customer where email = '."$customer_email";
             $sql_customer_check_query = $this->db->query($sql_customer_check);
             $res_customer_email = $sql_customer_check_query->result();
             if($res_customer_email)
             {
                //print_R($res_customer_email);
                $db_email = $res_customer_email[0]->email;
                $db_firstname = $res_customer_email[0]->firstname;
                $db_customer_id = $res_customer_email[0]->customer_id;
             }
             else
             {
              $data = array(
                'email' => $s->{8}, 
                'fistname'=>$s->{9},
                'customer_type' => '1',
                'password' => getHash($password), 
                'date_added' => date('Y-m-d H:i:s'),
                'brand_id'=>'', 
                'status' => 1, 
            );
            $user_id = $this->admin_model->insertData('tbl_customer', $data);
             }
                /** Customer Check End */

             print_R($db_firstname);
             exit;

             $sql_check = 'select course_name from tbl_course where course_name = '."$course_name";
             $sql_check_query = $this->db->query($sql_check);
             $res = $sql_check_query->result();
             if($res)
             {        
                      $result["brand_duplicates"]["total"]=$result["brand_duplicates"]["total"]+1;
                      $result["brand_duplicates"]["data"][] = $s->{0};
                      
             }else{
              $slug=$this->admin_model->url_slug($s->{0});
              $data=array(          
                  'course_name'=>$s->{0},
                  'slug_name'=>$slug,
                  //'date_added'=>date('Y-m-d H:i:s'),
                );
              $this->admin_model->insertData('tbl_course',$data);
              $result["imported"]["total"]=$result["imported"]["total"]+1;
              $result["imported"]["data"][] = $s->{0};
             }
          }
          
          return $result;
      }

   
   

}
?>
