<?php
class course_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_course()
    {
        $this->db->select('*');
        $this->db->from('tbl_course s');
        $query=$this->db->get();
        return $query->result();
    }
    function get_course_detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_course s');
        $this->db->where('s.id',$id);
        $query=$this->db->get();
        return $query->result();
    }

}
?>
