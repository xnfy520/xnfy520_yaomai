<?php

	class CommodityEvaluateModel extends RelationModel{

		protected $_link = array(

			'MemberOrder'=>array(
				'mapping_type'=>BELONGS_TO,
				'mapping_name'=>'MemberOrder',
				'class_name'=>'MemberOrder',
				'foreign_key'=>'by_order_id',
			),

			'User'=>array(
				'mapping_type'=>BELONGS_TO,
				'mapping_name'=>'User',
				'class_name'=>'User',
				'foreign_key'=>'by_user',
				'mapping_fields'=>'username,nickname'
			),

		);

}