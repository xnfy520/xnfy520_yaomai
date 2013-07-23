<?php

class SpecificationListAction extends CommonAction{

	function index(){

		import("ORG.Util.emit_page");
		$SpecificationList = D('SpecificationList');

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
				$count = $SpecificationList->where($datas)->count();
				$page = new page($count,15);
				$list = $SpecificationList->relation(true)->where($datas)->limit($page->setlimit())->order('sort')->select();
			}else{
				$this->error("搜索内容不能为空！", __APP__.'/SpecificationList/index');
			}
		}else{
			$count = $SpecificationList->count();
			$page = new page($count,15);
			$list = $SpecificationList->relation(true)->limit($page->setlimit())->order('sort')->select();
		}

		$this->assign('list',$list);

        $this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

		$this->display('index');
	}

	function edit(){
		if(isset($_GET['id'])){
			$SpecificationList = M('SpecificationList');
			$data = $SpecificationList->find($_GET['id']);
			$this->assign('data', $data);
			$this->display();
		}else{
			$this->error('异常操作！');
		}
	}

	function ajaxinsert(){
		$SpecificationList = D('SpecificationList');
		if($data = $SpecificationList->create()){
			if($SpecificationList->add()){
				$this->ajaxReturn(0,"新增成功！",1);
			}else{
				$this->ajaxReturn(0,"新增错误！",0);
			}
		}else{
			$this->ajaxReturn(0,$SpecificationList->getError(),0);
		}
	}

	function ajaxedit(){
		if(isset($_POST['id'])){
			$SpecificationList = D('SpecificationList');
			if($data = $SpecificationList->create()){
					$SpecificationList->save();
					$this->ajaxReturn(0,'修改数据成功',1);
			}else{
				$this->ajaxReturn(0,$SpecificationList->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$SpecificationList = D('SpecificationList');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$num = $SpecificationList->delete($_POST['deleteid'][$i]);
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
					$SpecificationList = D('SpecificationList');
						if($_POST['publish']){
                            $data['publish'] = 0;
                            $data['ModifyDate'] = time();
							$SpecificationList->where('id='.$_POST['id'])->setField($data);
							$this->ajaxReturn(0,'修改成功',1);
						}else{
                            $data['publish'] = 1;
                            $data['ModifyDate'] = time();
							$SpecificationList->where('id='.$_POST['id'])->setField($data);
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