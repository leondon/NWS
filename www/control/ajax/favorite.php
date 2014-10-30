<?php
if($op=='add'){
	$countFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type="%s"',TABLEPRE.'witkey_favorite',intval($gUid),intval($id),$type));
	if($countFavorite){
		kekezu::show_msg ( '你已经收藏过', NULL, NULL, NULL, 'fail' );
	}else{
	$arrModels =$kekezu->_model_list;
	if($type=='task'){
		$arrInfo = db_factory::get_one(sprintf('select * from %s where task_id = %d',TABLEPRE.'witkey_task',$id));
		$arrInsert['type'] = 'task';
		$arrInsert['id'] =$arrInfo['task_id'];
		$arrInsert['title'] = $arrInfo['task_title'];
		$arrInsert['model'] =$arrModels[$arrInfo['model_id']]['model_code'];
		$arrInsert['origin'] =$arrInfo['task_id'];
	}elseif ($type=='shop'){
		$arrInfo = db_factory::get_one(sprintf('select * from %s where uid = %d',TABLEPRE.'witkey_shop',$id));
		$arrInsert['type'] = 'shop';
		$arrInsert['id'] =$arrInfo['uid'];
		$arrInsert['title'] = $arrInfo['shop_name'];
		$arrInsert['model'] ='shop';
		$arrInsert['origin'] =$arrInfo['uid'];
	}elseif ($type=='service'){
		$arrInfo = db_factory::get_one(sprintf('select * from %s where service_id = %d',TABLEPRE.'witkey_service',$id));
		$arrInsert['type'] = 'service';
		$arrInsert['id'] =$arrInfo['service_id'];
		$arrInsert['title'] = $arrInfo['title'];
		$arrInsert['model'] =$arrModels[$arrInfo['model_id']]['model_code'];
		$arrInsert['origin'] =$arrInfo['service_id'];
	}elseif ($type=='work'){
		$arrInfo = db_factory::get_one(sprintf('select * from %s where work_id = %d',TABLEPRE.'witkey_task_work',$id));
		$arrTaskInfo = db_factory::get_one(sprintf('select * from %s where task_id = %d',TABLEPRE.'witkey_task',$arrInfo['task_id']));
		$arrInsert['type'] = 'work';
		$arrInsert['id'] =$arrInfo['work_id'];
		$arrInsert['title'] = $arrTaskInfo['task_title'].'的稿件';
		$arrInsert['model'] =$arrModels[$arrTaskInfo['model_id']]['model_code'];
		$arrInsert['origin'] =$arrTaskInfo['task_id'];
	}
	$objFavoriteT = keke_table_class::get_instance('witkey_favorite');
		$arrFd['keep_type'] = $arrInsert['type'];
		$arrFd['obj_type'] = $arrInsert['model'];
		$arrFd['origin_id'] = $arrInsert['origin'];
		$arrFd['obj_id'] = $arrInsert['id'];
		$arrFd['obj_name'] = $arrInsert['title'];
		$arrFd['uid'] = intval($gUid);
		$arrFd['username'] = $gUsername;
		$arrFd['on_date'] = time();
		$objFavoriteT->save($arrFd);
		kekezu::show_msg ( '收藏成功', NULL, NULL, NULL, 'ok' );
	}
}elseif($op=='del'){
	$objFavoriteT = new Keke_witkey_favorite_class();
	$objFavoriteT->setWhere('uid = '.intval($gUid).' and obj_id = '.intval($id).' and keep_type= "'.$type.'"');
	$objFavoriteT->del_keke_witkey_favorite();
	kekezu::show_msg ( '取消关注成功', NULL, NULL, NULL, 'ok' );
}
die();