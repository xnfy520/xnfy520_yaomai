<?php

class CommodityAction extends CommonAction {

	public function index(){

		if(isset($_GET['pid']) && !empty($_GET['pid'])){

			$CommodityCategory = D('CommodityCategory');
			$CommodityCategoryname = $CommodityCategory->find($_GET['pid']);
			$this->assign('ccname',$CommodityCategoryname);

			import("ORG.Util.ajax_page");
			$CommodityList = D('CommodityList');
			$where['pid'] = $_GET['pid'];
			$where['enable'] = 1;
			if(isset($_GET['cid']) && !empty($_GET['cid'])){
				$CommoditySubclass = D('CommoditySubclass');
				$CommoditySubclassname = $CommoditySubclass->where('pid='.$_GET['pid'])->find($_GET['cid']);
				$this->assign('csname',$CommoditySubclassname);
				$where['cid'] = $_GET['cid'];
			}

			$count = $CommodityList->where($where)->count();
			$page = new page($count,20);

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
						$order = 'sort,create_date';
					break;
				}
			}else{
				$order = 'sort,create_date';
			}
			if(isset($_GET['by'])){
				$order = $order.' '.$_GET['by'];
			}else{
				$_GET['by'] = 'desc';
				$order = $order.' '.$_GET['by'];
			}

			$CommodityLists = $CommodityList->field('id,pid,cid,name,image,price')->where($where)->limit($page->setlimit())->order($order)->select();

			$this->assign('list',$CommodityLists);

			$this->assign('fpage',$page->fpage());

			$this->display();

		}else{
			$this->redirect('/Index');
		}

	}

	function details(){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$CommodityList = D('CommodityList');
			$CommodityCategory = D('CommodityCategory');
			$CommoditySubclass = D('CommoditySubclass');
			$data = $CommodityList->relation(true)->find($_GET['id']);
			if(!$data){
				$this->redirect('/Index');
			}
			if(!empty($data['p1'])){
				$data['p1'] = json_decode($data['p1'],true);
			}
			if(!empty($data['p2'])){
				$data['p2'] = json_decode($data['p2'],true);
			}
			if(!empty($data['p3'])){
				$data['p3'] = json_decode($data['p3'],true);
			}
			$data['cc'] = $CommodityCategory->find($data['pid']);
			$data['cs'] = $CommoditySubclass->find($data['cid']);
			$this->assign('data',$data);
			//dump($data);
			$CommodityList->where('id='.$_GET['id'])->setInc('views');
			 $address_config = C('address_level');
            if(!empty($address_config) && !empty($address_config['province_level'])){
                $Address = M('Address');
                $provice_level = $Address->where('level='.$address_config['province_level'].' AND publish=1')->order('sort,id')->select();
                $this->assign('provice_level',$provice_level);
            }

			$this->display();
		}else{
			$this->redirect('/Index');
		}
	}

	function search(){
		if(isset($_GET['search_key']) && !empty($_GET['search_key'])){

			import("ORG.Util.ajax_page");
			$CommodityList = D('CommodityList');
			$where['enable'] = 1;
			$where['name'] = array('like',"%{$_GET['search_key']}%");

			$count = $CommodityList->where($where)->count();
			$page = new page($count,20);

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

			$CommodityLists = $CommodityList->field('id,pid,cid,name,image,price')->where($where)->limit($page->setlimit())->order($order)->select();

			$this->assign('list',$CommodityLists);

			$this->assign('fpage',$page->fpage());

			$this->display();
		}else{

			$this->redirect('/Index/index');

		}

	}

	function ajax_buy_commodity(){
		if(!empty($_POST['commodity_id']) && !empty($_POST['quantity'])){
			if($Userinfo = $this->checkLogin()){
				$CommodityList = M('CommodityList');
				$co = $CommodityList->find($_POST['commodity_id']);
				if($co){
					if($co['enable']==0){
						$this->ajaxReturn(0,"此商品已经下架",0);
					}
				}else{
					$this->ajaxReturn(0,"不存在此商品",0);
				}
				$Carts = M('Carts');
				$map['by_user'] = $Userinfo['id'];
				$map['by_comodity'] = $_POST['commodity_id'];
				$map['type'] = 1;
				$count = $Carts->where($map)->count();
				if($count>0){
					$this->ajaxReturn(0,"该商品已经在您的购物车中了！",1);
				}else{
					$map['quantity'] = $_POST['quantity'];
					$map['create_date'] = time();
					if($Carts->add($map)){
						$Carts->where('by_user='.$Userinfo['id'].' AND type<>1')->delete();
						$this->ajaxReturn(0,"加入购物车成功！",1);
					}else{
						$this->ajaxReturn(0,"加入购物车失败！",0);
					}
				}
			}else{
				$this->ajaxReturn(0,"异常操作！",0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作！",0);
		}
	}

	function ajax_commodity_add_cart(){
		if(!empty($_POST['commodity_id']) && !empty($_POST['quantity'])){
			if($Userinfo = $this->checkLogin()){
				$CommodityList = M('CommodityList');
				$co = $CommodityList->find($_POST['commodity_id']);
				if($co){
					if($co['enable']==0){
						$this->ajaxReturn(0,"此商品已经下架",0);
					}
				}else{
					$this->ajaxReturn(0,"不存在此商品",0);
				}
				$map['by_user'] = $Userinfo['id'];
				$map['by_comodity'] = $_POST['commodity_id'];
				$map['type'] = 1;
				$Carts = M('Carts');
				$count = $Carts->where($map)->count();
				if($count>0){
					$this->ajaxReturn(0,"该商品已经在您的购物车中了！",0);
				}else{
					$map['quantity'] = $_POST['quantity'];
					$map['create_date'] = time();
					if($Carts->add($map)){
						$Carts->where('by_user='.$Userinfo['id'].' AND type<>1')->delete();
						$cou = $Carts->where('by_user='.$Userinfo['id'].' AND type=1')->count();
						$this->ajaxReturn($cou,"加入购物车成功！",1);
					}else{
						$this->ajaxReturn(0,"加入购物车失败！",0);
					}
				}
			}else{
				$this->ajaxReturn(0,"异常操作！",0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作！",0);
		}
	}

}
