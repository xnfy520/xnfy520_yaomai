<?php

class IntegralAreaAction extends CommonAction {

    public function index(){

		$IntegralGiftCategory = D('IntegralGiftCategory');
		$IntegralGiftCategoryinfo = $IntegralGiftCategory->relation(true)->where('publish=1')->order('sort,create_date')->select();
		$this->assign('IntegralGiftCategoryinfo',$IntegralGiftCategoryinfo);

		$IntegralLimit = M('IntegralLimit');
		$IntegralLimitinfo = $IntegralLimit->where('publish=1')->order('sort,create_date')->select();
		$this->assign('IntegralLimitinfo',$IntegralLimitinfo);

		$IntegralGiftList = M('IntegralGiftList');
		$this->assign('count',$IntegralGiftList->where('publish=1')->count());

		import("ORG.Util.emit_ajax_page");
		$datas['publish'] = 1;
		if(isset($_GET['pid']) && !empty($_GET['pid'])){
			$datas['pid'] = $_GET['pid'];
		}
		if(isset($_GET['cid']) && !empty($_GET['cid'])){
			$limit = $IntegralLimit->where('publish=1')->find($_GET['cid']);
			if(!empty($limit['first_num']) && !empty($limit['last_num'])){
				$datas['_string'] = 'need_integral>='.$limit['first_num'].' AND need_integral<='.$limit['last_num'];
			}else if(!empty($limit['first_num'])){
				$datas['_string'] = 'need_integral>='.$limit['first_num'];
			}else if(!empty($limit['last_num'])){
				$datas['_string'] = 'need_integral<='.$limit['last_num'];
			}
		}
		$counts = $IntegralGiftList->where($datas)->count();
		$page = new  page($counts,20);
		$IntegralGiftListinfo = $IntegralGiftList->where($datas)->limit($page->setlimit())->order('sort,create_date desc')->select();
		$this->assign('IntegralGiftListinfo',$IntegralGiftListinfo);
		$this->assign('fpage',$page->fpage(array(4,5,6,7,8)));
		$this->display();

    }

	function ajax_page_list(){
		$IntegralLimit = M('IntegralLimit');

		$IntegralGiftList = M('IntegralGiftList');

		import("ORG.Util.emit_ajax_page");
		$datas['publish'] = 1;
		if(isset($_GET['pid'])){
			$datas['pid'] = $_GET['pid'];
		}
		if(isset($_GET['cid']) && !empty($_GET['cid'])){
			$limit = $IntegralLimit->where('publish=1')->find($_GET['cid']);
			if(!empty($limit['first_num']) && !empty($limit['last_num'])){
				$datas['_string'] = 'need_integral>='.$limit['first_num'].' AND need_integral<='.$limit['last_num'];
			}else if(!empty($limit['first_num'])){
				$datas['_string'] = 'need_integral>='.$limit['first_num'];
			}else if(!empty($limit['last_num'])){
				$datas['_string'] = 'need_integral<='.$limit['last_num'];
			}
		}
		$counts = $IntegralGiftList->where($datas)->count();
		$page = new  page($counts,20);
		$IntegralGiftListinfo = $IntegralGiftList->where($datas)->limit($page->setlimit())->order('sort,create_date desc')->select();
		$this->assign('IntegralGiftListinfo',$IntegralGiftListinfo);
		$this->assign('fpage',$page->fpage(array(4,5,6,7,8)));
		$this->display();
	}

	public function details(){

		if(!empty($_GET['pid']) && !empty($_GET['id'])){
			$IntegralGiftCategory = D('IntegralGiftCategory');
			$IntegralGiftCategoryinfo = $IntegralGiftCategory->relation(true)->where('publish=1')->order('sort,create_date')->select();
			$this->assign('IntegralGiftCategoryinfo',$IntegralGiftCategoryinfo);

			$IntegralLimit = M('IntegralLimit');
			$IntegralLimitinfo = $IntegralLimit->where('publish=1')->order('sort,create_date')->select();
			$this->assign('IntegralLimitinfo',$IntegralLimitinfo);

			$IntegralGiftList = M('IntegralGiftList');
			$this->assign('count',$IntegralGiftList->where('publish=1')->count());

			$IntegralGiftListinfo = $IntegralGiftList->where('publish=1 AND pid='.$_GET['pid'])->find($_GET['id']);
			$this->assign('IntegralGiftListinfo',$IntegralGiftListinfo);

			$IntegralGiftList->where('id='.$_GET['id'])->setInc('views');

			$this->display();
		}else{
			$this->redirect('/IntegralArea/index');
		}

	}

