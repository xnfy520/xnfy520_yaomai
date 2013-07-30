<?php

	//前台配置
	$org = array(

//		前台URL模式
		'URL_MODEL'=>1, //使用REWRITE模式

		'DEFAULT_THEME'=>'default', //默认模板主题目录

		'URL_HTML_SUFFIX'=>'html',

	//	'SHOW_PAGE_TRACE'=>true, //显示页面trace(踪迹)信息

//		'LAYOUT_ON'=>true,

		"LOAD_EXT_FILE"=>"alipay_core.function",

		'LOG_RECORD'=>false, //是否记录日志信息

		'LOG_LEVEL'  =>'ERR', // 只记录EMERG ALERT CRIT ERR 错误

		'TOKEN_ON'=>false,

	);

//	载入公共配置文件
	$new = require './config.inc.php';
	$con = require './siteconfig.inc.php';

	return array_merge($org, $new, $con);



?>
