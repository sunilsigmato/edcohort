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
        
        $data['active'] = "event";
        $current = strtotime(date("Y-m-d"));
		$where ='Date(event_date) >='.$current;
		$order_by=' ORDER BY event_date DESC';		
		$data['records']=$this->common_model->event_list($where,$order_by);

        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('event/event_view' ,$data);
        $this->load->view('common/footer'); 
        
    }
    function event_submit_details()
    {
        $data['active'] = "event";
       // $current = strtotime(date("Y-m-d"));
        $current = date('Y-m-d');
		$where ='Date(event_date) >='.$current;
		$order_by=' ORDER BY event_date DESC';	
        $query = $this->db->query("select e.* , es.* from tbl_event e, tbl_event_submit_details es where e.event_id = es.event_id and Date(e.event_date) >='$current' ");
        $res = $query->result();
		$data['records']= $res;
       
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('event/event_submit_view' ,$data);
        $this->load->view('common/footer'); 
    }
    function add_event()
    {
        $where_board = 'status = 1';
        $data['board_records'] = $this->common_model->selectWhereorderby('tbl_board', $where_board, 'board_name', 'ASC');
        
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

    function edit_event($event_id)
    {
        $where = "customer_type = 5 ";
        $data['taken_by']=$this->admin_model->selectWhere('tbl_customer',$where);
        $where_event =array('event_id'=>$event_id);
        $data['event_detail']=$this->admin_model->selectWhere('tbl_event',$where_event); 
        $where_board = 'status = 1';
        $data['batch_records'] = $this->common_model->selectWhereorderby('tbl_batch', $where_board, 'batch_start', 'ASC');
        $data['active_sidebar']='event_edit';
        $this->load->view('common/header');
        $this->load->view('common/sidebar',$data);
        $this->load->view('event/event_edit_view',$data);
        $this->load->view('common/footer');
    }
}