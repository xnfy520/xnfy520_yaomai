<?php

	class UserAction extends CommonAction{

		function index(){
			if($Userinfo = $this->check_is_admin()){
				if(isset($_GET['rid']) && !empty($_GET['rid'])){
					$Role = M('Role');
					$query['publish'] = 1;
					$Roleinfo = $Role->where($query)->order('sort,level')->select();
					$this->assign('clist',$Roleinfo);

					$Role_name = $Role->find($_GET['rid']);
					$this->assign('Role_name',$Role_name);

					$instation_message_type = C('instation_message_type');
					$this->assign('instation_message_type',$instation_message_type);

					import("ORG.Util.emit_ajax_page");

					$User = D('User');

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
									$datas['email'] = array('like',"%{$_POST['key']}%");
									break;
							}
							if(isset($_GET['rid'])){
								$datas['roleid'] = $_GET['rid'];
								$level = $Role->where('id='.$_GET['rid'])->getField('level');
							}
							$list = $User->where($datas)->relation(true)->order('id desc')->select();
						}else{
							$this->error("搜索不能为空");
						}
					}else{
						if(isset($_GET['rid'])){
							$level = $Role->where('id='.$_GET['rid'])->getField('level');
							$list = $User->relation(true)->where('roleid='.$_GET['rid'])->order('id desc')->select();
						}else{
							$list = $User->relation(true)->order('id desc')->select();
						}
					}

					$root =  C('USER_GROUP.root');
					$admin =  C('USER_GROUP.admin');
					$province =  C('USER_GROUP.province');
					$city =  C('USER_GROUP.city');
					$merchant =  C('USER_GROUP.merchant');
					$member =  C('USER_GROUP.member');

					if($Userinfo['Role']['level']==$province['level']){
						$where_s = explode(',',$Userinfo['allow_provinces']);
						$Merchant = M('Merchant');
						$Infos = array();
						foreach($list as $key=>$value){
							if($value['audit']==0){
								$w_i = $this->getP($value['where']);
							}else{
								$w_i = $this->getP($Merchant->where('by_user='.$value['id'])->getField('where'));
							}

							if(in_array($w_i,$where_s)){
								$Infos[] = $list[$key];
							}
						}
					}else{
						$Infos = $list;
					}



					$fpage = 15;

					array_values($Infos);

					$datas = array_chunk($Infos,$fpage,true);

					$this->assign('list',isset($_GET['page']) ? $datas[$_GET['page']-1] : $datas[0]);

					$page = new page(count($Infos),$fpage);

					$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));


				//	$this->assign('list',$list);// 赋值数据集
				//	$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

					switch($level){
						case $root['level'];
							$this->display();
							break;
						case $admin['level'];
							$this->display();
							break;
						case $province['level'];
							$this->display('province');
							break;
						case $city['level'];
							$this->display();
							break;
						case $merchant['level'];
							$this->display('merchant');
							break;
						case $member['level'];
							$this->display('member');
							break;
						default:
						//	$this->display();
							break;
					}

				}else{
					$this->redirect('/Index/index');
				}

			}else{
				$this->redirect('/Public/login');
			}

		}

		function getP($id){
			$Provinces = M('Provinces');
			$Provincesinfos = $Provinces->find($id);
			if($Provincesinfos['level']==C('provinces_level.city_level')){
				$Provinces_p = $Provinces->find($Provincesinfos['pid']);
			}else if($Provincesinfos['level']==C('provinces_level.county_level')){
				$Provinces_c = $Provinces->find($Provincesinfos['pid']);
				$Provinces_p = $Provinces->find($Provinces_c['pid']);
			}
			if(!empty($Provinces_p)){
				return $Provinces_p['id'];
			}else{
				return '';
			}
		}

		public function ajax_page_index(){

			if($Userinfo = $this->check_is_admin()){
				if(isset($_GET['rid']) && !empty($_GET['rid'])){
					$Role = M('Role');
					$query['publish'] = 1;
					$Roleinfo = $Role->where($query)->order('sort,level')->select();
					$this->assign('clist',$Roleinfo);

					$Role_name = $Role->find($_GET['rid']);
					$this->assign('Role_name',$Role_name);

					$instation_message_type = C('instation_message_type');
					$this->assign('instation_message_type',$instation_message_type);

					import("ORG.Util.emit_ajax_page");

					$User = D('User');

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
									$datas['email'] = array('like',"%{$_POST['key']}%");
									break;
							}
							if(isset($_GET['rid'])){
								$datas['roleid'] = $_GET['rid'];
								$level = $Role->where('id='.$_GET['rid'])->getField('level');
							}
							$list = $User->where($datas)->relation(true)->order('id desc')->select();
						}else{
							$this->error("搜索不能为空");
						}
					}else{
						if(isset($_GET['rid'])){
							$level = $Role->where('id='.$_GET['rid'])->getField('level');
							$list = $User->relation(true)->where('roleid='.$_GET['rid'])->order('id desc')->select();
						}else{
							$list = $User->relation(true)->order('id desc')->select();
						}
					}

					$root =  C('USER_GROUP.root');
					$admin =  C('USER_GROUP.admin');
					$province =  C('USER_GROUP.province');
					$city =  C('USER_GROUP.city');
					$merchant =  C('USER_GROUP.merchant');
					$member =  C('USER_GROUP.member');

					if($Userinfo['Role']['level']==$province['level']){
						$where_s = explode(',',$Userinfo['allow_provinces']);
						$Merchant = M('Merchant');
						$Infos = array();
						foreach($list as $key=>$value){
							if($value['audit']==0){
								$w_i = $this->getP($value['where']);
							}else{
								$w_i = $this->getP($Merchant->where('by_user='.$value['id'])->getField('where'));
							}
							if(in_array($w_i,$where_s)){
								$Infos[] = $list[$key];
							}
						}
					}else{
						$Infos = $list;
					}

					$fpage = 15;

					array_values($Infos);

					$datas = array_chunk($Infos,$fpage,true);

					$this->assign('list',isset($_GET['page']) ? $datas[$_GET['page']-1] : $datas[0]);

					$page = new page(count($Infos),$fpage);

					$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

					switch($level){
						case $root['level'];
							$this->display();
							break;
						case $admin['level'];
							$this->display();
							break;
						case $province['level'];
							$this->display('ajax_page_province');
							break;
						case $city['level'];
							$this->display();
							break;
						case $merchant['level'];
							$this->display('ajax_page_merchant');
							break;
						case $member['level'];
							$this->display('ajax_page_member');
							break;
						default:
							$this->display();
							break;
					}

				}

			}

		}

		/**
		 * 指向添加用户界面
		 */
		function add(){
			if($this->check_is_admin()){
				$Role = M('Role');
				$Roleinfo = $Role->field('id,name,level')->where('publish=1')->order('id desc')->select();
				if(!empty($Roleinfo)){
					$this->assign('Roleinfo', $Roleinfo);
					$this->assign('now_time',date("Y-m-d H:i:s"));
					$this->display();
				}
			}else{
				$this->redirect('/Public/login');
			}

		}

		function get_zodiac()
		{
			if(isset($_POST['date']) && !empty($_POST['date'])){
				$date = strtotime($_POST['date']);
				$month = date('m',$date);
				$day = date('d',$date);
// 检查参数有效性
				if ($month < 1 || $month > 12 || $day < 1 || $day > 31)
					return (false);
// 星座名称以及开始日期
				$signs = array(
					array( "20" => "宝瓶座"),
					array( "19" => "双鱼座"),
					array( "21" => "白羊座"),
					array( "20" => "金牛座"),
					array( "21" => "双子座"),
					array( "22" => "巨蟹座"),
					array( "23" => "狮子座"),
					array( "23" => "处女座"),
					array( "23" => "天秤座"),
					array( "24" => "天蝎座"),
					array( "22" => "射手座"),
					array( "22" => "摩羯座")
				);
				list($sign_start, $sign_name) = each($signs[(int)$month-1]);
				if ($day < $sign_start)
					list($sign_start, $sign_name) = each($signs[($month -2 < 0) ? $month = 11: $month -= 2]);
				echo $sign_name;
			}else{
				echo '';
			}

		}//函数结束

		function get_phone_location(){
			if(isset($_POST['phone']) && !empty($_POST['phone'])){
				$phoneinfo = file_get_contents("http://www.youdao.com/smartresult-xml/search.s?type=mobile&q=".$_POST['phone']);

				$xml = simplexml_load_string($phoneinfo);

				$location = (string) $xml->product->location;//在做数据比较时，注意要先强制转换

				echo $location;
			}else{
				echo '';
			}

		}

		/**
		 * 指向修改用户界面
		 */
		function edit(){
			if($this->check_is_admin()){
				if(isset($_GET['id']) && !empty($_GET['id'])){
					$User = D('User');
					$data = $User->relation(true)->find($_GET['id']);

					$instation_message_type = C('instation_message_type');
					$this->assign('instation_message_type',$instation_message_type);

					if(!empty($data['birthday'])){
						$birthday = strtotime($data['birthday']);
						$data['zodiac'] = get_zodiac(date('m',$birthday),date('d',$birthday));
					}
					if(!empty($data['regip'])){
						$data['reg_area'] = getArea($data['regip']);
					}
					if(!empty($data['loginip'])){
						$data['log_area'] = getArea($data['loginip']);
					}
					if(!empty($data['phone'])){
						$phoneinfo = file_get_contents("http://www.youdao.com/smartresult-xml/search.s?type=mobile&q=".$data['phone']);

						$xml = simplexml_load_string($phoneinfo);

						$location = (string) $xml->product->location;//在做数据比较时，注意要先强制转换

						$data['location'] = $location;
					}

					$this->assign('data', $data);
					$Role = M('Role');
					$Roleinfo = $Role->field('id,name,level')->where('publish=1')->order('id desc')->select();
					$this->assign('Roleinfo', $Roleinfo);
					$this->display();
				}else{
					$this->redirect('/User/edit');
				}
			}else{
				$this->redirect('/Public/login');
			}

		}

		function ajax_get_area(	$area){

			if(!empty($_POST['area'])){
				import("ORG.Net.IpLocation");// 导入IpLocation类

				$Ip = new IpLocation("UTFWry.dat"); // 实例化类 参数表示IP地址库文件

				$area = $Ip->getlocation($_POST['area']); // 获取某个IP地址所在的位置

				if($area){
					$this->ajaxReturn($area['country'],'ok',1);
				}else{
					$this->ajaxReturn('未知地址','error',0);
				}
			}else{
				$this->ajaxReturn('异常操作','error',0);
			}

		}


		function ajaxinsert(){
			$User = D('User');

			if($data = $User->create()){
				$data['regdate'] = strtotime($data['regdate']);

				if(empty($data['logindate'])){
					$data['logindate'] = 0;
				}else{
					$data['logindate'] = strtotime($data['logindate']);
				}

				if(empty($data['regip'])){
					$data['regip'] = $_SERVER['REMOTE_ADDR'];
				}

				if(empty($data['nickname'])){
					$data['nickname'] = $data['username'];
				}

				if($User->add($data)){

					if(!empty($data['avatar'])){
						$tmpdir = './Public/Content/tmp/';
						$srcdir = './Public/Content/Avatar/';
						copy($tmpdir.'cut_thumb_'.$data['avatar'], $srcdir.'cut_thumb_'.$data['avatar']);
					}

					$this->ajaxReturn(0,"新增成功！",1);
				}else{
					$this->ajaxReturn(0,"新增错误！",0);
				}
			}else{
				$this->ajaxReturn(0,$User->getError(),0);
			}
		}

		function checkData($orgdata,$data){
			$flag = false;
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
			return $flag;
		}

		function ajaxedit(){

			if(isset($_POST['id']) && !empty($_POST['id'])){

				$User = D('User');

				if($data = $User->create()){

					$data['regdate'] = strtotime($data['regdate']);

					if(empty($data['logindate'])){
						$data['logindate'] = 0;
					}else{
						$data['logindate'] = strtotime($data['logindate']);
					}

					if(empty($data['nickname'])){
						$data['nickname'] = $data['username'];
					}

					$Userinfo = $User->find($_POST['id']);
					if(empty($data['password'])){
						unset($data['password']);
						unset($Userinfo['password']);
						unset($Userinfo['checktime']);
						unset($Userinfo['checkstatus']);
						if($this->checkData($Userinfo,$data)){
							if($User->save($data)){
								if($_POST['avatar']!=$Userinfo['avatar']){
									$tmpdir = './Public/Content/tmp/';
									$srcdir = './Public/Content/Avatar/';
									copy($tmpdir.'cut_thumb_'.$data['avatar'], $srcdir.'cut_thumb_'.$data['avatar']);
									unlink($srcdir.'cut_thumb_'.$Userinfo['avatar']);
								}
								$this->ajaxReturn(0,"修改用户信息成功",1);
							}else{
								$this->ajaxReturn(0,"修改用户信息失败",0);
							}
						}else{
							$this->ajaxReturn(0,'没有数据被修改',0);
						}

					}else{
						$data['password'] = md5($data['password']);
						unset($Userinfo['checktime']);
						unset($Userinfo['checkstatus']);
						if($this->checkData($Userinfo,$data)){
							if($User->save($data)){
								if($_POST['avatar']!=$Userinfo['avatar']){
									$tmpdir = './Public/Content/tmp/';
									$srcdir = './Public/Content/Avatar/';
									copy($tmpdir.'cut_thumb_'.$data['avatar'], $srcdir.'cut_thumb_'.$data['avatar']);
									unlink($srcdir.'cut_thumb_'.$Userinfo['avatar']);
								}
								$this->ajaxReturn(0,"修改用户信息成功",1);
							}else{
								$this->ajaxReturn(0,"修改用户信息失败",0);
							}
						}else{
							$this->ajaxReturn(0,'没有数据被修改',0);
						}

						if($_POST['audit']){

						}else{

						}

					}
				}else{
					$this->ajaxReturn(0,$User->getError(),0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作",0);
			}

		}

		function ajaxdel(){
			if(!empty($_POST['deleteid'])){
				$User = D('User');
				$srcdir = './Public/Content/Avatar/';
				for($i=0; $i<count($_POST['deleteid']); $i++){
					$Userinfo = $User->find($_POST['deleteid'][$i]);
					if($Userinfo['roleid']==1 && $Userinfo['id']==1){
						$this->ajaxReturn(0,'此用户不能被删除',0);
					}else{
						$num = $User->delete($_POST['deleteid'][$i]);
						unlink($srcdir.'cut_thumb_'.$Userinfo['avatar']);
					}
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

					$User = D('User');

					if($_POST['by']==1){

						$this->ajaxReturn(0,'该用户不能被关闭',0);

					}else{

						if($_POST['value']){

							$data[$_POST['type']] = 0;
							$data['modify_date'] = time();

							if($_POST['type']=='audit'){

								$Merchant = M('Merchant');
								$Userinfo = $User->relation(true)->find($_POST['by']);
								$user_group_merchant =  C('USER_GROUP.merchant');
								$count = $Merchant->where('by_user='.$_POST['by'])->count();

								if(!empty($Userinfo) && ($Userinfo['Role']['level']==$user_group_merchant['level']) && ($count==1)){

									$map['by_user'] = $_POST['by'];
									$orginfo = $Merchant->find($map['by_user']);
									if($Merchant->delete($map)){
										$srcdir = './Public/Content/Merchant/';
										unlink($srcdir.$orginfo['banner']);
										unlink($srcdir.$orginfo['sign']);

										$User->where('id='.$_POST['by'])->setField($data);

										$this->ajaxReturn(0,'修改成功',1);

									}else{

										$this->ajaxReturn(1,'修改失败',0);

									}

								}else{
									$this->ajaxReturn(1,'修改失败',0);
								}

							}else{

								$User->where('id='.$_POST['by'])->setField($data);
								$this->ajaxReturn(0,'修改成功',1);

							}

						}else{

							$data[$_POST['type']] = 1;
							$data['modify_date'] = time();

							if($_POST['type']=='audit'){

								$Merchant = M('Merchant');
								$Userinfo = $User->relation(true)->find($_POST['by']);
								$user_group_merchant =  C('USER_GROUP.merchant');
								$count = $Merchant->where('by_user='.$_POST['by'])->count();

								if(!empty($Userinfo) && ($Userinfo['Role']['level']==$user_group_merchant['level']) && ($count==0)){
									$map['no'] = substr(strrev(time()),0,8);
									$map['by_user'] = $_POST['by'];
									$map['where'] = $Userinfo['where'];
									$map['create_date'] = time();
									if($Merchant->add($map)){
										$User->where('id='.$_POST['by'])->setField($data);
										$this->ajaxReturn(1,'修改成功',1);
									}else{
										$this->ajaxReturn(1,'修改失败',0);
									}
								}else{
									$this->ajaxReturn(1,'修改失败',0);
								}

							}else{
								$User->where('id='.$_POST['by'])->setField($data);
								$this->ajaxReturn(1,'修改成功',1);
							}

						}

					}

			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
		}


		public function uploads(){
			import("ORG.Net.emit_upload");
			import("ORG.Util.emit_image");
			$upload = new upload(array("filepath"=>"./Public/Content/tmp","allowtype"=>array('gif','png','jpg'),"israndname"=>true,"maxsize"=>20000000000));
			if($upload->uploadfiles('myfile')){
				$src = "./Public/Content/tmp/";
				$img = new image($src);
				$imgname =  $upload->getnewname();
				copy($src.$imgname,$src.'thumb_'.$imgname);

				if($cutimg = $img->cut($imgname,'cut_')){
					$thumb = $img->thumb('thumb_'.$imgname,1024,1024);
					$cut = $img->thumb($cutimg, 300, 300);
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

		function copyOrgImage(){
			if(isset($_POST['imagename']) && !empty($_POST['imagename'])){
				$src = "./Public/Content/tmp/";
				if(copy($src.$_POST['imagename'],$src.'cut_thumb_'.$_POST['imagename'])){
					$this->ajaxReturn(0,'上传成功',1);
				}else{
					$this->ajaxReturn(0,'上传失败',0);
				}
			}else{
				$this->ajaxReturn(0,'上传失败',0);
			}
		}

		function ajaxTailorIimage(){
			import("ORG.Util.emit_image");
			$tmp_src = "./Public/Content/tmp/";
			$desc_src = "./Public/Content/Avatar/";
			$img = new image($tmp_src);
			$imageinfo['x1'] = $_POST['x1'];
			$imageinfo['y1'] = $_POST['y1'];
			$imageinfo['x2'] = $_POST['x2'];
			$imageinfo['y2'] = $_POST['y2'];
			$imageinfo['width'] = $_POST['width'];
			$imageinfo['height'] = $_POST['height'];
			if($info = $img->tailorIimage('thumb_'.$_POST['jcrop_image'],$imageinfo,'cut_')){
//				copy($tmp_src.$_POST['jcrop_image'],$desc_src.$_POST['jcrop_image']);
//				copy($tmp_src.'thumb_'.$_POST['jcrop_image'],$desc_src.'thumb_'.$_POST['jcrop_image']);
//				copy($tmp_src.'cut_'.$_POST['jcrop_image'],$desc_src.'cut_'.$_POST['jcrop_image']);
//				copy($tmp_src.'cut_thumb_'.$_POST['jcrop_image'],$desc_src.'cut_thumb_'.$_POST['jcrop_image']);
				$this->ajaxReturn($imageinfo,'裁剪成功',1);
			}else{
				$this->ajaxReturn(0,'裁剪失败',0);
			}

		}

		function set_permission(){
			if(!empty($_POST['id']) && !empty($_POST['rid'])){
				$User = D('User');
				$Userinfo = $User->relation(true)->where('roleid='.$_POST['rid'])->find($_POST['id']);
				$allow_provinces = explode(',',$Userinfo['allow_provinces']);
				$Provinces = M('Provinces');
				$provinces_level = C('provinces_level');
				$Provincesinfo = $Provinces->where('level='.$provinces_level['province_level'])->order('sort')->select();
				foreach($Provincesinfo as $key=>$value){
					if(in_array($value['id'],$allow_provinces)){
						$Provincesinfo[$key]['status'] = 1;
					}
				}
				$this->assign('Provincesinfo',$Provincesinfo);
				$this->display();
			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
		}

		function ajax_set_permission(){
			if(!empty($_POST['userid']) && !empty($_POST['roleid'])){
				if(!empty($_POST['allow_provinces'])){
					$User = M('User');
					$Userinfo = $User->where('roleid='.$_POST['roleid'])->find($_POST['userid']);
					if(empty($Userinfo)){
						$this->ajaxReturn(0,'不存在此用户',0);
					}else{
						$map['id'] = array('eq',$_POST['userid']);
						$map['roleid'] = array('eq',$_POST['roleid']);
						if($_POST['allow_provinces']==$Userinfo['allow_provinces']){
							$this->ajaxReturn(0,'没有数据被修改',0);
						}else{
							if($User->where($map)->setField('allow_provinces',$_POST['allow_provinces'])){
								$this->ajaxReturn(0,'分配成功',1);
							}else{
								$this->ajaxReturn(0,'分配失败',0);
							}
						}
					}
				}else{
					$this->ajaxReturn(0,'请选择要分配的省份',0);
				}
			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
		}

		function ajax_into_merchant_setting(){
			unset($_SESSION['through_merchant']);
			if(isset($_POST['by_user']) && !empty($_POST['by_user'])){
				$user_group = C('USER_GROUP');
				$User = M('User');
				$Userinfo = $User->find($_POST['by_user']);
				if(!empty($Userinfo)){
					$Role = M('Role');
					$Roleinfo = $Role->find($Userinfo['roleid']);
					if($Roleinfo['level']==$user_group['merchant']['level']){
						$Merchant = M('Merchant');
						$Merchantinfo = $Merchant->where('by_user='.$_POST['by_user'])->find();
						if(!empty($Merchantinfo)){
							$_SESSION['through_merchant'] = array(
								'username' => $Userinfo['username'],
								'email' => $Userinfo['email'],
								'roleid' => $Userinfo['roleid'],
								'userid' => $Userinfo['id'],
							);
							if(!empty($_SESSION['through_merchant']) && !empty($_SESSION['through_merchant']['username']) && !empty($_SESSION['through_merchant']['roleid']) && !empty($_SESSION['through_merchant']['userid'])){
								$this->ajaxReturn(0,'设置成功',1);
							}else{
								$this->ajaxReturn(0,'设置失败',0);
							}
						}else{
							$this->ajaxReturn(0,'不存在此商铺',0);
						}
					}else{
						$this->ajaxReturn(0,'所属分组异常',0);
					}
				}else{
					$this->ajaxReturn(0,'不存在此用户',0);
				}
			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
		}

		function ajax_into_member_setting(){
			unset($_SESSION['through_member']);
			if(isset($_POST['by_user']) && !empty($_POST['by_user'])){
				$user_group = C('USER_GROUP');
				$User = M('User');
				$Userinfo = $User->find($_POST['by_user']);
				if(!empty($Userinfo)){
					$Role = M('Role');
					$Roleinfo = $Role->find($Userinfo['roleid']);
					if($Roleinfo['level']==$user_group['member']['level']){
							$_SESSION['through_member'] = array(
								'username' => $Userinfo['username'],
								'email' => $Userinfo['email'],
								'roleid' => $Userinfo['roleid'],
								'userid' => $Userinfo['id'],
							);
							if(!empty($_SESSION['through_member']) && !empty($_SESSION['through_member']['username']) && !empty($_SESSION['through_member']['roleid']) && !empty($_SESSION['through_member']['userid']) && !empty($_SESSION['through_member']['email'])){
								$this->ajaxReturn(0,'设置成功',1);
							}else{
								$this->ajaxReturn(0,'设置失败',0);
							}
					}else{
						$this->ajaxReturn(0,'所属分组异常',0);
					}
				}else{
					$this->ajaxReturn(0,'不存在此用户',0);
				}
			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
		}

		function ajax_send_message(){
		//	if($Userinfo = $this->check_is_admin()){
				if(!empty($_POST['message_type']) && !empty($_POST['addressee_id']) && !empty($_POST['name']) && !empty($_POST['details'])){
					$User = D('User');
					$USER_GROUP = C('USER_GROUP');
					$InstationMessage = M('InstationMessage');

					switch($_POST['message_type']){
						case 1:
							$Userinfos = $User->relation(true)->find($_POST['addressee_id']);
							if($Userinfos['Role']['level']==$USER_GROUP['member']['level']){
								$map['by_user'] = $_POST['addressee_id'];
								$map['name'] = $_POST['name'];
								$map['details'] = $_POST['details'];
								$map['message_type'] = $_POST['message_type'];
								$map['create_date'] = time();
								if($InstationMessage->add($map)){
									$this->ajaxReturn(0,'站内信发送成功！',1);
								}else{
									$this->ajaxReturn(0,'站内信发送失败',0);
								}
							}else{
								$this->ajaxReturn(0,'异常操作',0);
							}
							break;
						case 2:
//							$Userinfos = $User->where('status=1 AND roleid='.$_POST['addressee_id'])->field('id,username,roleid')->select();
//							$map['name'] = $_POST['name'];
//							$map['details'] = $_POST['details'];
//							$map['message_type'] = $_POST['message_type'];
//							$map['create_date'] = time();
//							$flag = false;
//							foreach($Userinfos as $key=>$value){
//								$map['by_user'] = $value['id'];
//								if($InstationMessage->add($map)){
//									$flag = true;
//								}else{
//									$flag = false;
//								}
//							}
//							if($flag){
//								$this->ajaxReturn(0,'站内信发送成功！',1);
//							}else{
//								$this->ajaxReturn(0,'站内信发送失败',0);
//							}
							break;
						case 3:
							$Userinfos = $User->where('status=1 AND roleid='.$_POST['addressee_id'])->field('id,username,roleid')->select();
							$map['name'] = $_POST['name'];
							$map['details'] = $_POST['details'];
							$map['message_type'] = $_POST['message_type'];
							$map['create_date'] = time();
							$flag = false;
							foreach($Userinfos as $key=>$value){
								$map['by_user'] = $value['id'];
								if($InstationMessage->add($map)){
									$flag = true;
								}else{
									$flag = false;
								}
							}
							if($flag){
								$this->ajaxReturn(0,'站内信发送成功！',1);
							}else{
								$this->ajaxReturn(0,'站内信发送失败',0);
							}
							break;
					}
				}else{
					$this->ajaxReturn(0,'异常操作',0);
				}
		//	}else{
		//		$this->ajaxReturn(0,'异常操作',0);
		//	}

		}

	}