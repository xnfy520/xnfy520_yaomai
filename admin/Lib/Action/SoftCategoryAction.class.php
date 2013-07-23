<?php

class SoftCategoryAction extends CommonAction{

	function index(){

		import("ORG.Util.emit_page");
		$SoftCategory = D('SoftCategory');

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
				$count = $SoftCategory->where($datas)->count();
				$page = new page($count,15);
				$list = $SoftCategory->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}else{
				$this->error("搜索内容不能为空", __APP__.'/SoftCategory/index');
			}
		}else{
            if(isset($_GET['cid'])){
                $count = $SoftCategory->where('cid='.$_GET['cid'])->count();
                $page = new page($count,15);
                $list = $SoftCategory->relation(true)->where('cid='.$_GET['cid'])->limit($page->setlimit())->order('sort')->select();
            }else{
                $count = $SoftCategory->count();
                $page = new page($count,15);
                $list = $SoftCategory->relation(true)->limit($page->setlimit())->order('sort')->select();
            }

		}
		
		$this->assign('list',$list);

        $this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

		$this->display('index');
	}

    function add(){
        $this->display();
    }

	function edit(){
		if(isset($_GET['id'])){

			$SoftCategory = M('SoftCategory');
			$data = $SoftCategory->find($_GET['id']);
			$this->assign('data', $data);

			$this->display();

		}else{
			$this->error('异常操作');
		}
	}

	function ajaxinsert(){
		$SoftCategory = D('SoftCategory');

		if($data = $SoftCategory->create()){
			if($SoftCategory->add()){

				if(!empty($_POST['image'])){
					$tmpdir = './Public/Content/tmp/';
					$srcdir = './Public/Content/SoftCategory/';
					copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
//					copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
				}

				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$SoftCategory->getError(),0);
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
			$SoftCategory = D('SoftCategory');
			if($data = $SoftCategory->create()){
				$orginfo = $SoftCategory->where('id='.$_POST['id'])->find();
				if($this->checkData($orginfo,$data)){
					$SoftCategory->save($data);
					if($_POST['image']!=$orginfo['image']){
						$tmpdir = './Public/Content/tmp/';
						$srcdir = './Public/Content/SoftCategory/';
						copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
//						copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
						unlink($srcdir.$orginfo['image']);
//						unlink($srcdir.'thumb_'.$orginfo['image']);
					}
					$this->ajaxReturn(0,'修改数据成功',1);
				}else{
					$this->ajaxReturn(0,'没有数据被修改',0);
				}
			}else{
				$this->ajaxReturn(0,$SoftCategory->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$SoftCategory = D('SoftCategory');
			$srcdir = './Public/Content/SoftCategory/';
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$data = $SoftCategory->find($_POST['deleteid'][$i]);
				if(count($data['AdvertList'])>0){
					$this->ajaxReturn(0,'该分类下还有内容,不能被删除！',0);
				}else{
					$num = $SoftCategory->delete($_POST['deleteid'][$i]);
				}
				unlink($srcdir.$data['image']);
//				unlink($srcdir.'thumb_'.$data['image']);
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
					$SoftCategory = D('SoftCategory');
                    if($_POST['publish']){
                        $data['publish'] = 0;
                        $data['ModifyDate'] = time();
                        $SoftCategory->where('id='.$_POST['id'])->setField($data);
                        $this->ajaxReturn(0,'修改成功',1);
                    }else{
                        $data['publish'] = 1;
                        $data['ModifyDate'] = time();
                        $SoftCategory->where('id='.$_POST['id'])->setField($data);
                        $this->ajaxReturn(1,'修改成功',1);
                    }
				}else{
					$this->ajaxReturn(0,'异常操作',0);
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
//			$imgname =  $upload->getnewname();
//			$thumb = $img->thumb($imgname, 500, 500,'thumb_');
			$response['filename'] = $upload->getnewname();
			$response['status'] = 1;
//			$response['thumb_filename'] = $thumb;
			echo json_encode($response);
		}else{
			echo json_encode(array('error'=>$upload->geterrormsg(),'status'=>0));
		}

	}

}