<?php

class SystemAction extends CommonAction{

	function index(){
		if($this->check_is_admin()){
			$this->display();
		}else{
			$this->redirect('/Public/login');
		}

	}

	function configuration(){
		if($this->check_is_admin()){
			$this->display();
		}else{
			$this->redirect('/Public/login');
		}

	}

	function modify_system_configuration(){

		$siteinfo = $_POST;
		$file = $siteinfo['filename'];
		if($file=="siteconfig.inc.php"){
			unset($siteinfo['filename']);
			unset($siteinfo['__hash__']);

			/*****基本信息*****/
			if($siteinfo['site_name']==''){$siteinfo['site_name']='';};
			if($siteinfo['site_keywords']==''){$siteinfo['site_keywords']='';};
			if($siteinfo['site_description']==''){$siteinfo['site_description']='';};

			if($siteinfo['company_name']==''){$siteinfo['company_name']='';};

			if($siteinfo['welcome_words']==''){$siteinfo['welcome_words']='';};

			if($siteinfo['site_copyright']==''){$siteinfo['site_copyright']='';};

			if($siteinfo['site_filing']==''){$siteinfo['site_filing']='None';};

			/*****联系方式*****/
			if($siteinfo['conf1']==''){$siteinfo['conf1']='';};
			if($siteinfo['conf2']==''){$siteinfo['conf2']='';};
			if($siteinfo['conf3']==''){$siteinfo['conf3']='';};
			if($siteinfo['conf4']==''){$siteinfo['conf4']='';};
			if($siteinfo['conf5']==''){$siteinfo['conf5']='';};
			if($siteinfo['conf6']==''){$siteinfo['conf6']=7;};
			if($siteinfo['conf7']==''){$siteinfo['conf7']=200;};
			if($siteinfo['conf8']==''){$siteinfo['conf8']=200;};

			/*****邮箱设置*****/

			if($siteinfo['email_host']==''){$siteinfo['email_host']='';};
			if($siteinfo['email_prot']==''){$siteinfo['email_prot']=25;};
			if($siteinfo['email_username']==''){$siteinfo['email_username']='';};
			if($siteinfo['email_password']==''){$siteinfo['email_password']='';};

			$content = "<?php \n\n\treturn array(\n";
			foreach($siteinfo as $key=>$value){
				$key = strtoupper($key);
				if(!strtolower($value) || is_numeric($value)){
					$content.="\t'$key'=>'$value',\n";
				}else{
					$content.="\t'$key'=>'$value',\n";
				}
			}
			$content.="\n);";
			$f = chmod($file, 0755);
			$put = file_put_contents($file, $content);
			if($put){
				$this->ajaxReturn(0,"修改系统配置成功！",1);
			}else{
				$this->ajaxReturn(0,"修改系统配置失败！",0);
			}
		}else{
			$this->ajaxReturn(0,"配置文件不存在！",0);
		}
	}

	function get_commodity(){
		if(isset($_GET['term'])){
			$term = stripcslashes(strip_tags(trim($_GET['term'])));

			$CommodityList = M('CommodityList');

			$Merchant = M('Merchant');

			$maps['enable'] = 1;

			if(is_numeric($term)){
				$maps['id'] = array('like',"%{$term}%");
			}else{
				$maps['name'] = array('like',"%{$term}%");
			}

			$order = 'id desc';

			$CommodityListinfo = $CommodityList->field('id,name')->where($maps)->order($order)->limit(10)->select();

			$datas = array();

			$datas = $CommodityListinfo;

			$result = array();

			foreach ($datas as $key=>$value) {

				array_push($result, array("value"=>$value['name'], "label" =>strip_tags($value['name']),"product_id"=>$value['id']));
				if (count($result) > 10){break;}

			}

			echo json_encode($result);

		}
	}

	function set_index_commodity(){
		if($this->check_is_admin()){
			$IndexRecommend = D('IndexRecommend');
			$index_recommend_config = C('index_recommend_config');
			$IndexRecommendinfo = $IndexRecommend->relation(true)->where('type='.$index_recommend_config[$_GET['type']]['type'])->order('sort,id')->select();
			$this->assign('list',$IndexRecommendinfo);
			$this->display();
		}else{
			$this->redirect('/Public/login');
		}

	}

	function ajax_set_index_commodity(){

		if(isset($_POST['type']) && !empty($_POST['type']) && !empty($_POST['commodity_name'])){

			$index_recommend_config = C('index_recommend_config');

			$IndexRecommend = M('IndexRecommend');

			$IndexRecommendinfo = $IndexRecommend->where('type='.$index_recommend_config[$_POST['type']]['type'])->order('sort,id')->select();

			$commodity_data = array();

			for($i=0; $i<count($_POST['commodity_name']); $i++){
				$commodity_data[] = array(
					'id'=>$_POST['id'][$i],
					'type'=>$index_recommend_config[$_POST['type']]['type'],
					'commodity_id'=>$_POST['commodity_id'][$i],
					'sort'=>$_POST['commodity_sort'][$i],
				);

			}

			if(!empty($IndexRecommendinfo)){

				if($this->checkMoreData($IndexRecommendinfo,$commodity_data)){

					$IndexRecommend->where('type='.$index_recommend_config[$_POST['type']]['type'])->delete();

					$flag = false;

					for($i=0; $i<count($_POST['commodity_name']); $i++){
						$commodity_data['type']=$index_recommend_config[$_POST['type']]['type'];
						$commodity_data['commodity_id']=$_POST['commodity_id'][$i];
						$commodity_data['sort']=$_POST['commodity_sort'][$i];
						if($IndexRecommend->add($commodity_data)){
							$flag = true;
						}
					}

					if($flag){
						$this->ajaxReturn(0,$index_recommend_config[$_POST['type']]['name']." 商品设置成功！",1);
					}else{
						$this->ajaxReturn(0,$index_recommend_config[$_POST['type']]['name']." 商品设置失败！",0);
					}

				}else{
					$this->ajaxReturn(0,"没有内容被修改！",0);
				}

			}else{

				$flag = false;

				for($i=0; $i<count($_POST['commodity_name']); $i++){
					$commodity_data['type']=$index_recommend_config[$_POST['type']]['type'];
					$commodity_data['commodity_id']=$_POST['commodity_id'][$i];
					$commodity_data['sort']=$_POST['commodity_sort'][$i];
					if($IndexRecommend->add($commodity_data)){
						$flag = true;
					}
				}

				if($flag){
					$this->ajaxReturn(0,$index_recommend_config[$_POST['type']]['name']." 商品设置成功！",1);
				}else{
					$this->ajaxReturn(0,$index_recommend_config[$_POST['type']]['name']." 商品设置失败！",0);
				}

			}

		}else{
			$this->ajaxReturn(0,"异常操作！",0);
		}
	}

	function checkMoreData($orgdata,$data){

		$flag = false;

		if(count($orgdata)==count($data)){

			foreach($data as $key=>$value){

				foreach($orgdata as $k=>$v){
					if($key==$k){
						if($data[$key]==$orgdata[$k]){
							continue;
						}else{
							$flag = true;
						}
					}
				}
			}

		}else{

			$flag = true;

		}

		return $flag;

	}

}