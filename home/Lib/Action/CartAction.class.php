<?php

class CartAction extends CommonAction {

	public function index(){
		$IndexRecommend = D('IndexRecommend');
        $cr = $IndexRecommend->relation(true)->where('type=3')->order('sort,id')->select();
        for($a=0;$a<count($cr);$a++){
            if(empty($cr[$a]['CommodityList'])){
                unset($cr[$a]);
            }
        }
        $this->assign('cr',$cr);

        $CommodityCategory = M('CommodityCategory');
        $clists = $CommodityCategory->field('id')->where('publish=1')->select();
        for($i=0;$i<count($clists);$i++){
        	$clistss[] = $clists[$i]['id'];
        }
        $this->assign('clistss',array_rand($clistss)+1);
        if($Userinfo = $this->checkLogin()){
        	$Carts = M('Carts');
        	$Cartslist = $Carts->where('by_user='.$Userinfo['id'])->select();
        	if($Cartslist){
        		$type = $Cartslist[0]['type'];
        		switch($type){
        			case 1:
        				$CommodityList = M('CommodityList');
        				for($s=0;$s<count($Cartslist);$s++){
        					$cd = $CommodityList->field('details,p1,p2,p3',true)->find($Cartslist[$s]['by_comodity']);
        					if($cd && $cd['enable']==1){
        						$Cartslist[$s]['Commodity'] = $cd;
        						$Cartslist[$s]['CIDir'] = 'CommodityList';
                                $Cartslist[$s]['URL'] = 'Commodity';
        					}else{
                                $Carts->delete($Cartslist[$s]['id']);
                            }
        				}
        			break;
        			case 2:
                        $GrouponCommodity = M('GrouponCommodity');
                        for($s=0;$s<count($Cartslist);$s++){
                            $cd = $GrouponCommodity->field('details',true)->find($Cartslist[$s]['by_comodity']);
                            if($cd && $cd['enable']==1){
                                if($cd['expiration_date']<=time()){
                                    $Carts->delete($Cartslist[$s]['id']);
                                }else{
                                    $Cartslist[$s]['Commodity'] = $cd;
                                    $Cartslist[$s]['CIDir'] = 'GrouponCommodity';
                                    $Cartslist[$s]['URL'] = 'Groupon';
                                }
                            }else{
                                $Carts->delete($Cartslist[$s]['id']);
                            }
                        }
        			break;
        			case 3:
                        $VoteCommodity = M('VoteCommodity');
                         for($s=0;$s<count($Cartslist);$s++){
                            $cd = $VoteCommodity->field('details,p1,p2,p3',true)->find($Cartslist[$s]['by_comodity']);
                            if($cd && $cd['enable']==1){
                                $cd['price_all'] = number_format($cd['price']*$Cartslist[$s]['quantity'],"2",".","");
                                $Cartslist[$s]['Commodity'] = $cd;
                                $Cartslist[$s]['CIDir'] = 'VoteCommodity';
                                $Cartslist[$s]['URL'] = 'Vote';
                            }else{
                                $Carts->delete($Cartslist[$s]['id']);
                            }
                        }
        			break;
        		}
        		$commodity_total = 0;
        		for($k=0;$k<count($Cartslist);$k++){
                    $Cartslist[$k]['xiaoji'] = number_format($Cartslist[$k]['quantity']*$Cartslist[$k]['Commodity']['price'],"2",".","");
        			$tmpp = $Cartslist[$k]['quantity']*$Cartslist[$k]['Commodity']['price'];
        			$commodity_total+=$tmpp;
        		}
                if($Cartslist){
                    $this->assign('Cartslist',$Cartslist);
                }
        	   $this->assign('commodity_total',number_format($commodity_total,"2",".",""));
        	}
        }

		$this->display();
	}

	function delete_cart(){
        if($Userinfo = $this->checkLogin()){
            if(isset($_POST['deleteid']) && isset($_POST['type'])){
            	$Carts = M('Carts');
            	if($_POST['type']!=3 && !empty($_POST['deleteid'])){
	                for($i=0; $i<count($_POST['deleteid']); $i++){
	                    $num = $Carts->where('by_user='.$Userinfo['id'])->delete($_POST['deleteid'][$i]);
	                }
	                if($num>0){
	                    $this->ajaxReturn(0,'删除成功！',1);
	                }else{
	                    $this->ajaxReturn(0,'删除失败！',0);
	                }
            	}else{
            		if($Carts->where('by_user='.$Userinfo['id'])->delete()){
            			$this->ajaxReturn(0,'删除成功！',1);
            		}else{
            			$this->ajaxReturn(0,'删除失败！',0);
            		}
            	}
            }else{
                $this->ajaxReturn(0,'请选择要删除的数据！',0);
            }
        }else{
           $this->ajaxReturn(0,"异常操作",0);
        }
    }

