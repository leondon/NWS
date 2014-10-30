<?php keke_tpl_class::checkrefresh('admin/tpl/admin_config_integration_uc', '1412589852' );?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_K['charset'];?>">
<title>keke admin</title>


<link href="tpl/css/admin_management.css" rel="stylesheet" type="text/css" />
<link href="tpl/css/button/stylesheets/css3buttons.css" rel="stylesheet" type="text/css" />
<link title="style1" href="tpl/skin/default/style.css" rel="stylesheet" type="text/css" />
<!--<link title="style2" href="tpl/skin/light/style.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" src="tpl/js/jquery.js"></script>
<script type="text/javascript" src="tpl/js/keke.js"></script>
</head>
<body class="frame_body">
<div class="frame_content">
<div id="append_parent"></div>

 <div class="page_title">
    	<h1><?php echo $_lang['integrate_vip'];?></h1>
        <div class="tool">
            <a href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&type=uc" <?php if($type=="uc") { ?>class="here" <?php } ?>>Ucenter<?php echo $_lang['integrate_user'];?></a>
       <!-- <a href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&type=pw" <?php if($type=="pw") { ?>class="here" <?php } ?>>PhpWind<?php echo $_lang['integrate_user'];?></a> -->
    	</div>
</div>
<!--页头结束-->  

<div class="box post">
    <div class="tabcon">
    		<div class="title"><h2>Ucenter<?php echo $_lang['integrate_user'];?><span ><a href="#" style="font-size:small;">查看相关教程</a></span></h2></div>
            <div class="detail">
             <form action="index.php?do=config&view=integration&type=uc&ac=setting" method="post">
<input type="hidden" name="settingnew[UC_DBCONNECT]" value="0">
<input type="hidden" name="settingnew[UC_PPP]" value="20">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <th scope="row" width="180">UCenter <?php echo $_lang['uc_connection_mode'];?>:</th>
<td>
                            <select name="settingnew[UC_CONNECT]" style="width: 260px;">
<option <?php if(UC_CONNECT == 'mysql') { ?>selected="selected" <?php } ?>  value="mysql" >mysql</option>
<option value="0" <?php if(UC_CONNECT == '0') { ?>selected="selected" <?php } ?> >http</option>
</select>
                        </td>
<td><?php echo $_lang['uc_tips_about_connection_mode'];?></td>
                    </tr>

<tr>
                        <th scope="row">UCenter <?php echo $_lang['uc_author_password'];?>:</th>
                        <td><input name="uc_creater" value="" type="password" class="txt" style="width: 260px;"/></td>
                        <td><?php echo $_lang['uc_tips_about_author_password'];?></td>
                    </tr>

                    <tr>
                        <th scope="row">UCenter <?php echo $_lang['communication_key'];?>:</th>
                        <td><input name="settingnew[UC_KEY]" value="<?php echo UC_KEY;?>" type="text" class="txt" style="width: 260px;" /></td>
                        <td><?php echo $_lang['uc_tips_about_communication_key'];?></td>
                    </tr>

                    <tr>
                        <th scope="row">UCenter <?php echo $_lang['official_website'];?>:</th>
                        <td><input name="settingnew[UC_API]" value="<?php echo UC_API;?>" type="text" class="txt" size="50" style="width: 260px;"/></td>
                        <td class="vtop tips2"><?php echo $_lang['uc_tips_about_official_website'];?></td>
                    </tr>

                    <tr>
                        <th scope="row">UCenter <?php echo $_lang['ip_address'];?>:</th>
                        <td><input name="settingnew[UC_IP]" value="<?php echo UC_IP;?>" type="text" class="txt" style="width: 260px;"/></td>
                        <td><?php echo $_lang['uc_tips_about_ip_address'];?></td>
                    </tr>

                    <tr>
                        <th scope="row">UCenter <?php echo $_lang['database_server_address'];?>:</th>
                        <td><input name="settingnew[UC_DBHOST]" value="<?php echo UC_DBHOST;?>" type="text" class="txt" style="width: 260px;"/></td>
                        <td><?php echo $_lang['uc_tips_about_server_address'];?></td>
                    </tr>

                    <tr>
                        <th scope="row"> UCenter <?php echo $_lang['database_username'];?>:</th>
                        <td>
                            <input name="settingnew[UC_DBUSER]" value="<?php echo UC_DBUSER;?>" type="text" class="txt" style="width: 260px;"/>
                        </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <th scope="row">UCenter <?php echo $_lang['database_password'];?>:</th>
                        <td>
                            <input name="settingnew[UC_DBPW]" value="<?php echo UC_DBPW;?>" type="password" class="txt" style="width: 260px;"/>
                        </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <th scope="row">UCenter <?php echo $_lang['database_name'];?>:</th>
                        <td>
                            <input name="settingnew[UC_DBNAME]" value="<?php echo UC_DBNAME;?>" type="text" class="txt" style="width: 260px;"/>
                        </td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <th scope="row">UCenter <?php echo $_lang['database_prefix'];?>:</th>
                        <td>
                            <input name="settingnew[UC_DBTABLEPRE]" value="<?php echo UC_DBTABLEPRE;?>" type="text" class="txt" style="width: 260px;"/>
                        </td>
                        <td>&nbsp;</td>
                    </tr>

