<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>网站首页</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__; ?>/public/css/bbs.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript">
      function delBbs(bbsId)
      {
    	  if(confirm("是否删除该记录？")){
    		  window.location = "<?php echo $this->config->item("base_app");?>/Index/delete/"+bbsId;
    	  }
      }
      function updateBbs(bbsId)
      {
    	  window.location = "<?php echo $this->config->item("base_app");?>/Update/index/"+bbsId;
      }
    </script>
  </head>
  <body>
  <?php
    $file = __DIR__ . '/../Public/header.php';
    include_once $file;
  ?>
    <table border="1" align="center" width="600">
      <tr>
        <td>编号</td>
        <td>标题</td>
        <td>点击次数</td>
        <td>时间</td>
        <td>操作</td>
      </tr>
        <?php
            foreach ($bbsInfo as $v) {
                echo '<tr>';
                echo "<td>{$v['bbsId']}</td>";
                echo "<td>{$v['title']}</td>";
                echo "<td>{$v['clickTimes']}</td>";
                echo "<td>{$v['bbsTime']}</td>";
                echo '<td>
                        <input type="button" value="修改" onclick="updateBbs(' . $v['bbsId'] .')">
                        <input type="button" value="删除" onclick="delBbs(' . $v['bbsId'] .')">
                      </td>';
                echo '</tr>';
            }
        ?>
    </table>
  </body>
</html>