    function cart_confirm(){
        if($Userinfo = $this->checkLogin()){
        	$Carts = M('Carts');
        	if(!empty($_POST['cart_id']) && !empty($_POST['quantity']) && count($_POST['cart_id'])==count($_POST['quantity'])){
        		for($i=0;$i<count($_POST['cart_id']);$i++){
        			$c = $Carts->find($_POST['cart_id'][$i]);
        			if($c){
        				 if($c['quantity']!=$_POST['quantity'][$i]){
        					$Carts->where('id='.$_POST['cart_id'][$i])->setField('quantity',$_POST['quantity'][$i]);
        				 }
        			}else{
        				$Carts->delete($_POST['cart_id'][$i]);
        			}
        		}

                $Addresss = M('Addresss');
                $Address = M('Address');
                $my_addresss = $Addresss->where('by_user='.$Userinfo['id'])->order('create_date')->select();
                if($my_addresss){
                    for($i=0;$i<count($my_addresss);$i++){
                        $my_addresss[$i]['where_text'] = str_replace(' ','',$my_addresss[$i]['where_text']);
                        $my_addresss[$i]['logistics'] = $Address->find($my_addresss[$i]['where_id']);
                    }
                }
            //    dump($my_addresss);
                $this->assign('my_addresss',$my_addresss);

                $address_config = C('address_level');
                if(!empty($address_config) && !empty($address_config['province_level'])){
                    $Address = M('Address');
                    $provice_level = $Address->where('level='.$address_config['province_level'].' AND publish=1')->order('sort,id')->select();
                    $this->assign('provice_level',$provice_level);
                }

                $Cartslist = $Carts->where('by_user='.$Userinfo['id'])->select();

                if($Cartslist){
                    $type = $Cartslist[0]['type'];
                    switch($type){
                        case 1:
                            $CommodityList = M('CommodityList');
                            for($s=0;$s<count($Cartslist);$s++){
                                $cd = $CommodityList->field('details,p1,p2,p3',true)->find($Cartslist[$s]['by_comodity']);
                                if($cd && $cd['enable']==1){
                                    $cd['price_all'] = number_format($cd['price']*$Cartslist[$s]['quantity'],"2",".","");
                                    $Cartslist[$s]['Commodity'] = $cd;
                                    $Cartslist[$s]['CIDir'] = 'CommodityList';
                                    $Cartslist[$s]['URL'] = 'Commodity';
                                }else{
                                    $Carts->delete($Cartslist[$s]['id']);
                                }
                            }
                        break;
                        case 2:
                            $GrouponCommodity = M('GrouponCommodity');
                            for($s=0;$s<count($Cartslist);$s++){
                                $cd = $GrouponCommodity->field('details',true)->find($Cartslist[$s]['by_comodity']);
                                if($cd && $cd['enable']==1){
                                    if($cd['expiration_date']<=time()){
                                        $Carts->delete($Cartslist[$s]['id']);
                                    }else{
                                        $cd['price_all'] = number_format($cd['price']*$Cartslist[$s]['quantity'],"2",".","");
                                        $Cartslist[$s]['Commodity'] = $cd;
                                        $Cartslist[$s]['CIDir'] = 'GrouponCommodity';
                                        $Cartslist[$s]['URL'] = 'Groupon';
                                        $this->assign('Cartslist',$Cartslist);
                                    }
                                }else{
                                    $Carts->delete($Cartslist[$s]['id']);
                                }
                            }
                        break;
                        case 3:
                            $VoteCommodity = M('VoteCommodity');
                             for($s=0;$s<count($Cartslist);$s++){
                                $cd = $VoteCommodity->field('details,p1,p2,p3',true)->find($Cartslist[$s]['by_comodity']);
                                if($cd && $cd['enable']==1){
                                    $cd['price_all'] = number_format($cd['price']*$Cartslist[$s]['quantity'],"2",".","");
                                    $Cartslist[$s]['Commodity'] = $cd;
                                    $Cartslist[$s]['CIDir'] = 'VoteCommodity';
                                    $Cartslist[$s]['URL'] = 'Vote';
                                }else{
                                    $Carts->delete($Cartslist[$s]['id']);
                                }
                            }
                        break;
                    }
                    $commodity_total = 0;
                    $commodity_volume = 0;
                    for($k=0;$k<count($Cartslist);$k++){
                        $commodity_total+=$Cartslist[$k]['quantity']*$Cartslist[$k]['Commodity']['price'];
                        $commodity_volume+=$Cartslist[$k]['Commodity']['measure'];
                    }

                    if($type==1){
                        $coupons = json_decode($Userinfo['coupons'],true);
                        if(count($coupons)>0 && $commodity_total>=1000){
                            $ns =  floor($commodity_total/1000);
                            $youhui = $ns*50;
                            $this->assign('youhui',number_format($youhui,"2",".",""));
                        }
                    }else if($type==3){
                            $youhui = floor($commodity_total*(1/10));
                            $this->assign('youhui',number_format($youhui,"2",".",""));
                    }
                    $this->assign('Cartslist',$Cartslist);
                //dump($Cartslist);
                    $this->assign('commodity_total',number_format($commodity_total,"2",".",""));
                    $this->assign('commodity_volume',$commodity_volume);
                    $this->display();
                }else{
                    $this->redirect('/Cart');
                }
        	}else{
        		$this->redirect('/Cart');
        	}
        }else{
        	$this->redirect('/Cart');
        }
    }

