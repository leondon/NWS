<?php keke_tpl_class::checkrefresh('task/dtender/tpl/default/work', '1414480159' );?>
  <ul class="nav nav-pills second-nav">
    <li <?php if(!$st&&!$ut) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work#detail">所有的</a></li>
    <li <?php if($ut=='noview') { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&ut=noview#detail">未浏览的</a></li>
    <li <?php if($st==4) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&st=4#detail">中标的</a></li>
    <li <?php if($st==7) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&st=7#detail">淘汰的</a></li>
    <li <?php if($ut=='my') { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&ut=my#detail">我的</a></li>
  </ul>
  <!-- second-nav end -->

  <div class="manuscripts">
  	<div  id="gj_summery">
  	<?php if($arrWorkInfo) { ?>
<?php if(is_array($arrWorkInfo)) { foreach($arrWorkInfo as $k => $v) { ?>
    <div id="<?php echo $v['bid_id'];?>" class="manuscript-item">

     <div class="manuscript-status">
      <?php if($v['bid_status']) { ?>
      <div class="status-item status-<?php echo $arrWorkFlag[$v['bid_status']]['id'];?>">
      		<i class="fa <?php echo $arrWorkFlag[$v['bid_status']]['style'];?>"></i> <?php echo $arrWorkFlag[$v['bid_status']]['name'];?>
      </div>
      <?php } ?>
     </div>
      <div class="manuscript-item-pic">
        <a href="index.php?do=seller&id=<?php echo $v['uid']?>" title="<?php echo $v['username']?>"><?php echo  keke_user_class::get_user_pic($v['uid'],'larger') ?></a>
        <a href="index.php?do=seller&id=<?php echo $v['uid']?>" class="btn btn-default btn-xs btn-block">进入店铺</a>
        <?php if($gUid!=$v['uid']) { ?>
        <a href="javascript:sendMessage(<?php echo $v['uid'];?>);void(0);" class="btn btn-default btn-xs btn-block">联系我</a>
<?php } ?>
      </div>
      <div class="manuscript-item-content">
        <div class="manuscript-item-body">
          <h2 class="manuscript-item-title">
            <i class="fa fa-user"></i> 投稿人:
            <a href="index.php?do=seller&id=<?php echo $v['uid']?>" title="<?php echo $v['username']?>"><?php echo $v['username']?></a>
<?php $arrUserLeve=unserialize($v[seller_level]) ?>
            <?php echo $arrUserLeve['pic'];?>
          </h2>
  <?php if($v['workhide']==1&&$gUid!=$arrTaskInfo['uid']&&$gUid!=$v['uid']) { ?>
      	<div class="no-data">
<p class="lead text-warning"><i class="fa fa-ban fa-2x"></i> 您无权查看 ！</p>
</div>
<?php } else { ?>
<?php if($v['work_pic']) { ?>
<?php $pic = explode(',',$v['work_pic']); ?>
          <div class="manuscript-img">
          	<?php if(is_array($pic)) { foreach($pic as $vc) { ?>

            <a href="<?php echo $vc;?>" class="manuscript-img-item" rel="manuscript-img-group"><img src="<?php echo $vc;?>" alt=""></a>
<?php } } ?>
          </div>
<?php } ?>
          <div class="manuscript-desc">

<table class="table table-bordered">
            <tbody>
               <tr>
                 <th width="20%">投标金额</th>
                 <td>
                 <span class="money">
                 <sub>￥</sub>
                  <?php echo $v['quote'];?>
                 </span>
                 </td>
               </tr>

   <tr>
                 <th width="20%">工作周期</th>
                 <td>
                 <span class="money">
                 <sub></sub>
                  <?php echo $v['cycle'];?>
                 </span>
 天
                 </td>
               </tr>

              <tr>
                 <th>投标内容</th>
                 <td>
                 	<?php echo htmlspecialchars_decode($v['message']) ?>
                 </td>
              </tr>

              <tr>
                <th>投标地点</th>
                <td>
                <address> <?php echo $v['area'];?> </address>
                </td>
             </tr>
          </tbody>
          </table>
          </div>

 <div class="manuscript-desc">

            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th>工作阶段</th>
                    <th>工作计划</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>回报金额</th>
                    <th>状态</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                	<?php if(is_array($v['plan'])) { foreach($v['plan'] as $pk => $pv) { ?>
                  <tr class="<?php if($pv['plan_status']==2) { ?>success text-success<?php } else { ?>active<?php } ?>">
<td><?php echo $pv['plan_step'];?></td>
                    <td><?php echo $pv['plan_title'];?></td>
                    <td><?php if($pv['start_time']){echo date('Y-m-d',$pv['start_time']); } ?></td>
                    <td><?php if($pv['end_time']){echo date('Y-m-d',$pv['end_time']); } ?></td>
                    <td><span class="money"><?php echo $pv['plan_amount']?></span></td>
                    <td>第<?php echo $pv['plan_step'];?>阶段<?php echo $arrPlanStatus[$pv['plan_status']];?></td>
                    <td>
                    	<?php $m = $k2+1; ?>
                    	<?php if($pv['plan_status']==2) { ?><i class="fa fa-check-circle"></i><?php } ?>

<?php if($v['bid_status']==4) { ?>
<?php if(($pv['plan_step']==1&&$pv['plan_status']!=2)||$i==1) { ?><?php $j=1; ?><?php } else { ?><?php $j=2; ?><?php } ?>

<?php if($arrProcess_can['plan_complete']&&$pv['plan_status']==0&&$j==1) { ?>
      <a id="complate_<?php echo $pv['plan_id'];?>" href="javascript:planComplete(<?php echo $pv['plan_id']?>,<?php echo $pv['plan_step']?>);void(0);">工作完成</a>
<?php } ?>
<?php if($arrProcess_can['plan_confirm']&&$pv['plan_status']==1&&$j==1) { ?>
<a id="confirm_<?php echo $pv['plan_id'];?>" href="javascript:planConfirm(<?php echo $pv['plan_id']?>,<?php echo $pv['plan_step']?>);void(0);" >确定完成</a>
<?php } ?>
<?php if($pv['plan_status']==2) { ?><?php $i=1; ?><?php } else { ?><?php $i=2; ?><?php } ?>
<?php } else { ?>
暂无
<?php } ?>
</td>
                  </tr>
  <?php } } ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="manuscript-ctrl">
          <?php if($arrProcess_can['work_choose']) { ?>
          <?php if(!in_array($v['bid_status'],array('4','7','8'))) { ?>
            	<a href="javascript:chooseWork('<?php echo $v['bid_id'];?>',4);void(0);" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> 设为中标</a>
          <?php } ?>
          <?php if(!in_array($v['bid_status'],array('4','7','8'))) { ?>
            	<a href="javascript:chooseWork('<?php echo $v['bid_id'];?>',7);void(0);"  class="btn btn-default btn-sm"><i class="fa fa-times-circle"></i> 设为淘汰</a>
          <?php } ?>
  <?php } ?>
  <?php if($arrProcess_can['pub_agreement']) { ?>
      <a href="javascript:PubAgreement('<?php echo $v['bid_id'];?>',4);void(0);"  class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i>确认工作</a>
  <?php } ?>
  <?php if($arrProcess_can['work_over']) { ?>
      <a href="javascript:WorkOver('<?php echo $v['bid_id'];?>',4);void(0);"  class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i>确认工作</a>
  <?php } ?>

  <?php if(!$arrMark[$v['bid_id']]||($arrMark[$v['bid_id']]['mark_status']!=1&&$arrMark[$v['bid_id']]['mark_count']<2)) { ?>
  	 	  <?php if($arrProcess_can['work_mark']&&$uid==$arrTaskInfo['uid']) { ?> <a href="javascript:mark(2,'<?php echo $v['bid_id'];?>','<?php echo $id;?>');void(0);" class="btn btn-success btn-sm" ><?php if($arrMark[$v['bid_id']]['mark_status']) { ?>修改评价<?php } else { ?>稿件评价<?php } ?></a></span><?php } ?>
  <?php if($arrProcess_can['task_mark']&&$uid==$v['uid']) { ?> <a href="javascript:mark(1,'<?php echo $v['bid_id'];?>','<?php echo $id;?>');void(0);"  class="btn btn-success btn-sm" ><?php if($arrMark[$v['bid_id']]['mark_status']) { ?>修改评价<?php } else { ?>评价雇主<?php } ?></a></span><?php } ?>
  <?php } ?>
          </div>

           <div class="manuscript-comment" >
           	<div id="div_comment<?php echo $v['bid_id'];?>">
            <?php if($gUid == $arrTaskInfo['uid']||$v['comment']) { ?><h2 class="manuscript-item-title">稿件点评</h2><?php } ?>
<?php if(is_array($v['comment'])) { foreach($v['comment'] as $v1) { ?>
            <dl class="manuscript-comment-item">
              <dt class="manuscript-comment-item-title"><a href="index.php?"><?php echo $v1['username']?></a> 于<?php echo date('Y-m-d',$v1['on_time']) ?>
  <?php $h = date('H',$v1['on_time']) ?>
  <?php if($h>0&&$h<12) { ?>上午<?php } elseif($h>=12&&$h<19) { ?>下午<?php } else { ?>晚上<?php } ?><?php echo date('h:i:s',$v1['on_time']) ?>点评:</dt>
              <dd class="manuscript-comment-item-body">
                <?php echo $v1['content']?>
              </dd>
            </dl>
<?php } } ?>
</div>
<?php if($gUid == $arrTaskInfo['uid']) { ?>
    <div class="manuscript-comment-post">
              <div class="form-group">
                <textarea class="form-control" rows="3" name="strTarComment" id="strTarComment<?php echo $v['bid_id'];?>" placeholder="点评不得超过100字"></textarea>
              </div>
              <div class="form-group">
                <button type="button" onclick="workComment('<?php echo $v['task_id'];?>','<?php echo $v['bid_id'];?>');"  class="btn btn-default btn-sm"><i class="fa fa-comment"></i> 点评稿件</button>
<span class="text-success" id="tipsUser"></span>
              </div>
            </div>
            <?php } ?>
            <!-- manuscript-comment-post end -->
          </div>
<?php } ?>
        </div>
        <div class="manuscript-item-footer">
          <ul class="manuscript-meta">
            <li class="manuscript-meta-item">编号 #<?php echo $v['bid_id'];?> </li>
            <li class="manuscript-meta-item">投稿时间：<?php if($v[bid_time]){echo date('Y-m-d H:i:s',$v[bid_time]); } ?></li>
            <li class="manuscript-meta-item">
            	<span class="marked marked-see">
            	<?php if($v['is_view']||$uid==$arrTaskInfo['uid']) { ?>
雇主已浏览
<?php } else { ?>
雇主未浏览
<?php } ?>
</span>
</li>
            <?php if($arrProcess_can['work_report']&&$gUid!=$v['uid']&&$v['bid_status']!=7&&$gUid) { ?>
            <li class="manuscript-meta-item">
            	<a href="javascript:report(2,'work','<?php echo $v['uid'];?>','<?php echo $arrTaskInfo['task_id'];?>','<?php echo $v['bid_id'];?>');void(0);"  class="action-report">
            		<i class="fa fa-bell"></i> 举报
            	</a>
            </li>
            <?php } ?>
<?php if($arrProcess_can['task_rights']) { ?>
<li class="manuscript-meta-item">
<?php if($uid==$arrTaskInfo['uid']&&$v['bid_status']==4) { ?>
 <a href="javascript:report(1,'work','<?php echo $v['uid'];?>','<?php echo $arrTaskInfo['task_id'];?>','<?php echo $v['bid_id'];?>');void(0);"   class="action-report">
<?php } else { ?>
<a href="javascript:report(1,'task','<?php echo $arrTaskInfo['uid'];?>','<?php echo $arrTaskInfo['task_id'];?>','<?php echo $arrTaskInfo['task_id'];?>');void(0);" class="action-report">
<?php } ?>
<i class="fa fa-bell"></i>维权</a>
</li>
<?php } ?>
          </ul>
        </div>
      </div>
      <!-- manuscript-item-content end -->
    </div>
<?php } } ?>
<?php } ?>
    <!-- manuscript-item end-->


  <!-- manuscripts end -->

  <div class="list-page">
   <div class="page-tips pull-left">
      显示 <?php echo $strPages['st'];?>~<?php echo $strPages['en'];?> 项 共 <?php echo $arrWorkArrs['count'];?> 个投稿
    </div>
    <ul class="pagination pagination-sm pull-right">
        <?php echo $strPages['page'];?>
    </ul>
  </div>
  </div>
  </div>
  <!-- list-page end --><?php keke_tpl_class::ob_out();?>