<?php

class GrouponAction extends CommonAction {

	public function index(){

		$GrouponCategory = M('GrouponCategory');
		$GrouponCategorys = $GrouponCategory->where('publish=1')->order('sort,id')->select();
		$this->assign('gclist',$GrouponCategorys);

		import("ORG.Util.ajax_page");
		$GrouponCommodity = D('GrouponCommodity');

		$where['enable'] = 1;
		if(isset($_GET['pid']) && !empty($_GET['pid'])){
			$where['pid'] = $_GET['pid'];
		}

		$count = $GrouponCommodity->where($where)->count();
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

		$GrouponCommoditys = $GrouponCommodity->field('id,pid,name,image,price,org_price,expiration_date,sales_volume')->where($where)->limit($page->setlimit())->order($order)->select();

		$this->assign('list',$GrouponCommoditys);
//dump($GrouponCommoditys);
		$this->assign('fpage',$page->fpage());

		$this->display();
	}

	function details(){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$GrouponCommodity = D('GrouponCommodity');
			$data = $GrouponCommodity->find($_GET['id']);
			if($data){
				$data['zk'] = round(($data['price'] / $data['org_price']),2)*10;
				$this->assign('data',$data);
				$GrouponCommodity->where('id='.$_GET['id'])->setInc('views');
				$recommend = $GrouponCommodity->field('id,pid,name,image,price,org_price,expiration_date,sales_volume')->where('enable=1 AND expiration_date>'.time().' AND id<>'.$_GET['id'])->order('sort,id')->limit(7)->select();
			//	dump($recommend);
				$this->assign('gr',$recommend);
				$this->display();
			}else{
				$this->redirect('/Groupon');
			}
		}else{
			$this->redirect('/Groupon');
		}

	}

	function ajax_commodity_add_cart(){
		if(!empty($_POST['commodity_id']) && !empty($_POST['quantity'])){
			if($Userinfo = $this->checkLogin()){
				$GrouponCommodity = M('GrouponCommodity');
				$gc = $GrouponCommodity->where('enable=1')->find($_POST['commodity_id']);
				if($gc){
					if($gc['expiration_date']<=time()){
						$this->ajaxReturn(0,"此团购商品已经结束",0);
					}else{
						$map['by_user'] = $Userinfo['id'];
						$map['by_comodity'] = $_POST['commodity_id'];
						$map['type'] = 2;
						$Carts = M('Carts');
						$count = $Carts->where($map)->count();
						if($count>0){
							$this->ajaxReturn(0,"该商品已经在您的购物车中了！",1);
						}else{
							$map['quantity'] = $_POST['quantity'];
							$map['create_date'] = time();
							if($Carts->add($map)){
								$Carts->where('by_user='.$Userinfo['id'].' AND type<>2')->delete();
								$this->ajaxReturn(0,"加入购物车成功！",1);
							}else{
								$this->ajaxReturn(0,"加入购物车失败！",0);
							}
						}
					}

				}else{
					$this->ajaxReturn(0,"异常操作！",0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作！",0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作！",0);
		}
	}

}
