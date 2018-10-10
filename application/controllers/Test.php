<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/9/30
 * Time: 21:15
 */
class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function val()
    {
        $borrow_type_name = '12中国';
        $name_len = mb_strlen($borrow_type_name);
        var_dump($name_len);
    }
}
