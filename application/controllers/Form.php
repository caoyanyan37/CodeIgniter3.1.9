<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/31
 * Time: 16:33
 */
class Form extends CI_Controller {

    private $plat_arr = array(1 => '安卓', 2 => 'ios', 3=> '其它');
    private $forced_update_arr = array(-1 => '否', 1 => '是');

    public function index()
    {
        $this->load->helper(array('form_helper', 'form', 'url'));
        $this->load->library('form_validation');
        $data = array();
        $data['plat_arr'] = $this->plat_arr;
        $data['forced_update_arr'] = $this->forced_update_arr;
        if ($_POST) {
            $this->form_validation->set_rules('version_number', 'app版本号', 'trim|required|is_unique[t_app_version.version_number]');
            $this->form_validation->set_rules('version_code', 'app版本识别码', 'trim|required');
            $this->form_validation->set_rules('version_min_support_code', '最小支持版本号', 'trim|required');
            $this->form_validation->set_rules('version_download_url', '下载地址', 'trim|required|callback_url_check');
            $this->form_validation->set_rules('version_release_time', '版本发行时间', 'trim|required');
            $this->form_validation->set_rules('version_update_content', '版本更新内容', 'trim');
            $this->form_validation->set_rules('version_remark', '版本备注', 'trim');

            if ($this->form_validation->run() == true)
            {
                //adshow(__APP__ .'/index/index', '表单验证成功');
                $this->load->vars('msg', '表单验证成功');
            }
            else
            {

                //adshow(__APP__ .'/Form/index', '表单验证失败,请核对后重新提交');
                $this->load->vars('msg', '表单验证失败,请核对后重新提交');
            }
        }
        $this->load->view('Form/index', $data);
    }

    public function url_check($url)
    {
        if (!preg_match('/[http|https]:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is', $url))
        {
            $this->form_validation->set_message('url_check', '请输入正确格式的{field}');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}