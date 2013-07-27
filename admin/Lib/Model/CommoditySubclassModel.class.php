<?php

	class CommoditySubclassModel extends RelationModel{

	protected $_validate = array(
		array('name', 'require', "名称不能为空", 1, 'regex', 3),
		array('name', 'name', '名称已经存在', 1, 'unique', 3),
	);

	protected $_auto = array(
		array('create_date', 'time', 1, 'function'), //创建时间
		array('modify_date', 'time', 2, 'function'), //修改时间
	);

		protected $_link = array(

			'CommodityList'=>array(
				'mapping_type'=>HAS_MANY,
				'mapping_name'=>'CommodityList',
				'class_name'=>'CommodityList',
				'foreign_key'=>'cid',
			),

		);


}