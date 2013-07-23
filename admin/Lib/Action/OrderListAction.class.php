<?php

class OrderListAction extends CommonAction{

	function index(){

		if($Userinfo = $this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");

			$CommodityList = D('CommodityList');
			$CommodityListinfo = $CommodityList->field('id')->select();
			$commoditys = array();
			for($i=0; $i<count($CommodityListinfo); $i++){
				$commoditys[] = $CommodityListinfo[$i]['id'];
			}
			$MemberOrder = M('MemberOrder');

			//今天
			$today_start = mktime(0,0,0,date('m'),date('d'),date('Y'));
			$today_end = mktime(23,59,59,date('m'),date('d'),date('Y'));
			//昨天
			$yesterday_start = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
			$yesterday_end = mktime(23,59,59,date('m'),date('d')-1,date('Y'));
			//上周
			$last_week_start = mktime(0, 0 , 0,date("m"),date("d")-date("w")+1-7,date("Y"));
			$last_week_end = mktime(23,59,59,date("m"),date("d")-date("w")+7-7,date("Y"));
			//本周
			$this_week_start = mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"));
			$this_week_end = mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y"));
			//上月
			$last_month_start = mktime(0, 0 , 0,date("m")-1,1,date("Y"));
			$last_month_end = mktime(23,59,59,date("m") ,0,date("Y"));
			//本月
			$this_month_start = mktime(0, 0 , 0,date("m"),1,date("Y"));
			$this_month_end = mktime(23,59,59,date("m"),date("t"),date("Y"));

			if(isset($_GET['pid']) && !empty($_GET['pid'])){
				switch ($_GET['pid']) {
					case 1 : $datas['create_date'] = array(array('lt',$yesterday_end),array('gt',$yesterday_start),'and') ;break;
					case 2 : $datas['create_date'] = array(array('lt',$today_end),array('gt',$today_start),'and') ;break;
					case 3 : $datas['create_date'] = array(array('lt',$this_week_end),array('gt',$this_week_start),'and') ;break;
					case 4 : $datas['create_date'] = array(array('lt',$last_week_end),array('gt',$last_week_start),'and') ;break;
					case 5 : $datas['create_date'] = array(array('lt',$this_month_end),array('gt',$this_month_start),'and') ;break;
					case 6 : $datas['create_date'] = array(array('lt',$last_month_end),array('gt',$last_month_start),'and') ;break;
				}
			}

			if(isset($_GET['cid']) && !empty($_GET['cid'])){
				switch($_GET['cid']){
					case 1 : $datas['trade_status'] = array(array('eq',''),array('eq','WAIT_BUYER_PAY'),'or') ;break;
					case 2 : $datas['trade_status'] = array('eq','WAIT_SELLER_SEND_GOODS');break;
					case 3 : $datas['trade_status'] = array('eq','TRADE_FINISHED');break;
				}
			}

			if(isset($_POST['search'])){
				if(!empty($_POST['key'])){
					switch($_POST['search']){
						case 1 :
							$datas['id'] = $_POST['key'];
							break;
						case 2:
							$datas['out_trade_no'] = array("like","%{$_POST['key']}%");
							break;
					}
				}
			}

			$datas['id'] = array('neq',"0");
			$MemberOrderinfo = $MemberOrder->where($datas)->order('create_date desc')->select();
			$User = M('User');
			$MerchantOrder = array();
			foreach($MemberOrderinfo as $key=>$value){
				$commodity_infos = json_decode($value['commodity_infos'],true);
				$address_infos = json_decode($value['address_infos'],true);
				$MerchantOrder[$key] = $MemberOrderinfo[$key];
				$MerchantOrder[$key]['address_info'] =$address_infos;
				$shippersinfo = $MemberOrder->where('out_trade_no='.$value['out_trade_no'])->getField('shippers');
				$infos = explode(';',$shippersinfo);
				foreach($commodity_infos as $k=>$v){
					if(in_array($v['by_user'],$infos)){
						$commodity_infos[$k]['deliver_goods_status'] = 1;
					}else{
						$commodity_infos[$k]['deliver_goods_status'] = 0;
					}
					$commodity_infos[$k]['merchant_name'] = $User->where('id='.$v['by_user'])->getField('username');
					$MerchantOrder[$key]['commodify_list'][] = $commodity_infos[$k];
				}
				$MerchantOrder[$key]['User'] = $User->find($value['by_user']);
			}

			$fpage = 15;

			array_values($MerchantOrder);

			$datas = array_chunk($MerchantOrder,$fpage,true);

			$this->assign('list',isset($_GET['page']) ? $datas[$_GET['page']-1] : $datas[0]);

			$page = new page(count($MerchantOrder),$fpage);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}else{
			$this->redirect('Public/login');
		}

	}

