<?php

class IndexAction extends CommonAction {

    public function index(){

    	$AdvertList = M('AdvertList');
    	$AdvertList1 = $AdvertList->where('publish=1 AND pid=5')->order('sort')->limit(6)->select();
    	$AdvertList2 = $AdvertList->where('publish=1 AND pid=6')->order('sort')->find();
    	$AdvertList3 = $AdvertList->where('publish=1 AND pid=7')->order('sort')->limit(2)->select();

    	$this->assign('a1',$AdvertList1);
    	$this->assign('a2',$AdvertList2);
    	$this->assign('a3',$AdvertList3);

		$this->display();

    }

//	function callback(){
//
//		import("ORG.Net.saetv2_ex");
//		$o = new SaeTOAuthV2(C('login_config.sina_wb_akey'),C('login_config.sina_wb_skey'));
//
//		if (isset($_REQUEST['code'])) {
//			$keys = array();
//			$keys['code'] = $_REQUEST['code'];
//			$keys['redirect_uri'] = C('login_config.sina_wb_callback_url');
//			try {
//				$token = $o->getAccessToken( 'code', $keys ) ;
//			} catch (OAuthException $e) {
//			}
//		}
//
//		if ($token) {
//			$_SESSION['token'] = $token;
//			setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
//			$this->redirect('/Index/authorization');
//		}else{
//			$this->redirect('/Index/index');
//		}
//
//
//
//	}
//
//	function authorization(){
//		if($_SESSION['token']['access_token'] ){
//			$c = new SaeTClientV2(C('login_config.sina_wb_akey'),C('login_config.sina_wb_skey'), $_SESSION['token']['access_token'] );
//			$ms  = $c->home_timeline(); // done
//			$uid_get = $c->get_uid();
//			$uid = $uid_get['uid'];
//			$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
//			if(isset($user_message['error']) && isset($user_message['error_code'])){
//				$this->redirect('/Index');
//			}else{
//				$user = D('User');
//				$userinfo = $user->relation(true)->getByDomain($user_message['domain']);
//				if(empty($userinfo)){
//					$this->assign('user_message', $user_message);
//					$this->display();
//				}else{
//					$_SESSION['username'] = $userinfo['username'];
//					$_SESSION['nickname'] = $userinfo['nickname'];
//					$_SESSION['userid'] = $userinfo['id'];
//					$_SESSION['userrole'] = $userinfo['roleuser']['roleid'];
//					$this->redirect('/Index');
//				}
//			}
//		}else{
//			$this->redirect('/Index');
//		}
//	}

    function qc_back(){
    	 if($Userinfo = $this->checkLogin()){
    	 	$this->redirect('/Member');
    	 }else{
    	 	$this->display();
    	 }
    }

    function login(){
    	 if($Userinfo = $this->checkLogin()){
    	 	$this->redirect('/Member');
    	 }else{
    	 	$this->display();
    	 }
    }

    function check_bind_qq(){
    	if(isset($_POST['nickname']) && !empty($_POST['nickname'])){
    		$User = M('User');
    		$w['tencent_qq_nickname'] =array('eq',$_POST['nickname']);
    		$user = $User->where($w)->find();
    		if($user){
    			$_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['userid'] = $user['id'];
                $_SESSION['roleid'] =$user['roleid'];
    			$this->ajaxReturn(0,"此QQ已经绑定",0);
    		}else{
    			$this->ajaxReturn(0,"可以绑定QQ",1);
    		}
    	}else{
    		$this->ajaxReturn(0,"异常操作",0);
    	}
    }

    function ajax_bind_qq(){
    	if(empty($_POST['login_name']) || empty($_POST['password']) || empty($_POST['qq_name'])){
    		$this->ajaxReturn(0,"异常操作",0);
    	}
    	 $User = D('User');
        if(preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",$_POST['login_name'])){
            $Userinfo = $User->getByEmail($_POST['login_name']);
        }else{
            $Userinfo = $User->getByUsername($_POST['login_name']);
        }
        if($Userinfo){
            if(md5($_POST['password'])==$Userinfo['password']){
                $Role = M('Role');
                $group = C('USER_GROUP');
                $Roleinfo = $Role->where('level='.$group['member']['level'])->find();
                if($Userinfo['roleid']==$Roleinfo['id'] && $Userinfo['status']==1){
                	if(!empty($Userinfo['tencent_qq_nickname'])){
                		$this->ajaxReturn(0,"此用户已经绑定了QQ！",0);
                	}
                    $map['tencent_qq_nickname'] = $_POST['qq_name'];
                    if($User->where('id='.$Userinfo['id'])->setField($map)){
                    	$_SESSION['username'] = $Userinfo['username'];
		                $_SESSION['email'] = $Userinfo['email'];
		                $_SESSION['userid'] = $Userinfo['id'];
		                $_SESSION['roleid'] =$Userinfo['roleid'];
                    	$this->ajaxReturn(__APP__.'/Member/index.html',"绑定QQ成功",1);
                    }else{
                    	$this->ajaxReturn(__APP__.'/Member/index.html',"绑定QQ失败",0);
                    }
                }else{
                    $this->ajaxReturn(0,"该用户不存在或未被激活！",0);
                }
            }else{
                $this->ajaxReturn(0,"用户名或密码错误！",0);
            }
        }else{
            $this->ajaxReturn(0,"该用户不存在或未被激活！",0);
        }
    }

