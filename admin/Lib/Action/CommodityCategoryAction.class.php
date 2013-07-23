<?php

class CommodityCategoryAction extends CommonAction{

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
			$Commodity_Category = C('Commodity_Category');

			$MODULE_NAME = M(MODULE_NAME);
			$data = $MODULE_NAME->select();

			foreach($Commodity_Category as $key=>$value){
				for($i=0; $i<=count($data); $i++){
					if($value['function']==$data[$i]['function']){
						unset($Commodity_Category[$key]);
					}
				}
			}

			$this->assign('Commodity_Category', $Commodity_Category);
			$this->display();
		}else{
			$this->redirect('/Public/login');
		}

	}

	function edit(){
		if($this->check_is_admin()){
			if(isset($_GET['id'])){

				$Commodity_Category = C('Commodity_Category');

				$MODULE_NAME = M(MODULE_NAME);

				$data = $MODULE_NAME->find($_GET['id']);

				$datas = $MODULE_NAME->select();

				$this->assign('data', $data);

				foreach($Commodity_Category as $key=>$value){
					for($i=0; $i<=count($datas); $i++){
						if($value['function']==$data['function']){
							break;
						}else if($value['function']==$datas[$i]['function']){
							unset($Commodity_Category[$key]);
						}
					}
				}


				$this->assign('Commodity_Category', $Commodity_Category);

				$this->display();
		}else{
			$this->redirect('/Public/login');
		}

		}else{
			$this->error('异常操作');
		}
	}

	function ajax_insert(){
		$MODULE_NAME = D(MODULE_NAME);
		if($data = $MODULE_NAME->create()){
			if($MODULE_NAME->add($data)){
				if(!empty($_POST['image'])){
					$tmpdir = './Public/Content/tmp/';
					$srcdir = './Public/Content/CommodityCategory/';
					copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
					copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
				}
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

				if($data['publish']==0 && !empty($orginfo['CommoditySubclass'])){
					$this->ajaxReturn(0,'[ '.$orginfo['name'].' ] 分类下还有子类,不能被删除',0);
				}else{
					if($this->checkData($orginfo,$data)){
						if($MODULE_NAME->save($data)){

							if($_POST['image']!=$orginfo['image']){
								$tmpdir = './Public/Content/tmp/';
								$srcdir = './Public/Content/CommodityCategory/';
								copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
								copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
								unlink($srcdir.$orginfo['image']);
								unlink($srcdir.'thumb_'.$orginfo['image']);
							}

							$this->ajaxReturn(0,'修改数据成功',1);
						}else{
							$this->ajaxReturn(0,'没有数据被修改',0);
						}
					}else{
						$this->ajaxReturn(0,'没有数据被修改',0);
					}
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
				if(empty($data['CommoditySubclass'])){
					if(!empty($data['image'])){
						$srcdir = './Public/Content/OtherLinks/';
						unlink($srcdir.$data['image']);
						unlink($srcdir.'thumb_'.$data['image']);
					}
					$num = $MODULE_NAME->delete($_POST['deleteid'][$i]);
				}else{
					$this->ajaxReturn(0,'[ '.$data['name'].' ] 分类下还有子类,不能被删除',0);
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

			$CommodityCategory = D('CommodityCategory');

			if($_POST['value']){
				$data = $CommodityCategory->relation(true)->find($_POST['by']);
				if(empty($data['CommoditySubclass'])){
					$data[$_POST['type']] = 0;
					$data['modify_date'] = time();
					$CommodityCategory->where('id='.$_POST['by'])->setField($data);
					$this->ajaxReturn(0,'修改成功',1);
				}else{
					$this->ajaxReturn(0,'[ '.$data['name'].' ]'.' 下还有子类，不能被关闭',0);
				}

			}else{

				$data[$_POST['type']] = 1;
				$data['modify_date'] = time();

				$CommodityCategory->where('id='.$_POST['by'])->setField($data);
				$this->ajaxReturn(1,'修改成功',1);

			}

		}else{
			$this->ajaxReturn(0,'异常操作',0);
		}

	}


	public function uploads(){

		import("ORG.Net.emit_upload");
		import("ORG.Util.emit_image");
		$upload = new upload(array("filepath"=>"./Public/Content/tmp","allowtype"=>array('gif','png','jpg','jpeg','JPG','JPEG','PNG','GIF'),"israndname"=>true,"maxsize"=>20000000000));
		if($upload->uploadfiles('myfile')){
			$img = new image("./Public/Content/tmp");
			$imgname =  $upload->getnewname();
			$thumb = $img->thumb($imgname, 500, 500,'thumb_');
			$response['filename'] = $upload->getnewname();
			$response['status'] = 1;
			$response['thumb_filename'] = $thumb;
			echo json_encode($response);
		}else{
			echo json_encode(array('error'=>$upload->geterrormsg(),'status'=>0));
		}

	}

}