<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //获取验证码
	function get_captcha(){	  
		    $CI = &get_instance();
            $CI->load->library('session');
		    $CI->load->helper('captcha');	
		    $captcha_word = strtoupper(substr(md5(rand()),0,4));
			$vals = array(
                'word' => $captcha_word,
                'img_path' => FCPATH.'upload/image/captcha/',
                'img_url' => $CI->config->item("base_url").'/upload/image/captcha/',
                'font_path' => FCPATH.'system/fonts/texb.ttf',
                'img_width' => 80,
                'img_height' => 35,
                'expiration' => 7200
		    );
			$cap = create_captcha($vals);
			$CI->session->set_userdata('captcha_word', $captcha_word);
			return $cap;
	}
	//验证，验证码
	function validate_captcha($captcha){
	    $CI = &get_instance();
        $CI->load->library('session');
        $captcha_word=$CI->session->userdata('captcha_word'); 
        if(strtolower($captcha_word)==strtolower($captcha)){
        	return true;
        }else{
        	return false;
        }
       
	}

?>