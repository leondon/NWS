<?php keke_tpl_class::checkrefresh('admin/tpl/admin_tpl_taglist', '1412415445' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['tag_manage'];?></h1>
        <div class="tool">         
            <a href="index.php?do=tpl&view=taglist&t=<?php echo $t;?>" <?php if($view == 'taglist') { ?>class="here"<?php } ?> ><?php echo $_lang['tag_call'];?></a>
<a href="index.php?do=tpl&view=edit_tag&tag_type=<?php echo $tag_type?>&t=<?php echo $t;?>" <?php if($view == 'edit_tag') { ?>class="here"<?php } ?> ><?php echo $_lang['tag_add'];?></a>
        </div>
</div>
<div class="box clearfix">

<?php if(!$t) { ?>
<div class="tab clearfix">			
    <!--   	<a href="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&type=1" <?php if(!type||$type==1) { ?>class="select"<?php } ?>>活动</a> -->
    <a href="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&type=2" <?php if($type==2) { ?>class="select"<?php } ?>>协议</a>

</div>
<?php } ?>
<form method="post" action="#" id="frm_art_search">
<input type="hidden" name="do" value="<?php echo $do;?>">
<input type="hidden" name="view" value="<?php echo $view;?>">
<input type="hidden" name="tag_type" value="<?php echo $tag_type;?>">
<div class="box search p_relative">
    	<div class="title"><h2><?php echo $_lang['search'];?></h2></div>
    	<div class="detail" id="detail"> 
    		<table cellspacing="0" cellpadding="0">    		
<tbody>
<tr>
<th><?php echo $_lang['result_order'];?></th>
<td>
<select name="ord[]">
                       			 <option value="tag_id" <?php if($ord['0']=='tag_id' or !isset($ord['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default_id_order'];?></option>
                       			 <option value="tagname" <?php if($ord['0']=='tagname' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['template_name'];?></option>
                        </select>
                        <select name="ord[]">
                       			 <option <?php if($ord['1']=='desc' or !isset($ord['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                        		<option <?php if($ord['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                        </select>
</td>
<th><?php echo $_lang['result_order'];?></th>
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
</form>
<div class="box list clearfix">
<form method="post" action="index.php?do=tpl&view=taglist" name="frm_taglist" id="frm_taglist">
<div class="title"><h2><?php echo $_lang['tag_list'];?></h2></div>
    <div class="detail"> 
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab_list">
        	<tr class="item">
        		<th>
<input type="checkbox" id="checkbox" onclick="checkall();" class="checkbox" >编号
</th>
           		<th align="left"><?php echo $_lang['tag_name'];?></th>
           		<th><?php echo $_lang['internal_calling_code'];?></th>
                <th><?php echo $_lang['js_calling_code'];?></th>
                <th width="60"><?php echo $_lang['preview'];?></th>
                <th width="60"><?php echo $_lang['detail'];?></th>
                <th width="60"><?php echo $_lang['delete'];?></th>
            </tr>
                <?php if(is_array($tag_arr)) { foreach($tag_arr as $key => $value) { ?>
                <tr class="item">
                	<td>
                       <input type="checkbox" name="ckb[]" class="checkbox" value="<?php echo $value['tag_id'];?>">
                    </td>
                    <td>
                        <?php echo $value['tagname'];?>
                    </td>
                    <td>
                        <input type="text" class="txt" value="<?php echo '<!--{tag '.$value['tagname'].'}-'; ?>->" size="30" onfocus="this.select();">
                    </td>
                    <td>
                        <input type="text" class="txt" value="<script src='<?php echo $_K['siteurl'];?>/js.php?op=tag&tag_id=<?php echo $value['tag_id']?>'></script>"  size="40" onfocus="this.select();">
                    </td>
                    <td>
                        <a href="plu.php?do=previewtag&tagid=<?php echo $value['tag_id'];?>" target="_blank" class="button dbl_target">
                        <span class="book icon"></span><?php echo $_lang['view'];?></a>
                    </td>
                    <td>
                        <a href="index.php?do=tpl&view=edit_tag&tagid=<?php echo $value['tag_id']?>&tag_type=<?php echo $tag_type;?>&type=<?php echo $type;?>" class="button">
                        <span class="pen icon"></span><?php echo $_lang['edit'];?></a>
                    </td>
                    <td>
                        <a href="index.php?do=tpl&view=taglist&op=del&delid=<?php echo $value['tag_id']?>&tag_type=<?php echo $tag_type;?>&type=<?php echo $type;?>" onclick="return cdel(this)"  class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
                    </td>
                </tr>
<?php } } ?>
<tr>
            	<td colspan="7">                    
                    <div class="clearfix"> 
     <label for="checkbox" onclick="checkall(event);"><?php echo $_lang['select_all'];?></label>  
                     <input type="hidden" name="sbt_action" class="sbt_action" id="sbt_action"/>　                   
                        <button class="pill negative button" type="submit" value="<?php echo $_lang['mulit_delete'];?>" name="sbt_action" onclick="return batch_act(this,'frm_taglist')"><span class="icon trash">&nbsp;</span><?php echo $_lang['mulit_delete'];?></button>
<button class="pill positive button" type="button" name="sbt_add"  onclick="document.location.href='index.php?do=<?php echo $do;?>&view=edit_tag&tag_type=<?php echo $tag_type;?>&type=<?php echo $type;?>'"/><span class="check icon"></span><?php echo $_lang['add_tag'];?></button>
                    </div>
                 </td>
        	</tr>
       </table>
   <div class="page">
             <?php echo $pages['page'];?>
       </div>
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