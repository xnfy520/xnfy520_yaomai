<?php

class GrouponCommodityAction extends CommonAction{

	function index(){

		if($Userinfo = $this->check_is_admin()){

				$GrouponCategory = M('GrouponCategory');
				$GrouponCategoryinfo = $GrouponCategory->order('sort')->select();
				$this->assign('clist',$GrouponCategoryinfo);

				import("ORG.Util.emit_ajax_page");
				$GrouponCommodity = D('GrouponCommodity');

				if(isset($_GET['pid']) && !empty($_GET['pid'])){
					$datas['pid'] = $_GET['pid'];
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
							case 3 :
								$datas['alias'] = array('like',"%{$_POST['key']}%");
								break;
						}
						$count = $GrouponCommodity->where($datas)->count();
						$page = new page($count,15);
						$list = $GrouponCommodity->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();

					}else{
						$this->redirect('/GrouponCommodity/index/pid/'.$_GET['pid']);
					}
				}else{
					$count = $GrouponCommodity->where($datas)->count();
					$page = new page($count,15);
					$list = $GrouponCommodity->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();
				}

				$this->assign('list',$list);

				$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

				$this->display();
		}else{
			$this->redirect('Public/login');
		}

	}

	function ajax_page_index(){

			if($Userinfo = $this->check_is_admin()){

				$GrouponCategory = M('GrouponCategory');
				$GrouponCategoryinfo = $GrouponCategory->order('sort')->select();
				$this->assign('clist',$GrouponCategoryinfo);

				import("ORG.Util.emit_ajax_page");
				$GrouponCommodity = D('GrouponCommodity');

				if(isset($_GET['pid']) && !empty($_GET['pid'])){
					$datas['pid'] = $_GET['pid'];
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
							case 3 :
								$datas['alias'] = array('like',"%{$_POST['key']}%");
								break;
						}
						$count = $GrouponCommodity->where($datas)->count();
						$page = new page($count,15);
						$list = $GrouponCommodity->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();

					}else{
						$this->redirect('/GrouponCommodity/index/pid/'.$_GET['pid']);
					}
				}else{
					$count = $GrouponCommodity->where($datas)->count();
					$page = new page($count,15);
					$list = $GrouponCommodity->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();
				}

				$this->assign('list',$list);

				$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

				$this->display();
		}else{
			$this->redirect('Public/login');
		}
	}

	function add(){

		$GrouponCategory = M('GrouponCategory');
		$cinfo = $GrouponCategory->select();
		$this->assign('clist',$cinfo);

		$this->display();

	}

	function edit(){

		if($Userinfo = $this->check_is_admin()){

			if(!empty($_GET['pid']) && !empty($_GET['id'])){

				$GrouponCategory = M('GrouponCategory');

				$cinfo = $GrouponCategory->select();
				$this->assign('clist',$cinfo);

				$datas['pid'] = $_GET['pid'];
				$datas['id'] = $_GET['id'];

				$GrouponCommodity = M('GrouponCommodity');

				$data = $GrouponCommodity->where($datas)->find();

				if(!empty($data['image'])){
					$srcdir = './Public/Content/GrouponCommodity/';
					$imageinfo = GetImageInfo($srcdir.'thumb_'.$data['image']);
					$data = array_merge($data,$imageinfo);
				}

				$this->assign('data', $data);

				$this->display();

			}else{
				$this->redirect('/GrouponCommodity/index/pid/'.$_GET['pid']);
			}
		}else{
			$this->redirect('Public/login');
		}
	}

	function ajax_insert(){

		if($Userinfo = $this->check_is_admin()){
			$GrouponCommodity = D('GrouponCommodity');

			$tmpdir = './Public/Content/tmp/';
			$srcdir = './Public/Content/GrouponCommodity/';

			if($data = $GrouponCommodity->create()){
				$data['no'] = strrev(time());
				$data['create_date']  = time();
				$data['expiration_date'] = strtotime($data['expiration_date']);
				
				if($insertid = $GrouponCommodity->add($data)){

					if(!empty($_POST['image'])){
						copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
						copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
					}

					$this->ajaxReturn(0,"新增成功！",1);

				}else{
					$this->ajaxReturn(0,"新增错误！",0);
				}
			}else{
				$this->ajaxReturn(0,$GrouponCommodity->getError(),0);
			}
		}else{
			$this->redirect('Public/login');
		}
	}

	function checkData($orgdata,$data){

		$flag = false;

		if(count($orgdata)==count($data)){

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

		}else{
			$flag = true;
		}

		return $flag;
	}

	function checkMoreData($orgdata,$data){

		$flag = false;

		if(count($orgdata)==count($data)){

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

		}else{

			$flag = true;

		}

		return $flag;

	}

	function ajax_edit(){
		if(!empty($_POST['pid']) && !empty($_POST['id'])){
			$GrouponCommodity = D('GrouponCommodity');

			if($data = $GrouponCommodity->create()){
				$data['expiration_date'] = strtotime($data['expiration_date']);
				$flag = 0;
				$orginfo = $GrouponCommodity->where('pid='.$_POST['pid'])->find($_POST['id']);
				unset($orginfo['create_date']);
				unset($orginfo['modify_date']);
				unset($orginfo['no']);
				unset($orginfo['views']);
				if($this->checkData($orginfo,$data)){
					$data['modify_date'] = time();
					$GrouponCommodity->save($data);

					if($_POST['image']!=$orginfo['image']){
						$tmpdir = './Public/Content/tmp/';
						$srcdir = './Public/Content/GrouponCommodity/';
						copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
						copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
						unlink($srcdir.'thumb_'.$orginfo['image']);
					//	unlink($srcdir.'cut_'.$orginfo['image']); 不删除此图片
					}

					$flag+=1;

				}

				if($flag){
					$this->ajaxReturn(0,'修改数据成功',1);
				}else{
					$this->ajaxReturn(0,'没有数据被修改',0);
				}

			}else{
				$this->ajaxReturn(0,$GrouponCommodity->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajax_del(){
		if(!empty($_POST['deleteid'])){
			$GrouponCommodity = D('GrouponCommodity');


			for($i=0; $i<count($_POST['deleteid']); $i++){

				$data = $GrouponCommodity->find($_POST['deleteid'][$i]);

				unlink($srcdir.'cut_'.$data['image']);
				unlink($srcdir.'thumb_'.$data['image']);

				$num = $GrouponCommodity->delete($_POST['deleteid'][$i]);
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

			$GrouponCommodity = M('GrouponCommodity');

			if($_POST['value']){

				$data[$_POST['type']] = 0;
				$data['modify_date'] = time();

				$GrouponCommodity->where('id='.$_POST['by'])->setField($data);
				$this->ajaxReturn(0,'修改成功',1);


			}else{

				$data[$_POST['type']] = 1;
				$data['modify_date'] = time();

				$GrouponCommodity->where('id='.$_POST['by'])->setField($data);
				$this->ajaxReturn(1,'修改成功',1);

			}

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
				$thumb = $img->thumb('thumb_'.$imgname,800,800);
				$cut = $img->thumb($cutimg, 400, 400);
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