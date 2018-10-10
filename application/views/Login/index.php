<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>会员登陆</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="<?php echo __ROOT__; ?>/public/css/bbs.css" type="text/css" rel="stylesheet" />
    <script  type="text/javascript" src="<?php echo __ROOT__; ?>/public/js/jquery-1.8.2.min.js"></script>
  </head>
  <body>
    <?php
        include_once __DIR__ . '/../Public/header.php'
    ?>
    <form name="frm"  method="post" action="<?php echo __APP__; ?>/Login/login">
    <table border="1" align="center">
      <tr>
        <td>登陆名称：</td>
        <td><input type="text" name="userName" size="20"></td>
      </tr>
      <tr>
        <td>登陆密码：</td>
        <td><input type="password" name="password" size="20"></td>
      </tr>
      <tr>
        <td>验证码：</td>
          <td><input type="text" name="checkCode" size="8" style="height:28px">
              <span class="captcha" onclick="changeImg(this)"></span>
          </td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" value="登陆">
          &nbsp;&nbsp;&nbsp;
          <input type="reset" value="重置">
        </td>
      </tr>
    </table>
    </form>
  <script type="text/javascript">
    function changeImg(obj)
    {
        obj.src = '<?php echo __APP__; ?>/Login/hello/' + Math.random();
    }
  </script>
    <script type="text/javascript">
        $(function(){
            //验证码
            $(".captcha").load("<?php echo __APP__; ?>/Login/hello/?"+Math.random());
            $('.captcha').bind("click", function(){
                $(".captcha").load("<?php echo __APP__; ?>/Login/hello/?"+Math.random());
            });

        })
    </script>
  </body>
</html>












