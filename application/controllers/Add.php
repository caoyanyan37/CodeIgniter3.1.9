<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/29
 * Time: 15:26
 */
class Add extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('Add/index');
    }

    public function add()
    {
        if ($_POST) {
            $data = array(
                'title' => isset($_POST['title']) ? trim($_POST['title']) : '',
                'clickTimes' => isset($_POST['clickTimes']) ? (int)$_POST['clickTimes'] : 0,
                'bbsTime' => date('YmdHis')
            );
            $this->db->insert('bbsinfo', $data);
            $bbsId = $this->db->insert_id();
            if ($bbsId) {
                adshow(__APP__, '添加成功');
            }else{
                adshow(__APP__ . '/add/index', '添加失败');
            }
        }
    }
}