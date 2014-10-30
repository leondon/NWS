<?php keke_tpl_class::checkrefresh('task/mreward/tpl/default/step3', '1414472972' );?><div class="release-statistics">
        <h2 class="statistics-title">订单详细</h2>
        <div class="statistics-body">

            <div class="panel-heading">
              <h3 class="panel-title">
                  <div class="pull-right">赏金：<span class="money"><sub>￥</sub><?php echo $arrPubInfo['txt_task_cash'];?></span></div>
                  	标题：<?php echo $arrPubInfo['txt_title'];?>
                  	<button type="button" class="btn btn-default" onclick="history.back();">修改</button>
              </h3>
            </div>
            <div class="panel-body ">
                <ul class="release-meta">
                  <li class="release-meta-item">任务模式：<?php echo $arrModelInfo['model_name'];?></li>
                  <li class="release-meta-item">行业分类：<?php echo $arrTopIndustrys[$arrPubInfo['indus_pid']]['indus_name'];?>-<?php echo $arrAllIndustrys[$arrPubInfo['indus_id']]['indus_name'];?></li>
                  <li class="release-meta-item">附件:<?php echo $intFileCount;?>个</li>
                </ul>
                <div class="release-detail">

                	<div id="partContent" <?php if(!$strPartComment) { ?> class="hidden"<?php } ?> >
                		<?php echo $strPartComment;?>
                	</div>
                	<div id="fullContent" <?php if($strPartComment) { ?> class="hidden"<?php } ?>>
                		<?php echo $strTarComment;?>
                	</div>

                </div>
                <!-- release-detail end -->
                <?php if($strPartComment) { ?>
                <div class="release-detail-ctrl">
                  <a href="javascript:void(0);" id="viewMoreContent">查看更多</a>
                </div>
                <?php } ?>
            </div>

        </div>
        <!-- statistics-body end -->



        <form class="form-horizontal" role="form" action="<?php echo $strUrl;?>&step=<?php echo $step;?>" method="post"  id="pubTaskForm<?php echo $step;?>" name="pubTaskForm<?php echo $step;?>">
<input type="hidden" name="<?php echo $step;?>" value="<?php echo $step;?>">
<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>">
        <!-- 任务增值项目 start -->
       		<?php if(TOOL === TRUE) { ?>
<h2 class="statistics-title">您可能会需要</h2>
<div class="statistics-body ">
            <div class="table-responsive">
            <table class="table table-hover table-condensed appreciation">
            <tbody>
            <?php if(is_array($arrPayitemLists)) { foreach($arrPayitemLists as $k => $v) { ?>
              <tr>
                <td><span class="marked <?php echo $v['style'];?>"><?php echo $v['item_name'];?></span></td>
                <td width="50%">
                	<p><?php echo $v['item_desc'];?></p>
                	<p><?php echo $v['exttips'];?></p>
                </td>
                <td width="5%">
                  <div class="form-group">

                    <div class="input-group" style="width:100px">
                    <span class="input-group-addon">购买</span>
                      <input type="text" data-code="<?php echo $v['item_code'];?>" data-unit-price="<?php echo $v['item_cash'];?>" name="txt_<?php echo $v['item_code'];?>" id="txt_<?php echo $v['item_code'];?>" class="form-control" value="0" size="3"  maxlength="<?php echo $v['maxlength'];?>">
<span class="input-group-addon"><?php echo $v['item_standard'];?></span>
                      </div>
                    </div>
                </td>
                <td>单价:<span class="money"><sub>￥</sub><?php echo $v['item_cash'];?></span> / <?php echo $v['item_standard'];?></td>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
          </div>
          <!-- table-responsive end -->
        </div>
             <?php } ?>
     <div class="statistics-all">
         <p class="<?php if($do == 'pubgoods') { ?>hidden<?php } ?>">
           <strong class="statistics-title">任务费用合计：</strong>
           <span class="money"><sub>￥</sub> <span id="task-costs"><?php echo floatval($arrPubInfo['txt_task_cash']) ?></span> <sub>元</sub></span>
         </p>
 <?php if(TOOL === true) { ?>
         <p>
           <strong class="statistics-title">增值费用合计：</strong>
           <span class="money"><sub>￥</sub> <span id="payitem-costs">0</span> <sub>元</sub></span>
         </p>
 <?php } ?>
         <p>
           <strong class="statistics-title">费用总计：</strong>
           <input type="hidden" name="hdn_total_costs" id="hdn-total-costs" value="0">
           <span class="money"><sub>￥</sub> <span id="total-costs"><?php echo floatval($arrPubInfo['txt_task_cash']) ?></span> <sub>元</sub></span>
         </p>
         <p>
           <strong class="statistics-title">账户余额：</strong>
           <span class="money"><sub>￥</sub> <?php echo floatval($gUserInfo['balance']) ?> <sub>元</sub></span>
         </p>
       </div>

<script type="text/javascript" src="static/js/model/payitem/itempub.js"></script>
       	<!-- 任务增值项目 end -->
        <div class="statistics-footer">
          <a href="javascript:history.back();" >返回修改</a>
          <button type="submit" class="btn btn-primary">提交任务订单</button>
        </div>
</form>
      </div><?php keke_tpl_class::ob_out();?>