<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>多文件上传</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__; ?>/public/css/bbs.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <?php
        include_once __DIR__ . '/../Public/header.php'
    ?>
    <form name="frm"  method="post" action="<?php echo __APP__; ?>/Upload2/upload" enctype="multipart/form-data">
    <table border="1" align="center">
      <tr>
        <td>请选择文件：</td>
        <td><input type="file" name="myFile1" size="20"></td>
      </tr>
      <tr>
        <td>请选择文件：</td>
        <td><input type="file" name="myFile2" size="20"></td>
      </tr>
    <tr>
        <td>请选择文件2：</td>
        <td><input type="file" name="file_name[]" size="20"></td>
    </tr>
    <tr>
        <td>请选择文件2：</td>
        <td><input type="file" name="file_name[]" size="20"></td>
    </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" value="上传">
          &nbsp;&nbsp;&nbsp;
          <input type="reset" value="重置">
        </td>
      </tr>
    </table>
    </form>
  </body>
</html>












