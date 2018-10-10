<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>修改记录</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__; ?>/public/css/bbs.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
  <?php
    $file = __DIR__ . '/../Public/header.php';
   include_once  $file;
  ?>
    <form name="frm"  method="post" action="<?php echo __APP__ . '/Update/update/' . $bbsInfo['bbsId']; ?>">
    <table border="1" align="center">
      <tr>
        <td>标题：</td>
        <td><input type="text" name="title" size="20" value="<?php echo $bbsInfo['title']; ?>"></td>
      </tr>
      <tr>
        <td>点击次数：</td>
        <td><input type="text" name="clickTimes" size="20" value="<?php echo $bbsInfo['clickTimes']; ?>"></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" value="修改">
          &nbsp;&nbsp;&nbsp;
          <input type="reset" value="重置">
        </td>
      </tr>
    </table>
    </form>
  </body>
</html>












