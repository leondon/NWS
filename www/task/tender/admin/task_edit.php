<?php
/**
 * 悬赏任务编辑
 */
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );

intval ( $task_id ) or kekezu::admin_show_msg ( $_lang ['param_error'], 'index.php?do=model&model_id=' . $model_id . '&view=list', 3, '', 'warning' );
$ops = array ('basic', 'work', 'comm');
in_array ( $op, $ops ) or $op = 'basic';
$task_info = db_factory::get_one ( sprintf ( " select * from %switkey_task where task_id='%d'", TABLEPRE, $task_id ) );
$task_config = unserialize($model_info['config']);
//$payitem_arr = keke_payitem_class::get_payitem_info('employer',$model_list[$task_info['model_id']]['model_code']); //获取该任务所有的增值服务
//$payitem_arr_desc = unserialize($task_info['payitem_time']);//获取任务属性描述
//$payitem_standard = keke_payitem_class::payitem_standard (); //收费标准
keke_lang_class::loadlang('task_edit','task');
$task_sub_time = date('Y-m-d',$task_info['sub_time']);
$task_end_time = date('Y-m-d',$task_info['end_time']);
$task_start_time = date('Y-m-d',$task_info['start_time']);
if ($op == 'basic') { //基本信息

	$cash_rule_arr = kekezu::get_table_data ( "*", "witkey_task_cash_cove", "model_code='{$model_info['model_code']}'", "", '', '', "cash_rule_id" );
	if ($sbt_edit) {//编辑
		$task_obj = new Keke_witkey_task_class ();
		$task_obj->setWhere(" task_id ='$task_id'");
	//	$slt_indus_id  or kekezu::admin_show_msg ( "必须选择一个行业", "index.php?do=model&model_id=$model_id&view=edit&task_id=$task_id" );

		$task_obj->setTask_title (kekezu::escape($task_title) );
		if($txt_task_day){
			//交稿时间
			$task_obj->setSub_time(strtotime($txt_task_day));
			//重置选稿时间
			$task_obj->setEnd_time(strtotime($txt_task_day)+$task_config ['choose_time'] * 24 * 3600);
		}
		$task_obj->setIndus_id ( $slt_indus_id );
		$task_obj->setTask_cash($task_cash);
		$task_obj->setReal_cash($task_cash*(1-$task_info['profit_rate']/100));//可用佣金
		$task_obj->setTask_cash_coverage($fds['task_cash_coverage']);
		$task_obj->setTask_desc ( $task_desc );
		$fields=kekezu::escape($fields);
		$task_obj->setSeo_title($fields['seo_title']);
		$task_obj->setSeo_keyword($fields['seo_keyword']);
		$task_obj->setSeo_desc($fields['seo_desc']);
		if($_FILES['fle_task_pic']['name']){
			$task_pic = keke_file_class::upload_file("fle_task_pic");
		}else{
			$task_pic = $task_pic_path;
		}
		$task_obj->setTask_pic($task_pic);
		/**增值服务项录入**/

/*
		$item_ids = array();

		$cash = $task_info['att_cash']?$task_info['att_cash']:0;
		$payitem_info = unserialize($task_info['payitem_time']);
		$now_time = time();
		$start_top_time = $payitem_info['top']<=$now_time?$now_time:$payitem_info['top'];
		$start_urgent_time = $payitem_info['urgent']<=$now_time?$now_time:$payitem_info['urgent'];
		if(count($payitem_list)){
			foreach($payitem_list as $k=>$v){
				if($v['buy_num']){
					$item_ids[] = $k;
					$cash = $cash + $v['buy_num']*$payitem_arr[$k]['item_cash'];
					$v [item_code] == 'top' and $payitem_info [top] = $start_top_time + 3600 * 24 * $v [buy_num];
					$v [item_code] == 'urgent' and $payitem_info [urgent] = $start_urgent_time + 3600 * 24 * $v [buy_num];
					if( $v['item_code']=='map'){
						$mypoint and $task_obj->setPoint($mypoint);
						$myprovince and $task_obj->setCity($myprovince);
					}
				}
			}
		}
		$payitem_time = serialize($payitem_info);
		if( $task_info['pay_item']){
			$task_ids_array = explode(',', $task_info['pay_item']);
			$new_item_array = array_unique(array_merge($task_ids_array,$item_ids));
		}else{
			$new_item_array = $item_ids;
		}
		$payitem_ids = implode(',', $new_item_array);
		$task_obj->setPayitem_time($payitem_time);
		$task_obj->setPay_item($payitem_ids);
		$task_obj->setAtt_cash($cash);
		*/
		kekezu::admin_system_log ( $_lang['edit_task'].":{$task_title}" );
		$res=$task_obj->edit_keke_witkey_task ();

		$v_arr = array($_lang['admin_name']=>$myinfo_arr ['username'],$_lang['time']=>date('Y-m-d H:i:s',time()),$_lang['model_name']=>$model_info['model_name'],$_lang['task_id']=>$task_info ['task_id'],$_lang['task_title']=>$task_info ['task_title']);
		keke_msg_class::notify_user($task_info ['uid'],$task_info ['username'],'task_edit',$_lang['edit_task'],$v_arr);

	} elseif($sbt_act){
		switch ($sbt_act){
			case "freeze"://冻结
				$res=keke_task_config::task_freeze ( $task_id );
				break;
			case "unfreeze"://解冻
				$res=keke_task_config::task_unfreeze ( $task_id );
				break;
			case "pass"://通过
				$res=keke_task_config::task_audit_pass ( array($task_id));
				break;
			case "nopass"://不通过
				$res=keke_task_config::task_audit_nopass ( $task_id );
				break;
		}

	}else {
		$process_arr = keke_task_config::can_operate ( $task_info ['task_status'],$task_info['is_top']  );
		$file_list = db_factory::query ( sprintf ( " select * from %switkey_file where task_id='%d' and obj_id = 0 and obj_type='task' ", TABLEPRE, $task_id ) );
		$status_arr = sreward_task_class::get_task_status ();

		$payitem_list=keke_payitem_class::get_payitem_config('employer');
		/*行业*/
		$indus_arr = $kekezu->_indus_arr;
		$temp_arr = array ();
		$indus_option_arr = $indus_arr;
		kekezu::get_tree ( $indus_option_arr, $temp_arr, "option", $task_info ['indus_id'] );
		$indus_option_arr = $temp_arr;
	}
	if($res){
		kekezu::admin_show_msg ( $_lang['task_operate_success'], "index.php?do=model&model_id=$model_id&view=list",3,'','success' );
	}
}else{//任务杂项
	require S_ROOT.'/task/'.$model_info ['model_dir'].'/admin/task_misc.php';
}
require $kekezu->_tpl_obj->template ( 'task/' . $model_info ['model_dir'] . '/admin/tpl/task_edit_'.$op );