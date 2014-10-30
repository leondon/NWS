<?php keke_tpl_class::checkrefresh('task/mreward/tpl/default/index', '1414474487' );?><!DOCTYPE HTML>
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
<?php if($do==user) { ?>
<link href="tpl/default/<?php echo $_K['sitecss'];?>/user.css" rel="stylesheet" type="text/css">
<?php } elseif($do==seller) { ?>
<link href="tpl/default/<?php echo $_K['sitecss'];?>/store.css" rel="stylesheet" type="text/css">
<?php } elseif($do=='index') { ?>
 <?php if($_K['theme']) { ?>
 <link href="tpl/default/theme/<?php echo $_K['theme'];?>/home.css" type="text/css" rel="stylesheet" >
 <?php } else { ?>
 <link href="tpl/default/<?php echo $_K['sitecss'];?>/home.css" type="text/css" rel="stylesheet" >
 <?php } ?>
<?php } else { ?>
<link href="tpl/default/<?php echo $_K['sitecss'];?>/style.css" rel="stylesheet" type="text/css">
<?php } ?>
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

<header class="header">
  <div  class="container">
    <div class="header-website">
      <div class="brand-logo">
        <a href="<?php echo SITEURL;?>"><img src="<?php echo $strWebLogo;?>" alt="KPPW"></a>
      </div><!-- brand-logo end-->
      <!--<div class="header-location">
        全国站
        <div class="localtion-layer">
          <a href="javascript:void(0);" data-toggle="dropdown">[切换城市<span class="caret"></span>]</a>
          <ul class="dropdown-menu for-city" role="menu" aria-labelledby="dLabel">
          	<?php if(is_array($arrDisplaypro)) { foreach($arrDisplaypro as $k => $v) { ?>
            <li><a href="javascript:void(0);" role="menuitem" tabindex="-1"><?php echo $v['name']?></a></li>
<?php } } ?>
          </ul>
        </div>--><!-- localtion-layer end-->
      <!--</div>--><!-- header-location end-->
    </div><!-- header-website end-->

    <div class="header-function">
      <div class="header-search">
        <form action="<?php if($do =='tasklist'||$do =='goodslist'||$do =='sellerlist') { ?><?php echo $strUrl;?><?php } else { ?>index.php?do=tasklist<?php } ?>" role="search" id="topHeaderSearch" method="post" >
              <div class="btn-group">
                <button type="button" id="searchType" class="btn btn-default dropdown-toggle " data-toggle="dropdown">
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
            <div class="form-group search-input">
              <input type="text" name="ky" onkeydown="searchKeydown(event);" class="form-control" placeholder="<?php if($ky) { ?><?php echo $ky;?><?php } ?>" x-webkit-speech="" x-webkit-grammar="bUIltin:search" lang="zh-CN">
            </div>
            <button type="submit" class="btn btn-primary">搜索</button>
        </form>

      </div><!-- header-search end-->
      <div class="header-keywords">
        热门搜索：
<?php if(is_array($arrTopIndus)) { foreach($arrTopIndus as $k => $v) { ?>
        <a href="index.php?do=tasklist&i=<?php echo $v['indus_id']?>" class="marked marked-tags"><?php echo $indus_arr[$v['indus_id']]['indus_name'];?></a>
<?php } } ?>
      </div><!-- header-keywords end-->
    </div><!-- header-function end-->
  </div>
</header><!-- header end-->

<nav class="site-nav">
<div class="container">
  <div role="navigation" class="navbar navbar-primary">
    <div class="navbar-header">
      <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
        <span class="sr-only">切换导航</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-actived">网站导航</span>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav nav-primary">
      		<?php if(is_array($nav_arr)) { foreach($nav_arr as $k => $v) { ?>
 <li <?php if(isset($strNavActive) && $v['nav_style']==$strNavActive) { ?>class="active"<?php } ?> ><a href="<?php echo $v['nav_url'];?>" <?php if($v['newwindow']) { ?>target="_blank"<?php } ?>><span><?php echo $v['nav_title'];?></span></a></li>
              <li class="line"></li>
<?php } } ?>
      </ul>
      <!--<ul class="nav navbar-nav navbar-right">
        <li><a href="#">诚信保障</a></li>
        <li><a href="#">VIP特权</a></li>
        <li><a href="#">增值工具</a></li>
      </ul>-->
    </div><!--/.nav-collapse -->
  </div>
