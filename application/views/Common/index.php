<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>Common用法</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__; ?>/public/css/bbs.css" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <?php
        include_once __DIR__ . '/../Public/header.php'
    ?>
    <table border="1" align="center" width="600">
      <tr>
        <td>
          <br><?php echo hello($a, $b);?><br>
          
          <br><?php echo truncate($title); ?><br>
          
          <br><?php echo dateformat($t); ?><br>
          
          <br>
        </td>
      </tr>
    </table>
  </body>
</html>












