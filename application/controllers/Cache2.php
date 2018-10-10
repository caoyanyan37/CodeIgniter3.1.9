<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/30
 * Time: 17:14
 */
class Cache2 extends CI_Controller
{
    const CACHE_TIME = 1;
    public function index()
    {
        $this->output->cache(self::CACHE_TIME);
        $this->db->where('clickTimes > 0');
        $this->db->order_by('clickTimes','desc');
        $query = $this->db->get('bbsinfo', 5);
        $bbsInfo = $query->result_array();
        $data = array(
            'bbsInfo' => $bbsInfo,
            'time' => date('YmdHis')
        );
        $this->load->view('Cache2/index', $data);
    }

    public function clearCache()
    {
        $res = $this->output->delete_cache('/Cache2/index');//成功返回true 失败返回false
        if ($res) {
            echo 1;
        }else{
            echo 0;
        }
        exit;
    }
}