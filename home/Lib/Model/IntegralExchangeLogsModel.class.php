<?php

class IntegralExchangeLogsModel extends RelationModel{

	protected $_link = array(
		'IntegralGiftList'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'IntegralGiftList',
			'class_name'=>'IntegralGiftList',
			'foreign_key'=>'by_gift_id',
			'condition'=>'publish=1',
		),
	);

}