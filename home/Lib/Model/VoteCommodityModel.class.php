<?php

class VoteCommodityModel extends RelationModel{

	protected $_link = array(
		'CommodityImage'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'CommodityImages',
			'class_name'=>'CommodityImages',
			'foreign_key'=>'lid',
			'mapping_order'=>'id',
			'condition'=>'bys=2',
		),
		'VoteDetails'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'VoteDetails',
			'class_name'=>'VoteDetails',
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