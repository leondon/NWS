<?php keke_tpl_class::checkrefresh('admin/tpl/admin_task_industry', '1412589786' );?><!DOCTYPE HTML>
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
<style type="text/css">
.jia {background: url(tpl/img/plus.gif)}
.jian {background: url(tpl/img/minus.gif) }
</style>
<div class="page_title">
    	<h1><?php echo $_lang['industry_manage'];?></h1>
        <div class="tool">
            <a href="index.php?do=task&view=industry" class="here"><?php echo $_lang['industry_list'];?></a>
            <a href="index.php?do=task&view=industry_edit"><?php if($indus_id) { ?><?php echo $_lang['edit'];?><?php } else { ?><?php echo $_lang['add'];?><?php } ?><?php echo $_lang['industry'];?></a> 
            <a href="index.php?do=<?php echo $do?>&view=union_industry" ><?php echo $_lang['industry_merge'];?></a>
</div>
</div>

<div class="box search p_relative">
    	<div class="title"><h2><?php echo $_lang['search'];?></h2></div>
        <div class="detail" id="detail">
           
    <form action="" method="get">
            	<input type="hidden" name="do" value="<?php echo $do?>">
<input type="hidden" name="view" value="<?php echo $view?>">
<input type="hidden" name="type" value="<?php echo $type?>">
<input type="hidden" name="page" value="<?php echo $page?>">
 
                <table cellspacing="0" cellpadding="0">
<tbody>
                        <tr>
                            <th><?php echo $_lang['by_industry'];?></th>
                            <td>
                            	<select   name="w[indus_pid]" id="catid">
                            	<?php if(is_array($indus_option_arr)) { foreach($indus_option_arr as $v) { ?>
<?php echo $v?>
<?php } } ?>
</select>
<?php echo $_lang['indus_parent'];?>
                            </td>
                            <th><?php echo $_lang['industry_name'];?>*</th>
                            <td><input type="text" value="<?php echo $w['indus_name']?>" name="w[indus_name]" class="txt"/>*<?php echo $_lang['search_by_like'];?></td>
                             <td></td> 
</tr>
                        <tr >
                            
<th><?php echo $_lang['result_order'];?></th>
<td>

