<?php
defined ( 'IN_KEKE' ) or exit('Access Denied');
require S_ROOT . "include/oauth/config.php";
require S_ROOT . "include/oauth/qq/qqConnectAPI.php";
$qqConnectAPI = new QC ();
$accessToken = $qqConnectAPI->qq_callback ();
$openId = $qqConnectAPI->get_openid ();
$qqConnectAPI = new QC ( $accessToken, $openId );
$oauthInfo = $qqConnectAPI->get_user_info ();
if (empty ( $oauthInfo )) {
	kekezu::show_msg('授权失败，请重试','index.php?do=user&view=account&op=binding',3,null,'warning');
}
$saveInfo = array (
		'account' => UserCenter::getUnique ( $oauthInfo ),
		'nickname' => $oauthInfo ['nickname'],
		'gender' => $oauthInfo ['gender'],
		'type' => 'qq'
);
if($gUid){
	if(UserCenter::bindingAccount($gUid, $gUserInfo['username'], $saveInfo)){
		kekezu::show_msg('绑定成功','index.php?do=user&view=account&op=binding',3,null,'success');
	}else {
		kekezu::show_msg('请勿重复绑定','index.php?do=user&view=account&op=binding',3,null,'warning');
	}
}else{
	$_SESSION[$saveInfo['type'].'_oauthInfo'] = $saveInfo;
		header('Location:index.php?do=oauthlogin&type='.$saveInfo['type']);
}