<?php

class RoleAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$MODULE_NAME = D(MODULE_NAME);

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
					$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort,level')->select();
				}else{
					$this->error("搜索内容不能为空！", __APP__.'/Theme/index');
				}
			}else{
				$count = $MODULE_NAME->count();
				$page = new page($count,15);
				$list = $MODULE_NAME->relation(true)->limit($page->setlimit())->order('sort,level')->select();
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
				$count = $MODULE_NAME->count();
				$page = new page($count,15);
				$list = $MODULE_NAME->relation(true)->limit($page->setlimit())->order('sort')->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}


	}

	function add(){
		if($this->check_is_admin()){
			$user_group = C('USER_GROUP');

			$MODULE_NAME = M(MODULE_NAME);
			$data = $MODULE_NAME->select();

			foreach($user_group as $key=>$value){
				for($i=0; $i<=count($data); $i++){
					if($value['level']==$data[$i]['level']){
						unset($user_group[$key]);
					}
				}
			}

			$this->assign('user_group', $user_group);
			$this->display();
		}else{
			$this->redirect('/Public/login');
		}

	}

	function edit(){
		if($this->check_is_admin()){
			if(isset($_GET['id'])){

				$user_group = C('USER_GROUP');

				$MODULE_NAME = M(MODULE_NAME);
				$data = $MODULE_NAME->find($_GET['id']);
				$this->assign('data', $data);

				$this->assign('user_group', $user_group);

				$this->display();
			}else{
				$this->redirect('/Role/index');
			}
		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajaxinsert(){
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

	function ajaxedit(){

		if(isset($_POST['id'])){
			$MODULE_NAME = D(MODULE_NAME);
			$orginfo = $MODULE_NAME->relation(true)->find($_POST['id']);
			if($data = $MODULE_NAME->create()){
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
				$this->ajaxReturn(0,$MODULE_NAME->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$MODULE_NAME = D(MODULE_NAME);
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$data = $MODULE_NAME->relation(true)->find($_POST['deleteid'][$i]);
				if($data['level']==0){
					$this->ajaxReturn(0,"此分组不能被删除",0);
				}else{
					if(empty($data['User'])){
						$num = $MODULE_NAME->delete($_POST['deleteid'][$i]);
					}else{
						$this->ajaxReturn(0,'[ '.$data['name'].' ] 分组下还有用户,不能被删除',0);
					}
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

	function ajaxpublish(){
			if(isset($_POST['id']) && !empty($_POST['id'])){
				if(isset($_POST['publish'])){
					$MODULE_NAME = D(MODULE_NAME);
					$info = $MODULE_NAME->find($_POST['id']);
					if($info['level']==0){
						$this->ajaxReturn(0,'此分组不能被关闭',0);
					}else{
						if($_POST['publish']){
							$data['publish'] = 0;
							$data['modify_date'] = time();
							$MODULE_NAME->where('id='.$_POST['id'])->setField($data);
							$this->ajaxReturn(0,'修改成功',1);
						}else{
							$data['publish'] = 1;
							$data['modify_date'] = time();
							$MODULE_NAME->where('id='.$_POST['id'])->setField($data);
							$this->ajaxReturn(1,'修改成功',1);
						}
					}
				}else{
					$this->ajaxReturn(0,'异常操作',0);
				}
			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
	}

}