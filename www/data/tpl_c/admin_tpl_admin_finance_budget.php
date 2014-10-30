<?php keke_tpl_class::checkrefresh('admin/tpl/admin_finance_budget', '1414654681' );?><!DOCTYPE HTML>
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
    <h1>网站收支列表</h1>
    <div class="tool">
        
        <a href="index.php?do=<?php echo $do;?>&view=revenue">财务概况</a>
        <a href="index.php?do=<?php echo $do;?>&&view=<?php echo $view;?>" class="here">网站收支</a>
<a href="index.php?do=<?php echo $do;?>&view=all"><?php echo $_lang['flow_record'];?></a>
    <a href="index.php?do=<?php echo $do;?>&view=recharge"><?php echo $_lang['recharge_audit'];?></a>
   <a href="index.php?do=<?php echo $do;?>&view=withdraw"><?php echo $_lang['withdraw_audit'];?></a>
    </div>
</div>
<div class="box tip clearfix p_relative">
    <div class="title">
        <h2>充值提示</h2>
    </div>
    <div class="detail pad10">
    <strong></strong>
        <ul>
            <li>直接在线充值（包含针对任务托管或商品交易直接充值部分）            </li>
            <li>线下银行充值（即用户填写线下银行汇款凭证后管理员审核通过部分） </li>
            <li>目前网站管理员手动充值不计算在内，请管理员谨慎操作手动充值</li>
        </ul>
    </div>
</div>
<!-- 
<div class="box tip clearfix p_relative">
    <div class="title">
        <h2>网站获利</h2>
    </div>	
    <div class="detail pad10">
            <p>网站总收入：￥ <?php if($total_in) { ?><?php echo $total_in;?><?php } else { ?>0<?php } ?> 元</p>
           	<p>网站总支出：￥ <?php if($total_out) { ?><?php echo $total_out;?><?php } else { ?>0<?php } ?> 元</p>
            <p>网站利润：￥ <?php if($total_profit) { ?><?php echo $total_profit;?><?php } else { ?>0<?php } ?> 元</p>
    </div>
</div>
 -->
<!--<div class="box search p_relative">
    <div class="title">
        <h2>搜索</h2>
    </div>
    <div class="detail">
        <form method="post" action="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>" id="frm_some_search">
        <input type="hidden" name="page" value="<?php echo $page;?>">
        <table cellspacing="0" cellpadding="0">
         <tbody>
           	<tr>
             <th>ID</th>
             <td><input type="text" size='10' class="txt" name="txt_fina_id" value="<?php echo $txt_fina_id;?>" onkeyup="clearstr(this);"></td>
     <th>类型</th>
             <td>
             	<select name="slt_fina_type">
             		<option value=" " <?php if(!$slt_fina_type) { ?> selected="selected"<?php } ?>>全部</option>
             		<?php if(is_array($finance_type)) { foreach($finance_type as $k => $v) { ?>
<option value="<?php echo $k;?>" <?php if($k == $slt_fina_type) { ?> selected="selected"<?php } ?>><?php echo $v;?></option>
<?php } } ?>
                	</select>
                </td>
   	</tr>
           	<tr>
<th>结果排序</th>
<td>
<select name="ord[]">
<option value="fina_id" <?php if($ord['0']=='fina_id' or !isset($ord['0'])) { ?> selected="selected"<?php } ?>>默认ID排序</option>
<option value="on_time" <?php if($ord['0']=='on_time' ) { ?> selected="selected"<?php } ?>>时间</option>
                </select>
                <select name="ord[]">
               	<option <?php if($ord['1']=='desc' or !isset($ord['1'])) { ?>selected="selected" <?php } ?> value="desc">降序</option>
               	<option <?php if($ord['1']=='asc') { ?>selected="selected" <?php } ?> value="asc">升序</option>
                </select>