</div>
</nav>
<nav class="bread-nav">
  <div  class="container">
    <ol class="breadcrumb">
      <li>您的位置：</li>
  <?php if(is_array($arrBreadcrumbs)) { foreach($arrBreadcrumbs as $k => $v) { ?>
      	<li><a href="<?php echo $v['url']?>"><?php echo $v['name']?></a></li>
  <?php } } ?>
    </ol>
  </div>
</nav>
<!-- bread-nav end -->
<!-- 查看大图js -->
<link href="static/js/jqplugins/fancybox/jquery.fancybox.min.css" rel="stylesheet">
<script src="static/js/jqplugins/fancybox/jquery.fancybox.min.js"></script>
<script src="static/js/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link href="static/js/uploadify/uploadify.css" rel="stylesheet">

<div class="container">
<div id="main">
  <!-- detail start-->
  <div class="detail">
    <div class="detail-header">
        <a href="index.php?do=seller&id=<?php echo $arrTaskInfo['uid'];?>" class="detail-header-pic" title="<?php echo $arrTaskInfo['username'];?>">
          <?php echo  keke_user_class::get_user_pic($arrTaskInfo['uid'],'middle') ?>
        </a>
        <div class="detail-ctrl">

              <div class="btn-group visible-xs">
                <span class="btn btn-default btn-lg">
                  <span class="bdsharebuttonbox">
                    <a href="javascript:void(0);" class="bds_more" data-cmd="more"></a>
                  </span>
                </span>
              </div>

              <div class="btn-group">
                     <?php if($arrProcess_can['work_hand']&&$gUid) { ?>
                <a href="index.php?do=taskhandle&op=turnaround&taskId=<?php echo $arrTaskInfo['task_id'];?>" class="btn btn-primary btn-lg">我要交稿</a>
              <?php } ?>
              <?php if($arrProcess_can['delay']&&$gUid) { ?>
                <a href="index.php?do=taskhandle&op=delay&taskId=<?php echo $arrTaskInfo['task_id'];?>" class="btn btn-primary btn-lg">我要延期</a>
              <?php } ?>

              </div>

              <div class="btn-group visible-xs">
                <?php if($arrTaskInfo['favorite']) { ?>
                      <a id="favorite<?php echo $arrTaskInfo['task_id'];?>" href="javascript:cancelFavorite('task',<?php echo $arrTaskInfo['task_id'];?>);" title="取消收藏" class="action-collect on btn btn-default btn-lg"><i class="fa fa-star"></i></a>
                <?php } else { ?>
                      <a id="favorite<?php echo $arrTaskInfo['task_id'];?>" href="javascript:addFavorite('task',<?php echo $arrTaskInfo['task_id'];?>);" title="收藏" class="action-collect btn btn-default btn-lg"><i class="fa fa-star"></i></a>
               <?php } ?>
              </div>

              <div class="btn-group visible-xs">
                <a href="javascript:report(2,'task','<?php echo $arrTaskInfo['uid'];?>','<?php echo $arrTaskInfo['task_id'];?>','<?php echo $arrTaskInfo['task_id'];?>');void(0);" title="举报" class="action-report btn btn-default btn-lg"><i class="fa fa-bell"></i></a>
              </div>


        </div>
        <!-- detail-ctrl end -->
        <div class="detail-header-body">
          <h1 class="detail-title"><span class="money">
            <sub>￥</sub><?php echo $arrTaskInfo['task_cash'];?></span> <?php echo $arrTaskInfo['task_title'];?>
           <?php if(is_array($arrPayitemShow)) { foreach($arrPayitemShow as $k => $v) { ?>
            <span class="marked <?php echo $v['style']?>"><?php echo $v['abbr']?></span>
<?php } } ?>
          </h1>
          <div class="detail-obj">
            <div class="detail-obj-item">
              <div class="method">
              	<a href="index.php?do=tasklist&m=<?php echo $arrTaskInfo['model_id'];?>" class="method-type"  data-toggle="popover" data-placement="bottom"
