<?php keke_tpl_class::checkrefresh('admin/tpl/admin_tpl_ad', '1412415454' );?><!DOCTYPE HTML>
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
    <h1><?php echo $_lang['ads_manage'];?></h1>
    <div class="tool">
        <a class="here" href="index.php?do=<?php echo $do;?>&view=ad" ><?php echo $_lang['advertising'];?></a> 
<!--<a href="index.php?do=<?php echo $do;?>&view=ad_private_add" ><?php echo $_lang['add_advertising'];?></a>-->  
        <a href="index.php?do=<?php echo $do;?>&view=ad_list" ><?php echo $_lang['ads_list'];?></a>
        
    </div>
</div>
<div class="box list">
<div class="detail">
<table id="ad_details">
<?php $i=1 ?>
<?php $size=2 ?> <!-- 每一行显示的数量,这里定义  -->
<?php if(is_array($target_arr)) { foreach($target_arr as $k => $v) { ?>



<?php if(($i-1)%$size===0) { ?>
<tr>
<?php } ?>
<td>
<div class="fl_l">
<img src="../<?php echo $v['sample_pic'];?>">
</div>
<div style="padding-left:120px">
<p>广告位置：<a href="index.php?do=<?php echo $do;?>&view=ad_list&target_id=<?php echo $v['target_id'];?>"><?php echo $v['name'];?></a></p>
<p>广告数量：<?php echo $v['ad_num'];?> 条<!--最大数量 --></p>
<p>已投放：<?php echo $target_ad_arr[$v['target_id']];?> 条<!-- 已经添加数 --></p>
<p><?php echo $_lang['ads_group_code'];?>:<?php echo $v['code'];?></p>
<ul class="list_detail">
<li><?php echo $_lang['ads_group_id'];?>:<?php echo $v['target_id'];?></li>
<li><?php echo $_lang['ads_group_name'];?>:<?php echo $v['name'];?></li>
<li><?php echo $_lang['ads_group_code'];?>:<?php echo $v['code'];?></li>
<li><?php echo $_lang['description'];?>:<?php echo $v['description'];?></li>
<li><?php echo $_lang['has_been_add_number'];?>:<?php echo $target_ad_arr[$v['target_id']];?></li>
<li><?php echo $_lang['maximum_number'];?>:<?php echo $v['ad_num'];?></li>
</ul>
</div>
</td>

<?php if($i%$size===0) { ?>
</tr>
<?php } ?>
<?php $i++ ?>
<?php } } ?>
</table>
</div>
</div>
<script type="text/javascript">
$("#ad_details img").each(function(){
var p     = $(this);
var delay_t;
var next = p.parent().siblings().children().find("ul");
var offset;
var left_p;//position
var left_l;//length
var poffset = p.offset();
$(this).hover(function(){
window.clearTimeout(delay_t);
next.fadeIn("normal");
if(typeof(offset)=="undefined"){
offset=next.offset();
left_p=offset.left;//position
left_l=Math.abs(left_p); //length
}
next.css({"top":poffset.top+20});
if(offset.left>700){
if(BROWSER.ie){
next.css({"left":offset.left-280});
}else{
next.css({"left":offset.left-120});
}
}else{
if(BROWSER.ie){
next.css({"left":offset.left+80});
}else{
next.css({"left":offset.left+230});
}
}

},function(){
window.clearTimeout(delay_t);
delay_t = window.setTimeout(function(){
next.hide();
},100);

})
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