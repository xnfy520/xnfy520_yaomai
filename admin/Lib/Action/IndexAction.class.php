<?php

class IndexAction extends CommonAction {

		public function index(){

			if($Userinfo = $this->check_is_admin()){

//				$filename = 'xnfy520.inc.php';
//				echo $filename;
//				echo '<br />';
//				$splits = explode('.',$filename);
//				dump($splits);
//				$type = strtolower($splits[count($splits)-1]);
//				echo '<br />';
//				echo count($splits);
//				unset($splits[count($splits)-1]);
//				dump($splits);
//				$name = implode('.',$splits);
//				echo $name.date('YmdHis',time()).$type;
				$group = C('USER_GROUP');
				if($Userinfo['Role']['level']==$group['province']['level']){
					$Role = M('Role');
					$Roleinfo = $Role->where('level='.$group['merchant']['level'])->find();
					$this->redirect('/User/index/rid/'.$Roleinfo['id']);
				//	$this->redirect('/OrderList/index');
				}else{
					$this->redirect('/System/configuration');
				}

			}else{
				$this->redirect('Public/login');
			}

		}

}