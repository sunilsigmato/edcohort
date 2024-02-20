<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_course extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('class_model');
        $this->load->model('course_model');
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->course_model->get_course();

        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('course/course_view');
        $this->load->view('common/footer');
    }
    function add_course()
    {
        
        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('course/course_add_view',$data);
        $this->load->view('common/footer');
    }
    function add_course_submit()
    {
       
        $course_name=$this->input->post('course_name');  
        $course_slug=$this->input->post('course_slug');   
        $course_description=$this->input->post('course_description');   
        $status=$this->input->post('status');
          
        
       /* $where=array(         
          'title'=>$class_name,
          'parent_id'=>$parent_id,
        );
        $check_class = $this->admin_model->selectWhere('tbl_class',$where);
        if(count($check_class)){
          $this->session->set_flashdata('alert','This class Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }*/
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(          
          'course_name'=>$course_name,          
          'slug_name'=>$course_slug, 
          'course_description'=>$course_description,
          'status'=>$status,
          'created_by'=>$this->session->userdata('jw_admin_id'),          
          'created_on'=>date('Y-m-d H:i:s'),
        );

       
        $class_id=$this->admin_model->insertData('tbl_course',$data);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++       
        $this->session->set_flashdata('success','Course Has Been Added !');
        redirect(base_url().'admin_course');

    }
    /*function get_subclass()
    {
        $class_id=$this->input->post('class_id');
        $data=$this->class_model->get_sub_class($class_id);
        echo json_encode($data);
    }*/
    function edit_course($class_id)
    {
        
        //$data['parent_class_list']='';

        /* $where=array(         
          'status'=>1,
          'parent_id'=>0,
        );
        $data['parent_list'] = $this->admin_model->selectWhere('tbl_class',$where);*/

        $data['course_detail']=$this->course_model->get_course_detail($class_id);
        

        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('course/course_edit_view');
        $this->load->view('common/footer');
    }
    function edit_course_submit()
    {
        $course_name=$this->input->post('course_name');  
        $course_slug=$this->input->post('course_slug');   
        $course_description=$this->input->post('course_description');   
        $status=$this->input->post('status');
        $id=$this->input->post('id');

        $where=array(
          'id !='=>$id,         
          'slug_name'=>$course_slug,
          'course_name'=>$course_name,
        );
        $check_class = $this->admin_model->selectWhere('tbl_course',$where);
        if(count($check_class)){
          $this->session->set_flashdata('alert','This Course Already Exists!');
          redirect($_SERVER['HTTP_REFERER']);
        }
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        $data=array(
          
          'course_name'=>$course_name,          
          'slug_name'=>$course_slug, 
          'course_description'=>$course_description,
          'status'=>$status,
          'created_by'=>$this->session->userdata('jw_admin_id'),          
          'created_on'=>date('Y-m-d H:i:s'),
        );
        //echo "<pre>";print_r($id);exit; 
        $where=array('id'=>$id);
        $this->admin_model->updateData('tbl_course',$data,$where);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++
        
        $this->session->set_flashdata('success','Course Has Been Updated !');
        redirect(base_url().'admin_course');

    }
    
    function get_class_slug_name()
    {
        $class_name=$this->input->post('class_name');
        $slug=$this->admin_model->url_slug($class_name);
        echo json_encode(array('slug_name'=>$slug));
    }
    
}

?>
