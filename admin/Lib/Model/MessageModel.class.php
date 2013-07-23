<?php

	class MessageModel extends RelationModel{

		protected $_link = array(

			'MessageReply'=>array(
				'mapping_type'=>HAS_ONE,
				'mapping_name'=>'MessageReply',
				'class_name'=>'MessageReply',
				'foreign_key'=>'reply_id',
			),

		);

}