<?php

	class IndexRecommendModel extends RelationModel{

	protected $_link = array(

		'CommodityList'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'CommodityList',
			'class_name'=>'CommodityList',
			'foreign_key'=>'commodity_id',
			'condition'=>'enable=1',
			'mapping_fields'=>'id,pid,cid,name,image,price',
		),

	);

}