	function save_sina_wb_userinfo(){
		if(isset($_POST['datas']) && !empty($_POST['datas'])){
			$_SESSION['sina_wb_userinfo'] = $_POST['datas'];
			$this->ajaxReturn(0,"设置成功！",1);
		}else{
			unset($_SESSION['sina_wb_userinfo']);
			$this->ajaxReturn(0,"设置失败！",0);
		}
	}

	function get_qq_userinfo(){
		if(isset($_POST['datas']) && !empty($_POST['datas'])){
			dump($_POST);
		//	$_SESSION['qq_userinfo'] = $_POST['datas'];
			$this->ajaxReturn(0,"设置成功！",1);
		}else{
		//	unset($_SESSION['qq_userinfo']);
			$this->ajaxReturn(0,"设置失败！",0);
		}
	}

	function save_qq_userinfo(){
		if(isset($_POST['datas']) && !empty($_POST['datas'])){
			$_SESSION['qq_userinfo'] = $_POST['datas'];
			$this->ajaxReturn(0,"设置成功！",1);
		}else{
			unset($_SESSION['qq_userinfo']);
			$this->ajaxReturn(0,"设置失败！",0);
		}
	}

	function return_provinces(){
		$Provinces = M('Provinces');
		$list = $Provinces->where('pid='.$_POST['pid'])->field('id,name')->order('sort')->select();
		$data = array();
		foreach($list as $key=>$value){
			$data[] = $value;
		}
		echo json_encode($data);
	}

//	function del_sina_wb_userinfo(){
//		if(isset($_SESSION['sina_wb_userinfo'])){
//			unset($_SESSION['sina_wb_userinfo']);
//			$this->ajaxReturn(0,"设置成功！",1);
//		}else{
//			$this->ajaxReturn(0,"设置失败！",0);
//		}
//	}


	function get_pwd(){
		if(isset($_POST['verify']) && !empty($_POST['verify'])){
			if(md5($_POST['verify'])!=$_SESSION['verify']){
				$this->ajaxReturn(0,"验证码错误！",0);
			}
		}
		$User = M('User');
		$map['email'] = $_POST['email'];
		$UserInfo = $User->where($map)->find();
		if($UserInfo){
			// if(empty($UserInfo['check_email_time'])){
			// 	$this->ajaxReturn(0,"此用户邮箱未激活，无法发送重置邮件！",0);
			// }else{
				$time = time();
				$mailTo = array();
				$AddAttachment = array();
				array_push(
					$mailTo, array(($UserInfo['email']!=$_POST['email'] ? $_POST['email'] : $UserInfo['email']),"收件人姓名:".$UserInfo['username'])
				);
				$subject = C('SITE_NAME').' 重置用户密码';
				$url = 'http://'.$_SERVER['HTTP_HOST'].'/xnfy520_yaomai/Index/set_pwd/id/'.enstrhex($UserInfo['id'],'key').'/ti/'.enstrhex($time,'key');
				$urls = '<a href="http://'.$_SERVER['HTTP_HOST'].'/xnfy520_yaomai/Index/set_pwd/id/'.enstrhex($UserInfo['id'],'key').'/ti/'.enstrhex($time,'key').'">点击</a>';
				$body = '您的重置密码地址为<br/>'.$url.'<br/>或 '.$urls;
				if(sendmail_sunchis_com($mailTo,$subject,$body,$AddAttachment,$this->get_email_config())){
					$data['check_pwd_time'] = $time;
					$User->where('id='.$UserInfo['id'])->setField($data);
					$this->ajaxReturn(0,"重置密码邮件已经发出，请尽快查收!",1);
				}else{
					$this->ajaxReturn(0,"系统异常！",0);
				}
			// }

		}else{
			$this->ajaxReturn(0,"不存在此用户,请输入正确的邮箱！",0);
		}
	}

	function set_pwd(){
		if(!empty($_GET['id']) && !empty($_GET['ti'])){
			$userid = destrhex($_GET['id'],'key');
			$cpt = destrhex($_GET['ti'],'key');
			$User = M('User');
			$map['id'] = (int)$userid;
			$map['check_pwd_time'] = (int)$cpt;
			$Userinfo = $User->field('id,check_pwd_time')->where($map)->find();
			if($Userinfo && $Userinfo['check_pwd_time']+60*60*24*3>time()){
				$this->assign('set_uid',$Userinfo['id']);
				$this->display();
			}else{
				$this->redirect('/Index/login');
			}
		}else{
			$this->redirect('/Index/login');
		}
	}

	function change_pwd(){
		$User = M('User');
		if($data = $User->create()){
			$UserInfo = $User->find($data['id']);
			if($UserInfo && $UserInfo['check_pwd_time']){
				$map['password'] = md5($data['password']);
				$map['check_pwd_time'] = null;
				if($User->where('id='.$data['id'])->setField($map)){
					$this->ajaxReturn(0,"密码重置成功，请登录！",1);
				}else{
					$this->ajaxReturn(0,"系统异常",1);
				}
			}
		}else{
			$this->ajaxReturn(0,$User->getError(),0);
		}
	}

}
