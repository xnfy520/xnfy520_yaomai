<?php

class VoteAction extends CommonAction {

	public function index(){

			import("ORG.Util.ajax_page");
			$VoteCommodity = D('VoteCommodity');

			$where['enable'] = 1;

			$count = $VoteCommodity->where($where)->count();
			$page = new page($count,15);

			$order = '';
			if(isset($_GET['sort'])){
				switch($_GET['sort']){
					case 'sales_volume':
						$order = 'sales_volume';
					break;
					case 'price':
						$order = 'price';
					break;
					case 'news':
						$order = 'create_date';
					break;
					default:
						$order = 'create_date';
					break;
				}
			}else{
				$order = 'create_date';
			}
			if(isset($_GET['by'])){
				$order = $order.' '.$_GET['by'];
			}else{
				$_GET['by'] = 'desc';
				$order = $order.' '.$_GET['by'];
			}

			$VoteCommoditys = $VoteCommodity->field('id,name,image,price,expiration_date,sales_volume,vote,subscribe,subscription')->where($where)->limit($page->setlimit())->order($order)->select();

			$this->assign('list',$VoteCommoditys);

			$this->assign('fpage',$page->fpage());
//dump($page->fpage());
			$this->display();
	}

	function details(){
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$VoteCommodity = D('VoteCommodity');
			$data = $VoteCommodity->relation(true)->where('enable=1')->find($_GET['id']);
			if(!empty($data['p1'])){
				$data['p1'] = json_decode($data['p1'],true);
			}
			if(!empty($data['p2'])){
				$data['p2'] = json_decode($data['p2'],true);
			}
			if(!empty($data['p3'])){
				$data['p3'] = json_decode($data['p3'],true);
			}
			$this->assign('data',$data);
		//	dump($data);
			$this->display();
		}else{
			$this->redirect('/Index');
		}
	}

}