    function order_confirm(){
        if($Userinfo = $this->checkLogin()){
            if(empty($_POST['use_address']) || empty($_POST['commodity_total']) || empty($_POST['price_total']) || empty($_POST['logistics']) || empty($_POST['delivery_price'])){
                $this->ajaxReturn(0,"异常操作",0);
            }
           $cart_data = $this->get_carts();
           if($cart_data){
                $Addresss = M('Addresss');
                $my_ad = $Addresss->find($_POST['use_address']);
                if(!$my_ad){
                    $this->ajaxReturn(0,"异常操作",0);
                }

                $order['uid'] = $Userinfo['id'];
                $order['username'] = $Userinfo['username'];
                $order['out_trade_no'] = strrev(time());
                $order['total_fee'] = $_POST['price_total']; //充值金额倍率
                $order['create_date'] = time();
                $order['commodity_type'] = $cart_data['commodity_type']; //预订商品
                $order['commodity_data'] = json_encode($cart_data['commoditys']);
                $order['address'] = json_encode($my_ad);
                $order['remark'] = strip_tags($_POST['remark']);
                if(!empty($_POST['logistics'])){
                    $_POST['logistics'] = number_format($_POST['logistics'],"2",".","");
                }
                if(!empty($_POST['delivery_price'])){
                    $_POST['delivery_price'] = number_format($_POST['delivery_price'],"2",".","");
                }
                if(!empty($_POST['coupon'])){
                    $_POST['coupon'] = number_format($_POST['coupon'],"2",".","");
                }
                if(!empty($_POST['price_total'])){
                    $_POST['price_total'] = number_format($_POST['price_total'],"2",".","");
                }
                $order['other_data'] = json_encode($_POST);
                $MemberOrder = M('MemberOrder');
                if($MemberOrder->add($order)){
                    $Carts = M('Carts');
                    $Carts->where('by_user='.$Userinfo['id'])->delete();
                    if($cart_data['commodity_type']==1){
                        $coupons = json_decode($Userinfo['coupons'],true);
                        if(count($coupons)>0 && $_POST['commodity_total']>=1000 && $_POST['coupon']>0){
                            array_pop($coupons);
                            $User = M('User');
                            $User->where('id='.$Userinfo['id'])->setField('coupons',json_encode($coupons));
                        }
                    }
                    $this->ajaxReturn($order['out_trade_no'],"创建订单成功",1);
                }else{
                    $this->ajaxReturn(0,"创建订单失败",0);
                }
           }else{
                $this->ajaxReturn(0,"异常操作",0);
           }
        }else{
            $this->ajaxReturn(0,"异常操作",0);
        }
    }

    function order_complete(){
        if($Userinfo = $this->checkLogin()){
            if(isset($_GET['out_trade_no']) && !empty($_GET['out_trade_no'])){
                $MemberOrder = M('MemberOrder');
                $w['out_trade_no'] = $_GET['out_trade_no'];
                $w['uid'] = $Userinfo['id'];
                $order = $MemberOrder->where($w)->find();
                if($order && $order['create_date']+7>=time()){
                    $type = 'commodityOrder';
                    switch($order['commodity_type']){
                        case 1:
                            $type='commodityOrder';
                            break;
                        case 2:
                            $type='commodityOrder';
                            break;
                        case 3:
                            $type='votesOrder';
                            break;
                    }
                    $this->assign('type',$type);
                    $this->display();
                }else{
                    $this->redirect('/Member/commodityOrder');
                }
            }else{
                $this->redirect('/Member/commodityOrder');
            }
        }else{
            $this->redirect('/Cart');
        }
    }

