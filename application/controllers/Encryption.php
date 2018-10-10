<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/31
 * Time: 15:43
 */
class Encryption extends CI_Controller
{
    /**
     * 新版加密
     */
    public function index()
    {
        $this->load->library('encryption');
        $plain_text = 'This is a plain-text message!';
        //旧版加密方法$this->encrypt->encode($plain_text)
        //旧版解密方法$this->encrypt->decode($plain_text)
        $ciphertext = $this->encryption->encrypt($plain_text);
        // Outputs: This is a plain-text message!
        $decrypt_text =  $this->encryption->decrypt($ciphertext);
        $data = array(
            'ori' => $plain_text,
            'after_encrypt' => $ciphertext,
            'decrypt' => $decrypt_text
        );
        $this->load->view('Encryption/index', $data);
    }

    /**
     * 旧版加密
     */
    public function oldEncrypt()
    {
        $this->load->library('encrypt');
        $plain_text = 'This is a plain-text message!';
        $ciphertext = $this->encrypt->encode($plain_text);
        $decrypt_text = $this->encrypt->decode($ciphertext);
        $data = array(
            'ori' => $plain_text,
            'after_encrypt' => $ciphertext,
            'decrypt' => $decrypt_text
        );
        $this->load->view('Encryption/index', $data);
    }
}