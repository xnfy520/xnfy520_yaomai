<?php

	class HelpCenterCategoryModel extends RelationModel{

	protected $_link = array(

		'HelpCenterInformation'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'HelpCenterInformation',
			'class_name'=>'HelpCenterInformation',
			'foreign_key'=>'pid',
			'condition'=>'publish=1',
			'mapping_fields'=>'id,pid,name,sort',
			'mapping_order'=>'sort,id',
			'mapping_limit'=>4
		),

	);

}