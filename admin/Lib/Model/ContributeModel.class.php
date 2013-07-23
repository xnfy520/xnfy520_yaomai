<?php

	class ContributeModel extends RelationModel{

//	protected $_validate = array(
//		array('name', 'require', "名称不能为空", 1, 'regex', 3),
//		array('name', '1,10', "名称过长", 1, 'length', 3),
//		array('image', 'require', "图片不能为空", 1, 'regex', 3),
//		array('link', 'url', "链接地址格式错误", 2, 'regex', 3),
//
//        array('sort', 'require', "排序值不能为空", 1, 'regex', 3),
//        array('sort', 'number', "排序值必须为整数", 1, 'regex', 3),
//        array('sort', '0,255', "排序值必须在0-255", 1, 'between', 3),
//
//	);

    protected $_auto = array(
        array('CreateDate', 'time', 1, 'function'), //创建时间
        array('ModifyDate', 'time', 2, 'function'), //修改时间
		array('userid','getUserid',1,'callback'), //用户id
		array('no','getNo',1,'callback'), //唯一编号
    );

	function getUserid(){
		if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
			return $_SESSION['userid'];
		}
	}

	function getNo(){
		$no = rand(10000,99999);
		$no.=substr(time(),4,9);
		return $no;
	}


	protected $_link = array(

		'Theme'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'Theme',
			'class_name'=>'Theme',
			'foreign_key'=>'themeid',
		),

		'User'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'User',
			'class_name'=>'User',
			'foreign_key'=>'userid',
		),

	);


}