data-html="true" data-trigger="hover" data-content="<?php echo $prizeDesc;?>">
<?php echo $arrModelInfo['model_name'];?>模式 <i class="fa fa-angle-down"></i></a>
                <span><i class="fa fa-money"></i> <?php if($arrTaskInfo['task_status']) { ?> 已托管：<sub>￥</sub><?php echo $arrTaskInfo['task_cash'];?><?php } else { ?>未托管<?php } ?></span>
              </div>

            </div>
              <div class="detail-obj-item">
              <a href="index.php?do=seller&id=<?php echo $arrTaskInfo['uid'];?>" class="btn btn-primary btn-xs">进入店铺</a>
 <?php if($gUid&&$gUid !=$arrTaskInfo['uid']) { ?>
              <a href="javascript:sendMessage(<?php echo $arrTaskInfo['uid'];?>);void(0);"  class="btn btn-default btn-xs">联系我</a>
   <?php if($intFollow) { ?>
 <span class="btn-group">
         <a href="javascript:void(0);" class="btn btn-success btn-xs disabled" role="button"><i class="fa fa-check"></i> 已关注</a>
            <a href="javascript:cancelFollow(<?php echo $arrTaskInfo['uid'];?>);void(0);"  class="btn btn-success btn-xs" id="follow<?php echo $arrTaskInfo['uid'];?>">取消</a>
          </span>
  <?php } else { ?>
              <a href="javascript:addFollow(<?php echo $arrTaskInfo['uid'];?>);void(0);" class="btn btn-default btn-xs" id="follow<?php echo $arrTaskInfo['uid'];?>"><i class="fa fa-plus"></i> 加关注</a>
  <?php } ?>
            <?php } ?>
            </div>
          </div>
        </div>
        <!-- detail-header-body end -->

    </div>
    <!-- detail-header end -->
    <div class="detail-progress">
        <h2 class="detail-title-min">项目进度</h2>
      <ul class="step step5">
        <?php if(is_array($arrProjectProgress)) { foreach($arrProjectProgress as $k => $v) { ?>
        <li class="step-item <?php if($arrTaskInfo['task_status']>=$v['status']) { ?> action <?php } ?>">
          <span class="step-num"><?php if($v['status'] < $arrTaskInfo['task_status']) { ?><i class="fa fa-check"></i><?php } else { ?><?php echo $k;?><?php } ?></span>
          <div class="step-text step-bottom">
            <p><strong class="step-title"><?php echo $v['desc'];?></strong></p>
            <?php if($v['time']&&$arrTaskInfo['task_status'] >=$v['status']) { ?>
            	<p><?php echo date('Y-m-d',$v['time']) ?></p>
            <?php } ?>
          </div>
          <?php if(in_array($v['status'], array(2,3,5))&&$arrTaskInfo['task_status'] >=$v['status']) { ?>
          <div class="step-text step-top">
            <?php if($arrTaskInfo['task_status'] ==$v['status']) { ?>
            	<p><?php echo $v['timedesc'];?></p>
            	<p><span class="red d_time" ed="<?php echo $v['timeing'];?>" title="<?php echo $v['timedesc'];?>"></span></p>
             <?php } ?>
          </div>
          <?php } ?>
        </li>
        <?php } } ?>

      </ul>

    </div>
    <div class="detail-body">
      <h2 class="detail-title-min">需求描述</h2>
      	<div class="detail-img">
  	<?php if(is_array($arrTaskPics)) { foreach($arrTaskPics as $k => $v) { ?>
        <a class="detail-img-item" href="<?php echo $v?>" title="" rel="detail-img-group">
          <img src="<?php echo $v?>" alt="">
        </a>
<?php } } ?>
      </div>
      <div class="detail-desc">
      	<?php echo htmlspecialchars_decode($arrTaskInfo['task_desc']) ?>
      </div>
      <div class="detail-additional <?php if(!$arrTaskInfo['ext_desc']) { ?> hidden <?php } ?>">
        <h2 class="detail-title-min">补充需求 <time datetime="<?php echo date('Y-m-d H:i:s',$arrTaskInfo['ext_time']) ?>"><?php echo date('Y-m-d H:i:s',$arrTaskInfo['ext_time']) ?></time></h2>
        <?php echo htmlspecialchars_decode($arrTaskInfo['ext_desc']) ?>
      </div>

 <?php if($arrTaskInfo['task_file']) { ?>
      <h2 class="detail-title-min">附件下载 <span class="label label-default"><?php echo count($arrTaskFiles); ?></span></h2>
      <ul class="detail-affix">
      		<?php if(is_array($arrTaskFiles)) { foreach($arrTaskFiles as $v) { ?>
         <li class="detail-affix-item">
        	<a href="<?php echo $_K['siteurl']?>/<?php echo $v['save_name'];?>" target="_blank" >
        		<i class="fa fa-download"></i> <?php echo $v['file_name'];?>
        	</a>
        	</li>
<?php } } ?>
      </ul>
     <?php } ?>

      <!--<h2 class="detail-title-min">地图</h2>
      <div class="detail-map">
        <figure>
          <figcaption>
            <address>位置：黄浦江上的的卢浦大桥</address>
          </figcaption>
          <img src="http://pic.yupoo.com/shuart/Du8Agxqc/p5mT7.png" alt="">
        </figure>
      </div>-->

      <div class="poster-ctrl">
            <?php if($arrProcess_can['reqedit']) { ?>
            <a href="javascript:reqedit();void(0);"   class="btn btn-primary btn-sm"><i class="fa fa-ellipsis-h"></i> 补充需求</a>
          <?php } ?>
            <!--<a href="#" class="btn btn-default btn-sm">设为加急任务</a>
            <a href="#" class="btn btn-default btn-sm">设为置顶任务</a>
            <a href="#" class="btn btn-default btn-sm">标记地图</a>
            <a href="#" class="btn btn-default btn-sm">屏蔽搜索引擎</a>-->
      </div>
    </div>
    <!-- detail-body end -->

    <div class="detail-footer">
      <ul class="detail-footer-meta for-poster">
        <li class="for-poster-item">雇主：<a href="index.php?do=seller&id=<?php echo $arrTaskInfo['uid'];?>" title="<?php echo $arrTaskInfo['username'];?>"><?php echo $arrTaskInfo['username'];?></a></li>
        <li class="for-poster-item"><i class="fa fa-clock-o"></i> 发布时间：<?php echo date('Y-m-d H:i:s',$arrTaskInfo['start_time']) ?></li>
        <li class="for-poster-item">编号：#<?php echo $arrTaskInfo['task_id'];?></li>
        <?php if($arrProcess_can['task_report']&&$arrTaskInfo['uid'] != $gUid&&$gUid) { ?>
        <li class="for-poster-item hidden-xs"><a href="javascript:report(2,'task','<?php echo $arrTaskInfo['uid'];?>','<?php echo $arrTaskInfo['task_id'];?>','<?php echo $arrTaskInfo['task_id'];?>');void(0);" class="action-report"><i class="fa fa-bell"></i> 举报</a></li>
        <?php } ?>
      </ul>

      <ul class="detail-footer-meta for-user">
        <li class="for-user-item">
          <div class="bdsharebuttonbox">
            <a href="#" class="bds_more" data-cmd="more">分享到：</a>
            <a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
            <a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
            <a title="分享到人人网" href="#" class="bds_renren" data-cmd="renren"></a>
            <a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
            <a title="分享到复制网址" href="#" class="bds_copy" data-cmd="copy"></a>
            <a title="分享到打印" href="#" class="bds_print" data-cmd="print"></a>
          </div>
          <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
        </li>
         <?php if($gUid!=$arrTaskInfo['uid']) { ?>
         <li class="for-user-item" >
          <?php if($intFavorite) { ?>
          	<a id="favorite<?php echo $arrTaskInfo['task_id'];?>" href="javascript:cancelFavorite('task',<?php echo $arrTaskInfo['task_id'];?>);" title="取消收藏" class="action-collect on"><i class="fa fa-star"></i></a>
  <?php } else { ?>
          	<a id="favorite<?php echo $arrTaskInfo['task_id'];?>" href="javascript:addFavorite('task',<?php echo $arrTaskInfo['task_id'];?>);" title="收藏" class="action-collect"><i class="fa fa-star"></i></a>
  <?php } ?>
   </li>
 <?php } ?>
      </ul>
    </div>
    <!-- detail-footer end -->
  </div>

  <!-- detail end-->
  <div class="for-advertise">
    <?php keke_loaddata_class::ad_show('TASKINFO_HEAD','task','') ?>
  </div>
  <!-- for-advertise end -->
  <div class="tab tab-darken" id="detail">
    <a href="index.php?do=task&id=<?php echo $arrTaskInfo['task_id'];?>&view=work#detail"    <?php if($view == 'work') { ?>    class="selected" <?php } ?>>稿件 <span class="badge"><?php if($arrTaskInfo['work_num']) { ?><?php echo $arrTaskInfo['work_num']?><?php } else { ?>0<?php } ?></span></a>
    <a href="index.php?do=task&id=<?php echo $arrTaskInfo['task_id'];?>&view=comment#detail" <?php if($view == 'comment') { ?> class="selected" <?php } ?>>留言 <span class="badge"><?php if($arrTaskInfo['leave_num']) { ?><?php echo $arrTaskInfo['leave_num']?><?php } else { ?>0<?php } ?></span></a>
    <a href="index.php?do=task&id=<?php echo $arrTaskInfo['task_id'];?>&view=mark#detail"    <?php if($view == 'mark') { ?>    class="selected" <?php } ?>>评价 <span class="badge"><?php echo $arrTaskInfo['mark']['all'];?></span></a>
  </div>
  <!-- tab end -->
  <?php require keke_tpl_class::template ( "task/" . $arrModelInfo ['model_code'] . "/tpl/" . $_K ['template'] . "/".$view ); ?>
