<?php

	class CommonAction extends Action{

		function verify(){
			import('ORG.Util.Image');
			Image::buildImageVerify(4, 1, 'png', 70,30);
		}


		function _initialize(){

			header("Content-Type:text/html;Charset=utf-8;");
//dump($_SESSION);
			$Provinces = D('Provinces');
			$Provinces_list = $Provinces->relation(true)->where('publish=1 AND level=0')->order('sort')->select();

			for($i=0;$i<count($Provinces_list);$i++){
				if(!empty($Provinces_list[$i]['Provinces'])){
					for($s=0; $s<count($Provinces_list[$i]['Provinces']);$s++){
						$Provinces_list[$i]['Provinces'][$s]['City'] = $Provinces->where('publish=1 AND pid='.$Provinces_list[$i]['Provinces'][$s]['id'])->order('sort')->select();
					}
				}
			}
			$this->assign('Provinces_list',$Provinces_list);

			$SearchKey = M('SearchKey');
			$SearchKey_nav = $SearchKey->where('counts>'.C('search_config.more_than_show'))->limit(C('search_config.show_limit'))->order('counts desc')->select();
			$this->assign('SearchKey_nav',$SearchKey_nav);

			$this->assign('fake_action_name',$_GET['_URL_'][2]);

//			unset($_SESSION['where_info']);
//			unset($_SESSION['where_county']);

			if(empty($_SESSION['where_info']) && empty($_SESSION['where_county'])){

				$realip = getIp();
			//	dump($realip);

				if(empty($realip) || $realip=='127.0.0.1' ){
					$realip = '58.49.234.253';
				}
			//	dump($realip);

				import("ORG.Net.IpLocation");// 导入IpLocation类

				$Ip = new IpLocation("UTFWry.dat"); // 实例化类 参数表示IP地址库文件

				$area = $Ip->getlocation($realip); // 获取某个IP地址所在的位置

			//	dump($area);
				
				if(!empty($area['country'])){

					import("lib_splitword_full");

					$sp = new SplitWord();

					$words = $sp->SplitRMM($area['country']);
					$sp->Clear();

					$tmp = explode(' ',$words);
			//		dump($tmp);

					for($i=count($tmp); $i>=0;$i--){
						if(!empty($tmp[$i])){
							if($tmp[$i]!='市'){
								$word = $tmp[$i];
								break;
							}
						}
					}

					$searchs['name'] = array('like',"%{$word}%");
					$with_word_find = $Provinces->where($searchs)->find();

					if(!empty($with_word_find)){
						$where = $this->getAnywhere($with_word_find['id']);
						$_SESSION['where_info'] = $where;
						$_SESSION['where_county'] = $where['county'];
					}

				}


			}

			$HelpCenterCategory = D('HelpCenterCategory');
			$HelpCenterCategory_footer_info = $HelpCenterCategory->relation(true)->where('publish=1 AND recommend=1')->limit(4)->order('sort')->select();
			$this->assign('HelpCenterCategory_footer_info',$HelpCenterCategory_footer_info);

			$Blogroll = M('Blogroll');
			$Blogroll_footer_info = $Blogroll->where('publish=1')->order('sort')->select();
			$this->assign('Blogroll_footer_info',$Blogroll_footer_info);

			$OtherLinks = M('OtherLinks');
			$OtherLinks_footer_info = $OtherLinks->where('publish=1')->order('sort')->limit(7)->order('sort,id')->select();
			$this->assign('OtherLinks_footer_info',$OtherLinks_footer_info);

			$SystemAnnouncement = M('SystemAnnouncement');
			$SystemAnnouncement_header_info = $SystemAnnouncement->where('publish=1')->order('sort,create_date desc')->limit(3)->select();
			$this->assign('SystemAnnouncement_header_info',$SystemAnnouncement_header_info);

			$LastUpdate = M('LastUpdate');
			$LastUpdate_header_info = $LastUpdate->where('publish=1')->order('sort,create_date desc')->limit(4)->select();
			$this->assign('LastUpdate_header_info',$LastUpdate_header_info);

			$advert_category = C('Advert_Category');
			$AdvertCategory = M('AdvertCategory');
			$AdvertList = M('AdvertList');
			$AdvertList_indexs = $AdvertList->where('publish=1 AND pid='.$AdvertCategory->getFieldByType($advert_category['index_wheel_sowing_advert']['type'],'id'))->limit(4)->order('sort,create_date')->select();
			$AdvertList_global_left = $AdvertList->where('publish=1 AND pid='.$AdvertCategory->getFieldByType($advert_category['global_left_side_advert']['type'],'id'))->limit(4)->order('sort,create_date')->find();
			$AdvertList_global_right = $AdvertList->where('publish=1 AND pid='.$AdvertCategory->getFieldByType($advert_category['global_right_side_advert']['type'],'id'))->limit(4)->order('sort,create_date')->find();
			$AdvertList_details_page = $AdvertList->where('publish=1 AND pid='.$AdvertCategory->getFieldByType($advert_category['commodity_details_page_advert']['type'],'id'))->limit(4)->order('sort,create_date')->find();

			$this->assign('AdvertList_indexs',$AdvertList_indexs);
			$this->assign('AdvertList_global_left',$AdvertList_global_left);

			$this->assign('AdvertList_global_right',$AdvertList_global_right);
			$this->assign('AdvertList_details_page',$AdvertList_details_page);

			$index_recommend_config = C('index_recommend_config');
			$IndexRecommend = D('IndexRecommend');
			$Merchant = M('Merchant');

			$IndexRecommend_member_commodity_recommend = $IndexRecommend->relation(true)->where('type='.$index_recommend_config['member_commodity_recommend']['type'])->limit(4)->order('sort,id')->select();

			for($i=0; $i<count($IndexRecommend_member_commodity_recommend); $i++){
				$Merchantinfo = $Merchant->where('status=1 AND enable=1 AND by_user='.$IndexRecommend_member_commodity_recommend[$i]['CommodityList']['by_user'])->find();
				if(!empty($Merchantinfo)){
					$IndexRecommend_member_commodity_recommend[$i]['merchant_no'] = $Merchantinfo['no'];
				}
			}

			$this->assign('IndexRecommend_member_commodity_recommend',$IndexRecommend_member_commodity_recommend);

			if($Userinfo = $this->checkLogin()){
				$yesterday = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
				$today = mktime(0,0,0,date('m'),date('d'),date('Y'));
				$times = mktime(0,0,0,date('m',$Userinfo['sign_in_time']),date('d',$Userinfo['sign_in_time']),date('Y',$Userinfo['sign_in_time']));
				if($times<$today){
					if(($today-($yesterday+(60*60*24)))==0){
						$Userinfo['allow_sign_in'] = 1;
					}
				}
				if(!preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",$Userinfo['email'])){
					$Userinfo['email'] = '';
				}
				$this->assign('Userinfo', $Userinfo);
			}

			$MemberOrder = M('MemberOrder');

			$map['trade_status'] = array(array('eq',''),array('eq','WAIT_BUYER_PAY'),'or') ;

			$MemberOrderinfo = $MemberOrder->where($map)->select();

			if(!empty($MemberOrderinfo)){
				$CommodityList = M('CommodityList');
				$CommoditySpecification = M('CommoditySpecification');
				foreach($MemberOrderinfo as $key=>$value){
					if($value['create_date']+60*60*24*3<time()){
						$infos = json_decode($value['commodity_infos'],true);
						foreach($infos as $k=>$v){
							if(empty($v['CommoditySpecification'])){
								$CommodityList->where('id='.$v['id'])->setInc('inventory',$v['buy_quantity']);
							}else{
								$CommoditySpecification->where('lid='.$v['id'].' AND id='.$v['CommoditySpecification']['id'])->setInc('inventory',$v['buy_quantity']);
							}
						}
						$MemberOrder->delete($value['id']);
					}
				}
			}

			$CommodityEvaluate = M('CommodityEvaluate');
			$CommodityEvaluateinfo = $CommodityEvaluate->where('star=0')->select();
			if(!empty($CommodityEvaluateinfo)){
				foreach($CommodityEvaluateinfo as $kk=>$vv){
					if($vv['create_date']+60*60*24*7<time()){
						$map_ce['star'] = 5;
						$map_ce['message'] = '默认好评！';
						$map_ce['modify_date'] = time();
						$CommodityEvaluate->where('id='.$vv['id'])->save($map_ce);
					}
				}
			}

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
