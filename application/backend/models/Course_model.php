<?php
class course_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_course()
    {
        $this->db->select('*');
        $this->db->from('tbl_course s');
        $query=$this->db->get();
        return $query->result();
    }
    function get_course_detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_course s');
        $this->db->where('s.id',$id);
        $query=$this->db->get();
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
  
          $config['upload_path'] = '../uploads/brand_course/';
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
              $array["msg"] = "Brand Field is required";
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
             $course_name = '"'.$s->{0}.'"';
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
