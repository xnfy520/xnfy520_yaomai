<?php

	class CommonAction extends Action{

		function verify(){
			import('ORG.Util.Image');
			Image::buildImageVerify(4, 1, 'png', 70,30);
		}


		function _initialize(){

			header("Content-Type:text/html;Charset=utf-8;");

			$HelpCenterCategory = D('HelpCenterCategory');
			$HelpCenterInformation = D('HelpCenterInformation');
			$HelpCenterInformations = $HelpCenterInformation->relation(true)->where('pid=1 and publish=1')->order('sort,id')->select();
			$this->assign('hcis',$HelpCenterInformations);

			$hccl = $HelpCenterCategory->relation(true)->where('id<>1 and publish=1')->select();
			$this->assign('hccl',$hccl);

			$CommodityCategory = D('CommodityCategory');
			$CommodityCategorys = $CommodityCategory->relation(true)->where('publish=1')->order('sort,id')->select();
			$this->assign('ccs',$CommodityCategorys);
		//	dump($CommodityCategorys);

		}

		function checkLogin(){

			if(!empty($_SESSION['through_member']) && !empty($_SESSION['through_member']['username']) && !empty($_SESSION['through_member']['roleid']) && !empty($_SESSION['through_member']['userid']) && !empty($_SESSION['through_member']['email'])){
				$info['username'] = $_SESSION['through_member']['username'];
				$info['email'] = $_SESSION['through_member']['email'];
				$info['id'] = $_SESSION['through_member']['userid'];
				$info['roleid'] = $_SESSION['through_member']['roleid'];
				$User = D('User');
				$Userinfo = $User->relation(true)->where($info)->find();
				$group = C('USER_GROUP');
				if($Userinfo){
					if($Userinfo['Role']['level']==$group['member']['level']){
//						$yesterday = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
//						$today = mktime(0,0,0,date('m'),date('d'),date('Y'));
//						$times = mktime(0,0,0,date('m',$Userinfo['sign_in_time']),date('d',$Userinfo['sign_in_time']),date('Y',$Userinfo['sign_in_time']));
//						if($times<$today){
//							if(($today-($yesterday+(60*60*24)))==0){
//								$Userinfo['allow_sign_in'] = 1;
//							}
//						}
					//	$this->assign('Userinfo', $Userinfo);
						return $Userinfo;
					}else{
						return false;
					}
				}else{
					return false;
				}

			}else{

				if(isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['userid']) && isset($_SESSION['roleid'])){
					if(!empty($_SESSION['username']) && !empty($_SESSION['email']) && !empty($_SESSION['userid']) && !empty($_SESSION['roleid'])){
						$info['username'] = $_SESSION['username'];
						$info['email'] = $_SESSION['email'];
						$info['id'] = $_SESSION['userid'];
						$info['roleid'] = $_SESSION['roleid'];
						$User = D('User');
						$Userinfo = $User->relation(true)->where($info)->find();
						if($Userinfo){
							$group = C('USER_GROUP');
							if($Userinfo['Role']['level']==$group['member']['level']){
//								$yesterday = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
//								$today = mktime(0,0,0,date('m'),date('d'),date('Y'));
//								$times = mktime(0,0,0,date('m',$Userinfo['sign_in_time']),date('d',$Userinfo['sign_in_time']),date('Y',$Userinfo['sign_in_time']));
//								if($times<$today){
//									if(($today-($yesterday+(60*60*24)))==0){
//										$Userinfo['allow_sign_in'] = 1;
//									}
//								}
							//	$this->assign('Userinfo', $Userinfo);
							//	dump($Userinfo);
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

		function setCity(){
			if(isset($_POST['id'])){
				$where = $this->getAnywhere($_POST['id']);
				unset($_SESSION['where_info']);
				unset($_SESSION['where_county']);
				$_SESSION['where_info'] = $where;
				$_SESSION['where_county'] = $where['county'];
				$this->ajaxReturn(0,"设置成功！",1);
			}else{
				$this->ajaxReturn(0,"设置失败！",0);
			}
		}

		function autocomplete(){

			if(isset($_GET['term'])){
				$term = stripcslashes(strip_tags(trim($_GET['term'])));

				$CommodityList = M('CommodityList');

				$Merchant = M('Merchant');

				$maps['enable'] = 1;
				$maps['name'] = array('like',"%{$term}%");

				$order = 'id desc';

				$CommodityListinfo = $CommodityList->field('id,name,by_user')->where($maps)->order($order)->limit(10)->select();

				for($i=0; $i<count($CommodityListinfo); $i++){

					$Merchantinfo = $Merchant->field('no')->where('status=1 AND enable=1 AND by_user='.$CommodityListinfo[$i]['by_user'])->find();
					if(!empty($Merchantinfo)){
						$CommodityListinfo[$i]['merchant_no'] = $Merchantinfo['no'];
					}

				}

				$datas = array();
				for($i=0; $i<count($CommodityListinfo); $i++){
					if(isset($CommodityListinfo[$i]['merchant_no']) && !empty($CommodityListinfo[$i]['merchant_no'])){
						$datas[] = $CommodityListinfo[$i];
					}
				}

				$result = array();

				foreach ($datas as $key=>$value) {

					array_push($result, array("value"=>$value['name'], "label" =>strip_tags($value['name']),"merchant_no"=>$value['merchant_no'],"product_id"=>$value['id']));
					if (count($result) > 10){break;}

				}

				echo json_encode($result);

			}

		}

		function getAnywhere($id){

			$provinces_level = C('provinces_level');

			$Provinces = M('Provinces');

			$judge = $Provinces->where('id='.$id)->find();

			switch($judge['level']){
				case $provinces_level['city_level'] :

					$county = $Provinces->where('pid='.$judge['id'])->order('sort')->select();

					$county_judge = '';
					$city_judge = $judge;
					$province_judge = $Provinces->where('id='.$judge['pid'])->find();
					$area_judge = $Provinces->where('id='.$province_judge['pid'])->find();

					break;

				case $provinces_level['county_level'] :

					$county = $Provinces->where('pid='.$judge['id'])->order('sort')->select();
					$county_judge = $judge;
					$city_judge = $Provinces->where('id='.$county_judge['pid'])->find();
					$province_judge = $Provinces->where('id='.$city_judge['pid'])->find();
					$area_judge = $Provinces->where('id='.$province_judge['pid'])->find();


					break;
			}

			return array(
				'area_name'=>!empty($area_judge) ? $area_judge['name'] : '',
				'area_id'=>!empty($area_judge) ? $area_judge['id'] : '',
				'province_name'=>!empty($province_judge) ? $province_judge['name'] : '',
				'province_id'=>!empty($province_judge) ? $province_judge['id'] : '',
				'city_name'=>!empty($city_judge) ? $city_judge['name'] : '',
				'city_id'=>!empty($city_judge) ? $city_judge['id'] : '',
				'county_name'=>!empty($county_judge) ? $county_judge['name'] : '',
				'county_id'=>!empty($county_judge) ? $county_judge['id'] : '',
				'county'=>$county
			);

		}

	}
