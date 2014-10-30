<?php keke_tpl_class::checkrefresh('tpl/default/pubtask', '1414462720' );?><!DOCTYPE HTML>
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
<div class="container">
<div id="main">
  <div class="release">
    <div class="release-msg">
      <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i>
      	联系客服
      	电话：	<?php if($strRandKf['phone']) { ?>  <?php echo $strRandKf['phone'];?>  <?php } else { ?>暂未填写<?php } ?>
      	QQ：		<?php if($strRandKf['qq']) { ?> 	  <?php echo $strRandKf['qq'];?>     <?php } else { ?>暂未填写<?php } ?>
      	邮箱：	<?php if($strRandKf['email']) { ?>  <?php echo $strRandKf['email'];?>  <?php } else { ?>暂未填写<?php } ?>
      </div>
    </div>

    <div class="release-progress">
    <ul class="step step4">
    <?php if(is_array($arrPubProcess)) { foreach($arrPubProcess as $k => $v) { ?>
      <li class="step-item <?php if($v['step'] <= $step) { ?>action<?php } ?>">
        <span class="step-num"><?php if($v['step'] < $step) { ?><i class="fa fa-check"></i><?php } else { ?><?php echo $k;?><?php } ?></span>
        <div class="step-text step-bottom">
          <p><strong class="step-title" title="<?php echo $v['desc'];?>"><?php echo $v['desc'];?></strong></p>
        </div>
      </li>
    <?php } } ?>
    </ul>
    </div>
    <!-- release-progress end-->

    <div class="release-body">
    <?php if($step == 'step1') { ?>
      <nav class="release-nav">
        <ul>
        <?php if(is_array($arrModelLists)) { foreach($arrModelLists as $k => $v) { ?>
            <li <?php if($id == $v['model_id']) { ?>class="selected"<?php } ?>>
                <a href="index.php?do=pubtask&id=<?php echo $v['model_id'];?>&step=<?php echo $step;?>">
                 <?php echo $v['model_name'];?>
                  <span class="arrow_b"></span>
                </a>
            </li>
<?php } } ?>
        </ul>
      </nav>
      <!-- release-nav end-->



      <div class="release-help">
        <h3 class="release-help-title">什么是<?php echo $arrModelInfo['model_name'];?>？</h3>

        <div class="hidden" id="DivTaskDesc">

     		<?php echo htmlspecialchars_decode($arrModelInfo['model_desc']) ?>
      	</div>

      </div>
      <div class="release-help-ctrl">
      	<a href="javascript:void(0);" id="toggleTaskDesc">任务说明 <i class="fa fa-caret-down"></i></a>
      </div>

      <?php } ?>
      <!-- release-help end  -->

      <!-- 加载各任务对应步骤  -->
      		<?php require keke_tpl_class::template("task/{$arrModelInfo['model_dir']}/tpl/{$_K['template']}/$step") ?>
      <!-- 加载各任务对应步骤  -->

    </div>
    <!-- release-body end -->
  </div>
  <!-- release end-->
</div>
</div>


<!-- 每个任务模型对应的JS -->
<script type="text/javascript" src="task/<?php echo $arrModelInfo['model_dir'];?>/tpl/default/<?php echo $arrModelInfo['model_dir'];?>.js"></script>
<script type="text/javascript" src="static/js/model/user/user.js"></script>
<!-- 每个任务模型对应的JS -->

<script type="text/javascript">
var strUrl = "<?php echo $strUrl;?>&step=<?php echo $step;?>";
var splitStr = "|";
/**
 * 日期选择插件*/
$('.form_datetime').datetimepicker({
      language:  'zh-CN',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
  });


$(function(){
/**
 *切换任务说明*/
$("#toggleTaskDesc").click(function(){
if($(this).children('i').hasClass('fa-caret-down')){
$(this).children('i').removeClass('fa-caret-down');
$(this).children('i').addClass('fa-caret-up');
}else{
$(this).children('i').removeClass('fa-caret-up');
$(this).children('i').addClass('fa-caret-down');
}
$("#DivTaskDesc").toggleClass('hidden');
});

/**
 *查看发布协议*/
 $("#viewPubAgreement").click(function(){
$('.release-agreement').toggleClass('hidden');
 });
});

/**
  *检查是否选中发布协议*/
function isAgreementChecked(){
if($("#agreementchecked" ).is(":checked")){
$("#pubAgreementTips").addClass('hidden');return true;
}else{
$("#pubAgreementTips").removeClass('hidden');return false;
}
}
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