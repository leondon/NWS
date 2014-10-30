<?php keke_tpl_class::checkrefresh('tpl/default/user/message_notice', '1414677915' );?><!DOCTYPE HTML>
<!--[if lt IE 7]> <html dir="ltr" lang="zh-cn" id="ie6"> <![endif]--><!--[if IE 7]>    <html dir="ltr" lang="zh-cn" id="ie7"> <![endif]--><!--[if IE 8]>    <html dir="ltr" lang="zh-cn" id="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
    <html dir="ltr" lang="zh-cn">
    <!--<![endif]-->
    <head>
        <title><?php echo $strPageTitle;?></title>
        <meta charset="<?php echo CHARSET;?>">
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="<?php echo $strPageKeyword;?>">
        <meta name="description" content="<?php echo $strPageDescription;?>">
        <meta name="generator" content="客客出品专业威客<?php echo KEKE_VERSION;?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style” content=black" />
        <meta name="author" content="kekezu" />
        <meta name="copyright" content="<?php echo $basic_config['copyright'];?>" />
  <meta property="qc:admins" content="1220311574763007636" />
<meta property="wb:webmaster" content="6b685cd5f06ba5f1" />
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon" href="favicon.ico"/>
<!--[if lt IE 9]>
    <script src="static/js/html5.js" type="text/javascript"></script>
    <script src="static/js/respond.min.js" type="text/javascript"></script>
<![endif]-->
<?php if($do=='index') { ?>
<script src="static/js/jquery.min.1.8.3.js"></script>
<!-- 幻灯片 -->
<link href="static/js/jqplugins/fotorama/fotorama.css" type="text/css" rel="stylesheet">
<script src="static/js/jqplugins/fotorama/fotorama.js"></script>
<!-- 滚动视图 -->
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.js"></script>
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.control.js"></script>
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.autoscroll.js"></script>
<?php } else { ?>
<script src="static/js/jquery.min.js"></script>
<?php } ?>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/js/jquery.form.js"></script>
<script src="static/js/jquery.lazyload.js"></script>
<script src="static/js/bootstrap-datetimepicker.js"></script>
<script src="static/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="static/js/sco.confirm.js"></script>
<script src="static/js/sco.modal.js"></script>
<script src="static/js/sco.valid.js"></script>
<script src="static/js/holder.min.js"></script>
<script src="static/js/model/common/base.js"></script>

<?php include(S_ROOT.'/control/include.php'); ?>

<script type="text/javascript">
$(function(){
$('.color-selected .nav-sub-list a').click(function() {
var css = $(this).attr('data-css');
var color = $(this).attr('data-rel');
$('.nav-item-link span.style-color').removeClass().addClass('style-color '+ color);
$('#active-style').attr('href', 'tpl/default/'+ css +'/style.css');
$('#active-style-user').attr('href', 'tpl/default/'+ css +'/user.css');
$('#active-style-store').attr('href', 'tpl/default/'+ css +'/store.css');
$('#active-style-home').attr('href', 'tpl/default/'+ css +'/home.css');
});
})

