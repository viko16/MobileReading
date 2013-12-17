<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-Type:text/html;charset=utf-8");

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin') && $this->router->fetch_method() != 'login') {
            redirect(base_url('admin/login'), 'refresh');
            return;
        }
    }

    public function login()
    {
        if ($this->session->userdata('admin')) {
            redirect(base_url('admin/index'), 'refresh');
        }
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        if ($username && $password) {
            $userinfo = $this->user_model->get_admin_info_by_username($username);
            if ($userinfo && $userinfo['password'] == md5(md5($password))) {
                $this->session->set_userdata('admin', $username);
                redirect(base_url('admin/index'), 'refresh');
                return;
            } else {
                echo "<script>alert('用户名或密码错误，请返回检查。');history.go(-1);</script>";
                exit();
            }
        }
        $this->load->view('admin/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/login'), 'refresh');
    }

	public function index()
	{
		$this->load->view('admin/show');
	}

	/***************** 各种页面 ***************/
	public function article($ctrl = FALSE)
    {
        if ($ctrl == "add") //如果参数是add
        {
            $data["title"] = "新建文章";
            $data["id"] = "addArticle";
            $data['classify'] = $this->classify_model->get_classify();//查出分类
            $this->load->view('admin/addArticle', $data);
        } else if ($ctrl == "manage" || $ctrl === FALSE) //如果参数是manage或者无参数
        {
            $data["title"] = "管理文章";
            $data["id"] = "manageArticle";
            $data['classify'] = $this->classify_model->get_classify();//查出分类
            $data['articles'] = $this->article_model->get_article();
            $this->load->view('admin/manageArticle', $data);
        } else if ($this->article_model->check_if_id_exist_in_article($ctrl)) //如果id存在
        {
            $data["title"] = "编辑 " . $ctrl . " 号文章";
            $data["id"] = "manageArticle";
            $data['classify'] = $this->classify_model->get_classify();//查出分类
            $data['article_edit'] = $this->article_model->get_article($ctrl); //查出指定文章
            $this->load->view('admin/manageArticle', $data);
        } else {
            show_404();
        }
    }

    public function setting($ctrl = FALSE)
    {
        if ($ctrl == "modifyAdminInfo") {
            $data["title"] = "修改资料";
            $data["id"] = "modifyAdminInfo";
            $this->load->view('admin/modifyAdminInfo', $data);
        } else if ($ctrl == "modifyOption" || $ctrl === FALSE) {
            $data["title"] = "站点设置";
            $data["id"] = "modifyOption";
            $this->load->view('admin/modifyOption', $data);
        }else {
            show_404();
        }
    }


    /***************** 各种api ***************/

    public function createArticle()
    {
        $articleid = $this->article_model->insert_article();
        redirect(base_url('admin/article/manage'), 'refresh');       
    }
    

    public function editArticle($id)
    {
        $this->article_model->update_article($id);
        redirect(base_url('admin/article/manage'), 'refresh');
    }

    public function delArticle($id)
    {
        $this->article_model->delete_article($id);
        redirect(base_url('admin/article/manage'), 'refresh');
    }

    public function modifyAdminInfo() //修改管理员信息
    {
        $prepwd = $this->input->post('prepwd', TRUE);
        $newpwd = $this->input->post('newpwd', TRUE);
        $newpwd2 = $this->input->post('newpwd2', TRUE);
        $username = $this->session->userdata('admin');

        if (!($newpwd === $newpwd2)) {
            echo "<script>alert('新密码不一致');history.go(-1);</script>";
            return;
        }

        $userinfo = $this->user_model->get_admin_info_by_username($username);

        if ($userinfo['password'] === md5(md5($prepwd))) {

            if ($this->user_model->update_admin_info($userinfo['id'], md5(md5($newpwd)))) //如果修改成功
            {
                echo "<script>alert('密码修改成功！');window.location.href='" . base_url("admin/logout") . "';</script>";
            } else {
                echo "<script>alert('密码修改失败咯，请返回检查~');history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('修改失败,当前密码错误');history.go(-1);</script>";
            return;
        }
    }

}
