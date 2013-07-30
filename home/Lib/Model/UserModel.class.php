<?php

	class UserModel extends RelationModel{

		protected $_link = array(
			'Role'=>array(
				'mapping_type'=>BELONGS_TO,
				'mapping_name'=>'Role',
				'class_name'=>'Role',
				'foreign_key'=>'roleid',
			),

			'IntegralExchangeLogs'=>array(
				'mapping_type'=>HAS_MANY,
				'mapping_name'=>'IntegralExchangeLogs',
				'class_name'=>'IntegralExchangeLogs',
				'foreign_key'=>'by_user',
			),

		);

		protected $_validate = array(
			array('username', 'require',"用户名称不能为空", 1, 'regex', 3),
			array('username', '/^[a-zA-Z0-9_]+$/',"用户名称必须为字母，数字，或下划线", 1, 'regex', 3),
			array('username', 'username', '用户名称已经存在', 1, 'unique', 3),

			array('nickname', 'nickname', '昵称已经存在', 2, 'unique', 2),

			array('password', 'require',"用户密码不能为空", 1, 'regex', 1),
			array('password', '6,12', "密码长度为6-12个字符", 2, 'length', 3),

			array('email', 'require',"邮箱不能为空", 1, 'regex', 3),
			array('email', 'email',"邮箱格式为电子邮件", 1, 'regex', 1),
			array('email', 'username', '邮箱已经存在', 1, 'unique', 3),


		);

		protected $_auto = array(
			array('regdate', 'time', 1, 'function'), //注册时间
			array('logindate', 'time', 1, 'function'), //最后登录时间
			array('regip', '_getIP', 1, 'callback'), //注册IP
			array('loginip', '_getIP', 1, 'callback'), //最后登录IP
			array('nickname','username',1,'field'), //密码MD5
			array('password','md5',1,'function'), //密码MD5
		);

		protected function _getIP(){
			return $_SERVER['REMOTE_ADDR'];
		}

	}