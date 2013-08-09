<?php

class VoteAction extends CommonAction {

	public function index(){

			import("ORG.Util.ajax_page");
			$VoteCommodity = D('VoteCommodity');

			$where['enable'] = 1;

			$count = $VoteCommodity->where($where)->count();
			$page = new page($count,15);

			$order = '';
			if(isset($_GET['sort'])){
				switch($_GET['sort']){
					case 'sales_volume':
						$order = 'sales_volume';
					break;
					case 'price':
						$order = 'price';
					break;
					case 'news':
						$order = 'create_date';
					break;
					default:
						$order = 'create_date';
					break;
				}
			}else{
				$order = 'create_date';
			}
			if(isset($_GET['by'])){
				$order = $order.' '.$_GET['by'];
			}else{
				$_GET['by'] = 'desc';
				$order = $order.' '.$_GET['by'];
			}

			$VoteCommoditys = $VoteCommodity->field('id,name,image,price,expiration_date,sales_volume,subscribe_volume,vote,subscribe,subscription')->where($where)->limit($page->setlimit())->order($order)->select();

			$this->assign('list',$VoteCommoditys);

			$this->assign('fpage',$page->fpage());
//dump($page->fpage());
			$this->display();
	}

	function details(){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$VoteCommodity = D('VoteCommodity');
			$data = $VoteCommodity->relation(true)->where('enable=1')->find($_GET['id']);
			if($data){
				if(!empty($data['p1'])){
					$data['p1'] = json_decode($data['p1'],true);
				}
				if(!empty($data['p2'])){
					$data['p2'] = json_decode($data['p2'],true);
				}
				if(!empty($data['p3'])){
					$data['p3'] = json_decode($data['p3'],true);
				}
				$this->assign('data',$data);
			//	dump($data);

				$address_config = C('address_level');
	            if(!empty($address_config) && !empty($address_config['province_level'])){
	                $Address = M('Address');
	                $provice_level = $Address->where('level='.$address_config['province_level'].' AND publish=1')->order('sort,id')->select();
	                $this->assign('provice_level',$provice_level);
	            }
				$this->display();
			}else{
				$this->redirect('/Vote');
			}
		}else{
			$this->redirect('/Vote');
		}
	}

	function vote_commdity(){
		 if($Userinfo = $this->checkLogin()){
		 	if(isset($_POST['commodity_id']) && !empty($_POST['commodity_id'])){
		 		$VoteCommodity = M('VoteCommodity');
		 		$co = $VoteCommodity->where('enable=1')->find($_POST['commodity_id']);
		 		if($co){
		 			if($co['expiration_date']<=time()){
		 				$this->ajaxReturn(0,'该投票商品已结束',0);
		 			}else{
		 				$tmp = array(array('commodity_id'=>$_POST['commodity_id'],'by_user'=>$Userinfo['id']));
	 					if(empty($co['votes'])){
	 						$votes['votes'] = json_encode($tmp);
	 					}else{
	 						$check = json_decode($co['votes'],true);
	 						for($i=0;$i<count($check);$i++){
	 							if($check[$i]['by_user']==$Userinfo['id']){
	 								$this->ajaxReturn(0,'您已经对此商品投过票了',0);
	 								break;
	 							}
	 						}
	 						$votes['votes'] = json_encode(array_merge($check,$tmp));
	 					}
	 					$votes['vote'] = $co['vote']+1;
	 					$User = M('User');
	 					$cou = array(array('commodity_id'=>$_POST['commodity_id'],'time'=>mktime(0,0,0,date('m'),date('j'),date('Y'))));
	 					if(empty($Userinfo['coupons'])){
	 						$User->where('id='.$Userinfo['id'])->setField('coupons',json_encode($cou));
	 					}else{
	 						$d = mktime(0,0,0,date('m'),date('j'),date('Y'));
	 						$cos = json_decode($Userinfo['coupons'],true);
	 						$n = 0;
	 						for($s=0;$s<count($cos);$s++){
	 							if($cos[$s]['time']==$d){
	 								$n++;
	 							}
	 						}
	 						if($n<10){
	 							$User->where('id='.$Userinfo['id'])->setField('coupons',json_encode(array_merge($cos,$cou)));
	 						}
	 					}
	 					if($VoteCommodity->where('id='.$_POST['commodity_id'])->setField($votes)){
	 						$this->ajaxReturn(0,'投票成功',1);
	 					}else{
	 						$this->ajaxReturn(0,'投票失败',0);
	 					}
		 			}
		 		}else{
		 			$this->ajaxReturn(0,'异常操作',0);
		 		}
		 	}else{
		 		$this->ajaxReturn(0,'异常操作',0);
		 	}
		 }else{
		 	$this->ajaxReturn(0,'请先登录再投票',0);
		 }
	}

	function schedule(){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$VoteCommodity = M('VoteCommodity');
			$co = $VoteCommodity->where('enable=1')->find($_GET['id']);
			if($co){
				if($co['expiration_date']<=time()){
		 			$this->redirect('/Vote/details/id/'.$_GET['id']);
	 			}else{
	 				if($Userinfo = $this->checkLogin()){
	 					$flag = true;
	 					$tmp = array(array('commodity_id'=>$_GET['id'],'by_user'=>$Userinfo['id']));
	 					if(empty($co['votes'])){
	 						$votes['votes'] = json_encode($tmp);
	 					}else{
	 						$check = json_decode($co['votes'],true);
	 						for($i=0;$i<count($check);$i++){
	 							if($check[$i]['by_user']==$Userinfo['id']){
	 								$flag = false;
	 								break;
	 							}
	 						}
	 						$votes['votes'] = json_encode(array_merge($check,$tmp));
	 					}
	 					if($flag){
	 						$votes['vote'] = $co['vote']+1;
		 					$User = M('User');
		 					$cou = array(array('commodity_id'=>$_GET['id'],'time'=>mktime(0,0,0,date('m'),date('j'),date('Y'))));
		 					if(empty($Userinfo['coupons'])){
		 						$User->where('id='.$Userinfo['id'])->setField('coupons',json_encode($cou));
		 					}else{
		 						$d = mktime(0,0,0,date('m'),date('j'),date('Y'));
		 						$cos = json_decode($Userinfo['coupons'],true);
		 						$n = 0;
		 						for($s=0;$s<count($cos);$s++){
		 							if($cos[$s]['time']==$d){
		 								$n++;
		 							}
		 						}
		 						if($n<10){
		 							$User->where('id='.$Userinfo['id'])->setField('coupons',json_encode(array_merge($cos,$cou)));
		 						}
		 					}
		 					$VoteCommodity->where('id='.$_GET['id'])->setField($votes);
	 					}
	 				}
	 				$this->assign('data',$co);
	 				$this->display();
	 			}
			}else{
				$this->redirect('/Vote');
			}
		}else{
			$this->redirect('/Vote');
		}
	}

}