<tr>
                        <th scope="row"> <?php echo $_lang['database_coding'];?>:</th>
                        <td>
                            <input name="settingnew[UC_DBCHARSET]" value="<?php echo UC_DBCHARSET;?>" type="text" class="txt" style="width: 260px;"/>
                        </td>
                        <td>&nbsp;</td>
                    </tr>

 <tr>
                        <th scope="row">UCenter<?php echo $_lang['which_coding'];?>:</th>
                        <td>
                            <input name="settingnew[UC_CHARSET]" value="<?php echo UC_CHARSET;?>" type="text" class="txt" style="width: 260px;"/>
                        </td>
                        <td class="vtop tips2"></td>
                    </tr>

 <tr>
                    	<th scope="row">UCenter<?php echo $_lang['app_id'];?>:</th>
                        <td><input name="settingnew[UC_APPID]" value="<?php echo UC_APPID;?>" type="text" class="txt" style="width: 260px;"/></td>
                        <td><?php echo $_lang['uc_tips_about_app_id'];?></td>
                    </tr>

                    <tr>
                    	<th scope="row">&nbsp;</th>
<td>
                        <div class="clearfix padt10">
                        	<button type="submit" name="sbt_edit" class="positive pill primary button" value="<?php echo $_lang['submit'];?>"/><span class="check icon"></span><?php echo $_lang['submit'];?></button>
                        	
                        </div>
</td>
<td>&nbsp;</td>
                    </tr>
                </table>
            </form>	
</div>
</div>
</div>

</div>
<script type="text/javascript" src="../lang/<?php echo $language?>/script/lang.js"></script>
<script type="text/javascript" src="../static/js/xheditor/xheditor.js"></script>
<script type="text/javascript" src="tpl/js/form_and_validation.js"></script>
<script type="text/javascript" src="tpl/js/script_calendar.js"></script>
<script type="text/javascript" src="tpl/js/artdialog/artDialog.js"></script>
<script type="text/javascript" src="tpl/js/artdialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="tpl/js/artdialog/artDialog.iframeTools.source.js"></script>
<script type="text/javascript" src="tpl/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="tpl/js/styleswitch.js"></script>
<script type="text/javascript" src="tpl/js/table.js"></script>
<script type="text/javascript">
function cdel(o, s) {
d = art.dialog;
var c = "<?php echo $_lang['you_comfirm_delete_operate'];?>";
if (s) {
c = s;
}
d.confirm(c, function() {
window.location.href = o.href;
});
return false;
}
function cpass(o, s, type) {
d = art.dialog;
if (type == 1) {
var c = "确认审核通过？";
} else {
var c = "确认审核失败？";
}
if (s) {
c = s;
}
d.confirm(c, function() {
window.location.href = o.href;
});
return false;
}
function cfreeze(o, s, type) {
d = art.dialog;
if (type == 1) {
var c = "确认冻结？";
}
if (s) {
c = s;
}
d.confirm(c, function() {
window.location.href = o.href;
});
return false;
}
function crecomm(o, s, type) {
d = art.dialog;
if (type == 1) {
var c = "确认推荐？";
} else {
var c = "确认取消推荐？";
}
if (s) {
c = s;
}
d.confirm(c, function() {
window.location.href = o.href;
});
return false;
}
function pdel(frm) {
d = art.dialog;
var frm = frm;
var c = "<?php echo $_lang['you_comfirm_delete_operate'];?>";
d.confirm(c, function() {
$("#" + frm).submit();
});
return false;
}
function fdel(frm) {
d = art.dialog;
var frm = frm;
var c = "<?php echo $_lang['you_comfirm_delete_operate'];?>";
d.confirm(c, function() {
$("#" + frm).submit();
});
return false;
}
function batch_act(obj, frm) {
d = art.dialog;
var frm = frm;
var c = $(obj).val();
var conf = $(":checkbox[name='ckb[]']:checked").length;
if (conf > 0) {
d.confirm("<?php echo $_lang['confirm'];?>" + c + '?', function() {
$(".sbt_action").val(c);
$("#" + frm).submit();
});
} else {
d.alert("<?php echo $_lang['has_none_being_choose'];?>");
}
return false;
}
</script>
<?php if(KEKE_DEBUG) { ?>
<div
style="background-color: red; color: #fff; width: 400px; text-align: center;">
querys:
<?php echo db_factory::create()->get_query_num() ?>
&nbsp; times:
<?php echo kekezu::execute_time() ?>
</div>

<?php } ?>
</body>
</html><?php keke_tpl_class::ob_out();?>