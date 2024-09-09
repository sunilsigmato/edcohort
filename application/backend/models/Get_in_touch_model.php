<?php
class Get_in_touch_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_in_touch()
    {
        $this->db->select('*');
        $this->db->from('tbl_get_in_touch c');
        //$this->db->join('tbl_class_description dc','c.class_id=dc.class_id');
        //$this->db->join('tbl_class_commission cc','c.class_id=cc.class_id');
        
        $query=$this->db->get();
        return $query->result();
    }
}
?>