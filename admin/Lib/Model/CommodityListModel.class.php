<?php

class CommodityListModel extends RelationModel{

	protected $_link = array(

		'HomeGrownProductCategory'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'HomeGrownProductCategory',
			'class_name'=>'HomeGrownProductCategory',
			'foreign_key'=>'cid',
		),

		'User'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'User',
			'class_name'=>'User',
			'foreign_key'=>'by_user',
		),

	);

}