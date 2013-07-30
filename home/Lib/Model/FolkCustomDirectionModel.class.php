<?php

	class FolkCustomDirectionModel extends RelationModel{

	protected $_link = array(

		'FolkCustomProvinces'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'FolkCustomProvinces',
			'class_name'=>'FolkCustomProvinces',
			'foreign_key'=>'pid',
			'condition'=>'publish=1'
		),

		'FolkCustomInformation'=>array(
			'mapping_type'=>HAS_MANY,
			'mapping_name'=>'FolkCustomInformation',
			'class_name'=>'FolkCustomInformation',
			'foreign_key'=>'pid',
			'condition'=>'publish=1',
			'mapping_fields'=>'name',
		),

	);

}