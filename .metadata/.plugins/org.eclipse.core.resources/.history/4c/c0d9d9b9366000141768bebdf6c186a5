<?php
(defined ( "IN_KEKE" ) || defined ( 'ADMIN_KEKE' )) or die ( "Access Denied" );
class keke_core_class extends keke_base_class {
	public static function route_output() {
		return array (
				'close',
				'sellerlist',
				'seller',
				'oauthregister',
				'case',
				'oauthlogin',
				'login',
				'ajax',
				'index',
				'register',
				'login',
				'logout',
				'help',
				'helplist',
				'helpinfo',
				'message',
				'user',
				'space',
				'task',
				'tasklist',
				'shop',
				'shoplist',
				'footer',
				'agreement',
				'report',
				'prom',
				'reset_email',
				'avatar',
				'recharge',
				'pay',
				'browser',
				'shop_release',
				'service',
				'article',
				'articlelist',
				'article',
				'activating',
				'link',
				'single',
				'callbacksina',
				'callbackqq',
				'callbackdb',
				'callbackrenren',
				'callbackten',
				'pubtask',
				'taskcomment',
				'taskhandle',
				'goodslist',
				'yepay',
				'retrieve',
				'pubgoods',
				'payitem',
				'goods',
				'mark',
				'test',
				'order',
				'suggest',
				'error',
				'gy'
		);
	}
	static function admin_show_msg($title = "", $url = "", $time = 3, $content = "", $type = "info") {
		global $_K, $_lang;
		$url ? $url : $_K ['refer'];
		require keke_tpl_class::template ( 'admin/tpl/show_msg' );
		die ();
	}
	static function show_msg($title = "", $url = "", $time = 3, $content = "", $type = 'info') {
		global $_K, $basic_config, $username, $uid, $nav_list, $_lang, $strWebLogo, $task_open, $shop_open, $indus_arr, $arrTopIndus, $indus_goods_arr, $indus_task_arr;
		$msgtype = $type;
		if (isset ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) && strtolower ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest') {
			if ($msgtype == 'ok') {
				$json = array (
						'status' => 'success',
						'data' => $title,
						'url' => $url
				);
			} elseif ($msgtype == 'error') {
				$json = array (
						'status' => 'error',
						'data' => $title
				);
			} else {
				$json = array (
						'status' => 'fail',
						'data' => $title,
						'url' => $url
				);
			}
			if (strtoupper ( CHARSET ) == 'GBK') {
				$json = kekezu::gbktoutf ( $json );
			}
			echo json_encode ( $json );
		} else {
			require keke_tpl_class::template ( 'error' );
		}
		unset ( $json, $_K, $basic_config, $username, $uid, $nav_list, $_lang, $strWebLogo, $task_open, $shop_open, $indus_arr, $arrTopIndus, $indus_goods_arr, $indus_task_arr );
		die ();
	}
	static function admin_check_role($roleid) {
		global $_K, $admin_info;
		$grouplist_arr = keke_admin_class::get_user_group ();
		if ($_SESSION ['auid'] != ADMIN_UID && ! in_array ( $roleid, $grouplist_arr [$admin_info ['group_id']] ['group_roles'] )) {
			echo "<script>location.href='index.php?do=main'</script>";
			die ();
		}
	}
	static function empty_cache() {
		global $kekezu;
		$file_obj = new keke_file_class ();
		TPL_CACHE and $file_obj->delete_files ( S_ROOT . "/data/tpl_c" );
		if (IS_CACHE === true) {
			$kekezu->_cache_obj->gc ();
		}
	}
	static function get_cash_consume($total) {
		global $kekezu, $user_info;
		$tmp = array ();
		$credit_allow = $kekezu->_sys_config ['credit_is_allow'];
		$ba = $user_info ['balance'];
		$cr = $user_info ['credit'];
		switch ($credit_allow) {
			case "1" : 
				if ($cr >= $total) {
					$credit = $total;
					$cash = 0;
				} else {
					$credit = $cr;
					$ba >= $total - $cr and $cash = $total - $cr or $cash = - 1;
				}
				break;
			case "2" : 
				if ($ba >= $total) {
					$cash = $total;
				} else {
					$cash = - 1;
				}
				$credit = 0;
				break;
		}
		$tmp ['cash'] = floatval ( $cash );
		$tmp ['credit'] = floatval ( $credit );
		return $tmp;
	}
	static function reset_secode_session($verify) {
		global $uid;
		if ($verify) {
			unset ( $_SESSION ['check_secode_' . $uid] );
			return TRUE;
		} else {
			if ($_SESSION ['check_secode_' . $uid]) { 
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}
	static function get_window_url() {
		global $_K;
		$post_url = $_SERVER ['QUERY_STRING'];
		preg_match ( '/(.*)&infloat/U', $post_url, $match );
		return $_K ['siteurl'] . '/index.php?' . $match ['1'];
	}
	static function admin_system_log($msg) {
		global $_K, $admin_info;
		$system_log_obj = new Keke_witkey_system_log_class();
		$system_log_obj->setLog_content ( $msg );
		$system_log_obj->setLog_ip ( kekezu::get_ip () );
		$system_log_obj->setLog_time ( time () );
		$system_log_obj->setUser_type ( $admin_info ['group_id'] );
		$system_log_obj->setUid ( $admin_info ['uid'] ? $admin_info ['uid'] : $_SESSION ['uid'] );
		$system_log_obj->setUsername ( $admin_info ['username'] ? $admin_info ['username'] : $_SESSION ['username'] );
		$system_log_obj->create_keke_witkey_system_log ();
	}
	static function admin_crawl_epweike($start_id, $end_id) {
		global $_K, $admin_info;

		//error_reporting(E_ALL);
		ini_set(“max_execution_time”,18000); 
		set_time_limit(18000);
		for($current_id = $start_id; $current_id <= $end_id; $current_id ++) {
			
			//echo $current_id;
			// 初始化一个 cURL 对象
			$curl = curl_init();
			
			//epweike
			$site_name = 'epweike';
			
			//task_id，循环
			$task_id = $current_id;
			//$task_id_str = $task_id;
			$final_url = 'http://www.epweike.com/task/'.$task_id.'/';
			
			// 设置你需要抓取的URL
			//http://www.epweike.com/index.php?do=task&view=info&task_id=304708
			curl_setopt($curl, CURLOPT_URL, $final_url);
			
			// 设置header
			curl_setopt($curl, CURLOPT_HEADER, 1);
			
			// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			
			// 运行cURL，请求网页
			$data = curl_exec($curl);
			
			// 关闭URL请求
			curl_close($curl);
			
			// 显示获得的数据
			///var_dump($data);
			//$data;
			
			//拆解task name，task_catagory, skill 从以下的唯一语句来拆解
			//<title>服装公司起名_品牌起名_起名取名_一品威客网</title>
			$task_content = stristr($data,"<title>");
			$startpos = strlen("<title>");
			$length = stripos($task_content, "_") - $startpos;
			$task_name = substr($task_content,$startpos,$length);
			$task_name = strip_tags($task_name);
			//echo "task_name=".$task_name."<br>";
			
			$task_content = substr($task_content,stripos($task_content, "_")+1, stripos($task_content, "</title>"));
			$startpos = 0;
			$length = stripos($task_content, "_");
			$task_catagory = substr($task_content, $startpos, $length);
			$task_catagory = strip_tags($task_catagory);
			//echo "task_catagory=".$task_catagory."<br>";
			
			$task_content = substr($task_content,stripos($task_content, "_")+1, stripos($task_content, "</title>"));
			$startpos = 0;
			$length = stripos($task_content, "_");
			$skill = substr($task_content, $startpos, $length);
			$skill = strip_tags($skill);
			//echo "skill=".$skill."<br>";
			
			//拆解task_type，budget
			//<span class="nummoney f_l">悬赏单人<span>￥&nbsp;100</span></span> 
			$task_content = stristr($data,"<span class=\"nummoney f_l\">");
			$startpos = strlen("<span class=\"nummoney f_l\">");
			$length = stripos($task_content, "<span>")-$startpos;
			$task_type = substr($task_content,$startpos,$length);
			$task_type = strip_tags($task_type);
			//echo "task_type=".$task_type."<br>";
			
			$task_content=stristr($task_content,"￥&nbsp;");
			$startpos = strlen("￥&nbsp;");
			$length = stripos($task_content, "</span>")-$startpos;
			$budget = substr($task_content,$startpos,$length);
			$budget = strip_tags($budget);
			//echo "budget=".$budget."<br>";
			
			//拆解task_status
			//<span class="icon_clock"></span>&nbsp;
			//<span class="c666">
			//<span>任务失败</span>
			$task_content = stristr($data,"<span class=\"icon_clock\"></span>");
			$task_content = stristr($task_content,"<span class=\"c666\">");
			$startpos = strlen("<span class=\"c666\">");
			$length = stripos($task_content, "</span>")-$startpos;
			$task_status = substr($task_content,$startpos,$length);
			$task_status = strip_tags($task_status);
			//echo "task_status=".$task_status."<br>";
			
			//拆解task_overview
			//<div class="task_descript">
			//<p>生鲜蔬菜超市LOGO设计，想做成连锁超市。名字是 奥蔬唛  我们有合作农场都是 专业化的 种植 技术  倡导绿色、健康、新鲜、原生态</p><p> LOGO要简洁、易记、应用与广告、印刷、门头制作、衣服、运输车、等方便推广</p><p><br /></p></div>
			//</div>
			//<div class="taksttips">
			//<p>温馨提示：请不要轻信需要交钱（报名费、会员费之类）才能承接的任务。如有遇到请第一时间联系客服。</p> 
			//<p>收费需知：招标任务、雇佣任务和直接雇佣任务收取技术服务费，普通威客2%，VIP威客1%。</p> 
			//</div>
			//<div class="taskper clearfix">
			$task_content = stristr($data,"<div class=\"task_descript\">");
			$startpos = strlen("<div class=\"task_descript\">");
			$length = stripos($task_content, "<div class=\"taskper clearfix\">")-$startpos;
			$task_overview = substr($task_content,$startpos,$length);
			$task_overview = strip_tags($task_overview);
			//echo "task_overview=".$task_overview."<br>";
			
			
			//拆解task_detail
			$task_detail = $task_overview;
			
			
			//拆解start_date
			//<div class="c999">&nbsp;<span><a href="http://www.epweike.com/home/874720/" target="_blank">常乐常乐</a></span>&nbsp;发布于&nbsp; 2014-09-07 10:59:54</div>
			$task_content = stristr($data,"发布于&nbsp; ");
			$startpos = strlen("发布于&nbsp; ");
			$length = stripos($task_content, "</div>")-$startpos;
			$start_date = substr($task_content,$startpos,$length);
			$start_date = strip_tags($start_date);
			//echo "start_date=".$start_date."<br>";
			
			//拆解end_date
			//找不到
			$end_date="";
			
			$crawl_obj = new Keke_witkey_crawl_class();
			$crawl_obj->setSite_name ( $site_name );
			$crawl_obj->setTask_id ( $task_id );
			$crawl_obj->setTask_name ( $task_name );
			$crawl_obj->setTask_catagory ( $task_catagory );
			$crawl_obj->setTask_type ( $task_type );
			$crawl_obj->setTask_status ( $task_status );
			$crawl_obj->setTask_overview ( $task_overview );
			$crawl_obj->setTask_detail ( $task_detail );
			$crawl_obj->setStart_date ( $start_date );
			$crawl_obj->setEnd_date ( $end_date );
			$crawl_obj->setBudget( $budget );
			$crawl_obj->setSkill( $skill );
			$crawl_obj->create_keke_witkey_crawl ();
		}
		ini_set(“max_execution_time”,120);
		set_time_limit(120);
	}
	static function admin_crawl_zhubajie($start_id, $end_id) {
		global $_K, $admin_info;
	
		error_reporting(E_ALL);
		ini_set(“max_execution_time”,18000);
		set_time_limit(18000);
		for($current_id = $start_id; $current_id <= $end_id; $current_id ++) {
				
			//echo $current_id;
			// 初始化一个 cURL 对象
			$curl = curl_init();
				
			//epweike
			$site_name = 'zhubajie';
				
			//task_id，循环
			$task_id = $current_id;
			//$task_id_str = $task_id;
			$final_url = 'http://task.zhubajie.com/'.$task_id.'/';
				
			// 设置你需要抓取的URL
			//http://www.epweike.com/index.php?do=task&view=info&task_id=304708
			curl_setopt($curl, CURLOPT_URL, $final_url);
				
			// 设置header
			curl_setopt($curl, CURLOPT_HEADER, 1);
				
			// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				
			// 运行cURL，请求网页
			$data = curl_exec($curl);
				
			// 关闭URL请求
			curl_close($curl);
				
			// 显示获得的数据
			///var_dump($data);
			//$data;
				
			//拆解task name，task_catagory, skill 从以下的唯一语句来拆解
			//<title>淘宝浏览任务，5元一稿，人数不限-淘宝店铺推广-网店推广 -猪八戒网</title>
			$task_content = stristr($data,"<title>");
			$startpos = strlen("<title>");
			$length = stripos($task_content, "-") - $startpos;
			$task_name = substr($task_content,$startpos,$length);
			$task_name = strip_tags($task_name);
			//echo "task_name=".$task_name."<br>";
				
			$task_content = substr($task_content,stripos($task_content, "-")+1, stripos($task_content, "</title>"));
			$startpos = 0;
			$length = stripos($task_content, "-");
			$task_catagory = substr($task_content, $startpos, $length);
			$task_catagory = strip_tags($task_catagory);
			//echo "task_catagory=".$task_catagory."<br>";
				
			$task_content = substr($task_content,stripos($task_content, "-")+1, stripos($task_content, "</title>"));
			$startpos = 0;
			$length = stripos($task_content, "-");
			$skill = substr($task_content, $startpos, $length);
			$skill = strip_tags($skill);
			//echo "skill=".$skill."<br>";
				
			//拆解task_type，budget，
			// <div class="fl money-operate">
            // <p class="fl"><em>悬赏</em><u>￥<span id="priceComp">750.00</span></u>
			// </u><span class="ydanbao ml10 tips_hover" tips_text="猪八戒担保交易，保障您的资金安全">已托管：<i class="orange1">￥750.00</i></span></p></div>
			$task_content = stristr($data,"<div class=\"fl money-operate\">");
			$task_content = stristr($data,"<em>");
			$startpos = strlen("<em>");
			$length = stripos($task_content, "</em>")-$startpos;
			$task_type = substr($task_content,$startpos,$length);
			$task_type = strip_tags($$task_type);
			//echo "task_type=".$task_type."<br>";
				
			$task_content=stristr($task_content,"￥<span id=\"priceComp\">");
			$startpos = strlen("￥<span id=\"priceComp\">");
			$length = stripos($task_content, "</span>")-$startpos;
			$budget = substr($task_content,$startpos,$length);
			$budget = strip_tags($budget);
			//echo "budget=".$budget."<br>";
			
			//拆解task_status
			// <p class="o-time " tips_text="如超期未选标将社会化选标<a href='http://chengxin.zhubajie.com/report/rule-g-2326' target='_blank'>了解详情</a>">参与进行中：剩余<em>4天12小时38分46秒</em></p>
			// 或者 <p class="o-time over-time">交易完成</p>
			$task_content = stristr($data,"<p class=\"o-time");
			$task_content = stristr($task_content,"\">");
			$startpos = strlen("\">");
			$length = stripos($task_content, "</p>")-$startpos;
			$task_status = substr($task_content,$startpos,$length);
			$task_status = strip_tags($task_status);
			//echo "task_status=".$task_status."<br>";
				
			//拆解task_overview
			//<div class="user-con" id="work-more">
            //<p><strong>需求号：4558504</strong></p>
            //<div class="task_content" work-map="work-short"><h3>具体要求：</h3>有淘宝号，注册半年以上，实名认证,两心以上信用，卖家号不要，没有违规记录，虚假交稿和抄袭的投诉到底<br />任务5元一稿，通过猪八戒支付<br />要求做事有责任心，马虎没有耐心的请绕道<br />详情请看附件</div>
			$task_content = stristr($data,"<div class=\"task_content\" work-map=\"work-short\">");
			$startpos = strlen("<div class=\"task_content\" work-map=\"work-short\">");
			$length = stripos($task_content, "</div>")-$startpos;
			$task_overview = substr($task_content,$startpos,$length);
			$task_overview = strip_tags($task_overview);
			//echo "task_overview=".$task_overview."<br>";
				
			//拆解task_detail
			$task_detail = $task_overview;
				
			//拆解start_date
// 			<span class="stepno"><span class="gou"></span></span>
//                 <p>发布需求，托管赏金<br/>2014.09.04</p>
//             </li>
//                     <li class="">
//                                 <span class="stepno"><span class="gou"></span></span>
//                 <p>服务商交稿<br/>2014.09.11</p>
//             </li>
//                     <li class="">
//                                 <span class="stepno"><span class="gou"></span></span>
//                 <p>雇主设置合格稿件<br/>2014.09.18</p>
//             </li>
//                     <li class="cur">
//                                 <span class="stepno"><span class="gou"></span></span>
//                 <p>交易成功，余额100%退回<br/>2014.09.18</p>
			$task_content = stristr($data,"<span class=\"stepno\">");
			$task_content = stristr($task_content,"<br/>");
			$startpos = strlen("<br/>");
			$length = stripos($task_content, "</p>")-$startpos;
			$start_date = substr($task_content,$startpos,$length);
			$start_date = strip_tags($start_date);
			//echo "start_date=".$start_date."<br>";
			
			$task_content = substr($task_content,strlen("<br/>"),strlen($task_content)-strlen("<br/>"));
			$task_content = stristr($task_content,"<br/>");
			$task_content = substr($task_content,strlen("<br/>"),strlen($task_content)-strlen("<br/>"));
			$task_content = stristr($task_content,"<br/>");
			$task_content = substr($task_content,strlen("<br/>"),strlen($task_content)-strlen("<br/>"));
			$task_content = stristr($task_content,"<br/>");
			$startpos = strlen("<br/>");
			$length = stripos($task_content, "</p>")-$startpos;
			$end_date = substr($task_content,$startpos,$length);
			$end_date = strip_tags($end_date);
			//echo "end_date=".$end_date."<br>";
			
			//payment_type
			//<div class="taskmode-inline" id="reward-all">
			// 赏金分配：<em class="gray6">计件，每个￥45.00，已选0个，还需要5个</em>
            //<span class="gray6">每名服务商最多交<em class="orange">10</em>个稿件。</span>
			$task_content = stristr($data,"<div class=\"taskmode-inline\" id=\"reward-all\">");
			$startpos = strlen("<div class=\"taskmode-inline\" id=\"reward-all\">");
			$length = stripos($task_content, "</em>")-$startpos;
			$payment_type = substr($task_content,$startpos,$length);
			$payment_type = strip_tags($payment_type);
			//echo "payment_type=".$payment_type."<br>";
			
						
			$crawl_obj = new Keke_witkey_crawl_class();
			$crawl_obj->setSite_name ( $site_name );
			$crawl_obj->setTask_id ( $task_id );
			$crawl_obj->setTask_name ( $task_name );
			$crawl_obj->setTask_catagory ( $task_catagory );
			$crawl_obj->setTask_type ( $task_type );
			$crawl_obj->setTask_status ( $task_status );
			$crawl_obj->setTask_overview ( $task_overview );
			$crawl_obj->setTask_detail ( $task_detail );
			$crawl_obj->setStart_date ( $start_date );
			$crawl_obj->setEnd_date ( $end_date );
			$crawl_obj->setBudget( $budget );
			$crawl_obj->setSkill( $skill );
			$crawl_obj->create_keke_witkey_crawl ();
			}
			ini_set(“max_execution_time”,120);
			set_time_limit(120);			
		}
	static function admin_crawl_taskcn($start_id, $end_id) {
		global $_K, $admin_info;
	
		error_reporting(E_ALL);
		ini_set(“max_execution_time”,18000);
		set_time_limit(18000);
		for($current_id = $start_id; $current_id <= $end_id; $current_id ++) {
	
			//echo $current_id;
			// 初始化一个 cURL 对象
			$curl = curl_init();
	
			//epweike
			$site_name = 'taskcn';
	
			//task_id，循环
			$task_id = $current_id;
			//$task_id_str = $task_id;
			$final_url = 'http://www.taskcn.com/w-'.$task_id.'.html';
	
			// 设置你需要抓取的URL
			//http://www.taskcn.com/w-91128.html
			curl_setopt($curl, CURLOPT_URL, $final_url);
	
			// 设置header
			curl_setopt($curl, CURLOPT_HEADER, 1);
	
			// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
			// 运行cURL，请求网页
			$data = curl_exec($curl);
	
			// 关闭URL请求
			curl_close($curl);
	
			// 显示获得的数据
			///var_dump($data);
			//$data;
	
			//拆解task name，task_catagory, skill 从以下的唯一语句来拆解
			//<title>印务公司LOGO设计_任务威客网_Logo、VI、标志设计</title>
			$task_content = stristr($data,"<title>");
			$startpos = strlen("<title>");
			$length = stripos($task_content, "_") - $startpos;
			$task_name = substr($task_content,$startpos,$length);
			$task_name = strip_tags($task_name);
			//echo "task_name=".$task_name."<br>";
	
			$task_content = substr($task_content,stripos($task_content, "_")+1, stripos($task_content, "</title>")-stripos($task_content, "_")-1);
			//echo "task_content=".$task_content."<br>";			
			$task_catagory = substr($task_content,stripos($task_content, "_")+1, strlen($task_content)-stripos($task_content, "_")-1);
			$task_catagory = strip_tags($task_catagory);
			//echo "task_catagory=".$task_catagory."<br>";
	
			//拆解task_type，budget，
			//<div class="taskmoneyitem f12 bgreyline grey666">中标模式：单人中标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公示剩余时间：&nbsp;&nbsp;1天1小时</div>
			$task_content = stristr($data,"中标模式：");
			$startpos = strlen("中标模式：");
			$length = stripos($task_content, "&nbsp;")-$startpos;
			$task_type = substr($task_content,$startpos,$length);
			$task_type = strip_tags($task_type);
			//echo "task_type=".$task_type."<br>";
			
			//<div class="taskmoneyitem f12 bgreyline grey666">中标所得：200.00元(任务金额) × 80% = <strong class="redF00 f16 fwb">160.00</strong> 元</div>
			$task_content=stristr($data,"<strong class=\"redF00 f16 fwb\">");
			$startpos = strlen("<strong class=\"redF00 f16 fwb\">");
			$length = stripos($task_content, "</strong>")-$startpos;
			$budget = substr($task_content,$startpos,$length);
			$budget = strip_tags($budget);
			//echo "budget=".$budget."<br>";
				
			//拆解task_status
			// <div class="tasktimealarmitem02 f12">		
			//此任务已经结束，中标作品已经产生。还有<img src="http://image.taskcn.com/images/share200807/icon/alarmclock.gif" /><strong class="orangeF60">0天0小时</strong>此任务<a href='http://help.taskcn.com/help/guzhubangzhu/weikerenwuqu/73.html'>公示</a>结束。
			//			</div>
			$task_content = stristr($data,"<div class=\"tasktimealarmitem02 f12\">");
			$startpos = strlen("<div class=\"tasktimealarmitem02 f12\">");
			$length = stripos($task_content, "</div>")-$startpos;
			$task_status = substr($task_content,$startpos,$length);
			$task_status = strip_tags($task_status);
			//echo "task_status=".$task_status."<br>";
	
			//拆解task_overview
			//<div class="taskdescription f12 bgreyline">
			//<h1 style="font:900 14px/1.6 Arial, Helvetica, sans-serif;">印务公司LOGO设计</h1>
			//<p><p>公司名称：福州旭彩印务有限公司<br /><br />公司网址：www.xvcai.cn（备案中）<br /><br /><br /><br />旭 释义：光明，早晨太阳才出来的样子：旭日东升<br /><br />彩 彩色<br /><br /><br />标志要设计彩色版和单色版本<br /><br /><br />标志可以参考戴斯酒店的标志和附件中的标志<br /><br />颜色以印刷CMYK表达</p></p>
			//	</div>
			$task_content = stristr($data,"<div class=\"taskdescription f12 bgreyline\">");
			$startpos = strlen("<div class=\"taskdescription f12 bgreyline\">");
			$length = stripos($task_content, "</div>")-$startpos;
			$task_overview = substr($task_content,$startpos,$length);
			$task_overview = strip_tags($task_overview);
			//echo "task_overview=".$task_overview."<br>";
	
			//拆解task_detail
			$task_detail = $task_overview;
	
			//拆解start_date
			//<div class="tasktimeshow f12 grey666">任务开始时间：<span class="f10 orangeF60">2014-06-27 13:15</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;任务结束时间：<span class="f10 orangeF60">2014-07-30 09:15</span></div> 
			$task_content = stristr($data,"任务开始时间：<span class=\"f10 orangeF60\">");
			$startpos = strlen("任务开始时间：<span class=\"f10 orangeF60\">");
			$length = stripos($task_content, "</span>")-$startpos;
			$start_date = substr($task_content,$startpos,$length);
			$start_date = strip_tags($start_date);
			//echo "start_date=".$start_date."<br>";
			
			If (strstr($task_content, "任务结束时间：<span class=\"f10 orangeF60\">")) {
				$task_content = stristr($task_content,"任务结束时间：<span class=\"f10 orangeF60\">");
				$startpos = strlen("任务结束时间：<span class=\"f10 orangeF60\">");
			} else {
				$task_content = stristr($task_content,"任务截止时间：<span class=\"f10 orangeF60\">");
				$startpos = strlen("任务截止时间：<span class=\"f10 orangeF60\">");
			}
			$length = stripos($task_content, "</span>")-$startpos;
			$end_date = substr($task_content,$startpos,$length);
			$end_date = strip_tags($end_date);
			//echo "end_date=".$end_date."<br>";
				
			//payment_type
	
			$crawl_obj = new Keke_witkey_crawl_class();
			$crawl_obj->setSite_name ( $site_name );
			$crawl_obj->setTask_id ( $task_id );
			$crawl_obj->setTask_name ( $task_name );
			$crawl_obj->setTask_catagory ( $task_catagory );
			$crawl_obj->setTask_type ( $task_type );
			$crawl_obj->setTask_status ( $task_status );
			$crawl_obj->setTask_overview ( $task_overview );
			$crawl_obj->setTask_detail ( $task_detail );
			$crawl_obj->setStart_date ( $start_date );
			$crawl_obj->setEnd_date ( $end_date );
			$crawl_obj->setBudget( $budget );
			$crawl_obj->setSkill( $skill );
			$crawl_obj->create_keke_witkey_crawl ();
		}
		ini_set(“max_execution_time”,120);
		set_time_limit(120);
	}
	static function admin_crawl_680com($start_id, $end_id) {
		global $_K, $admin_info;
	
		error_reporting(E_ALL);
		ini_set(“max_execution_time”,18000);
		set_time_limit(18000);
		for($current_id = $start_id; $current_id <= $end_id; $current_id ++) {
	
			//echo $current_id;
			// 初始化一个 cURL 对象
			$curl = curl_init();
	
			//epweike
			$site_name = '680com';
	
			//task_id，循环
			$task_id = $current_id;
			//echo $task_id;
			//$task_id_str = $task_id;
			$final_url = 'http://www.680.com/'.$task_id.'.html';
	
			// 设置你需要抓取的URL
			//http://www.680.com/293072.html
			curl_setopt($curl, CURLOPT_URL, $final_url);
	
			// 设置header
			curl_setopt($curl, CURLOPT_HEADER, 1);
	
			// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
			// 运行cURL，请求网页
			$data = curl_exec($curl);
			$data = mb_convert_encoding($data, "utf-8", "gb2312");
			//echo $data;
	
			// 关闭URL请求
			curl_close($curl);
	
			// 显示获得的数据
			///var_dump($data);
			//$data;
	
			//拆解task name，skill 从以下的唯一语句来拆解
			//<title>手机wap站前端制作_网页设计_时间财富网</title>
			$task_content = stristr($data,"<title>");
			$startpos = strlen("<title>");
			$length = stripos($task_content, "_") - $startpos;
			$task_name = substr($task_content,$startpos,$length);
			$task_name = strip_tags($task_name);
			//echo "task_name=".$task_name."<br>";
	
			$task_content = substr($task_content,stripos($task_content, "_")+1, stripos($task_content, "</title>"));
			$startpos = 0;
			$length = stripos($task_content, "_");
			$task_catagory = substr($task_content, $startpos, $length);
			$task_catagory = strip_tags($task_catagory);
			//echo "task_catagory=".$task_catagory."<br>";
	
			//拆解task_type，budget，
			//<div class="xsmsok tipr" title="全额悬赏模式：雇主已先行托管全额悬赏到时间财富网"></div>
			$task_content = stristr($data,"<div class=\"xsmsok tipr\" title=\"");
			$startpos = strlen("<div class=\"xsmsok tipr\" title=\"");
			$length = stripos($task_content, "\"></div>")-$startpos;
			$task_type = substr($task_content,$startpos,$length);
			$task_type = strip_tags($task_type);
			//echo "task_type=".$task_type."<br>";
	
			//<span class="it-mon">￥3000</span>
			$task_content=stristr($task_content,"<span class=\"it-mon\">￥");
			$startpos = strlen("<span class=\"it-mon\">￥");
			$length = stripos($task_content, "</span>")-$startpos;
			$budget = substr($task_content,$startpos,$length);
			$budget = strip_tags($budget);
			//echo "budget=".$budget."<br>";
				
			//拆解task_status
			//<div class="jc-3 tipb" title="项目状态：<font color=blue><b>悬赏结束，雇主评标中</b></font>"></div>
			$task_content = stristr($data,"<div class=\"jc-3 tipb\" title=\"项目状态：<font color=blue><b>");
			$startpos = strlen("<div class=\"jc-3 tipb\" title=\"项目状态：<font color=blue><b>");
			$length = stripos($task_content, "</b>")-$startpos;
			$task_status = substr($task_content,$startpos,$length);
			$task_status = strip_tags($task_status);
			//echo "task_status=".$task_status."<br>";
	
			//拆解task_overview
			//<div class="itc-con">
            //<br /><br />
			//<div>已有web，正在建设wap站，因人手问题，需要将部分wap页面UI设计及切图工作外包，要求如下：<br />1）已出页面UE，需根据UE制作wap站的前端；<br />2）前端包括html页面、CSSS等，包含页面交互的制作；<br />3）最终交付的html需要自能够适应安卓及iphone手机；<br />4）风格需与本站其他wap页面风格一致；<br />5）提供原网站参考；<br />6）最终交付物为html文件；<br />7）页面为二十张左右；<br />8）要求10天内交付；<br />9）价格为150元/页面<br />10）投标的时候请做一个页面让我们进行评选；<br />11）如各方面合适，后继会有其他UI的外包工作； <br /></div><br /><br />
			//<div><span style="font-family:宋体;color:#333333;FONT-SIZE: 10.5pt">如需咨询，可联系QQ:&nbsp;2745218796（加QQ时注明：手机wap站前端制作）</span></div>
            //</div>
			$task_content = stristr($data,"<div class=\"itc-con\">");
			$startpos = strlen("<div class=\"itc-con\">");
			$length = stripos($task_content, "</div>")-$startpos;
			$task_overview = substr($task_content,$startpos,$length);
			$task_overview = strip_tags($task_overview);
			//echo "task_overview=".$task_overview."<br>";
	
			//拆解task_detail
			$task_detail = $task_overview;
	
			//拆解start_date
			// 			<li>开始时间：2014-9-17 15:17:00</li>
            //          <li class="red">结束时间：2014-9-27 15:17:00</li>
			$task_content = stristr($data,"开始时间：");
			$startpos = strlen("始时间：");
			$length = stripos($task_content, "</li>")-$startpos;
			$start_date = substr($task_content,$startpos,$length);
			//echo "start_date=".$start_date."<br>";
				
			$task_content = stristr($data,"结束时间：");
			$startpos = strlen("结束时间：");
			$length = stripos($task_content, "</li>")-$startpos;
			$end_date = substr($task_content,$startpos,$length);
			//echo "end_date=".$end_date."<br>";
	
			$crawl_obj = new Keke_witkey_crawl_class();
			$crawl_obj->setSite_name ( $site_name );
			$crawl_obj->setTask_id ( $task_id );
			$crawl_obj->setTask_name ( $task_name );
			$crawl_obj->setTask_catagory ( $task_catagory );
			$crawl_obj->setTask_type ( $task_type );
			$crawl_obj->setTask_status ( $task_status );
			$crawl_obj->setTask_overview ( $task_overview );
			$crawl_obj->setTask_detail ( $task_detail );
			$crawl_obj->setStart_date ( $start_date );
			$crawl_obj->setEnd_date ( $end_date );
			$crawl_obj->setBudget( $budget );
			$crawl_obj->setSkill( $skill );
			$crawl_obj->create_keke_witkey_crawl ();
		}
		ini_set(“max_execution_time”,120);
		set_time_limit(120);
	}
	static function admin_crawl_crowdworks($start_id, $end_id) {
		global $_K, $admin_info;
	
		error_reporting(E_ALL);
		ini_set(“max_execution_time”,18000);
		set_time_limit(18000);
		for($current_id = $start_id; $current_id <= $end_id; $current_id ++) {
	
			//echo $current_id;
			// 初始化一个 cURL 对象
			$curl = curl_init();
	
			//epweike
			$site_name = 'crowdworks';
	
			//task_id，循环
			$task_id = $current_id;
			//$task_id_str = $task_id;
			$final_url = 'http://crowdworks.jp/public/jobs/'.$task_id;
	
			// 设置你需要抓取的URL
			//http://crowdworks.jp/public/jobs/155438
			curl_setopt($curl, CURLOPT_URL, $final_url);
	
			// 设置header
			curl_setopt($curl, CURLOPT_HEADER, 1);
	
			// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
			// 运行cURL，请求网页
			$data = curl_exec($curl);
	
			// 关闭URL请求
			curl_close($curl);
	
			// 显示获得的数据
			///var_dump($data);
			//$data;
	
			//拆解task name，task_catagory, skill 从以下的唯一语句来拆解
			//<title>急成長WEBサービス（B2B）の保守・運用担当者（長期...の依頼/外注｜サイト構築・ウェブ開発の仕事 [ID:155438]</title>
			$task_content = stristr($data,"<title>");
			$startpos = strlen("<title>");
			$length = stripos($task_content, "｜") - $startpos;
			$task_name = substr($task_content,$startpos,$length);
			$task_name = strip_tags($task_name);
			//echo "task_name=".$task_name."<br>";

			$task_content = stristr($task_content,"｜");
			$startpos = strlen("｜");
			$length = stripos($task_content, "[ID:")-$startpos;
			$task_catagory = substr($task_content,$startpos,$length);
			$task_catagory = strip_tags($task_catagory);
			//echo "task_catagory=".$task_catagory."<br>";
						
			//拆解task_type，budget，
			//<th>支払い方式</th>
        	//<td>固定報酬制</td>
          	//<th>予算</th>
          	//<td>
            //100,000円 〜 300,000円
          	//</td>
          	//or
            //<th>単価</th>
            //<td>
            //5円 / 件
            //</td>
			$task_content = stristr($data,"<th>支払い方式</th>");
			$startpos = strlen("<th>支払い方式</th>\r\n<td>");
			$length = stripos($task_content, "</td>")-$startpos;
			$task_type = substr($task_content,$startpos,$length);
			$task_type = strip_tags($task_type);
			//echo "task_type=".$task_type."<br>";
			
			If (strstr($task_content, "予算"))
			{
				$task_content=stristr($task_content,"<th>予算</th>");
				$startpos = strlen("<th>予算</th>\r\n<td>");
				$length = stripos($task_content, "</td>")-$startpos;
			} else {
				$task_content=stristr($task_content,"<th>単価</th>");
				$startpos = strlen("<th>単価</th>\r\n<td>");
				$length = stripos($task_content, "</td>")-$startpos;
			}
			$budget = substr($task_content,$startpos,$length);
			$budget = strip_tags($budget);
			//echo "budget=".$budget."<br>";
	
			//skill
			//<th>必要なスキル</th>
			//<td colspan="3">
			//<ul class="cw-tags skills" style="margin-bottom: -4px;">
			//    <li><a href="/public/jobs/skill/24">PHP</a></li>
			//    <li><a href="/public/jobs/skill/9">JavaScript (jQuery)</a></li>
			//    <li><a href="/public/jobs/skill/8">JavaScript</a></li>
			//    <li><a href="/public/jobs/skill/3">HTML</a></li>
			//</ul>
			//</td>
			$task_content = stristr($data,"<th>必要なスキル</th>");
			$startpos = strlen("<th>必要なスキル</th>");
			$length = stripos($task_content, "</td>")-$startpos;
			$skill = substr($task_content,$startpos,$length);
			$skill = strip_tags($skill);
			//echo "skill=".$skill."<br>";
			
			//拆解task_status
			//<strong><span class="icon-warning-sign"></span> このお仕事の募集は終了しています。</strong>
			$task_content = stristr($data,"<strong><span class=\"icon-warning-sign\"></span> このお仕事の募集は終了しています。");
			$startpos = strlen("<strong><span class=\"icon-warning-sign\"></span> ");
			$length = stripos($task_content, "</strong>")-$startpos;
			$task_status = substr($task_content,$startpos,$length);
			$task_status = strip_tags($task_status);
			//echo "task_status=".$task_status."<br>";

			//拆解task_overview
			//<section class="cw-section  job_summary">
			//<div class="cw-section_head cw-section_head_secondary">
			//<h2 class="head_inner">仕事の概要</h2>
			//</div>
			//。。。
			//</section>
			$task_content = stristr($data,"<section class=\"cw-section  job_summary\">");
			$startpos = strlen("<section class=\"cw-section  job_summary\">");
			$length = stripos($task_content, "</section>")-$startpos;
			$task_overview = substr($task_content,$startpos,$length);
			$task_overview = strip_tags($task_overview);
			//echo "task_overview=".$task_overview."<br>";

			//拆解task_detail
			//<section class="cw-section job_detail">
			//<div class="cw-section_head cw-section_head_secondary">
			//<h2 class="head_inner">仕事の詳細</h2>
			//</div>
			//<div class="post_block">
			//<div class="description">
			//<br>■自己紹介<br>ビジネス比較・発注サイト「imitsu（アイミツ）」を運営しております<br>株式会社ユニラボと申します。<br><a href="http://imitsu.jp/" target="_blank" rel="nofollow">http://imitsu.jp/</a><br><br>imitsu（アイミツ）は、当社と、株式会社リブセンス（東証一部上場）との<br>共同運営サービスで、2014年2月にオープンいたしました。<br><br>公開直後ではありますが、既に5万社以上の業者情報を掲載し、<br>BtoBのビジネスマッチングサイトとしては、圧倒的No.1の規模を誇ります。<br>おかげ様で、WBS（テレビ東京）や日本経済新聞にも取り上げて頂き、<br>開始半年時点で、発注者様よりお預かりした予算総額は10億円を超えました。<br><br>※ニュースリリースの例<br><a href="http://bizmakoto.jp/bizid/articles/1404/17/news135.html" target="_blank" rel="nofollow">http://bizmakoto.jp/bizid/articles/1404/17/news135.html</a><br><br><br>■ご依頼内容<br>当社が運営しているWEBサービスの「保守運用担当」を募集します。<br>保守運用が中心ですのでサービス立ち上げではございます。<br>既にあるサービスのプログラムコードを一通り理解して頂いた上で、<br>バグ対応や、必要に応じて新規新規機能開発も行います。<br><br>当社CTOが全体理解をしておりますが、個別サービスについては<br>エンジニア責任者となる為、責任を持ってサービス全体を理解し、<br>推進していくことが求められます。<br><br>具体的に何を担当するかは、個別のご面談の際にご相談させてください。<br><br><br>■使用するプログラミング言語/ツール<br>・PHP（LAMP環境です）<br>・HTML / CSS / JavaScript / jQuery などは必須ですが、<br>　コーディングは別な方が担当する予定ですので、基本メインは<br>　プログラミングということで想定してください。<br>・当社指定のフレームワークがございます。<br>・アジャイル開発のスタイルですので細かい要件定義書は<br>　ありません。プロデューサ・デザイナーなどと協力し合って<br>　より良いサービスを創り上げていくマインドが求められます。<br>・Git Hubは必須ですが今から学習する形でも可です。<br><br><br>&nbsp;■重要視する点について<br>・プログラム経験5年以上を求めます。<br>・新規事業に携わったことがあり、WEBサービスが好きな方を希望します。<br>　※スタートアップ界隈の情報に精通しており、サービスセンスがある方だと尚良いです。<br>・契約社員的な関わり方で、長期的にお付き合い頂ける方だと尚良いです。<br>・基本は在宅ワークで、東京の事務所にて2週に1度程度の打ち合わせはあります。<br>　※都内都心部に出勤できる関東近県の方が前提となります。<br>・月額固定（給与制）で毎月お支払いたします、サービスが続く限りお支払します。<br>　月100時間以上割いて頂ける方でお願いします（副業だと難しいかもしれません）<br>・当社チームと同じくらいの年齢層である、20-30代の方だと尚良いです。<br><br><br>以上になります。<br><br>プログラマーとしての実力（速さ、正確さ）は高い水準を求めますが、<br>働きやすい環境、安定したお給料をお支払できますので、ご検討ください。<br>多数のウェブエンジニア・プログラマの方からのご連絡・ご応募お待ちしております。<br>
			//</div>
			//</div>
			//</section>
			$task_content = stristr($data,"<section class=\"cw-section job_detail\">");
			$startpos = strlen("<section class=\"cw-section job_detail\">");
			$length = stripos($task_content, "</section>")-$startpos;
			$task_detail = substr($task_content,$startpos,$length);
			$task_detail = strip_tags($task_detail);
			//echo "task_detail=".$task_detail."<br>";

			//拆解start_date
			// <table class="cw-table cw-table_disabled_first_border cw-table_vertical_header">
          	//<tbody>
          	//<tr>
            //<th>公開日</th>
            //<td>2014年09月28日</td>
          	//</tr>
          	//<tr>
            //<th>応募期限</th>
            //<td>2014年10月12日</td>
          	//</tr>
          	//</tbody>
			$task_content = stristr($data,"<th>公開日</th>");
			$startpos = strlen("<th>公開日</th>\r\n<td>");
			$length = stripos($task_content, "</td>")-$startpos;
			$start_date = substr($task_content,$startpos,$length);
			$start_date = strip_tags($start_date);
			//echo "start_date=".$start_date."<br>";
				
			$task_content = stristr($task_content,"<th>応募期限</th>");
			$startpos = strlen("<th>応募期限</th>\r\n<td>");
			$length = stripos($task_content, "</td>")-$startpos;
			$end_date = substr($task_content,$startpos,$length);
			$end_date = strip_tags($end_date);
			//echo "end_date=".$end_date."<br>";

			//payment_type

			$crawl_obj = new Keke_witkey_crawl_class();
			$crawl_obj->setSite_name ( $site_name );
			$crawl_obj->setTask_id ( $task_id );
			$crawl_obj->setTask_name ( $task_name );
			$crawl_obj->setTask_catagory ( $task_catagory );
			$crawl_obj->setTask_type ( $task_type );
			$crawl_obj->setTask_status ( $task_status );
			$crawl_obj->setTask_overview ( $task_overview );
			$crawl_obj->setTask_detail ( $task_detail );
			$crawl_obj->setStart_date ( $start_date );
			$crawl_obj->setEnd_date ( $end_date );
			$crawl_obj->setBudget( $budget );
			$crawl_obj->setSkill( $skill );
			$crawl_obj->create_keke_witkey_crawl ();
		}
		ini_set(“max_execution_time”,120);
		set_time_limit(120);
	}
	static function admin_crawl_lancers($start_id, $end_id) {
		global $_K, $admin_info;
	
		error_reporting(E_ALL);
		ini_set(“max_execution_time”,28000);
		set_time_limit(28000);
		
		for($current_id = $start_id; $current_id <= $end_id; $current_id ++) {
	
			//echo $current_id;
			// 初始化一个 cURL 对象
			$curl = curl_init();
	
			//epweike
			$site_name = 'lancers';
	
			//task_id，循环
			$task_id = $current_id;
			
			//$task_id_str = $task_id;
			//$final_url = 'http://www.lancers.jp/work/detail/'.$task_id;
			
			$final_url = 'http://www.lancers.jp/work/detail/'.$task_id;
			//$final_url = 'http://crowdworks.jp/public/jobs/'.$task_id;
	
			// 设置你需要抓取的URL
			//http://crowdworks.jp/public/jobs/155438
			curl_setopt($curl, CURLOPT_URL, $final_url);
	
			// 设置header
			curl_setopt($curl, CURLOPT_HEADER, 1);
	
			// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	
			// 运行cURL，请求网页
			$data = curl_exec($curl);
	
			// 关闭URL请求
			curl_close($curl);
	
			// 显示获得的数据
			///var_dump($data);
			//$data;
	
			//拆解task name，task_catagory, skill 从以下的唯一语句来拆解
			//<title>急成長WEBサービス（B2B）の保守・運用担当者（長期...の依頼/外注｜サイト構築・ウェブ開発の仕事 [ID:155438]</title>
			$task_content = stristr($data,"<title>");
			$startpos = strlen("<title>");
			$length = stripos($task_content, "|") - $startpos;
			$task_name = substr($task_content,$startpos,$length);
			$task_name = strip_tags($task_name);
			//echo "task_name=".$task_name."<br>";
			 
			$task_content = stristr($task_content,"|");
			$startpos = strlen("|");
			$length = stripos($task_content, " | ")-$startpos;
			$task_catagory = substr($task_content,$startpos,$length);
			$task_catagory = strip_tags($task_catagory);
			//echo "task_catagory=".$task_catagory."<br>";
	
			//拆解task_type，budget，
			$task_content = stristr($data,"この仕事は「");
			$startpos = strlen("この仕事は「");
			$length = stripos($task_content, "」です")-$startpos;
			$task_type = substr($task_content,$startpos,$length);
			$task_type = strip_tags($task_type);
			//echo "task_type=".$task_type."<br>";
				
		
		    $task_content=stristr($data,"work-budget-box");
			$task_content=stristr($task_content,"ork-price-span price-number\">");
			$startpos = strlen("ork-price-span price-number\">");
			$length = stripos($task_content, "</div>")-$startpos;
			$budget = substr($task_content,$startpos,$length);
			$budget = strip_tags($budget);
			//echo "budget=".$budget."<br>";
	
			//拆解task_status
			//<strong><span class="icon-warning-sign"></span> このお仕事の募集は終了しています。</strong>
			$task_content = stristr($data,"\"item\">状態：");
			$startpos = strlen("\"item\">状態： ");
			$length = stripos($task_content, "</span>")-$startpos;
			$task_status = substr($task_content,$startpos,$length);
			$task_status = strip_tags($task_status);
			//echo "task_status=".$task_status."<br>";
	
			//拆解task_overview
			$task_content = stristr($data,"<div class=\"reqest_detail\">");
			$task_content = stristr($task_content,"<div class=\"comment\">");
			$startpos = strlen("<div class=\"comment\">");
			$length = stripos($task_content, "</div>")-$startpos;
			$task_detail = substr($task_content,$startpos,$length);
			$task_detail = strip_tags($task_detail);
			//echo "task_overview=".$task_overview."<br>";
	
			$task_content = stristr($data,"開始： <span class=\"f_c_ore\">");
			$startpos = strlen("開始： <span class=\"f_c_ore\">");
			$length = stripos($task_content, "</span>")-$startpos;
			$start_date = substr($task_content,$startpos,$length);
			$start_date = strip_tags($start_date);
			//echo "start_date=".$start_date."<br>";
	
			$task_content = stristr($task_content,"締切： <span class=\"f_c_ore\">");
			$startpos = strlen("締切： <span class=\"f_c_ore\">");
			$length = stripos($task_content, "</span>")-$startpos;
			$end_date = substr($task_content,$startpos,$length);
			$end_date = strip_tags($end_date);
			//echo "end_date=".$end_date."<br>";
	
			//payment_type
			$task_content = stristr($data,"<th>支払：</th>");
			$task_content = stristr($task_content,"<td>");
			$startpos = strlen("<td>");
			$length = stripos($task_content, "</td>")-$startpos;
			$payment_type = substr($task_content,$startpos,$length);
			$payment_type = trim($payment_type);
			$payment_type = strip_tags($payment_type);
			
			//<th>オプション：</th>
			$task_content = stristr($data,"<th>オプション：</th>");
			$task_content = stristr($task_content,"<td colspan=\"3\">");
			$startpos = strlen("<td colspan=\"3\">");
			$length = stripos($task_content, "</td>")-$startpos;
			$upgrates = substr($task_content,$startpos,$length);
			$upgrates = trim($upgrates);
			$upgrates = strip_tags($upgrates);
			
	        //閲覧制限
			$task_content = stristr($data,"<th>閲覧制限：</th>");
			$task_content = stristr($task_content,"<td>");
			$startpos = strlen("<td>");
			$length = stripos($task_content, "</td>")-$startpos;
			$marketplace  = substr($task_content,$startpos,$length);
			$marketplace = trim($marketplace);
			$marketplace = strip_tags($marketplace);
			//提案者制限
			$task_content = stristr($data,"<th>提案者制限：</th>");
			$task_content = stristr($task_content,"<td colspan=\"3\">");
			$task_content = stristr($task_content,">");
			$startpos = strlen(">");
			$length = stripos($task_content, "</td>")-$startpos;
			$experience_level  = substr($task_content,$startpos,$length);
			$experience_level = trim($experience_level);
			$experience_level = strip_tags($experience_level);
			
			//選定確約  <th>選定確約：</th>
			$task_content = stristr($data,"<th>選定確約：</th>");
			$task_content = stristr($task_content,"<td>");
			$startpos = strlen("<td>");
			$length = stripos($task_content, "</td>")-$startpos;
			$selection  = substr($task_content,$startpos,$length);
			$selection = trim($selection);
			$selection = strip_tags($selection);
			//当選報酬
			$task_content = stristr($data,"当選報酬");
			$task_content = stristr($task_content,"<span class=\"f_ver\">");
			$startpos = strlen("<span class=\"f_ver\">");
			$length = stripos($task_content, "</span>")-$startpos;
			$payment  = substr($task_content,$startpos,$length);
			$payment = strip_tags($payment);
			
			//<th>クライアント：</th>
			$task_content = stristr($data,"<th>クライアント：</th>");
			$task_content = stristr($task_content,"'>");
			$startpos = strlen("'>");
			$length = stripos($task_content, "</a>")-$startpos;
			$client  = substr($task_content,$startpos,$length);
			$client = trim($client);
			$client = strip_tags($client);
			$crawl_obj = new Keke_witkey_crawl_class();
			
			$crawl_obj->setSite_name ( $site_name );
			$crawl_obj->setTask_id ( $task_id );
			$crawl_obj->setTask_name ( $task_name );
			$crawl_obj->setTask_catagory ( $task_catagory );
			$crawl_obj->setTask_type ( $task_type );
			$crawl_obj->setTask_status ( $task_status );
			$crawl_obj->setTask_detail ( $task_detail );
			$crawl_obj->setStart_date ( $start_date );
			$crawl_obj->setEnd_date ( $end_date );
			$crawl_obj->setBudget( $budget );
			$crawl_obj->setPayment_type( $payment_type );
			$crawl_obj->setUpgrade( $upgrates );
			$crawl_obj->setIs_public( $marketplace );
			$crawl_obj->setExperience_level( $experience_level );
			$crawl_obj->setSelection( $selection );
			$crawl_obj->setPayment( $payment );
			$crawl_obj->setClient_name( $client );
			
			$crawl_obj->create_keke_witkey_crawl ();
			
		}
		ini_set(“max_execution_time”,120);
		set_time_limit(120);
	}
	static function sort_tree($nodeid, $data_arr, $pid = "indus_pid", $id = "indus_id") {
		$res = array ();
		for($i = 0; $i < sizeof ( $data_arr ); $i ++)
			if ($data_arr [$i] ["$pid"] == $nodeid) {
				array_push ( $res, $data_arr [$i] );
				$subres = self::sort_tree ( $data_arr [$i] ["$id"], $data_arr, $pid, $id );
				for($j = 0; $j < sizeof ( $subres ); $j ++)
					array_push ( $res, $subres [$j] );
			}
		return $res;
	}
	public static function set_favor($pk, $keep_type, $model_code, $obj_uid, $obj_id, $obj_name, $origin_id, $url = '', $output = 'normal') {
		global $uid, $username;
		global $_lang;
		self::check_login ( $url, $output ); 
		self::check_if_favor ( $uid, $obj_uid, $pk, $keep_type, $model_code, $obj_id, $url, $output ); 
		$favor_type = keke_glob_class::get_favor_type ();
		$favor_obj = new Keke_witkey_favorite_class ();
		$favor_obj->_f_id = NULL;
		CHARSET == 'gbk' and $obj_name = kekezu::utftogbk ( $obj_name );
		$favor_obj->setKeep_type ( $keep_type );
		$favor_obj->setObj_type ( $model_code );
		$favor_obj->setObj_id ( $obj_id );
		$favor_obj->setObj_name ( $obj_name );
		$favor_obj->setOrigin_id ( $origin_id );
		$favor_obj->setUid ( $uid );
		$favor_obj->setUsername ( $username );
		$favor_obj->setOn_date ( time () );
		$f_id = $favor_obj->create_keke_witkey_favorite ();
		if ($f_id) {
			if (in_array ( $keep_type, array (
					'service',
					'task',
					'shop'
			) )) {
				$up_tab = TABLEPRE . "witkey_" . $keep_type;
				db_factory::execute ( sprintf ( "update %s set focus_num = focus_num+1 where %s='%d'", $up_tab, $pk, $obj_id ) );
			}
			kekezu::keke_show_msg ( $url, $favor_type [$keep_type] . $_lang ['collection_success'], "", $output );
		} else
			kekezu::keke_show_msg ( $url, $favor_type [$keep_type] . $_lang ['collection_fail'], "error", $output );
	}
	public static function check_login($url = 'index.php?do=login', $output = 'normal', $type = 'warning') {
		global $uid;
		global $_lang;
		if ($uid) {
			return TRUE;
		} else {
			header ( 'Location:' . 'index.php?do=login' );
			return false;
		}
	}
	public static function get_classify_indus($type = 'task', $mode = 'parent') {
		global $kekezu;
		$indus_arr = array ();
		if (in_array ( $type, array (
				'task',
				'shop'
		) )) {
			$indus_list = $kekezu->_indus_arr;
			$indus_c_list = $kekezu->_indus_c_arr;
			if ($type == 'task') {
				$indus_list = $kekezu->_indus_task_arr;
			} else {
				$indus_list = $kekezu->_indus_goods_arr;
			}
			$arrIndusIds = array_keys ( $indus_list );
			$indus_ids = array_unique ( array_filter ( $arrIndusIds ) );
			switch ($mode) {
				case 'parent' :
					$indus_arr = $indus_list;
					break;
				case 'total' :
					foreach ( $indus_list as $indus_id => $v ) {
						if (in_array ( $v ['indus_pid'], $indus_ids ) || in_array ( $v ['indus_id'], $indus_ids )) {
							$indus_arr [$indus_id] = $v;
						}
					}
					break;
				case 'child' :
					foreach ( $indus_c_list as $indus_id => $v ) {
						if (in_array ( $v ['indus_pid'], $indus_ids )) {
							$indus_arr [$indus_id] = $v;
						}
					}
					break;
			}
		}
		return $indus_arr;
	}
	public static function check_if_favor($uid, $obj_uid, $pk, $keep_type, $model_code, $obj_id, $url = '', $output = 'normal') {
		global $_lang;
		$favor_type = keke_glob_class::get_favor_type ();
		$favor_tab = TABLEPRE . "witkey_" . $keep_type;
		if ($obj_uid == $uid) {
			kekezu::keke_show_msg ( $url, $_lang ['you_can_not_collection_self'] . $favor_type [$keep_type] . "！", "error", $output );
		} else {
			$if_favor = db_factory::get_count ( sprintf ( " select f_id from %switkey_favorite where keep_type='%s' and obj_type='%s' and obj_id='%d' and uid='%d'", TABLEPRE, $keep_type, $model_code, $obj_id, $uid ) );
			if (! $if_favor) {
				return TRUE;
			} else {
				kekezu::keke_show_msg ( $url, $_lang ['you_has_collection_this'] . $favor_type [$keep_type] . "," . $_lang ['no_need_continue_collection'], "error", $output );
				return false;
			}
		}
	}
	public static function get_between_where($field, $min_cash, $max_cash) {
		$where = " and $field >$min_cash and $field<$max_cash";
		return $where;
	}
	static function send_mail($address, $title, $body) {
		global $_K, $kekezu;
		$basicconfig = $kekezu->_sys_config;
		$mail = new Phpmailer_class ();
		if ($basicconfig ['mail_server_cat'] == "smtp" and function_exists ( 'fsockopen' )) {
			$mail->IsSMTP ();
			$mail->SMTPAuth = true;
			$mail->CharSet = strtolower ( $_K ['charset'] );
			$mail->Host = $basicconfig ['smtp_url'];
			$mail->Port = $basicconfig ['mail_server_port'];
			$mail->Username = $basicconfig ['post_account'];
			$mail->Password = base64_decode ( $basicconfig ['account_pwd'] );
		} else {
			$mail->IsMail ();
		}
		$mail->SetFrom ( $basicconfig ['post_account'], $basicconfig ['website_name'] );
		if ($basicconfig ['mail_replay'])
			$mail->AddReplyTo ( $basicconfig ['mail_replay'], $basicconfig ['website_name'] );
		$mail->Subject = $title;
		$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
		$mail->MsgHTML ( $body );
		$address_email = db_factory::get_one ( 'select username from ' . TABLEPRE . 'witkey_space where email="' . $address . '"' );
		$mail->AddAddress ( $address, $address_email ['username'] );
		return $mail->Send ();
	}
	static function get_show_day($cash = 0, $model_id = '') {
		global $_K;
		$reward_day_rule = keke_task_config::get_time_rule ( $model_id, '3600' );
		$count = count ( $reward_day_rule );
		for($i = 0; $i <= $count; $i ++) {
			if ($cash >= $reward_day_rule [$i] [rule_cash] && $cash < $reward_day_rule [$i + 1] [rule_cash]) {
				return $reward_day_rule [$i] [rule_day];
			} elseif ($cash < $reward_day_rule [0] [rule_cash]) {
				return ceil ( $reward_day_rule [0] [rule_day] / 2 );
			} elseif ($cash >= $reward_day_rule [count ( $reward_day_rule ) - 1] [rule_cash]) {
				return $reward_day_rule [count ( $reward_day_rule ) - 1] [rule_day];
			}
		}
	}
	static function get_rand_kf() {
		$kf_arr = kekezu::get_table_data ( '*', 'witkey_space', ' group_id = 7', '', '', '', '', null );
		$kf_arr_count = count ( $kf_arr );
		$randno = rand ( 0, $kf_arr_count - 1 );
		$kf_arr [$randno] [uid] and $kf_uid = $kf_arr [$randno] [uid] or $kf_uid = ADMIN_UID;
		$kf_info = kekezu::get_user_info ( $kf_uid );
		return $kf_info;
	}
	static function get_user_info($uid, $isusername = 0) {
		return keke_user_class::get_user_info ( $uid, $isusername );
	}
	static function check_user_by_name($user, $isusername = 0) {
		global $_K;
		$member_obj = new Keke_witkey_member_class ();
		if ($isusername) {
			$member_obj->setWhere ( "username='{$user}'" );
		} else {
			$member_obj->setWhere ( "uid='{$user}'" );
		}
		$user_count = $member_obj->count_keke_witkey_member ();
		return $user_count;
	}
	static function get_format_size($bytes) {
		$units = array (
				0 => 'B',
				1 => 'kB',
				2 => 'MB',
				3 => 'GB'
		);
		$log = log ( $bytes, 1024 );
		$power = ( int ) $log;
		$size = pow ( 1024, $log - $power );
		return round ( $size, 2 ) . ' ' . $units [$power];
	}
	static function pretty_format($number, $unit = '') {
		global $_lang;
		$unit == '' && $unit = $_lang ['million'];
		if ($number < 10000) {
			return $number;
		}
		return ((round ( $number / 1000 )) / 10) . $unit; 
	}
	static function save_feed($feed_arr, $uid, $username, $feedtype = "", $obj_id = 0, $obj_link = "", $icon = '') {
		$title = serialize ( $feed_arr );
		$insertsqlarr = array ();
		$insertsqlarr ['icon'] = $icon;
		$insertsqlarr ['feed_time'] = time ();
		$insertsqlarr ['feedtype'] = $feedtype;
		$insertsqlarr ['obj_link'] = $obj_link;
		$insertsqlarr ['obj_id'] = $obj_id;
		$insertsqlarr ['title'] = $title;
		$insertsqlarr ['uid'] = $uid;
		$insertsqlarr ['username'] = $username;
		return db_factory::inserttable ( TABLEPRE . 'witkey_feed', $insertsqlarr );
	}
	static function get_following_count($uid) {
		$c = db_factory::execute ( sprintf ( "select follow_id from %switkey_free_follow where uid = '%d'", TABLEPRE, $uid ) ); 
		return $c;
	}
	static function get_follower_count($uid) {
		$c = db_factory::execute ( sprintf ( "select follow_id from %switkey_free_follow where fuid = '%d'", TABLEPRE, $uid ) ); 
		return $c;
	}
	static function get_if_focus($uid, $fuid) {
		$c = db_factory::get_one ( sprintf ( "select follow_id from %switkey_free_follow where uid = '%d' and fuid = '%d'", TABLEPRE, $uid, $fuid ) );
		return $c;
	}
	static function get_feed($where_arr, $order, $limit) {
		$feed_arr = kekezu::get_table_data ( "*", "witkey_feed", $where_arr, $order, "", $limit, "feed_id" );
		$feed_new_arr = array ();
		foreach ( $feed_arr as $k => $v ) {
			$title_arr = unserialize ( $v ['title'] );
			if (is_array ( $title_arr )) {
				foreach ( $title_arr as $k1 => $v1 ) {
					$v [$k1] = $v1;
				}
			}
			$feed_new_arr [] = $v;
		}
		return $feed_new_arr;
	}
	static function feed_time($feed_time) {
		global $_lang;
		$time = time () - $feed_time;
		$time_desc = kekezu::time2Units ( $time, 'hour' );
		if ($time_desc) {
			return $_lang ['in'] . $time_desc . $_lang ['before'];
		} else {
			return $_lang ['just'];
		}
	}
	static function notify_user($title, $content, $uid, $username = "") {
		if (! $username) {
			$userinfo = kekezu::get_user_info ( $uid );
			$username = $userinfo ['username'];
		}
		if (is_array ( $content )) {
			$msg_tpl = new Keke_witkey_msg_tpl_class ();
			if (is_int ( $content ['tpl'] )) { 
				$wh = "`tpl_id` = '{$content['tpl']}' and `send_type`=1 limit 1";
			} elseif (is_string ( $content ['tpl'] )) { 
				$wh = "`tpl_code` = '{$content['tpl']}' and `send_type`=1 limit 1";
			}
			$msg_tpl->setWhere ( $wh );
			$res = $msg_tpl->query_keke_witkey_msg_tpl ();
			$content = strtr ( $res [0] ['content'], $content ['data'] );
		}
		$message_obj = new Keke_witkey_msg_class ();
		$message_obj->setTitle ( $title );
		$message_obj->setContent ( $content );
		$message_obj->setOn_time ( time () );
		$message_obj->setTo_uid ( $uid );
		$message_obj->setTo_username ( $username );
		$message_obj->create_keke_witkey_msg ();
	}
	static function get_shop_info($uid) {
		$shop_obj = new Keke_witkey_shop_class ();
		$shop_obj->setWhere ( " uid = $uid" );
		$shop_info = $shop_obj->query_keke_witkey_shop ();
		if ($shop_info) {
			return $shop_info [0];
		} else {
			return FALSE;
		}
	}
	static function del_att_file($fid = 0) {
		keke_file_class::del_att_file ( $fid );
	}
	static function check_secode($secode) {
		global $_lang;
		$img = new Secode_class ();
		$res_code = $img->check ( $secode, 1 );
		if (! $res_code) {
			return $_lang ['verification_code_input_error'];
		} else {
			return true;
		}
	}
	public static function autoload($class_name) {
		try {
			$file1 = S_ROOT . '/lib/table/' . $class_name . '.php';
			$file2 = S_ROOT . '/lib/inc/' . $class_name . '.php';
			$file3 = S_ROOT . '/lib/helper/' . $class_name . '.php';
			$file4 = S_ROOT . '/lib/sys/' . $class_name . '.php';
			if (is_file ( $file1 )) {
				self::keke_require_once ( $file1, $class_name );
				return class_exists ( $file1, false ) || interface_exists ( $file1, false );
			} elseif (is_file ( $file2 )) {
				self::keke_require_once ( $file2, $class_name );
				return class_exists ( $file2, false ) || interface_exists ( $file2, false );
			} elseif (is_file ( $file3 )) {
				self::keke_require_once ( $file3, $class_name );
				return class_exists ( $file3, false ) || interface_exists ( $file3, false );
			} elseif (is_file ( $file4 )) {
				self::keke_require_once ( $file4, $class_name );
				return class_exists ( $file4, false ) || interface_exists ( $file4, false );
			}
			self::keke_require_once ( S_ROOT . '/lib/db/db_factory.php', 'db_facotry' );
			global $i_model, $_K, $kekezu;
			if (! $i_model && isset ( $kekezu->_model_list )) {
				$model_arr = $kekezu->_model_list;
				foreach ( $model_arr as $value ) {
					$dir = $value ['model_code'];
					$type = $value ['model_type'];
					$f1 = S_ROOT . '/' . $type . '/' . $dir . '/lib/' . $class_name . '.php';
					$f2 = S_ROOT . '/' . $type . '/' . $dir . '/model/' . $class_name . '.php';
					if (file_exists ( $f1 )) {
						self::keke_require_once ( $f1, $class_name );
						return class_exists ( $f1, false ) || interface_exists ( $f1, false );
					}
					if (file_exists ( $f2 )) {
						self::keke_require_once ( $f2, $class_name );
						return class_exists ( $f2, false ) || interface_exists ( $f2, false );
					}
				}
				$auth_item = self::get_table_data ( 'auth_code,auth_dir', 'witkey_auth_item', '', 'listorder asc ', '', '', 'auth_code', null );
				foreach ( $auth_item as $v ) {
					$auth_dir = $v ['auth_dir'];
					$f3 = S_ROOT . '/auth/' . $auth_dir . '/lib/' . $class_name . '.php';
					if (file_exists ( $f3 )) {
						self::keke_require_once ( $f3, $class_name );
						return class_exists ( $f3, false ) || interface_exists ( $f3, false );
					}
				}
			}
		} catch ( Exception $e ) {
			keke_exception::handler ( $e );
		}
		return true;
	}
	public static function keke_show_msg($url, $content, $type = 'success', $output = 'normal') {
		global $_lang;
		switch ($output) {
			case "normal" :
				kekezu::show_msg ( $_lang ['operate_notice'], $url, '3', $content, $type );
				break;
			case "json" :
				$type == 'error' or $status = '1'; 
				$msg = $_lang ['operate_notice'];
				ISWAP == 1 and $msg = array (
						'r' => $content
				);
				kekezu::echojson ( $msg, intval ( $status ), $content );
				die ();
				break;
		}
	}
	public static function register_autoloader($callback = null) {
		spl_autoload_unregister ( array (
				'keke_core_class',
				'autoload'
		) );
		isset ( $callback ) and spl_autoload_register ( $callback );
		spl_autoload_register ( array (
				'keke_core_class',
				'autoload'
		) );
	}
	public static function keke_require_once($filename, $class_name = null) {
		isset ( $GLOBALS ['class'] [$filename] ) or (($GLOBALS ['class'] [$filename] = 1) and require $filename);
	}
	public static function get_config($configtype) {
		$v = "Keke_witkey_{$configtype}_config_class";
		$q = "query_keke_witkey_{$configtype}_config";
		$config_obj = new $v ();
		$config_arr = $config_obj->$q ( 1, null );
		return $config_arr [0];
	}
	public static function get_table_data($fileds = '*', $table, $where = '', $order = '', $group = '', $limit = '', $pk = '', $cachetime = 0) {
		return db_factory::get_table_data ( $fileds, $table, $where, $order, $group, $limit, $pk, $cachetime );
	}
	public static function get_task_config($model_id = '') {
		global $kekezu;
		if ($model_id) {
			$where = " where model_id= '$model_id' ";
		}
		$model_config = db_factory::query ( ' select model_id,config from ' . TABLEPRE . "witkey_model $where ", true, 60 * 20 );
		if ($model_id) {
			$m_config = unserialize ( $model_config [0] ['config'] );
			if ($m_config) {
				$model_config [0] = array_merge ( $model_config [0], $m_config );
			}
			return $model_config [0];
		} else {
			$temp = array ();
			foreach ( $model_config as $mod ) {
				if (is_array ( $mod ) && is_array ( $mod ['config'] )) {
					$temp [$mod ['model_id']] = array_merge ( $mod, unserialize ( $mod ['config'] ) );
				}
			}
			return $temp;
		}
	}
	public static function get_pay_item() {
		global $kekezu;
		$pay_item = $kekezu->_cache_obj->get ( "task_pay_item" );
		if (! $pay_item) {
			$pay_item = array ();
			$item = db_factory::query ( " select a.*,b.model_id from " . TABLEPRE . "witkey_pay_item as a left join " . TABLEPRE . "witkey_model as b on a.model_code =b.model_dir" );
			foreach ( $item as $v ) {
				$pay_item [$v [model_code]] [$v [pay_item_id]] = $v;
			}
			$kekezu->_cache_obj->set ( "task_pay_item", $pay_item );
		}
		return $pay_item;
	}
	public static function get_payment_config($paymentname = "", $pay_type = 'online', $pay_status = null) {
		if ($paymentname) {
			if ($pay_type != 'offline') {
				if (! file_exists ( S_ROOT . "/include/payment/" . $paymentname . "/pay_config.php" )) {
					return FALSE;
				} else {
					require_once S_ROOT . "/include/payment/" . $paymentname . "/pay_config.php";
				}
			}
			$where = ' 1=1';
			if ($pay_type) {
				$where .= ' and type="' . $pay_type . '"';
			}
			if ($paymentname) {
				$where .= ' and payment="' . $paymentname . '"';
			}
			$list = kekezu::get_table_data ( '*', "witkey_pay_api", $where, "", '', '', '', null );
			if ($list) {
				$pay_config = $pay_basic;
				$pay_config ['payment'] = $list [0] ['payment'];
				$pay_config ['config'] = $list [0] ['config'];
				$pay_config ['type'] = $list [0] ['type'];
				$config = unserialize ( $pay_config ['config'] );
				$config and $pay_config = array_merge ( $pay_config, $config );
				$list = $pay_config;
				if (isset ( $pay_status )) {
					if ($list ['pay_status'] == intval ( $pay_status )) {
						return $list;
					}
				} else {
					return $list;
				}
			}
		} else {
			if ($pay_type == 'offline') {
				$list = kekezu::get_table_data ( 'payment', "witkey_pay_api", " type='offline'", '', '', '', '', null );
				$i = 0;
				while ( list ( $k, $v ) = each ( $list ) ) {
					$paymentlist [$v ['payment']] = self::get_payment_config ( $v ['payment'], $pay_type, $pay_status );
					$i = $i + 1;
				}
			} else {
				$filepath = S_ROOT . "/include/payment";
				$handle = opendir ( $filepath );
				$i = 0;
				while ( $file = readdir ( $handle ) ) {
					$paymentlist [$file] = self::get_payment_config ( $file, $pay_type, $pay_status );
					$i = $i + 1;
				}
				closedir ( $handle );
			}
			return array_filter ( $paymentlist );
		}
	}
	public static function get_config_rule($ruletype, $nokey = '') {
		global $kekezu;
		return kekezu::get_table_data ( "*", $ruletype, "", "", "", "", "", $nokey, null );
	}
	public static function get_industry($pid = NULL, $cache = NULL) {
		! is_null ( $pid ) and $where = " indus_pid = '" . intval ( $pid ) . "'";
		$indus_arr = self::get_table_data ( '*', "witkey_industry", $where, " CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ", '', '', 'indus_id', $cache );
		return $indus_arr;
	}
	public static function get_indus_info($indus_id) {
		$indus_id and $indus_info = db_factory::get_one ( sprintf ( "select * from %switkey_industry where indus_id=%d", TABLEPRE, $indus_id ) );
		return $indus_info;
	}
	public static function get_indus_by_index($indus_type = "1", $pid = NULL) {
		global $kekezu;
		$indus_index_arr = $kekezu->_cache_obj->get ( 'indus_index_arr' . $indus_type . '_' . $pid );
		if (! $indus_index_arr) {
			$indus_arr = kekezu::get_industry ( $pid );
			$indus_index_arr = array ();
			foreach ( $indus_arr as $indus ) {
				$indus_index_arr [$indus ['indus_pid']] [$indus ['indus_id']] = $indus;
			}
			$kekezu->_cache_obj->set ( 'indus_index_arr' . $indus_type . '_' . $pid, $indus_index_arr, 3600 );
		}
		return $indus_index_arr;
	}
	public static function get_cash_cove($model_code = 'tender', $all = false) {
		$w = '';
		if ($all === false) {
			$w = " model_code ='$model_code'";
		}
		return self::get_table_data ( '*', "witkey_task_cash_cove", $w, "start_cove", '', '', 'cash_rule_id', null );
	}
	public static function get_ext_type() {
		global $kekezu;
		$basic_config = $kekezu->_sys_config;
		$flie_types = explode ( '|', $basic_config ['file_type'] );
		foreach ( $flie_types as $k => $v ) {
			$k and $ext .= ";";
			$ext .= '*.' . $v;
		}
		return $ext;
	}
	public static function get_ext_type_show() {
		global $kekezu;
		$basic_config = $kekezu->_sys_config;
		$flie_types = explode ( '|', $basic_config ['file_type'] );
		foreach ( $flie_types as $k => $v ) {
			$k and $ext .= " ";
			$ext .= '.' . $v;
		}
		return $ext;
	}
	public static function get_skill() {
		global $kekezu;
		$skill_arr = $kekezu->_cache_obj->get ( "keke_witkey_skill" );
		if (! $skill_arr) {
			$indus_arr = $kekezu->_indus_arr;
			$temparr = array ();
			foreach ( $indus_arr as $inarr ) {
				$temparr [$inarr ['indus_pid']] [] = $inarr;
			}
			$skill_arr = $temparr;
			$kekezu->_cache_obj->set ( "keke_witkey_skill", $skill_arr, 3600 );
		}
		return $skill_arr;
	}
	public static function get_tag($mode = '') {
		$tag_obj = new Keke_witkey_tag_class ();
		$taginfo = $tag_obj->query_keke_witkey_tag ( 1, null );
		$temp_arr = array ();
		if (! $mode) {
			foreach ( $taginfo as $tag ) {
				$temp_arr [$tag ['tagname']] = $tag;
			}
			$taginfo = $temp_arr;
		} else if ($mode == 1) {
			foreach ( $taginfo as $tag ) {
				$temp_arr [$tag ['tag_id']] = $tag;
			}
			$taginfo = $temp_arr;
		}
		return $taginfo;
	}
	static function get_ad($adname = null, $limit_num = null) {
		is_null ( $adname ) or $where = "and ad_name ='$adname'";
		$limit_num > 0 and $limit = $limit_num;
		return self::get_table_data ( '*', 'witkey_ad', '1=1 and is_allow=1 ' . $where, 'listorder', '', $limit, '', 3600 );
	}
	public static function check_session($type, $min, $count) {
		if ($_SESSION [$type . '_time']) { 
			if (time () - $_SESSION [$type . '_time'] < $min * 60) { 
				if ($_SESSION [$type . '_count'] >= $count) {
					return false;
				} else {
					$_SESSION [$type . '_count'] += 1;
					return true;
				}
			} else {
				$_SESSION [$type . '_time'] = time ();
				$_SESSION [$type . '_count'] = 1;
				return true;
			}
		} else {
			$_SESSION [$type . '_time'] = time ();
			$_SESSION [$type . '_count'] = 1;
			return true;
		}
	}
	static function execute_time() {
		if (function_exists ( 'xdebug_time_index' )) {
			$ex_time = xdebug_time_index ();
		} else {
			$stime = explode ( ' ', SYS_START_TIME );
			$etime = explode ( ' ', microtime () );
			$ex_time = number_format ( ($etime [1] + $etime [0] - $stime [1] - $stime [0]), 6 );
		}
		return $ex_time;
	}
	static function lang($key) {
		return keke_lang_class::lang ( $key );
	}
	static function nav_list($arr = array()) {
		global $kekezu, $_lang;
		if ($kekezu->_sys_config ['set_index'] && $kekezu->_sys_config ['set_index'] != 'index') {
			foreach ( $arr as $k => $v ) {
				if ($v ['nav_style'] == $kekezu->_sys_config ['set_index']) {
					unset ( $arr [$k] );
					array_unshift ( $arr, $v );
					return $arr;
				}
			}
		} else {
			return $arr;
		}
	}
	static function update_oltime() {
		global $_K, $kekezu;
		$res = null;
		$login_uid = $kekezu->_uid;
		$user_oltime = db_factory::get_one ( sprintf ( "select last_op_time from %switkey_member_oltime where uid = '%d'", TABLEPRE, $login_uid ) );
		if ((SYS_START_TIME - $user_oltime ['last_op_time']) > $_K ['timespan']) {
			$res = db_factory::execute ( sprintf ( "update %switkey_member_oltime set online_total_time = online_total_time+%d,last_op_time = '%d' where uid = '%d'", TABLEPRE, $_K ['timespan'], SYS_START_TIME, $login_uid ) );
		}
		return $res;
	}
	static function get_user_online($uid) {
		$user_oltime = db_factory::get_one ( sprintf ( "select last_op_time from %switkey_member_oltime where uid = '%d'", TABLEPRE, $uid ) );
		if ((SYS_START_TIME - $user_oltime ['last_op_time']) > 1200) {
			return false;
		} else {
			return true;
		}
	}
	static function error_handler($code, $error, $file = NULL, $line = NULL) {
		if (error_reporting () && $code !== 8) {
			ob_get_level () and ob_clean ();
			keke_exception::handler ( new ErrorException ( $error, $code, 0, $file, $line ) );
		}
		return TRUE;
	}
	static function shutdown_handler() {
		if (KEKE_DEBUG and $error = error_get_last () and in_array ( $error ['type'], array (
				E_PARSE,
				E_ERROR,
				E_USER_ERROR
		) )) {
			ob_get_level () and ob_clean ();
			keke_exception::handler ( new ErrorException ( $error ['message'], $error ['type'], 0, $error ['file'], $error ['line'] ) );
			exit ( 1 );
		}
	}
}
class kekezu extends keke_core_class {
	public $_inited = false;
	public $_sys_config;
	public $_basic_arr;
	public $_uid;
	public $_username;
	public $_userinfo;
	public $_template;
	public $_model_list;
	public $_task_open = 0;
	public $_shop_open = 0;
	public $_nav_list;
	public $_user_group;
	public $_tpl_obj;
	public $_cache_obj;
	public $_page_obj;
	public $_session_obj;
	public $_messagecount;
	public $_indus_p_arr;
	public $_indus_c_arr;
	public $_indus_arr;
	public $_indus_task_arr;
	public $_indus_goods_arr;
	public $_weibo_list;
	public $_api_open;
	public $_lang;
	public $_lang_list;
	public $_curr_list;
	public $_currency;
	public $_style_path;
	public $_is_allow_fxx = 1;
	public $_route;
	public static function &get_instance() {
		static $obj = null;
		if ($obj == null) {
			$obj = new kekezu ();
		}
		return $obj;
	}
	function __construct() {
		$this->init ();
		keke_lang_class::loadlang ( 'public', 'public' );
	}
	function init() {
		global $_K, $_lang;		
		define ( "S_ROOT", substr ( dirname ( __FILE__ ), 0, - 7 ) );	
		include (S_ROOT . '/config/config.inc.php');
		include (S_ROOT . '/config/keke_version.php');
		@include (S_ROOT . '/config/config_authorize.php');
		include (S_ROOT . '/lib/sys/keke_debug.php');
		if (! $this->_inited) {
			$this->init_session ();
			$this->_route = self::route_output ();
			$this->init_config ();
			$this->init_user ();
			$this->_cache_obj = new keke_cache_class ( CACHE_TYPE, $_K ['cache_config'] );
			$this->_tpl_obj = new keke_tpl_class ();
			$this->_page_obj = new keke_page_class ();
			$this->init_out_put ();
			$this->init_model ();
			$this->init_industry ();
			$this->init_oauth ();
			$this->init_curr ();
			if (! isset ( $_SESSION ['auid'] ) and $this->_sys_config ['is_close'] == 1 && $_GET ['do'] != 'close' && substr ( $_SERVER ['PHP_SELF'], - 24 ) != '/admin/index.php') {
				header ( "Location:index.php?do=close" );
			}
		}
		$this->_inited = true;
	}
	function init_config() {
		global $i_model, $_lang, $_K;
		$this->_basic_arr = $basic_arr = db_factory::query ( 'select config_id,k,v,type,listorder from ' . TABLEPRE . 'witkey_basic_config' );
		$config_arr = array ();
		$size = sizeof ( $basic_arr );
		for($i = 0; $i < $size; $i ++) {
			$config_arr [$basic_arr [$i] ['k']] = $basic_arr [$i] ['v'];
		}
		$mtime = explode ( ' ', microtime () );
		$nav_list = kekezu::get_table_data ( '*', 'witkey_nav', 'ishide!=1', 'listorder', '', '', "nav_id", null );
		$this->_nav_list = $nav_list;
		$_K ['timestamp'] = $mtime [1];
		$_K ['charset'] = CHARSET;
		$_K ['sitecss'] = $config_arr ['sitecss'];
		$_K ['theme'] = $config_arr ['theme'];
		$_K ['sitename'] = $config_arr ['website_name'];
		$_K ['siteurl'] = $config_arr ['website_url'];
		$_K ['inajax'] = 0;
		$_K ['block_search'] = array ();
		$_K ['is_rewrite'] = $config_arr ['is_rewrite'];
		$_K ['timespan'] = '600';
		$_K ['i'] = 0;
		if (isset ( $_SERVER ['HTTP_REFERER'] )) {
			$_K ['refer'] = $_SERVER ['HTTP_REFERER'];
		}
		$_K ['block_search'] = $_K ['block_replace'] = array ();
		$_lang = array ();
		@include (S_ROOT . '/config/lic.php');
		$config_arr ['seo_title'] and $_K ['html_title'] = $config_arr ['seo_title'] or $_K ['html_title'] = $config_arr ['website_name'];
		define ( 'SKIN_PATH', 'tpl/default' );
		define ( "EXP_NAME", $config_arr ['exp_rename'] ? $config_arr ['exp_rename'] : $_lang ['experience'] );
		define ( 'FORMHASH', kekezu::formhash () );
		define ( 'SITEURL', $config_arr ['website_url'] );
		define ( 'SITENAME', $config_arr ['website_name'] );
		$this->_sys_config = $config_arr;
		if (( int ) KEKE_DEBUG == 1) {
			set_error_handler ( array (
					'keke_core_class',
					'error_handler'
			) );
			set_exception_handler ( array (
					'keke_exception',
					'handler'
			) );
		}
		register_shutdown_function ( array (
				'keke_core_class',
				'shutdown_handler'
		) );
	}
	function init_user() {
		if ($_SESSION ['uid']) {
			$this->_uid = $_SESSION ['uid'];
			$this->_username = $_SESSION ['username'];
			$userinfo = keke_user_class::get_user_info ( $this->_uid );
			$sql = "select count(msg_id) from %switkey_msg where to_uid = '%d' and view_status=0 and msg_status!=1 and msg_status !=2";
			$this->_messagecount = db_factory::get_count ( sprintf ( $sql, TABLEPRE, $this->_uid ) );
			if (! $userinfo ['last_login_time']) { 
				db_factory::execute ( ' update ' . TABLEPRE . 'witkey_space set last_login_time=' . time () . ' where uid=' . $this->_uid );
				$userinfo ['last_login_time'] = time ();
			}
			$userinfo ['last_login_time'] = $_SESSION ['last_login_time'] ? $_SESSION ['last_login_time'] : time ();
			$this->_userinfo = $userinfo;
			$this->_user_group = $this->_userinfo ['group_id'];
		} elseif ($_COOKIE ['keke_auto_login']) {
			$loginInfo = unserialize ( $_COOKIE ['keke_auto_login'] );
			$pwdInfo = explode ( '|', base64_decode ( $loginInfo [2] ) );
			$uInfo = kekezu::get_table_data ( '*', 'witkey_space', " username='$pwdInfo[2]' and password = '$pwdInfo[1]'", '', '' );
			if ($uInfo [0] ['uid'] == $pwdInfo [0]) {
				$_SESSION ['uid'] = $uInfo [0] ['uid'];
				$_SESSION ['username'] = $uInfo [0] ['username'];
				$this->_uid = $_SESSION ['uid'];
				$this->_username = $uInfo [0] ['username'];
			}
		}
	}
	function init_industry() {
		$this->_indus_p_arr = kekezu::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 ", " CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ", '', '', 'indus_id', NULL );
		$this->_indus_c_arr = kekezu::get_table_data ( '*', 'witkey_industry', 'indus_type=1 and indus_pid >0', ' CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ', '', '', 'indus_id', NULL );
		$this->_indus_arr = kekezu::get_table_data ( '*', 'witkey_industry', '', ' CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ', '', '', 'indus_id', NULL );
		$arrtotask = db_factory::query("show COLUMNS FROM ".TABLEPRE.'witkey_industry'." WHERE Field='totask' ");
		if($arrtotask[0]){
			$this->_indus_task_arr = kekezu::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 and totask=1 ", " CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ", '', '', 'indus_id', NULL );
		}
		$arrtogoods = db_factory::query("show COLUMNS FROM ".TABLEPRE.'witkey_industry'." WHERE Field='togoods' ");
		if($arrtogoods[0]){
			$this->_indus_goods_arr = kekezu::get_table_data ( '*', "witkey_industry", "indus_type=1 and indus_pid = 0 and togoods=1 ", " CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ", '', '', 'indus_id', NULL );
		}
	}
	function init_oauth() {
		foreach ( $this->_basic_arr as $k => $v ) {
			($v ['type'] == 'weibo' || $v ['type'] == 'interface') and $this->_weibo_list [$v ['k']] = $v ['v'];
		}
		$this->_api_open = unserialize ( $this->_sys_config ['oauth_api_open'] );
	}
	function init_lang() {
		$this->_lang_list = keke_lang_class::lang_type ();
		$this->_lang = keke_lang_class::get_lang ();
	}
	function init_curr() {
		if ($_SESSION ['currency']) {
			$this->_currency = $_SESSION ['currency'];
		} else {
			$this->_currency = $this->_sys_config ['currency'];
			$_SESSION ['currency'] = $this->_sys_config ['currency'];
		}
		$this->_curr_list = keke_lang_class::get_curr_list ();
	}
	function init_model() {
		$model_arr = db_factory::query ( 'select * from ' . TABLEPRE . 'witkey_model where 1=1 order by  model_id asc', 0, null );
		$this->_model_list = kekezu::get_arr_by_key ( $model_arr, 'model_id' );
		foreach ( $this->_model_list as $v ) {
			if ($v ['model_type'] == 'task') {
				$this->_task_open = $this->_task_open | $v ['model_status'];
			} else {
				$this->_shop_open = $this->_shop_open | $v ['model_status'];
			}
		}
		$route = $this->_route;
		foreach ( $route as $k => $v ) {
			if ($this->_task_open == 0) {
				if (strpos ( $v, 'task' ) !== FALSE || $v == 'weibo') {
					unset ( $route [$k] );
				}
			}
			if ($this->_shop_open == 0) {
				if (strpos ( $v, 'shop' ) !== FALSE || $v == 'seller_list') {
					unset ( $route [$k] );
				}
			}
			if ($this->_shop_open == 0 && $this->_task_open == 0) {
				if ($v == 'case') {
					unset ( $route [$k] );
				}
			}
		}
		$this->_route = $route;
		$this->nav_filter ();
	}
	public function nav_filter() {
		$nav_arr = $this->_nav_list;
		if (($this->_task_open && $this->_shop_open) == 0) {
			foreach ( $nav_arr as $k => $v ) {
				$url = parse_url ( $v ['nav_url'] );
				parse_str ( $url ['query'], $data );
				if ($this->_task_open == 0) {
					if (in_array ( $data ['do'], array (
							'task',
							'task_list',
							'weibo'
					) )) {
						unset ( $nav_arr [$k] );
					}
				}
				if ($this->_shop_open == 0) {
					if (in_array ( $data ['do'], array (
							'shop',
							'shop_list',
							'seller_list'
					) )) {
						unset ( $nav_arr [$k] );
					}
				}
				if ($this->_shop_open == 0 && $this->_task_open == 0) {
					if ($data ['do'] == 'case') {
						unset ( $nav_arr [$k] );
					}
				}
			}
		}
		$this->_nav_list = $nav_arr;
	}
	function init_session() {
		keke_session_class::get_instance ();
		isset ( $_REQUEST ['PHPSESSID'] ) && session_id ( $_REQUEST ['PHPSESSID'] );
		if (! isset ( $_SESSION )) {
			session_start ();
		}
	}
	function init_out_put() {
		($_SERVER ['REQUEST_METHOD'] == 'GET' && ! empty ( $_SERVER ['REQUEST_URI'] )) and kekezu::filter_xss ();
		ob_start ();
		header ( "Content-Type:text/html; charset=" . CHARSET );
	}
}
$ipath = dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "keke_kppw_install.lck";
file_exists ( $ipath ) == true or header ( "Location: install/index.php" );
kekezu::register_autoloader ();
$kekezu = &kekezu::get_instance ();
keke_lang_class::load_lang_class ( 'keke_core_class' );
$_cache_obj = $kekezu->_cache_obj;
$page_obj = $kekezu->_page_obj;
$template_obj = $kekezu->_tpl_obj;
