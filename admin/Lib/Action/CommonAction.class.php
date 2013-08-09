<?php

	class CommonAction extends Action{

		function _initialize(){

			header("Content-Type:text/html;Charset=utf-8;");

			import('chrome');

			if (C('USER_AUTH_ON') && !in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE')))) {
				import('ORG.Util.RBAC');
				if (!RBAC::AccessDecision()) {
					//检查认证识别号
					if (!$_SESSION [C('USER_AUTH_KEY')]) {
						//跳转到认证网关
						redirect(PHP_FILE . C('USER_AUTH_GATEWAY'));
					}
//					// 没有权限 抛出错误
//					if (C('RBAC_ERROR_PAGE')) {
//						// 定义权限错误页面
//						redirect(C('RBAC_ERROR_PAGE'));
//					} else {
//						if (C('GUEST_AUTH_ON')) {
//							$this->assign('jumpUrl', PHP_FILE . C('USER_AUTH_GATEWAY'));
//						}
//						// 提示错误信息
//						$this->error(L('_VALID_ACCESS_'));
//					}
				}

			}

			$Role = M('Role');
			$Rolelist = $Role->where('publish=1')->order('sort,level')->select();
			$this->assign('Rolelist',$Rolelist);

			$AdvertCategory = D('AdvertCategory');
			$AdvertCategory_left = $AdvertCategory->order('sort,create_date')->select();
			$this->assign('AdvertCategory_left',$AdvertCategory_left);

			$CommodityCategory = M('CommodityCategory');
			$CommodityCategory_left = $CommodityCategory->order('sort,create_date')->select();
			$this->assign('CommodityCategory_left',$CommodityCategory_left);

			if($Userinfo = $this->check_is_admin()){
				$this->assign('Userinfo',$Userinfo);
				$group = C('USER_GROUP');
				if($Userinfo['Role']['level']==$group['province']['level']){
					$this->assign('p_level',$group['province']['level']);
					$this->assign('m_level',$group['merchant']['level']);
					$Roleinfo = $Role->where('level='.$group['merchant']['level'])->find();
					if(MODULE_NAME!='OrderList' && MODULE_NAME!='User' && MODULE_NAME!='Public'){
					//	$this->redirect('/OrderList/index');
						$this->redirect('/User/index/rid/'.$Roleinfo['id']);
					}else{
						if(MODULE_NAME=='User'){
							if(!empty($_GET['rid']) || !empty($_POST['rid'])){
								!empty($_GET['rid']) ? $Roles = $Role->find($_GET['rid']) : $Roles = $Role->find($_POST['rid']);
								if($Roles['level']!=$group['merchant']['level']){
									$this->redirect('/User/index/rid/'.$Roleinfo['id']);
								}
							}

						}
					}
				}
			}

		}

		function check_is_admin(){
			if(isset($_SESSION['Admin']['username']) && isset($_SESSION['Admin']['email']) && isset($_SESSION['Admin']['userid']) && isset($_SESSION['Admin']['roleid'])){
				if(!empty($_SESSION['Admin']['username']) && !empty($_SESSION['Admin']['email']) && !empty($_SESSION['Admin']['userid']) && !empty($_SESSION['Admin']['roleid'])){
					$info['username'] = $_SESSION['Admin']['username'];
					$info['email'] = $_SESSION['Admin']['email'];
					$info['id'] = $_SESSION['Admin']['userid'];
					$info['roleid'] = $_SESSION['Admin']['roleid'];
					$User = D('User');
					$Userinfo = $User->relation(true)->where($info)->find();
					$group = C('USER_GROUP');
					if($Userinfo){
						if($Userinfo['Role']['level']==$group['root']['level'] || $Userinfo['Role']['level']==$group['province']['level']){
							return $Userinfo;
						}else{
							return false;
						}
					}else{
						return false;
					}
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

	}