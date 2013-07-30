<?php

class LocalConditionsAndCustomsAction extends CommonAction {

    public function index(){
		$FolkCustomDirection = D('FolkCustomDirection');
		$FolkCustomDirectioninfo = $FolkCustomDirection->relation(true)->where('publish=1')->select();
		$FolkCustomInformation = M('FolkCustomInformation');

		for($i=0; $i<count($FolkCustomDirectioninfo); $i++){
			$map1['pid'] = $FolkCustomDirectioninfo[$i]['id'];
			$map1['publish'] = 1;
			$map1['recommend'] = 1;
			$map1['sid'] = 1;
			$FolkCustomDirectioninfo[$i]['Custom'] = $FolkCustomInformation->field('id,name,pid,cid,sid,create_date')->where($map1)->limit(11)->order('sort,create_date desc')->select();
			$map2['pid'] = $FolkCustomDirectioninfo[$i]['id'];
			$map2['publish'] = 1;
			$map2['recommend'] = 1;
			$map2['sid'] = 2;
			$FolkCustomDirectioninfo[$i]['Specialty'] = $FolkCustomInformation->field('id,name,pid,cid,sid,create_date')->where($map2)->limit(11)->order('sort,create_date desc')->select();
		}
		$this->assign('list',$FolkCustomDirectioninfo);
		$folk_custom = C('folk_custom');
		$this->assign('folk_custom',$folk_custom);
	//	dump($FolkCustomDirectioninfo);
		$this->display();

    }

	public function area(){
		if(isset($_GET['pid']) && !empty($_GET['pid']) && isset($_GET['cid']) && !empty($_GET['cid'])){
			import("ORG.Util.emit_ajax_page");
			$FolkCustomProvinces = D('FolkCustomProvinces');
			$FolkCustomInformation = M('FolkCustomInformation');
			$FolkCustomProvincesinfo = $FolkCustomProvinces->where('pid='.$_GET['pid'].' AND id='.$_GET['cid'].' AND publish=1')->relation(true)->find();
			$this->assign('by_area',$FolkCustomProvincesinfo);

			$top_custom = $FolkCustomInformation->where('pid='.$_GET['pid'].' AND cid='.$_GET['cid'].' AND sid=1 AND publish=1')->limit(10)->order('views desc')->select();
			$this->assign('top_custom',$top_custom);

			$top_specialty = $FolkCustomInformation->where('pid='.$_GET['pid'].' AND cid='.$_GET['cid'].' AND sid=2 AND publish=1')->limit(10)->order('views desc')->select();
			$this->assign('top_specialty',$top_specialty);

			$Custom = $FolkCustomInformation->where('pid='.$_GET['pid'].' AND cid='.$_GET['cid'].' AND sid=1 AND publish=1')->order('sort,create_date desc')->select();

			$c_page = 20;

			array_values($Custom);

			$datas_c = array_chunk($Custom,$c_page,true);

			$this->assign('Custom',isset($_GET['page']) ? $datas_c[$_GET['page']-1] : $datas_c[0]);

			$page_c = new page(count($Custom),$c_page);

			$this->assign('c_fpage',$page_c->fpage(array(4,5,6,7,8)));

			/*********************************************************/
			$Specialty = $FolkCustomInformation->where('pid='.$_GET['pid'].' AND cid='.$_GET['cid'].' AND sid=2 AND publish=1')->order('sort,create_date desc')->select();

			$s_page = 20;

			array_values($Specialty);

			$datas_s = array_chunk($Specialty,$s_page,true);

			$this->assign('Specialty',isset($_GET['page']) ? $datas_s[$_GET['page']-1] : $datas_s[0]);

			$page_s = new page(count($Specialty),$s_page);

			$this->assign('s_fpage',$page_s->fpage(array(4,5,6,7,8)));

			$folk_custom = C('folk_custom');
			$this->assign('folk_custom',$folk_custom);

			$this->display();
		}else{
			$this->redirect('/LocalConditionsAndCustoms/index');
		}
	}

