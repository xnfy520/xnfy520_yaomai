<?php

	class CommodityCategoryModel extends RelationModel{

		protected $_link = array(

			'CommoditySubclass'=>array(
				'mapping_type'=>HAS_MANY,
				'mapping_name'=>'CommoditySubclass',
				'class_name'=>'CommoditySubclass',
				'foreign_key'=>'pid',
			),

		);

}