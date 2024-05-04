<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function __construct()
  {
      parent::__construct();
  }
		// +++++++ For Selection Of one Row +++++++++
	function selectOne($table,$column,$value)
	{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($column,$value);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ For Selection Of All Row +++++++++
	function selectAll($table)
	{
			$this->db->select('*');
			$this->db->from($table);		
			$query=$this->db->get();
			return $query->result();
	}        
	// +++++++ For Select Where (multiple condition in array) +++++++++
	function selectWhere($table,$where)
	{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ For Select Where (multiple condition in array with order by condition) +++++++++
	function selectWhereorderby($table,$where,$col,$condition)
	{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where($where);
			$this->db->order_by($col,$condition);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ For Select Where In (array) +++++++++
	function selectWhereIn($table,$column,$wherein)
	{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where_in($column,$wherein);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ For Select Join +++++++++
	function selectJoin($table1,$column1,$table2,$column2)
	{
			$this->db->select('*');
			$this->db->from($table1);
			$this->db->join($table2, $table1.'.'.$column1.' = '.$table2.'.'.$column2);
			//$this->db->where_in($column,$wherein);
			$query=$this->db->get();
			return $query->result();
	}
	// +++++++ Select max Table +++++++++++++++++
	function selectMax($table,$column)
	{
			$this->db->select_max($column);
			$query = $this->db->get($table); 
			return $query->result();
	}
	// +++++++ Select min Table +++++++++++++++++
	function selectMin($table,$column)
	{
			$this->db->select_min($column);
			$query = $this->db->get($table); 
			return $query->result();
	}
	// +++++++ To Insert Data To Table +++++++++
	function insertData($table,$data)
	{
			$this->db->insert($table,$data);
			return $this->db->insert_id();
	}
	// +++++++ To Update Data To Table +++++++++
	function updateData($table,$data,$where)
	{
			$this->db->update($table,$data,$where);			
	}
	// +++++++ To Delete Data To Table +++++++++
	function deleteData($table,$where)
	{	
			$this->db->where($where);
			$this->db->delete($table);
			//$this->db->affected_rows();
	}	
	// ++++++++ To validate login +++++++++++
	function login_check($data)
	{
			$this->db->select('CD_USER_ID,CD_GROUP_ID,NM_USER_FULLNAME,FL_USER_ACTIVE,CD_PARENT_ID','NM_USER_EMAIL');
			$this->db->from('tbl_user');
			$this->db->where('NM_USER_EMAIL',$data['user']);
			$this->db->where('USER_PASSWORD',$data['pass']);
			$this->db->where('CD_GROUP_ID',1);
			$query=$this->db->get();
			return $query->result();
	}
	//++++++++ User log ++++++++++++++++++++++++
	function userLog($user_id)
	{
			if ($this->agent->is_browser())
			{
			    $browser = $this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot())
			{
			    $browser = $this->agent->robot();
			}
			elseif ($this->agent->is_mobile())
			{
			    $browser = $this->agent->mobile();
			}
			else
			{
			    $browser = 'Unidentified';
			}
		  $platform = $this->agent->platform();
		  $ip_address = $_SERVER['REMOTE_ADDR'];

			$data=array(
					'CD_USER_ID'=>$user_id,
					'SN_IPADDRESS'=>$ip_address,
					'SN_BROWSER'=>$browser,
					'SN_OS'=>$platform,
					'TS_CREATED_AT'=>date('Y-m-d H:i:s'),
			);
			$this->db->insert('tbl_user_log',$data);
			//return $this->db->insert_id();
	}     
	//+++++++++++++Last login +++++++++++++++++++
	function last_login($vendor_id)
	{
			$this->db->select('UL.TS_CREATED_AT');
			$this->db->from('tbl_user_log UL');	
		
			$this->db->where('UL.CD_USER_ID',$vendor_id);
			$this->db->order_by('UL.CD_LOG_ID', 'DESC');
			$this->db->limit(1,1);
			$query=$this->db->get();
			return $query->result();
	}  
	
	//////////////////// added by Tarun /////////////////////////
	function get_entry_by_data($table_name, $single = false, $data = array(),$select="",$order_by='',$orderby_field='',$limit='',$offset=0) 
	{	
	 	if(!empty($select))
	 	{
	 		$this->db->select($select);
	 	}	 	
    if (empty($data))
    {          	
      	$id = $this->input->post('id');          	
      	if ( ! $id ) return false;
        $data = array('id' => $id);
    }
    if(!empty($limit))
    {
    	$this->db->limit($limit,$offset);
    }
    if(!empty($order_by) && !empty($orderby_field))
    {
    	$this->db->order_by($orderby_field,$order_by);
    }
    $query = $this->db->get_where($table_name, $data);
    $res = $query->result_array();
    //echo $this->db->last_query();exit;
    if (!empty($res)) 
    {
      if ($single){
      	return $res[0]; 
      }                
			else{
				return $res;
			}                
    }
    else
    {
      return false;
    }
  }
  function get_segement()
	{
		$query = '';
		$this->db->select('*');
		$this->db->where('status = 1');
        $this->db->from('tbl_segment b');
		$query=$this->db->get();
		if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
	}
	
	function getseg_brand_list($id)
    {
        $where= '';
        $query = '';
        $where.=" c.segment_id = ".$id." and b.brand_id = c.product_brand";
        $this->db->select('c.product_brand,b.brand_name,b.brand_image,b.brand_id,c.product_id');
        $this->db->from('tbl_product c, tbl_brand b');
         $this->db->where($where);
        $this->db->group_by('b.brand_id');
        //$sql = $this->db->get_compiled_select();
        $query=$this->db->get();
        if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
       
    }


	function getseg_class_list($id)
    {
        $where= '';
        $query = '';
        $where.=" c.segment_id = ".$id." and b.class_id = c.class_id";
        $this->db->select('b.title,b.class_id,c.product_id');
        $this->db->from('tbl_product c, tbl_class b');
         $this->db->where($where);
        $this->db->group_by('c.class_id');
        //$sql = $this->db->get_compiled_select();
        $query=$this->db->get();
        if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
       
    }
	function getseg_crse_list($id)
    {
        $where= '';
        $query = '';
        $where.=" c.segment_id = ".$id." and b.id = c.course_id";
        $this->db->select('b.course_name,b.id,c.product_id');
        $this->db->from('tbl_product c, tbl_course b');
         $this->db->where($where);
        $this->db->group_by('c.course_id');
        //$sql = $this->db->get_compiled_select();
        $query=$this->db->get();
        if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
       
    }


	function get_filter_class_detail($segment,$brand_id)
    {
        $where= '';
        $query = '';
        $where.=" c.segment_id = ".$segment." and c.brand_id = ".$brand_id." and b.class_id = c.class_id";
        $this->db->select('b.title,b.class_id,c.product_id');
        $this->db->from('tbl_product c, tbl_class b');
         $this->db->where($where);
        $this->db->group_by('c.class_id');
        //$sql = $this->db->get_compiled_select();
        $query=$this->db->get();
        if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
       
    }
	function get_filter_course_detail($segment,$board_id,$brand_id,$class_id)
    {
        $where= '';
        $query = '';
        $where.=" c.segment_id = ".$segment." and c.brand_id = ".$brand_id." and c.board_id = ".$board_id." and c.class_id = ".$class_id." and c.course_id = b.id";
        $this->db->select('b.course_name,b.id,c.product_id');
        $this->db->from('tbl_product c, tbl_course b');
         $this->db->where($where);
        $this->db->group_by('c.course_id');
        //$sql = $this->db->get_compiled_select();
        $query=$this->db->get();
        if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
       
    }
	
	function get_filter_batch_detail($segment,$board_id,$brand_id,$class_id,$course_id)
    {
        $where= '';
        $query = '';
        $where.=" c.segment_id = ".$segment." and c.brand_id = ".$brand_id." and c.board_id = ".$board_id." and c.class_id = ".$class_id." and c.course_id = ".$course_id." and c.batch_id = b.batch_id ";
        $this->db->select('b.batch_id ,b.batch_name,c.product_id');
        $this->db->from('tbl_product c, tbl_batch b');
         $this->db->where($where);
       // $this->db->group_by('c.batch_id');
        //$sql = $this->db->get_compiled_select();
        $query=$this->db->get();
        if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
       
    }

	function get_filter_result_detail($segment,$board_id,$brand_id,$class_id,$course_id,$batch_id)
	{
		$where= '';
        $query = '';
		
		if($segment != 1)
		{
			$where.=" c.segment_id = ".$segment." and c.brand_id = ".$brand_id." and c.product_type = ".$board_id." and c.class_id = ".$class_id." and c.course_id = ".$course_id." and c.batch_id = ".$batch_id." ";
		}
		else{
			$where.=" c.segment_id = ".$segment." and c.brand_id = ".$brand_id." and c.board_id = ".$board_id." and c.class_id = ".$class_id." and c.course_id = ".$course_id." and c.batch_id = ".$batch_id." ";
		}
       
        $this->db->select('*');
        $this->db->from('tbl_product c');
         $this->db->where($where);
       // $this->db->group_by('c.batch_id');
      //  $sql = $this->db->get_compiled_select();
		//print_R($sql);
        $query=$this->db->get();
        if($query)
        {
            return $query->result();
        }
        else
        {
            return $query;
        }
	}

	function event_list($where,$order_by)
    {
        if($where!="")
        {
            $where="WHERE ".$where;
        }
        $order_query=$order_by;
        $select='*';
        $table_name='tbl_event C';
        $query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." ");
        //$select='customer_id,sales_person_id,firstname,lastname,email,phone,date_added,date_edited,status,U.NM_USER_FULLNAME';
        //$table_name='tbl_customer C  right join tbl_user U on C.sales_person_id=U.CD_USER_ID';
        //$query = $this->db->query("select ".$select." from ".$table_name." ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");
     //echo $this->db->last_query();die;
        return $query->result();
    }

	function get_single_coure_detail($course_id)
	{
		$where= '';
        $query = '';
        $where.=" c.product_id = ".$course_id." and c.product_id = i.product_id";
        $this->db->select('c.*,i.product_image');
        $this->db->from('tbl_product c, tbl_product_image i');
        $this->db->where($where);
        $query=$this->db->get();
		if($query)
		{
			return $query->result();
		}
		else
		{
			return $query;
		}
	}

	function get_user_name($id)
	{
		$where= '';
        $res = '';
       // $this->db->group_by('c.batch_id');
        //$sql = $this->db->get_compiled_select();
		$query = $this->db->query("select firstname from tbl_customer where customer_id = $id");
		$res = $query->result();
		/*print_R($res[0]->firstname);
		exit;*/
        if($res)
        {
            return $res[0]->firstname;
        }
        else
        {
            return $res;
        }
	}




}
