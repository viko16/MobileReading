<?php
class Option_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 获取相应设置项
     */
    public function get_option($optionkey)
    {
        $query = $this->db->get_where('read_option', array('optionkey' => $optionkey));
        return $query->row()->optionvalue;
    }

}