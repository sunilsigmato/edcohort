<?php
class Coupon_model extends CI_Model {
  function jewelry_list_limit($where,$limit='',$offset=0,$order='')
  {  
      if($where!=""){        
        $where="WHERE ".$where;
      }      
      if($order!=""){
        $order_query="ORDER BY ".$order;
      }
      else{
        $order_query="ORDER BY cg_id ";
      }
      //$select='P.*,PC.*,C.*,CD.*,PA.*,A.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      // $select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,product_release,product_rating,product_view,product_status,NM_FOLDER_NAME';
      // $table_name='tbl_product as P';  
      // $query = $this->db->query("SELECT * FROM tbl_cohart_group as CG 
      // join tbl_brand as BND on CG.brand_id=BND.brand_id 
      // join tbl_board as BRD on CG.board_id=BRD.board_id 
      // join tbl_class as CLS on CG.class_id=CLS.class_id 
      // join tbl_batch as BTH on CG.batch_id=BTH.batch_id 
      // join tbl_product as PR on CG.product_id=PR.product_id 
      // ".$where." ".$order_query." LIMIT  ".$offset." , ".$limit." ");

      $query = $this->db->query("select * from v_product ".$where." group by product_name  ".$order_query." LIMIT  ".$offset." , ".$limit);
      return $query->result();
  }
  function jewelry_list($where)
  { 
      if($where!=""){        
        $where="WHERE ".$where;
      }      
      // if($order!=""){
      //   $order_query="ORDER BY ".$order;
      // }
      // else{
      //   $order_query="ORDER BY product_id ";
      // }
      //$select='P.*,U.CD_USER_ID,U.NM_USER_FULLNAME,UD.NM_FOLDER_NAME';
      // $select='P.product_id,product_name,product_image,product_model,manufacturer_id,product_brand,product_sku,product_description,
      // product_condition,product_condition_note,product_country,product_price,product_sale_price,product_sale_allow,product_sale_start,
      // product_sale_end,product_quantity,product_minimum_quantity,product_maximum_quantity,product_subtract_stock,product_launch,
      // product_release,product_rating,product_view,product_status,NM_FOLDER_NAME,category_name,
      // case when product_sale_price > 0 then product_sale_price
      // else product_price
      // end as price_filter';
      // $table_name='tbl_product as P';     
      $query = $this->db->query("select * from v_product ".$where." group by product_name ");
      return $query->result();
  }
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

  function coupon_exist_check($segment,$course,$user_id,$date_time,$formattedTime,$date,$radio_btn_val)
  { 
   
    $dateTimeString = $date_time;
    $dateTime = new DateTime($dateTimeString);

    $dateTime->modify('+1 day');
    $newDateTimeString = $dateTime->format('Y-m-d H:i:s');
    $newDateString = $dateTime->format('Y-m-d');
    $newTimeString = $dateTime->format('H:i:s');
    $db_time = '';
    $db_date_time = '';
    $db_date = '';
    $db_test_date = '2024-02-13 12:19:07';
    $inc_test_date = '2024-02-14 12:19:07';


/*** Check coupon exist or not  */
$query_coupon_exist =  $this->db->query("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course' and user_id = '$user_id' and DATE(date) = '$date'");
$res_coupon_exist = $query_coupon_exist->result();
if($res_coupon_exist)
{
    print_r('coupons exist');
}
else{
    print_r('coupons exist');
}
print_r($res_coupon_exist);
exit;
/*** End check coupon exist or not  */
   //print_R($todays_datetime);
    //exit;

     $query =  $this->db->query("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course' and user_id = '$user_id' and DATE(date) >= '$date' and DATE(date) < '$newDateString' order by time DESC");
      $querys =  ("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course' and user_id = '$user_id' and DATE(date) >= '$date' and DATE(date) < '$newDateString' order by time DESC");
      $res = $query->result();
       //print_R($query);
       if($res)
       {
          //if($radio_btn_val == 'now' || $radio_btn_val == 'today')
        //  {
          
            $db_time = $res[0]->time;
            $db_date_time = $res[0]->date_time;
            $db_date = $res[0]->date;
            $db_date_time_concate = $newDateString.' '.$db_time;
            print_R($querys);
            if(strtotime($db_date_time_concate) >= strtotime($newDateTimeString))
           // if(strtotime($db_test_date) <= strtotime($inc_test_date))
            {
             // echo json_encode(array('status'=>false,'msg'=>"This Coupon has  
              //already been used or it is expired"));
             // exit;
              print_R("not expire");
          }
          else
          {
             print_R("Expired");
          }
       //}
      }
      
       exit;
  }

