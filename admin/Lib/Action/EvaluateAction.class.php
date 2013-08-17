<?php

class EvaluateAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			$Evaluate = M('Evaluate');

			if(isset($_POST['search'])){
				if(!empty($_POST['key'])){
					switch($_POST['search']){
						case 1 :
							$datas['id'] = $_POST['key'];
							break;
						case 2:
							$datas['username'] = array("like","%{$_POST['key']}%");
							break;
						case 3 :
							$datas['alias'] = array('like',"%{$_POST['key']}%");
							break;
					}
					$count = $Evaluate->where($datas)->count();
					$page = new page($count,15);
					$list = $Evaluate->where($datas)->limit($page->setlimit())->order('id desc')->select();
				}else{
					$this->redirect('/Evaluate/index');
				}
			}else{
				$count = $Evaluate->count();
				$page = new page($count,15);
				$list = $Evaluate->limit($page->setlimit())->order('id desc')->select();
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
			$Evaluate = M('Evaluate');

			if(isset($_POST['search'])){
				if(!empty($_POST['key'])){
					switch($_POST['search']){
						case 1 :
							$datas['id'] = $_POST['key'];
							break;
						case 2:
							$datas['username'] = array("like","%{$_POST['key']}%");
							break;
						case 3 :
							$datas['alias'] = array('like',"%{$_POST['key']}%");
							break;
					}
					$count = $Evaluate->where($datas)->count();
					$page = new page($count,15);
					$list = $Evaluate->where($datas)->limit($page->setlimit())->order('id desc')->select();
				}else{
					return false;
				}
			}else{
				$count = $Evaluate->count();
				$page = new page($count,15);
				$list = $Evaluate->limit($page->setlimit())->order('id desc')->select();
			}

			$this->assign('list',$list);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}

	}

	function edit(){
		if($this->check_is_admin()){
			if(isset($_GET['id'])){

				$Evaluate = M('Evaluate');
				$data = $Evaluate->find($_GET['id']);
				$this->assign('data', $data);

				$this->display();

			}else{
				$this->redirect('/Evaluate/index');
			}
		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajaxdel(){
		if(!empty($_POST['deleteid'])){
			$Evaluate = D('Evaluate');
			for($i=0; $i<count($_POST['deleteid']); $i++){
				$num = $Evaluate->delete($_POST['deleteid'][$i]);
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