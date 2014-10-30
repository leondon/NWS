<?php keke_tpl_class::checkrefresh('task/tender/tpl/default/step1', '1414478095' );?><div class="release-form">
  <form class="form-horizontal" role="form" action="<?php echo $strUrl;?>&step=<?php echo $step;?>" method="post"  id="pubTaskForm<?php echo $step;?>" name="pubTaskForm<?php echo $step;?>">
  	<input type="hidden" name="<?php echo $step;?>" value="<?php echo $step;?>">
  	<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>">
      <div class="form-group">
      <label for="txt_task_cash" class="col-sm-3 control-label">您的预算</label>
      <div class="col-sm-6">
        <div class="input-group">
         <select name="task_cash_cove" id="task_cash_cove"  class="form-control  title="<?php echo $_lang['budget_title'];?>"  style="width:190px;">
<option value="">请选择</option>
    <?php if(is_array($arrCashCove)) { foreach($arrCashCove as $v) { ?>
    <option value="<?php echo $v['cash_rule_id'];?>" <?php if($intCover==$v['cash_rule_id']) { ?> selected="selected" <?php } ?> ><?php echo $v['cove_desc'];?></option>
    <?php } } ?>
</select>
        </div>
      </div>
    </div>

    <!-- 您的预算 end -->

    <div class="form-group">
      <label for="txt_task_day" class="col-sm-3 control-label">结束日期</label>
      <div class="col-sm-6">
        <div class="input-group date form_date ">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input id="txt_task_day" name="txt_task_day" class="form-control form_datetime" size="16" type="datetime" value="<?php echo $strDate;?>" placeholder="结束日期" data-date="<?php echo $strMinDate;?>" data-date-format="yyyy-mm-dd">
        </div>
      </div>
    </div>

    <!-- 结束日期 end -->
    <div class="form-group <?php if(!$arrDistribution[$id]) { ?>hidden<?php } ?>">
      <label class="col-sm-3 control-label">赏金分配</label>
      <div class="col-sm-6">
        <p class="form-control-static"><?php echo $arrDistribution[$id];?></p>
      </div>
    </div>
    <!-- 赏金分配 end -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-primary" value="1" >下一步</button>
      </div>
    </div>
    <!-- form-group end -->
  </form>
</div><?php keke_tpl_class::ob_out();?>