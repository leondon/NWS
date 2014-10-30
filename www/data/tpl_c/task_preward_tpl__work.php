<?php keke_tpl_class::checkrefresh('task/preward/tpl/default/work', '1414477929' );?>
  <ul class="nav nav-pills second-nav">
    <li <?php if(!$st&&!$ut) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work#detail">所有的</a></li>
    <li <?php if($ut=='noview') { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&ut=noview#detail">未浏览的</a></li>
    <li <?php if($st==6) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&st=6#detail">中标的</a></li>
    <li <?php if($st==7) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&st=7#detail">淘汰的</a></li>
    <li <?php if($ut=='my') { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&view=work&ut=my#detail">我的</a></li>
  </ul>
  <!-- second-nav end -->

  <div class="manuscripts">
  	<div  id="gj_summery">
  	<?php if($arrWorkInfo) { ?>
<?php if(is_array($arrWorkInfo)) { foreach($arrWorkInfo as $k => $v) { ?>
    <div id="<?php echo $v['work_id'];?>" class="manuscript-item">

      <div class="manuscript-status">
      	 <?php if($v['work_status']) { ?>
      <div class="status-item status-<?php echo $arrWorkFlag[$v['work_status']]['id'];?>">
      		<i class="fa <?php echo $arrWorkFlag[$v['work_status']]['style'];?>"></i> <?php echo $arrWorkFlag[$v['work_status']]['name'];?>
      </div>
      <?php } ?>
      </div>

      <div class="manuscript-item-pic">
        <a href="index.php?do=seller&id=<?php echo $v['uid']?>" title="<?php echo $v['username']?>"><?php echo  keke_user_class::get_user_pic($v['uid'],'larger') ?></a>
        <a href="index.php?do=seller&id=<?php echo $v['uid']?>" class="btn btn-default btn-xs btn-block">进入店铺</a>
<?php if($gUid!=$v['uid']) { ?>
        <a href="javascript:sendMessage(<?php echo $v['uid'];?>);void(0);" class="btn btn-default btn-xs btn-block">联系我</a>
<?php } ?>
<?php if($v['workhide']!=1||$gUid==$arrTaskInfo['uid']||$gUid==$v['uid']) { ?>
<a href="index.php?do=taskhandle&op=workinfo&taskId=<?php echo $v['task_id'];?>&workId=<?php echo $v['work_id']?>" class="btn btn-default btn-xs btn-block" target="_blank">稿件详情</a>
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
<?php if(!empty($v['attachment'])) { ?>  附件：
          <div class="manuscript-img">
          	<?php if(is_array($v['attachment'])) { foreach($v['attachment'] as $vfile) { ?>
          	<a href="<?php echo $vfile['save_name'];?>" class="manuscript-img-item" rel="manuscript-img-group"><?php echo $vfile['file_name'];?></a>&nbsp;
<?php } } ?>
          </div>
<?php } ?>
          <div class="manuscript-desc">
            <?php echo htmlspecialchars_decode($v['work_desc']) ?>
          </div>

          <div class="manuscript-ctrl">
          	 <?php if($arrProcess_can['work_choose']) { ?>
            <?php if(!in_array($v['work_status'],array('6','7','8'))) { ?><a href="javascript:chooseWork('<?php echo $v['work_id'];?>','6',this);void(0);"  class="btn btn-success btn-sm"><i class="fa fa-check-circle"></i> 设为合格</a><?php } ?>
            <?php if(!in_array($v['work_status'],array('6','7','8'))) { ?> <a href="javascript:chooseWork('<?php echo $v['work_id'];?>','7',this);void(0);"  class="btn btn-default btn-sm"><i class="fa fa-times-circle"></i> 设为淘汰</a><?php } ?>
            <?php } ?>
<?php if(!$arrMark[$v['work_id']]||($arrMark[$v['work_id']]['mark_status']!=1&&$arrMark[$v['work_id']]['mark_count']<2)) { ?>
          	 	<?php if($arrProcess_can['work_mark']&&$v['work_status']=='6'&&$uid==$arrTaskInfo['uid']) { ?> <a href="javascript:mark(2,'<?php echo $v['work_id'];?>','<?php echo $id;?>');void(0);"  class="btn btn-success btn-sm" ><?php if($arrMark[$v['work_id']]['mark_status']) { ?>修改评价<?php } else { ?>稿件评价<?php } ?></a></span><?php } ?>
<?php if($arrProcess_can['task_mark']&&$v['work_status']=='6'&&$uid==$v['uid']) { ?> <a href="javascript:mark(1,'<?php echo $v['work_id'];?>','<?php echo $id;?>');void(0);"  class="btn btn-success btn-sm" ><?php if($arrMark[$v['work_id']]['mark_status']) { ?>修改评价<?php } else { ?>评价雇主<?php } ?></a></span><?php } ?>
<?php } ?>
          </div>


           <div class="manuscript-comment" >
           	<div id="div_comment<?php echo $v['work_id'];?>">
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
                <textarea class="form-control" rows="3" name="strTarComment" id="strTarComment<?php echo $v['work_id'];?>" placeholder="点评不得超过100字"></textarea>
              </div>
              <div class="form-group">
                <button type="button" onclick="workComment('<?php echo $v['task_id'];?>','<?php echo $v['work_id'];?>');"  class="btn btn-default btn-sm"><i class="fa fa-comment"></i> 点评稿件</button>
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
            <li class="manuscript-meta-item">编号 #<?php echo $v['work_id'];?> </li>
            <li class="manuscript-meta-item">投稿时间：<?php if($v[work_time]){echo date('Y-m-d H:i:s',$v[work_time]); } ?></li>
            <li class="manuscript-meta-item">
            	<span class="marked marked-see">
            	<?php if($v['is_view']||$uid==$task_info['uid']) { ?>
雇主已浏览
<?php } else { ?>
雇主未浏览
<?php } ?>
</span>
</li>
        	<?php if($arrProcess_can['work_report']&&$gUid!=$v['uid']&&$v['work_status']!=6&&$v['work_status']!=7&&$gUid) { ?>
            <li class="manuscript-meta-item">
            	<a href="javascript:report(2,'work','<?php echo $v['uid'];?>','<?php echo $arrTaskInfo['task_id'];?>','<?php echo $v['work_id'];?>');void(0);"  class="action-report">
            		<i class="fa fa-bell"></i> 举报
            	</a>
            </li>
            <?php } ?>
          </ul>
   <?php if($gUid!=$v['uid']) { ?>
          <ul class="manuscript-meta for-user">
          	<li class="manuscript-meta-item"  >
          	<?php if($v['favorite']) { ?>

          		<a id="favorite<?php echo $v['work_id'];?>" href="javascript:cancelFavorite('work',<?php echo $v['work_id'];?>);" title="取消收藏" class="action-collect on"><i class="fa fa-star"></i></a>
<?php } else { ?>
            	<a id="favorite<?php echo $v['work_id'];?>" href="javascript:addFavorite('work',<?php echo $v['work_id'];?>);" title="收藏" class="action-collect"><i class="fa fa-star"></i> </a>

<?php } ?>
</li>
          </ul>
  <?php } ?>
        </div>
      </div>
      <!-- manuscript-item-content end -->
    </div>
<?php } } ?>
<?php } ?>
    <!-- manuscript-item end-->


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
  <!-- list-page end -->

<?php keke_tpl_class::ob_out();?>