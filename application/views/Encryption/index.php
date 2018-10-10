<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>加密</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__; ?>/public/css/bbs.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
  <?php
    $file = __DIR__ . '/../Public/header.php';
    include_once $file;
  ?>
  <table border="1" align="center">
      <tr>
          <td>
              <br><?php echo $ori; ?><br>

              <br><?php echo $after_encrypt; ?><br>

              <br><?php echo $decrypt; ?><br>

              <br>
          </td>
      </tr>
  </table>
  <a href='<?php echo __APP__; ?>/Encryption/index'>新版加密</>
  <a href='<?php echo __APP__; ?>/Encryption/oldEncrypt'>旧版加密</>
  </body>
</html>












