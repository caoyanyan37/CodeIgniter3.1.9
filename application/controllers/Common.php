<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/30
 * Time: 16:03
 */
class Common extends CI_Controller
{
    public function index()
    {
        //相当于helper里面加载的函数
        $data = array(
            'a' => 1,
            'b' => 9,
            'title' => '社会主义好大家好你好我好',
            't' => time()
        );
        $this->load->view('Common/index', $data);
    }
}