<div class="for-advertise">
    <?php keke_loaddata_class::ad_show('TASKINFO_BOTTOM','task','') ?>
  </div>
  <!-- for-advertise end -->
</div><!-- #main end -->


<!-- 任务增值项目 start -->
 <div id="side">

    <div class="box-body site-security">
      <h2 class="min-title">诚信威客网站，服务更放心</h2>
      <ul>
          <li class="col3">
            <p>
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x text-success"></i>
                <i class="fa fa-yen fa-stack-1x fa-inverse"></i>
              </span>
            </p>
            <p>担保交易</p>
          </li>
          <li class="col3">
            <p>
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x text-success"></i>
                <i class="fa fa-shield fa-stack-1x fa-inverse"></i>
              </span>
            </p>
            <p>诚信保障</p>
          </li>
          <li class="col3">
            <p>
              <span class="fa-stack fa-2x">
                <i class="fa fa-circle fa-stack-2x text-success"></i>
                <i class="fa fa-user fa-stack-1x fa-inverse"></i>
              </span>
            </p>
            <p>威客认证</p>
          </li>
      </ul>
    </div>
<?php if(TOOL === TRUE) { ?>
   <?php if($uid==$arrTaskInfo['uid']&&$arrPayitemLists&&$arrTaskInfo['task_status']>=2) { ?>
    <div class="box-header">
      <h2 class="min-title">提升效果，你可能还需要</h2>
    </div>
    <div class="box-body apply-for-service">
    	<?php if(is_array($arrPayitemLists)) { foreach($arrPayitemLists as $k => $v) { ?>
      <dl>
        <dt>
          <a  href="javascript:payitem('task','<?php echo $arrTaskInfo['task_id'];?>','<?php echo $arrTaskInfo['uid'];?>');void(0);"  class="btn btn-success btn-sm" role="button"><?php echo $v['item_name']?></a>（<span class="money"><sub>￥</sub><?php echo $v['item_cash']?> 元</span> / <?php echo $v['item_standard']?>）
        </dt>
        <dd><?php echo $v['item_desc']?></dd>
      </dl>
  <?php } } ?>
    </div>
   <?php } ?>
   <?php } ?>
    <div class="box-header">
      <h2 class="min-title">同类任务</h2>
    </div>
    <div class="box-body same-type">
      <ul class="min-list">
      	 <?php if($arrSimpleTasks) { ?>
         <?php if(is_array($arrSimpleTasks)) { foreach($arrSimpleTasks as $k => $v) { ?>
        <li><a href="index.php?do=task&id=<?php echo $v['task_id']?>" title="<?php echo $v['task_title']?>"><span class="money">￥
        	    <?php if($v['task_cash_coverage']) { ?>
            		<?php echo $arrCashCoves[$v['task_cash_coverage']]['cove_desc'];?>
            	<?php } else { ?>
            		<?php echo $v['task_cash'];?>
            	<?php } ?></span> <?php echo $v['task_title']?></a></li>
     <?php } } ?>
 <?php } else { ?>
暂无数据
 <?php } ?>
      </ul>
    </div>

    <div class="box-header">
      <h2 class="min-title">推荐服务商</h2>
    </div>
    <div class="box-body">
      <ul class="record-list img">
          <?php if($arrRecommShops) { ?>
          <?php if(is_array($arrRecommShops)) { foreach($arrRecommShops as $k => $v) { ?>
          <li>
            <a href="index.php?do=seller&id=<?php echo $v['uid']?>" class="avatar" title="<?php echo $v['shop_name']?>">
              <?php echo  keke_user_class::get_user_pic($v['uid'],'middle') ?>
            </a>

            <div class="avatar-detail">
              <p class="record-list-title">
                <a href="index.php?do=seller&id=<?php echo $v['uid']?>" title="<?php echo $v['shop_name']?>">
                  <?php echo $v['shop_name']?>
                </a>
              </p>
              <p class="record-list-meta">好评率 <span><?php echo $v['good_rate']*100 ?><sub>%</sub></span></p>
              <p>
                <span class="marked marked-tags"><?php echo $indus_p_arr[$v['indus_pid']]['indus_name'];?></span>
                <span class="marked marked-tags"><?php echo $indus_c_arr[$v['indus_id']]['indus_name'];?></span>
              </p>
            </div>
          </li>
  <?php } } ?>
  <?php } else { ?>
暂无数据
  <?php } ?>
        </ul>
    </div><!-- 推荐服务商 & box-body end -->


