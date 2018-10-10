<!DOCTYPE html>
<html>
  <head>
    <title>添加记录</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__; ?>/public/css/bbs.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <?php
        include_once __DIR__ . '/../Public/header.php'
    ?>
    <form name="frm"  method="post" action="<?php echo __APP__; ?>/Add/add">
    <table border="1" align="center">
      <tr>
        <td>标题：</td>
        <td><input type="text" name="title" size="20"></td>
      </tr>
      <tr>
        <td>点击次数：</td>
        <td><input type="text" name="clickTimes" size="20"></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" value="添加">
          &nbsp;&nbsp;&nbsp;
          <input type="reset" value="重置">
        </td>
      </tr>
    </table>
    </form>
  </body>
</html>