	function exchange_integral(){
		if($Userinfo = $this->checkLogin()){
			if(isset($_POST['id']) && !empty($_POST['id'])){
				$User = M('User');
				$IntegralGiftList = M('IntegralGiftList');
				$IntegralGiftListinfo = $IntegralGiftList->where('publish=1')->find($_POST['id']);
				if($Userinfo['integral']>$IntegralGiftListinfo['need_integral']){
					$IntegralExchangeLogs = M('IntegralExchangeLogs');
					$map['name'] = $IntegralGiftListinfo['name'];
					$map['username'] = $Userinfo['username'];
					$map['by_user'] = $Userinfo['id'];
					$map['by_gift_id'] = $_POST['id'];
					$map['exchange_flag'] = $IntegralGiftListinfo['exchange_restriction'];
					$map['exchange_time'] = time();
					$IntegralExchangeLogsinfo = $IntegralExchangeLogs->where('by_user='.$Userinfo['id'].' AND by_gift_id='.$_POST['id'])->order('exchange_time desc')->select();
					$time = mktime(23,59,59,date('m'),date('d'),date('Y'));
					if(!empty($IntegralExchangeLogsinfo) && ($IntegralExchangeLogsinfo[0]['exchange_time']+60*60*24>=$time)){
						$this->ajaxReturn(0,"一天只能兑换同一礼品一次！",0);
					}else{
						if($IntegralGiftListinfo['exchange_restriction']==0){
							if($IntegralExchangeLogs->add($map)){
								$IntegralExchangeLogs->where('by_user='.$Userinfo['id'].' AND by_gift_id='.$_POST['id'])->setField('exchange_flag',0);
								$IntegralGiftList->where('id='.$_POST['id'])->setInc('exchange');
								$IntegralGiftList->where('id='.$_POST['id'])->setDec('inventory');
								$User->where('id='.$Userinfo['id'])->setDec('integral',$IntegralGiftListinfo['need_integral']);
								$this->ajaxReturn(0,"兑换此礼品成功！我们会尽快将此礼品发送到您指定的默认地址！",1);
							}else{
								$this->ajaxReturn(0,"兑换此礼品失败！",0);
							}
						}else{
							$count = $IntegralExchangeLogs->where('by_user='.$Userinfo['id'].' AND by_gift_id='.$_POST['id'].' AND exchange_flag>0')->count();
							if($count>=$IntegralGiftListinfo['exchange_restriction']){
								$this->ajaxReturn(0,"此礼品限制每人只能兑换".$IntegralGiftListinfo['exchange_restriction']."次,您已经兑换".$count."次，不能再继续兑换",0);
							}else{
								if($IntegralExchangeLogs->add($map)){
									$IntegralGiftList->where('id='.$_POST['id'])->setInc('exchange');
									$IntegralGiftList->where('id='.$_POST['id'])->setDec('inventory');
									$User->where('id='.$Userinfo['id'])->setDec('integral',$IntegralGiftListinfo['need_integral']);
									$this->ajaxReturn(0,"兑换此礼品成功！我们会尽快将此礼品发送到您指定的默认地址！",1);
								}else{
									$this->ajaxReturn(0,"兑换此礼品失败！",0);
								}
							}
						}
					}

				}else{
					$this->ajaxReturn(0,"您的积分不足，无法兑换此礼品,！",0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作！",0);
			}
		}else{
			$this->ajaxReturn(0,"您还没有登录，登录后可以用积分兑换此礼品！",0);
		}
	}

}
