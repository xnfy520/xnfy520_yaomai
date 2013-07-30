<?php

class MerchantAction extends CommonAction {

    public function index(){
		$this->redirect('/Merchant/register');
    }

	function register(){
		$TemplateList = M('TemplateList');
		$TemplateListinfo = $TemplateList->find(1);
		$this->assign('data',$TemplateListinfo);

		$Provinces = M('Provinces');
		$Provincesinfo = $Provinces->where('level='.C('provinces_level.area_level'))->order('sort')->select();
		$this->assign('Provincesinfo',$Provincesinfo);

		$this->display();
	}

	function ajax_merchant_signup_check(){
		if(md5($_POST['verify'])==$_SESSION['verify']){
			$User = D('User');
			if($data = $User->create()){
				$Role = M('Role');
				$group = C('USER_GROUP');
				$Roleinfo = $Role->where('level='.$group['merchant']['level'])->find();
				$data['roleid'] = $Roleinfo['id'];
				if($userid = $User->add($data)){
					$tmpdir = './Public/Content/tmp/';
					$srcdir = './Public/Content/CertificateImage/';
					if(!empty($_POST['id_image'])){
						copy($tmpdir.$_POST['id_image'], $srcdir.$_POST['id_image']);
						copy($tmpdir.'thumb_'.$_POST['id_image'], $srcdir.'thumb_'.$_POST['id_image']);
						copy($tmpdir.'cut_'.$_POST['id_image'], $srcdir.'cut_'.$_POST['id_image']);
					}
					$_SESSION['username'] = $data['username'];
					$_SESSION['email'] = $data['email'];
					$_SESSION['userid'] = $userid;
					$_SESSION['roleid'] = $data['roleid'];
					$this->ajaxReturn(__ROOT__.'/merchant.php/Public/login',"注册成功,管理员审核通过后即可登录商铺后台！",1);
				}else{
					$this->ajaxReturn(0,"注册失败！",0);
				}
			}else{
				$this->ajaxReturn(0,$User->getError(),0);
			}
		}else{
			$this->ajaxReturn(0,"验证码错误！",0);
		}
	}

	public function uploads(){

		import("ORG.Net.emit_upload");
		import("ORG.Util.emit_image");
		$upload = new upload(array("filepath"=>"./Public/Content/tmp","allowtype"=>array('gif','png','jpg','jpeg','JPG','JPEG','PNG','GIF'),"israndname"=>true,"maxsize"=>20000000000));
		if($upload->uploadfiles('myfile')){

			$src = "./Public/Content/tmp/";
			$img = new image($src);
			$imgname =  $upload->getnewname();
			copy($src.$imgname,$src.'thumb_'.$imgname);

			if($cutimg = $img->cut($imgname,'cut_')){
				$thumb = $img->thumb('thumb_'.$imgname,800,800);
				$cut = $img->thumb($cutimg, 400, 400);
			}

			$response['image_name'] = $upload->getnewname();
			$response['status'] = 1;
			$response['cut_image'] = $cut;
			$response['thumb_image'] = $thumb;
			$response['thumb_image_info'] = GetImageInfo("./Public/Content/tmp/".$thumb);

			echo json_encode($response);
		}else{
			echo json_encode(array('error'=>$upload->geterrormsg(),'status'=>0));
		}

	}

}
