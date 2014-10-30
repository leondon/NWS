<?php keke_tpl_class::checkrefresh('admin/tpl/admin_crawl_cn2', '1412415550' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['crawl_task'];?></h1>
          <div class="crawl">          
<a href="index.php?do=crawl&view=cn2" <?php if($view == 'cn2') { ?>class="here"<?php } ?> ><?php echo $_lang['cn2'];?></a>
      
    	</div>
</div>
<form action="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>" method="post" id="frm_list">
      <div class="box crawl p_relative">
      	<div class="title"><h2><?php echo $_lang['crawl_scope'];?></h2></div>
      	<div class="detail" id="detail">
      		<table cellspacing="0" cellpadding="0">
 <tbody>
 	<tr>
 		<th><?php echo $_lang['start_id'];?></th>
<td><input type="text" class="txt" name="txt_start_id" value="" onkeyup="clearstr(this);"></td>
<th><?php echo $_lang['end_id'];?></th>
<td><input type="text" class="txt" name='txt_end_id' value="" onkeyup="clearstr(this);"></td>
<td>					
<button type="submit" name="sbt_crawl" value=<?php echo $_lang['crawl'];?> class="pill" >
<span class="icon magnifier">&nbsp;</span><?php echo $_lang['crawl'];?></button>
</td>
<td width=>&nbsp;</td>
 	</tr>
 </tbody>
</table>
        </div>
      </div>

      <div class="box search p_relative">
    	<div class="title"><h2><?php echo $_lang['search'];?></h2></div>
        <div class="detail" id="detail">
        	<input type="hidden" name="do"   value="<?php echo $do?>">
<input type="hidden" name="view" value="<?php echo $view?>">
<input type="hidden" name="type" value="<?php echo $type?>">
<input type="hidden" name="page" value="<?php echo $page?>">
<table cellspacing="0" cellpadding="0">
 <tbody>
 	<tr>
 		<th><?php echo $_lang['log'];?>编号</th>
<td><input type="text" class="txt" name="txt_log_id" value="<?php echo $txt_log_id?>" onkeyup="clearstr(this);"></td>
<th><?php echo $_lang['operator'];?></th>
<td><input type="text" class="txt" name='txt_username' value="<?php echo $txt_username;?>" onkeyup="clearspecial(this);"></td>
<th><?php echo $_lang['log_content'];?></th>
<td><input type="text" class="txt" name='txt_content' value="<?php echo $txt_content;?>" onkeyup="clearspecial(this);"> &nbsp;*<?php echo $_lang['search_by_like'];?></td>
 	</tr>

<tr>
<th><?php echo $_lang['show_number'];?></th>
<td>
<select name="wh[page_size]" class="ps vm">
<option value="10" <?php if($wh['page_size']=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
<option value="20" <?php if($wh['page_size']=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
<option value="30" <?php if($wh['page_size']=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
</select>
</td>
<th><?php echo $_lang['result_order'];?></th>
<td>
 <select name="w[ord][]">
                           <option value="log_id" <?php if($w['ord']['0']=='log_id' or !isset($w['ord']['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default'];?><?php echo $_lang['order'];?></option>
                           <option value="log_time" <?php if($w['ord']['0']=='log_time' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['log_time'];?></option>
                      </select>
                      <select name="w[ord][]">
                            <option <?php if($w['ord']['1']=='desc' or !isset($w['ord']['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                            <option <?php if($w['ord']['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                      </select>
<button type="submit" name="sbt_search" value=<?php echo $_lang['search'];?> class="pill" >
<span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?></button>
</td>
</tr>
 
 </tbody>
</table>

        </div>
 </div>


<div class="box list">
 	<div class="title"><h2><?php echo $_lang['system_log'];?></h2></div>
      	<div class="detail">
 		 <!--<span style="color:red;"><?php echo $_lang['warm_prompt'];?></span>-->
<div id="ajax_dom">
<input type="hidden" name="page" value="<?php echo $page;?>">
  		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr>
          	<th>
<input type="checkbox" id="checkbox" onclick="checkall();" class="checkbox" >编号
</th>
            <th width="5%"><?php echo $_lang['operator'];?></th>
<th width="5%"><?php echo $_lang['user_groups'];?></th>
<th width="40%"><?php echo $_lang['content'];?></th>
            <th width="15%"><?php echo $_lang['time'];?></th>
<th width="10%"><?php echo $_lang['delete'];?></th>
          </tr>
<?php if(is_array($log_data)) { foreach($log_data as $key => $value) { ?>
        <tr class="item">
        	<td><input type="checkbox" name="ckb[]" class="checkbox" value="<?php echo $value['log_id'];?>"><?php echo $value['log_id'];?></td>
           
<td><?php echo $value['username'];?></td>
<td><?php if($value['uid']==ADMIN_UID) { ?><?php echo $_lang['public_admin_uid'];?><?php } else { ?><?php echo $group_arr[$value['user_type']]['groupname'];?><?php } ?></td>
            <td><a  href="javascript:void(0)" title="<?php echo $value['log_content'];?>"><?php echo $value['log_content'];?></a></td>
<td><?php if($value['log_time']){echo date('Y-m-d H:i:s',$value['log_time']); } ?></td>
<td>
<a class="button dbl_target" href="<?php echo $url?>&ac=del&log_id=<?php echo $value['log_id']?>" onclick="return cdel(this);"><span class="icon trash">&nbsp;</span><?php echo $_lang['delete'];?></a>
</td>
          </tr>
 <?php } } ?>
          <tr>
            <td colspan="6">
            	<label for="checkbox" onclick="checkall(event);"><?php echo $_lang['select_all'];?></label>
<input type="hidden" name="sbt_action" class="sbt_action"/>
<button type="submit" name="sbt_action" value="<?php echo $_lang['mulit_delete'];?>" class="negative pill button" onclick="return batch_act(this,'frm_list')" >
<span class="trash icon"></span><?php echo $_lang['mulit_delete'];?></button>
<a href="<?php echo $url?>&ac=del_all" class="pill button" >
<span class="icon"></span><?php echo $_lang['empty_log'];?></a>
</td>
  </tr>
        </table>
<div class="page"><?php echo $pages['page'];?></div>
</div>
</div>
</form>

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