<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/30
 * Time: 18:05
 */
class Cache3 extends CI_Controller
{
    public function index()
    {
        //查询缓存
        // Turn caching on
        $this->db->cache_on();
        $query = $this->db->query("SELECT * FROM bbsinfo");
        $bbsInfo = $query->result_array();
        // Turn caching off for this one query
        $this->db->cache_off();
        $query = $this->db->query("SELECT * FROM userinfo");
        $userInfo = $query->result_array();

        $data = array(
            'bbsInfo' => $bbsInfo,
            'userInfo' => $userInfo
        );
        $this->load->view('Cache3/index', $data);
    }

    public function cache4()
    {
        //查询构造器缓存
        /*
         * 尽管不是 "真正的" 缓存，查询构造器允许你将查询的某个特定部分保存（或 "缓存"）起来， 以便在你的脚本执行之后重用。一般情况下，当查询构造器的一次调用结束后，所有已存储的信息 都会被重置，以便下一次调用。如果开启缓存，你就可以使信息避免被重置，方便你进行重用
         */
        $this->db->start_cache();
        $this->db->select('*');
        $this->db->stop_cache();
        $query = $this->db->get('bbsinfo');
        $bbsInfo = $query->result_array();
        //Generates: SELECT `*` FROM (`bbsinfo`)

        $this->db->select('userId');
        $query = $this->db->get('userinfo');
        $userInfo = $query->result_array();
        //Generates:  SELECT `field1`, `field2` FROM (`tablename`)

        $this->db->flush_cache();
        $this->db->select('userId');
        $query = $this->db->get('userinfo');
        $userIdArr = $query->result_array();
        //Generates:  SELECT `*` FROM (`userinfo`)

        $data = array(
            'bbsInfo' => $bbsInfo,
            'userInfo' => $userInfo,
            'userIdArr' => $userIdArr
        );
        $this->load->view('Cache3/cache4', $data);
    }



    public function clearCache()
    {
        $res = $this->db->cache_delete('Cache3', 'index');
        var_dump($res);
        /*
        $res = $this->db->cache_delete_all();//清除所有的缓存文件
        $res = $this->db->cache_delete();//如果你没提供任何参数，将会清除当前 URI 对应的缓存文件。
        */
        if ($res) {
            echo 1;
        }else{
            echo 0;
        }
        exit;
    }
}