<?php

	class FolkCustomProvincesModel extends RelationModel{

	protected $_link = array(

		'FolkCustomDirection'=>array(
			'mapping_type'=>BELONGS_TO,
			'mapping_name'=>'FolkCustomDirection',
			'class_name'=>'FolkCustomDirection',
			'foreign_key'=>'pid',
			'condition'=>'publish=1'
		),

//		'FolkCustomInformation'=>array(
//			'mapping_type'=>HAS_MANY,
//			'mapping_name'=>'FolkCustomInformation',
//			'class_name'=>'FolkCustomInformation',
//			'foreign_key'=>'cid',
//			'condition'=>'publish=1'
//		),

	);

}