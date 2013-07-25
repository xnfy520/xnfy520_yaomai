<?php

	class GrouponCategoryModel extends RelationModel{

	protected $_validate = array(
		array('name', 'require', "名称不能为空", 1, 'regex', 3),
		array('name', '1,10', "名称过长", 1, 'length', 3),
		array('name', 'name', '名称已经存在', 1, 'unique', 3),

        array('sort', 'require', "排序值不能为空", 1, 'regex', 3),
        array('sort', 'number', "排序值必须为整数", 1, 'regex', 3),
        array('sort', '0,255', "排序值必须在0-255", 1, 'between', 3),

	);

    protected $_auto = array(
        array('create_date', 'time', 1, 'function'), //创建时间
        array('modify_date', 'time', 2, 'function'), //修改时间
    );

	protected $_link = array(

		'GrouponCommondity'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'GrouponCommodity',
			'class_name'=>'GrouponCommodity',
			'foreign_key'=>'pid',
		),

	);

}