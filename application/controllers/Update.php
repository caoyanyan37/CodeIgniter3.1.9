<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/29
 * Time: 11:32
 */
class Update extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($bbsId)
    {
        if ((int)$bbsId <= 0) {
            adshow(__APP__, 'bbsId参数错误');
        }
        $this->db->from('bbsinfo');
        $this->db->where('bbsId =', $bbsId);
        $bbsInfo = $this->db->get();
        $data = array();
        $data['bbsInfo'] = $bbsInfo->row_array();
        $this->load->view('Update/index', $data);
    }

    public function update($bbsId)
    {
        if ((int)$bbsId <= 0) {
            adshow(__APP__, 'bbsId参数错误');
        }
        if ($_POST) {
            $updateData = array(
                'title' => isset($_POST['title']) ? $_POST['title'] : '',
                'clickTimes' => isset($_POST['clickTimes']) ? (int)$_POST['clickTimes'] : 0,
            );
            $this->db->where('bbsId', $bbsId);
            /*
             * $this->db->where('bbsId =', $bbsId);
             * $this->db->where(array(bbsId' => $bbsId));
             */
            $this->db->update('bbsInfo', $updateData);
            $res = $this->db->affected_rows();
            if ($res) {
                adshow(__APP__ . '/index/index', '更新成功');
            }else{
                adshow(__APP__.'/Update/index/'.$bbsId, '更新失败');
            }
        }
    }
}