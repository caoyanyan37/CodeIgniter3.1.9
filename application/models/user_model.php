<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/7/23
 * Time: 14:32
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cc()
    {
        echo ENVIRONMENT;
    }
}