<?php

	class CommodityCategoryModel extends RelationModel{

		protected $_link = array(

			'CommoditySubclass'=>array(
				'mapping_type'=>HAS_MANY,
				'mapping_name'=>'CommoditySubclass',
				'class_name'=>'CommoditySubclass',
				'foreign_key'=>'pid',
				'condition'=>'publish=1',
			//	'mapping_fields'=>'id,pid,name,sort',
				'mapping_order'=>'sort,id',
			//	'mapping_limit'=>4
			),

		);

}