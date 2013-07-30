<?php

class PublicAction extends Action {

	function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4, 1, 'png', 60,23);
	}

//	function verify(){
//		session_start();
//		import('ORG.Util.validation');
//		$img = new validation();
//		$img->code();
//		$_SESSION['verify'] = md5($img->getcode());
//	}
}
