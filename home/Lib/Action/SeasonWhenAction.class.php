<?php

class SeasonWhenAction extends CommonAction {

	public function index(){

		$Commodity_Category = C('Commodity_Category');
		$function = $Commodity_Category['season_when']['function'];

		$CommodityCategory = M('CommodityCategory');
		$ccid = $CommodityCategory->getByFunction($function);
		$this->assign('CommodityCategoryinfos',$ccid);
		$CommoditySubclass = M('CommoditySubclass');
		$cslist = $CommoditySubclass->where('pid='.$ccid['id'])->order('sort,id')->select();

		$this->assign('cslist',$cslist);

		$CommodityList = M('CommodityList');

		$Merchant = M('Merchant');

		import("ORG.Util.emit_ajax_page");

		$maps['enable'] = 1;

		$maps['pid'] = $ccid['id'];

		if(isset($_GET['category']) && !empty($_GET['category'])){
			$maps['cid'] = $_GET['category'];
		}

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

			$fpage = 25;

			array_values($CommodityListinfo);

			$datas = array_chunk($CommodityListinfo,$fpage,true);

			$this->assign('list',isset($_GET['page']) ? $datas[$_GET['page']-1] : $datas[0]);

			$page = new page(count($CommodityListinfo),$fpage);

			$this->assign('fpage',$page->fpage(array(4,5,6,7,8)));

		}

		$this->display();
	}

	public function ajax_page_products_list(){

		$Commodity_Category = C('Commodity_Category');
		$function = $Commodity_Category['season_when']['function'];

		$CommodityCategory = M('CommodityCategory');
		$ccid = $CommodityCategory->getByFunction($function);

		$CommoditySubclass = M('CommoditySubclass');
		$cslist = $CommoditySubclass->where('pid='.$ccid['id'])->order('sort,id')->select();

		$this->assign('cslist',$cslist);

		$CommodityList = M('CommodityList');

		$Merchant = M('Merchant');

		import("ORG.Util.emit_ajax_page");

		$maps['enable'] = 1;

		$maps['pid'] = $ccid['id'];

		if(isset($_GET['category']) && !empty($_GET['category'])){
			$maps['cid'] = $_GET['category'];
		}

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
			$CommodityListinfo[$i]['merchant_no'] = $Merchant->getFieldByByUser($CommodityListinfo[$i]['by_user'],'no');
			$CommodityListinfo[$i]['where_info'] = $this->getAnywhere($Merchant->getFieldByByUser($CommodityListinfo[$i]['by_user'],'where'));
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

			$fpage = 25;

			array_values($CommodityListinfo);

			$datas = array_chunk($CommodityListinfo,$fpage,true);

			$this->assign('list',isset($_GET['page']) ? $datas[$_GET['page']-1] : $datas[0]);

			$page = new page(count($CommodityListinfo),$fpage);

			$this->assign('fpage',$page->fpage(array(4,5,6,7,8)));

		}

		$this->display();
	}

}
