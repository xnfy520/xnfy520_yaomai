<?php

class ShopsAction extends CommonAction {

	function checkMerchant($no){

		if(isset($no) && !empty($no)){
			$Merchant = M('Merchant');
			$Merchantinfo = $Merchant->where('no='.$no)->find();
			if(!empty($Merchantinfo) && $Merchantinfo['status']==1){
				$User = D('User');
				$Userinfo = $User->relation(true)->find($Merchantinfo['by_user']);
				$user_group = C('USER_GROUP');
				if(($Userinfo['Role']['level']==$user_group['merchant']['level']) && $Userinfo['audit']==1){
					$CommodityCategory = D('CommodityCategory');
					$CommodityCategoryinfo = $CommodityCategory->relation(true)->where('publish=1')->order('sort')->select();
					$CommodityList = M('CommodityList');
					for($i=0; $i<count($CommodityCategoryinfo); $i++){
						for($s=0; $s<count($CommodityCategoryinfo[$i]['CommoditySubclass']); $s++){
							$CommodityCategoryinfo[$i]['CommoditySubclass'][$s]['counts'] = $CommodityList->where('enable=1 AND by_user='.$Merchantinfo['by_user'].' AND pid='.$CommodityCategoryinfo[$i]['CommoditySubclass'][$s]['pid'].' AND cid='.$CommodityCategoryinfo[$i]['CommoditySubclass'][$s]['id'])->count();
							$CommodityCategoryinfo[$i]['counts'] = $CommodityList->where('enable=1 AND by_user='.$Merchantinfo['by_user'].' AND pid='.$CommodityCategoryinfo[$i]['CommoditySubclass'][$s]['pid'])->count();
						}
					}
					$this->assign('CommodityCategoryinfo',$CommodityCategoryinfo);
					$Merchantinfo['counts'] = $CommodityList->where('enable=1 AND by_user='.$Merchantinfo['by_user'])->count();
					$Merchantinfo['wheres'] = $this->getWhere($Merchantinfo['where']);
					$this->assign('Merchantinfo',$Merchantinfo);

					$create_date = $CommodityList->where('enable=1 AND by_user='.$Merchantinfo['by_user'])->limit(4)->order('sales_volume desc')->select();
					$this->assign('create_date',$create_date);

					return $Merchantinfo;

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

	function getWhere($id){
		$Provinces = M('Provinces');

		$judge = $Provinces->where('id='.$id)->find();

		$county = $Provinces->where('pid='.$judge['pid'])->order('sort')->select();

		$city_judge = $Provinces->where('id='.$county[0]['pid'])->find();
		$city = $Provinces->where('pid='.$city_judge['pid'])->order('sort')->select();

		$province_judge = $Provinces->where('id='.$city[0]['pid'])->find();
	//	dump($province_judge);
		$provinces_level = C('provinces_level');
		if($province_judge['level']==$provinces_level['area_level']){
			return $city_judge['name'].' '.$judge['name'];
		}else{
			return $province_judge['name'].' '.$city_judge['name'].' '.$judge['name'];
		}

	}

	function index($no){
		if($Merchantinfo = $this->checkMerchant($no)){
			$MerchantAdvert = M('MerchantAdvert');
			$MerchantAdvertinfo = $MerchantAdvert->where('publish=1 AND by_user='.$Merchantinfo['by_user'])->select();
			if(!empty($MerchantAdvertinfo)){
				$this->assign('MerchantAdvertinfo',$MerchantAdvertinfo);
			}
			$CommodityList = M('CommodityList');
			$recommend_maps['by_user'] = $Merchantinfo['by_user'];
			$recommend_maps['enable'] = 1;
			$recommend_maps['recommend'] = 1;
			$recommend_list = $CommodityList->where($recommend_maps)->limit(4)->order('sort,id')->select();
			$this->assign('recommend_list',$recommend_list);

			$maps['by_user'] = $Merchantinfo['by_user'];
			$maps['enable'] = 1;

			$sales_volume_list = $CommodityList->where($maps)->limit(8)->order('sales_volume desc')->select();
			$this->assign('sales_volume_list',$sales_volume_list);

			$current_price_list = $CommodityList->where($maps)->limit(8)->order('current_price desc')->select();
			$this->assign('current_price_list',$current_price_list);

			$create_date_list = $CommodityList->where($maps)->limit(8)->order('create_date desc')->select();
			$this->assign('create_date_list',$create_date_list);
			$this->assign('merchant_no',$no);

			$this->display('index');
		}else{
			$this->redirect('/Index/index');
		}
	}

	public function ajax_page_products_list($no){
		if($Merchantinfo = $this->checkMerchant($no)){

			import("ORG.Util.emit_ajax_page");

			$CommodityList = M('CommodityList');
			$maps['by_user'] = $Merchantinfo['by_user'];
			$maps['enable'] = 1;

			if(!empty($_GET['pid'])){
				$maps['pid'] = $_GET['pid'];
				$CommodityCategory = M('CommodityCategory');
				$ccname = $CommodityCategory->find($maps['pid']);
				$this->assign('ccname',$ccname);
			}

			if(!empty($_GET['cid'])){
				$maps['cid'] = $_GET['cid'];
				$CommoditySubclass = M('CommoditySubclass');
				$csname = $CommoditySubclass->find($maps['cid']);
				$this->assign('csname',$csname);
			}

			$count = $CommodityList->where($maps)->count();
			$page = new page($count,2);
			$CommodityListinfo = $CommodityList->where($maps)->limit($page->setlimit())->order('sort,id')->select();

			if(empty($CommodityListinfo)){
				if(isset($_GET['pid'])){
					$this->redirect('/Shops/'.$no.'/products/index/pid/'.$_GET['pid']);
				}else{
					$this->redirect('/Shops/'.$no.'/products/index');
				}
			}else{
				$this->assign('merchant_no',$no);
				$this->assign('CommodityListinfo',$CommodityListinfo);
				$this->assign('fpage',$page->fpage(array(4,5,6,7,8)));

				$this->display('ajax_page_products_list');
			}

		}else{
			$this->redirect('/Index/index');
		}
	}

	function information($no){
		if($Merchantinfo = $this->checkMerchant($no)){
			$this->assign('merchant_no',$no);
			$this->display('information');
		}else{
			$this->redirect('/Index/index');
		}
	}

	function products($no){
		if($Merchantinfo = $this->checkMerchant($no)){

			import("ORG.Util.emit_ajax_page");

			$CommodityList = M('CommodityList');
			$maps['by_user'] = $Merchantinfo['by_user'];
			$maps['enable'] = 1;

			if(!empty($_GET['pid'])){
				$maps['pid'] = $_GET['pid'];
				$CommodityCategory = M('CommodityCategory');
				$ccname = $CommodityCategory->find($maps['pid']);
				$this->assign('ccname',$ccname);
			}

			if(!empty($_GET['cid'])){
				$maps['cid'] = $_GET['cid'];
				$CommoditySubclass = M('CommoditySubclass');
				$csname = $CommoditySubclass->find($maps['cid']);
				$this->assign('csname',$csname);
			}

			$count = $CommodityList->where($maps)->count();
			$page = new page($count,20);
			$CommodityListinfo = $CommodityList->where($maps)->limit($page->setlimit())->order('sort,id')->select();

			if(empty($CommodityListinfo)){
				if(isset($_GET['pid'])){
					$this->redirect('/Shops/'.$no.'/products/index/pid/'.$_GET['pid']);
				}else{
					$this->redirect('/Shops/'.$no.'/products/index');
				}
			}else{
				$this->assign('merchant_no',$no);
				$this->assign('CommodityListinfo',$CommodityListinfo);
				$this->assign('fpage',$page->fpage(array(4,5,6,7,8)));
				$this->display('products');
			}

		}else{
			$this->redirect('/Index/index');
		}
	}

	function details($no){
		if($Merchantinfo = $this->checkMerchant($no)){
			if(isset($_GET['details']) && !empty($_GET['details'])){

				$this->assign('define_fake_action_value',$_GET['details']);

				import("ORG.Util.emit_ajax_page");

				$CommodityList = D('CommodityList');
				$maps['by_user'] = $Merchantinfo['by_user'];
				$maps['enable'] = 1;
				$maps['id'] = $_GET['details'];
				$CommodityListinfo = $CommodityList->relation(true)->where($maps)->find();

				if(!empty($CommodityListinfo)){
					$CommodityList->where('id='.$_GET['details'])->setInc('views');
					$this->assign('merchant_no',$no);
					$this->assign('datas',$CommodityListinfo);

					$CommodityConsult = D('CommodityConsult');
					$CommodityConsultinfo = $CommodityConsult->relation(true)->where('by_merchant='.$no.' AND by_commodity='.$CommodityListinfo['id'].' AND pid=0')->order('create_date desc')->select();

					foreach($CommodityConsultinfo as $key=>$value){
						if(empty($value['CommodityConsult'])){
							unset($CommodityConsultinfo[$key]);
						}
					}

					$c_page = 10;

					array_values($CommodityConsultinfo);

					$datas_c = array_chunk($CommodityConsultinfo,$c_page,true);

					$this->assign('count_cc',count($datas_c));

					$this->assign('ccinfos',isset($_GET['page']) ? $datas_c[$_GET['page']-1] : $datas_c[0]);

					$page_c = new page(count($CommodityConsultinfo),$c_page);

					$this->assign('c_fpage',$page_c->fpage(array(4,5,6,7,8)));

					if(!empty($_SESSION['view_commodity'])){
						foreach($_SESSION['view_commodity'] as $key=>$value){
							if($value['commodity_id']==$_GET['details'] && $value['merchant_id']==$no){
								unset($_SESSION['view_commodity'][$key]['CommodityList']);
							}else{
								$_SESSION['view_commodity'][$key]['CommodityList'] = $CommodityList->where('publish=1')->find($value['commodity_id']);
							}
						}
					}

					if(count($_SESSION['view_commodity'])>4){
						array_pop($_SESSION['view_commodity']);
					}

					$this->assign('view_commodity',$_SESSION['view_commodity']);

					if(!isset($_SESSION['view_commodity'])){
						$_SESSION['view_commodity'] = array();
					}

					$flag = true;

					foreach($_SESSION['view_commodity'] as $key=>$value){
						if($value['commodity_id']==$_GET['details'] && $value['merchant_id']==$no){
							$flag = false;
						}
					}

					if($flag){
						array_unshift($_SESSION['view_commodity'],array('commodity_id'=>$_GET['details'],'merchant_id'=>$no));
					}

					$CommodityListinfo = $CommodityList->field('id')->where('by_user='.$Merchantinfo['by_user'])->select();
					$commoditys = array();
					for($i=0; $i<count($CommodityListinfo); $i++){
						$commoditys[] = $CommodityListinfo[$i]['id'];
					}
					$CommodityEvaluate = D('CommodityEvaluate');
					$CommodityEvaluateinfo = $CommodityEvaluate->relation(true)->where('by_commodity='.$_GET['details'].' AND star<>0 AND enable<>0')->order('modify_date desc')->select();
					foreach($CommodityEvaluateinfo as $key=>$value){
						if(in_array($value['by_commodity'],$commoditys)){
							$infos = json_decode($value['MemberOrder']['commodity_infos'],true);
							$info = array();
							foreach($infos as $k=>$v){
								if($value['by_commodity']==$v['id']){
									if($value['specification']!=0){
										if($value['specification']==$v['CommoditySpecification']['id']){
											$info = $infos[$k];
										}else{
											$info = $infos[$k];
										}
									}else{
										$info = $infos[$k];
									}
								}
							}
							$CommodityEvaluateinfo[$key]['CommodityInfo'] = $info;

						}else{
							unset($CommodityEvaluateinfo[$key]);
						}
					}

					$CommodityEvaluateinfo_good = array();
					$CommodityEvaluateinfo_medium = array();
					$CommodityEvaluateinfo_bad = array();

					foreach($CommodityEvaluateinfo as $keys=>$values){
						switch($values['star']){
							case 1:
							case 2:
								$CommodityEvaluateinfo_bad[] = $CommodityEvaluateinfo[$keys];
								break;
							case 3:
								$CommodityEvaluateinfo_medium[] = $CommodityEvaluateinfo[$keys];
								break;
							case 4:
							case 5:
								$CommodityEvaluateinfo_good[] = $CommodityEvaluateinfo[$keys];
								break;
						}
					}

					import("ORG.Util.emit_ajax_page");

					$fpage_all = 10;
					array_values($CommodityEvaluateinfo);
					$data = array_chunk($CommodityEvaluateinfo,$fpage_all,true);
					$this->assign('CommodityEvaluateinfo_all',isset($_GET['page']) ? $data[$_GET['page']-1] : $data[0]);
					$page_all = new page(count($CommodityEvaluateinfo),$fpage_all);
					$this->assign('all_count',count($CommodityEvaluateinfo));
					$this->assign('fpage_all',$page_all->fpage(array(4,5,6,7,8)));

					$fpage_bad = 10;
					array_values($CommodityEvaluateinfo_bad);
					$data_bad = array_chunk($CommodityEvaluateinfo_bad,$fpage_bad,true);
					$this->assign('CommodityEvaluateinfo_bad',isset($_GET['page']) ? $data_bad[$_GET['page']-1] : $data_bad[0]);
					$page_bad = new page(count($CommodityEvaluateinfo_bad),$fpage_bad);
					$this->assign('all_count_bad',count($CommodityEvaluateinfo_bad));
					$this->assign('fpage_bad',$page_bad->fpage(array(4,5,6,7,8)));

					$fpage_medium = 10;
					$data_medium = array_chunk($CommodityEvaluateinfo_medium,$fpage_medium,true);
					$this->assign('CommodityEvaluateinfo_medium',isset($_GET['page']) ? $data_medium[$_GET['page']-1] : $data_medium[0]);
					$page_medium = new page(count($CommodityEvaluateinfo_medium),$fpage_medium);
					$this->assign('all_count_medium',count($CommodityEvaluateinfo_medium));
					$this->assign('fpage_medium',$page_medium->fpage(array(4,5,6,7,8)));

					$fpage_good = 10;
					array_values($CommodityEvaluateinfo_good);
					$data_good = array_chunk($CommodityEvaluateinfo_good,$fpage_good,true);
					$this->assign('CommodityEvaluateinfo_good',isset($_GET['page']) ? $data_good[$_GET['page']-1] : $data_good[0]);
					$page_good = new page(count($CommodityEvaluateinfo_good),$fpage_good);
					$this->assign('all_count_good',count($CommodityEvaluateinfo_good));
					$this->assign('fpage_good',$page_good->fpage(array(4,5,6,7,8)));

					$this->display('details');
				}else{
					$this->redirect('/Shops/'.$no);
				}
			}else{
				$this->redirect('/Shops/'.$no);
			}
		}else{
			$this->redirect('/Index/index');
		}
	}

	function ajax_page_products_consult($no){

		if($Merchantinfo = $this->checkMerchant($no)){


			if(isset($_GET['details']) && !empty($_GET['details'])){

				import("ORG.Util.emit_ajax_page");

				$CommodityList = D('CommodityList');
				$maps['by_user'] = $Merchantinfo['by_user'];
				$maps['enable'] = 1;
				$maps['id'] = $_GET['details'];
				$CommodityListinfo = $CommodityList->relation(true)->where($maps)->find();
				if(!empty($CommodityListinfo)){
					$CommodityList->where('id='.$_GET['details'])->setInc('views');
					$this->assign('merchant_no',$no);
					$this->assign('datas',$CommodityListinfo);

					$CommodityConsult = D('CommodityConsult');
					$CommodityConsultinfo = $CommodityConsult->relation(true)->where('by_merchant='.$no.' AND by_commodity='.$CommodityListinfo['id'].' AND pid=0')->order('create_date desc')->select();

					foreach($CommodityConsultinfo as $key=>$value){
						if(empty($value['CommodityConsult'])){
							unset($CommodityConsultinfo[$key]);
						}
					}

					$c_page = 10;

					array_values($CommodityConsultinfo);

					$datas_c = array_chunk($CommodityConsultinfo,$c_page,true);

					$this->assign('ccinfos',isset($_GET['page']) ? $datas_c[$_GET['page']-1] : $datas_c[0]);

					$page_c = new page(count($CommodityConsultinfo),$c_page);

					$this->assign('c_fpage',$page_c->fpage(array(4,5,6,7,8)));


					$this->display('ajax_page_products_consult');
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

	function ajax_page_products_consult_list($no){

		if($Merchantinfo = $this->checkMerchant($no)){

			import("ORG.Util.emit_ajax_page");

			$CommodityConsult = D('CommodityConsult');

			$CommodityConsultinfo = $CommodityConsult->relation(true)->where('by_merchant='.$no.' AND pid=0')->order('create_date desc')->select();

			foreach($CommodityConsultinfo as $key=>$value){
				if(empty($value['CommodityConsult'])){
					unset($CommodityConsultinfo[$key]);
				}
			}

			$page = 10;

			array_values($CommodityConsultinfo);

			$datas = array_chunk($CommodityConsultinfo,$page,true);

			$this->assign('ccinfos',isset($_GET['page']) ? $datas[$_GET['page']-1] : $datas[0]);

			$page = new page(count($CommodityConsultinfo),$page);

			$this->assign('fpage',$page->fpage(array(4,5,6,7,8)));
			$this->assign('merchant_no',$no);
			$this->display('ajax_page_products_consult_list');

		}else{
			return false;
		}

	}

	function evaluate($no){
		if($Merchantinfo = $this->checkMerchant($no)){
			$this->assign('merchant_no',$no);
			$CommodityList = M('CommodityList');
			$CommodityListinfo = $CommodityList->field('id')->where('by_user='.$Merchantinfo['by_user'])->select();
			$commoditys = array();
			for($i=0; $i<count($CommodityListinfo); $i++){
				$commoditys[] = $CommodityListinfo[$i]['id'];
			}
			$CommodityEvaluate = D('CommodityEvaluate');
			$datas['star'] = array('neq',"0");
			$datas['enable'] = array("neq","0");
			$CommodityEvaluateinfo = $CommodityEvaluate->relation(true)->where($datas)->order('modify_date desc')->select();
			foreach($CommodityEvaluateinfo as $key=>$value){
				if(in_array($value['by_commodity'],$commoditys)){
					$infos = json_decode($value['MemberOrder']['commodity_infos'],true);
					$info = array();
					foreach($infos as $k=>$v){
						if($value['by_commodity']==$v['id']){
							if($value['specification']!=0){
								if($value['specification']==$v['CommoditySpecification']['id']){
									$info = $infos[$k];
								}else{
									$info = $infos[$k];
								}
							}else{
								$info = $infos[$k];
							}
						}
					}
					$CommodityEvaluateinfo[$key]['CommodityInfo'] = $info;

				}else{
					unset($CommodityEvaluateinfo[$key]);
				}
			}

			$CommodityEvaluateinfo_good = array();
			$CommodityEvaluateinfo_medium = array();
			$CommodityEvaluateinfo_bad = array();

			foreach($CommodityEvaluateinfo as $keys=>$values){
				switch($values['star']){
					case 1:
					case 2:
						$CommodityEvaluateinfo_bad[] = $CommodityEvaluateinfo[$keys];
						break;
					case 3:
						$CommodityEvaluateinfo_medium[] = $CommodityEvaluateinfo[$keys];
						break;
					case 4:
					case 5:
						$CommodityEvaluateinfo_good[] = $CommodityEvaluateinfo[$keys];
						break;
				}
			}

			import("ORG.Util.emit_ajax_page");

			$fpage_all = 10;
			array_values($CommodityEvaluateinfo);
			$data = array_chunk($CommodityEvaluateinfo,$fpage_all,true);
			$this->assign('CommodityEvaluateinfo_all',isset($_GET['page']) ? $data[$_GET['page']-1] : $data[0]);
			$page_all = new page(count($CommodityEvaluateinfo),$fpage_all);
			$this->assign('all_count',count($CommodityEvaluateinfo));
			$this->assign('fpage_all',$page_all->fpage(array(4,5,6,7,8)));

			$fpage_bad = 10;
			array_values($CommodityEvaluateinfo_bad);
			$data_bad = array_chunk($CommodityEvaluateinfo_bad,$fpage_bad,true);
			$this->assign('CommodityEvaluateinfo_bad',isset($_GET['page']) ? $data_bad[$_GET['page']-1] : $data_bad[0]);
			$page_bad = new page(count($CommodityEvaluateinfo_bad),$fpage_bad);
			$this->assign('all_count_bad',count($CommodityEvaluateinfo_bad));
			$this->assign('fpage_bad',$page_bad->fpage(array(4,5,6,7,8)));

			$fpage_medium = 10;
			$data_medium = array_chunk($CommodityEvaluateinfo_medium,$fpage_medium,true);
			$this->assign('CommodityEvaluateinfo_medium',isset($_GET['page']) ? $data_medium[$_GET['page']-1] : $data_medium[0]);
			$page_medium = new page(count($CommodityEvaluateinfo_medium),$fpage_medium);
			$this->assign('all_count_medium',count($CommodityEvaluateinfo_medium));
			$this->assign('fpage_medium',$page_medium->fpage(array(4,5,6,7,8)));

			$fpage_good = 10;
			array_values($CommodityEvaluateinfo_good);
			$data_good = array_chunk($CommodityEvaluateinfo_good,$fpage_good,true);
			$this->assign('CommodityEvaluateinfo_good',isset($_GET['page']) ? $data_good[$_GET['page']-1] : $data_good[0]);
			$page_good = new page(count($CommodityEvaluateinfo_good),$fpage_good);
			$this->assign('all_count_good',count($CommodityEvaluateinfo_good));
			$this->assign('fpage_good',$page_good->fpage(array(4,5,6,7,8)));

			$this->display('evaluate');
		}else{
			$this->redirect('/Index/index');
		}
	}

	function ajax_page_evaluate($no){
		if($Merchantinfo = $this->checkMerchant($no)){
			$this->assign('merchant_no',$no);
			$CommodityList = M('CommodityList');
			$CommodityListinfo = $CommodityList->field('id')->where('by_user='.$Merchantinfo['by_user'])->select();
			$commoditys = array();
			for($i=0; $i<count($CommodityListinfo); $i++){
				$commoditys[] = $CommodityListinfo[$i]['id'];
			}
			$CommodityEvaluate = D('CommodityEvaluate');
			$map['star'] = array('neq','0');
			$map['enable'] = array('neq','0');
			if(isset($_GET['by_commodity']) && !empty($_GET['by_commodity'])){
				$map['by_commodity'] = $_GET['by_commodity'];
			}
			$CommodityEvaluateinfo = $CommodityEvaluate->relation(true)->where($map)->order('modify_date desc')->select();
			foreach($CommodityEvaluateinfo as $key=>$value){
				if(in_array($value['by_commodity'],$commoditys)){
					$infos = json_decode($value['MemberOrder']['commodity_infos'],true);
					$info = array();
					foreach($infos as $k=>$v){
						if($value['by_commodity']==$v['id']){
							if($value['specification']!=0){
								if($value['specification']==$v['CommoditySpecification']['id']){
									$info = $infos[$k];
								}else{
									$info = $infos[$k];
								}
							}else{
								$info = $infos[$k];
							}
						}
					}
					$CommodityEvaluateinfo[$key]['CommodityInfo'] = $info;

				}else{
					unset($CommodityEvaluateinfo[$key]);
				}
			}

			$CommodityEvaluateinfo_good = array();
			$CommodityEvaluateinfo_medium = array();
			$CommodityEvaluateinfo_bad = array();

			foreach($CommodityEvaluateinfo as $keys=>$values){
				switch($values['star']){
					case 1:
					case 2:
						$CommodityEvaluateinfo_bad[] = $CommodityEvaluateinfo[$keys];
						break;
					case 3:
						$CommodityEvaluateinfo_medium[] = $CommodityEvaluateinfo[$keys];
						break;
					case 4:
					case 5:
						$CommodityEvaluateinfo_good[] = $CommodityEvaluateinfo[$keys];
						break;
				}
			}

			import("ORG.Util.emit_ajax_page");

			switch($_GET['type']){
				case 'all' :
					if(isset($_GET['by_commodity']) && !empty($_GET['by_commodity'])){
						$fpage_all = 10;
					}else{
						$fpage_all = 10;
					}
					array_values($CommodityEvaluateinfo);
					$data = array_chunk($CommodityEvaluateinfo,$fpage_all,true);
					$this->assign('CommodityEvaluateinfo_all',isset($_GET['page']) ? $data[$_GET['page']-1] : $data[0]);
					$page_all = new page(count($CommodityEvaluateinfo),$fpage_all);
					$this->assign('all_count',count($CommodityEvaluateinfo));
					$this->assign('fpage_all',$page_all->fpage(array(4,5,6,7,8)));
					$this->display('ajax_page_evaluate_all');
					break;
				case 'good' :
					if(isset($_GET['by_commodity']) && !empty($_GET['by_commodity'])){
						$fpage_good = 10;
					}else{
						$fpage_good = 10;
					}
					array_values($CommodityEvaluateinfo_good);
					$data_good = array_chunk($CommodityEvaluateinfo_good,$fpage_good,true);
					$this->assign('CommodityEvaluateinfo_good',isset($_GET['page']) ? $data_good[$_GET['page']-1] : $data_good[0]);
					$page_good = new page(count($CommodityEvaluateinfo_good),$fpage_good);
					$this->assign('all_count_good',count($CommodityEvaluateinfo_good));
					$this->assign('fpage_good',$page_good->fpage(array(4,5,6,7,8)));
					$this->display('ajax_page_evaluate_good');
					break;
				case 'medium' :
					if(isset($_GET['by_commodity']) && !empty($_GET['by_commodity'])){
						$fpage_medium = 10;
					}else{
						$fpage_medium = 10;
					}
					$data_medium = array_chunk($CommodityEvaluateinfo_medium,$fpage_medium,true);
					$this->assign('CommodityEvaluateinfo_medium',isset($_GET['page']) ? $data_medium[$_GET['page']-1] : $data_medium[0]);
					$page_medium = new page(count($CommodityEvaluateinfo_medium),$fpage_medium);
					$this->assign('all_count_medium',count($CommodityEvaluateinfo_medium));
					$this->assign('fpage_medium',$page_medium->fpage(array(4,5,6,7,8)));
					$this->display('ajax_page_evaluate_medium');
					break;
				case 'bad' :
					if(isset($_GET['by_commodity']) && !empty($_GET['by_commodity'])){
						$fpage_bad = 10;
					}else{
						$fpage_bad = 10;
					}
					array_values($CommodityEvaluateinfo_bad);
					$data_bad = array_chunk($CommodityEvaluateinfo_bad,$fpage_bad,true);
					$this->assign('CommodityEvaluateinfo_bad',isset($_GET['page']) ? $data_bad[$_GET['page']-1] : $data_bad[0]);
					$page_bad = new page(count($CommodityEvaluateinfo_bad),$fpage_bad);
					$this->assign('all_count_bad',count($CommodityEvaluateinfo_bad));
					$this->assign('fpage_bad',$page_bad->fpage(array(4,5,6,7,8)));
					$this->display('ajax_page_evaluate_bad');
					break;
			}
		}
	}

	function consult($no){
		if($Merchantinfo = $this->checkMerchant($no)){

			import("ORG.Util.emit_ajax_page");

			$CommodityConsult = D('CommodityConsult');

			$CommodityConsultinfo = $CommodityConsult->relation(true)->where('by_merchant='.$no.' AND pid=0')->order('create_date desc')->select();

			foreach($CommodityConsultinfo as $key=>$value){
				if(empty($value['CommodityConsult'])){
					unset($CommodityConsultinfo[$key]);
				}
			}

			$page = 10;

			array_values($CommodityConsultinfo);

			$datas = array_chunk($CommodityConsultinfo,$page,true);

			$this->assign('ccinfos',isset($_GET['page']) ? $datas[$_GET['page']-1] : $datas[0]);

			$page = new page(count($CommodityConsultinfo),$page);

			$this->assign('fpage',$page->fpage(array(4,5,6,7,8)));
			$this->assign('merchant_no',$no);
			$this->display('consult');

		}else{
			$this->redirect('/Shops/'.$no);
		}
	}

	function _empty($no){
		if(!empty($_GET['_URL_'][2])){
			$action = $_GET['_URL_'][2];
			switch($action){
				case 'information':$this->information($no);break;
				case 'products':$this->products($no);break;
				case 'evaluate':$this->evaluate($no);break;
				case 'consult':$this->consult($no);break;
				case 'details':$this->details($no);break;
				case 'ajax':$this->ajax_page_products_list($no);break;
				case 'ajax_consult':$this->ajax_page_products_consult($no);break;
				case 'ajax_consult_list':$this->ajax_page_products_consult_list($no); break;
				case 'ajax_page_evaluate':$this->ajax_page_evaluate($no); break;
				default:$this->index($no);
			}
		}else{
			$this->index($no);
		}
	}

	function ajax_favorites_merchant(){
		if(!empty($_POST['user_id']) && !empty($_POST['merchant_no'])){
			$FavoritesMerchant = M('FavoritesMerchant');
			$map['by_user'] = $_POST['user_id'];
			$map['by_merchant'] = $_POST['merchant_no'];
			$FavoritesMerchantinfo = $FavoritesMerchant->where($map)->find();
			if(empty($FavoritesMerchantinfo)){
				$map['create_date'] = time();
				if($FavoritesMerchant->add($map)){
					$this->ajaxReturn(0,"收藏商铺成功！",1);
				}else{
					$this->ajaxReturn(0,"收藏商铺失败！",0);
				}
			}else{
				$this->ajaxReturn(0,"该商铺已经被收藏！",0);
			}
		}else{
			$this->ajaxReturn(0,"登录后才能收藏此商铺！",0);
		}
	}

	function ajax_favorites_commodity(){
		if(!empty($_POST['user_id']) && !empty($_POST['commodity_no'])){
			$FavoritesCommodity = M('FavoritesCommodity');
			$map['by_user'] = $_POST['user_id'];
			$map['by_commodity'] = $_POST['commodity_no'];
			$FavoritesCommodityinfo = $FavoritesCommodity->where($map)->find();
			if(empty($FavoritesCommodityinfo)){
				$map['create_date'] = time();
				if($FavoritesCommodity->add($map)){
					$this->ajaxReturn(0,"收藏商品成功！",1);
				}else{
					$this->ajaxReturn(0,"收藏商品失败！",0);
				}
			}else{
				$this->ajaxReturn(0,"该商品已经被收藏！",0);
			}
		}else{
			$this->ajaxReturn(0,"登录后才能收藏此商品！",0);
		}
	}

	function ajax_add_consult(){
		if($Userinfo = $this->checkLogin()){
			if(!empty($_POST['user_id']) && !empty($_POST['commodity_id']) && !empty($_POST['message']) && !empty($_POST['merchant_no'])){
				$CommodityConsult = M('CommodityConsult');
				$maps['by_user'] = $_POST['user_id'];
				$maps['by_commodity'] = $_POST['commodity_id'];
				$maps['by_merchant'] = $_POST['merchant_no'];
				$CommodityConsultinfo = $CommodityConsult->where($maps)->order('create_date desc')->find();
				$maps['message'] = strip_tags(trim($_POST['message']));
				$maps['create_date'] = time();
				if(empty($CommodityConsultinfo)){
					if($CommodityConsult->add($maps)){
						$this->ajaxReturn(0,"发布咨询成功，商家回复后会在此显示！",1);
					}else{
						$this->ajaxReturn(0,"发布咨询失败！",0);
					}
				}else{
				//	echo $CommodityConsultinfo['create_date']+60*3-(time());
					if($CommodityConsultinfo['create_date']+60*5>=time()){
						$this->ajaxReturn(0,"针对同一商品资讯间隔时间为5分钟！",0);
					}else{
						if($CommodityConsult->add($maps)){
							$this->ajaxReturn(0,"发布咨询成功，商家回复后会在此显示！",1);
						}else{
							$this->ajaxReturn(0,"发布咨询失败！",0);
						}
					}
				}
			}else{
				$this->ajaxReturn(0,"异常操作！",0);
			}
		}else{
			$this->ajaxReturn(0,"登录才能发布咨询！",0);
		}
	}

	function ajax_commodity_add_cart(){
		$Cart = M('Cart');
		if(!empty($_POST['commodity_id']) && !empty($_POST['quantity']) && isset($_POST['specification'])){
			if($Userinfo = $this->checkLogin()){
				unset($_SESSION['guest_cart']);
				$map['by_user'] = $Userinfo['id'];
				$map['by_comodity'] = $_POST['commodity_id'];
				$map['specification'] = $_POST['specification'];
				$count = $Cart->where($map)->count();
				if($count>0){
					$this->ajaxReturn(0,"该商品已经在您的购物车中了！",0);
				}else{
					$map['quantity'] = $_POST['quantity'];
					$map['create_date'] = time();
					if($Cart->add($map)){
						$this->ajaxReturn(0,"加入购物车成功！",1);
					}else{
						$this->ajaxReturn(0,"加入购物车失败！",0);
					}
				}
			}else{
				$flag = true;
				foreach($_SESSION['guest_cart'] as $key=>$value){
					if($value['guest_id'] == session_id() && $value['commodity'] == $_POST['commodity_id'] && $value['specification'] == $_POST['specification']){
						$flag = false;
					}
				}
				if($flag){
					$_SESSION['guest_cart'][] = array(
						'guest_id'=>session_id(),
						'commodity'=>$_POST['commodity_id'],
						'quantity'=>$_POST['quantity'],
						'specification'=>$_POST['specification'],
					);
					$this->ajaxReturn(0,"加入购物车成功！",1);
				}else{
					$this->ajaxReturn(0,"该商品已经在您的购物车中了！",0);
				}

			}
		}else{
			$this->ajaxReturn(0,"异常操作！",0);
		}
	}

	function ajax_buy_commodity(){
		if(!empty($_POST['commodity_id']) && !empty($_POST['quantity']) && isset($_POST['specification'])){
			if($Userinfo = $this->checkLogin()){
				$Cart = M('Cart');
				$map['by_user'] = $Userinfo['id'];
				$map['by_comodity'] = $_POST['commodity_id'];
				$map['specification'] = $_POST['specification'];
				$count = $Cart->where($map)->count();
				if($count>0){
					$this->ajaxReturn(0,"该商品已经在您的购物车中了！",1);
				}else{
					$map['quantity'] = $_POST['quantity'];
					$map['create_date'] = time();
					if($Cart->add($map)){
						$this->ajaxReturn(0,"加入购物车成功！",1);
					}else{
						$this->ajaxReturn(0,"加入购物车失败！",0);
					}
				}
			}else{
				$flag = true;
				foreach($_SESSION['guest_cart'] as $key=>$value){
					if($value['guest_id'] == session_id() && $value['commodity'] == $_POST['commodity_id'] && $value['specification'] == $_POST['specification']){
						$flag = false;
					}
				}
				if($flag){
					$_SESSION['guest_cart'][] = array(
						'guest_id'=>session_id(),
						'commodity'=>$_POST['commodity_id'],
						'quantity'=>$_POST['quantity'],
						'specification'=>$_POST['specification'],
					);
					$this->ajaxReturn(0,"加入购物车成功！",1);
				}else{
					$this->ajaxReturn(0,"该商品已经在您的购物车中了！",1);
				}
			}
		}else{
			$this->ajaxReturn(0,"异常操作！",0);
		}
	}

	public function alipayto(){

		$delivery_times = C('delivery_time');
		$delivery_timesinfo = $delivery_times[$_GET['delivery_time']];

		if(!isset($_GET['delivery_time']) || empty($_GET['delivery_time']) || empty($delivery_timesinfo)){
			$this->redirect('/Member/cart');
		}else{
			$delivery_time = $delivery_timesinfo;
		}

		$CommodityList = M('CommodityList');
		$CommoditySpecification = M('CommoditySpecification');
		$Merchant = M('Merchant');
		$Cart = M('Cart');
		if($Userinfo = $this->checkLogin()){

			$Cartinfo = $Cart->where('by_user='.$Userinfo['id'])->order('create_date desc')->select();
			$carts = array();
			$cart_total_price = 0;
			$commodity_quantity = 0;
			$num = 0;
			$address_info = array();
			foreach($Cartinfo as $key=>$value){
				$num++;
				$carts[$num] = $CommodityList->where('enable=1')->field('introduce,details',true)->find($value['by_comodity']);
				$carts[$num]['buy_quantity'] = $value['quantity'];
				$Merchantinfo = $Merchant->where('by_user='.$carts[$num]['by_user'].' AND enable=1 AND status=1')->find();
				if(empty($Merchantinfo)){
					unset($carts[$num]);
					unset($Cartinfo[$key]);
				}else{
					$carts[$num]['merchant_no'] = $Merchantinfo['no'];
					if($value['specification']!=0){
						$csinfos = $CommoditySpecification->find($value['specification']);
						if(!empty($csinfos)){
							$carts[$num]['CommoditySpecification'] = $csinfos;
							$carts[$num]['total_price'] = ($carts[$num]['buy_quantity']*$csinfos['current_price']);
							$carts[$num]['total_integral'] = ($carts[$num]['buy_quantity']*$csinfos['integral']);
						}
					}else{
						$carts[$num]['total_price'] = ($carts[$num]['buy_quantity']*$carts[$num]['current_price']);
						$carts[$num]['total_integral'] = ($carts[$num]['buy_quantity']*$carts[$num]['integral']);
					}
				}
				$commodity_quantity+=$carts[$num]['buy_quantity'];
				$cart_total_price+=$carts[$num]['total_price'];
				$carts[$num]['total_price'] = number_format($carts[$num]['total_price'],2, '.', '');
			}

			$Address = M('Address');
			$address_info = $Address->where("by_user=".$Userinfo['id']." AND status=1")->find();

			$commodity_category = count($carts);

		}else{
			if(!empty($_SESSION['guest_cart'])){

				$carts = array();
				$cart_total_price = 0;
				$num = 0;
				$commodity_quantity = 0;
				$address_info = array();
				foreach($_SESSION['guest_cart'] as $key=>$value){
					$num++;
					$carts[$num] = $CommodityList->where('enable=1')->field('introduce,details',true)->find($value['commodity']);
					$carts[$num]['buy_quantity'] = $value['quantity'];
					$Merchantinfo = $Merchant->where('by_user='.$carts[$num]['by_user'].' AND enable=1 AND status=1')->find();
					if(empty($Merchantinfo)){
						unset($carts[$num]);
						unset($_SESSION['guest_cart'][$key]);
					}else{
						$carts[$num]['merchant_no'] = $Merchantinfo['no'];
						if($value['specification']!=0){
							$csinfos = $CommoditySpecification->find($value['specification']);
							if(!empty($csinfos)){
								$carts[$num]['CommoditySpecification'] = $csinfos;
								$carts[$num]['total_price'] = ($carts[$num]['buy_quantity']*$csinfos['current_price']);
								$carts[$num]['total_integral'] = ($carts[$num]['buy_quantity']*$csinfos['integral']);
							}
						}else{
							$carts[$num]['total_price'] = ($carts[$num]['buy_quantity']*$carts[$num]['current_price']);
							$carts[$num]['total_integral'] = ($carts[$num]['buy_quantity']*$carts[$num]['integral']);
						}
					}
					$commodity_quantity+=$carts[$num]['buy_quantity'];
					$cart_total_price+=$carts[$num]['total_price'];
					$carts[$num]['total_price'] = number_format($carts[$num]['total_price'],2, '.', '');
				}
				$commodity_category = count($carts);
				foreach($_SESSION['guest_address'] as $key=>$value){
					if($value['status']==1){
						$address_info = $_SESSION['guest_address'][$key];
					}
				}
			}else{
				$this->redirect('/Member/cart');
			}
		}

		if(!empty($commodity_category) || !empty($commodity_quantity) || !empty($cart_total_price) || !empty($address_info) || !empty($carts)){

//			$users = array();
//
//			foreach($carts as $ckey=>$cvalue){
//				if(!in_array($cvalue['by_user'],$users)){
//					$users[] = $cvalue['by_user'];
//				}
//			}
//
//			$cart_result = array();
//			foreach($users as $u_key=>$u_value){
//				foreach($carts as $c_keys=>$c_value){
//					if($u_value==$c_value['by_user']){
//						$cart_result[$u_key][] = $carts[$c_keys];
//					}
//				}
//			}
//
//			dump($cart_result);

					$aliapy_config = C('ALIPAY_CONFIG_COMMODITY');
					$payment_info = C('payment_info');
					$out_trade_no		= rand(1,9).str_shuffle(substr(time(),1));//请与贵网站订单系统中的唯一订单号匹配
			//	$out_trade_no		= rand(1,9).str_shuffle(substr(time(),5));//请与贵网站订单系统中的唯一订单号匹配
//					$out_trade_no		= date('Ymdhis');//请与贵网站订单系统中的唯一订单号匹配
					$subject			= $payment_info['subject'];	//订单名称，显示在支付宝收银台里的“商品名称”里，显示在支付宝的交易管理的“商品名称”的列表里。
					$body_alias				= '本次订单共有'.$commodity_category.'款'.$commodity_quantity.'件商品,合计'.$cart_total_price.'元;';//订单描述、订单详细、订单备注，显示在支付宝收银台里的“商品描述”里
					$body				= '本次订单共有'.$commodity_category.'款'.$commodity_quantity.'件商品,合计'.$cart_total_price.'元;'.$delivery_time;//订单描述、订单详细、订单备注，显示在支付宝收银台里的“商品描述”里
//					$body				= '老土网订单';	//订单描述、订单详细、订单备注，显示在支付宝收银台里的“商品描述”里
					$price				= $cart_total_price;	//订单总金额，显示在支付宝收银台里的“应付总额”里

					$logistics_fee		= "0.00";				//物流费用，即运费。
					$logistics_type		= "EXPRESS";			//物流类型，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
					$logistics_payment	= "SELLER_PAY";			//物流支付方式，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）

					$quantity			= "1";					//商品数量，建议默认为1，不改变值，把一次交易看成是一次下订单而非购买一件商品。

		//选填参数//

		//买家收货信息（推荐作为必填）
		//该功能作用在于买家已经在商户网站的下单流程中填过一次收货信息，而不需要买家在支付宝的付款流程中再次填写收货信息。
		//若要使用该功能，请至少保证receive_name、receive_address有值
		//收货信息格式请严格按照姓名、地址、邮编、电话、手机的格式填写

				$receive_name		=$address_info['name'];//收货人姓名，如：张三
				$receive_address	= $address_info['provinces'].' '.$address_info['street'];			//收货人地址，如：XX省XXX市XXX区XXX路XXX小区XXX栋XXX单元XXX号
				$receive_zip		= $address_info['zip'];				//收货人邮编，如：123456
				$receive_phone		= (!empty($address_info['pre_phone']) ? $address_info['pre_phone'].'-' : '').$address_info['phone'];		//收货人电话号码，如：0571-81234567
				$receive_mobile		= $address_info['mobile'];		//收货人手机号码，如：13312341234
				$phone_all = empty($receive_phone) ? '-' : $receive_phone;
				$address_all = '收货人：'.$receive_name.' 收货地址：'.$receive_address.' 邮编：'.$receive_zip.' 电话：'.$phone_all.' 手机：'.$receive_mobile.' （'.$delivery_time.'）';

		//网站商品的展示地址，不允许加?id=123这类自定义参数
				$show_url			= 'http://'.$_SERVER['HTTP_HOST'].'/Index/index.html';

				/************************************************************/

		//构造要请求的参数数组
				$parameter = array(
					"service"			=> "create_partner_trade_by_buyer",
					"payment_type"		=> "1",

					"partner"			=> trim($aliapy_config['partner']),
					"_input_charset"	=> trim(strtolower($aliapy_config['input_charset'])),
					"seller_email"		=> trim($aliapy_config['seller_email']),
					"return_url"		=> trim($aliapy_config['return_url']),
					"notify_url"		=> trim($aliapy_config['notify_url']),

					"out_trade_no"		=> $out_trade_no,
					"subject"			=> $subject,
					"body"				=> $body,
					"price"				=> $price,
					"quantity"			=> $quantity,

					"logistics_fee"		=> $logistics_fee,
					"logistics_type"	=> $logistics_type,
					"logistics_payment"	=> $logistics_payment,

					"receive_name"		=> $receive_name,
					"receive_address"	=> $receive_address,
					"receive_zip"		=> $receive_zip,
					"receive_phone"		=> $receive_phone,
					"receive_mobile"	=> $receive_mobile,

					"show_url"			=> $show_url
				);

				$MemberOrder = M('MemberOrder');

				if($Userinfo = $this->checkLogin()){
					$map['by_user'] = $Userinfo['id'];
				}else{
					$map['by_user'] = 0;
				}
				$map['out_trade_no'] = $out_trade_no;
				$map['total_fee'] = $price;
				$map['commodity_infos'] = json_encode($carts);
				$map['address_infos'] = json_encode($address_info);
				$map['quantity'] = $commodity_quantity;
				$map['delivery_time'] = $delivery_time;
				$map['create_date'] = time();

				if($MemberOrder->add($map)){

					if($Userinfo = $this->checkLogin()){
						$Cart->where('by_user='.$Userinfo['id'])->delete();
					}

					$CommoditySpecification = M('CommoditySpecification');

				//	构造担保交易接口
					import("alipay_service");
					import("alipay_submit");
					$alipayService = new AlipayService($aliapy_config);
					if($html_text = $alipayService->create_partner_trade_by_buyer($parameter)){

						foreach($carts as $key=>$value){
							if(empty($value['CommoditySpecification'])){
								$CommodityList->where('id='.$value['id'])->setDec('inventory',$value['buy_quantity']);
							}else{
								$CommoditySpecification->where('lid='.$value['id'].' AND id='.$value['CommoditySpecification']['id'])->setDec('inventory',$value['buy_quantity']);
							}
						}

						$TemplateList = M('TemplateList');

						$mailTo = array();
						$AddAttachment = array();
						$TemplateListinfo = $TemplateList->find(5);
						$subject = $TemplateListinfo['title'];
						$bodys = str_replace('%user_name%', $Userinfo['nickname'], $TemplateListinfo['details']);
						$order_info_html = '';
						$order_info_html.='<div>'.$body_alias.'</div>';
						$order_info_html.='<table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">';
						foreach($carts as $key=>$value){
							$order_info_html.='<tr>';
							$order_info_html.='<td width="100" align="center" style="border: 1px solid black;">';
							$order_info_html.='<a target="_blank" href="http://'.$_SERVER['HTTP_HOST'].'/Shops/'.$value['merchant_no'].'/details/'.$value['id'].'.html"><img src="http://'.$_SERVER['HTTP_HOST'].'/Public/Content/CommodityList/cut_'.$value['image'].'" style="width:30px; height:30px; padding:3px;" /></a>';
							$order_info_html.='</td>';
							$order_info_html.='<td style="border: 1px solid black;color:#ec651a;text-indent: 10px;">';
							$order_info_html.='<a target="_blank" href="http://'.$_SERVER['HTTP_HOST'].'/Shops/'.$value['merchant_no'].'/details/'.$value['id'].'.html">';
							$order_info_html.=$value['name'].'　';
							$order_info_html.=empty($value['CommoditySpecification']) ? $value['default_specification'] : $value['CommoditySpecification']['specification'];
							$order_info_html.='</a>';
							$order_info_html.='</td>';
							$order_info_html.='<td style="border: 1px solid black;" width="100" align="center">单价：&#165; '.$value['current_price'].'</td>';
							$order_info_html.='<td style="border: 1px solid black;" width="100" align="center">数量： '.$value['buy_quantity'].'</td>';
							$order_info_html.='<td style="border: 1px solid black;" width="150" align="center">小计：￥ '.$value['total_price'].'</td>';
							$order_info_html.='</tr>';
						}
						$order_info_html.='</table>';
						$order_info_html.='<div>'.$address_all.'</div>';
						$bodys = str_replace('%order_infos%', $order_info_html, $bodys);
						$bodys = str_replace('%date%', date('Y-m-d H:i:s'), $bodys);

						if($Userinfo = $this->checkLogin()){
							if(preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",$Userinfo['email'])){
								if(preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",C('CONTACT_EMAIL'))){
									array_push($mailTo, array($Userinfo['email'],"收件人姓名:".$Userinfo['nickname']));
									array_push($mailTo, array(C('CONTACT_EMAIL'),"网站管理员"));
									sendmail_sunchis_com($mailTo,$subject,$bodys,$AddAttachment);
								}else{
									array_push($mailTo, array($Userinfo['email'],"收件人姓名:".$Userinfo['nickname']));
									sendmail_sunchis_com($mailTo,$subject,$bodys,$AddAttachment);
								}
							}else{
								if(preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",C('CONTACT_EMAIL'))){
									array_push($mailTo, array(C('CONTACT_EMAIL'),"网站管理员"));
									sendmail_sunchis_com($mailTo,$subject,$bodys,$AddAttachment);
								}
							}

						$instation_message_type = C('instation_message_type');
						$TemplateListinfo_6 = $TemplateList->find(6);
						$InstationMessage = M('InstationMessage');
						$map['by_user'] = $Userinfo['id'];
						$map['name'] = $TemplateListinfo_6['title'];
						$bodys_6 = str_replace('%user_name%', $Userinfo['nickname'], $TemplateListinfo_6['details']);
						$bodys_6 = str_replace('%order_url%', 'http://'.$_SERVER['HTTP_HOST'].'/Member/order.html', $bodys_6);
						$bodys_6 = str_replace('%date%', date('Y-m-d H:i:s'), $bodys_6);
						$map['details'] = $bodys_6;
						$map['message_type'] = $instation_message_type['personal'];
						$map['create_date'] = time();
						$InstationMessage->add($map);

						}else{
							if(preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",C('CONTACT_EMAIL'))){
								array_push($mailTo, array(C('CONTACT_EMAIL'),"网站管理员"));
								sendmail_sunchis_com($mailTo,$subject,$bodys,$AddAttachment);
							}
						}

						echo $html_text;

					}else{

						$this->redirect('/Member/cart');

					}

				}else{

					$this->redirect('/Member/cart');

				}

		}else{

			$this->redirect('/Member/cart');

		}




	}




	public function notify_url(){
		$trystatus = M('Trystatus');
	//	$trystatus->where('id=1')->setInc('success');
		import("alipay_notify");

		$aliapy_config = C('ALIPAY_CONFIG_COMMODITY');

		$MemberOrder = M('MemberOrder');

		$Cart = D('Cart');

	//	$memberproductorders = M('MemberProductOrders');

//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($aliapy_config);
		$verify_result = $alipayNotify->verifyNotify();

		if($verify_result) {//验证成功

			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代
			$trystatus->where('id=1')->setInc('success');
			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
			//获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
			$out_trade_no	= $_POST['out_trade_no'];	    //获取订单号
			$trade_no		= $_POST['trade_no'];	    	//获取支付宝交易号
			$total			= $_POST['price'];				//获取总价格

			$MemberOrderinfo = $MemberOrder->where('out_trade_no='.$out_trade_no)->find();

			if(empty($MemberOrderinfo)){

				echo "fail";

			}else{

				if($_POST['trade_status'] == 'WAIT_BUYER_PAY') {
					//该判断表示买家已在支付宝交易管理中产生了交易记录，但没有付款

					$trystatus->where('id=1')->setInc('WAIT_BUYER_PAY');

					$map['trade_no'] = $trade_no;
					$map['buyer_email'] = $_POST['buyer_email'];
					$map['buyer_id'] = $_POST['buyer_id'];
					$map['trade_status'] = $_POST['trade_status'];
					$map['gmt_create'] = $_POST['gmt_create'];
					$map['notify_time'] = $_POST['notify_time'];
					$map['WAIT_BUYER_PAY'] = $_POST['notify_time'];

					if($MemberOrder->where('out_trade_no='.$out_trade_no.' AND by_user='.$MemberOrderinfo['by_user'])->save($map)){
						echo "success";//请不要修改或删除
					}else{
						echo 'fail';
					}

					//判断该笔订单是否在商户网站中已经做过处理（可参考“集成教程”中“3.4返回数据处理”）
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序


					//调试用，写文本函数记录程序运行情况是否正常
					//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
				}else if($_POST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
					//该判断表示买家已在支付宝交易管理中产生了交易记录且付款成功，但卖家没有发货
					$trystatus->where('id=1')->setInc('WAIT_SELLER_SEND_GOODS');
					//判断该笔订单是否在商户网站中已经做过处理（可参考“集成教程”中“3.4返回数据处理”）
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序

					$map['gmt_payment'] = $_POST['gmt_payment'];
					$map['trade_status'] = $_POST['trade_status'];
					$map['notify_time'] = $_POST['notify_time'];
					$map['WAIT_SELLER_SEND_GOODS'] = $_POST['notify_time'];

					if($MemberOrder->where('out_trade_no='.$out_trade_no.' AND by_user='.$MemberOrderinfo['by_user'])->save($map)){
						echo "success";//请不要修改或删除
					}else{
						echo 'fail';
					}

					//调试用，写文本函数记录程序运行情况是否正常
					//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
				}else if($_POST['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {
					//该判断表示卖家已经发了货，但买家还没有做确认收货的操作
					$trystatus->where('id=1')->setInc('WAIT_BUYER_CONFIRM_GOODS');

//					//判断该笔订单是否在商户网站中已经做过处理（可参考“集成教程”中“3.4返回数据处理”）
//					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
//					//如果有做过处理，不执行商户的业务程序
					$map['trade_status'] = $_POST['trade_status'];
					$map['notify_time'] = $_POST['notify_time'];
					$map['WAIT_BUYER_CONFIRM_GOODS'] = $_POST['notify_time'];
					$MemberOrder->where('out_trade_no='.$out_trade_no.' AND by_user='.$MemberOrderinfo['by_user'])->save($map);

					echo "success";		//请不要修改或删除

					//调试用，写文本函数记录程序运行情况是否正常
					//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
				}else if($_POST['trade_status'] == 'TRADE_FINISHED') {
					//该判断表示买家已经确认收货，这笔交易完成
					$trystatus->where('id=1')->setInc('TRADE_FINISHED');

					//判断该笔订单是否在商户网站中已经做过处理（可参考“集成教程”中“3.4返回数据处理”）
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序
					$map['trade_status'] = $_POST['trade_status'];
					$map['notify_time'] = $_POST['notify_time'];
					$map['TRADE_FINISHED'] = $_POST['notify_time'];

					if($MemberOrder->where('out_trade_no='.$out_trade_no.' AND by_user='.$MemberOrderinfo['by_user'])->save($map)){

						$commodity_info = json_decode($MemberOrderinfo['commodity_infos'],true);

						$CommodityEvaluate = M('CommodityEvaluate');

						$User = M('User');
						$CommodityList = M('CommodityList');

						$map['by_user'] = $MemberOrderinfo['by_user'];
						$map['by_order_id'] = $MemberOrderinfo['id'];
						$map['by_order'] = $MemberOrderinfo['out_trade_no'];
						$map['create_date'] = time();
					//	$tmp = array();
					//	$n = 0;
						foreach($commodity_info as $key=>$value){
						//	$n++;
							$map['by_commodity'] = $value['id'];
						//	if(!in_array($value['id'],$tmp)){
								$CommodityEvaluate->add($map);
						//	}
						//	$tmp[$n] = $value['id'];
							if(empty($value['CommoditySpecification'])){
								$map['specification'] = 0;
								$User->where('id='.$MemberOrderinfo['by_user'])->setInc('integral',$value['integral']);
							}else{
								$map['specification'] = $value['CommoditySpecification']['id'];
								$User->where('id='.$MemberOrderinfo['by_user'])->setInc('integral',$value['CommoditySpecification']['integral']);
							}

							$CommodityList->where('id='.$value['id'])->setInc('sales_volume',$value['buy_quantity']);
						}
					//	$trystatus->where('id=1')->setField('datas',$tmp);
						echo "success";//请不要修改或删除
					}else{
						echo 'fail';
					}

					//调试用，写文本函数记录程序运行情况是否正常
					//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
				}else {
					$trystatus->where('id=1')->setField('datas',$verify_result);
					//其他状态判断
					echo "success";

					//调试用，写文本函数记录程序运行情况是否正常
					//logResult ("这里写入想要调试的代码变量值，或其他运行的结果记录");
				}

				//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			}

		}else {
			//验证失败
			echo "fail";
			$trystatus->where('id=1')->setInc('fails');
			$trystatus->where('id=1')->setField('datas',$verify_result);
			//调试用，写文本函数记录程序运行情况是否正常
			//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
		}

	}


	public	function return_url(){

		if($Userinfo = $this->checkLogin()){

			unset($_GET['_URL_']);
			$aliapy_config = C('ALIPAY_CONFIG_COMMODITY');

			import("alipay_notify");

			//计算得出通知验证结果
			$alipayNotify = new AlipayNotify($aliapy_config);

			$verify_result = $alipayNotify->verifyReturn();

			if($verify_result) {//验证成功
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//请在这里加上商户的业务逻辑程序代码

				//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
				//获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
				$out_trade_no	= $_GET['out_trade_no'];	//获取订单号
				$trade_no		= $_GET['trade_no'];		//获取支付宝交易号
				$total_fee		= $_GET['price'];			//获取总价格

				if($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
					//判断该笔订单是否在商户网站中已经做过处理（可参考“集成教程”中“3.4返回数据处理”）
					//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
					//如果有做过处理，不执行商户的业务程序
				}else {
					echo "trade_status=".$_GET['trade_status'];
				}

				$this->redirect('/Member/order');
//				echo "验证成功<br />";
//				echo "trade_no=".$trade_no;
//				dump($_GET);
				//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			}
			else {
				$this->redirect('/Index/index.html');
				//	dump($_GET);
				//验证失败
				//如要调试，请看alipay_notify.php页面的verifyReturn函数，比对sign和mysign的值是否相等，或者检查$responseTxt有没有返回true
				//	echo "验证失败";
			}

		}else{
			$this->redirect('/Index/index.html');
		}

	}

}
