<?php

	class FavoritesCommodityModel extends RelationModel{

		protected $_link = array(

			'CommodityList'=>array(
				'mapping_type'=>BELONGS_TO,
				'mapping_name'=>'CommodityList',
				'class_name'=>'CommodityList',
				'foreign_key'=>'by_commodity',
				'condition'=>'enable=1'
			),

		);

}