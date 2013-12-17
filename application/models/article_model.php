<?php
date_default_timezone_set('PRC'); //设置时区，不然每次都warming
class Article_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 获取所有文章
     */
    public function get_article($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->order_by("priority", "desc"); //先按优先级排序
            $this->db->order_by("modifydate", "desc"); //再按日期排序
            $query = $this->db->get('read_article');
            return $query->result_array();
        }
        $query = $this->db->get_where('read_article', array('id' => $id));
        return $query->row_array();
    }

    /**
     * 搜索文章标题
     */
    public function get_article_by_keyword_and_classify($keyword,$classify=FALSE)
    {
        $this->db->order_by("priority", "desc"); //先按优先级排序
        $this->db->order_by("modifydate", "desc"); //再按日期排序
        if ($classify!=FALSE) {
            $this->db->where("classid",$classify);
        }        
        $this->db->like('title',$keyword);
        $query = $this->db->get('read_article');
        return $query->result_array();
    }

    /**
     * 检查文章是否存在
     */
    public function check_if_id_exist_in_article($id)
    {
        $i = $this->db->get_where('read_article', array('id' => $id))->num_rows;
        if ($i > 0) return TRUE;
        else return FALSE;
    }

    /**
     * 更新点击次数
     */
    public function update_article_view_times($id)
    {
        $this->db->where('id', $id);
        $this->db->set('clicktimes', 'clicktimes+1', FALSE);
        $this->db->update('read_article');
    }

    /**
     * 新建文章
     */
    public function insert_article()
    {
        $insert_data = array(
            'title'       => $this->input->post('title'),
            'content'     => $this->input->post('content'),
            'classid'     => $this->input->post('classify'),
            'priority'    => $this->input->post('priority'), //优先级
            'createdate'    => date('Y-m-d'),
            'modifydate'    => $this->input->post('modifydate'),
            'clicktimes'    => $this->input->post('clicktimes'),
            'status'    => 1 //可用
        );
        $this->db->insert('read_article',$insert_data);
        return $this->db->insert_id();//返回刚刚新建文章的id
    }

    /**
     * 编辑文章
     */
    public function update_article($id)
    {
        $update_data = array(
            'title'       => $this->input->post('title'),
            'content'     => $this->input->post('content'),
            'classid'     => $this->input->post('classify'),
            'priority'    => $this->input->post('priority'), //优先级
            'modifydate'    => $this->input->post('modifydate'),
            'clicktimes'    => $this->input->post('clicktimes')
        );
        $this->db->where('id', $id);
        return $this->db->update('read_article', $update_data);
    }

    /**
     * 删除文章
     */
    public function delete_article($id)
    {
        return $this->db->delete('read_article', array('id' => $id));
    }
}