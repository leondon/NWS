<?php
/**
* 支付
*
* @file  pay.php
* @author shangjinglong <sjl.55555@gmail.com>
* @time  2014-4-4 上午11:16:11
* @Copyright (c) 2007-2014 http://www.kekezu.com All rights reserved.
*/

/**
 * /**
 * 获取开启的支付接口
 */
$arrOnlinePayList = keke_finance_class::get_pay_config ( '', 'online' );
////计算线下的端口是否全部关闭
$pay_statusnum=0;
foreach ($arrOnlinePayList as $k => $v){
	if($v['pay_status']=='1'){
	 $pay_statusnum+=1;	
	}	
}
if(!$pay_statusnum){	
	$payStatus=0;
}

/**
 * 付款类型 任务 / 商品 / 订单
 * $type = task | service | order
 */
$type = strval ( trim ( $type ) );

$id = intval ( trim ( $id ) );
switch ($type) {
	case 'task' :
		// 任务详细
		$arrTaskInfo = db_factory::get_one ( sprintf ( "select * from %switkey_task where task_id='%d'", TABLEPRE, $id ) );
		// 任务模型详细
		$modelInfo = $kekezu->_model_list [$arrTaskInfo ['model_id']];
		// 任务类名
		$className = $modelInfo ['model_code'] . "_task_class";
		// 订单详细
		$arrOrderDetailInfo = db_factory::get_one ( sprintf ( "select order_id from %switkey_order_detail where obj_id=%d and obj_type = 'task'", TABLEPRE, $id ) );
		$orderId = intval ( $arrOrderDetailInfo ['order_id'] );
		$arrOrderInfo = db_factory::get_one ( sprintf ( "select * from %switkey_order where order_id=%d ", TABLEPRE, $orderId ) );
		$cash = $arrOrderInfo ['order_amount'];
		$title = $arrTaskInfo ['task_title'];
		$objId = $arrTaskInfo ['task_id'];
		$modelId = $arrTaskInfo ['model_id'];
		break;

	case 'order' :
		$arrOrderInfo = db_factory::get_one ( sprintf ( "select order_id,order_amount,order_name,order_uid from %switkey_order where order_id=%d ", TABLEPRE, $id ) );
		$arrOrderDetailInfo = db_factory::get_one ( sprintf ( "select obj_id from %switkey_order_detail where order_id=%d ", TABLEPRE, $id ) );
		$arrServiceInfo = db_factory::get_one ( sprintf ( "select model_id from %switkey_service where service_id=%d ", TABLEPRE, $arrOrderDetailInfo ['obj_id'] ) );
		$orderId = intval ( $arrOrderInfo ['order_id'] );
		$cash = floatval ( $arrOrderInfo ['order_amount'] );
		$title = strval ( $arrOrderInfo ['order_name'] );
		$objId = intval ( $arrOrderDetailInfo ['obj_id'] );
		$modelId = intval ( $arrServiceInfo ['model_id'] );
		break;
	case 'payitem' :
		$arrOrderInfo = db_factory::get_one ( sprintf ( "select order_id,order_amount,order_name,order_uid from %switkey_order where order_id=%d ", TABLEPRE, $id ) );
		$arrOrderDetailInfo = db_factory::get_one ( sprintf ( "select obj_id from %switkey_order_detail where order_id=%d ", TABLEPRE, $id ) );
		$orderId = intval ( $arrOrderInfo ['order_id'] );
		$cash = floatval ( $arrOrderInfo ['order_amount'] );
		$title = strval ( $arrOrderInfo ['order_name'] );
		$objId = intval ( $arrOrderDetailInfo ['obj_id'] );
		$modelId = intval ( $arrServiceInfo ['model_id'] );
}
/**
 * 权限判断，下单人进入支付页面
 */
if($gUid != $arrOrderInfo['order_uid']){
	kekezu::show_msg('页面不存在','',3,null,'warning');
}
$strUrl = 'index.php?do=pay&type=' . $type . '&cash=' . $cash;

if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
	if ($type == 'task') {
		$payTitle = $_K ['html_title'] . ' - 发布任务 - ' . $title;
	} elseif ($type == 'payitem') {
		$payTitle = $_K ['html_title'] . ' - 增值工具 - ' . $title;
	}else if($type=='order'){
		$payTitle = $_K ['html_title'] . ' - 购买服务 - '.$title;
	}

	$bankConfig = kekezu::get_payment_config ( $bank );
	require S_ROOT . "/include/payment/" . $bank . "/order.php";

	if($type == 'payitem'){
		$form = get_pay_url ( 'payitem_charge', $cash, $bankConfig, $payTitle, $orderId, $modelId, $objId, NULL, 'MD5', 'form' );
	}else{
		$form = get_pay_url ( 'order_charge', $cash, $bankConfig, $payTitle, $orderId, $modelId, $objId, NULL, 'MD5', 'form' );
	}
	echo $form;
	die ();
}

$strPageTitle = '在线支付' . '-' . $kekezu->_sys_config ['index_seo_title'];
