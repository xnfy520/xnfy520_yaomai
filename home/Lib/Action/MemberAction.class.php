<?php

class MemberAction extends CommonAction {

    public function index(){
        $IndexRecommend = D('IndexRecommend');
        $cr = $IndexRecommend->relation(true)->where('type=2')->order('sort,id')->select();
        $this->assign('cr',$cr);

    	$this->display();
    }


    function center(){
    	$this->display();
    }

    function CommodityOrder(){
    	$this->display();
    }

    function GrouponOrder(){
    	$this->display();
    }

	function VoteOrder(){
    	$this->display();
    }

    function coupon(){
    	$this->display();
    }

    function information(){
    	$this->display();
    }

    function address(){
    	$this->display();
    }

    function password(){
    	$this->display();
    }

    function message(){
    	$this->display();
    }

    function suggest(){
    	$this->display();
    }

}
