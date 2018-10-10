<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/8/31
 * Time: 12:45
 */
class Calendar extends CI_Controller
{
    public function index()
    {
        /*
        $this->load->library('calendar');
        echo $this->calendar->generate();
        $data = array(
            3  => 'http://example.com/news/article/2006/06/03/',
            7  => 'http://example.com/news/article/2006/06/07/',
            13 => 'http://example.com/news/article/2006/06/13/',
            26 => 'http://example.com/news/article/2006/06/26/'
        );
        echo $this->calendar->generate(2018, 8, $data);
        */
        $prefs = array(
            'show_next_prev'  => TRUE,
            'next_prev_url'   => 'http://localhost/CodeIgniter-3.1.9/index.php/Calendar/index'
        );

        $this->load->library('calendar', $prefs);

        echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
    }
}