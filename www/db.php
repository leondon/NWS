<?php
/**
* Enter description here ...
* @file  db.php
* @author fuzuchang <fuhaojunsf@gmail.com>
* @time  2014-6-19 下午1:48:08
* @copyright (c) 2007-2014 http://www.kekezu.com All rights reserved.
*/
define ( "IN_KEKE", TRUE );
include 'app_comm.php';
db_factory::execute("REPLACE INTO `".TABLEPRE."witkey_resource`(resource_id,resource_name,resource_url,submenu_id,listorder) VALUES ('138', '增值工具管理', 'index.php?do=payitem', '34', '0')");
db_factory::execute("REPLACE INTO `".TABLEPRE."witkey_resource_submenu`(submenu_id,submenu_name,menu_name,listorder,status) VALUES ('34', '增值工具', 'tool', '3', '1')");


db_factory::execute("DROP TABLE IF EXISTS ".TABLEPRE."witkey_payitem");

db_factory::execute("CREATE TABLE ".TABLEPRE."witkey_payitem (
  `item_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '付费项编号',
  `item_code` char(20) DEFAULT NULL COMMENT '付费项',
  `small_pic` varchar(100) DEFAULT NULL COMMENT '付费项小图标',
  `item_name` char(20) DEFAULT NULL COMMENT '付费项目名称',
  `item_cash` decimal(10,2) DEFAULT '0.00' COMMENT '付费项价格',
  `item_standard` char(20) DEFAULT NULL COMMENT '使用标准（天/次）',
  `item_desc` text COMMENT '描述',
  `ext` text COMMENT '扩展',
  `is_open` int(1) DEFAULT NULL COMMENT '是否开启',
  `item_type` varchar(100) DEFAULT NULL COMMENT '付费项类型',
  PRIMARY KEY (`item_id`),
  KEY `item_id` (`item_id`),
  KEY `item_code` (`item_code`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
db_factory::execute("INSERT INTO `".TABLEPRE."witkey_payitem` VALUES ('3', 'urgent', '', '任务加急', '11.00', '次', '加急图标展示，获得更高关注度，可能会产生意想不到的收获哦', null, '1', 'task')");
db_factory::execute("INSERT INTO `".TABLEPRE."witkey_payitem` VALUES ('2', 'tasktop', '', '任务置顶', '20.00', '天', '需求展示在列表的最顶端，增加曝光度和提高参与率，同时稿件质量大有提高。', '0', '1', 'task')");
db_factory::execute("INSERT INTO `".TABLEPRE."witkey_payitem` VALUES ('1', 'workhide', '', '稿件隐藏', '10.00', '次', '雇主购买稿件隐藏，可以把自己任务下的所有稿件都隐藏掉。', '0', '1', 'task')");
db_factory::execute("INSERT INTO `".TABLEPRE."witkey_payitem` VALUES ('6', 'goodstop', '', '服务置顶', '10.00', '天', '服务置顶后，该服务会在服务大厅顶部显示', null, '1', 'goods')");
db_factory::execute("INSERT INTO `".TABLEPRE."witkey_payitem` VALUES ('5', 'seohide', '', '屏蔽搜索引擎', '20.00', '次', '让您发布的信息不被百度，google等搜索引擎收录，保护您的隐私', null, '1', 'task')");


