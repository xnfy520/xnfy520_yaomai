<?php

class CommodityListModel extends RelationModel{

	protected $_link = array(
		'CommoditySpecification'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'CommoditySpecification',
			'class_name'=>'CommoditySpecification',
			'foreign_key'=>'lid',
			'condition'=>'enable=1',
			'mapping_order'=>'sort,id'
		),
		'CommodityParameter'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'CommodityParameter',
			'class_name'=>'CommodityParameter',
			'foreign_key'=>'lid',
			'condition'=>'enable=1',
			'mapping_order'=>'sort,id'
		),
		'CommodityImage'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'CommodityImages',
			'class_name'=>'CommodityImages',
			'foreign_key'=>'lid',
			'mapping_order'=>'id'
		),

	);

}