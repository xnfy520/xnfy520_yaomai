<?php

class NodeAction extends CommonAction{

	function index(){

		import("ORG.Util.emit_ajax_page");
		$Node = D('Node');

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
				$count = $Node->where($datas)->count();
				$page = new page($count,15);
				$list = $Node->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}else{
				$this->error("搜索内容不能为空！", __APP__.'/Node/index');
			}
		}else{
			$count = $Node->count();
			$page = new page($count,15);
			$list = $Node->relation(true)->limit($page->setlimit())->order('sort')->select();
		}

		$this->assign('list',$list);

        $this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

		$this->display();
	}

	public function ajax_index_page(){

		import("ORG.Util.emit_ajax_page");
		$Node = D('Node');

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
				$count = $Node->where($datas)->count();
				$page = new page($count,15);
				$list = $Node->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}else{
				$this->error("搜索内容不能为空！", __APP__.'/Node/index');
			}
		}else{
			$count = $Node->count();
			$page = new page($count,15);
			$list = $Node->relation(true)->limit($page->setlimit())->order('sort')->select();
		}

		$this->assign('list',$list);

		$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

		$this->display();
	}

	function model_index(){

		if(isset($_GET['pid']) && !empty($_GET['pid'])){
			import("ORG.Util.emit_ajax_page");
			$Node = D('Node');

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

					$datas['pid'] = $_GET['pid'];
					$datas['level'] = C('MODEL_LEVEL');
					$count = $Node->where($datas)->count();
					$page = new page($count,20);
					$list = $Node->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					$this->error("搜索内容不能为空！", __APP__.'/Node/index');
				}
			}else{
				$datas['pid'] = $_GET['pid'];
				$datas['level'] = C('MODEL_LEVEL');
				$count = $Node->where($datas)->count();
				$page = new page($count,20);
				$list = $Node->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}else{
			$this->redirect('/Node/index');
		}

	}

	function add(){
		$app_list = C('APP_LIST');
		$app_level = C('APP_LEVEL');
		$Node = M('Node');
		$data = $Node->where('level='.$app_level)->getField('id, node_type');

		foreach($data as $key){
			for($i=0; $i<=count($app_list); $i++){
				if($key==$app_list[$i]){
					unset($app_list[$i]);
				}
			}
		}

		$this->assign('app_list', $app_list);
		$this->assign('app_level', $app_level);
		$this->display();
	}

	function edit(){
		if(isset($_GET['id'])){

			$app_list = C('APP_LIST');
			$app_level = C('APP_LEVEL');

			$Node = M('Node');
			$data = $Node->find($_GET['id']);
			$this->assign('data', $data);

			$datas = $Node->where('level='.$app_level)->getField('id, node_type');
			foreach($datas as $key){
				for($i=0; $i<=count($app_list); $i++){
					if($key==$app_list[$i]){
						unset($app_list[$i]);
					}
				}
			}

			$this->assign('app_list', $app_list);

			$this->display();
		}else{
			$this->error('异常操作！');
		}
	}

	function ajaxinsert(){
		$Node = D('Node');
		if($data = $Node->create()){
			if($Node->add($data)){
				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$Node->getError(),0);
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
			$Node = D('Node');
			if($data = $Node->create()){
				$orginfo = $Node->find($_POST['id']);
				if($this->checkData($orginfo,$data)){
					$Node->save($data);
					$this->ajaxReturn(0,'修改数据成功',1);
				}else{
					$this->ajaxReturn(0,'没有数据被修改',0);
				}
			}else{
				$this->ajaxReturn(0,$Node->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$Node = D('Node');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$num = $Node->delete($_POST['deleteid'][$i]);
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
					$Node = D('Node');
						if($_POST['publish']){
                            $data['publish'] = 0;
                            $data['ModifyDate'] = time();
							$Node->where('id='.$_POST['id'])->setField($data);
							$this->ajaxReturn(0,'修改成功',1);
						}else{
                            $data['publish'] = 1;
                            $data['ModifyDate'] = time();
							$Node->where('id='.$_POST['id'])->setField($data);
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