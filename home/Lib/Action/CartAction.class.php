<?php

class CartAction extends CommonAction {

	public function index(){
		$IndexRecommend = D('IndexRecommend');
        $cr = $IndexRecommend->relation(true)->where('type=3')->order('sort,id')->select();
        $this->assign('cr',$cr);
		$this->display();
	}

}
