<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/28
 * Time: 17:59
 */
class Index extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();
        $bbsinfo = $this->db->get('bbsinfo');
        $data['bbsInfo'] = $bbsinfo->result_array();
        $this->load->view('Index/index', $data);
    }

    public function delete($bbsId)
    {
        if ((int)$bbsId <= 0) {
            adshow(__APP__, 'bbsId参数错误');
        }
        $this->db->where('bbsId', $bbsId);
        $this->db->delete('bbsinfo');
        $res = $this->db->affected_rows();
        if ($res) {
            adshow(__APP__ . '/index/index', '删除成功');
        }else{
            adshow(__APP__ . '/index/index', '删除失败');
        }
    }
}