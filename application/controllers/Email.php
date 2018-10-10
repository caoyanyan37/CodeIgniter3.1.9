<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/31
 * Time: 14:30
 */
class Email extends CI_Controller
{
    public function index()
    {
        $this->load->view('Email/index');
    }

    public function sendEmail()
    {
        $toEamil = $this->input->post('email', true);
        $subject = $this->input->post('title', true);
        $content = $this->input->post('content', true);
        $this->load->library('email');
        $this->email->from('xiaoyan37.ok@163.com', 'CodeIgniter3.1.9');
        $this->email->to($toEamil);
        $this->email->subject($subject);
        $this->email->message($content);
        $this->email->attach(FCPATH . '/upload/5b87a30b5476c.png', 'inline');
        $res = $this->email->send();
        if ($res) {
            adshow(__APP__ . '/index/index', '邮件发送成功');
        }else{
            adshow(__APP__ . '/index/index', '邮件发送失败');
        }
    }
}