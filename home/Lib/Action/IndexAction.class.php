<?php

class IndexAction extends CommonAction {

    public function index(){

		$CommodityCategory = D('CommodityCategory');
		$CommodityCategoryinfo = $CommodityCategory->relation(true)->where('publish=1')->order('sort')->select();
		for($i=0; $i<count($CommodityCategoryinfo);$i++){
			$tmp = str_ireplace(' ','',ucwords(str_ireplace('_',' ',$CommodityCategoryinfo[$i]['function'])));
			$CommodityCategoryinfo[$i]['Type'] = $tmp;
		}
		$this->assign('CommodityCategoryinfo',$CommodityCategoryinfo);

		$Provinces = D('Provinces');

		$index_recommend_config = C('index_recommend_config');
		$IndexRecommend = D('IndexRecommend');
		$Merchant = M('Merchant');

		$IndexRecommend_index_favorable = $IndexRecommend->relation(true)->where('type='.$index_recommend_config['favorable']['type'])->limit(6)->order('sort,id')->select();

		for($i=0; $i<count($IndexRecommend_index_favorable); $i++){
			$Merchantinfo = $Merchant->where('status=1 AND enable=1 AND by_user='.$IndexRecommend_index_favorable[$i]['CommodityList']['by_user'])->find();
			if(!empty($Merchantinfo)){
				$IndexRecommend_index_favorable[$i]['merchant_no'] = $Merchantinfo['no'];
			}
		}

		$this->assign('IndexRecommend_index_favorable',$IndexRecommend_index_favorable);

		$IndexRecommend_index_recommend = $IndexRecommend->relation(true)->where('type='.$index_recommend_config['recommend']['type'])->limit(8)->order('sort,id')->select();

		for($i=0; $i<count($IndexRecommend_index_recommend); $i++){
			$Merchantinfo = $Merchant->where('status=1 AND enable=1 AND by_user='.$IndexRecommend_index_recommend[$i]['CommodityList']['by_user'])->find();
			if(!empty($Merchantinfo)){
				$IndexRecommend_index_recommend[$i]['merchant_no'] = $Merchantinfo['no'];
			}
		}

		$this->assign('IndexRecommend_index_recommend',$IndexRecommend_index_recommend);

		$IndexRecommend_index_specialty = $IndexRecommend->relation(true)->where('type='.$index_recommend_config['specialty']['type'])->limit(9)->order('sort,id')->select();

		for($i=0; $i<count($IndexRecommend_index_specialty); $i++){

			$Merchantinfo = $Merchant->where('status=1 AND enable=1 AND by_user='.$IndexRecommend_index_specialty[$i]['CommodityList']['by_user'])->find();
			if(!empty($Merchantinfo)){
				$IndexRecommend_index_specialty[$i]['merchant_no'] = $Merchantinfo['no'];
				$where = $Provinces->where('id='.$IndexRecommend_index_specialty[$i]['CommodityList']['where_id'])->getField('name');
				$find = array("市","省");
				$replace = array("","");
				$IndexRecommend_index_specialty[$i]['producing_areas'] = str_ireplace($find,$replace,$where);
			}

		}
		$this->assign('IndexRecommend_index_specialty',$IndexRecommend_index_specialty);

		$IntegralGiftList = M('IntegralGiftList');
		$IntegralGiftList_index = $IntegralGiftList->where('publish=1 AND recommend=1')->order('sort,create_date')->select();
		$this->assign('IntegralGiftList_index',$IntegralGiftList_index);

		unset($_SESSION['sina_wb_userinfo']);

		$this->display();

    }

	function ajax_page_products_list(){

		if(isset($_GET['key']) && !empty($_GET['key'])){

			$search_key = stripslashes(strip_tags(trim($_GET['key'])));

			$CommodityList = M('CommodityList');

			$Merchant = M('Merchant');

			import("ORG.Util.emit_ajax_page");

			$maps['enable'] = 1;

			$maps['name'] = array('like',"%{$search_key}%");


			if(isset($_GET['price'])){
				switch($_GET['price']){
					case 'asc': $order = 'current_price asc,id desc' ;break;
					case 'desc': $order = 'current_price desc,id desc' ;break;
					default: $order = 'current_price desc,id desc' ;break;
				}
			}else if($_GET['sales']){
				switch($_GET['sales']){
					case 'asc': $order = 'sales_volume asc,id desc' ;break;
					case 'desc': $order = 'sales_volume desc,id desc' ;break;
					default: $order = 'sales_volume desc,id desc' ;break;
				}
			}else{
				$order = 'id desc';
			}

			$CommodityListinfo = $CommodityList->where($maps)->order($order)->select();

			for($i=0; $i<count($CommodityListinfo); $i++){

				$Merchantinfo = $Merchant->where('status=1 AND enable=1 AND by_user='.$CommodityListinfo[$i]['by_user'])->find();
				if(!empty($Merchantinfo)){
					$CommodityListinfo[$i]['merchant_no'] = $Merchantinfo['no'];
					$CommodityListinfo[$i]['where_info'] = $this->getAnywhere($Merchant->getFieldByByUser($CommodityListinfo[$i]['by_user'],'where'));
				}

			}

			if(isset($_GET['where']) && !empty($_GET['where'])){
				foreach($CommodityListinfo as $key=>$value){
					if($value['where_info']['county_id']!=$_GET['where']){
						unset($CommodityListinfo[$key]);
					}
				}
			}

			if(!empty($_SESSION['where_info']['province_id']) || !empty($_SESSION['where_info']['city_id'])){
				foreach($CommodityListinfo as $key=>$value){
					if($value['where_info']['province_id']!=$_SESSION['where_info']['province_id'] || $value['where_info']['city_id']!=$_SESSION['where_info']['city_id']){
						unset($CommodityListinfo[$key]);
					}
				}

				$fpage = 1;

				array_values($CommodityListinfo);

				$datas = array_chunk($CommodityListinfo,$fpage,true);

				$page = new page(count($CommodityListinfo),$fpage);

				$this->assign('fpage',$page->fpage(array(4,5,6,7,8)));

			}

			if(!empty($datas)){

				$this->assign('list',isset($_GET['page']) ? $datas[$_GET['page']-1] : $datas[0]);

			}

			$this->display();


		}else{

			$this->display();

		}
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

	function save_sina_wb_userinfo(){
		if(isset($_POST['datas']) && !empty($_POST['datas'])){
			$_SESSION['sina_wb_userinfo'] = $_POST['datas'];
			$this->ajaxReturn(0,"设置成功！",1);
		}else{
			unset($_SESSION['sina_wb_userinfo']);
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

}
