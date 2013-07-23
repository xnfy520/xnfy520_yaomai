<?php

class CommodityListAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			if(isset($_GET['pid']) && !empty($_GET['pid'])){

				$CommoditySubclass = M('CommoditySubclass');
				$list = $CommoditySubclass->where('pid='.$_GET['pid'])->order('sort')->select();
				$this->assign('clist', $list);

				import("ORG.Util.emit_ajax_page");
				$CommodityList = D('CommodityList');

				if(isset($_GET['pid']) && !empty($_GET['pid'])){
					$datas['pid'] = $_GET['pid'];
				}

				if(isset($_GET['cid']) && !empty($_GET['cid'])){
					$datas['cid'] = $_GET['cid'];
				}

				if(isset($_POST['search'])){
					if(!empty($_POST['key'])){
						switch($_POST['search']){
							case 1 :
								$datas['id'] = $_POST['key'];
								break;
							case 2:
								$datas['name'] = array("like","%{$_POST['key']}%");
								break;
						}
						$count = $CommodityList->where($datas)->count();
						$page = new page($count,15);
						$list = $CommodityList->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
					}else{
						$this->error("搜索内容不能为空！", __APP__.'/CommodityList/index');
					}
				}else{
					$datas['id'] = array('neq', 0);
					$count = $CommodityList->where($datas)->count();
					$page = new page($count,15);
					$list = $CommodityList->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}

				$this->assign('list',$list);

				$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

				$this->display();
			}else{
				$this->redirect('/Index/index');
			}
		}else{
			$this->redirect('/Public/login');
		}


	}

	function ajax_page_index(){
		if($this->check_is_admin()){
			if(isset($_GET['pid']) && !empty($_GET['pid'])){

				$CommoditySubclass = M('CommoditySubclass');
				$list = $CommoditySubclass->where('pid='.$_GET['pid'])->order('sort')->select();
				$this->assign('clist', $list);

				import("ORG.Util.emit_ajax_page");
				$CommodityList = D('CommodityList');

				if(isset($_GET['pid']) && !empty($_GET['pid'])){
					$datas['pid'] = $_GET['pid'];
				}

				if(isset($_GET['cid']) && !empty($_GET['cid'])){
					$datas['cid'] = $_GET['cid'];
				}

				if(isset($_POST['search'])){
					if(!empty($_POST['key'])){
						switch($_POST['search']){
							case 1 :
								$datas['id'] = $_POST['key'];
								break;
							case 2:
								$datas['name'] = array("like","%{$_POST['key']}%");
								break;
						}
						$count = $CommodityList->where($datas)->count();
						$page = new page($count,15);
						$list = $CommodityList->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
					}
				}else{
					$datas['id'] = array('neq', 0);
					$count = $CommodityList->where($datas)->count();
					$page = new page($count,15);
					$list = $CommodityList->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}

				$this->assign('list',$list);

				$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

				$this->display();
			}
		}

	}

}