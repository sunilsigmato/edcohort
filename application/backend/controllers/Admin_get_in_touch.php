<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_get_in_touch extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('class_model');
        $this->load->model('course_model');
        $this->load->model('Get_in_touch_model');
        
        if ($this->session->userdata('jw_admin_id')=="")
        {
            redirect(base_url().'admin_login');
        }
    }
    function index()
    {
        $c1=$c2=$c3="";
        $data['records']=$this->Get_in_touch_model->get_in_touch();

        $data['active']="class";
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('get_in_touch/get_in_touch_view');
        $this->load->view('common/footer');
    }
     

}

?>
