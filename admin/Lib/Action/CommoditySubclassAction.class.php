<?php

class CommoditySubclassAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			$CommodityCategory = M('CommodityCategory');
			$list = $CommodityCategory->where('publish=1')->order('sort')->select();
			$this->assign('clist', $list);

			import("ORG.Util.emit_ajax_page");
			$MODULE_NAME = D(MODULE_NAME);

			if(isset($_GET['pid']) && !empty($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
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
					$count = $MODULE_NAME->where($datas)->count();
					$page = new page($count,15);
					$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					$this->error("搜索内容不能为空！", __APP__.'/Theme/index');
				}
			}else{
				if(isset($_GET['pid']) && !empty($_GET['pid'])){
					$count = $MODULE_NAME->where($datas)->count();
					$page = new page($count,15);
					$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					$count = $MODULE_NAME->count();
					$page = new page($count,15);
					$list = $MODULE_NAME->relation(true)->limit($page->setlimit())->order('sort')->select();
				}

			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}else{
			$this->redirect('/Public/login');
		}

	}

	public function ajax_page_index(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$MODULE_NAME = D(MODULE_NAME);

			if(isset($_GET['pid']) && !empty($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
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
					$count = $MODULE_NAME->where($datas)->count();
					$page = new page($count,15);
					$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					$this->error("搜索内容不能为空！", __APP__.'/Theme/index');
				}
			}else{
				if(isset($_GET['pid']) && !empty($_GET['pid'])){
					$count = $MODULE_NAME->where($datas)->count();
					$page = new page($count,15);
					$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					$count = $MODULE_NAME->count();
					$page = new page($count,15);
					$list = $MODULE_NAME->relation(true)->limit($page->setlimit())->order('sort')->select();
				}

			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}

	}

	function add(){
		if($this->check_is_admin()){
			$CommodityCategory = M('CommodityCategory');
			$list = $CommodityCategory->where('publish=1')->order('sort')->select();
			$this->assign('clist', $list);

			$this->display();
		}else{
			$this->redirect('/Public/login');
		}

	}

	function edit(){
		if($this->check_is_admin()){
			if(isset($_GET['id'])){

				$CommodityCategory = M('CommodityCategory');
				$list = $CommodityCategory->where('publish=1')->order('sort')->select();
				$this->assign('clist', $list);

				$MODULE_NAME = M(MODULE_NAME);

				$data = $MODULE_NAME->find($_GET['id']);

				$this->assign('data', $data);

				$this->display();
			}else{
				$this->error('异常操作');
			}
		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajax_insert(){
		$MODULE_NAME = D(MODULE_NAME);
		if($data = $MODULE_NAME->create()){
			if($MODULE_NAME->add($data)){
				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$MODULE_NAME->getError(),0);
		}
	}

	function checkData($orgdata,$data){
		$flag = false;
		unset($data['modify_date']);
		unset($orgdata['modify_date']);
		foreach($data as $key=>$value){
			foreach($orgdata as $k=>$v){
				if($key==$k){
					if($data[$key]==$orgdata[$k]){
						continue;
					}else{
						$flag = true;
					}
				}
			}
		}
		return $flag;
	}

	function ajax_edit(){

		if(isset($_POST['id'])){
			$MODULE_NAME = D(MODULE_NAME);
			$orginfo = $MODULE_NAME->relation(true)->find($_POST['id']);
			if($data = $MODULE_NAME->create()){
				$flag = true;
				if($_POST['pid']!=$orginfo['pid']){
					if(!empty($orginfo['CommodityList'])){
						$flag = false;
					}
				}
				if($flag){
					if($this->checkData($orginfo,$data)){
						if($MODULE_NAME->save($data)){
							$this->ajaxReturn(0,'修改数据成功',1);
						}else{
							$this->ajaxReturn(0,'没有数据被修改',0);
						}
					}else{
						$this->ajaxReturn(0,'没有数据被修改',0);
					}
				}else{
					$this->ajaxReturn(0,'[ '.$orginfo['name'].' ] 分类下还有商品,不能修改所属大类',0);
				}
			}else{
				$this->ajaxReturn(0,$MODULE_NAME->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajax_del(){
		if(!empty($_POST['deleteid'])){
			$MODULE_NAME = D(MODULE_NAME);
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$data = $MODULE_NAME->relation(true)->find($_POST['deleteid'][$i]);
				if(empty($data['CommodityList'])){
					$num = $MODULE_NAME->delete($_POST['deleteid'][$i]);
				}else{
					$this->ajaxReturn(0,'[ '.$data['name'].' ] 分类下还有商品,不能被删除',0);
				}
			}
			if($num>0){
				$this->ajaxReturn(0,'删除成功',1);
			}else{
				$this->ajaxReturn(0,'删除失败',0);
			}
		}else{
			$this->ajaxReturn(0,'请选选择要删除的数据',0);
		}
	}

	function ajax_switch_status(){
		if(!empty($_POST['by']) && !empty($_POST['type']) && isset($_POST['value'])){

			$CommoditySubclass = M('CommoditySubclass');

			if($_POST['value']){

				$data[$_POST['type']] = 0;
				$data['modify_date'] = time();

				$CommoditySubclass->where('id='.$_POST['by'])->setField($data);
				$this->ajaxReturn(0,'修改成功',1);


			}else{

				$data[$_POST['type']] = 1;
				$data['modify_date'] = time();

				$CommoditySubclass->where('id='.$_POST['by'])->setField($data);
				$this->ajaxReturn(1,'修改成功',1);

			}

		}

	}

}