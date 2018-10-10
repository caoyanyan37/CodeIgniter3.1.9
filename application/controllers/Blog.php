<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2018/7/23
 * Time: 11:57
 */
class Blog extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        echo '你好，世界！';
    }

    public function comment($id)
    {
        echo 'this is a test and id = ' . $id;
    }

    function shoes($sandals, $id)
    {
        echo $sandals;
        echo $id;
    }

    public function blog()
    {
        $data = array(
            'title' => 'My Title',
            'heading' => 'My Heading',
            'message' => 'My Message'
        );

        $this->load->view('blogview', $data);
    }

    public function short()
    {
        $data = array(
            'username' => 'joe'
        );
        $this->load->view('short', $data);
    }
    /*
    //重映射方法
    public function _remap($method, $params = array())
    {
        $method = 'process_'.$method;
        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }
    */
    public function user()
    {
        $this->load->model('User_model', 'fubar', true);
        $this->fubar->cc();

//        $data['query'] = $this->Blog->get_last_ten_entries();
//        $this->load->view('blog', $data);

    }

    function db()
    {
        //标准查询
//        $query = $this->db->query("select * from user");
//        if ($query->num_rows() > 0)
//        {
//            foreach ($query->result_array() as $row)
//            {
//                echo $row['name'] . ' ';
//                echo $row['gender'] . ' ';
//                echo $row['age'] . ' ';
//                echo $row['city'] . ' ';
//                echo '<br/>';
//            }
//        }
        //标准插入
//        $data = array(
//            'name' => '小花',
//            'sex' => '女',
//            'age' => 26,
//            'city' => '深圳'
//        );
//        $sql = "INSERT INTO user (name, gender, age, city)
//        VALUES (".$this->db->escape($data['name']).", ".$this->db->escape($data['sex']).",
//        ".$this->db->escape($data['age']).", ".$this->db->escape($data['city']).")";
//
//        $this->db->query($sql);

//        echo $this->db->affected_rows();
        //快速查询
        $query = $this->db->get('user');
//        $s = $query->num_rows();
//        echo '<pre>';
//        var_dump($s);exit;
        echo '<pre>';
        print_r($query->result());
        print_r($query->result_array());
        print_r($query->row_array());
        exit;
        foreach ($query->result_array() as $row)
        {
            echo $row['name'] . ' ';
                echo $row['gender'] . ' ';
                echo $row['age'] . ' ';
                echo $row['city'] . ' ';
                echo '<br/>';
        }

        //快速插入
        $data = array(
            'name' => '但誉',
            'gender' => '男',
            'age' => 26,
            'city' => '大理'
        );

//        $this->db->insert('user', $data);
//        echo '最后插入的id' . $this->db->insert_id() . '<br/>';
//        echo '受影响的行数' . $this->db->affected_rows() . '<br/>';
//
//        echo '指定表的总行数' . $this->db->count_all('user') . '<br/>';
//        $str = $this->db->last_query();
//        echo 'sql语句为' . $str . '<br/>';

//        $data = array('name' => $data['name'], 'gender' => $data['gender'], 'city' => $data['city']);
//        $str = $this->db->insert_string('user', $data);
//var_dump($str);
/*        $data = array('name' => $data['name'], 'gender' => $data['gender'], 'city' => $data['city']);

        $where = "id = 2";

        $str = $this->db->update_string('user', $data, $where);

        var_dump($str);
        $s = $this->db->query($str);
        var_dump($s);*/

        //$query = $this->db->get('user', 2, 0);
        //echo $this->db->last_query();exit;//SELECT * FROM `user` LIMIT 1, 2
        //$query = $this->db->get_where('user', array('gender' => '男'), 2, 1);

/*        $this->db->select('name, gender, age, city');
        $query = $this->db->get('user');*/

//        $this->db->select_max('age', 'member_age');
//        $query = $this->db->get('user');
//$this->db->select_min();$this->db->select_avg();$this->db->select_sum();

        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('jobs', 'user.jobid = jobs.id');
        $query = $this->db->get();

        //$sss = $this->db->list_fields('user');
        //$sss = $this->db->field_exists('gender', 'user');
        $sss = $this->db->field_data('user');


        $result = $query->result_array();
        echo '<pre>';
        //print_r($result);
        print_r($sss);

    }

    public function db2()
    {
        $select = '';
        $wherearr = '';
        $order_by = '';
        $size = '';
        $start = '';


        $this->db->select($select);
        $this->db->from("t_forum as f");
        $this->db->join('t_user as u', 'u.user_id = f.user_id');
        $this->db->where($wherearr);
        $this->db->order_by($order_by);
        $this->db->limit($size,$start);
        $query=$this->db->get();
        $s = $query->result_array();
        echo '<pre>';
        print_r($s);
    }
}