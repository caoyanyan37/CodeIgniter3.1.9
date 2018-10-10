<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/30
 * Time: 15:09
 */
class Upload1 extends CI_Controller
{
    public function index()
    {
        $this->load->view('Upload1/index');
    }

    public function upload()
    {
        $config['upload_path']      =  FCPATH . '/upload/upfile/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']     = 1024;
        $config['max_width']        = 0;
        $config['max_height']       = 0;
        $config['file_name']       = uniqid();
        $config['file_ext_tolower'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('myFile'))
        {
            $error = array('error' => $this->upload->display_errors());
            adshow(__APP__ . '/Upload1/index', '上传失败' . $error['error']);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            dd($data);exit;
            adshow(__APP__ . '/Upload1/index', '上传成功');
        }
    }
}