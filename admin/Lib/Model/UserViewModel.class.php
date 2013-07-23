<?php

class UserViewModel extends ViewModel{

	public $viewFields = array(
		'User'=>array('id', 'username','email','status','regdate', 'logindate'),
		'RoleUser'=>array('roleid', '_on'=>'User.id=RoleUser.userid'),
		'Role'=>array('name'=>'rolename','_on'=>'Role.id=RoleUser.roleid'),
	);

}