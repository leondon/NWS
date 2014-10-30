<?php keke_tpl_class::checkrefresh('admin/tpl/admin_config_editpay', '1414652709' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['pay_manage'];?></h1>
        <div class="tool">
            <a href="index.php?do=config&view=pay&op=config"><?php echo $_lang['pay_config'];?></a>
            <a href="index.php?do=config&view=pay&op=online"  class="here"><?php echo $_lang['online_pay_interface'];?></a>
<a href="index.php?do=config&view=pay&op=offline"><?php echo $_lang['line_pay_interface'];?></a>
    	</div>
    </div>
<div class="box post">
<div class="tabcon">
        	<div class="title"><h2><?php echo $payment_config['pay_name'];?><?php echo $_lang['config_payment_interface'];?></h2></div>
            <div class="detail">
                <form name="frm_config_basic" id="frm_config_basic" action="index.php?do=config&view=<?php echo $view?>&type=<?php echo $type;?>" method="post" >    
                   <input type="hidden" name="payname"   value="<?php echo $payname;?>">
   <input type="hidden" name="pk[payment]" value="<?php echo $payment_config['pay_dir'];?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th scope="row" width="160"><?php echo $_lang['interface_name'];?>:</th>
                        <td><?php echo $payment_config['pay_name'];?></td>
                      </tr>
                      <tr>
                        <th scope="row"> <?php echo $_lang['interface_description'];?>:</th>
                        <td><?php echo $payment_config['pay_desc'];?></td>
                      </tr>
                      <tr>
                        <th scope="row"> <?php echo $_lang['is_enabled'];?>:</th>
                        <td>
                        	<label for="rdo_pay_status1"><input type="radio" id="rdo_pay_status1" name="fds[pay_status]" <?php if($pay_config['pay_status']) { ?> checked="checked" <?php } ?>  value="1"><?php echo $_lang['open'];?></label>
                            <label for="rdo_pay_status2"><input type="radio" id="rdo_pay_status2" name="fds[pay_status]" <?php if(!$pay_config['pay_status']) { ?> checked="checked" <?php } ?> value="0"><?php echo $_lang['close'];?></label></td>
                      </tr>
  <?php if(is_array($items)) { foreach($items as $v) { ?>
  	<?php if($v['k']=='per_charge') { ?>
  		</table><div>
  			<div class="title">
  				<h2><?php echo $payment_config['pay_name'];?><?php echo $_lang['mention_now_charge_configuration'];?></h2>
  			</div></div>
  		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  		<tbody>
  		 
  	<?php } ?>
<tr>
                   <th scope="row" width="180px"><?php echo $v['name'];?>:</th>
               <td>
                    <input type="text" name="fds[<?php echo $v['k'];?>]" value="<?php echo $v['v'];?>" class="txt" style=" width:260px;"/>
<?php if($payname =='alipayjs'&&$v['k']=='account') { ?>
<button class="pill" type="button" onclick="getPidKey(this);">
<span class="icon plus">&nbsp;</span>
<?php echo $_lang['get_pid_key'];?>
</button>
<script type="text/javascript">
function getPidKey(obj){
var par = $(obj).prev();
var acc = $.trim(par.val());
if(acc){
window.open("https://b.alipay.com/order/pidKey.htm?pid=2088501217834340&product=fastpay","_blank");
}else{
art.dialog.alert("<?php echo $_lang['enter_your_alipay_account'];?>");
}
}
</script>
<?php } ?>
<?php if($v['k']=='per_charge') { ?>
<div class="padt10 direct"><p>(<?php echo $_lang['user_a_single_charge_ratio'];?>)</p></div>
<?php } elseif($v['k']=='per_high') { ?>
<div class="padt10 direct"><p>(<?php echo $_lang['user_single_charge_highest_amount'];?>)</p></div>
<?php } elseif($v['k']=='per_low') { ?>
<div class="padt10 direct"><p>(<?php echo $_lang['user_single_charge_minimum_amount'];?>)</p></div>
<?php } ?>
  </td>
   </tr>
  <?php } } ?>		
  		 <?php if($payname =='alipayjs') { ?>
                      <tr>
                        <th scope="row"> <?php echo $_lang['payment_charges'];?></th>
                        <td>
                        	<img src="<?php echo $_K['siteurl'];?>/payment/alipayjs/rate_img.gif">
                        </td>
                      </tr>
 <?php } ?>
  <tr>
                        <th scope="row"> <?php echo $_lang['message_tips'];?>:</th>
                        <td><textarea name="fds[descript]" cols="100" rows="5"><?php echo $pay_config['descript'];?></textarea></td>
                      </tr>
                      <tr>
                        <th scope="row">&nbsp;</th>
                        <td>
                            <div class="clearfix padt10">
                                <button class="positive pill primary button" type="submit" onclick="return checkForm(document.getElementById('frm_config_basic'),false)"  name="sbt_edit" ><span class="check icon"></span><?php echo $_lang['submit'];?></button>
                             
                            </div>
                        </td>
                      </tr>
                      </tbody>
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
</html>
<?php keke_tpl_class::ob_out();?>