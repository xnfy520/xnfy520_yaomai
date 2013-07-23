<?php

class SeriesListAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$SeriesList = D('SeriesList');

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
					$count = $SeriesList->where($datas)->count();
					$page = new page($count,15);
					$list = $SeriesList->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					$this->error("搜索内容不能为空！", __APP__.'/SeriesList/index');
				}
			}else{
				$count = $SeriesList->count();
				$page = new page($count,15);
				$list = $SeriesList->relation(true)->limit($page->setlimit())->order('sort')->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display('index');
		}else{
			$this->redirect('/Public/login');
		}

	}

	function edit(){
		if($this->check_is_admin()){
			if(isset($_GET['id'])){
				$SeriesList = M('SeriesList');
				$data = $SeriesList->find($_GET['id']);
				$this->assign('data', $data);
				$this->display();
			}else{
				$this->error('异常操作！');
			}
		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajaxinsert(){
		$SeriesList = D('SeriesList');
		if($data = $SeriesList->create()){
			if($SeriesList->add($data)){
				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$SeriesList->getError(),0);
		}
	}

	function checkData($orgdata,$data){
		$flag = false;
		unset($data['ModifyDate']);
		unset($orgdata['ModifyDate']);
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
			$SeriesList = D('SeriesList');
			if($data = $SeriesList->create()){
				$orginfo = $SeriesList->find($_POST['id']);
				if($this->checkData($orginfo,$data)){
					$SeriesList->save($data);
					$this->ajaxReturn(0,'修改数据成功',1);
				}else{
					$this->ajaxReturn(0,'没有数据被修改',0);
				}
			}else{
				$this->ajaxReturn(0,$SeriesList->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$SeriesList = D('SeriesList');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$num = $SeriesList->delete($_POST['deleteid'][$i]);
			}
			if($num>0){
				$this->ajaxReturn(0,'删除成功！',1);
			}else{
				$this->ajaxReturn(0,'删除失败！',0);
			}
		}else{
			$this->ajaxReturn(0,'请选择要删除的数据！',0);
		}
	}

	function ajaxpublish(){
			if(isset($_POST['id']) && !empty($_POST['id'])){
				if(isset($_POST['publish'])){
					$SeriesList = D('SeriesList');
						if($_POST['publish']){
                            $data['publish'] = 0;
                            $data['ModifyDate'] = time();
							$SeriesList->where('id='.$_POST['id'])->setField($data);
							$this->ajaxReturn(0,'修改成功',1);
						}else{
                            $data['publish'] = 1;
                            $data['ModifyDate'] = time();
							$SeriesList->where('id='.$_POST['id'])->setField($data);
							$this->ajaxReturn(1,'修改成功',1);
						}
				}else{
					$this->ajaxReturn(0,'异常操作',0);
				}
			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
	}

}