	function ajax_page_index(){
		if($Userinfo = $this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");

			$CommodityList = D('CommodityList');
			$CommodityListinfo = $CommodityList->field('id')->select();
			$commoditys = array();
			for($i=0; $i<count($CommodityListinfo); $i++){
				$commoditys[] = $CommodityListinfo[$i]['id'];
			}
			$MemberOrder = M('MemberOrder');

			//今天
			$today_start = mktime(0,0,0,date('m'),date('d'),date('Y'));
			$today_end = mktime(23,59,59,date('m'),date('d'),date('Y'));
			//昨天
			$yesterday_start = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
			$yesterday_end = mktime(23,59,59,date('m'),date('d')-1,date('Y'));
			//上周
			$last_week_start = mktime(0, 0 , 0,date("m"),date("d")-date("w")+1-7,date("Y"));
			$last_week_end = mktime(23,59,59,date("m"),date("d")-date("w")+7-7,date("Y"));
			//本周
			$this_week_start = mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"));
			$this_week_end = mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y"));
			//上月
			$last_month_start = mktime(0, 0 , 0,date("m")-1,1,date("Y"));
			$last_month_end = mktime(23,59,59,date("m") ,0,date("Y"));
			//本月
			$this_month_start = mktime(0, 0 , 0,date("m"),1,date("Y"));
			$this_month_end = mktime(23,59,59,date("m"),date("t"),date("Y"));

			if(isset($_GET['pid']) && !empty($_GET['pid'])){
				switch ($_GET['pid']) {
					case 1 : $datas['create_date'] = array(array('lt',$yesterday_end),array('gt',$yesterday_start),'and') ;break;
					case 2 : $datas['create_date'] = array(array('lt',$today_end),array('gt',$today_start),'and') ;break;
					case 3 : $datas['create_date'] = array(array('lt',$this_week_end),array('gt',$this_week_start),'and') ;break;
					case 4 : $datas['create_date'] = array(array('lt',$last_week_end),array('gt',$last_week_start),'and') ;break;
					case 5 : $datas['create_date'] = array(array('lt',$this_month_end),array('gt',$this_month_start),'and') ;break;
					case 6 : $datas['create_date'] = array(array('lt',$last_month_end),array('gt',$last_month_start),'and') ;break;
				}
			}

			if(isset($_GET['cid']) && !empty($_GET['cid'])){
				switch($_GET['cid']){
					case 1 : $datas['trade_status'] = array(array('eq',''),array('eq','WAIT_BUYER_PAY'),'or') ;break;
					case 2 : $datas['trade_status'] = array('eq','WAIT_SELLER_SEND_GOODS');break;
					case 3 : $datas['trade_status'] = array('eq','TRADE_FINISHED');break;
				}
			}

			if(isset($_POST['search'])){
				if(!empty($_POST['key'])){
					switch($_POST['search']){
						case 1 :
							$datas['id'] = $_POST['key'];
							break;
						case 2:
							$datas['out_trade_no'] = array("like","%{$_POST['key']}%");
							break;
					}
				}
			}

			$datas['id'] = array('neq',"0");
			$MemberOrderinfo = $MemberOrder->where($datas)->order('create_date desc')->select();
			$User = M('User');
			$MerchantOrder = array();
			foreach($MemberOrderinfo as $key=>$value){
				$commodity_infos = json_decode($value['commodity_infos'],true);
				$address_infos = json_decode($value['address_infos'],true);
				$MerchantOrder[$key] = $MemberOrderinfo[$key];
				$MerchantOrder[$key]['address_info'] =$address_infos;
				$shippersinfo = $MemberOrder->where('out_trade_no='.$value['out_trade_no'])->getField('shippers');
				$infos = explode(';',$shippersinfo);
				foreach($commodity_infos as $k=>$v){
					if(in_array($v['by_user'],$infos)){
						$commodity_infos[$k]['deliver_goods_status'] = 1;
					}else{
						$commodity_infos[$k]['deliver_goods_status'] = 0;
					}
					$commodity_infos[$k]['merchant_name'] = $User->where('id='.$v['by_user'])->getField('username');
					$MerchantOrder[$key]['commodify_list'][] = $commodity_infos[$k];
				}
			}

			$fpage = 15;

			array_values($MerchantOrder);

			$datas = array_chunk($MerchantOrder,$fpage,true);

			$this->assign('list',isset($_GET['page']) ? $datas[$_GET['page']-1] : $datas[0]);

			$page = new page(count($MerchantOrder),$fpage);

			$this->assign('fpage',$page->fpage(array(1,2,4,5,6,7,8)));

			$this->display();
		}
	}

}