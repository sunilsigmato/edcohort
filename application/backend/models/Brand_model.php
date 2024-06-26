<?php
class brand_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_brand()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand c');
        //$this->db->join('tbl_brand_description dc','c.brand_id=dc.brand_id');
        //$this->db->join('tbl_brand_commission cc','c.brand_id=cc.brand_id');
        
        $query=$this->db->get();
        return $query->result();
    }
    function get_brand_detail($brand_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand c');
       // $this->db->join('tbl_brand_description dc','c.brand_id=dc.brand_id');
        //$this->db->join('tbl_brand_commission cc','c.brand_id=cc.brand_id');
        $this->db->where('c.brand_id',$brand_id);
        $query=$this->db->get();
        return $query->result();
    }
    function get_parent_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand c');
        //$this->db->join('tbl_brand_description dc','c.brand_id=dc.brand_id');
        //$this->db->join('tbl_brand_commission cc','c.brand_id=cc.brand_id');
        $this->db->where('c.parent_category','0');
        $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        return $query->result();
    }
    function get_sub_category($parent_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand c');
       // $this->db->join('tbl_brand_description dc','c.brand_id=dc.brand_id');
        //$this->db->join('tbl_brand_commission cc','c.brand_id=cc.brand_id');
       // $this->db->where('c.parent_category ',$parent_id);
      //  $this->db->where('c.sub_category','0');
        $this->db->order_by('c.category_sort_order','asc');
        $query=$this->db->get();
        if($parent_id==0)
        {
          return array();
        }
        else
        {
          return $query->result();
        }

    }
        /* upload excel file to server */
        function upload_files()
        {
    
            $this->load->library('upload');
            $final_files_data = array();
    
    
            $_FILES['userfile']['name'] = $_FILES['prd_file']['name'];
            $_FILES['userfile']['type'] = $_FILES['prd_file']['type'];
            $_FILES['userfile']['tmp_name'] = $_FILES['prd_file']['tmp_name'];
            $_FILES['userfile']['error'] = $_FILES['prd_file']['error'];
            $_FILES['userfile']['size'] = $_FILES['prd_file']['size'];
    
            $config['upload_path'] = '../uploads/brand_excel/';
            $config['allowed_types'] = 'xlsx';
            $config['max_size'] = '25600';
            $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
            $file_original = pathinfo($_FILES['userfile']['name'], PATHINFO_FILENAME);
    
    
            // remove single quote
            //$file_original=str_replace("'","",$file_original);
    
            $config['file_name'] = $file_original . time() . '-' . uniqid() . "." . $ext;
    
            $this->upload->initialize($config);
    
            if (!$this->upload->do_upload()) {
                //set_notice(array('danger', $this->upload->display_errors()));
                $final_files_data = array(
                    "error" => 1,
                    "msg" => $this->upload->display_errors("", ""),
                    "file_name" => $_FILES['userfile']['name']);
    
            } else {
                $file = $this->upload->data();
                $final_files_data = array(
                    "error" => 0,
                    "file_name" => $file["client_name"],
                    "file_path" => $file["orig_name"]);
                //$this->insert_file_values_to_db($final_files_data);
            }
            return $final_files_data;
        }
}
?>
