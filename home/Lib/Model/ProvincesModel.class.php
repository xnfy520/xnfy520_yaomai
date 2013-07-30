<?php

	class ProvincesModel extends RelationModel{

        protected $_link = array(

            'Provinces'=>array(
                'mapping_type'=>HAS_MANY,
                'mapping_name'=>'Provinces',
                'class_name'=>'Provinces',
				'parent_key'=>'pid'
            ),

        );

}