</td>
<th>显示结果</th>
<td >
<select name="page_size">
           			<option value="10" <?php if($page_size=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
           			<option value="20" <?php if($page_size=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
           			<option value="30" <?php if($page_size=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
         	</select>
       				<button class="pill" type="submit" value="搜索" name="sbt_search"><span class="icon magnifier">&nbsp;</span>搜索</button>
</td>
</tr>  
          </tbody>
        </table>　
     </form>
   </div>
</div>-->
<div class="box list">
<div class="title "><h2>网站收支列表管理
<span style="color: red;text-align: center;">【网站收支是记录网站平台每天收入和支出的流水记录，与网站的业务逻辑无关，仅对用户充值、提现进行记录。】</span>
</h2></div>
<div class="tab">
<a href="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&op=in" <?php if($op == 'in'||!$op) { ?>class="select"<?php } ?>>查看收入</a>
<a href="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&op=out" <?php if($op == 'out') { ?>class="select"<?php } ?>>查看支出</a>
</div>
<div class="detail">
<form method="post" action="#" id="frm_some_list">
<input type="hidden" name="do" value="<?php echo $do;?>">
<input type="hidden" name="view" value="<?php echo $view;?>">
<input type="hidden" name="page" value="<?php echo $page;?>">
<input type="hidden" name="page_size" value="<?php echo $page_size?>">

<div  id="ajax_dom">
<?php if($op =='in'||!$op) { ?>
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<th>编号</th>
<th>类型</th>
<th>财务用途 </th>
<th>充值用户 </th>
<th>金额</th>
<th>时间</th>

</tr>
 <?php if(is_array($website_in)) { foreach($website_in as $k => $v) { ?>
<tr class="item">
<td><?php echo $v['order_id'];?></td>
<td><?php echo $charge_type_arr[$v['order_type']];?></td>
<td><?php if($v['pay_info']) { ?><?php echo $v['pay_info']?><?php } else { ?><span style="color: red;">未填写</span><?php } ?></td>
<td><?php echo $v['username'];?></td>
<td><font color="red"> ￥<?php echo $v['pay_money'];?>元 </font></td>
<td><?php if($v['pay_time']){echo date('Y-m-d H:i:s',$v['pay_time']); } ?></td>
 
</tr>
<?php } } ?>	
<tr>
<td>
选择时间：
</td>
<td colspan="4">
<input type="text" name="txt_s_time" id="txt_s_time" class="txt" onclick="showcalendar(event, this, 0);" /> To <input type="text" name="txt_e_time" id="txt_e_time" class="txt" onclick="showcalendar(event, this, 0);"/>
<a class="export" href="javascript:void(0)" rurl="index.php?do=finance&view=budget&export_in=excel">
导出Excel
</a>
</td>
<td>
收入总计：￥ <?php if($total_in) { ?><?php echo $total_in;?><?php } else { ?>0<?php } ?> 元
</td>
<td></td>
</tr>
<tr>
                           <td colspan="5">
                               
                           <div class="clearfix">
                           	   
  </div>
                        </td>
                  </tr>
<tr>
<td colspan="6">
<?php if($pages['page']) { ?><div class="page fl_right"><?php echo $pages['page'];?></div><?php } ?>
</td>
</tr>	
</tbody>
</table>
<?php } ?>
<?php if($op =='out') { ?>
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<th>编号</th>
<th>提现类型</th>
<th>金额</th>
<th>申请提现时间</th>
<th>申请人</th>
<th>申请提现账号</th>
<th>处理提现时间</th>
<th>提现状态</th>
</tr>
 <?php if(is_array($website_out)) { foreach($website_out as $k => $v) { ?>
<tr class="item">
<td><?php echo $v['withdraw_id'];?></td>
<td><?php if($v['pay_type']=='alipayjs') { ?>
支付宝
<?php } else { ?>
<?php echo $bank_arr[$v['pay_type']]?>
<?php } ?>	
</td>
<td><font color="red"> ￥<?php echo $v['withdraw_cash'];?>元 </font></td>
<td><?php if($v['applic_time']){echo date('Y-m-d H:i:s',$v['applic_time']); } ?></td>
<td><?php echo $v['username'];?></td>
<td><?php echo $v['pay_account'];?></td>
<td><?php if($v['process_time']){echo date('Y-m-d H:i:s',$v['process_time']); } ?></td>
<td><font color="red">提现成功</font></td>
</tr>
<?php } } ?>	
<tr>
<td>
选择时间：
</td>
<td colspan="6">
<input type="text" name="txt_s_time" id="txt_s_time" class="txt" onclick="showcalendar(event, this, 0);" /> To <input type="text" name="txt_e_time" id="txt_e_time" class="txt" onclick="showcalendar(event, this, 0);"/>
<a class="export" href="javascript:void(0)" rurl="index.php?do=finance&view=budget&export_out=excel" >
导出Excel
</a>
</td>
<td>
支出总计：￥ <?php if($total_out) { ?><?php echo $total_out;?><?php } else { ?>0<?php } ?> 元
</td>
</tr>	
<tr>
<td colspan="7">
<?php if($pages['page']) { ?><div class="page fl_right"><?php echo $pages['page'];?></div><?php } ?>
</td>
</tr>	
</tbody>
</table>
<?php } ?>
</div>
</form>
</div>
</div>
<script type="text/javascript">
$(function(){
$("a.export").click(function(){
var url = $("a.export").attr('rurl');
var stime = trim($("#txt_s_time").val());
var etime = trim($("#txt_e_time").val());
if(stime&&etime){
url = url+"&stime="+stime+"&etime="+etime;
}
location.href = url;
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
</html>

<?php keke_tpl_class::ob_out();?>