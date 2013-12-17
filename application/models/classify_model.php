<?php
class Classify_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    
    /**
     * 获得分类
     */
    public function get_classify($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('read_classify');
            return $query->result_array();
        }
        $query = $this->db->get_where('read_classify', array('id' => $id));
        return $query->row_array();
    }

    
}