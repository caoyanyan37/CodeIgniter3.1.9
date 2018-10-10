<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/30
 * Time: 15:44
 */
class Upload2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('Upload2/index');
    }

    public function upload()
    {
        $config['upload_path'] = FCPATH . '/upload/upfile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['file_name'] = uniqid();
        $config['file_ext_tolower'] = true;

        $this->load->library('upload', $config);
        $arr = [];
        $field_arr = [];
        //循环处理上传文件
        foreach($_FILES as $key=>$val){
            if(is_string($val['name'])){
                //$val 单文件和多文件单独名 一维数组
                $arr[$key] = $val;
                $field_arr[] = $key;
            }else{
                //$val 多文件以数组命名 二维数组
                foreach($val['name'] as $k=>$v){
                    // $k= 0 1 2
                    // $v  1.jpg 2.jpg 3.jpg
                    $pseudo_field_name = $key . $k;
                    $arr[$pseudo_field_name]['name']=$v;
                    $arr[$pseudo_field_name]['type']=$val['type'][$k];
                    $arr[$pseudo_field_name]['tmp_name']=$val['tmp_name'][$k];
                    $arr[$pseudo_field_name]['error']=$val['error'][$k];
                    $arr[$pseudo_field_name]['size']=$val['size'][$k];
                    $field_arr[] = $pseudo_field_name;
                }
            }
        }
dd($arr);
        $_FILES = $arr;
        $data = [];
        //上传文件
        foreach ($field_arr as $field) {
            if ($this->upload->do_upload($field)) {
                $data[$field] = $this->upload->data();
            }else{
                $error = $this->upload->display_errors();
                dd($error);
            }
        }
        dd($data);
    }


    function do_mul_upload($field = 'userfile'){
        $config['upload_path'] = FCPATH . '/upload/upfile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['file_name'] = uniqid();
        $config['file_ext_tolower'] = true;

        $this->load->library('upload', $config);
        $count = count($_FILES["$field"]["name"]);//页面取的默认名称

        $file_arr = array();
        for($i = 0;$i < $count;$i++){
            $pseudo_field_name = '_psuedo_' . $field . '_' . $i;
            $_FILES[$pseudo_field_name] =   array('name' => $_FILES[$field]['name'][$i],
                'size' => $_FILES[$field]['size'][$i],
                'type' => $_FILES[$field]['type'][$i],
                'tmp_name' => $_FILES[$field]['tmp_name'][$i],
                'error' => $_FILES[$field]['error'][$i]
            );

            if ($this->upload->do_upload($pseudo_field_name)) { //默认名是:userfile

                $data = $this->upload->data();

                $in_data=array();

                $in_data["name"]= $data['file_name'];//文件名

                $in_data["path"] = $config['upload_path'];//保存的路径

                $file_arr[] = $in_data;

            }
        }
        return$file_arr;

    }
}
