<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_event extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        if($this->session->userdata('jw_admin_id')=="") {
            redirect(base_url());
        }
        $this->load->model('customer_model');
        $this->load->model('common_model');
        $this->load->model('vendor_model');
      //  $this->load->library('excel');
        $this->load->library('pagination');      
        $this->load->library('upload');
    }
    function index()
    {
        
     /*   $data['active'] = "customer";
		$where ='customer_id > 0';
		$order_by=' ORDER BY customer_id DESC';		
		$data['records']=$this->customer_model->customer_list($where,$order_by);

        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('customer/buyer_view' ,$data);
        $this->load->view('common/footer'); */
        
    }
    function add_event()
    {
        $where = "customer_type = 5 ";
        $data['taken_by']=$this->admin_model->selectWhere('tbl_customer',$where);
        $where_board = 'status = 1';
        $data['batch_records'] = $this->common_model->selectWhereorderby('tbl_batch', $where_board, 'batch_start', 'ASC');
        $data['active_sidebar']='event_add';
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('event/event_add_view',$data);
        $this->load->view('common/footer');
    }
}