	function ajax_page_custom_list(){
		if(isset($_GET['pid']) && !empty($_GET['pid']) && isset($_GET['cid']) && !empty($_GET['cid'])){
			import("ORG.Util.emit_ajax_page");

			$FolkCustomInformation = M('FolkCustomInformation');

			$Custom = $FolkCustomInformation->where('pid='.$_GET['pid'].' AND cid='.$_GET['cid'].' AND sid=1 AND publish=1')->order('sort,create_date desc')->select();

			$c_page = 20;

			array_values($Custom);

			$datas_c = array_chunk($Custom,$c_page,true);

			$this->assign('Custom',isset($_GET['page']) ? $datas_c[$_GET['page']-1] : $datas_c[0]);

			$page_c = new page(count($Custom),$c_page);

			$this->assign('c_fpage',$page_c->fpage(array(4,5,6,7,8)));

			$folk_custom = C('folk_custom');
			$this->assign('folk_custom',$folk_custom);

			$this->display();
		}
	}

	function ajax_page_specialty_list(){
		if(isset($_GET['pid']) && !empty($_GET['pid']) && isset($_GET['cid']) && !empty($_GET['cid'])){
			import("ORG.Util.emit_ajax_page");

			$FolkCustomInformation = M('FolkCustomInformation');

			$Specialty = $FolkCustomInformation->where('pid='.$_GET['pid'].' AND cid='.$_GET['cid'].' AND sid=2 AND publish=1')->order('sort,create_date desc')->select();

			$s_page = 20;

			array_values($Specialty);

			$datas_s = array_chunk($Specialty,$s_page,true);

			$this->assign('Specialty',isset($_GET['page']) ? $datas_s[$_GET['page']-1] : $datas_s[0]);

			$page_s = new page(count($Specialty),$s_page);

			$this->assign('s_fpage',$page_s->fpage(array(4,5,6,7,8)));

			$folk_custom = C('folk_custom');
			$this->assign('folk_custom',$folk_custom);

			$this->display();
		}
	}

	public function details(){
		if(isset($_GET['pid']) && !empty($_GET['pid']) && isset($_GET['cid']) && !empty($_GET['cid']) && isset($_GET['id']) && !empty($_GET['id'])){
			$FolkCustomInformation = D('FolkCustomInformation');


			$top_custom = $FolkCustomInformation->where('pid='.$_GET['pid'].' AND cid='.$_GET['cid'].' AND sid=1 AND publish=1')->limit(10)->order('views desc')->select();
			$this->assign('top_custom',$top_custom);

			$top_specialty = $FolkCustomInformation->where('pid='.$_GET['pid'].' AND cid='.$_GET['cid'].' AND sid=2 AND publish=1')->limit(10)->order('views desc')->select();
			$this->assign('top_specialty',$top_specialty);

			$map['pid'] = $_GET['pid'];
			$map['cid'] = $_GET['cid'];
			$map['id'] = $_GET['id'];
			$map['publish'] = 1;
			$FolkCustomInformationinfo = $FolkCustomInformation->relation(true)->where($map)->find();
			$this->assign('datas',$FolkCustomInformationinfo);
			$folk_custom = C('folk_custom');
			$this->assign('folk_custom',$folk_custom);
			$this->assign('folk_customs',$folk_custom[$FolkCustomInformationinfo['sid']]);
			$FolkCustomInformation->where($map)->setInc('views');

			$index_recommend_config = C('index_recommend_config');
			$IndexRecommend = D('IndexRecommend');
			$Merchant = M('Merchant');

			$IndexRecommend_commodity_recommend = $IndexRecommend->relation(true)->where('type='.$index_recommend_config['commodity_recommend']['type'])->limit(5)->order('sort,id')->select();

			for($i=0; $i<count($IndexRecommend_commodity_recommend); $i++){
				$IndexRecommend_commodity_recommend[$i]['merchant_no'] = $Merchant->getFieldByByUser($IndexRecommend_commodity_recommend[$i]['CommodityList']['by_user'],'no');
			}

			$this->assign('IndexRecommend_commodity_recommend',$IndexRecommend_commodity_recommend);

			$this->display();
		}else{
			$this->redirect('/LocalConditionsAndCustoms/index');
		}
	}

}
