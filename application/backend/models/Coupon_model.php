<?php
class coupon_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_coupons()
    {
        $this->db->select('*');
        $this->db->from('tbl_coupon_buying s');
        $query=$this->db->get();
        return $query->result();
    }
    
}
?>
