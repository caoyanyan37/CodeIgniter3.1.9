<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/30
 * Time: 9:26
 */
class Page1 extends CI_Controller
{
    public function index($currentPage = 1)
    {
        //总记录数
        $total = $this->db->count_all_results('bbsinfo');
        $pageSize = 3;
        $totalPage = ceil($total/$pageSize);
        $currentPage = $currentPage < 1 ? 1 : $currentPage;
        $currentPage = $currentPage > $totalPage ? $totalPage : $currentPage;
        $start = ($currentPage - 1) *  $pageSize;
        $this->db->limit($pageSize, $start);
        $query = $this->db->get('bbsinfo');

        //$query = $this->db->get('bbsinfo', $pageSize, $start);

        $bbsInfo = $query->result_array();
        //$query = $this->db->get('mytable', 10, 20);
        //$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        $data = array(
            'currentPage' => $currentPage,
            'totalPage' => $totalPage,
            'bbsInfo' => $bbsInfo
        );
        $this->load->view('Page1/index', $data);
    }
}