<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_coupons extends CI_Controller {

	public function __construct()
  {
      parent::__construct();
      
      $this->load->model('coupon_model');
      $this->load->model('common_model');
      if($this->session->userdata('jw_admin_id')=="")
      {
      	redirect(base_url().'admin_login');
      }
  }
	public function index()
	{	
        $data['records']=$this->coupon_model->get_coupons();
		$data['active'] = "contact";
        $this->load->view('common/header');
        $this->load->view('common/sidebar', $data);
        $this->load->view('coupons/coupons_view');
        $this->load->view('common/footer');
	}

	 function loadData()
    {
        $page=$this->input->get('page');
        $per_page=$this->input->get('per_page');

        $filter_name=$this->input->get('filter_name');
        $filter_email=$this->input->get('filter_email');
        $filter_phone=$this->input->get('filter_phone');
        $filter_status=$this->input->get('filter_status');

        $where ='id > 0';       
        if($filter_name!="")
        {
            $where .=' AND name = "'.$filter_name.'"';
        }
        if($filter_email!="")
        {
            $where .=' AND email = "'.$filter_email.'"';
        }
        if($filter_phone!="")
        {
            $where .=' AND mobile = "'.$filter_phone.'"';
        }
        if($filter_status!="")
        {
            $where .=' AND status = "'.$filter_status.'"';
        }

        $order_by=' ORDER BY id DESC';
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $contact=$this->contact_model->contactTotal($where,$order_by);
        $data['contact_count'] =$contact['0']->contact_count;         
        
        $per_page= ($per_page) ? $per_page : 100 ;
        $config['base_url'] = base_url().'admin_contact/loadData';
        $config["total_rows"] = $data['contact_count'];
        $config["per_page"] = $per_page;
        $config['first_link'] = 'FIRST';
        $config['last_link'] = 'LAST';
        $config['first_tag_open'] = '<li class="paginate_button">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="paginate_button">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'NEXT';
        $config['next_tag_open'] = '<li class="paginate_button">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'PREV';
        $config['prev_tag_open'] = '<li class="paginate_button">';
        $config['prev_tag_close'] = '</li>';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="paginate_button">';
        $config['num_tag_close'] = '</li>';
        $config["num_links"] = 8;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';

        $this->pagination->initialize($config);
        $page = ($page) ? $page : 0;
        $page_link = $this->pagination->create_links();

        $records=$this->contact_model->contact_list($per_page,$page,$where,$order_by);

        echo json_encode(array('records'=>$records,'page_link'=>$page_link,'total_records'=>$data['contact_count']));      
    }
    


  	function delete_enquiry($blog_id)
	{
		
	
		$data['blog_details']=$this->common_model->deleteData('tbl_contactus',array('id'=>$blog_id));
		//echo "<pre>";print_ex($data);
		$this->session->set_flashdata('success','Contact Enquiry Detail Has Been Deleted Successfully!');
		redirect(base_admin().'admin_contact');

		
	}
	
	

}
