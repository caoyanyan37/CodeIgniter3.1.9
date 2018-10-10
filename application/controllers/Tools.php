<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/1
 * Time: 16:08
 */
class Tools extends CI_Controller
{

    public function index()
    {
        echo 'tools work!';
    }

    public function message($to = 'World')
    {
        echo "Hello {$to}!".PHP_EOL;
    }
}