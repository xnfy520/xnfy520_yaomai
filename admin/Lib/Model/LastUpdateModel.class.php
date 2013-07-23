<?php

	class LastUpdateModel extends RelationModel{

	protected $_validate = array(
		array('name', 'require', "名称不能为空", 1, 'regex', 3),
		array('name', '1,15', "名称过长", 1, 'length', 3),
		array('link', 'require', "链接地址不能为空", 1, 'regex', 3),
		array('link', 'url', "链接地址格式错误", 2, 'regex', 3),

        array('sort', 'require', "排序值不能为空", 1, 'regex', 3),
        array('sort', 'number', "排序值必须为整数", 1, 'regex', 3),
        array('sort', '0,9999', "排序值必须在0-9999", 1, 'between', 3),
	);

        protected $_auto = array(
            array('create_date', 'time', 1, 'function'), //创建时间
            array('modify_date', 'time', 2, 'function'), //修改时间
        );

}