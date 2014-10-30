<?php keke_tpl_class::checkrefresh('task/sreward/tpl/default/step4', '1414467613' );?>      <div class="release-form">
      	<?php if(!$status) { ?>
          <p class="lead text-center text-success mt_20"><i class="fa fa-check-circle"></i> 感谢，您的任务订单已提交，托管赏金后用户才能投稿！<a href="index.php?do=task&id=<?php echo $taskId;?>" target="_blank">查看任务</a></p>

          <div class="text-center">
          <?php if(!$boolValue) { ?>
            <a href="index.php?do=pay&type=task&id=<?php echo $taskId;?>" class="btn btn-primary">在线充值托管赏金</a>
          <?php } else { ?>
          	<a href="index.php?do=yepay&type=task&id=<?php echo $taskId;?>" class="btn btn-primary">使用余额托管赏金</a>
          <?php } ?>
            <a href="index.php?do=task&id=<?php echo $taskId;?>" class="btn btn-default">稍后再托管赏金</a>
          </div>
        <?php } else { ?>
<p class="lead text-success text-center mt_20 "><i class="fa fa-check-circle"></i> 恭喜，您已完成付款 <sub>￥</sub><?php echo $floatPayCash;?> <sub>元</sub>！<?php if($arrTaskInfo['task_status']=='1') { ?>请等待后台审核<?php } ?></p>

<div class="text-center mb_20">
<a href="index.php?do=task&id=<?php echo $taskId;?>" class="btn btn-primary">确定</a>
<a href="index.php?do=user&view=transaction&op=released&intModelId=<?php echo $id;?>" class="btn btn-default">到用户中心查看详细</a>
</div>

        <?php } ?>

      </div><?php keke_tpl_class::ob_out();?>