<?php

class AboutAction extends CommonAction {

	public function index(){

		$HelpCenterInformation = M('HelpCenterInformation');

		if(isset($_GET['id']) && !empty($_GET['id'])){
			$data = $HelpCenterInformation->where('pid=1 AND publish=1')->find($_GET['id']);
		}else{
			$data = $HelpCenterInformation->where('pid=1 AND publish=1')->order('sort,id')->find();
		}

		if($data){
			$this->assign('data',$data);
			$this->display();
		}else{
			$this->redirect('/Index');
		}

	}

}
