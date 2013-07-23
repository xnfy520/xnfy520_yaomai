<?php

class CommodityPushAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			$this->display();
		}else{
			$this->redirect('/Public/login');
		}
	}

}