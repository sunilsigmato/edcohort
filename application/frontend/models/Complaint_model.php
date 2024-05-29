<?php
class Complaint_model extends CI_Model {
  function complaint_list_limit($where,$limit='',$offset=0,$order='')
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
      $query = $this->db->query("select * from v_product ".$where." group by product_name  ".$order_query." LIMIT  ".$offset." , ".$limit);
      return $query->result();
  }
   function complaint_list($where,$order)
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
      $query = $this->db->query("select * from v_product ".$where." group by product_name ".$order_query." ");
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

  function get_reply_count_complaint($prr_id, $review_id)
  {
    $res = 0;
    $query = $this->db->query("select count(prr_id) as tot_count from tbl_product_complaint_reply where sub_id = $prr_id");
    $result = $query->result();
    if($result)
    {
       return $res = $result[0]->tot_count;
 
    }
    return $res;
   
  }

  function get_all_data_complaint($segment,$board,$brand,$class,$course,$batch,$rating,$sortby,$type,$user,$page=0)
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

      if (!empty($type)) {
        if($type == 'resolved')
        {
          $where .= " and pr.complaint_resolved = 1 ";
        }
        if($type == 'unresolved')
        {
          $where .= " and pr.complaint_resolved = 0 ";
        }
        
      }

      // sort by pending 


    //$page = $this->input->get('page');
    $this->load->library('pagination');
    $per_page = 10;
    $records_count = $this->getProductComplaintCount($where);
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
    $get_product_list = $this->getProductComplaintLimit($where,$orderby, $per_page, $page,$sortby);

    $data = new stdClass;
    /*$data->per_page=$limit;
    $data->next_page=$next;*/
    //$data->total_items=$records_count['0']->review_count;
    //$data->page_link = $datas['page_link'];
    $items='';
    $data->items = array();
   if(count($get_product_list)!=0)
   {  
      foreach($get_product_list as $r)
      {
       // print_R($r);
        $item = new stdClass;
        $item->product_complaint_id = $r->product_complaint_id;
        $item->product_id = $r->product_id;
        $item->user_id = $r->user_id;
        $item->brand_id = $r->brand_id;
        $item->category_id = $r->category_id;
        $item->board_id = $r->board_id;
        $item->batch_id = $r->batch_id;
        $item->course_id = $r->course_id;
        $item->write_complaint = $r->write_complaint;
        $item->complaint_associated_offline  =$r->complaint_associated_offline;
        $item->product_rating = $r->product_rating;
        $item->product_complaint_title =  $r->product_complaint_title;
        $item->product_complaint = $r->product_complaint;
        $item->product_complaint_type = $r->product_complaint_type;
        $item->status = $r->status;
        $item->complaint_resolved = $r->complaint_resolved;
        $item->product_complaint_added = $r->product_complaint_added;
        $item->firstname = $r->user_name;
        $item->lastname = $r->lastname;
        $item->user_email = $r->user_email;
       // $item->like_count = $r->like_count;
       // $item->dislike_count = $r->dislike_count;
        //$item->share_count = $r->share_count;
        $item->segment_id = $r->segment_id;
        $item->class_id = $r->class_id;
        $item->product_name = $r->product_name;
        $item->product_slug = $r->product_slug;
       // $item->sub_review = $this->get_subreview($r->product_review_id);
        //$item->like = $this->review_like_count_new($r->product_review_id);
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

  function getProductComplaintLimit($where,$order,$limit='',$offset=0,$sort_by=1)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY product_complaint_id DESC ";
      }
      if($sort_by == 1)
      {
        
        $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_complaint as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id  ".$where." ".$order_query." limit ".$limit." offset ".$offset);
        return $query->result(); 
      }
      if($sort_by == 2)
      {
          $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug,COUNT(prr.complaint_id) AS reply_count FROM tbl_product_complaint as pr 
          join tbl_product as p ON pr.product_id=p.product_id 
          join tbl_customer as c ON pr.user_id=c.customer_id 
          LEFT JOIN tbl_product_complaint_reply AS prr ON pr.product_complaint_id = prr.complaint_id ".$where." and prr.sub_id IS NULL GROUP BY prr.complaint_id ORDER BY reply_count desc limit ".$limit." offset ".$offset);
          return $query->result();
      }

  }
  function getProductComplaint($where,$order='')
  {
    if($where!=""){        
      $where="WHERE ".$where;
    }
    if($order!=""){
      $order_query="ORDER BY ".$order;
    }
    else{
      $order_query="ORDER BY product_complaint_added DESC ";
    }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_complaint as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id ".$where." ".$order_query."");
      return $query->result();  
  }
  function getProductComplaintCount($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT count(product_id) as complaint_count FROM tbl_product_complaint as pr ".$where."");
      return $query->result();  
  }
  function getProductComplaintSum($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT SUM(product_rating) as complaint_sum FROM tbl_product_complaint as pr ".$where."");
      return $query->result();  
  }
function getcomplaint($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_complaint as PC');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PC.user_id');
    $this->db->where($where);
	$this->db->order_by('product_id','DESC');
    $query = $this->db->get();
    return $query->result();
   // echo $this->db->last_query(); die;
 }

 function getcomplaintdetails($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_complaint as PC');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PC.user_id');
    $this->db->join('v_product', 'v_product.product_id = PC.product_id');
    $this->db->where($where);
    $this->db->order_by('product_complaint_id','DESC');
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
    $this->db->from('tbl_product_complaint');
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
      $query = $this->db->query("SELECT SUM(product_rating) as total FROM tbl_product_complaint where ".$where."");     
      return $query->result();
  } 
  
   function complaint_search_count($where)
  {
      if($where!=""){        
        $where="WHERE product_id = ".$where;
      }
      $select='count(product_id) as complaint_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_complaint_search ".$where."  ");
      return $query->result();
  }
  
  function complaint_like_count($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $select='count(prl_id) as like_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_complaint_like ".$where."  ");
      return $query->result();
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
  function get_complaint_average_rating($course_id)  // Average rating function 
  {
    $res = 0;
    $average_rating = 0;
    // Procut Rating Query 
    $query = $this->db->query(" SELECT COUNT(case when product_rating = 1 THEN 1 END) as one_star, COUNT(case when product_rating = 2 THEN 1 END) as two_star, 
                                COUNT(case when product_rating = 3 THEN 1 END) as three_star, COUNT(case when product_rating = 4 THEN 1 END) as four_star,
                                COUNT(case when product_rating = 5 THEN 1 END) as five_star FROM `tbl_product_complaint` WHERE product_id=$course_id");
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
