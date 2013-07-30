<?php

class FolkCustomInformationModel extends RelationModel{

	protected $_link = array(

		'FolkCustomDirection'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'FolkCustomDirection',
			'class_name'=>'FolkCustomDirection',
			'foreign_key'=>'pid',
			'condition'=>'publish=1'
		),

		'FolkCustomProvinces'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'FolkCustomProvinces',
			'class_name'=>'FolkCustomProvinces',
			'foreign_key'=>'cid',
			'condition'=>'publish=1'
		),

	);

}