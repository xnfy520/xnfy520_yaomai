<?php

class ProvincesAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");

			$MODULE_NAME = D(MODULE_NAME);

			if(isset($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
			}else{
				$datas['level'] = C('provinces_level.area_level');
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
					$this->redirect('/'.MODULE_NAME.'/index');
				}
			}else{
				$count = $MODULE_NAME->where($datas)->count();
				$page = new page($count,15);
				$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			for($i=0; $i<count($list); $i++){
				$list[$i]['sub'] = $MODULE_NAME->where('pid='.$list[$i]['id'])->select();
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

			if(isset($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
			}else{
				$datas['level'] = C('provinces_level.area_level');
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
					$this->redirect('/'.MODULE_NAME.'/index');
				}
			}else{
				$count = $MODULE_NAME->where($datas)->count();
				$page = new page($count,15);
				$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			for($i=0; $i<count($list); $i++){
				$list[$i]['sub'] = $MODULE_NAME->where('pid='.$list[$i]['id'])->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}


	}

	function province(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$MODULE_NAME = D(MODULE_NAME);

			if(isset($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
			}else{
				$datas['level'] = C('provinces_level.province_level');
			}

			$clist = $MODULE_NAME->where('pid=0')->order('sort')->select();
			$this->assign('clist',$clist);

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
					$this->redirect('/'.MODULE_NAME.'/'.ACTION_NAME.'/index');
				}
			}else{
				$count = $MODULE_NAME->where($datas)->count();
				$page = new page($count,15);
				$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			for($i=0; $i<count($list); $i++){
				$list[$i]['sub'] = $MODULE_NAME->where('pid='.$list[$i]['id'])->select();
				$list[$i]['sup'] = $MODULE_NAME->where('id='.$list[$i]['pid'])->find();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}else{
			$this->redirect('/Public/login');
		}


	}

	function ajax_page_province(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$MODULE_NAME = D(MODULE_NAME);

			if(isset($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
			}else{
				$datas['level'] = C('provinces_level.province_level');
			}

			$clist = $MODULE_NAME->where('pid=0')->order('sort')->select();
			$this->assign('clist',$clist);

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
					$this->redirect('/'.MODULE_NAME.'/'.ACTION_NAME.'/index');
				}
			}else{
				$count = $MODULE_NAME->where($datas)->count();
				$page = new page($count,15);
				$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			for($i=0; $i<count($list); $i++){
				$list[$i]['sub'] = $MODULE_NAME->where('pid='.$list[$i]['id'])->select();
				$list[$i]['sup'] = $MODULE_NAME->where('id='.$list[$i]['pid'])->find();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}
	}

	function city(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$MODULE_NAME = D(MODULE_NAME);

			if(isset($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
			}else{
				$datas['level'] = C('provinces_level.city_level');
			}

			$clist = $MODULE_NAME->where('level='.C('provinces_level.province_level'))->order('sort')->select();
			$this->assign('clist',$clist);

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
					$this->redirect('/'.MODULE_NAME.'/'.ACTION_NAME.'/index');
				}
			}else{
				$count = $MODULE_NAME->where($datas)->count();
				$page = new page($count,15);
				$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			for($i=0; $i<count($list); $i++){
				$list[$i]['sub'] = $MODULE_NAME->where('pid='.$list[$i]['id'])->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();

		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajax_page_city(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$MODULE_NAME = D(MODULE_NAME);

			if(isset($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
			}else{
				$datas['level'] = C('provinces_level.city_level');
			}

			$clist = $MODULE_NAME->where('level='.C('provinces_level.province_level'))->order('sort')->select();
			$this->assign('clist',$clist);

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
					$this->redirect('/'.MODULE_NAME.'/'.ACTION_NAME.'/index');
				}
			}else{
				$count = $MODULE_NAME->where($datas)->count();
				$page = new page($count,15);
				$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			for($i=0; $i<count($list); $i++){
				$list[$i]['sub'] = $MODULE_NAME->where('pid='.$list[$i]['id'])->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}


	}

	function county(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$MODULE_NAME = D(MODULE_NAME);

			if(isset($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
			}else{
				$datas['level'] = C('provinces_level.county_level');
			}

			$clist = $MODULE_NAME->where('level='.C('provinces_level.city_level'))->order('sort')->select();
			$this->assign('clist',$clist);

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
					$page = new page($count,20);
					$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					$this->redirect('/'.MODULE_NAME.'/'.ACTION_NAME.'/index');
				}
			}else{
				$count = $MODULE_NAME->where($datas)->count();
				$page = new page($count,20);
				$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			for($i=0; $i<count($list); $i++){
				$list[$i]['sub'] = $MODULE_NAME->where('pid='.$list[$i]['id'])->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();

		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajax_page_county(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$MODULE_NAME = D(MODULE_NAME);

			if(isset($_GET['pid'])){
				$datas['pid'] = $_GET['pid'];
			}else{
				$datas['level'] = C('provinces_level.county_level');
			}

			$clist = $MODULE_NAME->where('level='.C('provinces_level.city_level'))->order('sort')->select();
			$this->assign('clist',$clist);

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
					$page = new page($count,20);
					$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
				}else{
					$this->redirect('/'.MODULE_NAME.'/'.ACTION_NAME.'/index');
				}
			}else{
				$count = $MODULE_NAME->where($datas)->count();
				$page = new page($count,20);
				$list = $MODULE_NAME->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}

			for($i=0; $i<count($list); $i++){
				$list[$i]['sub'] = $MODULE_NAME->where('pid='.$list[$i]['id'])->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}else{
			$this->redirect('/Public/login');
		}


	}

	function add(){
		if($this->check_is_admin()){
			$MODULE_NAME = D(MODULE_NAME);
			$clist = $MODULE_NAME->where('level='.($_POST['level']-1))->order('sort')->select();
			$this->assign('clist',$clist);
			$this->display();
		}else{
			$this->redirect('/Public/login');
		}

	}

	function edit(){
		if($this->check_is_admin()){
			if(isset($_POST['id'])){

				$MODULE_NAME = M(MODULE_NAME);

				$clist = $MODULE_NAME->where('level='.($_POST['level']-1))->order('sort')->select();
				$this->assign('clist',$clist);

				$data = $MODULE_NAME->find($_POST['id']);
				$this->assign('data', $data);

				$this->display();
			}else{
				$this->redirect('/Index/index');
			}
		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajax_insert(){
		$MODULE_NAME = D(MODULE_NAME);
		if($datas = $MODULE_NAME->create()){
			if($MODULE_NAME->add($datas)){
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
			if($data = $MODULE_NAME->create()){
				$orginfo = $MODULE_NAME->find($_POST['id']);
				if($this->checkData($orginfo,$data)){
					$MODULE_NAME->save($data);
					$this->ajaxReturn(0,'修改数据成功',1);
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
				$data = $MODULE_NAME->find($_POST['deleteid'][$i]);
				$count = $MODULE_NAME->where('pid='.$data['id'])->count();
				if($count>0){
					$this->ajaxReturn(0,'[ '.$data['name'].' ]区域下还有子区域，不能被删除！',0);
				}else{
					$num = $MODULE_NAME->delete($_POST['deleteid'][$i]);
				}
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