  function coupon_exit_check_user($segment,$course,$user_id,$date_time,$formattedTime,$date,$radio_btn_val)
  {
      $res = 0;
      
      $query_coupon_exist =  $this->db->query("select * from tbl_coupon_buyer_list where segment = '$segment' and radio_btn_selection != 'now' and course = '$course' and user_id = '$user_id' and DATE(date) = '$date'");
     // $query_coupon_exist = ("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course' and user_id = '$user_id' and DATE(date) = '$date'");
     
      $res_coupon_exist = $query_coupon_exist->result();
      if($res_coupon_exist)
      {
          $res = 1;
      }
      else{
        $res = 0;
      }
      return $res;
    
      
  }

  function coupon_exit_check_now($segment,$course,$user_id,$date_time,$formattedTime,$date,$radio_btn_val)
  {
    $dateTimeString = $date_time;
    $db_time = '';
    

      $res = 0;
      //$date->modify('+10 hours');
      $query_coupon_exist =  $this->db->query("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course' and radio_btn_selection = '$radio_btn_val' and user_id = '$user_id' and DATE(date) = '$date' order by time DESC LIMIT 1");
     
     // $query_coupon_exist = ("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course' and radio_btn_selection = '$radio_btn_val' and user_id = '$user_id' and DATE(date) = '$date' order by desc time");
     
      $res_coupon_exist = $query_coupon_exist->result();
      if($res_coupon_exist)
      {
          $res = 1;
          $db_time = $res_coupon_exist[0]->time;
          $dateTime = new DateTime($db_time);
          $dateTime->modify('+1 hour');
          $dbnewTimeString = $dateTime->format('H:i:s');
          date_default_timezone_set('Asia/Kolkata');
          $currentTimeString = date('H:i:s');
          if(strtotime($dbnewTimeString) >= strtotime($currentTimeString))
          {
              $res =1;
          }
          else{
             $res = 0;
          }
          return $res;
      }
      //exit;
      //return $res;
  }

  function get_coupon_count_now($segment,$course,$user_id)
  {
    date_default_timezone_set('Asia/Kolkata');
    $currentTimeString = date('H:i:s');
    $todayDate= date("Y-m-d");
    $todayDateTime= date("Y-m-d H:i:s");

    $dateTime = new DateTime($currentTimeString);
    $dateTime->modify('+1 hour');
    $newTimeString = $dateTime->format('H:i:s');

    $currentDateTime = new DateTime();
    //$currentDateTime->modify('-0.5 hours');
    $currentDateTime->sub(new DateInterval('PT0H30M'));  // half an hr
    $back_dateTime = $currentDateTime->format('H:i:s');
    print_R($back_dateTime );
    exit;
   /* $query_coupon_exist =  $this->db->query("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course' and radio_btn_selection = 'now' and DATE(date) = '2024-02-15' group by user_id ");
    $res_coupon_res = $query_coupon_exist->result();
    {
        if($res_coupon_res)
        {
            foreach($res_coupon_res as $r)
            {
              if(strtotime($r->time >= $currentTimeString) && strtotime($newTimeString))
                {

                }
            }
        }
    }*/
    $today_total_count = '';
    $query_coupon_todays = $this->db->query("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course'  and DATE(date) = '2024-02-15' group by user_id ");
    $res_coupon_todays_res = $query_coupon_todays->result();
    if($res_coupon_todays_res)
    {
      $today_total_count = count($res_coupon_todays_res);
    }
    print_R(count($res_coupon_todays_res));
    exit;


  
  }

