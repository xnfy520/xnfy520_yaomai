<?php

class HelpCenterInformationAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			$HelpCenterCategory = M('HelpCenterCategory');
			$HelpCenterCategoryinfo = $HelpCenterCategory->where('publish=1')->order('sort')->select();
			$this->assign('clist',$HelpCenterCategoryinfo);

			import("ORG.Util.emit_ajax_page");
			$HelpCenterInformation = D('HelpCenterInformation');

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
					if(isset($_GET['pid'])){
						$datas['pid'] = $_GET['pid'];
					}
					$count = $HelpCenterInformation->where($datas)->count();
					$page = new page($count,15);
					$list = $HelpCenterInformation->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();

				}else{
					$this->error("搜索内容不能为空", __APP__.'/HelpCenterInformation/index');
				}
			}else{
				if(isset($_GET['pid'])){
					$datas['pid'] = $_GET['pid'];
				}
				$datas['id'] = array('neq',0);
				$count = $HelpCenterInformation->where($datas)->count();
				$page = new page($count,15);
				$list = $HelpCenterInformation->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}else{
			$this->redirect('/Public/login');
		}


	}

	function ajax_page_index(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$HelpCenterInformation = D('HelpCenterInformation');

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
					if(isset($_GET['pid'])){
						$datas['pid'] = $_GET['pid'];
					}
					$count = $HelpCenterInformation->where($datas)->count();
					$page = new page($count,15);
					$list = $HelpCenterInformation->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();

				}else{
					$this->error("搜索内容不能为空", __APP__.'/HelpCenterInformation/index');
				}
			}else{
				if(isset($_GET['pid'])){
					$datas['pid'] = $_GET['pid'];
				}
				$datas['id'] = array('neq',0);
				$count = $HelpCenterInformation->where($datas)->count();
				$page = new page($count,15);
				$list = $HelpCenterInformation->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}

	}

	function add(){
		if($this->check_is_admin()){
			$HelpCenterCategory = M('HelpCenterCategory');
			$query['publish'] = 1;
			$HelpCenterCategoryinfo = $HelpCenterCategory->where($query)->order('sort')->select();
			$this->assign('clist',$HelpCenterCategoryinfo);
			$this->display();
		}else{
			$this->redirect('/Public/login');
		}

	}

	function edit(){
		if($this->check_is_admin()){
			if(isset($_GET['id'])){

				$HelpCenterCategory = M('HelpCenterCategory');
				$query['publish'] = 1;
				$HelpCenterCategoryinfo = $HelpCenterCategory->where($query)->order('sort')->select();
				$this->assign('clist',$HelpCenterCategoryinfo);

				$HelpCenterInformation = M('HelpCenterInformation');
				$data = $HelpCenterInformation->find($_GET['id']);

				$this->assign('data', $data);

				$this->display();

			}else{
				$this->redirect('/HelpCenterInformation/index');
			}
		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajaxinsert(){
		$HelpCenterInformation = D('HelpCenterInformation');
		if($data = $HelpCenterInformation->create()){
			if($HelpCenterInformation->add()){
				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$HelpCenterInformation->getError(),0);
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
			$HelpCenterInformation = D('HelpCenterInformation');
			if($data = $HelpCenterInformation->create()){
				$orginfo = $HelpCenterInformation->where('id='.$_POST['id'])->find();
				if($this->checkData($orginfo,$data)){
					$HelpCenterInformation->save($data);
					$this->ajaxReturn(0,'修改数据成功',1);
				}else{
					$this->ajaxReturn(0,'没有数据被修改',0);
				}
			}else{
				$this->ajaxReturn(0,$HelpCenterInformation->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$HelpCenterInformation = D('HelpCenterInformation');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$num = $HelpCenterInformation->delete($_POST['deleteid'][$i]);
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