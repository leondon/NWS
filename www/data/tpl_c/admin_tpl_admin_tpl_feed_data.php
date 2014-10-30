<?php keke_tpl_class::checkrefresh('admin/tpl/admin_tpl_feed_data', '1412415452' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['dns_manage'];?></h1>
        <div class="tool">         

            <a href="index.php?do=<?php echo $do;?>&view=feed" <?php if($type == 'data') { ?>class="here"<?php } ?>><?php echo $_lang['dns_list'];?></a>

        </div>
</div>

<form method="get" action="index.php" id="frm_search">
<input type="hidden" name="do" value="<?php echo $do;?>">
<input type="hidden" name="view" value="<?php echo $view;?>">
<input type="hidden" name="page" value="<?php echo $page;?>">
<input type="hidden" name="type" value="<?php echo $type;?>">
<div class="box search p_relative">
    	<div class="title"><h2><?php echo $_lang['search'];?></h2></div>
    	<div class="detail"  id="detail"> 
    		<table cellspacing="0" cellpadding="0">    		
<tbody>
<tr>
                <th><?php echo $_lang['dns_name'];?></th>
                <td>
                 <input type="text" class="txt" name="txt_title" id="txt_title" value="<?php echo $txt_title;?>">
 *<?php echo $_lang['search_by_like'];?>
 </td>
                </tr>
<tr>
<th><?php echo $_lang['result_order'];?></th>
<td>
<select name="ord[]">
                        <option value="feed_id" <?php if($ord['0']=='feed_id' or !isset($ord['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default_id_sort'];?></option>
                        <option value="title" <?php if($ord['0']=='title' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['dns_names'];?></option>
 <option value="feed_time" <?php if($ord['0']=='feed_time' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['time'];?></option>
                        </select>
                        <select name="ord[]">
                        <option <?php if($ord['1']=='desc' or !isset($ord['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                        <option <?php if($ord['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                        </select>
</td>
<th><?php echo $_lang['list_result'];?></th>
<td >
<select name="slt_page_size">
                			<option value="10" <?php if($slt_page_size=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
                			<option value="20" <?php if($slt_page_size=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
                			<option value="30" <?php if($slt_page_size=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
            			</select>
           				<button class="pill" type="submit" value=<?php echo $_lang['search'];?> name="sbt_search">
<span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?>
</button>
</td>
</tr>          			
           		</tbody>
</table>
    	</div> 
</div>

<div class="box list">
 

 
<div class="title"><h2><?php echo $_lang['dns_list'];?></h2></div>
    <div class="detail"> 
<div id="ajax_dom">
<input type="hidden" name="page" value="<?php echo $page;?>">
 <table width="100%" border="0" cellspacing="0" cellpadding="0"  >
                <tr>
                    <th>
<input type="checkbox" id="checkbox" onclick="checkall();" class="checkbox" >编号
</th>
                    <th width="350">
                       <?php echo $_lang['event_title'];?>
                    </th>
                    <th width="100">
                       <?php echo $_lang['event_type'];?>
                    </th>
                    <th width="100">
                       <?php echo $_lang['username'];?>
                    </th>
                    <th width="200">
                        <?php echo $_lang['on_time'];?>
                    </th>
                    <th width="120">
                        <?php echo $_lang['operate'];?>
                    </th>
                </tr>
                <?php if(is_array($feed_arr)) { foreach($feed_arr as $key => $value) { ?>
                <tr class="item">
                    <td>
                        <input type="checkbox" name="ckb[]" class="checkbox" value="<?php echo $value['feed_id'];?>"><?php echo $value['feed_id'];?>
                    </td>
                    <td>
                    	<?php echo $value['title'];?>
                    
                    </td>
                    <td>
                        <?php if($feed_type[$value['feedtype']]) { ?><?php echo $feed_type[$value['feedtype']];?><?php } else { ?><?php echo $value['feedtype']?><?php } ?>
                    </td>
                    <td>
                       <?php echo $value['username'];?>
                    </td>
                    <td>
                       <?php if($value['feed_time']){echo date('Y-m-d H:i',$value['feed_time']); } ?>
                    </td>
                    <td>
                        <a href="<?php echo $url?>&ac=del&delid=<?php echo $value['feed_id']?>" onclick="return cdel(this)" class="button"> <span class="trash icon"></span><?php echo $_lang['delete'];?></a>
                    </td>
                </tr>
<?php } } ?>
                <tr>
                    <td colspan="6" >
                       <label for="checkbox" onclick="checkall(event);"><?php echo $_lang['select_all'];?></label>	
<input type="hidden" name="sbt_action" class="sbt_action"/>
<button type="submit" onclick="return batch_act(this,'frm_search')" name="sbt_action" value=<?php echo $_lang['mulit_delete'];?> class="pill negative button" >
<span class="trash"></span><?php echo $_lang['mulit_delete'];?>
</button>
                    </td>
                  </tr>
            </table>
<div class="page"><?php echo $pages['page'];?></div>
</div>
</div>
</form>
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