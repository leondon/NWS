<?php keke_tpl_class::checkrefresh('task/tender/tpl/default/work', '1414480191' );?>
  <ul class="nav nav-pills second-nav">
    <!-- <li <?php if(!$st&&!$ut) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work#detail">所有的</a></li>
    <li <?php if($ut=='noview') { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&ut=noview#detail">未审核的</a></li>
    <li <?php if($st==6) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&st=6#detail">中标的</a></li>
    <li <?php if($st==7) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&st=7#detail">淘汰的</a></li>
    <li <?php if($ut=='my') { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&ut=my#detail">我的</a></li> -->
        <?php if(is_array($arrSearchStatus)) { foreach($arrSearchStatus as $k => $v) { ?>
    	<li <?php if($s == $k) { ?>class="active"<?php } ?>><a href="index.php?do=task&id=<?php echo $id;?>&s=<?php echo $k;?>#detail"><?php echo $v;?></a></li>
    <?php } } ?>
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

          <div class="manuscript-ctrl">
          <?php if($arrProcess_can['work_choose']) { ?>
          <?php if(!in_array($v['bid_status'],array('4','7','8'))) { ?>
            	<a href="javascript:chooseWork('<?php echo $v['bid_id'];?>',4);void(0);" class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> 设为中标</a>
          <?php } ?>
          <?php if(!in_array($v['bid_status'],array('4','7','8'))) { ?>
            	<a href="javascript:chooseWork('<?php echo $v['bid_id'];?>',7);void(0);"  class="btn btn-default btn-sm"><i class="fa fa-times-circle"></i> 设为淘汰</a>
          <?php } ?>
  <?php } ?>
  <?php if($arrProcess_can['pub_agreement']&&$v['bid_status'] == '4') { ?>
      <a href="javascript:PubAgreement('<?php echo $v['task_id'];?>');void(0);"  class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i>发起完工</a>
  <?php } ?>
  <?php if($arrProcess_can['work_over']&&$v['bid_status'] == '4') { ?>
      <a href="javascript:WorkOver('<?php echo $v['task_id'];?>');void(0);"  class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i>确认完工</a>
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
            	<?php if($v['is_view']||$uid==$task_info['uid']) { ?>
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