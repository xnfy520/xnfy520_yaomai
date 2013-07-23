<?php

class ContributeAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			$Theme = M('Theme');
			$query['publish'] = 1;
			$Themeinfo = $Theme->where($query)->order('sort')->select();
			$this->assign('clist',$Themeinfo);

			import("ORG.Util.emit_page");
			$Contribute = D('Contribute');

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
							$datas['no'] = array('like',"%{$_POST['key']}%");
							break;
					}
					if(isset($_GET['cid'])){
						$datas['themeid'] = $_GET['cid'];
					}
					$count = $Contribute->where($datas)->count();
					$page = new page($count,15);
					$list = $Contribute->relation(true)->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();

				}else{
					$this->error("搜索内容不能为空", __APP__.'/Contribute/index');
				}
			}else{
				if(isset($_GET['cid'])){
					$count = $Contribute->where('themeid='.$_GET['cid'])->count();
					$page = new page($count,15);
					$list = $Contribute->relation(true)->where('themeid='.$_GET['cid'])->limit($page->setlimit())->order('sort,id desc')->select();
				}else{
					$count = $Contribute->count();
					$page = new page($count,15);
					$list = $Contribute->relation(true)->limit($page->setlimit())->order('sort,id desc')->select();
				}

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
			$Theme = M('Theme');
			$query['publish'] = 1;
			$Themeinfo = $Theme->where($query)->order('sort')->select();
			$this->assign('clist',$Themeinfo);

			$this->display();
		}else{
			$this->redirect('/Public/login');
		}
	}

	function edit(){
		if($this->check_is_admin()){
			if(isset($_GET['id'])){

				$Theme = M('Theme');
				$query['publish'] = 1;
				$Themeinfo = $Theme->where($query)->order('sort')->select();
				$this->assign('clist',$Themeinfo);

				$Contribute = D('Contribute');

				$data = $Contribute->relation(true)->find($_GET['id']);

				if(!empty($data['image'])){
					$srcdir = './Public/Content/Contribute/';
					$imageinfo = GetImageInfo($srcdir.'thumb_'.$data['image']);
					$data = array_merge($data,$imageinfo);
				}

				$this->assign('data', $data);
				$this->display();
			}else{
				$this->error('异常操作');
			}
		}else{
			$this->redirect('/Public/login');
		}
	}

	function ajaxinsert(){
		$Contribute = D('Contribute');

		if($data = $Contribute->create()){
			if($Contribute->add()){

				if(!empty($_POST['image'])){
					$tmpdir = './Public/Content/tmp/';
					$srcdir = './Public/Content/Contribute/';
					copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
					copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
					copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
				}

				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$Contribute->getError(),0);
		}
	}

