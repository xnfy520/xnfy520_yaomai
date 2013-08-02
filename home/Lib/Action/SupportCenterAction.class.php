<?php

class SupportCenterAction extends CommonAction {

	public function index(){
		
		$HelpCenterInformation = D('HelpCenterInformation');

		if(isset($_GET['id']) && !empty($_GET['id'])){
			$data = $HelpCenterInformation->relation(true)->where('pid<>1 AND publish=1')->find($_GET['id']);
		}else{
			$data = $HelpCenterInformation->relation(true)->where('pid<>1 AND publish=1')->order('sort,id')->find();
		}

		if($data){
			$this->assign('data',$data);
			$this->display();
		}else{
			$this->redirect('/Index');
		}

	}

}
