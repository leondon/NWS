<?php keke_tpl_class::checkrefresh('admin/tpl/admin_user_suggest', '1412416784' );?><!DOCTYPE HTML>
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
<h1>投诉建议</h1>
     <div class="tool"> 
        <a href="index.php?do=<?php echo $do?>&view=<?php echo $view?>" class="here">投诉建议</a>
        
</div>
</div>
<!--页头结束--> 

      <div class="box search p_relative">
    	<div class="title"><h2><?php echo $_lang['search'];?></h2></div>
        <div class="detail" id="detail">
<form action="#" method="post">
        	<input type="hidden" name="do"   value="<?php echo $do?>">
<input type="hidden" name="view" value="<?php echo $view?>">
<input type="hidden" name="type" value="<?php echo $type?>">
<input type="hidden" name="page" value="<?php echo $page?>">
<table cellspacing="0" cellpadding="0">
 <tbody>
 	<tr>
 		<th>编号</th>
<td><input type="text" class="txt" name="txt_p_id" value="<?php echo $txt_p_id;?>" onkeyup="clearstr(this);"></td>
<th>标题</th>
<td><input type="text" class="txt" name='txt_pro_title' value="<?php echo $txt_pro_title;?>" onkeyup="clearspecial(this);"></td>
 	</tr>
<tr>
<th><?php echo $_lang['show_number'];?></th>
<td>
<select name="slt_page_size" class="ps vm">
<option value="10" <?php if($slt_page_size=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
<option value="20" <?php if($slt_page_size=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
<option value="30" <?php if($slt_page_size=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
</select>
</td>
<th><?php echo $_lang['result_order'];?></th>
<td>


<select name="ord[]">
                           <option value="p_id" <?php if($ord['0']=='p_id' or !isset($ord['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default'];?><?php echo $_lang['order'];?></option>
                           <option value="pro_time" <?php if($ord['0']=='pro_time' ) { ?> selected="selected"<?php } ?>>时间</option>
                      </select>
                      <select name="ord[]">
                            <option <?php if($ord['1']=='desc' or !isset($ord['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                            <option <?php if($ord['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                      </select>
</td>
</tr>
<tr>
<th>状态</th>
<td>
<select name="slt_static" style="width:60px;">
      		<option value="0" <?php if(!$slt_static) { ?>selected="selected"<?php } ?>> <?php echo $_lang['all'];?> </option>
<option value="1" <?php if($slt_static=='1') { ?>selected="selected"<?php } ?>> 待回复 </option>
<option value="2" <?php if($slt_static=='2') { ?>selected="selected"<?php } ?>> 已回复 </option>
</select>
<button type="submit" name="sbt_search" value="<?php echo $_lang['search']?>" class="pill" />
<span class=icon magnifier>&nbsp;</span><?php echo $_lang['search'];?></button>
</td>
</tr>
 </tbody>
</table>
</form>
        </div>
 </div>

    <div class="box list">
    	<div class="title"><h2>投诉建议</h2></div>
        <div class="detail">
<form method="post" action="#" id="frm_user_search">
<div id="ajax_dom">
<input type="hidden" name="page" value="<?php echo $page;?>" />
  		<table cellpadding="0" cellspacing="0">
  		<thead>
          <tr>
          	<th width="15">
          	<!-- <input type="checkbox" id="checkbox" onclick="checkall()"> -->
          	编号</th>
            <th>建议标题</th>
<th>建议类型</th>
<th>详细描述</th>
<th>建议时间</th>
<th>状态</th>
<th>回复内容</th>
<th>操作</th>
         </tr>
 </thead>
 <tbody> 
<?php if(is_array($suggestlist_arr)) { foreach($suggestlist_arr as $k => $v) { ?>
        <tr class="item">
        	<td class="td25">
        	<!--<input type="checkbox" name="ckb[]" class="checkbox" value="<?php echo $v['p_id'];?>">-->
        	<?php echo $v['p_id'];?></td>
<td title="<?php echo $v['pro_title'];?>"><?php echo kekezu::cutstr($v['pro_title'],20) ?></td>
<td><?php echo $suggest_type_arr[$v['pro_type']]?></td>
<td title="<?php echo $v['pro_desc'];?>"><?php echo kekezu::cutstr($v['pro_desc'],30) ?></td>
<td><?php if($v['pro_time']){echo date('Y-m-d',$v['pro_time']); } ?></td>
<td>
<?php echo $suggest_status_arr[$v['pro_status']];?>
</td>
<td title="<?php echo $v['op_content'];?>">
<?php if($v['pro_status'] == 2) { ?>
<?php echo kekezu::cutstr($v['op_content'],30) ?>
<?php } else { ?>
<?php echo $suggest_status_arr[$v['pro_status']];?>
<?php } ?>
</td>
<td>
<?php if($v['pro_status'] == 2) { ?>
<a href="index.php?do=user&view=suggest_reply&suggest_id=<?php echo $v['p_id'];?>">查看</a>
<a href="index.php?do=user&view=suggest&ac=del&page=<?php echo $page;?>&p_id=<?php echo $v['p_id'];?>" onclick="return cdel(this);">删除</a>
<?php } else { ?>
<a href="index.php?do=user&view=suggest_reply&suggest_id=<?php echo $v['p_id'];?>">回复</a>
<?php } ?>
</td>
 			        </tr>
<?php } } ?>
 </tbody>
        </table>
<?php if($pages['page']) { ?>
<div class="page"><?php echo $pages['page'];?></div>
<?php } ?>
</div>
</form>
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
</html>
<?php keke_tpl_class::ob_out();?>