<select name="ord[]">
                                <option value="indus_id" <?php if($ord['0']=='indus_id' or !isset($ord['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default_order'];?></option>
                                <option value="on_time" <?php if($ord['0']=='on_time' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['add_time'];?></option>
                                </select>
                                <select name="ord[]">
                                <option <?php if($ord['1']=='desc' or !isset($ord['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                                <option <?php if($ord['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                                </select>
<button class="pill" type="submit" value=<?php echo $_lang['search'];?> name="sbt_search">
                            		<span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?>
</button>
</td>
                             
                            <td colspan="3"> 
                              	&nbsp;
</td>
  
                        </tr>
                    </tbody>
                </table>
            </form>

        </div>
    </div>
    <!--搜索结束-->
<div class="box list">
    	<div class="title"><h2><?php echo $_lang['industry_list'];?></h2></div>
        <div class="detail">
        	<form action="" id='frm_list' method="post">
              <table cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                   
                    <th width="7%"><?php echo $_lang['show_order'];?></th>
                    <th width="30%"><?php echo $_lang['industry_name'];?></th>
                    <th width="10%">适用任务</th>
<th width="10%">适用商品</th>
                    <th width="10%"><?php echo $_lang['is_recommend'];?></th>
                    <th width="17%"> <?php echo $_lang['change_time'];?></th>
                   <th width="13%"><?php echo $_lang['operate'];?></th>
                </tr>
                
                <?php if(is_array($indus_show_arr)) { foreach($indus_show_arr as $k => $v) { ?>
 <tbody id="indus_item_l_<?php echo $v['indus_id'];?>" <?php if($v['indus_pid'] && !$w) { ?>style="display:none;"<?php } else { ?>style="display:;"<?php } ?>>
                  <tr class="item" align="center">
                  	
                    <td class="td28" align="left">
                    	<input type="text" size=3 class="txt" name="indus_item_listorder_<?php echo $v['indus_id'];?>" value="<?php echo $v['listorder']?>" onblur="edit_listorder(<?php echo $v['indus_id'];?>,this.value)"></td>
                    <td align="left">
                    	<?php echo $v['ext']?>
<span class="<?php if($indus_index_arr[$v['indus_id']]) { ?>jia<?php } else { ?>jian<?php } ?>" 
<?php if($indus_index_arr[$v['indus_id']]) { ?>
onclick="if($(this).attr('class')=='jia'){
showids_<?php echo $v['indus_id'];?>('show');
$(this).attr('class','jian');
}else{showids_<?php echo $v['indus_id'];?>('hide');
$(this).attr('class','jia')}
" <?php } ?>>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <span id="indus_item_span_<?php echo $v['indus_id'];?>"
 style="font-weight:<?php echo 900-$v['level']*300 ?>;font-size:<?php echo 16-$v['level']*2 ?>px;">
                            <input type="text" class="txt" value="<?php echo $v['indus_name']?>" 
readonly="readonly" >
</span>
<?php if(!$v['indus_pid']) { ?>
<a href="javascript:;" style="color:#ff6600" onclick="addchild(<?php echo $v['indus_id'];?>,'<?php echo $v['ext']?>')"><?php echo $_lang['add_son_class'];?></a>					
<?php } ?>
</td>
<td>
<?php if(!$v['indus_pid']) { ?>
<input type="checkbox"  data-indusId = "<?php echo $v['indus_id'];?>" class="CheckedForTask" <?php if($v['totask']==1) { ?>checked="checked"<?php } ?>>
<?php } ?>
</td>
<td>
<?php if(!$v['indus_pid']) { ?>
<input type="checkbox"  data-indusId = "<?php echo $v['indus_id'];?>" class="CheckedForGoods" <?php if($v['togoods']==1) { ?>checked="checked"<?php } ?>>
<?php } ?>
</td>
                    <td align="left"><?php if($v['is_recommend']==1) { ?><?php echo $_lang['recommend'];?><?php } else { ?><?php echo $_lang['no'];?><?php } ?></td>
                     
                    <td align="left"><?php if($v['on_time']){echo date('Y-m-d H:i:s',$v['on_time']); } ?></td>
                    <td align="left">
<a href="index.php?do=<?php echo $do;?>&view=industry_edit&indus_id=<?php echo $v['indus_id'];?>&indus_pid=<?php echo $v['indus_pid']?>" class="button dbl_target"><span class="pen icon"></span><?php echo $_lang['edit'];?></a>
<a href="<?php echo $url?>&indus_id=<?php echo $v['indus_id']?>&indus_pid=<?php echo $v['indus_pid']?>&ac=del"  onclick="return cdel(this);" class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
</td>
                  </tr>
  </tbody>
                  <?php } } ?>
               <tr>
               	<td>&nbsp;</td>
                    <td colspan="8">
                    <div class="clearfix">
                  		<div class="clearfix">	
                        <a href="index.php?do=task&view=union_industry"   class="button pill negative"><span class="icon cog">&nbsp;</span><?php echo $_lang['industry_merge'];?></a>
<button  name="sbt_action" type="submit" value=<?php echo $_lang['submit'];?> class="positive primary pill button" /><span class="check icon"></span><?php echo $_lang['submit'];?></button>
                    </div>
                    </div>
                    </td>
                  </tr>
                </tbody>
              </table>

   	</form>
        </div>       
    </div>
<script type="text/javascript">
      	/*
var arr_editstatusarr = Array();
      	function edititemname(eid,text){
    		if(arr_editstatusarr['eid']){
    			return ;
    		}
    		var mod = '<input type="text" class="txt" name="edit_indus_name_arr['+eid+']" value="'+text+'">';
    		$('#indus_item_span_'+eid).html(mod);
    		arr_editstatusarr['eid']=1;
    	}
*/
    	
    	function edit_listorder(iid,v){
    		$.get('index.php?do=<?php echo $do?>&ac=editlistorder',{iid:iid,val:v});
    	}
    	
    	var newindus_c = 0;
    	function addchild(pid,ext){
    		newindus_c++;
    		if(ext=='')
    		{ext = '|';}
    		if(ext!=' ')
    		{ext = '&nbsp;&nbsp;&nbsp;'+ext+'---';}
    		var mod = '<tr class="item" id="newindus_c_'+newindus_c+'">';
    		  	mod+='<td class="td28">'+'<input type=text size=3 class="txt" name="add_indus_name_listarr['+pid+']['+newindus_c+']" size=3>';+'</td>';
    		  	mod+='<td>'+ext;
    			mod+='<input type=text class="txt" name="add_indus_name_arr['+pid+']['+newindus_c+']">';
    			mod+='</td>';
    		    mod+='<td><?php echo $_lang['no'];?></td>';
    	 
    		    mod+='<td>&nbsp;</td>';
    			mod+='<td>';
    			mod+='<a href="javascript:;" class="button" onclick="$(\'#newindus_c_'+newindus_c+'\').remove()">';
    			mod+='<?php echo $_lang['delete'];?>';
    			mod+='</a>';
    			mod+='</td>';
    		  	mod+='</tr>	';
    			
    			$('#indus_item_l_'+pid).append(mod); 
    		
    	}
    	
       <?php if(is_array($indus_index_arr)) { foreach($indus_index_arr as $k => $v) { ?>
      	function showids_<?php echo $k;?>(op){
    		if(op=='show'){
    			<?php if(is_array($indus_index_arr[$k])) { foreach($indus_index_arr[$k] as $ik => $iv) { ?>
    			$('#indus_item_l_<?php echo $ik;?>').show();
    			<?php } } ?>
    		}
    		else{
    			<?php if(is_array($indus_index_arr[$k])) { foreach($indus_index_arr[$k] as $ik => $iv) { ?>
    			$('#indus_item_l_<?php echo $ik;?>').hide();
    			<?php } } ?>
    		}
    		
    		<?php if($indus_index_arr[$v['indus_id']]) { ?>
    			showids_<?php echo $v['task'];?>(op);
    		<?php } ?>
    		
    	}
    	<?php } } ?>
      
</script>	
<script type="text/javascript">
$(function(){

$('.CheckedForTask').click(function(){
var val = 0;
if($(this).is(":checked")){
val = 1;
}
var indusId = trim($(this).attr('data-indusId'));
if(indusId){
setIndusIdForAjax(indusId,'forTask',val);
}

});
$('.CheckedForGoods').click(function(){
var val = 0;
if($(this).is(":checked")){
val = 1;
}
var indusId = trim($(this).attr('data-indusId'));
if(indusId){
setIndusIdForAjax(indusId,'forGoods',val);
}
});
});

function setIndusIdForAjax(indusId,ac,value){
$.post('index.php?do=task&view=industry',{indusId:indusId,acAjax:ac,value:value},function(){});
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