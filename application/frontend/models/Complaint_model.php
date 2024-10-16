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

  function get_all_data_complaint($segment,$board,$brand,$class,$course,$batch,$rating,$sortby,$type,$user,$page)
  {
    // if its all display all id ids 
      $where = "";
    //  $limit = 20;
      $where.= "pr.status = 'active' ";
      if(!empty($segment))
      {
          $where .="and pr.segment_id = $segment";
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
          $where .= " and pr.user_id = $user";
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
      
      

    $res_seg =  $this->get_segment_name($segment);
    $seg_temp = $res_seg;
    $this->load->library('pagination');
    $per_page = 20;
    if(!$page)
    {
      $page = 1;
    }
    $referrer_url = $_SERVER['HTTP_REFERER'];  // Get Page URL
    $request_uri_without_query_string = strtok($referrer_url, '?'); //Remove Parameter
    $records_count = $this->getProductComplaintCount($where);

    /** */
    $datas['records_count'] = @$records_count['0']->complaint_count;

    $per_page = ($per_page) ? $per_page : 10;
    $offset = $page * $per_page - $per_page;
    $total_pages = ceil($datas['records_count'] / $per_page);
    $this->load->model('pagination_model');
    $res_pagination = $this->pagination_model->get_pagination($page,$total_pages,$seg_temp,$request_uri_without_query_string); // create pagination
    /** */
    $get_product_list = $this->getProductComplaintLimit($where,$orderby, $per_page, $page,$sortby);

    $data = new stdClass;
    $data->page_link= $res_pagination;
    $items='';
    $data->items = array();
   if(count($get_product_list)!=0)
   {  
      $data->total_items=count($get_product_list);
      foreach($get_product_list as $r)
      {
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
        $item->product_word_count =  get_word_count($r->product_complaint);
        $item->product_complaint = $r->product_complaint;
        $item->product_complaint_type = $r->product_complaint_type;
        $item->status = $r->status;
        $item->complaint_resolved = $r->complaint_resolved;
        $item->product_complaint_added = $r->product_complaint_added;
        $item->firstname = ucfirst($r->user_name);
        $name_first_letter = substr($r->user_name,0,1);
        $item->profile_image =   base_url().'assets/images/'.$name_first_letter.'_profile.png';
        $item->lastname = $r->lastname;
        $item->user_email = $r->user_email;
       // $item->like_count = $r->like_count;
       // $item->dislike_count = $r->dislike_count;
        //$item->share_count = $r->share_count;
        $item->segment_id = $r->segment_id;
        $item->class_id = $r->class_id;
        $item->product_name = $r->product_name;
        $item->product_slug = $r->product_slug;
        $item->product_complaint_resloved_date = $r->product_complaint_resloved_date;
        $item->sub_review = $this->get_subreview($r->product_complaint_id);
        $item->like = $this->complaint_like_count_new($r->product_complaint_id);
        $today = '';
        $difference_resloved ='';
        $current = strtotime(date("Y-m-d"));
        $db_date = strtotime($r->product_complaint_added);
        $datediff = $current - $db_date;
        $difference = floor($datediff / (60 * 60 * 24));
        if ($difference == 0) 
        {
          $today = 'today';
        }
        if($r->product_complaint_resloved_date)
        {
          $issue_resloved_date    = strtotime($r->product_complaint_resloved_date);  
          $datediff_resloved = $current - $issue_resloved_date;
          $difference_resloved = floor($datediff_resloved / (60 * 60 * 24));
        } 
        $item->not_resloved_diff = $difference;
        $item->difference_resloved = $difference_resloved;
        array_push($data->items,$item);
        
      }
     
   }
   else
   {
    
   }
   $code =200;
   $this->output->set_status_header($code)->set_content_type('application/json')->
            set_output(json_encode($data));
      
  }

  function get_subreview($product_complaint_id)
  {
    $where_complaint_reply = 'tbl_product_complaint_reply.status = 1 and tbl_product_complaint_reply.sub_id  IS NULL and complaint_id = ' .$product_complaint_id . '';
    $orderby = 'tbl_customer.customer_type ASC, tbl_product_complaint_reply.prr_id ASC';
    $complaint_reply = $this->complaint_model->selectJoinWhereOrderby('tbl_product_complaint_reply', 'user_id', 'tbl_customer', 'customer_id', $where_complaint_reply, $orderby);
    if($complaint_reply)
    {
      $data = [];
      foreach($complaint_reply as $r)
      {
        $sub_review_lv1 = new stdClass;
        $sub_review_lv1->prr_id = $r->prr_id;
        $sub_review_lv1->complaint_id = $r->complaint_id;
        $sub_review_lv1->product_id = $r->product_id;
        $sub_review_lv1->user_id = $r->user_id;
        $sub_review_lv1->reply_count =  get_word_count($r->reply);
        $sub_review_lv1->reply = $r->reply;
        $sub_review_lv1->status = $r->status;
        $date = date('d-m-Y', strtotime($r->date_added));
        $sub_review_lv1->date_added = $date;
        $sub_review_lv1->firstname = ucfirst($r->firstname);
        $name_first_letter = substr($r->firstname,0,1);
        $sub_review_lv1->profile_image =   base_url().'assets/images/'.$name_first_letter.'_profile.png';
        $sub_review_lv1->lastname = $r->lastname;
        $sub_review_lv1->email = $r->email; 
        $sub_review_lv1->customer_id = $r->customer_id;
        $sub_review_lv1->sub_review_lv1 = $this->get_subreview_lv1($r->prr_id,$r->complaint_id,$i=2);  
        array_push($data,$sub_review_lv1);
      }
      return $data;
    }
    return [];
  }

  function get_subreview_lv1($prr_id,$complaint_id,$i)
  {         
        $review_sub_reply = '';
        $where_review_reply = '';
        $orderby = '';
        $where_review_reply = 'tbl_product_complaint_reply.status = 1 and tbl_product_complaint_reply.sub_id ='.$prr_id.' and  complaint_id = '.$complaint_id.'';
        $orderby = 'tbl_customer.customer_type ASC, tbl_product_complaint_reply.prr_id ASC';
        $review_sub_reply = $this->review_model->selectJoinWhereOrderby('tbl_product_complaint_reply','user_id','tbl_customer','customer_id',$where_review_reply,$orderby);

        if($review_sub_reply)
        {
            $data = [];
           // $i =2;
            foreach($review_sub_reply as $r)
            { 
              $sub_review_lv2 = new stdClass;
              $sub_review_lv2->prr_id = $r->prr_id;
              $sub_review_lv2->complaint_id = $r->complaint_id;
              $sub_review_lv2->product_id = $r->product_id;
              $sub_review_lv2->user_id = $r->user_id;
              $sub_review_lv2->reply_count =  get_word_count($r->reply);
              $sub_review_lv2->reply = $r->reply;
              $sub_review_lv2->status = $r->status;
              $date = date('d-m-Y', strtotime($r->date_added));
              $sub_review_lv2->date_added = $date;
              $sub_review_lv2->firstname =ucfirst($r->firstname);
              $name_first_letter = substr($r->firstname,0,1);
              $sub_review_lv2->profile_image =   base_url().'assets/images/'.$name_first_letter.'_profile.png';
              $sub_review_lv2->lastname = $r->lastname;
              $sub_review_lv2->email = $r->email; 
              $sublist = 'sub_review_lv'.$i;
              $sub_review_lv2->$sublist = $this->get_subreview_lv1($r->prr_id,$r->complaint_id,$i+1);  
              array_push($data,$sub_review_lv2);
             // $i++;
            }
            return $data;
        }
        return [];
  }

  function complaint_like_count_new($product_complaint_id)
  {
      $where = 'complaint_id = '.$product_complaint_id.' and action = 1';      
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $select='count(prl_id) as like_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_complaint_like ".$where."  ");
      $res = $query->result();
      if($res)
      {
        return $res[0]->like_count;
      }

  }

  function getProductComplaintLimit($where,$order,$limit,$offset,$sort_by=1)
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
    /* $res = $this->db->last_query();
     print_r($res);*/
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
  function get_segment_name($segment_id)
  {
    $query=$this->db->query("SELECT segment_name from tbl_segment where id=$segment_id");
    $res = $query->result();
    if($res)
    {
      return $res[0]->segment_name;
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
