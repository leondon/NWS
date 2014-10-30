<?php keke_tpl_class::checkrefresh('admin/tpl/admin_config_tpl', '1412415447' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['tpl_manage'];?></h1>
          <div class="tool">
<a href="index.php?do=config&view=tpl" <?php if($view == 'tpl') { ?>class="here"<?php } ?> ><?php echo $_lang['tpl_edit'];?></a>

        </div>
</div>
<div class="box list">
<div class="detail">
    <form name="frm_config_msg" id="frm_config_msg" action="#" method="post" enctype="multipart/form-data">
        <input type="hidden" name="intTplId" id="intTplId" value="">
<input type="hidden" name="strSbtEdit" id="strSbtEdit" value="">
        <div class="color_select">
            <div class="title"><h2>颜色选择</h2></div>
<?php if(is_array($arrColors)) { foreach($arrColors as $v) { ?>
            <a href="index.php?do=config&view=tpl&ac=ccolor&obj=<?php echo $v['title'];?>" onclick="return  confirm('确认启用此颜色？');" class="theme-color <?php if($v['title']==$strSelectColor) { ?>selected<?php } ?>" title="<?php echo $v['title']?>" style="background: <?php echo $v['color'];?>;">√</a>
            <?php } } ?>

        </div>
       <?php if($intDirTheme) { ?>
       <div class="title"><h2>首页模版选择</h2></div>

        <div class="albums ab_col3 clearfix">



        <?php if(is_array($skins)) { foreach($skins as $k => $v) { ?>
        <dl class="album_item">
          <dt class="ab_title"> <?php echo $v?> <?php if($v==$strSelectTheme) { ?>(正在使用)<?php } ?></dt>
          <dd class="ab_fream">
            <ul>
              <li><img src="../tpl/default/theme/<?php echo $v;?>/screenshot.png" alt="默认首页"></li>
            </ul>
          </dd>

          <dd class="ab_info ws_break">

            <div class="ab_ctrl">
            	 <?php if($v==$strSelectTheme) { ?>
  <button type="button"  name="sbtEdit" id="sbtEdit" class="button" value="<?php echo $_lang['use'];?>"><span class="check icon"></span>已<?php echo $_lang['use'];?> </button>
 <?php } else { ?>
                  <a type="button" class="button" href='index.php?do=config&view=tpl&ac=ctheme&obj=<?php echo $v;?>' onclick="return  confirm('确认启用此模板？');" value="<?php echo $_lang['use'];?>"> <?php echo $_lang['use'];?> </a>
 <?php } ?>

                 <a type="button" class="button" value="<?php echo $_lang['preview'];?>" onclick="window.open('http://www.kekezu.com/app_store-view-app_tpl.html#holder')"><span class="book icon"></span><?php echo $_lang['view'];?></a>

                <!-- <a type="button" class="button" value="<?php echo $_lang['export'];?>" href='index.php?do=tpl&view=export&tplname=<?php echo $v;?>'><?php echo $_lang['backup'];?></a>-->
            </div>
          </dd>
        </dl>
<?php } } ?>

      </div>
    <?php } ?>

        <!--<table  height="auto" border="0" cellspacing="0" cellpadding="0" >
            <tr>
            	<th><?php echo $_lang['tpl_name'];?></th>
<th width="150"><?php echo $_lang['tpl_img'];?></th>
<th><?php echo $_lang['explain'];?></th>
<th><?php echo $_lang['open_status'];?></th>
<th><?php echo $_lang['current_skin'];?></th>
<th><?php echo $_lang['author'];?></th>
<th><?php echo $_lang['operate'];?></th>
            </tr>
<?php if(is_array($tpl_arr)) { foreach($tpl_arr as $key => $value) { ?>

<tr class="item">

                <td>
                	<?php echo $_lang[$value['tpl_title']];?>
                </td>
<td>
                    <img src="../tpl/<?php echo $value['tpl_title']?>/img/style/<?php echo $value['tpl_title'];?>.jpg" alt=<?php echo $_lang['preview'];?> width="110px;" height="120px;" />
</td>
<td><?php echo $value['tpl_desc']?></td>
                <td>
                	<label for="rdo_temp_<?php echo $value['tpl_id'];?>">
                         <input type="radio" value="<?php echo $value['tpl_id'];?>"
 id="rdo_temp_<?php echo $value['tpl_id'];?>" name="rdo_is_selected"
 <?php if($value['is_selected']==1) { ?>checked="checked"<?php } ?>/>
                    </label>
                </td>
                <td>
                	<?php if(is_array($skins)) { foreach($skins as $k => $v) { ?>
<input type="radio" value="<?php echo $k;?>" id="rdo_tpl_<?php echo $value['tpl_id'];?>"
 name="skin[<?php echo $value['tpl_title'];?>]" <?php if($value['tpl_pic']==$k) { ?>checked<?php } ?>/><?php echo $_lang[$v];?></br>
<?php } } ?>
                </td>
<td><?php echo $value['develop']?></td>
                <td>
                	<button type="submit"  name="sbt_edit" id="sbt_edit" class="button" value="<?php echo $_lang['use'];?>"> <?php echo $_lang['use'];?> </button>
                	 <a type="button" class="button" value="<?php echo $_lang['preview'];?>" onclick="window.open('http://www.kekezu.com/app_store-view-app_tpl.html#holder')"><span class="book icon"></span><?php echo $_lang['view'];?></a>

 <a type="button" class="button" value="<?php echo $_lang['export'];?>" href='index.php?do=tpl&view=export&tplname=<?php echo $value['tpl_path'];?>'><?php echo $_lang['backup'];?></a>
 <?php if($value['tpl_path']!='default') { ?>
                        <a href="index.php?do=config&view=tpl&delid=<?php echo $value['tpl_id']?>"
type="button" class="button" value="<?php echo $_lang['uninstall'];?>" onclick="return confirm(<?php echo $_lang['comfirm_want_del'];?>)"><?php echo $_lang['uninstall'];?></a>
                     <?php } ?>
                </td>

            </tr>
<?php } } ?>
  <tr>
                <td scope="row">

                </td>
                <td colspan="6">
                	<?php echo $_lang['enter_dir_name'];?>
<input name="txt_newtplpath" type="text" class="txt" >
<button type="submit" name="sbt_edit" class="button" value=<?php echo $_lang['from_dir_install'];?>><?php echo $_lang['from_dir_install'];?></button>

                </td>
             </tr>
        </table>-->
    </form>
</div>
</div>
<script type="text/javascript">
function confirmUse(o){
    art.dialog.confirm('确定启用？', function() {
window.location.href = o.href;
});
}
function simg(url){
art.dialog.through({title:<?php echo $_lang['view'];?>,content:"<img src='"+url+"'>"});
}
</script>
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
</html>
<?php keke_tpl_class::ob_out();?>