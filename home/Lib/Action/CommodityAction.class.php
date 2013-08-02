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
			$this->redirect('/Index');
		}

	}

	function details(){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$CommodityList = D('CommodityList');
			$data = $CommodityList->relation(true)->where('enable=1')->find($_GET['id']);
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
//			dump($data);
			$this->display();
		}else{
			$this->redirect('/Index');
		}
	}

}
