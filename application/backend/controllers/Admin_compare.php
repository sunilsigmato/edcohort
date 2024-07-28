<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_compare extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('image_lib');
        $this->load->model('compare_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    } 
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->compare_model->get_brand_comapre();
        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('compare/compare_view');
        $this->load->view('common/footer');
    }

    function add_compare()
    {
        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('compare/compare_add_view',$data);
        $this->load->view('common/footer');
    }
    function add_compare_submit()
    {
        $segment=$this->input->post('segment');  
        $brand=$this->input->post('brand');   
        $aging=$this->input->post('aging');   
        $ov_brand=$this->input->post('ov_brand');
        $faculty_quality=$this->input->post('faculty_quality');
        $course_quality=$this->input->post('course_quality');
        $acadmic_quality=$this->input->post('acadmic_quality');
        $referal_score=$this->input->post('referal_score');
        $complaint_score=$this->input->post('complaint_score');
        $market_repu=$this->input->post('market_repu');
        $edcohort_rating=$this->input->post('edcohort_rating');
        $student_rating=$this->input->post('student_rating');
        $status=$this->input->post('status');

        $data=array(    
          'segment_id'=>$segment,          
          'brand_id'=>$brand,       
          'aging'=>$aging, 
          'overall_brand'=>$ov_brand,
          'faculty_quality'=>$faculty_quality,
          'course_quality'=>$course_quality,          
          'acadmic_quality'=>$acadmic_quality, 
          'referal_score'=>$referal_score,
          'complaint_score'=>$complaint_score,
          'market_reputation'=>$market_repu,          
          'edcohort_rating'=>$edcohort_rating, 
          'student_rating'=>$student_rating,
          'status'=>$status,
          'created_by'=>$this->session->userdata('jw_admin_id'),          
          'created_on'=>date('Y-m-d H:i:s'),
        );
        $class_id=$this->admin_model->insertData('tbl_brand_compare',$data);
    
        $this->session->set_flashdata('success','Brand Brand Compare Data Has Been Added !');
        redirect(base_url().'admin_compare');

    }

     function edit_compare($class_id)
    {
        $data['compare_detail']=$this->compare_model->get_segment_detail($class_id);
        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('compare/compare_edit_view');
        $this->load->view('common/footer');
    }
    function edit_compare_submit()
    {
        $segment=$this->input->post('segment');  
        $brand=$this->input->post('brand');   
        $aging=$this->input->post('aging');   
        $ov_brand=$this->input->post('ov_brand');
        $faculty_quality=$this->input->post('faculty_quality');
        $course_quality=$this->input->post('course_quality');
        $acadmic_quality=$this->input->post('acadmic_quality');
        $referal_score=$this->input->post('referal_score');
        $complaint_score=$this->input->post('complaint_score');
        $market_repu=$this->input->post('market_repu');
        $edcohort_rating=$this->input->post('edcohort_rating');
        $student_rating=$this->input->post('student_rating');
        $status=$this->input->post('status');
        $id=$this->input->post('id');


        $data=array(    
            'segment_id'=>$segment,          
            'brand_id'=>$brand,       
            'aging'=>$aging, 
            'overall_brand'=>$ov_brand,
            'faculty_quality'=>$faculty_quality,
            'course_quality'=>$course_quality,          
            'acadmic_quality'=>$acadmic_quality, 
            'referal_score'=>$referal_score,
            'complaint_score'=>$complaint_score,
            'market_reputation'=>$market_repu,          
            'edcohort_rating'=>$edcohort_rating, 
            'student_rating'=>$student_rating,
            'status'=>$status,
            'created_by'=>$this->session->userdata('jw_admin_id'),          
            'created_on'=>date('Y-m-d H:i:s'),
          );
         // print_R($data);
         // exit;
        //echo "<pre>";print_r($data);exit; 
        $where=array('id'=>$id);
        $this->admin_model->updateData('tbl_brand_compare',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','Brand Compare Data Has Been Updated !');
        redirect(base_url().'admin_compare');

    }

     /*** Import Compare  */

     function import_add()
     {
         $data['active']="Complaint";
         $data['main_url'] = $this->config->item('main_url');
         $data['script'] = array('../assets/js/compare_upload.min.js');
         $this->load->view('common/header');
         $this->load->view('common/sidebar',$data);
         $this->load->view('compare/import_excel_add_view');
         $this->load->view('common/footer');
 
     }
     function import_ajax_save(){
       $data=$this->compare_model->upload_files();
       $this->output->set_content_type('application/json')->set_output(json_encode($data));
   }
   function read_excel_values(){
     if($this->input->post('ajax')){
         $this->load->library('spout');
         $file_path=$this->input->post('file_path');
         $data=array("file"=>$file_path,"dir"=>"../uploads/brand_compare/");
         $out=$this->spout->create_reader($data);
         $this->output->set_content_type('application/json')->set_output(json_encode($out));
     }
 }
 function push_excel_values_db(){
     if($this->input->post('ajax')){
         
         $out=$this->compare_model->push_excel_values_db(); 
         $this->output->set_content_type('application/json')->set_output(json_encode($out));   
     }
 }

   
}
?>
