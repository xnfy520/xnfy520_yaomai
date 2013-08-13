<?php

	return array(
		//数据库相关配置
		'DB_TYPE'=>'mysql', //使用数据库类型
		'DB_HOST'=>'localhost', //数据库服务器地址
		'DB_NAME'=>'xnfy520_yaomai', //数据库名称
		'DB_USER'=>'root', //数据库用户名
		'DB_PWD'=>'root', //数据库密码
		'DB_PORT'=>3306, //数据库端口
		'DB_PREFIX'=>'xnfy520_yaomai_', //数据库默认表前缀
		'DB_CHARSET'=>'utf8', //数据库编码

//		'TMPL_TEMPLATE_SUFFIX'=>'.tpl', //默认模版文件后缀
		'TMPL_L_DELIM'=>'<{', //模版标签开始标记
		'TMPL_R_DELIM'=>'}>', //模版标签结束标记

		'LOCALHOST'=>$_SERVER['HTTP_HOST'],

		'login_config'=>array(
			'sina_wb_akey'=>'2679501201',
			'sina_wb_skey'=>'51f3260491afc09623bfbfa3c245a353',
			'sina_wb_callback_url'=>'http://'.$_SERVER['HTTP_HOST'].'/Index/callback',
			'qq_akey'=>'100380462',
		),

		'ALIPAY_CONFIG_COMMODITY'=>array(
			'partner'=>'2088701999304820',
			'key'=>'q6veewe5dfjg5psk691jx34erofoksvj',
			'sign_type'=>'MD5',
			'input_charset'=>'utf-8',
			'cacert'=>'http://'.$_SERVER['HTTP_HOST'].'/xnfy520_yaomai/',
			'transport'=>'http',
		),

		'alipay_api'=>array(
			'return_url'=>'http://'.$_SERVER['HTTP_HOST'].'/xnfy520_yaomai/index.php/Pay/return_url',
			'notify_url'=>'http://'.$_SERVER['HTTP_HOST'].'/xnfy520_yaomai/index.php/Pay/notify_url',

			'show_url'=>'http://'.$_SERVER['HTTP_HOST'].'/xnfy520_yaomai/index.php/Pay/show_url',

			'seller_email'=>'78699721@qq.com',
			'out_trade_no'=>strrev(time()),
			'subject'=>'要买家具',
			'body'=>'要买家具',
		),
//https://tradeexprod.alipay.com/fastpay/createDirectPayByBuyer.htm?partner=2088701999304820&out_trade_no=6483216731
		/*** Provinces 已使用***/
		'provinces_level'=>array(
			'area_level' => 0,
			'province_level' => 1,
			'city_level' => 2,
			'county_level' => 3,
		),

		/*** Address 已使用***/
		'address_level'=>array(
			'province_level' => 1,
			'city_level' => 2,
			'county_level' => 3,
		),

		/*** InstationMessage 站内信类型**/
		'instation_message_type'=>array(
			'personal'=>1,
			'people'=>2,
			'group'=>3,
		),

		/*** 搜索配置***/
		'search_config'=>array(
			'weekly_clear'=>1,
			'day_clear'=>15,
			'less_than_clear'=>50,
			'more_than_show'=>0,
			'show_limit'=>7
		),

		/*** 首页推荐配置***/
		'index_recommend_config'=>array(
			'groupon'=>array(
				'type'=>1,
				'name'=>'团购详情页-推荐',
			), //超值优惠
			'member'=>array(
				'type'=>2,
				'name'=>'个人中心页-推荐',
			),//精品推荐
			'cart'=>array(
				'type'=>3,
				'name'=>'购物车页-推荐',
			),//区域特产
		),

		/**送货时间配置**/
		'delivery_time'=>array(
			'1'=>'只工作日送货',
			'2'=>'工作日、双休日与假日均可送货',
			'3'=>'只双休日、假日送货',
		),

		/**送货方式配置**/
//		'delivery_type'=>array(
//			'express'=>array('name'=>'快递','type'=>'express','price'=>5,'description'=>'系统自动判断选择快递'),
//			'ems'=>array('name'=>'EMS','type'=>'ems','price'=>15,'description'=>'可能较长时间送达，新疆、西藏、宁夏、青海、内蒙古只支持EMS'),
//		),

		/*** User 已使用***/
		'USER_GROUP'=>array(
			'root'=>array(
				'name'=>'管理员',
				'level'=>0,
				'description'=>'可管理网站所有功能'
			),
			// 'admin'=>array(
			// 	'name'=>'网站管理',
			// 	'level'=>1,
			// 	'description'=>'可管理网站所有功能'
			// ),
			// 'province'=>array(
			// 	'name'=>'省级管理',
			// 	'level'=>2,
			// 	'description'=>'可管理指定省级下所有商户，用户'
			// ),
			// 'city'=>array(
			// 	'name'=>'市级管理',
			// 	'level'=>3,
			// 	'description'=>'可管理指定市级下所有用户'
			// ),
			// 'merchant'=>array(
			// 	'name'=>'商户会员',
			// 	'level'=>4,
			// 	'description'=>'可管理指定市级下所有用户'
			// ),
			'member'=>array(
				'name'=>'会员',
				'level'=>5,
				'description'=>''
			)
		),

		/*** 广告 已使用***/
		'Advert_Category'=>array(
			'index_wheel_sowing_advert'=>array(
				'name'=>'首页轮播广告',
				'tip_size'=>'请上传尺寸为 宽480px*高290px 的图片',
				'type'=>'index_wheel_sowing_advert',
				'description'=>''
			),
			'global_left_side_advert'=>array(
				'name'=>'全局左侧广告',
				'tip_size'=>'请上传尺寸为 宽180px*高360px 的图片',
				'type'=>'global_left_side_advert',
				'description'=>''
			),
			'global_right_side_advert'=>array(
				'name'=>'全局右侧广告',
				'tip_size'=>'请上传尺寸为 宽180px*高360px 的图片',
				'type'=>'global_right_side_advert',
				'description'=>''
			),
			'commodity_details_page_advert'=>array(
				'name'=>'商品详情页广告',
				'tip_size'=>'请上传尺寸为 宽740px*高80px 的图片',
				'type'=>'commodity_details_page_advert',
				'description'=>''
			)
		),


		'LOCALHOST'=>$_SERVER['HTTP_HOST'],

		'APP_LIST' => array('Home', 'Admin'),
		'APP_LEVEL' => 1,

		'MODEL_LIST' => array(),
		'MODEL_LEVEL' => 2,


	//	'ORG_LINK'=>$_SERVER['HTTP_REFERER'],

	//	'SESSION_AUTO_START'=>false,

		'USER_AUTH_ON'              =>true,
		'USER_AUTH_TYPE'			=>1,
		'USER_AUTH_KEY'             =>'authId',
		'ADMIN_AUTH_KEY'			=>'administrator',
		'USER_AUTH_MODEL'           =>'User',
		'AUTH_PWD_ENCODER'          =>'md5',
		'USER_AUTH_GATEWAY'         =>'/Public/login',
		'NOT_AUTH_MODULE'           =>'Public',
//		'REQUIRE_AUTH_MODULE'       =>'',
//		'NOT_AUTH_ACTION'           =>'',
//		'REQUIRE_AUTH_ACTION'       =>'',
//		'GUEST_AUTH_ON'             =>false,
//		'GUEST_AUTH_ID'             =>0,
//		'DB_LIKE_FIELDS'            =>'title|remark',
//		'RBAC_ROLE_TABLE'           =>'emit_role',
//		'RBAC_USER_TABLE'           =>'emit_role_user',
//		'RBAC_ACCESS_TABLE'         =>'emit_access',
//		'RBAC_NODE_TABLE'           =>'emit_node',


	);
