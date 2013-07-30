<?php

	class CommodityConsultModel extends RelationModel{

		protected $_link = array(

			'CommodityList'=>array(
				'mapping_type'=>BELONGS_TO,
				'mapping_name'=>'CommodityList',
				'class_name'=>'CommodityList',
				'foreign_key'=>'by_commodity',
				'condition'=>'enable=1'
			),

			'CommodityConsult'=>array(
				'mapping_type'=>HAS_ONE,
				'mapping_name'=>'CommodityConsult',
				'class_name'=>'CommodityConsult',
				'parent_key'=>'pid'
			),

			'User'=>array(
				'mapping_type'=>BELONGS_TO,
				'mapping_name'=>'User',
				'class_name'=>'User',
				'foreign_key'=>'by_user'
			),

		);

}