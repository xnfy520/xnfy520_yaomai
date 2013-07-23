<?php

class PublicAction extends CommonAction{

	function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4, 1, 'png', 60);
	}

	function login(){
		if($this->check_is_admin()){
			$this->redirect('/Index/index');
		}else{
			$this->display();
		}
	}

	public function ajax_admin_check_login(){

		if(empty($_POST['login_name'])) {
			$this->ajaxReturn(0,'登录名称不能为空!',0);
		}elseif (empty($_POST['password'])){
			$this->ajaxReturn(0,'密码不能为空!',0);
		}elseif (empty($_POST['verify'])){
			$this->ajaxReturn(0,'验证码不能为空!',0);
		}

		if($_SESSION['verify'] != md5($_POST['verify'])) {
			$this->ajaxReturn(0,'验证码错误!',0);
		}

		$map = array();

		$User = D('User');

		if(preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",$_POST['login_name'])){
			$Userinfo = $User->relation(true)->getByEmail($_POST['login_name']);
		}else{
			$Userinfo = $User->relation(true)->getByUsername($_POST['login_name']);
		}

		if(empty($Userinfo)){
			$this->ajaxReturn(0,'登录名称或密码出错!',0);
		}


		$user_group = C('USER_GROUP');

		if($Userinfo['status']==0){
			$this->ajaxReturn(0,'该用户不存在或未激活!',0);
		}elseif($Userinfo['Role']['level']!=$user_group['root']['level'] && $Userinfo['Role']['level']!=$user_group['province']['level']){
			dump($Userinfo['Role']['level']);
			dump($user_group['province']['level']);
			$this->ajaxReturn(0,'非管理员不能登录后台!',0);
		}

		import ('ORG.Util.RBAC');
		$map['username'] = $Userinfo['username'];
		$authInfo = RBAC::authenticate($map);

		if(false === $authInfo) {

			$this->ajaxReturn(0,'该帐户不存在或已禁止!',0);

		}else {

			if($authInfo['password'] != md5($_POST['password'])) {
				$this->ajaxReturn(0,'密码错误!',0);
			}

			unset($_SESSION[$_SESSION[C('USER_AUTH_KEY')]]);
			unset($_SESSION['username']);
			unset($_SESSION['email']);
			unset($_SESSION['userid']);
			unset($_SESSION['roleid']);

			$_SESSION[C('USER_AUTH_KEY')]	=	$authInfo['id'];
			$_SESSION['username'] = $authInfo['username'];
			$_SESSION['email'] = $authInfo['email'];
			$_SESSION['userid'] = $Userinfo['id'];
			$_SESSION['roleid'] = $Userinfo['roleid'];
			if($authInfo['username']=='admins') {
				$_SESSION['administrator']		=	true;
			}

			$save['logindate'] = time();
			$save['loginip'] = $_SERVER["REMOTE_ADDR"];
			$User->where('id='.$Userinfo['id'])->save($save);

			RBAC::saveAccessList();
			$this->ajaxReturn(__APP__.'/Index/index','登录成功!',1);
		}
	}

	public function ajax_admin_check_logout(){
		if($this->check_is_admin()) {
			unset($_SESSION);
			session_destroy();
			$this->ajaxReturn(__ROOT__,'退出成功!',1);
		}else {
			unset($_SESSION);
			session_destroy();
			$this->ajaxReturn(__APP__.'/Index/index','已经退出!',1);
		}

	}

	function upload(){
		import("ORG.Util.XheditorUpload");
		$obj = new XheditorUpload();

		$infos = $obj->upload();

		$fileinfo = GetImageInfo($infos['url']);

		if($fileinfo['width']>700){
			import("ORG.Util.emit_image");
			$img = new image($infos['filepath']);
			$img->thumb($infos['filename'], 700, 700);
		}

		echo json_encode($infos);

	}

}