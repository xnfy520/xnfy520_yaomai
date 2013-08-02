<?php

class HelpCenterInformationModel extends RelationModel{

	protected $_link = array(

		'HelpCenterCategory'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'HelpCenterCategory',
			'class_name'=>'HelpCenterCategory',
			'foreign_key'=>'pid',
		),

	);

}