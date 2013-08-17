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
            $data = $this->getOrder(1,$_GET['status']?$_GET['status']:0);
            if($data){
                $this->assign('numbers',$data['numbers']);
                $this->assign('orders',$data['orders']);
                $this->assign('fpage',$data['fpage']);
            }
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function grouponOrder(){
        if($Userinfo = $this->checkLogin()){
             $data = $this->getOrder(2,$_GET['status']?$_GET['status']:0);
            if($data){
                $this->assign('numbers',$data['numbers']);
                $this->assign('orders',$data['orders']);
                $this->assign('fpage',$data['fpage']);
            }
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function votesOrder(){
        if($Userinfo = $this->checkLogin()){
            $data = $this->getOrder(3,$_GET['status']?$_GET['status']:0);
            if($data){
                $this->assign('numbers',$data['numbers']);
                $this->assign('orders',$data['orders']);
                $this->assign('fpage',$data['fpage']);
            }
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function getOrder($type,$status){
        if(isset($type) && !empty($type)){
             if($Userinfo = $this->checkLogin()){
                $return_data = array();
                import("ORG.Util.ajax_page");
                $MemberOrder = M('MemberOrder');
                $w['uid'] = $Userinfo['id'];
                $w['commodity_type'] = $type;
                if(isset($_GET['status'])){
                    if($_GET['status']==1){
                        $w['pay_type'] = array('egt',1);
                    }else if($_GET['status']==2){
                        $w['pay_type'] = array('eq',0);
                    }
                }

                $count = $MemberOrder->where($w)->count();
                $page = new page($count,11);
                $orders = $MemberOrder->where($w)->order('create_date desc')->limit($page->setlimit())->select();

                $number = array();
                $number[0] = $MemberOrder->where('uid='.$Userinfo['id'].' AND commodity_type='.$type)->count();
                $number[1] = $MemberOrder->where('uid='.$Userinfo['id'].' AND pay_type>0 AND commodity_type='.$type)->count();
                $number[2] = $MemberOrder->where('uid='.$Userinfo['id'].' AND pay_type=0 AND commodity_type='.$type)->count();

                if($orders){
                    for($i=0;$i<count($orders);$i++){
                        $add = json_decode($orders[$i]['address'],true);
                        $com = json_decode($orders[$i]['commodity_data'],true);
                        $other = json_decode($orders[$i]['other_data'],true);
                        $orders[$i]['address'] = $add;
                        $orders[$i]['commodity_data'] = $com;
                        $orders[$i]['other_data'] = $other;
                    }
                }
                $return_data['numbers'] = $number;
                $return_data['orders'] = $orders;
                $return_data['fpage'] = $page->fpage();
                return $return_data;
             }else{
                return;
             }
        }else{
            return;
        }
    }

	function voteOrder(){
        if($Userinfo = $this->checkLogin()){
            import("ORG.Util.ajax_page");
            $MemberOrder = M('MemberOrder');
            $count = $MemberOrder->where('uid='.$Userinfo['id'].' AND commodity_type=4')->count();
            $page = new page($count,5);
            $orders = $MemberOrder->where('uid='.$Userinfo['id'].' AND commodity_type=4')->limit($page->setlimit())->order('create_date desc')->select();
            if($orders){
                $VoteCommodity = M('VoteCommodity');
                for($i=0;$i<count($orders);$i++){
                    $j_com = json_decode($orders[$i]['commodity_data'],true);
                    $commodity = $VoteCommodity->field('details',true)->find($j_com['id']);
                    $orders[$i]['commodity'] = $commodity;
                    if($commodity['enable']==0){
                        $orders[$i]['order_status'] = 0; //不允许支付定金   -
                    }else if($orders[$i]['pay_type']==0 && $commodity['expiration_date']>time() && $commodity['subscribe_volume']<$commodity['subscribe'] && $orders[$i]['abolish']==0){//未支付&未过期&未满员&未取消

                        $orders[$i]['order_status'] = 1; //允许支付定金 支付订金

                    }else if($orders[$i]['pay_type']>0 && $commodity['expiration_date']>time() && $commodity['subscribe_volume']<$commodity['subscribe'] && $orders[$i]['abolish']==0){//已支付&未过期&未满员&未取消
                        $orders[$i]['order_status'] = 2; //允许取消定金  取消预订 

                    }else if($orders[$i]['pay_type']>0 && $orders[$i]['abolish']==0 && $commodity['expiration_date']<=time() && $commodity['subscribe_volume']>=$commodity['subscribe']){//已支付&未取消&已过期&已满员
                        $orders[$i]['order_status'] = 3; //允许购买  加入购物车
                    }else if($orders[$i]['pay_type']>0 || $commodity['expiration_date']<=time() || $commodity['subscribe_volume']>$commodity['subscribe'] || $orders[$i]['abolish']==1){  //已支付|已过期|已满员|已取消
                        $orders[$i]['order_status'] = 0; //不允许支付定金   -
                    }
                }
            //    dump($orders);
                $this->assign('orders',$orders);
                $this->assign('fpage',$page->fpage());
            }
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function cancelVoteOrder(){
         if($Userinfo = $this->checkLogin()){
            if(isset($_POST['order_id']) && isset($_POST['commodity_id'])){
                $MemberOrder = M('MemberOrder');
                $order = $MemberOrder->where('uid='.$Userinfo['id'].' AND pay_type>0 AND abolish=0')->find($_POST['order_id']);
                if($order){
                    $VoteCommodity = M('VoteCommodity');
                    $commodity = $VoteCommodity->where('enable=1')->find($_POST['commodity_id']);
                    if($commodity['expiration_date']<=time()){
                        $this->ajaxReturn(0,"此投票商品已经结束,不能取消定单",0);
                    }else if($commodity['subscribe_volume']>=$commodity['subscribe']){
                        $this->ajaxReturn(0,"此投票商品已经开始生产,不能取消定单",0);
                    }else{
                        $MemberOrder->where('id='.$_POST['order_id'])->setField('abolish',1);
                        $VoteCommodity->where('id='.$_POST['commodity_id'])->setDec('subscribe_volume');
                        $this->ajaxReturn(0,"取消订单成功",1);
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

    function addVoteTOCart(){
        if($Userinfo = $this->checkLogin()){
            if(isset($_POST['order_id']) && !empty($_POST['order_id'])){
                $MemberOrder = M('MemberOrder');
                $order = $MemberOrder->where('uid='.$Userinfo['id'])->find($_POST['order_id']);
                if($order){
                    if($order['pay_type']>0 && $order['abolish']==0){
                        $commodity = json_decode($order['commodity_data'],true);
                        if($commodity){
                            $VoteCommodity = M('VoteCommodity');
                            $vc = $VoteCommodity->where('enable=1')->find($commodity['id']);
                            if($vc){
                                if($vc['expiration_date']<=time() && $vc['subscribe_volume']>=$vc['subscribe']){
                                    $Carts = M('Carts');
                                    $map['by_user'] = $Userinfo['id'];
                                    $map['by_comodity'] = $commodity['id'];
                                    $map['type'] = 3;
                                    $count = $Carts->where($map)->count();
                                    if($count>0){
                                        $this->ajaxReturn(0,"该商品已经在您的购物车中了！",0);
                                    }else{
                                        $map['quantity'] = 1;
                                        $map['create_date'] = time();
                                        if($Carts->add($map)){
                                            $Carts->where('by_user='.$Userinfo['id'].' AND type<>3')->delete();
                                            $cou = $Carts->where('by_user='.$Userinfo['id'].' AND type=3')->count();
                                            $this->ajaxReturn($cou,"加入购物车成功！",1);
                                        }else{
                                            $this->ajaxReturn(0,"加入购物车失败！",0);
                                        }
                                    }
                                }else{
                                    $this->ajaxReturn(0,"不符合加入购物车的条件",0);
                                }
                            }else{
                                $this->ajaxReturn(0,"不存在此商品或已经下架",0);
                            }
                        }else{
                            $this->ajaxReturn(0,"订单异常",0);
                        }
                    }else{
                        $this->ajaxReturn(0,"异常操作,未付预订或已经取消预订",0);
                    }
                }else{
                    $this->ajaxReturn(0,"不存在此订单",0);
                }
            }else{
                $this->ajaxReturn(0,"异常操作",0);
            }
        }else{
            $this->ajaxReturn(0,"异常操作",0);
        }
    }

    function coupon(){
        if($Userinfo = $this->checkLogin()){
            $coupons = json_decode($Userinfo['coupons'],true);
            $this->assign('coupons',$coupons);
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

    function production_tracking(){
        if($Userinfo = $this->checkLogin()){
            $MemberOrder = M('MemberOrder');
            $order = $MemberOrder->where('uid='.$Userinfo['id'].' AND pay_type>0 AND abolish=0 AND commodity_type=4')->order('create_date')->select();
            if($order){
                $VoteCommodity = M('VoteCommodity');
                $como = array();
                for($i=0;$i<count($order);$i++){
                    $co = json_decode($order[$i]['commodity_data'],true);
                    $como[] = $VoteCommodity->find($co['id']);
                }
                if(count($como)>0){
                    $this->assign('list',$como);
                }
            }
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function production_tracking_details(){
        if($Userinfo = $this->checkLogin()){
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $VoteCommodity = M('VoteCommodity');
                $com = $VoteCommodity->find($_GET['id']);
                if($com){

                    $this->assign('data',$com);

                    $this->display();
                }else{
                    $this->redirect('/Member/production_tracking');
                }
            }else{
                $this->redirect('/Member/production_tracking');
            }
        }else{
            $this->redirect('/Index/login');
        }
    }

    function logistics_tracking(){
        if($Userinfo = $this->checkLogin()){
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function suggest(){
        if($Userinfo = $this->checkLogin()){
            $this->display();
        }else{
            $this->redirect('/Index/login');
        }
    }

    function send_evaluate(){
        if($Userinfo = $this->checkLogin()){
            if(isset($_POST['details']) && !empty($_POST['details'])){
                $_POST['details'] = strip_tags($_POST['details']);
                $Evaluate = M('Evaluate');
                if($data = $Evaluate->create()){
                    $data['uid'] = $Userinfo['id'];
                    $data['username'] = $Userinfo['username'];
                    $data['create_date'] = time();
                     if($Evaluate->add($data)){
                        $this->ajaxReturn(0,"发送评论或建议成功",1);
                     }else{
                         $this->ajaxReturn(0,"提交失败",0);
                     }
                }else{
                    $this->ajaxReturn(0,$Evaluate->getError(),0);
                }
            }else{
                $this->ajaxReturn(0,"异常操作",0);
            }
        }else{
            $this->ajaxReturn(0,"异常操作",0);
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
