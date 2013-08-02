<?php

class CommodityListModel extends RelationModel{

	protected $_link = array(
		'CommodityImage'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'CommodityImages',
			'class_name'=>'CommodityImages',
			'foreign_key'=>'lid',
			'mapping_order'=>'id',
			'condition'=>'bys=1',
		),
		'CommodityDetails'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'CommodityDetails',
			'class_name'=>'CommodityDetails',
			'foreign_key'=>'did',
			'mapping_order'=>'sort,id'
		),
		'Stylist'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'Stylist',
			'class_name'=>'Stylist',
			'foreign_key'=>'stylist_id',
		),

	);

}