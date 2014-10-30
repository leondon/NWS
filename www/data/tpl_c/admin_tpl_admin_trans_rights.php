<?php keke_tpl_class::checkrefresh('admin/tpl/admin_trans_rights', '1412416785' );?><!DOCTYPE HTML>
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
    <h1><?php echo $_lang['trans_rights'];?></h1>
    <div class="tool">
    	<?php if(is_array($action_arr)) { foreach($action_arr as $k => $v) { ?>
  <a href="index.php?do=<?php echo $do;?>&view=<?php echo $k;?>&report_type=<?php echo $v['0'];?>" <?php if($view==$k) { ?>class="here"<?php } ?>><?php echo $v['1'];?><?php echo $_lang['list'];?></a>
<?php } } ?>
<a href="index.php?do=user&view=suggest">建议列表</a>
    </div>
</div>
<div class="box tip clearfix p_relative" id="man_tips">
 <div class="control"><a href="javascript:void(0);" title=<?php echo $_lang['close'];?>><b>&times;</b></a></div>
 <div class="title"><h2><?php echo $_lang['tips'];?></h2></div>
 <div class="detail pad10">
  <ul>
     <li><?php echo $_lang['only_delete_not_accept'];?><font color="red"><?php echo $action_arr[$view]['1'];?><?php echo $_lang['record'];?></font><?php echo $_lang['zh_jh'];?><?php echo $_lang['delete_it_carefully_confirm'];?></li>
  </ul>
 </div>
</div>
<div class="box search p_relative">
 <div class="title">
    <h2><?php echo $_lang['search'];?></h2>
 </div>
 <div class="detail" id="detail">
  <form action="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>" method="post" id="frm_user_search">
   <input type="hidden" value="<?php echo $page;?>" name="page">
     <table cellspacing="0" cellpadding="0">
      <tbody>
       <tr>
        <th><?php echo $action_arr[$view]['1'];?><?php echo $_lang['id'];?></th>
        <td> <input type="text" name="report_id" class="txt" onkeyup="clearstr(this);"/> </td>
