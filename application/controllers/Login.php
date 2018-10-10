<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/30
 * Time: 11:41
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('Login/index');
    }

    public function login()
    {
        write_log(1);
        if ($_POST) {
            $check = $this->validation();
            if (!$check['state']) {
                adshow(__APP__ . '/login/index', $check['msg']);
            }
            $userName = isset($_POST['userName']) ? trim($_POST['userName']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';
            $this->db->where(array('userName' => $userName, 'password' => $password));
            $query = $this->db->get('userinfo');
            $userInfo = $query->row_array();
            if ($userInfo) {
                $_SESSION['userId'] = $userInfo['userId'];
                adshow(__APP__ . '/index/index', '登录成功');
            }else{
                adshow(__APP__ . '/login/index', '用户名或密码错误');
            }
        }
    }

    public function hello()
    {
        /*
        $this->load->helper('h_captcha');
        $re = get_captcha();
        echo $re['image'];
        */

        $this->load->library('session');
        $this->load->helper('captcha');
        $captcha_word = strtoupper(substr(md5(rand()),0,4));
        $vals = array(
            'word' => $captcha_word,
            'img_path' => FCPATH.'upload/image/captcha/',
            'img_url' => __ROOT__.'/upload/image/captcha/',
            'font_path' => FCPATH.'system/fonts/texb.ttf',
            'font_size' => 13,
            'img_width' => 70,
            'img_height' => 28,
            'expiration' => 7200
        );
        $cap = create_captcha($vals);
        $this->session->set_userdata('captcha_word', $captcha_word);
        echo $cap['image'];
    }

    function validation()
    {
        /*
        $this->load->helper('h_captcha');
        $captcha = $this->input->post("checkCode");
        $re = validate_captcha($captcha);
        var_dump($captcha);
        if($re){
            $redata=array('msg'=>'验证码正确!','state'=>true);
        }else{
            $redata=array('msg'=>'验证码错误!','state'=>false);
        }
        return $redata;
        */
        $this->load->library('session');
        $captcha = $this->input->post("checkCode");
        $captcha_word = $this->session->userdata('captcha_word');
        if(strtolower($captcha_word) == strtolower($captcha)){
            $redata=array('msg'=>'验证码正确!','state'=>true);
        }else{
            $redata=array('msg'=>'验证码错误!','state'=>false);
        }
        return $redata;
    }

    public function logout()
    {
        $this->load->library('session');
        if (isset($_SESSION['userId'])) {
            unset($_SESSION['userId']);
            adshow(__APP__ . '/index/index', '退出成功');
        }
        adshow(__APP__ . '/index/index', '退出失败');
    }
}