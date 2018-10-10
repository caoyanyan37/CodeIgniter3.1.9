<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/31
 * Time: 14:34
 */
$config['protocol'] = 'smtp';        //邮件发送协议
$config['smtp_host'] = 'smtp.163.com';    //SMTP 服务器地址
$config['smtp_user'] = 'xiaoyan37.ok@163.com';    //SMTP 用户名
$config['smtp_pass'] = '221493';        //邮箱密码
$config['mailtype'] = 'text';
$config['validate'] = TRUE;        //是否验证邮件地址
$config['charset'] = 'utf-8';        //iso-8859-1
$config['wordwrap'] = TRUE;        //是否启用自动换行
$config['crlf'] = "\r\n";        //换行符
$config['newline'] = "\r\n";    //换行符
$config['smtp_port'] = 25;        //SMTP 端口
$config['smtp_timeout'] = 10;