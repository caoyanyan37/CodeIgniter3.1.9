<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/29
 * Time: 18:14
 */
class Sql extends CI_Controller
{
    public function index()
    {
        $query = $this->db->query("select * from bbsinfo");
        $bbsInfo = $query->result_array();
        $data = array(
            'bbsInfo' => $bbsInfo
        );
        $this->load->view('Sql/index', $data);
    }

    public function delete($bbsId)
    {
        $this->db->query("delete from bbsinfo where bbsId = {$bbsId}");
        $result = $this->db->affected_rows();
        if ($result) {
            adshow(__APP__ . '/Index/index', '删除成功');
        }else{
            adshow(__APP__ . '/Index/index', '删除失败');
        }
    }
}