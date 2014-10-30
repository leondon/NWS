<?php

error_reporting ( 0 ); //Leon这个是报错总开关
//// Turn off all error reporting
//error_reporting(0);
//
//// Report simple running errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
//
//// Reporting E_NOTICE can be good too (to report uninitialized
//// variables or catch variable name misspellings ...)
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//
//// Report all errors except E_NOTICE
//error_reporting(E_ALL & ~E_NOTICE);
//
//// Report all PHP errors (see changelog)
//error_reporting(E_ALL);
//
//// Report all PHP errors
//error_reporting(-1);
//
//// Same as error_reporting(E_ALL);
//ini_set('error_reporting', E_ALL);
define ( 'ADMIN_UID', '1' );
define ( 'DBHOST', 'localhost');
define ( 'DBNAME', 'NWS');
define ( 'DBUSER', 'root');
define ( 'DBPASS', 'Init12');
define ( 'DBCHARSET', 'utf8' );
define ( 'CHARSET', 'utf-8' );
define ( 'DBTYPE', 'mysql' );
define ( 'TABLEPRE', 'nws_'); // 表前缀
define ( 'ENCODE_KEY', 'keke' ); // 加密KEY
define ( 'GZIP', TRUE ); // 开启GIZP
define ( 'KEKE_DEBUG', 0); // 开启调试模式
define ( "TPL_CACHE", 1); // 模板缓存
define ( 'IS_CACHE', 1);
define ( 'CACHE_TYPE', 'file' ); // 缓存类型
define ( 'COOKIE_DOMAIN', '' ); // Cookie 作用域
define ( 'COOKIE_PATH', '/'); // Cookie 作用路径
define ( 'COOKIE_PRE', 'kekeWitkey' );
define ( 'COOKIE_TTL', 0 ); // Cookie 生命周期，0 表示随浏览器进程
define ( 'SESSION_MODULE', 'files' );
define ( 'SYS_START_TIME', time () );

// 设置时区
function_exists ( 'date_default_timezone_set' ) and date_default_timezone_set ( 'PRC' );