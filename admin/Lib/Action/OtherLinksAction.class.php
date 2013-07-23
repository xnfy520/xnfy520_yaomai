<?php

class OtherLinksAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$OtherLinks = D('OtherLinks');

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
					$count = $OtherLinks->where($datas)->count();
					$page = new page($count,15);
					$list = $OtherLinks->relation(true)->where($datas)->limit($page->setlimit())->order('sort,id')->select();
				}else{
					$this->redirect('/OtherLinks/index');
				}
			}else{
				$count = $OtherLinks->count();
				$page = new page($count,15);
				$list = $OtherLinks->relation(true)->limit($page->setlimit())->order('sort,id')->select();
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
			$OtherLinks = D('OtherLinks');

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
					$count = $OtherLinks->where($datas)->count();
					$page = new page($count,15);
					$list = $OtherLinks->relation(true)->where($datas)->limit($page->setlimit())->order('sort,id')->select();
				}else{
					return false;
				}
			}else{
				$count = $OtherLinks->count();
				$page = new page($count,15);
				$list = $OtherLinks->relation(true)->limit($page->setlimit())->order('sort,id')->select();
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

				$OtherLinks = M('OtherLinks');
				$data = $OtherLinks->find($_GET['id']);
				$this->assign('data', $data);

				$this->display();

			}else{
				$this->redirect('/OtherLinks/index');
			}
		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajaxinsert(){
		$OtherLinks = D('OtherLinks');

		if($data = $OtherLinks->create()){
			if($OtherLinks->add()){
				if(!empty($_POST['image'])){
					$tmpdir = './Public/Content/tmp/';
					$srcdir = './Public/Content/OtherLinks/';
					copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
					copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
				}
				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$OtherLinks->getError(),0);
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
			$OtherLinks = D('OtherLinks');
			if($data = $OtherLinks->create()){
				$orginfo = $OtherLinks->where('id='.$_POST['id'])->find();
				if($this->checkData($orginfo,$data)){
					$OtherLinks->save($data);
					if($_POST['image']!=$orginfo['image']){
						$tmpdir = './Public/Content/tmp/';
						$srcdir = './Public/Content/OtherLinks/';
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
				$this->ajaxReturn(0,$OtherLinks->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$OtherLinks = D('OtherLinks');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$data = $OtherLinks->relation(true)->find($_POST['deleteid'][$i]);
				if(empty($data['FolkCustomProvinces'])){
					$srcdir = './Public/Content/OtherLinks/';
					unlink($srcdir.$data['image']);
					unlink($srcdir.'thumb_'.$data['image']);
					$num = $OtherLinks->delete($_POST['deleteid'][$i]);
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