<th><?php echo $action_arr[$view]['1'];?><?php echo $_lang['type'];?></th>
        <td>
          <select class="ps vm" name="obj">
    <option value="" <?php if(!$obj) { ?>selected="selected"<?php } ?>><?php echo $_lang['all'];?></option>
          	<?php if(is_array($trans_object)) { foreach($trans_object as $k => $v) { ?>
 <option value="<?php echo $k;?>" <?php if($k==$obj) { ?>selected="selected"<?php } ?>><?php echo $v;?> </option>
<?php } } ?>
          </select>
        </td>
       	<th><?php echo $action_arr[$view]['1'];?><?php echo $_lang['status'];?></th>
        <td>
          <select class="ps vm" name="report_status" id="catid">
          	<option value="" <?php if(!$report_status) { ?>selected="selected"<?php } ?>><?php echo $_lang['all'];?></option>
          	<?php if(is_array($trans_status)) { foreach($trans_status as $k => $v) { ?>
 <option value="<?php echo $k;?>" <?php if($k==$report_status) { ?>selected="selected"<?php } ?>><?php echo $v;?> </option>
<?php } } ?>
          </select>
        </td>
       </tr>
       <tr>
       	 <th><?php echo $_lang['order_way'];?></th>
       <td>
            <select name="ord[]">
                                	<option value="report_id" <?php if($ord['0']=='report_id' or !isset($ord['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['trans_rights'];?></option>
                                	<option value="on_time" <?php if($ord['0']=='on_time' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['pub_time'];?></option>
                                </select>
            <select name="ord[]">
                               		 <option <?php if($ord['1']=='desc' or !isset($ord['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                                	<option <?php if($ord['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                                </select>
        </td>
        <th><?php echo $_lang['list_result'];?></th>
        <td>
         <select name="w[page_size]">
           <option value="10" <?php if($w['page_size']=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
           <option value="20" <?php if($w['page_size']=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
           <option value="30" <?php if($w['page_size']=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
         </select>
 <button class="pill" type="submit" value=<?php echo $_lang['search'];?> name="sbt_search">
          		<span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?>
         </button>
 <th>&nbsp;</th>



        </td>
       </tr>
      </tbody>
     </table>
  </form>
 </div>
 </div>
<!--搜索结束-->
<div class="box list">
<div class="tab">
   <a href="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&ord=<?php echo $ord;?>&page_size=<?php echo $page_size;?>" <?php if(!$report_status) { ?>style="color:red" class="select"<?php } ?>><?php echo $_lang['all'];?></a>
    <?php if(is_array($trans_status)) { foreach($trans_status as $k => $v) { ?>
      <a href="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&ord=<?php echo $ord;?>&obj=<?php echo $obj;?>&report_status=<?php echo $k;?>&page_size=<?php echo $page_size;?>" <?php if($report_status==$k) { ?>style="color:red" class="select"<?php } ?>><?php echo $v;?></a>
    <?php } } ?>
  </div>
  <div class="tabcon">
  <div class="title">
    <h2><?php echo $_lang['task_manage'];?></h2>
  </div>
  <div class="detail">
   <form action="index.php?do=<?php echo $do;?>&w['report_status']=<?php echo $w['report_status']?>" method="post" id="frm_art_action">
<input type="hidden" value="<?php echo $page;?>" name="page">
<input type="hidden" value="<?php echo $page_size;?>" name="page_size">
<div id="ajax_dom"><input type="hidden" name="page" value="<?php echo $page;?>" />
<table cellpadding="0" cellspacing="0">
      <tbody>
       <tr>
        <th><?php echo $action_arr[$view]['1'];?><?php echo $_lang['id'];?></th>
<th><?php echo $_lang['belong_to'];?>
<?php if(!$obj) { ?><?php echo $_lang['object'];?><?php } else { ?>
<?php echo $trans_object[$obj];?>
<?php } ?></th>
        <th>举报类型</th>
        <th>举报原因</th>
<th><?php echo $action_arr[$view]['1'];?><?php echo $_lang['people'];?></th>
        <th><?php echo $_lang['be'];?><?php echo $action_arr[$view]['1'];?><?php echo $_lang['people'];?></th>
<th><?php echo $action_arr[$view]['1'];?><?php echo $_lang['attachment'];?></th>
        <th><?php echo $action_arr[$view]['1'];?><?php echo $_lang['time'];?></th>
        <th><?php echo $_lang['now_status'];?></th>
        <th><?php echo $_lang['process_people'];?></th>
<th><?php echo $_lang['operate'];?></th>
       </tr>
     <?php if(is_array($report_list)) { foreach($report_list as $v) { ?>
       <tr class="item">
         <td class="td25">
         <!-- <input type="checkbox" name="ckb[]" class="checkbox" value="<?php echo $v['report_id'];?>"> -->
         <?php echo $v['report_id'];?></td>
         <td width="td28">
        	<?php if($v['obj']=='task') { ?><!--任务-->
<a href="<?php echo $_K['siteurl'];?>/index.php?do=task&id=<?php echo $v['origin_id'];?>" target="_blank">
<?php } elseif($v['obj']=='work') { ?><!--稿件-->

<?php if($v['model_id']==1||$v['model_id']==2||$v['model_id']==3) { ?>
<a href="<?php echo $_K['siteurl'];?>/index.php?do=taskhandle&op=workinfo&taskId=<?php echo $v['origin_id'];?>&workId=<?php echo $v['obj_id'];?>" target="_blank">
<?php } else { ?>
<a href="<?php echo $_K['siteurl'];?>/index.php?do=task&id=<?php echo $v['origin_id'];?>&view=work#detail" target="_blank">
<?php } ?>
<?php } elseif($v['obj']=='order') { ?><!--商品订单-->
<a href="<?php echo $_K['siteurl'];?>/index.php?do=goods&id=<?php echo $v['origin_id'];?>" target="_blank">
<?php } elseif($v['obj']=='product') { ?><!--商品-->
<a href="<?php echo $_K['siteurl'];?>/index.php?do=goods&id=<?php echo $v['origin_id'];?>" target="_blank">
<?php } elseif($v['obj']=='seller') { ?><!--商家-->
<a href="<?php echo $_K['siteurl'];?>/index.php?do=seller&id=<?php echo $v['to_uid'];?>" target="_blank">
<?php } ?>
        	<?php echo $_lang['view_belongs'];?><?php echo $trans_object[$v['obj']];?></a>
 </td>
 <td><?php echo $v['report_reason'];?></td>
 <td><?php echo kekezu::cutstr($v['report_desc'],30); ?>...</td>
         <td><a href="<?php echo $_K['siteurl'];?>/index.php?do=seller&id=<?php echo $v['uid'];?>" target="_blank"><?php echo $v['username'];?></a></td>
 <td><a href="<?php echo $_K['siteurl'];?>/index.php?do=seller&id=<?php echo $v['to_uid'];?>" target="_blank"><?php echo $v['to_username'];?></a></td>
         <td>

<?php if($v['report_file']) { ?>
<?php $fileLists=explode('|',$v['report_file']); ?>
<?php if(is_array($fileLists)) { foreach($fileLists as $k2 => $v2) { ?>
<?php $k2= $k2+1 ; ?>
<a target="_blank" href="../<?php echo $v2;?>">附件<?php echo $k2;?></a>
<?php } } ?>
<?php } else { ?>
<?php echo $_lang['not_submit_attachment'];?>
<?php } ?>
</td>
<td><?php if($v['on_time']){echo date('Y-m-d',$v['on_time']); } ?></td>
<td><?php echo $trans_status[$v['report_status']];?></td>
<td><?php if($v['op_uid']) { ?><a href="<?php echo $_K['siteurl'];?>/index.php?do=seller&id=<?php echo $v['op_uid'];?>" target="_blank"><?php echo $v['op_username'];?></a><?php } else { ?>--<?php } ?></td>
<td>

            <?php if($v['report_status']=='1'||$v['report_status']=='2'||$v['report_status']=='4') { ?><!--待处理、处理中、已受理-->
<a class="button" href="index.php?do=<?php echo $do;?>&view=process&type=<?php echo $view;?>&report_id=<?php echo $v['report_id'];?>"><?php if($v['report_status']=='4') { ?><?php echo $_lang['view_scheme'];?><?php } else { ?><span class="check icon"></span><?php echo $_lang['process'];?><?php echo $action_arr[$view]['1'];?><?php } ?></a>
<?php } ?>
<?php if($v['report_status']=='3') { ?><!--未受理、-->
<a class="button" href="<?php echo $url;?>&ac=del&report_id=<?php echo $v['report_id'];?>" onclick="return cdel(this);"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
<?php } ?>
 </td>
        </tr>
        <?php } } ?>
        <tr>
       <td colspan="9">
         <div class="page fl_right"><?php echo $pages['page'];?></div>
         <div class="clearfix">
         <?php if($report_status=='4') { ?><!--对已过期开放批量删除-->
         <label for="checkbox" onclick="checkall(event);"><?php echo $_lang['select_all'];?></label>
          <button name="sbt_action" type="submit" value=<?php echo $_lang['mulit_delete'];?> onclick="return confirm(<?php echo $_lang['you_comfirm_to'];?>+this.value+'?<?php echo $_lang['only_delete_overdue'];?><?php echo $action_arr[$view]['1'];?><?php echo $_lang['record'];?>');" class="pill negative">
           <span class="icon trash"></span><?php echo $_lang['mulit_delete'];?>
          </button>
  <?php } ?>
</div>
       </td>
      </tr>
     </tbody>
   </table></div>
  </form>
  </div>
  </div>
</div>
 <script type="text/javascript">
$(function(){
$(".control").add(".title").click(function(){
$(".tip").children().not($(".control,.title")).slideToggle('800');
});
})
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
</html><?php keke_tpl_class::ob_out();?>