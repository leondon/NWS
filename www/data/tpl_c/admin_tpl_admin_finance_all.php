<?php keke_tpl_class::checkrefresh('admin/tpl/admin_finance_all', '1414654644' );?><!DOCTYPE HTML>
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
    <h1><?php echo $_lang['financial_model'];?></h1>
    <div class="tool">
        <a href="index.php?do=<?php echo $do;?>&view=revenue">财务概况</a>
        <a href="index.php?do=<?php echo $do;?>&&view=<?php echo $view;?>">网站收支</a>
<a href="index.php?do=<?php echo $do;?>&view=all" class="here"><?php echo $_lang['flow_record'];?></a>
    <a href="index.php?do=<?php echo $do;?>&view=recharge"><?php echo $_lang['recharge_audit'];?></a>
   <a href="index.php?do=<?php echo $do;?>&view=withdraw"><?php echo $_lang['withdraw_audit'];?></a>
    </div>
</div>
<div class="box search p_relative">
    <div class="title">
        <h2><?php echo $_lang['search'];?></h2>
    </div>
    <div class="detail" id="detail">
        <form action="index.php?do=<?php echo $do;?>&view=all" method="post" id=frm_user_search>
        	<input type="hidden" value="<?php echo $page;?>" name="page">
        	 <table cellspacing="0" cellpadding="0">
        	 	
                <tbody>
                    <tr>
                    	 <th>
                            <?php echo $_lang['financial_id'];?>
                        </th>
                        <td>
                            <input type="text" value="<?php echo $w['fina_id'];?>" name="w[fina_id]" class="txt" onkeyup="clearstr(this);"/>
                        </td>
 <th>
                            <?php echo $_lang['username'];?>*
                        </th>
                        <td>
                            <input type="text" value="<?php echo $w['username'];?>" name="w[username]" class="txt"/>
                        </td>
 <th>
                            <?php echo $_lang['financial_uses'];?>
                        </th>
                        <td>
                            <select name="w[fina_action]">
                                <option value=""><?php echo $_lang['all'];?></option>
                   				 <?php if(is_array($fina_action_arr)) { foreach($fina_action_arr as $key => $v) { ?>
 	<option value="<?php echo $key;?>" <?php if($w['fina_action']==$key) { ?>selected="selected"<?php } ?>><?php echo $v;?> </option>
                   				 <?php } } ?>
                           </select>
                       </td>
<th>&nbsp;</th>
<td>&nbsp;</td>
   
</tr>
<tr>
 <th>
                            <?php echo $_lang['financial_type'];?>
                        </th>
                        <td>
                            <select name="w[fina_type]">
                                <option value=""><?php echo $_lang['all'];?></option>
                   				<option value="out" <?php if($w['fina_type']=='out') { ?>selected="selected"<?php } ?>><?php echo $_lang['outcome'];?></option>
                    			<option value="in" <?php if($w['fina_type']=='in') { ?>selected="selected"<?php } ?>><?php echo $_lang['income'];?></option>
                           </select>
                       </td>
                        <th>
                           <?php echo $_lang['result_order'];?>
                        </th>
                        <td>
                        <select name="w[ord][]">
                           <option value="fina_id" <?php if($w['ord']['0']=='fina_id' or !isset($w['ord']['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default'];?><?php echo $_lang['order'];?></option>
                           <option value="fina_time" <?php if($w['ord']['0']=='fina_time' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['clearing_time'];?></option>
                      </select>
                      <select name="w[ord][]">
                            <option <?php if($w['ord']['1']=='desc' or !isset($w['ord']['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                            <option <?php if($w['ord']['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                      </select>
                       </td>
                        <th>
                                                    <?php echo $_lang['list_result'];?>
                         </th>
                        <td>
                            <select name="w[page_size]">
                               <option value="10" <?php if($w['page_size']=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
                               <option value="20" <?php if($w['page_size']=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
                               <option value="30" <?php if($w['page_size']=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
                             </select>
                             <button class="pill" type="submit" value="<?php echo $_lang['search'];?>" name="sbt_search">
                                <span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?>
                              </button>
                           </td>
                        </tr>
                  </tbody>
            </table>
        </form>
    </div>
 </div>
<!--搜索结束-->
<div class="box list">
    <div class="title">
        <h2><?php echo $_lang['statistical_info'];?>  <span style="color: red;text-align: center;">【本站所有用户最新发生的财务流水总记录。】</span></h2>
    </div>
     <div class="detail">
        <form action="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>" method="post" id=frm_art_action>
 	<input type="hidden" value="<?php echo $page;?>" name="page">
<input type="hidden" name="w[page_size]" value="<?php echo $page_size;?>">
<div id="ajax_dom">
<input type="hidden" value="<?php echo $page;?>" name="page"/>
  <table cellpadding="0" cellspacing="0">
             <tbody>
                 <tr>
                 	<th>
<input type="checkbox" id="checkbox" onclick="checkall();" class="checkbox" >编号
</th>
                        <th>
                          <?php echo $_lang['type'];?>
                        </th>
                        <th>
                           <?php echo $_lang['financial_uses'];?>
                        </th>
                        <th>
                          <?php echo $_lang['user'];?>
                        </th>
                        <th>
                            <?php echo $_lang['money'];?>
                        </th>
                        <th>
                           <?php echo $_lang['user_balance'];?>
                        </th>
                        <th>
                            <?php echo $_lang['time'];?>
</th>
                        <th>
                           <?php echo $_lang['delete'];?>
                        </th>
                    </tr>
  				 <?php if(is_array($finace_arr)) { foreach($finace_arr as $v) { ?>
                    <tr class="item">
                    	<td>
                    		<input type="checkbox" name="ckb[]" class="checkbox" value="<?php echo $v['fina_id'];?>"><?php echo $v['fina_id'];?>
                    	</td>
                        
                        <td>
                            <?php if($v['fina_type']=="out") { ?><?php echo $_lang['outcome'];?><?php } else { ?><?php echo $_lang['income'];?><?php } ?>
                        </td>
                        <td>
                        	<?php echo $fina_action_arr[$v['fina_action']]?>
                        </td>
                        <td>
                            <?php echo $v['username'];?>
                        </td>
                        <td>
                            <font color="red">
                                <?php  echo keke_curren_class::output(floatval($v['fina_cash']),-1);  ?>
                            </font>
                        </td>
                        <td>
                            <font color="red">
                                <?php  echo keke_curren_class::output(floatval($v['user_balance']),-1);  ?>
                            </font>
                        </td>
                        <td>
                            <?php if($v['fina_time']){echo date('Y-m-d H:i:s',$v['fina_time']); } ?>
                        </td>
                        <td>
                            <a href="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&ac=del&fina_id=<?php echo $v['fina_id'];?>&page=<?php echo $page;?>" onclick="return cdel(this);" class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
                        </td>
                    </tr>
<?php } } ?>
                    <tr>
                    <td colspan="8">
                               
                           <div class="clearfix">
                           	 
<label for="checkbox" onclick="checkall(event);"><?php echo $_lang['select_all'];?></label>
<input type="hidden" name="sbt_action" value="<?php echo $_lang['mulit_delete'];?>" />
                           		<button name="sbt_action" type="submit" value="<?php echo $_lang['mulit_delete'];?>" onclick="return pdel('frm_art_action');" class="pill negative">
                                      <span class="icon trash"></span><?php echo $_lang['mulit_delete'];?>
                                 </button>
  </div>
                    </td>
                  </tr>
                </tbody>
              </table>
  <div class="page"><?php echo $pages['page'];?></div>
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