//	function checkData($orgdata,$data){
//		$flag = false;
//		unset($data['ModifyDate']);
//		unset($orgdata['ModifyDate']);
//		foreach($data as $key=>$value){
//			foreach($orgdata as $k=>$v){
//				if($key==$k){
//					if($data[$key]==$orgdata[$k]){
//						continue;
//					}else{
//						$flag = true;
//					}
//				}
//			}
//		}
//		return $flag;
//	}

	function ajaxedit(){

		if(isset($_POST['id'])){
			$Contribute = D('Contribute');
			if($data = $Contribute->create()){
				dump($data);
				echo $data['publish'];
				echo '<br />';
				echo $data['status'];
				if($data['publish']==0){
					if($data['status']==1){
						$this->ajaxReturn(0,'发布后的文章才能被审核',0);
					}else{
						$orginfo = $Contribute->where('id='.$_POST['id'])->find();
						if($this->checkData($orginfo,$data)){
							$Contribute->save($data);
							if($_POST['image']!=$orginfo['image']){
								$tmpdir = './Public/Content/tmp/';
								$srcdir = './Public/Content/Contribute/';
								copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
								copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
								copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
								unlink($srcdir.$orginfo['image']);
								unlink($srcdir.'cut_'.$orginfo['image']);
								unlink($srcdir.'thumb_'.$orginfo['image']);
							}
							$this->ajaxReturn(0,'修改数据成功',1);
						}else{
							$this->ajaxReturn(0,'没有数据被修改',0);
						}
					}
				}elseif($data['status']==1){
					if($data['publish']==0){
						$this->ajaxReturn(0,'审核通过的文章不能被关闭',0);
					}else{
						$orginfo = $Contribute->where('id='.$_POST['id'])->find();
						if($this->checkData($orginfo,$data)){
							$Contribute->save($data);
							if($_POST['image']!=$orginfo['image']){
								$tmpdir = './Public/Content/tmp/';
								$srcdir = './Public/Content/Contribute/';
								copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
								copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
								copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
								unlink($srcdir.$orginfo['image']);
								unlink($srcdir.'cut_'.$orginfo['image']);
								unlink($srcdir.'thumb_'.$orginfo['image']);
							}
							$this->ajaxReturn(0,'修改数据成功',1);
						}else{
							$this->ajaxReturn(0,'没有数据被修改',0);
						}
					}
				}


			}else{
				$this->ajaxReturn(0,$Contribute->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$Contribute = D('Contribute');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$data = $Contribute->find($_POST['deleteid'][$i]);
				$srcdir = './Public/Content/Contribute/';
				unlink($srcdir.$data['image']);
				unlink($srcdir.'cut_'.$data['image']);
				unlink($srcdir.'thumb_'.$data['image']);
				$num = $Contribute->delete($_POST['deleteid'][$i]);
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
				$Contribute = D('Contribute');
				$status = $Contribute->getFieldById($_POST['id'],'status');
				if($_POST['publish']){
					if($status){
						$this->ajaxReturn(0,'审核通过的文章不能被关闭',0);
					}else{
						$data['publish'] = 0;
						$data['ModifyDate'] = time();
						$Contribute->where('id='.$_POST['id'])->setField($data);
						$this->ajaxReturn(0,'修改成功',1);
					}
				}else{
					$data['publish'] = 1;
					$data['ModifyDate'] = time();
					$Contribute->where('id='.$_POST['id'])->setField($data);
					$this->ajaxReturn(1,'修改成功',1);
				}
			}else{
				$this->ajaxReturn(0,'异常操作2',0);
			}
		}else{
			$this->ajaxReturn(0,'异常操作1',0);
		}
	}

	function ajaxstatus(){
		if(isset($_POST['id']) && !empty($_POST['id'])){
			if(isset($_POST['status'])){
				$Contribute = D('Contribute');
				$publish = $Contribute->getFieldById($_POST['id'],'publish');
					if($_POST['status']){
							$data['status'] = 0;
							$data['ModifyDate'] = time();
							$Contribute->where('id='.$_POST['id'])->setField($data);
							$this->ajaxReturn(0,'修改成功',1);
					}else{
						if($publish){
							$data['status'] = 1;
							$data['ModifyDate'] = time();
							$Contribute->where('id='.$_POST['id'])->setField($data);
							$this->ajaxReturn(1,'修改成功',1);
						}else{
							$this->ajaxReturn(0,'发布后的文章才能被审核',0);
						}
					}
			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
		}else{
			$this->ajaxReturn(0,'异常操作',0);
		}
	}

	function ajaxrecommend(){
		if(isset($_POST['id']) && !empty($_POST['id'])){
			if(isset($_POST['recommend'])){
				$Contribute = D('Contribute');
				if($_POST['recommend']){
					$data['recommend'] = 0;
					$data['ModifyDate'] = time();
					$Contribute->where('id='.$_POST['id'])->setField($data);
					$this->ajaxReturn(0,'修改成功',1);
				}else{
					$data['recommend'] = 1;
					$data['ModifyDate'] = time();
					$Contribute->where('id='.$_POST['id'])->setField($data);
					$this->ajaxReturn(1,'修改成功',1);
				}
			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
		}else{
			$this->ajaxReturn(0,'异常操作',0);
		}
	}
//
//	public function uploads(){
//
//		import("ORG.Net.emit_upload");
//		import("ORG.Util.emit_image");
//		$upload = new upload(array("filepath"=>"./Public/Content/tmp","allowtype"=>array('gif','png','jpg','jpeg','JPG','JPEG','PNG','GIF'),"israndname"=>true,"maxsize"=>20000000000));
//		if($upload->uploadfiles('myfile')){
//
//			$src = "./Public/Content/tmp/";
//			$img = new image($src);
//			$imgname =  $upload->getnewname();
//			copy($src.$imgname,$src.'thumb_'.$imgname);
//
//			if($cutimg = $img->cut($imgname,'cut_')){
//				$thumb = $img->thumb('thumb_'.$imgname,500,500);
//				$cut = $img->thumb($cutimg, 100, 100);
//			}
//
//			$response['image_name'] = $upload->getnewname();
//			$response['status'] = 1;
//			$response['cut_image'] = $cut;
//			$response['thumb_image'] = $thumb;
//			$response['thumb_image_info'] = GetImageInfo("./Public/Content/tmp/".$thumb);
//
//			echo json_encode($response);
//		}else{
//			echo json_encode(array('error'=>$upload->geterrormsg(),'status'=>0));
//		}
//
//	}


	public function uploads(){
		import("ORG.Net.emit_upload");
		import("ORG.Util.emit_image");
		$upload = new upload(array("filepath"=>"./Public/Content/tmp","allowtype"=>array('gif','png','jpg','jpeg','JPG','JPEG','PNG','GIF'),"israndname"=>true,"maxsize"=>20000000000));
		if($upload->uploadfiles('myfile')){

			$src = "./Public/Content/tmp/";
			$img = new image($src);
			$imgname =  $upload->getnewname();
			copy($src.$imgname,$src.'thumb_'.$imgname);

			if($cutimg = $img->cut($imgname,'cut_')){
				$thumb = $img->thumb('thumb_'.$imgname,500,500);
				$cut = $img->thumb($cutimg, 100, 100);
			}

			$response['image_name'] = $upload->getnewname();
			$response['status'] = 1;
			$response['cut_image'] = $cut;
			$response['thumb_image'] = $thumb;
			$response['thumb_image_info'] = GetImageInfo("./Public/Content/tmp/".$thumb);

			echo json_encode($response);
		}else{
			echo json_encode(array('error'=>$upload->geterrormsg(),'status'=>0));
		}

	}

	function uploadFile(){
		import("ORG.Net.emit_upload");
		$upload = new upload(array("filepath"=>"./Public/Content/tmp","allowtype"=>array('pdf','PDF'),"israndname"=>false,"maxsize"=>20000000000));
		if($upload->uploadfiles('myfile')){
			$response['file_name'] = $upload->getnewname();
			$response['status'] = 1;
			echo json_encode($response);
		}else{
			echo json_encode(array('error'=>$upload->geterrormsg(),'status'=>0));
		}
	}

	function ajax_insert_contribute(){

		if(isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['userid']) && isset($_SESSION['roleid'])){
			$Contribute = D('Contribute');

			if($data = $Contribute->create()){
				if($data['publish']==0 && $data['status']){
					$this->ajaxReturn(0,'发布后的文章才能被审核',0);
				}else{
					if($Contribute->add()){
						if(!empty($_POST['image'])){
							$tmpdir = './Public/Content/tmp/';
							$srcdir = './Public/Content/Contribute/';
							if($_POST['image']){
								copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
								copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
								copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
							}
							if($_POST['file']){
								$iconvfilename = iconv('utf-8','gbk',$_POST['file']);
								copy($tmpdir.$iconvfilename, $srcdir.$iconvfilename);
							}
						}
						$this->ajaxReturn(__APP__.'/Contribute/index',"新增成功！",1);
					}else{
						$this->ajaxReturn(0,"新增错误！",0);
					}
				}
			}else{
				$this->ajaxReturn(0,$Contribute->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作！",0);
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

	function ajax_edit_contribute(){

		if(isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['userid']) && isset($_SESSION['roleid']) && !empty($_POST['id'])){
			$Contribute = D('Contribute');

			if($data = $Contribute->create()){
				$orginfo = $Contribute->where('publish=0')->find($_POST['id']);

				if($data['publish']==0 && $data['status']){
					$this->ajaxReturn(0,'发布后的文章才能被审核',0);
				}else{
					if($this->checkData($orginfo,$data)){
						if($Contribute->save($data)){
							$tmpdir = './Public/Content/tmp/';
							$srcdir = './Public/Content/Contribute/';

							if($_POST['image']!=$orginfo['image']){
								copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
								copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
								copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
								unlink($srcdir.$orginfo['image']);
								unlink($srcdir.'thumb_'.$orginfo['image']);
								unlink($srcdir.'cut_'.$orginfo['image']);
							}

							if($_POST['file']!=$orginfo['file']){
								$iconvfilename = iconv('utf-8','gbk',$_POST['file']);
								copy($tmpdir.$iconvfilename, $srcdir.$iconvfilename);
								unlink($srcdir. iconv('utf-8','gbk',$orginfo['file']));
							}

							$this->ajaxReturn(__APP__.'/Contribute/index',"修改成功！",1);
						}else{
							$this->ajaxReturn(0,"修改失败！",0);
						}
					}else{
						$this->ajaxReturn(0,'没有数据被修改',0);
					}
				}

			}else{
				$this->ajaxReturn(0,$Contribute->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作！",0);
		}
	}

	function ajax_delete_contribute(){
		if(!empty($_POST['deleteid'])){
			$Contribute = D('Contribute');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$data = $Contribute->find($_POST['deleteid'][$i]);
				$srcdir = './Public/Content/Contribute/';
				unlink($srcdir.$data['image']);
				unlink($srcdir.'thumb_'.$data['image']);
				unlink($srcdir.'cut_'.$data['image']);
				unlink($srcdir. iconv('utf-8','gbk',$data['file']));
				$num = $Contribute->delete($_POST['deleteid'][$i]);
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

}