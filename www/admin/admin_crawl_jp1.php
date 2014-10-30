<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (19);
$group_arr = keke_admin_class::get_user_group ();
$table_obj = keke_table_class::get_instance ( 'witkey_crawl' );
intval ( $page ) or $page = 1;
intval ( $wh ['page_size'] ) or $wh ['page_size'] = 10;
//error_reporting(E_ALL);


$url = "index.php?do=$do&view=$view&txt_username=$txt_username&txt_content=$txt_content&txt_task_id=$txt_task_id&page=$page&w[ord][0]={$w['ord']['0']}&w[ord][1]={$w['ord']['1']}&wh[page_size]={$wh['page_size']}";
echo $sbt_action;
if ($ac == 'del') { //
	$res = $table_obj->del ( 'task_id', $task_id );
	kekezu::admin_system_log($_lang['delete_crawl_data'] . $task_id ); 
	$res and kekezu::admin_show_msg ($_lang['delete_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['delete_fail'], $url,3,'','warning' );
} elseif ($ac == 'del_all') { //清空
	$sql = sprintf ( "DELETE FROM %switkey_crawl WHERE SITE_NAME='zhubajie'", TABLEPRE);
	db_factory::execute ( $sql );
	kekezu::admin_system_log( $_lang['empty_system_log'] );
	kekezu::admin_show_msg ( $_lang['empty_system_log_success'], $url,3,'','success' );
} elseif ($sbt_action) { //批量删除
	$res = $table_obj->del ( 'log_id', $ckb );
	kekezu::admin_system_log( $_lang['mulit_delete_log'] );
	$res and kekezu::admin_show_msg ($_lang['mulit_operate_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['mulit_operate_fail'], $url,3,'','warning' );
} elseif ($sbt_crawl) { //爬网
	kekezu::admin_crawl_crowdworks($txt_start_id, $txt_end_id);
	//echo "task_id";
	//kekezu::admin_show_msg ($_lang['mulit_operate_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['mulit_operate_fail'], $url,3,'','warning' );
} else { //显示数据
//	$where = " 1 = 1";
//	empty ( $txt_task_id ) or $where .= " and task_id =" . intval ( $txt_task_id );
//	//empty ( $txt_username ) or $where .= " and username like '%$txt_username%'";
//	//empty ( $txt_content ) or $where .= " and log_content like '%$txt_content%'";
//	$w[ord][1]&&$w[ord][0] and $where .= " order by {$w['ord']['0']} {$w['ord']['1']}" or $where .= " order by task_id desc ";
//	$d = $table_obj->get_grid($where, $url,$page,$wh['page_size'],null,1,'ajax_dom');
//	$log_data = $d ['data'];
//	$pages = $d ['pages'];
}
require $template_obj->template ( 'admin/tpl/admin_' . $do . '_' . $view );