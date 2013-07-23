<?php

class InformationListAction extends CommonAction{

	function index(){

		$InformationCategory = M('InformationCategory');
		$query['publish'] = 1;
		$InformationCategoryinfo = $InformationCategory->where($query)->order('sort')->select();
		$this->assign('clist',$InformationCategoryinfo);

		import("ORG.Util.emit_page");
		$InformationList = D('InformationList');

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
				if(isset($_GET['cid'])){
					$datas['cid'] = $_GET['cid'];
				}
				$count = $InformationList->where($datas)->count();
				$page = new page($count,15);
				$list = $InformationList->relation(true)->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();

			}else{
				$this->error("搜索内容不能为空", __APP__.'/InformationList/index');
			}
		}else{
			if(isset($_GET['cid'])){
				$count = $InformationList->where('cid='.$_GET['cid'])->count();
				$page = new page($count,15);
				$list = $InformationList->relation(true)->where('cid='.$_GET['cid'])->limit($page->setlimit())->order('sort,id desc')->select();
			}else{
				$count = $InformationList->count();
				$page = new page($count,15);
				$list = $InformationList->relation(true)->limit($page->setlimit())->order('sort,id desc')->select();
			}

		}

		$this->assign('list',$list);

		$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

		switch($_GET['cid']){
			case 1:
				$this->display('Conferences-index');
				break;
			case 2:
				$this->display('News-index');
				break;
			case 3:
				$this->display('AboutUs-index');
				break;
			case 4:
				$this->display('Resources-index');
				break;
			default:
				$this->display();
		}
	}

	function add(){
		$InformationCategory = M('InformationCategory');
		$query['publish'] = 1;
		$InformationCategoryinfo = $InformationCategory->where($query)->order('sort')->select();
		$this->assign('clist',$InformationCategoryinfo);
		switch($_GET['cid']){
			case 1:
				$this->display('Conferences-add');
				break;
			case 2:
				$this->display('News-add');
				break;
			case 3:
				$this->display('AboutUs-add');
				break;
			case 4:
				$this->display('Resources-add');
				break;
			default:
				$this->display();
		}
	}

	function edit(){
		if(isset($_GET['id'])){

			$InformationCategory = M('InformationCategory');
			$query['publish'] = 1;
			$InformationCategoryinfo = $InformationCategory->where($query)->order('sort')->select();
			$this->assign('clist',$InformationCategoryinfo);

			$InformationList = M('InformationList');
			$data = $InformationList->find($_GET['id']);

			if(!empty($data['image'])){
				$srcdir = './Public/Content/InformationList/';
				$imageinfo = GetImageInfo($srcdir.'thumb_'.$data['image']);
				$data = array_merge($data,$imageinfo);
			}

			$this->assign('data', $data);
			switch($_GET['cid']){
				case 1:
					$this->display('Conferences-edit');
					break;
				case 2:
					$this->display('News-edit');
					break;
				case 3:
					$this->display('AboutUs-edit');
					break;
				case 4:
					$this->display('Resources-edit');
					break;
				default:
					$this->display();
					break;
			}


		}else{
			$this->error('异常操作');
		}
	}

	function ajaxinsert(){
		$InformationList = D('InformationList');

		if($data = $InformationList->create()){
			if($InformationList->add()){

				if(!empty($_POST['image'])){
					$tmpdir = './Public/Content/tmp/';
					$srcdir = './Public/Content/InformationList/';
					copy($tmpdir.$_POST['image'], $srcdir.$_POST['image']);
					copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
					copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
				}

				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$InformationList->getError(),0);
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
			$InformationList = D('InformationList');
			if($data = $InformationList->create()){
				$orginfo = $InformationList->where('id='.$_POST['id'])->find();
				if($this->checkData($orginfo,$data)){
					$InformationList->save($data);
					if($_POST['image']!=$orginfo['image']){
						$tmpdir = './Public/Content/tmp/';
						$srcdir = './Public/Content/InformationList/';
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
			}else{
				$this->ajaxReturn(0,$InformationList->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$InformationList = D('InformationList');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$data = $InformationList->find($_POST['deleteid'][$i]);
				$srcdir = './Public/Content/InformationList/';
				unlink($srcdir.$data['image']);
				unlink($srcdir.'cut_'.$data['image']);
				unlink($srcdir.'thumb_'.$data['image']);
				$num = $InformationList->delete($_POST['deleteid'][$i]);
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
				$InformationList = D('InformationList');
				if($_POST['publish']){
					$data['publish'] = 0;
					$data['ModifyDate'] = time();
					$InformationList->where('id='.$_POST['id'])->setField($data);
					$this->ajaxReturn(0,'修改成功',1);
				}else{
					$data['publish'] = 1;
					$data['ModifyDate'] = time();
					$InformationList->where('id='.$_POST['id'])->setField($data);
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

}