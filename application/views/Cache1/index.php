<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>后台缓存</title>
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
          <br><?php echo $time; ?><br>
          <br><?php echo $memcache; ?><br>
          <br><?php echo $redis; ?><br>
          <br><?php echo $file; ?><br>
          <br><?php echo $defaultCache; ?><br>
          <br><?php echo $score; ?><br>
          <br><?php echo $inScore; ?><br>
          <br><?php echo $decScore; ?><br>
          <br>
        </td>
      </tr>
    </table>
  </body>
</html>