</div><!-- #side end -->
<!-- 任务增值项目 end -->

</div>
<!-- container end -->
<script src="static/js/model/task/common.js" charset="<?php echo CHARSET;?>"></script>
<script type="text/javascript">
var uid = '<?php echo $uid;?>';
var strUrl = '<?php echo $strUrl;?>';
    var taskId = '<?php echo $arrTaskInfo['task_id']?>';
var  jsonWorkStatus = <?php echo $jsonWorkStatus?>;
  $(function(){
    $('.manuscript-img-item').fancybox({
      openEffect  : 'none',
      closeEffect : 'none',
      padding : 5,
      tpl:{
        error    : '<p class="fancybox-error">内容无法加载。<br/>请稍后重试。</p>'
      },
      helpers : {
        title : {
          type : 'over'
        }
      }
    });
    $('.detail-img-item').fancybox({
      openEffect  : 'none',
      closeEffect : 'none',
      padding : 5,
      tpl:{
        error    : '<p class="fancybox-error">内容无法加载。<br/>请稍后重试。</p>'
      },
      helpers : {
        title : {
          type : 'over'
        }
      }
    });
    //弹出任务类型详细
    $('.method-type').popover();
  })
</script>
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
      </div>
      <!-- footer-copyright end -->
  </div><!-- container end -->
</div><!-- footer end -->


<div id="fix-box">
  <a id="top" href="javascript:void(0);"><i class="fa fa-arrow-circle-up"></i></a>
</div>
<!-- #fix-box end -->

<?php if($uid) { ?>
<?php kekezu::update_oltime($uid,$username) ?>
<?php } ?>
<script type="text/javascript">
var uid='<?php echo $uid;?>';
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
</html>

<?php keke_tpl_class::ob_out();?>