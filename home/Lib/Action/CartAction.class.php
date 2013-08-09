<?php

class CartAction extends CommonAction {

	public function index(){
		$IndexRecommend = D('IndexRecommend');
        $cr = $IndexRecommend->relation(true)->where('type=3')->order('sort,id')->select();
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
        					$cd = $CommodityList->field('details,p1,p2,p3',true)->where('enabled=1')->find($Cartslist[$s]['by_comodity']);
        					if($cd){
        						$Cartslist[$s]['Commodity'] = $cd;
        						$Cartslist[$s]['CIDir'] = 'CommodityList';
                                $Cartslist[$s]['URL'] = 'Commodity';
                                $this->assign('Cartslist',$Cartslist);
        					}else{
                                $Carts->delete($Cartslist[$s]['id']);
                            }
        				}
        			break;
        			case 2:
                        $GrouponCommodity = M('GrouponCommodity');
                        for($s=0;$s<count($Cartslist);$s++){
                            $cd = $GrouponCommodity->field('details',true)->where('enabled=1')->find($Cartslist[$s]['by_comodity']);
                            if($cd){
                                if($cd['expiration_date']<=time()){
                                    $Carts->delete($Cartslist[$s]['id']);
                                }else{
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

        			break;
        		}
        		$commodity_total = 0;
        		for($k=0;$k<count($Cartslist);$k++){
        			$tmpp = $Cartslist[$k]['quantity']*$Cartslist[$k]['Commodity']['price'];
        			$commodity_total+=$tmpp;
        		}
            //   dump($Cartslist);
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
                                $cd = $CommodityList->field('details,p1,p2,p3',true)->where('enabled=1')->find($Cartslist[$s]['by_comodity']);
                                if($cd){
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
                                $cd = $GrouponCommodity->field('details',true)->where('enabled=1')->find($Cartslist[$s]['by_comodity']);
                                if($cd){
                                    if($cd['expiration_date']<=time()){
                                        $Carts->delete($Cartslist[$s]['id']);
                                    }else{
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

                        break;
                    }
                    $commodity_total = 0;
                    $commodity_volume = 0;
                    for($k=0;$k<count($Cartslist);$k++){
                        $commodity_total+=$Cartslist[$k]['quantity']*$Cartslist[$k]['Commodity']['price'];
                        $commodity_volume+=$Cartslist[$k]['Commodity']['measure'];
                    }

                    $this->assign('commodity_total',$commodity_total);
                    $this->assign('commodity_volume',$commodity_volume);
                //    echo $commodity_volume;
                }
                $this->assign('Cartslist',$Cartslist);

        		$this->display();
        	}else{
        		$this->redirect('/Cart');
        	}
        }else{
        	$this->redirect('/Cart');
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
                    $this->ajaxReturn(array('id'=>$ids,'initiate_price'=>$ads['initiate_price'],'average_price'=>$ads['average_price']),"新增成功！",1);
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
