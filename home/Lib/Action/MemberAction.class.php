<?php

class MemberAction extends CommonAction {

    public function index(){
        if($this->checkLogin()){
            $this->redirect('/Member/center');
        }else{
            $this->redirect('/Index/login');
        }
    }


    function center(){
        if($Userinfo = $this->checkLogin()){
            $IndexRecommend = D('IndexRecommend');
            $cr = $IndexRecommend->relation(true)->where('type=2')->order('sort,id')->select();
            $this->assign('cr',$cr);
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function commodityOrder(){
        if($Userinfo = $this->checkLogin()){
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function grouponOrder(){
        if($Userinfo = $this->checkLogin()){
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

	function voteOrder(){
        if($Userinfo = $this->checkLogin()){
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function coupon(){
        if($Userinfo = $this->checkLogin()){
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function get_address($id){
        $provices = array('provice'=>array('current'=>null,'list'=>null),'city'=>array('current'=>null,'list'=>null),'county'=>array('current'=>null,'list'=>null));
        $Address = M('Address');
        $data = $this->get_address_one($id);
        switch($data['level']){
            case 1:
                 $provices['provice']['current'] = $data;
                 $provices['provice']['list'] = $this->get_address_more($provices['provice']['current']['pid']);
                 $provices['city']['list'] = $this->get_address_more($provices['provice']['current']['id']);
            break;
            case 2:
                $provices['city']['current'] = $data;
                $provices['city']['list'] = $this->get_address_more($data['pid']);
                $provices['provice']['current'] = $this->get_address_one($data['pid']);
                $provices['provice']['list'] = $this->get_address_more($provices['provice']['current']['pid']);
            break;
            case 3:
                $provices['county']['current'] = $data;
                $provices['county']['list'] = $this->get_address_more($data['pid']);
                $provices['city']['current'] = $this->get_address_one($provices['county']['current']['pid']);
                $provices['city']['list'] = $this->get_address_more($provices['city']['current']['pid']);
                $provices['provice']['current'] = $this->get_address_one($provices['city']['current']['pid']);
                $provices['provice']['list'] = $this->get_address_more($provices['provice']['current']['pid']);
            break;
        }
        return $provices;
    }

    function get_address_one($id){
        $Address = M('Address');
        $data = $Address->where('publish=1')->find($id);
        return $data;
    }

    function get_address_more($pid){
        $Address = M('Address');
        $data = $Address->where('publish=1 AND pid='.$pid)->order('sort,id')->select();
        return $data;
    }

    function information(){
        if($Userinfo = $this->checkLogin()){
            $this->assign('userinfo',$Userinfo);
            if(!$Userinfo['where_id']){
                $address_config = C('address_level');
                if(!empty($address_config) && !empty($address_config['province_level'])){
                    $Address = M('Address');
                    $provice_level = $Address->where('level='.$address_config['province_level'].' AND publish=1')->order('sort,id')->select();
                }
                $this->assign('provice_level',$provice_level);
            }else{
            //    dump($this->get_address($Userinfo['where_id']));
                $this->assign('provices',$this->get_address($Userinfo['where_id']));
            }
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function ajax_update_information(){

        $User = M('User');
        $orginfo = $User->find($_POST['id']);

        if($data = $User->create()){

            $check_nickname = $User->where('nickname="'.$data['nickname'].'"'.' AND id<>'.$data['id'])->count();

            $flag = true;

            if($data['nickname']!=$orginfo['nickname']){
                $flag = false;
            }
            if($check_nickname>0){
                $this->ajaxReturn(0,"此昵称已经被使用!",0);
            }
            if($data['truename']!=$orginfo['truename']){
                $flag = false;
            }
            if($data['email']!=$orginfo['email']){
                $flag = false;
            }
            if($data['phone']!=$orginfo['phone']){
                $flag = false;
            }
            if($data['birthday']!=$orginfo['birthday']){
                $flag = false;
            }
            if($data['where_id']!=$orginfo['where_id']){
                $flag = false;
            }

            if($flag){
                $this->ajaxReturn(0,"没有数据被修改！",0);
            }else{
                if($User->save($data)){
                    $this->ajaxReturn(__APP__.'/Member/index.html',"修改成功！",1);
                }else{
                    $this->ajaxReturn(0,"修改失败！",0);
                }
            }
        }else{
            $this->ajaxReturn(0,$User->getError(),0);
        }
    }

    function address(){
        if($Userinfo = $this->checkLogin()){
            $Addresss = M('Addresss');
            $adds = $Addresss->where('by_user='.$Userinfo['id'])->order('id desc')->select();
            $this->assign('adds',$adds);
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function add_address(){
        $address_config = C('address_level');
        if(!empty($address_config) && !empty($address_config['province_level'])){
            $Address = M('Address');
            $provice_level = $Address->where('level='.$address_config['province_level'].' AND publish=1')->order('sort,id')->select();
        }
        $this->assign('provice_level',$provice_level);
        $this->display();
    }

    function edit_address(){
        if($Userinfo = $this->checkLogin()){
            if(isset($_POST['id']) && !empty($_POST['id'])){
                $Addresss = M('Addresss');
                $adds = $Addresss->where('by_user='.$Userinfo['id'])->find($_POST['id']);
                $this->assign('adds',$adds);
                // if($adds){
                //     $this->assign('provices',$this->get_address($adds['where_id']));
                // }
                if(!$adds['where_id']){
                    $address_config = C('address_level');
                    if(!empty($address_config) && !empty($address_config['province_level'])){
                        $Address = M('Address');
                        $provice_level = $Address->where('level='.$address_config['province_level'].' AND publish=1')->order('sort,id')->select();
                    }
                    $this->assign('provice_level',$provice_level);
                }else{
                //    dump($this->get_address($Userinfo['where_id']));
                    $this->assign('provices',$this->get_address($adds['where_id']));
                }
                $this->display();
            }else{
                $this->ajaxReturn(0,"异常操作",0);
            }
        }else{
           $this->ajaxReturn(0,"异常操作",0);
        }
    }

    function insert_address(){
        if($Userinfo = $this->checkLogin()){
            $Addresss = M('Addresss');
            if($data = $Addresss->create()){
                $data['by_user'] = $Userinfo['id'];
                $data['create_date'] = time();
                if($Addresss->add($data)){
                    $this->ajaxReturn(0,"新增成功！",1);
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

    function update_address(){
        if($Userinfo = $this->checkLogin()){
            if(isset($_POST['id'])){
                $Addresss = M('Addresss');
                if($data = $Addresss->create()){
                    $Addresss->save($data);
                    $this->ajaxReturn(0,'修改数据成功',1);
                }else{
                    $this->ajaxReturn(0,$Addresss->getError(),0);
                }
            }else{
                $this->ajaxReturn(0,"异常操作",0);
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

    function password(){
        if($Userinfo = $this->checkLogin()){
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function ajax_change_password(){
        if(isset($_POST['id']) && !empty($_POST['id'])){

            if(!empty($_POST['oldpassword']) && !empty($_POST['newpassword']) && !empty($_POST['renewpassword'])){
                $oldpassword = md5($_POST['oldpassword']);
                $newpassword = md5($_POST['newpassword']);
                $renewpassword = md5($_POST['renewpassword']);
                $User = M('User');
                $Userinfo = $User->find($_POST['id']);
                if(!empty($Userinfo)){
                    if($Userinfo['password']!=$oldpassword){
                        $this->ajaxReturn(0,"原始密码输入错误",0);
                    }else if($newpassword!=$renewpassword){
                        $this->ajaxReturn(0,"两次输入新密码不一致",0);
                    }else if($Userinfo['password']==$newpassword){
                        $this->ajaxReturn(0,"原密码不能与新密码相同",0);
                    }else{
                        if($User->where('id='.$_POST['id'])->setField('password',$newpassword)){
                            $this->ajaxReturn(0,"修改密码成功",1);
                        }else{
                            $this->ajaxReturn(0,"修改密码失败",0);
                        }
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

    function message(){
        if($Userinfo = $this->checkLogin()){

            import("ORG.Util.ajax_page");
            $instation_message = M('InstationMessage');
            $count = $instation_message->where('by_user='.$Userinfo['id'])->count();
            $page = new page($count,10);
            $list = $instation_message->where('by_user='.$Userinfo['id'])->order('create_date desc')->limit($page->setlimit())->select();

            if($list){
                $is_read = $instation_message->where('by_user='.$Userinfo['id'].' AND status=0')->count();
                $this->assign('is_read',$is_read);
            }

            $this->assign('list',$list);
        //    dump($page->fpage());
            $this->assign('fpage',$page->fpage());

            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function view_message(){
        if($Userinfo = $this->checkLogin()){
            if(isset($_POST['id']) && !empty($_POST['id'])){
                $instation_message = M('InstationMessage');
                $data = $instation_message->where('by_user='.$Userinfo['id'])->find($_POST['id']);
                if($data['status']!=1){
                    $instation_message->where('by_user='.$Userinfo['id'])->setField('status',1);
                }
                $this->assign('data',$data);
                $this->display();
            }else{
                $this->ajaxReturn(0,"异常操作",0);
            }
        }else{
            $this->ajaxReturn(0,"异常操作",0);
        }
    }

    function delete_message(){
        if($Userinfo = $this->checkLogin()){
            if(!empty($_POST['deleteid'])){
                $instation_message = M('InstationMessage');
                for($i=0; $i<count($_POST['deleteid']); $i++){
                    $num = $instation_message->where('by_user='.$Userinfo['id'])->delete($_POST['deleteid'][$i]);
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

    function suggest(){
        if($Userinfo = $this->checkLogin()){
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function return_provinces(){
        $Address = M('Address');
        $list = $Address->where('pid='.$_POST['pid'].' AND publish=1')->order('sort')->select();
        for($i=0;$i<count($list);$i++){
            $list[$i]['parent'] = $Address->find($_POST['pid']);
        }
        $data = array();
        foreach($list as $key=>$value){
            $data[] = $value;
        }
        echo json_encode($data);
    }

    function return_current(){
        $Address = M('Address');
        $data = $Address->where('publish=1')->find($_POST['pid']);
        echo json_encode($data);
    }

    function ajax_login_check(){

        $User = D('User');
        if(preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",$_POST['login_name'])){
            $Userinfo = $User->getByEmail($_POST['login_name']);
        }else{
            $Userinfo = $User->getByUsername($_POST['login_name']);
        }
        if($Userinfo){
            if(md5($_POST['password'])==$Userinfo['password']){
                $Role = M('Role');
                $group = C('USER_GROUP');
                $Roleinfo = $Role->where('level='.$group['member']['level'])->find();
                if($Userinfo['roleid']==$Roleinfo['id'] && $Userinfo['status']==1){
                    unset($_SESSION['username']);
                    unset($_SESSION['email']);
                    unset($_SESSION['userid']);
                    unset($_SESSION['roleid']);
                    unset($_SESSION['__hash__']);
                    $_SESSION['username'] = $Userinfo['username'];
                    $_SESSION['email'] = $Userinfo['email'];
                    $_SESSION['userid'] = $Userinfo['id'];
                    $_SESSION['roleid'] =$Userinfo['roleid'];

                    $map['loginip'] = $_SERVER['REMOTE_ADDR'];
                    $map['logindate'] = time();
                    if(!empty($Userinfo['logindate'])){
                        $map['last_login'] = $Userinfo['logindate'];
                    }
                //    $map = array('loginip'=>$_SERVER['REMOTE_ADDR'],'logindate'=>time());
                    $User->where('id='.$Userinfo['id'])->setField($map);
                    $this->ajaxReturn(__APP__.'/Member/index.html',"登录成功！",1);
                }else{
                    $this->ajaxReturn(0,"该用户不存在或未被激活！",0);
                }
            }else{
                $this->ajaxReturn(0,"用户名或密码错误！",0);
            }
        }else{
            $this->ajaxReturn(0,"该用户不存在或未被激活！",0);
        }
    }

        function ajax_signup_check(){
        if(md5($_POST['verify'])==$_SESSION['verify']){
            $User = D('User');
            if($data = $User->create()){
                $Role = M('Role');
                $group = C('USER_GROUP');
                $Roleinfo = $Role->where('level='.$group['member']['level'])->find();
                $data['roleid'] = $Roleinfo['id'];
                if($userid = $User->add($data)){
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['userid'] = $userid;
                    $_SESSION['roleid'] = $data['roleid'];

                    // $TemplateList = M('TemplateList');

                    // $instation_message_type = C('instation_message_type');
                    // $TemplateListinfos = $TemplateList->find(4);
                    // $InstationMessage = M('InstationMessage');
                    // $map['by_user'] = $userid;
                    // $map['name'] = $TemplateListinfos['title'];
                    // $bodys = str_replace('%user_name%', $data['username'], $TemplateListinfos['details']);
                    // $bodys = str_replace('%date%', date('Y-m-d H:i:s'), $bodys);
                    // $map['details'] = $bodys;
                    // $map['message_type'] = $instation_message_type['personal'];
                    // $map['create_date'] = time();
                    // $InstationMessage->add($map);

                    // $mailTo = array();
                    // $AddAttachment = array();
                    // array_push(
                    //     $mailTo, array($data['email'],"收件人姓名:".$data['nickname'])
                    // );
                    // $TemplateListinfo = $TemplateList->find(3);
                    // $subject = $TemplateListinfo['title'];
                    // $body = str_replace('%user_name%', $data['username'], $TemplateListinfo['details']);
                    // $body = str_replace('%date%', date('Y-m-d H:i:s'), $body);
                    // sendmail_sunchis_com($mailTo,$subject,$body,$AddAttachment);
                    $this->ajaxReturn(__APP__.'/Member/index.html',"注册成功！",1);
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

        function ajax_login_out(){
            if(!empty($_SESSION['through_member'])){
                unset($_SESSION['through_member']['username']);
                unset($_SESSION['through_member']['email']);
                unset($_SESSION['through_member']['roleid']);
                unset($_SESSION['through_member']['userid']);
            }else{
                unset($_SESSION['username']);
                unset($_SESSION['email']);
                unset($_SESSION['roleid']);
                unset($_SESSION['userid']);
            }
            $this->ajaxReturn(__APP__.'/Index/index.html',"退出成功！",1);
    }

}
