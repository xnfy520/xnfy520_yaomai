<?php

class GrouponCategoryAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$GrouponCategory = D('GrouponCategory');

			if(isset($_POST['search'])){
				if(!empty($_POST['key'])){
					switch($_POST['search']){
						case 1 :
							$datas['id'] = $_POST['key'];
							break;
						case 2:
							$datas['name'] = array("like","%{$_POST['key']}%");
							break;
						case 3 :
							$datas['alias'] = array('like',"%{$_POST['key']}%");
							break;
					}
					$count = $GrouponCategory->where($datas)->count();
					$page = new page($count,15);
					$list = $GrouponCategory->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					$this->error("搜索内容不能为空", __APP__.'/GrouponCategory/index');
				}
			}else{
				$count = $GrouponCategory->count();
				$page = new page($count,15);
				$list = $GrouponCategory->relation(true)->limit($page->setlimit())->order('sort')->select();
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
			$GrouponCategory = D('GrouponCategory');

			if(isset($_POST['search'])){
				if(!empty($_POST['key'])){
					switch($_POST['search']){
						case 1 :
							$datas['id'] = $_POST['key'];
							break;
						case 2:
							$datas['name'] = array("like","%{$_POST['key']}%");
							break;
						case 3 :
							$datas['alias'] = array('like',"%{$_POST['key']}%");
							break;
					}
					$count = $GrouponCategory->where($datas)->count();
					$page = new page($count,15);
					$list = $GrouponCategory->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					return false;
				}
			}else{
				$count = $GrouponCategory->count();
				$page = new page($count,15);
				$list = $GrouponCategory->relation(true)->limit($page->setlimit())->order('sort')->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}

	}

    function add(){
		if($this->check_is_admin()){
			$this->display();
		}else{
			$this->redirect('/Public/login');
		}
    }

	function edit(){
		if($this->check_is_admin()){
			if(isset($_GET['id'])){
				$GrouponCategory = M('GrouponCategory');
				$data = $GrouponCategory->find($_GET['id']);
				$this->assign('data', $data);
				$this->display();
			}else{
				$this->redirect('/GrouponCategory/index');
			}
		}else{
			$this->redirect('/Public/login');
		}
	}

	function ajaxinsert(){
		$GrouponCategory = D('GrouponCategory');
		if($data = $GrouponCategory->create()){
			if($GrouponCategory->add()){
				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$GrouponCategory->getError(),0);
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

	function ajaxedit(){
		if(isset($_POST['id'])){
			$GrouponCategory = D('GrouponCategory');
			if($data = $GrouponCategory->create()){
				$orginfo = $GrouponCategory->relation(true)->where('id='.$_POST['id'])->find();
				if($this->checkData($orginfo,$data)){
					$GrouponCategory->save($data);
					$this->ajaxReturn(0,'修改数据成功',1);
				}else{
					$this->ajaxReturn(0,'没有数据被修改',0);
				}
			}else{
				$this->ajaxReturn(0,$GrouponCategory->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$GrouponCategory = D('GrouponCategory');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$data = $GrouponCategory->relation(true)->find($_POST['deleteid'][$i]);
				if(empty($data['GrouponCommodity'])){
					$num = $GrouponCategory->delete($_POST['deleteid'][$i]);
				}else{
					$this->ajaxReturn(0,'[ '.$data['name'].' ] 分类下还有内容,不能被删除',0);
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

			$MODULE_NAME = M(MODULE_NAME);

			if($_POST['value']){

				$data[$_POST['type']] = 0;
				$data['modify_date'] = time();

				$MODULE_NAME->where('id='.$_POST['by'])->setField($data);
				$this->ajaxReturn(0,'修改成功',1);


			}else{

				$data[$_POST['type']] = 1;
				$data['modify_date'] = time();

				$MODULE_NAME->where('id='.$_POST['by'])->setField($data);
				$this->ajaxReturn(1,'修改成功',1);

			}

		}

	}

}