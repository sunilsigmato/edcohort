<?php
class Review_model extends CI_Model {
  function review_list_limit($where,$limit='',$offset=0,$order='')
  {  
      if($where!=""){        
        $where="WHERE ".$where;
      }      
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY product_id ";
      }
      //$select='P.*,PC.*,C.*,CD.*,PA.*,A.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      // $select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,product_release,product_rating,product_view,product_status,NM_FOLDER_NAME';
      // $table_name='tbl_product as P';     
      $query = $this->db->query("select * from v_product ".$where." group by product_name  ".$order_query." LIMIT  ".$offset." , ".$limit);
      return $query->result();
  }
  function review_list($where,$order)
  { 
      if($where!=""){        
        $where="WHERE ".$where;
      }      
       if($order!=""){
         $order_query="ORDER BY ".$order;
         
       }
       else{
         $order_query="ORDER BY product_id ";
       }
      //$select='P.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      // $select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,
      // product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,
      // product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,
      // product_release,product_rating,product_view,product_status,NM_FOLDER_NAME,category_name,
      // case when product_sale_price > 0 then product_sale_price
      // else product_price
      // end as price_filter';
      // $table_name='tbl_product as P';     
      $query = $this->db->query("select * from v_product ".$where." group by product_name ".$order_query." ");
      return $query->result();
  }
  
   function get_course_name($product_id)
  { 
      $result = '';
      $item = new stdClass;
      $query = $this->db->query("select p.product_name,c.brand_name from tbl_product p , tbl_brand c where p.product_id= '$product_id' and c.brand_id  = p.product_brand");
      $result = $query->result();
      if($result)
      {         
             $item->breadcrumb1_name = $result[0]->brand_name;
             $item->breadcrumb1_url = $result[0]->product_name;
             $item->breadcrumb2_name = $result[0]->product_name;
             $item->breadcrumb2_url = $result[0]->product_name;
            
      }
      return $item;
      
  }

  function fetch_board_list($brand_id,$product_type)
  {
   
      $this->db->where('brand_id', $brand_id);
      if($product_type > 0){
        $this->db->where('product_type', $product_type);
      }
      $this->db->order_by('brand_name', 'ASC');
      $this->db->group_by('board_id');
      $query = $this->db->get('v_product');
     // echo $this->db->last_query();
      $output = '<option value="">Select Board</option>';
      foreach($query->result() as $row)
      {
      $output .= '<option value="'.$row->board_id.'">'.$row->board_name.'</option>';
      }
      return $output;
  }


  function fetch_class_list($brand_id,$product_type,$board_id)
  {
   $this->db->where('brand_id', $brand_id);
   if($product_type > 0){
    $this->db->where('product_type', $product_type);
  }
  
   $this->db->where('board_id', $board_id);
   $this->db->order_by('class_name', 'ASC');
   $this->db->group_by('class_id');
   $query = $this->db->get('v_product');
   //echo $this->db->last_query();
   $output = '<option value="">Select Class</option>';
   foreach($query->result() as $row)
   {
    $output .= '<option value="'.$row->class_id.'">'.$row->class_name.'</option>';
   }
   return $output;
  }
 
    function fetch_batch_list($brand_id,$product_type,$board_id,$class_id)
  {
    $this->db->where('brand_id', $brand_id);
    if($product_type > 0){
      $this->db->where('product_type', $product_type);
    }
    if($board_id > 0){
      $this->db->where('board_id', $board_id);
    }
    $this->db->where('board_id', $board_id);
   $this->db->order_by('batch_id', 'ASC');
   $query = $this->db->get('v_product');
   $output = '<option value="">Select Batch</option>';
   foreach($query->result() as $row)
   {
    $output .= '<option value="'.$row->batch_id.'">'.$row->batch_name.'</option>';
   }
   return $output;
  }
  
   function fetch_product_data($brand_id,$product_type,$board_id,$class_id,$batch_id)
  {
	  //echo 'hello';
    $this->db->where('brand_id', $brand_id);    
    $this->db->where('product_type', $product_type);
    $this->db->where('board_id', $board_id);
	$this->db->where('class_id', $class_id);
	$this->db->where('batch_id', $batch_id);
   	$this->db->order_by('batch_id', 'ASC');
   	$query = $this->db->get('v_product');
	$query->result();
	//echo $this->db->last_query(); die('kkk');
   	$output = '';
	   foreach($query->result() as $row)
	   {
		$output .= '<option value="'.$row->batch_id.'">'.$row->batch_name.'</option>';
	   }
	   return $output;
  }

  function get_all_data($segment,$board,$brand,$class,$course,$batch,$rating,$sortby,$user,$page=0)
  {
    // if its all display all id ids 
      $where = "";
      $limit = 20;
      if(!empty($segment))
      {
          $where .="pr.segment_id = $segment";
      }
      if(!empty($board) && ($board != 'all'))
      {
          $where .= " and pr.board_id = $board";
      }
      if(!empty($brand) && ($brand != 'all'))
      {
          $where .= " and pr.brand_id = $brand";
      }
      if(!empty($class) && ($class != 'all'))
      {
          $where .= " and pr.class_id = $class";
      }
      if(!empty($course) && ($course != 'all'))
      {
          $where .= " and pr.course_id = $course";
      }
      if(!empty($batch) && ($batch != 'all'))
      {
          $where .= " and pr.batch_id = $batch";
      }
      if(!empty($rating) && ($rating != 'all'))
      {
          $where .= " and pr.product_rating = $rating";
      }
      if(!empty($user))
      {
          $where .= "and pr.user_id = $user";
      }
      $orderby = '';
      if (!empty($sortby)) {
      
        //$orderby = " pr.product_rating " . $sort_by . " ";
        if($sortby == 'most_critical')
        {
          $sortby = 2;
        }
        else
        {
          $sortby = 1;
        }
      }
      else
      {
        $sortby = 1;
      }

      // sort by pending 


    //$page = $this->input->get('page');
    $this->load->library('pagination');
    $per_page = 10;
    $records_count = $this->review_model->getProductReviewCount($where);
    //echo $this->db->last_query(); die;
    $datas['records_count'] = @$records_count['0']->review_count;
    //print_ex($data['records_count']);  
    $per_page = ($per_page) ? $per_page : 10;
    //$config['base_url'] = base_url() . 'review?course=' .$course. '&segment='.$segment.'&brand='.$brandID.'&product_type='.$product_type.'&board='.$board.'&class='.$class.'&customer_rating='.$customer_rating.'&date='.$date_posted.'&sort_by='.$sort_by.'';
    $config['total_rows'] = $datas['records_count'];
    $config['per_page'] = $per_page;
    $config['page_query_string'] = true;
    $config['query_string_segment'] = 'page';
    $config['cur_tag_open'] = '<a class="active paginate_button current">';
    $config['cur_tag_close'] = '</a>';
    $config['next_link'] = '>';
    $config['prev_link'] = '<';
    $config['num_links'] = 2;
    $config['first_link'] = false;
    $config['last_link'] = false;
    $page = ($page) ? $page : 0;
  
    $resss =$this->pagination->initialize($config);
    /*$datas['page_link'] = $this->pagination->create_links($resss);
    print$datas['page_link']);*/
    $get_product_list = $this->review_model->getProductReviewLimit($where,$orderby, $per_page, $page,$sortby);

    $data = new stdClass;
    /*$data->per_page=$limit;
    $data->next_page=$next;*/
    $data->total_items=$records_count['0']->review_count;
    //$data->page_link = $datas['page_link'];
    $items='';
    $data->items = array();
   if(count($get_product_list)!=0)
   {  
      foreach($get_product_list as $r)
      {
        //print_R($r);
        $item = new stdClass;
        $item->product_review_id = $r->product_review_id;
        $item->product_id = $r->product_id;
        $item->user_id = $r->user_id;
        $item->brand_id = $r->brand_id;
        $item->category_id = $r->category_id;
        $item->board_id = $r->board_id;
        $item->batch_id = $r->batch_id;
        $item->course_id = $r->course_id;
        $item->write_review = $r->write_review;
        $item->review_associated_offline  =$r->review_associated_offline;
        $item->product_rating = $r->product_rating;
        $item->product_review_title =  $r->product_review_title;
        $item->product_review = $r->product_review;
        $item->product_review_type = $r->product_review_type;
        $item->product_review_added = $r->product_review_added;
        $item->status = $r->status;
        $item->firstname = $r->user_name;
        $item->lastname = $r->lastname;
        $item->user_email = $r->user_email;
        $item->like_count = $r->like_count;
        $item->dislike_count = $r->dislike_count;
        $item->share_count = $r->share_count;
        $item->segment_id = $r->segment_id;
        $item->class_id = $r->class_id;
        $item->product_name = $r->product_name;
        $item->product_slug = $r->product_slug;
        $item->sub_review = $this->get_subreview($r->product_review_id);
        $item->like = $this->review_like_count_new($r->product_review_id);
        array_push($data->items,$item);
      }
     
   }
   else
   {
    
   }
   $code =200;
   $this->output->set_status_header($code)->set_content_type('application/json')->
            set_output(json_encode($data));
  
    //$data->items=$items;
      
  }
  function get_subreview($product_review_id)
  {
    $where_review_reply = 'tbl_product_review_reply.status = 1 and tbl_product_review_reply.sub_id  IS NULL and  review_id = '.$product_review_id.'';
    $orderby = 'tbl_customer.customer_type ASC, tbl_product_review_reply.prr_id ASC';
    $review_reply = $this->review_model->selectJoinWhereOrderby('tbl_product_review_reply','user_id','tbl_customer','customer_id',$where_review_reply,$orderby);
    if($review_reply)
    {
      $data = [];
      foreach($review_reply as $r)
      {
        $sub_review_lv1 = new stdClass;
        $sub_review_lv1->prr_id = $r->prr_id;
        $sub_review_lv1->review_id = $r->review_id;
        $sub_review_lv1->product_id = $r->product_id;
        $sub_review_lv1->user_id = $r->user_id;
        $sub_review_lv1->reply = $r->reply;
        $sub_review_lv1->status = $r->status;
        $sub_review_lv1->date_added = $r->date_added;
        $sub_review_lv1->firstname = $r->firstname;
        $sub_review_lv1->lastname = $r->lastname;
        $sub_review_lv1->email = $r->email; 
        $sub_review_lv1->sub_review_lv1 = $this->get_subreview_lv1($r->prr_id,$r->review_id,$i=2);  
        array_push($data,$sub_review_lv1);
      }
      return $data;
    }
    return [];
  }

  function get_subreview_lv1($prr_id,$review_id,$i)
  {
        //$data = '';
        $review_sub_reply = '';
        $where_review_reply = '';
        $orderby = '';
        $where_review_reply = 'tbl_product_review_reply.status = 1 and tbl_product_review_reply.sub_id ='.$prr_id.' and  review_id = '.$review_id.'';
        $orderby = 'tbl_customer.customer_type ASC, tbl_product_review_reply.prr_id ASC';
        $review_sub_reply = $this->review_model->selectJoinWhereOrderby('tbl_product_review_reply','user_id','tbl_customer','customer_id',$where_review_reply,$orderby);
        if($review_sub_reply)
        {
            $data = [];
           // $i =2;
            foreach($review_sub_reply as $r)
            {
              $sub_review_lv2 = new stdClass;
              $sub_review_lv2->prr_id = $r->prr_id;
              $sub_review_lv2->review_id = $r->review_id;
              $sub_review_lv2->product_id = $r->product_id;
              $sub_review_lv2->user_id = $r->user_id;
              $sub_review_lv2->reply = $r->reply;
              $sub_review_lv2->status = $r->status;
              $sub_review_lv2->date_added = $r->date_added;
              $sub_review_lv2->firstname = $r->firstname;
              $sub_review_lv2->lastname = $r->lastname;
              $sub_review_lv2->email = $r->email; 
              $sublist = 'sub_review_lv'.$i;
              $sub_review_lv2->$sublist = $this->get_subreview_lv1($r->prr_id,$r->review_id,$i+1);  
              array_push($data,$sub_review_lv2);
             // $i++;
            }
            return $data;
        }
        return [];
  }

  function getProductReviewLimit($where,$order='',$limit='',$offset=0,$sort_by=1)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY product_review_id DESC ";
      }
      if($sort_by == 1)
      {
        
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_review as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id  ".$where." ".$order_query." limit ".$limit." offset ".$offset);
        /*$res = $this->db->last_query();
        print_R($res);*/
        return $query->result();    
    }
      if($sort_by == 2)
      {
        
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug,COUNT(prr.review_id) AS reply_count FROM tbl_product_review as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id  
        LEFT JOIN tbl_product_review_reply AS prr ON pr.product_review_id = prr.review_id ".$where." and prr.sub_id IS NULL GROUP BY prr.review_id ORDER BY reply_count desc limit ".$limit." offset ".$offset);   
        return $query->result();    
    }
        
      //return $query->result();  
  }
  function review_like_count_new($product_review_id)
  {
   $where = 'review_id = '.$product_review_id.' and action = 1';
                                   // $review_reply_cnt = $this->review_model->review_like_count($where_like);
                                  
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $select='count(prl_id) as like_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_review_like ".$where."  ");
      $res = $query->result();
      if($res)
      {
        return $res[0]->like_count;
      }

  }
  function getProductReview($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_review as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id ".$where."");
      return $query->result();  
  }
  function getProductReviewCount($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT count(product_id) as review_count FROM tbl_product_review as pr ".$where."");
      $res = $this->db->last_query();
    //  print_r($res);
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
  /////////////////////////////


  function jewelry_compare($where)
  { 
      if($where!="")
      {
        $where="WHERE ".$where;
      }
      $order_query="ORDER BY product_id ";
      //$select='P.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      //$select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,product_release,product_rating,product_view,product_status,NM_FOLDER_NAME';
      //$table_name='tbl_product as P';     
      $query = $this->db->query("select * from v_product ".$where." group by product_name ".$order_query." ");
      return $query->result();
  }
  function jewelry_attribute($where)
  { 
      if($where!=""){
        $where="WHERE ".$where;
      }
      $select='*';
      $table_name='tbl_product_attribute as PA';     
      $query = $this->db->query("select ".$select." from ".$table_name."        
        join tbl_attribute as A on PA.attribute_id=A.attribute_id
          ".$where." ");
      return $query->result();
  }
  function jewelry_option($where)
  { 
      if($where!=""){
        $where="WHERE ".$where;
      }
      $select='*';
      $table_name='tbl_product_option as PO';     
      $query = $this->db->query("select ".$select." from ".$table_name."        
        join tbl_option as A on PO.option_id=A.option_id
          ".$where." ");
      return $query->result();
  }
  function jewelry_count($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $select='count(DISTINCT(product_id)) as product_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from v_product ".$where."  ");
      return $query->result();
  }
  function pro_cat($where)
  { 
      if($where!=""){
        $where="WHERE ".$where;
      }     
      $query = $this->db->query("select * from tbl_product_category as PC        
        right join tbl_addons_category as AC on PC.category_id=AC.category_id
          ".$where." group by addons_id");
      return $query->result();
  }
  function get_subcategory($category)
  {
      $this->db->select('sub_category');
      $this->db->from('tbl_jewelry');
      $this->db->group_by('sub_category'); 
      $this->db->where('category',$category);
      $query=$this->db->get();
      return $query->result();      
  }
  function get_filter($column,$table,$where='')
  {
      $this->db->select($column);
      $this->db->from($table);
      $this->db->group_by($column); 
      $this->db->where($column.'!='," ");
      if($where!="")
      {
         $this->db->where($where); 
      } 
      $query=$this->db->get();
      return $query->result();
  }
  function variation_price($where)
  {      
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query = $this->db->query("SELECT PPV.variation_id,variation_price,product_id,variation_attributes_name,variation_attributes_value 
        FROM tbl_product_price_variation as PPV 
        join tbl_product_price_variation_attributes as PPVA 
        on PPV.variation_id=PPVA.variation_id        
      ".$where." ");
      return $query->result();
  } 
  function variation_price_min($where)
  {      
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query = $this->db->query("SELECT MIN(variation_price) as min_price FROM tbl_product_price_variation as PPV ".$where." ");     
      return $query->result();
  } 
  function variation_price_max($where)
  {      
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query = $this->db->query("SELECT MAX(variation_price) as max_price FROM tbl_product_price_variation as PPV ".$where." ");     
      return $query->result();
  }
  function product_addons($where)
  {      
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query = $this->db->query("SELECT * FROM tbl_product_category as PC 
        join tbl_addons_category as AC on PC.category_id=AC.category_id 
        join tbl_addons as A on A.addons_id=A.addons_id 
        join tbl_addons_group as AG on A.addons_id=AG.addons_id 
        join tbl_addons_value as AV on AG.addons_group_id=AV.addons_group_id 
      ".$where." ");
      return $query->result();
  }
  function get_category_id($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query = $this->db->query("SELECT * FROM tbl_category as C 
        join tbl_category_description as CD on C.category_id=CD.category_id ".$where." ");
      return $query->result();      
  }
  function getProductFilter($where){
    if($where!=""){        
        $where="WHERE ".$where;
    }
    $query= $this->db->query("SELECT `value` FROM `v_product` ".$where." GROUP BY value");
    return $query->result();      
  }
  
function getreview($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_review as PR');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PR.user_id');
    $this->db->where($where);
	$this->db->order_by('product_review_id','ASC');
    $query = $this->db->get();
    return $query->result();
   // echo $this->db->last_query(); die;
 }

 function getreviewdetails($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_review as PR');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PR.user_id');
    $this->db->join('v_product', 'v_product.product_id = PR.product_id');
    $this->db->where($where);
    $this->db->order_by('product_review_id','DESC');
    $query = $this->db->get();
    return $query->result();
   // echo $this->db->last_query(); die;
 }
 
 	function selectJointwoorderby($table1,$column1,$table2,$column2,$where,$col,$condition)
	{
			$this->db->select('*');
			$this->db->from($table1);
			$this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
			$this->db->where($where);
			$this->db->order_by($col,$condition);
			$query=$this->db->get();
			return $query->result();
	}
	
	
	function count_total_rating($id = NULL) {
    $this->db->select('ROUND(AVG(product_rating)) as average');
    $this->db->where('product_id', $id);
    $this->db->from('tbl_product_review');
    $query = $this->db->get();
	return $query->result();
	}
	
	function rating_total($id,$star = NULL)
  {
	  if($id!=""){        
        $where="product_id = ".$id;
      }
	  if($star!=""){        
        $where.=" AND product_rating = ".$star;
      }      
      $query = $this->db->query("SELECT SUM(product_rating) as total FROM tbl_product_review where ".$where."");     
      return $query->result();
  } 
  
   function review_search_count($where)
  {
      if($where!=""){        
        $where="WHERE product_id = ".$where;
      }
      $select='count(product_id) as review_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_review_search ".$where."  ");
      return $query->result();
  }
  
  function review_like_count($where)
  {
   // $where_like = 'review_id = '.$review->product_review_id.' and action = 1';
                                   // $review_reply_cnt = $this->review_model->review_like_count($where_like);
                                  
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $select='count(prl_id) as like_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_review_like ".$where."  ");
      return $query->result();
  }
  function get_sub_comment($prr_id)
  {
    $select='count(prl_id) as like_count';
    $query = $this->db->query("select ".$select." from tbl_product_review_like ".$where."  ");
    return $query->result();
  }
  function get_reply_count($prr_id, $review_id)
  {
    $res = 0;
    $query = $this->db->query("select count(prr_id) as tot_count from tbl_product_review_reply where sub_id = $prr_id");
    $result = $query->result();
    if($result)
    {
       return $res = $result[0]->tot_count;
 
    }
    return $res;
   
  }

  function selectJoinWhereOrderby($table1,$column1,$table2,$column2,$where,$orderby)
  { 
      $this->db->select('*,'.$table1.'.date_added AS reply_date');
      $this->db->from($table1);
      $this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
      $this->db->where($where);
      $this->db->order_by($orderby); 
      $query=$this->db->get(); 
      return $query->result();
  }
  function get_review_average_rating($course_id)  // Average rating function 
  {
    $res = 0;
    $average_rating = 0;
    // Procut Rating Query 
    $query = $this->db->query(" SELECT COUNT(case when product_rating = 1 THEN 1 END) as one_star, COUNT(case when product_rating = 2 THEN 1 END) as two_star, 
                                COUNT(case when product_rating = 3 THEN 1 END) as three_star, COUNT(case when product_rating = 4 THEN 1 END) as four_star,
                                COUNT(case when product_rating = 5 THEN 1 END) as five_star FROM `tbl_product_review` WHERE product_id=$course_id");
    $result = $query->result();
    if($result)
    {
        $total_count = 0;
        $rating = 0;
        $total_count = 5 * $result[0]->five_star  + 4 * $result[0]->four_star + 3 * $result[0]->three_star + 2 * $result[0]->two_star + 1 * $result[0]->one_star;  // total Calculation 
        $sum_of_rating  =   $result[0]->five_star + $result[0]->four_star + $result[0]->three_star + $result[0]->two_star + $result[0]->one_star;  // sum of rating 
        if($total_count)
        {
          $average_rating = $total_count / $sum_of_rating; // average rating calculation 
        } 
   
       $average_rating = number_format($average_rating, 1);
       return $res = $average_rating;
    }
    return $res;
   
  }
 

}