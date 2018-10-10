<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>数据库分页</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__;?> /public/css/bbs.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <?php
        include_once __DIR__ . '/../Public/header.php'
    ?>
    <table border="1" align="center" width="600">
      <tr>
        <td>编号</td>
        <td>标题</td>
        <td>点击次数</td>
        <td>时间</td>
      </tr>
    <?php
        foreach ($bbsInfo as $v) {
            echo '<tr>';
            echo "<td>{$v['bbsId']}</td>";
            echo "<td>{$v['title']}</td>";
            echo "<td>{$v['clickTimes']}</td>";
            echo "<td>{$v['bbsTime']}</td>";
            echo "</tr>";
        }
    ?>
      <tr>
        <td colspan="4" align="center">
            <?php
                for ($k = 1;$k <= $totalPage;$k++)
                {
                    echo '<a href="'.__APP__.'/Page1/index/'. $k .'">['. $k .']</a>&nbsp;';
                }
            ?>
        </td>
      </tr>
      <tr>
        <td colspan="4" align="center">
          <?php
             echo '<a href="'.__APP__.'/Page1/index/1">首页</a>&nbsp;';
             echo '<a href="'.__APP__.'/Page1/index/'.($currentPage-1).'">上一页</a>&nbsp;&nbsp;&nbsp;';
             echo '<a href="'.__APP__.'/Page1/index/'.($currentPage+1).'">下一页</a>&nbsp;';
             echo '<a href="'.__APP__.'/Page1/index/'.$totalPage.'">尾页</a>&nbsp;';
          ?>
        </td>
      </tr>
    </table>
  </body>
</html>












