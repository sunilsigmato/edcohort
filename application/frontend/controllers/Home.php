<?php    
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller { 
 

	
	public function __construct()
	  {
		  parent::__construct();
		  $this->load->model('jewelry_model');
		  $this->load->model('diamond_model');
		  $this->load->model('home_model');
		  $this->load->model('review_model');
		  $this->load->model('blog_model');
		  
		  //$this->load->library('curl');
	  }

    public function index() 
    { 	
			$courseid = $this->input->get('segment'); 
			$brandids = '';
			$productids = '';
			$brandwhare = '';
			$productwhare = '';
			
	     	
			
			if($courseid){
				$data = $this->getBrand($courseid);
				$brandid = $data['brand'];
				$brandids = join(',', $brandid);
				
				if(!empty($brandids))
				{
					$brandwhare = ' and brand_id IN ('.$brandids.')';
				}
				
				
				
				$productid = $data['product'];
				$productids = join(',', $productid);
				if(!empty($productids)){
										
					$productwhare = ' and product_id IN ('.$productids.')';
					
					}
			}
			
			$where_class = 'brand_status = 1'.$brandwhare;
	     	$data['brand_records'] = $this->common_model->selectWhereOrderlimit('tbl_brand',$where_class,10,0,'order by brand_sort_order ASC'); 
			
			$where_product = 'product_status = "active"'.$productwhare;
			
			$where_type = 'status = 1';
	     	$data['type_records'] = $this->common_model->selectWhereorderby('tbl_type',$where_type,'type_id','ASC');
	     	
			$where_class = 'status = 1 and parent_id = 0';
	     	$data['class_records'] = $this->common_model->selectWhereorderby('tbl_class',$where_class,'title','ASC');
            $where_class = 'status = 1';
	     	$data['segment_record'] = $this->common_model->selectWhereorderby('tbl_segment',$where_class,'id','ASC');
			$data['posts_blog'] = $this->blog_model->get_index_posts();
			//print_r($data['posts_blog']);
	
			$this->load->view('common/header',$data);
			$this->load->view('index',$data);
			$this->load->view('common/footer');
    }
	function all_product()
	{
		$where_class = 'status = 1';
		$data['segment_record'] = $this->common_model->selectWhereorderby('tbl_segment',$where_class,'id','ASC');
	   
	   //print_ex($data);
		
	   $this->load->view('common/header',$data);
	   $this->load->view('all_product',$data);
	   $this->load->view('common/footer');
	}

	function about_us()
	{
		$this->load->view('common/header');
		$this->load->view('about_us');
		$this->load->view('common/footer');
	}
	function get_in_touch()
	{
		$this->load->view('common/header');
		$this->load->view('get_in_touch');
		$this->load->view('common/footer');
	}
	function privacy_policy()
	{
		$this->load->view('common/header');
		$this->load->view('privacy_policy');
		$this->load->view('common/footer');
	}
	function terms_conditions()
	{
		$this->load->view('common/header');
		$this->load->view('terms_conditions');
		$this->load->view('common/footer');
	}
	   
  function list_image($folder,$product_id)
	{
  		$image_array=array();
      $video_array=array();
      $certificate_array=array();
                    
      $where = array('product_id'=>$product_id);       
      $records= $this->common_model->selectWhere('tbl_product_image',$where); 
		//echo $this->db->last_query();	
		//print_ex($records);
      if(count($records)){
        foreach ($records as $row) {
            $file='uploads/product/image/'.$row->product_image;
            if(file_exists($file) && $row->product_image!=""){
                $image_array[]=$file;
            } 
        }
        if(!count($image_array)){
        		$file='assets/No_image.jpg';
            if(file_exists($file)){
                $image_array[]=$file;
            } 
        }
      } 

      return $image_array; 
	} 


	
	function getBrand($courseid)
	{
		$whereclass = 'status = 1 and (class_id = '.$courseid.' or parent_id = '.$courseid.')';
	    $crecords = $this->common_model->selectWhereorderby('tbl_class',$whereclass,'title','ASC');
		//print_ex($class_records);
		
		$classarray=array();
		$brand_array=array();
		$product_array=array();
		foreach ($crecords as $row) {
			
                $classarray[]=$row->class_id;
        }
		
		$ids = join(', ', $classarray);
		//print_ex($ids);
		//echo $ids; die;
		
		/**$where = 'product_status = "active" and class_id IN ('.$ids.')';
	    $brandrecords = $this->home_model->getBrandlist('brand_id','v_product',$where,'brand_id','brand_id','ASC');
		
		foreach ($brandrecords as $brand) {
			
                $brand_array[]=$brand->brand_id;
        }
		
		$orderby = 'product_id ASC';
		$where = 'product_status = "active" and class_id IN ('.$ids.')';
	    $productrecords = $this->home_model->getBrandlist('product_id','v_product',$where,'product_id','product_id','ASC');
		
		foreach ($productrecords as $product) {
			
                $product_array[]=$product->product_id;
        }*/
		
		//echo $this->db->last_query(); die();
		$data['brand']= $brand_array;
		$data['product']=$product_array;
		
		return $data;
	} 
	


	
}
