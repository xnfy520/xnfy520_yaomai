<?php

class CommodityListAction extends CommonAction{

	function index(){

		if($Userinfo = $this->check_is_admin()){

				$CommodityCategory = M('CommodityCategory');
				$CommodityCategoryinfo = $CommodityCategory->order('sort')->select();
				$this->assign('clist',$CommodityCategoryinfo);

				import("ORG.Util.emit_ajax_page");
				$CommodityList = D('CommodityList');

				if(isset($_GET['pid']) && !empty($_GET['pid'])){
					$datas['pid'] = $_GET['pid'];
					$CommoditySubclass = M('CommoditySubclass');
					$CommoditySubclassinfo = $CommoditySubclass->where($datas)->order('sort')->select();
					$this->assign('cclist',$CommoditySubclassinfo);
				}

				if(isset($_GET['cid']) && !empty($_GET['cid'])){
					$datas['cid'] = $_GET['cid'];
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
						$count = $CommodityList->where($datas)->count();
						$page = new page($count,15);
						$list = $CommodityList->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();

					}else{
						$this->redirect('/CommodityList/index/pid/'.$_GET['pid']);
					}
				}else{
					$count = $CommodityList->where($datas)->count();
					$page = new page($count,15);
					$list = $CommodityList->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();
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

				$CommodityCategory = M('CommodityCategory');
				$CommodityCategoryinfo = $CommodityCategory->order('sort')->select();
				$this->assign('clist',$CommodityCategoryinfo);

				import("ORG.Util.emit_ajax_page");
				$CommodityList = D('CommodityList');

				if(isset($_GET['pid']) && !empty($_GET['pid'])){
					$datas['pid'] = $_GET['pid'];
					$CommoditySubclass = M('CommoditySubclass');
					$CommoditySubclassinfo = $CommoditySubclass->where($datas)->order('sort')->select();
					$this->assign('cclist',$CommoditySubclassinfo);
				}

				if(isset($_GET['cid']) && !empty($_GET['cid'])){
					$datas['cid'] = $_GET['cid'];
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
						$count = $CommodityList->where($datas)->count();
						$page = new page($count,15);
						$list = $CommodityList->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();

					}else{
						$this->redirect('/CommodityList/index/pid/'.$_GET['pid']);
					}
				}else{
					$count = $CommodityList->where($datas)->count();
					$page = new page($count,15);
					$list = $CommodityList->where($datas)->limit($page->setlimit())->order('sort,id desc')->select();
				}

				$this->assign('list',$list);

				$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

				$this->display();
		}else{
			$this->redirect('Public/login');
		}
	}

	function add(){

		$CommodityCategory = M('CommodityCategory');
		$cinfo = $CommodityCategory->select();
		$this->assign('clist',$cinfo);

		if(isset($_GET['pid']) && !empty($_GET['pid'])){
			$fcp['pid'] = $_GET['pid'];
			$CommoditySubclass = M('CommoditySubclass');
			$CommoditySubclassinfo = $CommoditySubclass->where($fcp)->order('sort')->select();
			$this->assign('cclist',$CommoditySubclassinfo);
		}

		$Stylist = M('Stylist');
		$stylist = $Stylist->where('publish=1')->order('sort,id')->select();
		$this->assign('stylist',$stylist);

		$this->display();

	}

	function edit(){

		if($Userinfo = $this->check_is_admin()){

			if(!empty($_GET['pid']) && !empty($_GET['id'])){

				$Stylist = M('Stylist');
				$stylist = $Stylist->where('publish=1')->order('sort,id')->select();
				$this->assign('stylist',$stylist);

				$CommodityCategory = M('CommodityCategory');

				$cinfo = $CommodityCategory->select();
				$this->assign('clist',$cinfo);

				$datas['pid'] = $_GET['pid'];
				$datas['id'] = $_GET['id'];

				$CommodityList = M('CommodityList');

				$data = $CommodityList->where($datas)->find();

				$CommoditySubclass = M('CommoditySubclass');

				$con = $CommoditySubclass->field('id,name')->where('pid='.$data['pid'])->select();
				$this->assign('con',$con);

				if(!empty($data['p1'])){
					$data['p1'] = json_decode($data['p1'],true);
				}
				if(!empty($data['p2'])){
					$data['p2'] = json_decode($data['p2'],true);
				}
				if(!empty($data['p3'])){
					$data['p3'] = json_decode($data['p3'],true);
				}

				if(!empty($data['image'])){
					$srcdir = './Public/Content/CommodityList/';
					$imageinfo = GetImageInfo($srcdir.'thumb_'.$data['image']);
					$data = array_merge($data,$imageinfo);
				}

				$this->assign('data', $data);

				$map['lid'] = $_GET['id'];
				$map['by'] = 1;

				$CommodityImages = M('CommodityImages');
				$ciinfo = $CommodityImages->where($map)->order('id')->select();
				for($i=0; $i<count($ciinfo); $i++){
					$imageinfo = GetImageInfo("./Public/Content/CommodityImages/thumb_".$ciinfo[$i]['image']);
					$ciinfo[$i] = array_merge($ciinfo[$i],$imageinfo);
				}
				$this->assign('ciinfo',$ciinfo);

				$this->display();

			}else{
				$this->redirect('/CommodityList/index/pid/'.$_GET['pid']);
			}
		}else{
			$this->redirect('Public/login');
		}
	}

	function ajax_insert(){

		if($Userinfo = $this->check_is_admin()){
			$CommodityList = D('CommodityList');

			$tmpdir = './Public/Content/tmp/';
			$srcdir = './Public/Content/CommodityList/';
			$srcimagesdir = './Public/Content/CommodityImages/';
			if($data = $CommodityList->create()){
				$data['no'] = strrev(time());
				$data['create_date']  = time();
				if(!empty($_POST['parameter_key'])){
					for($i=0; $i<count($_POST['parameter_key']); $i++){
						$parameter_data[]=array($_POST['parameter_key'][$i]=>$_POST['parameter_value'][$i]);
					}
					$data['p1'] = json_encode($parameter_data);
				}
				if(!empty($_POST['parameter_key2'])){
					for($i=0; $i<count($_POST['parameter_key2']); $i++){
						$parameter_data2[]=array($_POST['parameter_key2'][$i]=>$_POST['parameter_value2'][$i]);
					}
					$data['p2'] = json_encode($parameter_data2);
				}
				if(!empty($_POST['parameter_key3'])){
					for($i=0; $i<count($_POST['parameter_key3']); $i++){
						$parameter_data3[]=array($_POST['parameter_key3'][$i]=>$_POST['parameter_value3'][$i]);
					}
					$data['p3'] = json_encode($parameter_data3);
				}
				if($insertid = $CommodityList->add($data)){

					if(!empty($_POST['image'])){
						copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
						copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
					}

					if(!empty($_POST['image_more'])){
						$CommodityImages = M('CommodityImages');
						$images_datas['lid'] = $insertid;
						$images_datas['by'] = 1;
						for($i=0; $i<count($_POST['image_more']); $i++){
							copy($tmpdir.'thumb_'.$_POST['image_more'][$i], $srcimagesdir.'thumb_'.$_POST['image_more'][$i]);
							copy($tmpdir.'cut_'.$_POST['image_more'][$i], $srcimagesdir.'cut_'.$_POST['image_more'][$i]);
							$images_datas['image'] = $_POST['image_more'][$i];
							$CommodityImages->add($images_datas);
						}
					}

					$this->ajaxReturn(0,"新增成功！",1);

				}else{

					$this->ajaxReturn(0,"新增错误！",0);

				}
			}else{
				$this->ajaxReturn(0,$CommodityList->getError(),0);
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
			$CommodityList = D('CommodityList');

			if($data = $CommodityList->create()){
				$flag = 0;
				$orginfo = $CommodityList->where('pid='.$_POST['pid'])->find($_POST['id']);
				unset($orginfo['create_date']);
				unset($orginfo['modify_date']);
				unset($orginfo['no']);
				unset($orginfo['views']);
				if(!empty($_POST['parameter_key'])){
					for($i=0; $i<count($_POST['parameter_key']); $i++){
						$parameter_data[]=array($_POST['parameter_key'][$i]=>$_POST['parameter_value'][$i]);
					}
					$data['p1'] = json_encode($parameter_data);
				}else{
					$data['p1'] = null;
				}
				if(!empty($_POST['parameter_key2'])){
					for($i=0; $i<count($_POST['parameter_key2']); $i++){
						$parameter_data2[]=array($_POST['parameter_key2'][$i]=>$_POST['parameter_value2'][$i]);
					}
					$data['p2'] = json_encode($parameter_data2);
				}else{
					$data['p2'] = null;
				}
				if(!empty($_POST['parameter_key3'])){
					for($i=0; $i<count($_POST['parameter_key3']); $i++){
						$parameter_data3[]=array($_POST['parameter_key3'][$i]=>$_POST['parameter_value3'][$i]);
					}
					$data['p3'] = json_encode($parameter_data3);
				}else{
					$data['p3'] = null;
				}

				if($this->checkData($orginfo,$data)){
					$data['modify_date'] = time();
					$CommodityList->save($data);

					if($_POST['image']!=$orginfo['image']){
						$tmpdir = './Public/Content/tmp/';
						$srcdir = './Public/Content/CommodityList/';
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
				$this->ajaxReturn(0,$CommodityList->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajax_del(){
		if(!empty($_POST['deleteid'])){
			$CommodityList = D('CommodityList');

			$srcdir = './Public/Content/CommodityList/';
			$srcimagedir = './Public/Content/CommodityImages/';
			$srcdimagedir = './Public/Content/CommodityDetails/';

			for($i=0; $i<count($_POST['deleteid']); $i++){

				$data = $CommodityList->find($_POST['deleteid'][$i]);

				unlink($srcdir.'cut_'.$data['image']);
				unlink($srcdir.'thumb_'.$data['image']);


				$maps['lid'] = $data['id'];
				$maps['by'] = 1;

				$CommodityImages = M('CommodityImages');
				$ciinfos = $CommodityImages->where($maps)->select();

				for($s=0; $s<count($ciinfos); $s++){
					unlink($srcimagedir.'cut_'.$ciinfos[$s]['image']);
					unlink($srcimagedir.'thumb_'.$ciinfos[$s]['image']);
					$CommodityImages->where('by=1')->delete($ciinfos[$s]['id']);
				}

				$CommodityDetails = M('CommodityDetails');
				$cdinfos = $CommodityDetails->where('did='.$data['id'])->select();

				if(count($cdinfos)>0){
					for($k=0; $k<count($cdinfos); $k++){
						unlink($srcdimagedir.$cdinfos[$k]['image']);
						unlink($srcdimagedir.'thumb_'.$cdinfos[$k]['image']);
						$CommodityDetails->where('did='.$data['id'])->delete($cdinfos[$k]['id']);
					}
				}

				$num = $CommodityList->delete($_POST['deleteid'][$i]);
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

			$CommodityList = M('CommodityList');

			if($_POST['value']){

				$data[$_POST['type']] = 0;
				$data['modify_date'] = time();

				$CommodityList->where('id='.$_POST['by'])->setField($data);
				$this->ajaxReturn(0,'修改成功',1);


			}else{

				$data[$_POST['type']] = 1;
				$data['modify_date'] = time();

				$CommodityList->where('id='.$_POST['by'])->setField($data);
				$this->ajaxReturn(1,'修改成功',1);

			}

		}

	}

	function add_image(){
		if(!empty($_POST['pid']) && !empty($_POST['id']) && !empty($_POST['image'])){
			$map['lid'] = $_POST['id'];
			$map['by'] = 1;
			$map['image'] = $_POST['image'];
			$CommodityImages = M('CommodityImages');
			if($CommodityImages->add($map)){
				$tmpdir = './Public/Content/tmp/';
				$srcdir = './Public/Content/CommodityImages/';
				copy($tmpdir.'thumb_'.$_POST['image'], $srcdir.'thumb_'.$_POST['image']);
				copy($tmpdir.'cut_'.$_POST['image'], $srcdir.'cut_'.$_POST['image']);
				$this->ajaxReturn(0,"上传图片成功",1);
			}else{
				$this->ajaxReturn(0,"上传图片失败",0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function delete_image(){
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$CommodityImages = M('CommodityImages');
			$data = $CommodityImages->where('by=1')->find($_POST['id']);
			if($CommodityImages->where('by=1')->delete($_POST['id'])){
				$srcdir = './Public/Content/CommodityImages/';
				unlink($srcdir.'cut_'.$data['image']);
				unlink($srcdir.'thumb_'.$data['image']);
				$this->ajaxReturn(0,"删除成功",1);
			}else{
				$this->ajaxReturn(0,"删除失败",0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
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

	function returndata(){
		$CommoditySubclass = M('CommoditySubclass');
		$list = $CommoditySubclass->field('id,name')->where('pid='.$_POST['pid'])->select();
		$data = array();
		foreach($list as $key=>$value){
			$data[] = $value;
		}
		echo json_encode($data);
	}

}