<?php

class RoleUserModel extends RelationModel{

	protected $_link = array(

		'User'=>array(
			'mapping_type'=>BELONGS_TO,
			'class_name'=>'User',
			'mapping_name'=>'userinfo',
			'foreign_key'=>'userid',
			'mapping_fields'=>'username',
		)

	);

}