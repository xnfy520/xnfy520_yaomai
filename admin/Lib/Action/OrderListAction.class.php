<?php

class OrderListAction extends CommonAction{

	function index(){

		if($Userinfo = $this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			if(!isset($_GET['type']) && empty($_GET['type'])){
				$this->redirect('/Index');
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
					case 1 : $datas['pay_type'] = array('gt',0) ;break;
					case 2 : $datas['pay_type'] = array('eq',0);break;
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
						case 3:
							$datas['username'] = array("like","%{$_POST['key']}%");
							break;
					}
				}
			}

			$datas['commodity_type'] = $_GET['type'];

			$count = $MemberOrder->where($datas)->count();

			$page = new page($count,15);

			$MemberOrderinfo = $MemberOrder->where($datas)->order('create_date desc')->limit($page->setlimit())->select();
			$User = M('User');
			for($i=0;$i<count($MemberOrderinfo);$i++){
				$ali = json_decode($MemberOrderinfo[$i]['alipay_data'],true);
				$ebank = json_decode($MemberOrderinfo[$i]['ebank_data'],true);
				$com = json_decode($MemberOrderinfo[$i]['commodity_data'],true);
				$add = json_decode($MemberOrderinfo[$i]['address'],true);
				$other = json_decode($MemberOrderinfo[$i]['other_data'],true);
				$users = $User->field('truename,phone')->where('id='.$MemberOrderinfo[$i]['uid'])->find();
				$MemberOrderinfo[$i]['alipay_data'] = $ali;
				$MemberOrderinfo[$i]['ebank_data'] = $ebank;
				$MemberOrderinfo[$i]['commodity_data'] = $com;
				$MemberOrderinfo[$i]['address'] = $add;
				$MemberOrderinfo[$i]['other_data'] = $other;
				$MemberOrderinfo[$i]['truename'] = $users['truename'];
				$MemberOrderinfo[$i]['phone'] = $users['phone'];
				
			}

			//dump($MemberOrderinfo[0]);
			$this->assign('list',$MemberOrderinfo);

			$this->assign('fpage',$page->fpage());
			$datass = $datas;
			$datass['new_price'] = array('elt',0);
			$t1 = $MemberOrder->where($datass)->sum('total_fee');
			$t2 = $MemberOrder->where($datas)->sum('new_price');
			$total_price = $t1+$t2;
			//echo $total_price;
			//echo $MemberOrder->getLastSql();
			$this->assign('total_price',$total_price);

