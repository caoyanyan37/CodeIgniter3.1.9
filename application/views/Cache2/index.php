<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>网页缓存</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__; ?>/public/css/bbs.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo __ROOT__; ?>/public/js/jquery-1.8.2.min.js"></script>
  </head>
  <body>
    <?php
        include_once __DIR__ . '/../Public/header.php'
    ?>
    <a href="javascript:clearCache()">清除网页缓存</a>
    <table border="1" align="center" width="600">
        <tr>
            <td>编号</td>
            <td>标题</td>
            <td>点击次数</td>
            <td>创建时间</td>
            <td>后台时间</td>
            <td>前台时间</td>
        </tr>
        <?php
        foreach ($bbsInfo as $v) {
            echo '<tr>';
            echo "<td>{$v['bbsId']}</td>";
            echo "<td>{$v['title']}</td>";
            echo "<td>{$v['clickTimes']}</td>";
            echo "<td>{$v['bbsTime']}</td>";
            echo "<td>". $time ."</td>";
            echo "<td>" . date('YmdHis') . "</td>";
            echo '</tr>';
        }
        ?>
    </table>
  <script type="text/javascript">
      function clearCache() {
          $.ajax({
              url:'http://localhost/CodeIgniter-3.1.9/index.php/Cache2/clearCache',
              type: 'post',
              date: '',
              success:function (res) {
                  if (res == 1) {
                      alert('清除缓存成功');
                  }else{
                      alert('清除缓存失败');
                  }
              }
          });
      }
  </script>
  </body>
</html>












