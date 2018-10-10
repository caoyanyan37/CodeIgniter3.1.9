<html xmlns="http://www.w3.org/1999/xhtml">
<head id="base_url" base_url="<?php echo $this->config->item("base_url");?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>表单验证</title>
    <link href="<?php echo __ROOT__; ?> /public/css/bbs.css" type="text/css" rel="stylesheet" />
    <script src="<?php echo $this->config->item("base_url")."/public/js/jquery-1.8.2.min.js";?>"></script>
    <script language="javascript" src="<?php echo $this->config->item("base_url");?>/public/js/WdatePicker.js"></script>
    <style>
        .iNowBox {
            box-shadow: 0 2px 2px rgba(0,0,0,0.05), 0 1px 0 rgba(0,0,0,0.05);
            height: 50px;
            line-height: 50px;
            padding-left: 28px;
            margin-bottom: 20px;
            color: #666;
            background: #fff;
            font-size: 14px;
            min-width: 1200px;
        }
        input[type=text] {
            font-size: 12px;
            height: 25px;
            padding: 5px 10px;
            border-radius: 3px;
            display: inline;
            border: 1px solid #d9d9d9;
            outline: none;
        }
        form{
            margin-left:20px;
        }
        form table{
            border: solid 1px #eaeef1;
            margin: 20px auto;
            width: 98%;
        }
        .select{
            margin-left:9px;
            height: 25px;
            width: 170px;
            border-radius: 3px;
            border: 1px solid #d9d9d9;
        }
        .text_area{
            margin-left:10px;
            width:250px;
            height:150px;
            border:solid 1px #d9d9d9;
            border-radius:5px;
            resize:none;
        }
        tr td:last-child{
            color:#f00;
        }
        tr .td_show{
            width:300px;
        }
        .table_info td {
            height: 35px;
            line-height: 35px;
            padding-left: 10px;
            border-top: 1px #eaeef1 solid;
        }
        td {
            font-size: 12px;
            line-height: 18px;
        }
    </style>
</head>
<body>
<?php
include_once __DIR__ . '/../Public/header.php'
?>
<div class="iNowBox"><span class="icon-location2" style="color:#999"></span> 当前页面：app添加新版本 <a href="">[刷新]</a></div>
<form name="app" action="" method="post">
    <table  class="table_info" cellspacing="1" cellpadding="2" width="99%" align="center"
            border="0">
        <tbody>
        <tr>
            <td  class="td_bg" align="right" width="100">*app操作系统：</td>
            <td align="left"  width="180">
                <select name="version_platid" class="select">
                    <?php
                    foreach ($plat_arr as $plat_id=>$plat_name) {
                        echo "<option value='".$plat_id."'>".$plat_name."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td  class="td_bg" align="right" width="100">*app版本号：</td>
            <td align="left" class="td_show">
                <input type="text" name="version_number" value="<?php echo set_value('version_number'); ?>"/>
                <span>例如: 4.7.2</span>
            </td>
            <td align="left"><?php echo form_error('version_number'); ?></td>
        </tr>
        <tr>
            <td  class="td_bg" align="right" width="100">*版本号识别码：</td>
            <td align="left" class="td_show">
                <input type="text" name="version_code" value="<?php echo set_value('version_code'); ?>"/>
                <span>例如: 43, 仅安卓用</span>
            </td>
            <td align="left"><?php echo form_error('version_code'); ?></td>
        </tr>
        <tr>
            <td  class="td_bg" align="right" width="100">*最小支持版本号识别码：</td>
            <td align="left"  class="td_show">
                <input type="text" name="version_min_support_code" value="<?php echo set_value('version_min_support_code'); ?>"/>
                <span>例如: 37, 仅安卓用</span>
            </td>
            <td align="left"><?php echo form_error('version_min_support_code'); ?></td>
        </tr>
        <tr>
            <td  class="td_bg" align="right" width="100">*是否强制更新：</td>
            <td align="left" class="td_show">
                <select name="version_forced_update" class="select">
                    <?php
                    foreach ($forced_update_arr as $key=>$val) {
                        echo "<option value='".$key."'>".$val."</option>";
                    }
                    ?>
                </select>
                <span>仅ios用</span>
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="td_bg" align="right" width="100">*app下载地址：</td>
            <td align="left" class="td_show">
                <input type="text" name="version_download_url" value="<?php echo set_value('version_download_url'); ?>"/>
            </td>
            <td align="left"><?php echo form_error('version_download_url'); ?></td>
        </tr>
        <tr>
            <td  class="td_bg" align="right" width="100">新版本发布时间：</td>
            <td align="left"  class="td_show">
                <input type="text" name="version_release_time" autocomplete="false" value="<?php echo set_value('version_release_time'); ?>" class="Wdate" onClick="WdatePicker({startDate:'%y-%M-%d 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})" />
            </td>
            <td align="left"><?php echo form_error('version_release_time'); ?></td>
        </tr>
        <tr>
            <td  class="td_bg" align="right" width="100">更新内容：</td>
            <td align="left" class="td_show">
                <textarea name="version_update_content" class="text_area"><?php echo set_value('version_update_content'); ?></textarea>
            </td>
            <td align="left"><?php echo form_error('version_update_content'); ?></td>
        </tr>
        <tr>
            <td  class="td_bg" align="right" width="100">备注：</td>
            <td align="left" width="200" class="td_show">
                <input type="text" name="version_remark" value="<?php echo set_value('version_remark');   ?>"/>
            </td>
            <td align="left"><?php echo form_error('version_remark'); ?></td>
        </tr>
        <tr>
            <td  class="td_bg"></td>
            <td><input type="submit" value=" 添加app版本 "></td>
            <td  class="td_bg"></td>
        </tr>

        </tbody>
    </table>
</form>
<br/><br/>
<script>
    var msg = "<?php echo $this->load->get_var('msg'); ?>";
    if (msg) {
        alert(msg);
    }
</script>
</body>
</html>