  function get_coupon_count_today($segment,$course,$user_id)
  {
    date_default_timezone_set('Asia/Kolkata');
    $currentTimeString = date('H:i:s');
    $todayDate= date("Y-m-d");
    $todayDateTime= date("Y-m-d H:i:s");

    $dateTime = new DateTime($currentTimeString);
    $dateTime->modify('+1 hour');
    $newTimeString = $dateTime->format('H:i:s');
    $today_total_count = '';
    $query_coupon_todays = $this->db->query("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course'  and DATE(date) = '$todayDate' group by user_id ");
    $res_coupon_todays_res = $query_coupon_todays->result();
    if($res_coupon_todays_res)
    {
      $today_total_count = count($res_coupon_todays_res);
    }
    return $today_total_count;
  }

  function get_coupon_count_tommorow($segment,$course,$user_id)
  {
    date_default_timezone_set('Asia/Kolkata');
    $currentTimeString = date('H:i:s');
    $todayDate= date("Y-m-d");
    $todayDateTime= date("Y-m-d H:i:s");

    $dateTime = new DateTime($currentTimeString);
    $dateTime->modify('+1 day');
    $newTimeString = $dateTime->format('H:i:s');
    $TommorowDate= $dateTime->format('Y-m-d');
    $today_total_count = '';
    $query_coupon_todays = $this->db->query("select * from tbl_coupon_buyer_list where segment = '$segment' and course = '$course'  and DATE(date) = '$TommorowDate' group by user_id ");
    $res_coupon_todays_res = $query_coupon_todays->result();
    if($res_coupon_todays_res)
    {
      $today_total_count = count($res_coupon_todays_res);
    }
    
    return $today_total_count;
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
  function getProductcouponLimit($where,$limit='',$offset=0)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_coupon as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id  ".$where." order by product_coupon_id desc limit ".$offset." , ".$limit);
      return $query->result();  
  }
  function getProductcoupon($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT pr.*,c.firstname,c.lastname,p.product_name,p.product_slug FROM tbl_product_coupon as pr 
        join tbl_product as p ON pr.product_id=p.product_id 
        join tbl_customer as c ON pr.user_id=c.customer_id ".$where."");
      return $query->result();  
  }
  function getProductcouponCount($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT count(product_id) as coupon_count FROM tbl_product_coupon as pr ".$where."");
      return $query->result();  
  }
  function getProductcouponSum($where)
  {
      if($where!=""){        
        $where="WHERE ".$where;
      }
      $query=$this->db->query("SELECT SUM(product_rating) as coupon_sum FROM tbl_product_coupon as pr ".$where."");
      return $query->result();  
  }
function getcoupon($where)
 {
    $this->db->select('*');
    $this->db->from('tbl_product_coupon as PR');
    $this->db->join('tbl_customer', 'tbl_customer.customer_id = PR.user_id');
    $this->db->where($where);
	$this->db->order_by('product_id','DESC');
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
    $this->db->from('tbl_product_coupon');
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
      $query = $this->db->query("SELECT SUM(product_rating) as total FROM tbl_product_coupon where ".$where."");     
      return $query->result();
  } 
  
   function coupon_search_count($where)
  {
      if($where!=""){        
        $where="WHERE product_id = ".$where;
      }
      $select='count(product_id) as coupon_count';
      //$table_name='tbl_product as P';   
      $query = $this->db->query("select ".$select." from tbl_product_coupon_search ".$where."  ");
      return $query->result();
  }
	
}