			$this->display();
		}else{
			$this->redirect('Public/login');
		}

	}

	function ajax_page_index(){
			if($Userinfo = $this->check_is_admin()){
			import("ORG.Util.emit_ajax_page");
			if(!isset($_GET['type']) && empty($_GET['type'])){
				$this->redirect('/Index');
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
					case 1 : $datas['pay_type'] = array('gt',0) ;break;
					case 2 : $datas['pay_type'] = array('eq',0);break;
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
						case 3:
							$datas['username'] = array("like","%{$_POST['key']}%");
							break;
					}
				}
			}

			$datas['commodity_type'] = $_GET['type'];

			$count = $MemberOrder->where($datas)->count();

			$page = new page($count,15);

			$MemberOrderinfo = $MemberOrder->where($datas)->order('create_date desc')->limit($page->setlimit())->select();

			for($i=0;$i<count($MemberOrderinfo);$i++){
				$ali = json_decode($MemberOrderinfo[$i]['alipay_data'],true);
				$ebank = json_decode($MemberOrderinfo[$i]['ebank_data'],true);
				$com = json_decode($MemberOrderinfo[$i]['commodity_data'],true);
				$add = json_decode($MemberOrderinfo[$i]['address'],true);
				$other = json_decode($MemberOrderinfo[$i]['other_data'],true);
				$MemberOrderinfo[$i]['alipay_data'] = $ali;
				$MemberOrderinfo[$i]['ebank_data'] = $ebank;
				$MemberOrderinfo[$i]['commodity_data'] = $com;
				$MemberOrderinfo[$i]['address'] = $add;
				$MemberOrderinfo[$i]['other_data'] = $other;
			}

			//dump($MemberOrderinfo[0]);
			$this->assign('list',$MemberOrderinfo);

			$this->assign('fpage',$page->fpage());
			$datass = $datas;
			$datass['new_price'] = array('elt',0);
			$t1 = $MemberOrder->where($datass)->sum('total_fee');
			$t2 = $MemberOrder->where($datas)->sum('new_price');
			$total_price = $t1+$t2;
			//echo $total_price;
			//echo $MemberOrder->getLastSql();
			$this->assign('total_price',$total_price);

			$this->display();
		}else{
			$this->redirect('Public/login');
		}
	}

	function get_shipments_data(){
		if($this->check_is_admin()){
			if(isset($_GET['id'])){



				$MemberOrder = M('MemberOrder');

				$data = $MemberOrder->find($_GET['id']);

				if($data){
					$logistics_company = C('logistics_company');
					$this->assign('lc',$logistics_company);
					$data['shipments_data'] = json_decode($data['shipments_data'],true);
					$this->assign('data', $data);

					$this->display();
				}else{
					$this->ajaxReturn(0,'异常操作',0);
				}

			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
		}else{
			$this->ajaxReturn(0,'异常操作',0);
		}
	}

	function set_shipments_data(){
		if($this->check_is_admin()){
			if(isset($_POST['id'])){
				$MemberOrder = M('MemberOrder');
				if(!empty($_POST['logistics_company_id']) && !empty($_POST['express_number'])){
					$logistics_company = C('logistics_company');
					for($i=0;$i<count($logistics_company);$i++){
						if($logistics_company[$i]['id']==$_POST['logistics_company_id']){
							$_POST['logistics_company_name'] = $logistics_company[$i]['name'];
						}
					}
					$_POST['update_date'] = time();
					$shipments_data = json_encode($_POST);
				}else{
					$shipments_data = null;
				}
				if($MemberOrder->where('id='.$_POST['id'])->setField('shipments_data',$shipments_data)){
					if(empty($shipments_data)){
						$this->ajaxReturn(0,"修改发货信息成功",1);
					}else{
						$this->ajaxReturn(1,"修改发货信息成功",1);
					}
				}else{
					$this->ajaxReturn(0,"修改发货信息失败",0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作",0);
			}
		}else{
				$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function manual_payment(){
		if($this->check_is_admin()){
			if(isset($_GET['id']) && !empty($_GET['id'])){
				$MemberOrder = M('MemberOrder');
				$order = $MemberOrder->where($w)->find($_GET['id']);
				if($order && ($order['pay_type']==0 || $order['pay_type']==3)){
					$order['manual_data'] = json_decode($order['manual_data'],true);
				//	dump($order);
					$this->assign('data',$order);
					$this->display();
				}else{
					$this->ajaxReturn(0,'异常操作',0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作",0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function set_manual_payment(){
		if($this->check_is_admin()){
			if(!empty($_POST['id']) && isset($_POST['pay_type'])){
				$MemberOrder = M('MemberOrder');
				$order = $MemberOrder->find($_POST['id']);
				if($_POST['pay_type']==3){
					$t = 0;
				}else{
					$t = 3;
				}
				if($order && $order['pay_type']==$t){
					$save['pay_type'] = $_POST['pay_type'];
					$save['manual_data'] = json_encode(array('remarks'=>$_POST['remarks'],'update_date'=>time()));
					if($MemberOrder->where('id='.$_POST['id'])->setField($save)){
						$this->ajaxReturn(0,"修改付款状态成功",1);
					}else{
						$this->ajaxReturn(0,"修改付款状态失败",0);
					}
				}else{
					$this->ajaxReturn(0,"异常操作",0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作",0);
			}
		}else{
				$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function change_price(){
		if($this->check_is_admin()){
			if(isset($_GET['id']) && !empty($_GET['id'])){
				$MemberOrder = M('MemberOrder');
				$order = $MemberOrder->where($w)->find($_GET['id']);
				if($order){
					$order['new_price_change_record'] = json_decode($order['new_price_change_record'],true);
					$this->assign('data',$order);
					$this->display();
				}else{
					$this->ajaxReturn(0,'异常操作',0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作",0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function set_change_price(){
		if($this->check_is_admin()){
			if(!empty($_POST['id']) && isset($_POST['new_price'])){
				$MemberOrder = M('MemberOrder');
				$order = $MemberOrder->find($_POST['id']);
				if($_POST['new_price']==$order['new_price']){
					$this->ajaxReturn(0,"还没有修改价格",0);
				}
				if(!is_numeric($_POST['new_price']) || $_POST['new_price']<0){
					$this->ajaxReturn(0,"所填价格有误",0);
				}
				if($order){
					$save['new_price'] = $_POST['new_price'];
					if(empty($order['new_price_change_record'])){
						$save['new_price_change_record'] = json_encode(array(array('price'=>$_POST['new_price'],'update_date'=>time())));
					}else{
						$org = json_decode($order['new_price_change_record'],true);
						$new = array(array('price'=>$_POST['new_price'],'update_date'=>time()));
						$save['new_price_change_record'] = json_encode(array_merge($new,$org));
					}
					if($MemberOrder->where('id='.$_POST['id'])->setField($save)){
						$this->ajaxReturn(0,"修改价格成功",1);
					}else{
						$this->ajaxReturn(0,"修改价格失败",0);
					}
				}else{
					$this->ajaxReturn(0,"异常操作",0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作",0);
			}
		}else{
				$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function edit_remark(){
		if($this->check_is_admin()){
			if(isset($_GET['id']) && !empty($_GET['id'])){
				$MemberOrder = M('MemberOrder');
				$order = $MemberOrder->find($_GET['id']);
				if($order){
					$this->assign('data',$order);
					$this->display();
				}else{
					$this->ajaxReturn(0,'异常操作',0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作",0);
			}
		}else{
			$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function set_edit_remark(){
		if($this->check_is_admin()){
			if(!empty($_POST['id']) && isset($_POST['remark'])){
				$MemberOrder = M('MemberOrder');
				$order = $MemberOrder->find($_POST['id']);
				if($_POST['remark']==$order['remark']){
					$this->ajaxReturn(0,"没有修改内容",0);
				}
				if($order){
					$save['remark'] = strip_tags($_POST['remark']);
					if($MemberOrder->where('id='.$_POST['id'])->setField($save)){
						$this->ajaxReturn(0,"修改成功",1);
					}else{
						$this->ajaxReturn(0,"修改失败",0);
					}
				}else{
					$this->ajaxReturn(0,"异常操作",0);
				}
			}else{
				$this->ajaxReturn(0,"异常操作",0);
			}
		}else{
				$this->ajaxReturn(0,"异常操作",0);
		}
	}

	function ajax_switch_payment(){
		if($Userinfo = $this->check_is_admin()){
			if(isset($_POST['by']) && isset($_POST['is_payment'])){
				$MemberOrder = M('MemberOrder');
				$w['pay_type'] = $_POST['is_payment'];
				$order = $MemberOrder->where($w)->find($_POST['by']);
				dump($order);
			}else{
				$this->ajaxReturn(0,'异常操作',0);
			}
		}else{
			$this->ajaxReturn(0,'异常操作',0);
		}
	}

	function ajax_switch_abolish_dispose(){
		if($Userinfo = $this->check_is_admin()){
			if(!empty($_POST['by']) && !empty($_POST['type']) && isset($_POST['value'])){

				$MemberOrder = M('MemberOrder');

				if($_POST['value']){

					$data[$_POST['type']] = 0;

					$MemberOrder->where('id='.$_POST['by'])->setField($data);
					$this->ajaxReturn(0,'修改成功',1);


				}else{

					$data[$_POST['type']] = 1;

					$MemberOrder->where('id='.$_POST['by'])->setField($data);
					$this->ajaxReturn(1,'修改成功',1);

				}

			}

		}else{
			$this->ajaxReturn(0,'异常操作',0);
		}
	}

}