</script>
        <script type="text/javascript">
            var SITEURL = '<?php echo $_K['siteurl'];?>', SKIN_PATH = '<?php echo SKIN_PATH;?>', LANG = '<?php echo $language;?>', INDEX = '<?php echo $do;?>', CHARSET = '<?php echo CHARSET;?>';
        </script>
    </head>
    <body id="<?php echo $do;?>">
        <div class="header-top">
            <div class="container">
                <ul class="left-nav">
                    <?php if($do!='index'||!$do) { ?>
                    <li class="nav-item">
                        <a href="index.php" class="nav-item-link active">回到首页</a>
                    </li>
                    <?php } ?>
                    <?php if($uid) { ?>
                    <li class="nav-item nav-static">
                        欢迎您，
                    </li>
                    <li class="nav-item has-sub">
                        <a href="index.php?do=user" class="nav-item-link"><?php echo $username;?> <span class="caret"></span></a>
                        <ul class="nav-item-sub nav-sub-list">
                            <li>
                                <a href="index.php?do=user&view=message&op=notice"><?php if($messagecount) { ?><span class="badge"><?php echo $messagecount;?></span><?php } ?> 消息提醒</a>
                            </li>
                            <li>
                                <a href="index.php?do=user">用户中心</a>
                            </li>
                            <li>
                                <a href="index.php?do=seller&id=<?php echo $uid;?>">我的店铺</a>
                            </li>
                            <li class="line">
                            </li>
                            <li>
                                <a href="index.php?do=logout">退出</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=logout" class="nav-item-link active">退出</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        欢迎您，<a href="index.php?do=login" class="nav-item-link active">请登录</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=register" class="nav-item-link active">免费注册</a>
                    </li>
                    <?php } ?>
                </ul>
                <ul class="right-nav">
                    <li class="nav-item">
                        <a href="index.php?do=pubtask"  class="nav-item-link active">发布任务</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=pubgoods" class="nav-item-link active">发布商品</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=single&id=299" class="nav-item-link">关于我们</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=help" class="nav-item-link">帮助中心</a>
                    </li>
                    <li class="nav-item has-sub">
                        <a href="javascript:void(0);" class="nav-item-link">分类导航 <span class="caret"></span></a>
                        <div class="nav-item-sub">
                            <dl>
                                <dt>
                                    任务
                                </dt>
                                <dd>
                                    <ul>
                                        <?php if(is_array($indus_task_arr)) { foreach($indus_task_arr as $k => $v) { ?>
                                        <li>
                                            <a href="index.php?do=tasklist&pd=<?php echo $v['indus_id']?>"><?php echo $v['indus_name']?></a>
                                        </li>
                                        <?php } } ?>
                                    </ul>
                                </dd>
                            </dl>
                            <div class="line">
                            </div>
                            <dl>
                                <dt>
                                    商品
                                </dt>
                                <dd>
                                    <ul>
                                        <?php if(is_array($indus_goods_arr)) { foreach($indus_goods_arr as $k => $v) { ?>
                                        <li>
                                            <a href="index.php?do=goodslist&pd=<?php echo $v['indus_id']?>"><?php echo $v['indus_name']?></a>
                                        </li>
                                        <?php } } ?>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:spread(<?php if($do=='article') { ?>true<?php } else { ?>false<?php } ?>);void(0);" class="nav-item-link">推广</a>
                    </li>
                </ul>
            </div>
        </div>
<script src="static/js/model/user/user.js"></script>
<script src="static/js/model/user/transaction.js"></script>
  <!-- 首页 start -->
<nav class="top-nav">
        <div class="container">

                <div class="nav-header">
                  <a class="nav-brand" href="index.php?do=user">用户中心</a>
                </div>
                <!-- nav-header end -->
                <ul class="menu">
                    <li class="line"></li>
                    <li><a href="index.php?do=user" <?php if($view=='collect'||$view=='finance'||$view=='focus'||$view=='prom'||$view=='shop'||$view=='transaction'||$view=='index') { ?>class="selected"<?php } ?>><i class="fa fa-tachometer"></i> <span>首页</span></a></li>
                    <li class="line"></li>
                    <li><a href="index.php?do=user&view=account&op=basic" <?php if($view=='account') { ?>class="selected"<?php } ?>><i class="fa fa-cogs"></i> <span>帐号设置</span></a></li>
                    <li class="line"></li>
                    <li><a href="index.php?do=user&view=message&op=notice" <?php if($view=='message') { ?>class="selected"<?php } ?>><i class="fa fa-envelope" ></i> <span>我的消息</span><?php if($intCountMessage) { ?> <span class="badge"><?php echo $intCountMessage;?></span><?php } ?></a></li>
                    <li class="line"></li>
                    <li><a href="index.php?do=seller&id=<?php echo $gUid;?>"  target="_blank"><i class="fa fa-home"></i> <span>我的店铺</span></a></li>
                    <li class="line"></li>
                </ul>
                <!-- menu end -->

                <form action="<?php if($do =='tasklist'||$do =='goodslist'||$do =='sellerlist') { ?><?php echo $strUrl;?><?php } else { ?>index.php?do=tasklist<?php } ?>"  class="navbar-form navbar-right" role="search" id="topHeaderSearch" method="post" >
                  <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default dropdown-toggle " data-toggle="dropdown" id="searchType">
                <?php if($do == 'goodslist') { ?>
                 		商品
                <?php } elseif($do == 'tasklist') { ?>
                		任务
                <?php } elseif($do == 'sellerlist') { ?>
                		服务商
                <?php } else { ?>
                	<?php if($task_open) { ?>
                		任务
<?php } elseif(!$task_open&&$shop_open) { ?>
               			 商品
<?php } ?>
                <?php } ?>
