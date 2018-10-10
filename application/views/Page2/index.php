<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>分页类</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__; ?> /public/css/bbs.css" type="text/css" rel="stylesheet" />
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
                echo '</tr>';
            }
        ?>
      <tr>
        <td colspan="4" align="center">
          <!-- 分页栏 -->
            <?php
                echo $pageList;
            ?>
        </td>
      </tr>
    </table>
  </body>
</html>