    function get_carts(){
        if($Userinfo = $this->checkLogin()){
            $Carts = M('Carts');
            $Cartslist = $Carts->where('by_user='.$Userinfo['id'])->select();
            if($Cartslist){
                $type = $Cartslist[0]['type'];
                switch($type){
                    case 1:
                        $CommodityList = D('CommodityList');
                        for($s=0;$s<count($Cartslist);$s++){
                            $cd = $CommodityList->relation(true)->field('details,p1,p2,p3',true)->find($Cartslist[$s]['by_comodity']);
                            if($cd && $cd['enable']==1){
                                $Cartslist[$s]['Commodity'] = $cd;
                                $Cartslist[$s]['CIDir'] = 'CommodityList';
                                $Cartslist[$s]['URL'] = 'Commodity';
                            }else{
                                $Carts->delete($Cartslist[$s]['id']);
                            }
                        }
                    break;
                    case 2:
                        $GrouponCommodity = M('GrouponCommodity');
                        for($s=0;$s<count($Cartslist);$s++){
                            $cd = $GrouponCommodity->field('details',true)->find($Cartslist[$s]['by_comodity']);
                            if($cd && $cd['enable']==1){
                                if($cd['expiration_date']<=time()){
                                    $Carts->delete($Cartslist[$s]['id']);
                                }else{
                                    $Cartslist[$s]['Commodity'] = $cd;
                                    $Cartslist[$s]['CIDir'] = 'GrouponCommodity';
                                    $Cartslist[$s]['URL'] = 'Groupon';
                                }
                            }else{
                                $Carts->delete($Cartslist[$s]['id']);
                            }
                        }
                    break;
                    case 3:
                        $VoteCommodity = D('VoteCommodity');
                        for($s=0;$s<count($Cartslist);$s++){
                            $cd = $VoteCommodity->relation(true)->field('details,p1,p2,p3',true)->find($Cartslist[$s]['by_comodity']);
                            if($cd && $cd['enable']==1){
                                $Cartslist[$s]['Commodity'] = $cd;
                                $Cartslist[$s]['CIDir'] = 'VoteCommodity';
                                $Cartslist[$s]['URL'] = 'Vote';
                            }else{
                                $Carts->delete($Cartslist[$s]['id']);
                            }
                        }
                    break;
                }
                $commodity_total = 0;
                $commodity_volume = 0;
                $youhui = 0;
                for($k=0;$k<count($Cartslist);$k++){
                    $Cartslist[$k]['xiaoji'] = number_format($Cartslist[$k]['quantity']*$Cartslist[$k]['Commodity']['price'],"2",".","");
                    $tmpp = $Cartslist[$k]['quantity']*$Cartslist[$k]['Commodity']['price'];
                    $commodity_total+=$tmpp;
                    $commodity_volume+=$Cartslist[$k]['Commodity']['measure'];
                }
                if($type==1){
                    $coupons = json_decode($Userinfo['coupons'],true);
                    if(count($coupons)>0 && $commodity_total>=1000){
                        $ns =  floor($commodity_total/1000);
                        $youhui = $ns*50;
                    }
                }else if($type==3){
                    $youhui = floor($commodity_total*(1/10));
                    $this->assign('youhui',number_format($youhui,"2",".",""));
                }
                return array('commoditys'=>$Cartslist,'total_price'=>$commodity_total,'commodity_type'=>$type,'youhui'=>$youhui);
            }
        }else{
            return;
        }
    }

    function insert_address(){
        if($Userinfo = $this->checkLogin()){
            $Addresss = M('Addresss');
            if($data = $Addresss->create()){
                $data['by_user'] = $Userinfo['id'];
                $data['create_date'] = time();
                if($ids = $Addresss->add($data)){
                    $Address = M('Address');
                    $ads  =$Address->where('publish=1')->find($data['where_id']);
                    $this->ajaxReturn(array('id'=>$ids,'dropin'=>$ads['dropin'],'dropin_lowest_price'=>$ads['dropin_lowest_price'],'dropin_average_price'=>$ads['dropin_average_price'],'average_price'=>$ads['average_price']),"新增成功！",1);
                }else{
                    $this->ajaxReturn(0,"新增错误！",0);
                }
            }else{
                $this->ajaxReturn(0,$Blogroll->getError(),0);
            }
        }else{
           $this->ajaxReturn(0,"异常操作",0);
        }
    }

    function delete_address(){
        if($Userinfo = $this->checkLogin()){
            if(!empty($_POST['deleteid'])){
                $Addresss = M('Addresss');
                for($i=0; $i<count($_POST['deleteid']); $i++){
                    $num = $Addresss->where('by_user='.$Userinfo['id'])->delete($_POST['deleteid'][$i]);
                }
                if($num>0){
                    $this->ajaxReturn(0,'删除成功！',1);
                }else{
                    $this->ajaxReturn(0,'删除失败！',0);
                }
            }else{
                $this->ajaxReturn(0,'请选择要删除的数据！',0);
            }
        }else{
           $this->ajaxReturn(0,"异常操作",0);
        }
    }

}