<span class="caret"></span></button>
                        <ul class="dropdown-menu" id="searchOption">
                  <?php if($task_open) { ?>
                  <li <?php if($do == 'tasklist'||($do != 'goodslist'&&$do != 'sellerlist')) { ?>class="active"<?php } ?>><a href="javascript:void(0);" rel="tasklist" >任务</a></li>
  <?php } ?>
  <?php if($shop_open) { ?>
                  <li <?php if($do == 'goodslist') { ?>class="active"<?php } ?>><a href="javascript:void(0);" rel="goodslist">商品</a></li>
  <?php } ?>
                  <li <?php if($do == 'sellerlist') { ?>class="active"<?php } ?>><a href="javascript:void(0);" rel="sellerlist">服务商</a></li>
                </ul>
                        
                  </div>
                    <div class="form-group">
                      <input type="text" name="ky" onkeydown="searchKeydown(event);" placeholder="<?php if($ky) { ?><?php echo $ky;?><?php } ?>"  class="form-control input-sm">
                    </div>
                    <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i></button>
                   <!-- input-group end -->

                </form>

        </div>
        <!-- container end -->
</nav>
<!-- nav end -->
<div class="container">
 <div class="text-success" id="tipsUser"></div>
<div class="nav-action">
   <?php if($view=='account') { ?>
<dl class="nav-list">
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的帐号</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=account&op=basic" <?php if($op=='basic'||$op=='contact'||$op=='skill') { ?>class="selected"<?php } ?> >基本资料</a>
        <a href="index.php?do=user&view=account&op=chooseavatar" <?php if($op=='uploadavatar'||$op=='chooseavatar') { ?>class="selected"<?php } ?> >头像设置</a>
        <a href="index.php?do=user&view=account&op=password" <?php if($op=='security'|| $op=='password') { ?>class="selected"<?php } ?> >安全设置</a>
        <a href="index.php?do=user&view=account&op=binding" <?php if($op=='binding') { ?>class="selected"<?php } ?> >账号绑定</a>
        <a href="index.php?do=user&view=account&op=auth" <?php if($op=='auth') { ?>class="selected"<?php } ?> >账号认证</a>
<a href="index.php?do=user&view=account&op=report" <?php if($op=='report') { ?>class="selected"<?php } ?> >交易维权</a>
      </dd>
</dl>
<?php } elseif($view=='message') { ?>
    <dl class="nav-list">
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的消息</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=message&op=notice" <?php if($op=='notice') { ?>class="selected"<?php } ?> ><?php if($intCountNotice) { ?><span class="badge"><?php echo $intCountNotice;?></span><?php } ?> 交易提醒</a>
        <a href="index.php?do=user&view=message&op=private"  <?php if($op=='private') { ?>class="selected"<?php } ?> ><?php if($intCountPrivate) { ?><span class="badge"><?php echo $intCountPrivate;?></span><?php } ?>私人短信</a>
        <a href="index.php?do=user&view=message&op=outbox"  <?php if($op=='outbox') { ?>class="selected"<?php } ?> >我的发件箱</a>
        <a href="index.php?do=user&view=message&op=send"  <?php if($op=='send') { ?>class="selected"<?php } ?> >写消息</a>
      </dd>
    </dl>

<?php } else { ?>

<dl class="nav-list">
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 交易管理</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=transaction&op=released" <?php if($op=='released') { ?>class="selected"<?php } ?>>我发布的任务</a>
        <a href="index.php?do=user&view=transaction&op=undertake" <?php if($op=='undertake') { ?>class="selected"<?php } ?>>我承接的任务</a>
        <a href="index.php?do=user&view=transaction&op=service" <?php if($op=='service'||$op=='works') { ?>class="selected"<?php } ?>>我的商品文件</a>
        <a href="index.php?do=user&view=transaction&op=orders" <?php if($op=='sold'||$op=='orders') { ?>class="selected"<?php } ?>>我的商品订单</a>
      </dd>
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 店铺管理</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=shop&op=setting" <?php if($op=='setting') { ?>class="selected"<?php } ?>>店铺设置</a>
        <a href="index.php?do=user&view=shop&op=caselist" <?php if($op=='caselist'||$op=='caseadd') { ?>class="selected"<?php } ?>>案例管理</a>
      </dd>
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的收藏</dt>
      <dd class="nav-list-body">

        <a href="index.php?do=user&view=collect&op=task" <?php if($op=='task') { ?>class="selected"<?php } ?>>收藏的任务</a>
        <a href="index.php?do=user&view=collect&op=work" <?php if($op=='work') { ?>class="selected"<?php } ?>>收藏的稿件</a>
        <a href="index.php?do=user&view=collect&op=goods" <?php if($op=='goods') { ?>class="selected"<?php } ?>>收藏的商品</a>
      </dd>
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的关注</dt>
      <dd class="nav-list-body">

        <a href="index.php?do=user&view=focus&op=attention"  <?php if($op=='attention') { ?>class="selected"<?php } ?>>全部关注</a>
        <a href="index.php?do=user&view=focus&op=fans"  <?php if($op=='fans') { ?>class="selected"<?php } ?>>我的粉丝</a>
        <a href="index.php?do=user&view=focus&op=each" <?php if($op=='each') { ?>class="selected"<?php } ?>>相互关注</a>
      </dd>
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的推广</dt>
      <dd class="nav-list-body">

        <a href="index.php?do=user&view=prom&op=code"  <?php if($op=='code') { ?>class="selected"<?php } ?>>推广代码</a>
        <a href="index.php?do=user&view=prom&op=benefit" <?php if($op=='benefit') { ?>class="selected"<?php } ?>>推广收益</a>
      </dd>
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的财务</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=finance&op=basic" <?php if(in_array($op,array('basic','details','rechargelog','withdrawlog'))) { ?>class="selected"<?php } ?>>账目明细</a>
        <a href="index.php?do=user&view=finance&op=rechargeonline" <?php if(in_array($op,array('rechargeonline','rechargeoffline'))) { ?>class="selected"<?php } ?>>账号充值</a>
        <a href="index.php?do=user&view=finance&op=withdraw"  <?php if($op=='withdraw') { ?>class="selected"<?php } ?>>账号提现</a>
      </dd>
      <!--<dt class="nav-list-title"><i class="fa fa-caret-right"></i> 增值服务</dt>
      <dd class="nav-list-body">
        <a href="#">工具箱</a>
      </dd>-->
</dl>

<?php } ?>
  </div>

  <div class="content-panel">
    <div class="tab">
        <a href="javascript:void(0);" class="selected">交易提醒</a>
    </div>
    <div class="tab_detail">

    	<form method="post" name="listMessageForm" id="listMessageForm" action="<?php echo $strUrl;?>">
        <input type="hidden" name="action" value="" id="action">
