<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/3
 * Time: 15:37
 */
function dd($obj = [], $type = false)
{
    echo '<pre>';
    if ($type) {
        var_dump($obj);
    }else{
        print_r($obj);
    }
    echo '</pre>';
}

function write_log($data)
{
    $now = date('Y-m-d H:i:s');
    $filename = BASEPATH . '../' . '1.txt';
    $datas = "[{$now}] " . ' URL:'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '  PHP_SELF:'. $_SERVER['PHP_SELF'];

    if (is_string($data) || is_numeric($data)) {
        $datas .= '  ERROR:' . $data;
    }else{
        $datas .= '  ERROR:' . json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    $datas .= PHP_EOL;
    file_put_contents($filename, $datas ,FILE_APPEND);
}

//后台公用
function adshow($jumpurl='', $jumpurlmsg=''){
    $CI = &get_instance();
    $data['jumpUrl'] = $jumpurl;
    $data['message'] = $jumpurlmsg;
    echo $CI->load->view('Public/success', $data, true);
    exit;
}

function hello($a, $b)
{
    return $a + $b;
}

function truncate($str, $maxLen = 7)
{
    $len = mb_strlen($str, 'utf-8');
    if ($len > $maxLen) {
        $str = mb_substr($str, 0, $maxLen, 'utf-8') . '...';
    }
    return $str;
}

/*
 * @param 时间戳 $timestamp
 * @return 格式化后的时间
 */
function dateformat($timestamp)
{
    return date('Y-m-d H:i:s', $timestamp);
}
