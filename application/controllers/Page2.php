<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/30
 * Time: 10:35
 */
class Page2 extends CI_Controller
{
    public function index()
    {
        $this->load->library('pagination');
        $pageSize = 3;
        $total = $this->db->count_all_results('bbsinfo');

        $pageConfig['base_url'] = 'http://localhost/CodeIgniter-3.1.9/index.php/Page2/index';
        $pageConfig['total_rows'] = $total;
        $pageConfig['per_page'] = $pageSize;
        $pageConfig['num_links'] = 2;
        /*
        $config['uri_segment'] = 3;
        */
        $pageConfig['first_link'] = '&nbsp;首页&nbsp;';
        $pageConfig['last_link'] = '&nbsp;尾页&nbsp;';
        $pageConfig['prev_link'] = '&nbsp;上一页&nbsp;';
        $pageConfig['next_link'] = '&nbsp;下一页&nbsp;';
        $this->pagination->initialize($pageConfig);
        $pageList = $this->pagination->create_links();
        $start = (int)$this->uri->segment(3);
        $query = $this->db->get('bbsinfo', $pageSize, $start);
        $bbsInfo = $query->result_array();
        $data = array(
            'bbsInfo' => $bbsInfo,
            'pageList' => $pageList
        );
        $this->load->view('Page2/index', $data);
    }
}