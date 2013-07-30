<?php

	class IntegralGiftCategoryModel extends RelationModel{

	protected $_link = array(

		'IntegralGiftList'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'IntegralGiftList',
			'class_name'=>'IntegralGiftList',
			'foreign_key'=>'pid',
		),

	);

}