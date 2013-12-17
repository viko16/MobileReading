<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 根据用户名获取用户信息
     */
    public function get_admin_info_by_username($username = FALSE)
    {
        $query = $this->db->get_where('read_user', array('username' => $username));
        return $query->row_array();
    }

    /**
     * 修改密码
     */
    public function update_admin_info($id, $newpasswd)
    {
        $update_data = array(
            'password' => $newpasswd
        );
        $this->db->where('id', $id);
        return $this->db->update('read_user', $update_data);
    }
}