<input type="hidden" name="intPage" value="<?php echo $intPage;?>" >
    <?php if($arrMessageLists) { ?>
        <table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th>状态</th>
            <th>标题</th>
            <th>发件人</th>
            <th>时　间</th>
            <th>操　作</th>
          </tr>
        </thead>
        <tbody>

    		<?php if(is_array($arrMessageLists)) { foreach($arrMessageLists as $k => $v) { ?>
              <tr <?php if($v['view_status']!=1) { ?>class="warning"<?php } ?>>
                <td>
                  <label>
                      <input type="checkbox" value="<?php echo $v['msg_id']?>" id="cbk_selected" name="ckb[]"> <?php if($v['view_status']==1) { ?> 已读<?php } else { ?> 未读<?php } ?>
                    </label>
                </td>
                <td><a href="<?php echo $strUsersUrl;?>&op=detail&msgId=<?php echo $v['msg_id']?>&type=notice&intPage=<?php echo $intPage;?>"><?php echo $v['title']?></a></td>
                <td>系统消息</td>
                <td><?php echo date('Y-m-d H:i:s',$v['on_time']); ?></td>
                <td>
                <a href="<?php echo $strUsersUrl;?>&op=detail&msgId=<?php echo $v['msg_id']?>&type=notice&intPage=<?php echo $intPage;?>">查看</a>
    			<a href="javascript:opSingle('<?php echo $strUrl;?>&objId=<?php echo $v['msg_id']?>&action=delSingle&intPage=<?php echo $intPage;?>');void(0);">删除</a></td>
              </tr>
    		  <?php } } ?>


        </tbody>
      </table>
      <?php } else { ?>
          <p class="text-center">暂无数据</p>
      <?php } ?>

      <div class="clearfix">
      <div class="btn-toolbar pull-left" role="toolbar">
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm" value="0" id="checkbox"><i class="fa fa-check-square-o"></i> 全选</button>

        </div>
        <div class="btn-group"><button type="button" onclick="return opMulit('mulitView','listMessageForm');" class="btn btn-default btn-sm">标记为已读</button>
          </div>
        <div class="btn-group"><button type="button" onclick="return opMulit('mulitDel','listMessageForm');" class="btn btn-default btn-sm">删除</button></div>
      </div>

      <ul class="pagination pagination-sm pull-right">
        <?php echo $strPages['page'];?>
      </ul>

      </div>

     </form>
    </div>
  </div>
  </div>
  <!-- 我的消息 end &content-panel end -->
  <script src="static/js/model/user/message.js"></script>
<div class="footer">
  <div class="container">
      <?php if($do=='index') { ?>
      <ul class="friend-link">
        <li><strong>友情链接</strong></li>
<?php if(is_array($arrFlink)) { foreach($arrFlink as $k => $v) { ?>
        <li><a href="<?php echo $v['link_url'];?>" target="_blank"><?php echo $v['link_name'];?></a></li>
<?php } } ?>
      </ul>
  <?php } ?>
      <!-- 只在首页显示 friend-link end  -->

      <ul class="footer-link">
        <li><a href="index.php?do=single&id=299" target="_blank">关于我们</a></li>
        <li><a href="index.php?do=single&id=300" target="_blank">联系我们</a></li>
        <li><a href="index.php?do=single&id=312" target="_blank">服务条款</a></li>
        <li><a href="index.php?do=single&id=313" target="_blank">隐私政策</a></li>
      </ul>
      <!-- footer-link end -->
      <div class="footer-copyright">
        <p><?php if($basic_config['company']) { ?>公司名称:<?php echo $basic_config['company'];?><?php } ?> <?php if($basic_config['address']) { ?>地址:<?php echo $basic_config['address'];?><?php } ?> <?php if($basic_config['phone']) { ?>电话:<?php echo $basic_config['phone'];?><?php } ?></p>
        <p><?php if($basic_config['copyright']) { ?>Powered by <?php echo P_NAME;?><?php echo KEKE_VERSION;?> <?php echo $basic_config['copyright'];?><?php } ?> <?php if($basic_config['filing']) { ?> <a href="http://icp.valu.cn/" target="_blank"><?php echo $basic_config['filing'];?></a><?php } ?></p>
        <p><?php if($basic_config['stats_code']) { ?><?php echo stripslashes(stripslashes($basic_config['stats_code'])); ?><?php } ?></p>
      </div>
      <!-- footer-copyright end -->
  </div><!-- container end -->
</div><!-- footer end -->


<div id="fix-box">
  <a id="top" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>
</div>
<!-- #fix-box end -->




<?php if($uid) { ?>
    <!-- IM -->
    	
    <!-- IM -->
    
<?php kekezu::update_oltime($uid,$username) ?>
<?php } else { ?>


<?php } ?>







<script type="text/javascript">
$(function(){
  $('.color-selected .nav-sub-list a').click(function() {
    var css = $(this).attr('data-css');
    var color = $(this).attr('data-rel');
    $('.nav-item-link span.style-color').removeClass().addClass('style-color '+ color);
    $('#active-style').attr('href', 'tpl/default/'+ css +'/style.css');
    $('#active-style-user').attr('href', 'tpl/default/'+ css +'/user.css');
    $('#active-style-store').attr('href', 'tpl/default/'+ css +'/store.css');
    $('#active-style-home').attr('href', 'tpl/default/'+ css +'/home.css');
  });
})
  
</script>


<script type="text/javascript">
var uid='<?php echo $uid;?>';
var UseIm= true;
var actionDo = '<?php echo $do;?>';
var username='<?php echo $username;?>';
var auid = '<?php echo $oauth_user_info['account'];?>';
var atype ='<?php echo $wb_type;?>';
var xyq = "<?php echo $xyq = session_id(); ?>";

$(function(){
    $("img.lazy").lazyload({
        effect: "fadeIn"
    });
});

<?php if($exec_time_traver) { ?>
$(function(){
   $.get('js.php?op=time&r='+Math.random());
})
<?php } ?>
</script>
</body>
</html><?php keke_tpl_class::ob_out();?>