<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (C("site_name")); ?></title>
<meta name="keywords" content="<?php echo (C("site_keywords")); ?>" />
<meta name="description" content="<?php echo (C("site_description")); ?>" />
<meta property="qc:admins" content="146042743433006375" />
<link rel="stylesheet" type="text/css" href="../Public/css/style.css" />
<link rel="stylesheet" type="text/css" href="../Public/css/xj.css" />
<link rel="stylesheet" type="text/css" href="../Public/css/dd-fy.css" />
<link rel="stylesheet" type="text/css" href="../Public/css/xm.css" />
<script src="__PUBLIC__/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script type="text/javascript"
src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="<?php echo (C("conf3")); ?>" data-redirecturi="<?php echo (C("conf5")); ?>" charset="utf-8"></script>
<title></title>
<style>
.ui-autocomplete{
    width:338px !important;
    z-index: 99999 !important;
}
</style>
</head>

<body>
<div id="xj-box">
    <ul>
        <li id="xj-cel">
            <a >在线客服</a>
        </li>
        <li id="xj-der">
          <div id="xj-der1">
            <ul>
                <li id="xj-1"><img src="../Public/image/25.png" width="22" height="33" /></li>
                <li id="xj-2">在线客服</li>
            </ul>
          </div>
          <div class="xj-der2">客服工作时间</div>
          <div class="xj-der4" style="height:auto;"><?php echo (C("conf1")); ?></div>
          <!-- <div class="xj-der4">9:00 - 23:00</div> -->
          <?php if(!empty($kf)): ?><div class="xj-der2">客服团队</div>
              <?php if(is_array($kf)): $i = 0; $__LIST__ = $kf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_kf): $mod = ($i % 2 );++$i;?><div class="xj-der5"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($vo_kf["qq"]); ?>&site=qq&menu=yes"><?php echo ($vo_kf["name"]); ?></a></div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
          <div id="xj-der6"><a href="#">返回顶部</a></div> 
        </li>
    </ul>
</div>
<div id="top">
  <div id="top-hy">
        <ul>
            <li class="top1"><?php echo (C("welcome_words")); ?></li>
            <li class="top2">&nbsp;</li>
            <li class="top3"><a href="#">设为首页</a></li>
            <li class="top4"><a href="#">加入收藏</a></li>
            <li class="top5">您好！</li>
            <?php if(empty($Userinfo)): ?><li class="top6"><a href="__APP__/Index/login">请登录</a></li>
                <li class="top7"><a href="__APP__/Member">个人中心</a></li>
                <li class="top8"><a href="__APP__/Index/login">免费注册</a></li>
                <li class="top9"><a href="javascript:;" class="qq-weibo-login"><img src="../Public/image/1.png" width="16" height="17" /></a></li>
            <?php else: ?>
                <li><a href="__APP__/Member"><?php echo ($Userinfo["username"]); ?></a></li>
                <li class="top7"><a href="__APP__/Member">个人中心</a></li>
                <li class="top8"><a style="cursor:pointer" id="login_out">退出</a></li><?php endif; ?>
        </ul>
    </div>
</div>

<div id="box">
<span style="display: block;" id="qqLoginBtn"></span>
<script type="text/javascript">
    $(function(){
        $(".qq-weibo-login").live("click",function(){
                QC.Login.showPopup({
                   appId:"100444882",
                   redirectURI:"http://dzlc300.com/Index/qc_back"
                });
        });
//QC.Login.signOut();
    //     if(QC.Login.check()){
    //         console.log(QC.Login.check());
    //     }else{
    //         console.log(QC.Login.check());
    //     }
    // //    QC.Login.signOut();
    //     QC.Login({
    //         btnId:"qqLoginBtn"  //插入按钮的节点id
    //     },function(oInfo, oOpts){
    //         console.log(oInfo);
    //         QC.Login.getMe(function(openId, accessToken){
    //             console.log('getMe');
    //             console.log(openId);
    //             console.log(accessToken);
    //         })
    //         //     alert(oInfo.nickname);  //昵称
    //         //     QC.Login.getMe(function(openId, accessToken){
    //         //         alert(openId+'--'+accessToken);
    //         //     });
    //     //    getQQuserinfo(oInfo);
    //     },function(opts){
    //         //   alert('QQ登录 注销成功');
    //     });

        function getQQuserinfo(oInfo){
            $.ajax({
                url: define_app_url+'/Index/get_qq_userinfo',
                data:{datas:JSON.stringify(oInfo)},
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        console.log(msg);
                     //   setTimeout(function(){window.location=define_app_url+'/Member/qq_connect.html'},500);
                    }else{
                        console.log(msg);
                        //   jBox.tip(msg.info, 'error',{ timeout: 1000})
                    }
                }
            });
        }

    });
</script>
    <div id="mid-logo">
        <ul>
            <li id="logo"><a href="__APP__/Index"><img src="../Public/image/2.png" width="250" height="66" /></a></li>
            <li id="shousuo">
                <div id="ip">
                    <form action="javascript:;" method="get" name="search_all_product" id="search_all_product">
                        <ul>
                            <li id="shuru">
                                <input name="search_key" id="search_key" maxlength="30" type="text" placeholder='请输入您想要查找的关键字' />
                            </li>
                            <li id="shuru1"><input type="image" src="../Public/image/3.jpg" /></li>
                        </ul>
                    </form>
                </div>
            </li>
            <li id="lianxi"><img src="../Public/image/4.jpg" width="181" height="46" /></li>
        </ul>
    </div>
    
    <div id="mid-menu">
        <ul>
            <li><a style="padding: 10px 15px;" href="__APP__/Index">首页</a></li>
            <li><a style="padding: 10px 15px;" href="__APP__/About">关于我们</a></li>
            <?php if(is_array($ccs)): $i = 0; $__LIST__ = $ccs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_ccs): $mod = ($i % 2 );++$i;?><li><a class="normalMenu" href="__APP__/Commodity/index/pid/<?php echo ($vo_ccs["id"]); ?>"><?php echo ($vo_ccs["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <li><a style="padding: 10px 15px;" href="__APP__/Groupon">团购</a></li>
            <li><a style="padding: 10px 15px;" href="__APP__/Vote">最新投票产品</a></li>
            <li class="car"><div>购物车：&nbsp;<span id="header_carts"><?php echo (($Cart_counts)?($Cart_counts):"0"); ?></span>&nbsp;件</div></li>
            <li class="shop"><div><a href="__APP__/Cart">去结算</a></div></li>
        </ul>

        <?php if(is_array($ccs)): $i = 0; $__LIST__ = $ccs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_ccs): $mod = ($i % 2 );++$i;?><div class="downMenu" style="display:none;z-index:999">
            <ul>
                <li class="downMenu-left-k">
                    <div class="downMenu-title"><?php echo ($vo_ccs["name"]); ?> 类型</div>
                    <div class="downMenu-left">
                        <ul>
                            <?php if(is_array($vo_ccs["CommoditySubclass"])): $i = 0; $__LIST__ = $vo_ccs["CommoditySubclass"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_css_cs): $mod = ($i % 2 );++$i;?><li><a href="__APP__/Commodity/index/pid/<?php echo ($vo_css_cs["pid"]); ?>/cid/<?php echo ($vo_css_cs["id"]); ?>"> <?php echo ($vo_css_cs["name"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="downMenu-bottom">
                <a href="__APP__/Commodity/index/pid/<?php echo ($vo_ccs["id"]); ?>">查看所有 <?php echo ($vo_ccs["name"]); ?></a><span> »</span>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
  </div>
    <?php if(!empty($sas)): ?><div id="mid-new">
            <ul>
                <li id="new">
                    <?php if(is_array($sas)): $i = 0; $__LIST__ = $sas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_b): $mod = ($i % 2 );++$i;?><div><a <?php if(!empty($vo_b["link"])): ?>target="_blank" href="<?php echo ($vo_b["link"]); ?>"<?php endif; ?>  >
                            <?php if(!empty($vo_b["description"])): echo ($vo_b["description"]); ?>
                            <?php else: ?>
                                <?php echo ($vo_b["name"]); endif; ?>
                        </a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
                <li id="close"><a href="javascript:void(0);"><img src="../Public/image/3.png" width="9" height="9" /></a></li>
            </ul>
        </div><?php endif; ?>
    <?php if(!empty($newest_buy)): ?><div id="mid-new">
            <ul>
                <li id="new">
                    <?php if(is_array($newest_buy)): $i = 0; $__LIST__ = $newest_buy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_b): $mod = ($i % 2 );++$i;?><div><a href="__APP__/<?php echo ($vo_b["commodity_url"]); ?>/details/id/<?php echo ($vo_b["commodity_id"]); ?>"><?php echo ($vo_b["username"]); ?>买了<?php echo (($vo_b["commodity_quantity"])?($vo_b["commodity_quantity"]):"1"); ?>件<?php echo ($vo_b["commodity_name"]); ?> <?php echo ($vo_b["times"]); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
                <li id="close"><a href="javascript:void(0);"><img src="../Public/image/3.png" width="9" height="9" /></a></li>
            </ul>
        </div><?php endif; ?>

<div class="xm-xq">
    	<div class="xm-weizhi">首页 >> <span style="color:#666;">登陆注册</span></div>

        <div id="xm-denglu">
        	<ul>
           	  <li id="xm-dl-left">
                <form action="javascript:;" name="login_check" id="login_check">
                	<div id="xm-dl-left1">用户登录</div>
                    <div id="xm-dl-left2">账号登录</div>
                	<div class="xm-dl-left3">账&nbsp;&nbsp;号：<input type="text" name="login_name" /></div>
                    <div class="xm-dl-left3">密&nbsp;&nbsp;码：<input type="password" name="password" /></div>
                    <div id="xm-dl-left4">
                    	<ul>
                        	<li><input type="checkbox" name="remember_me" /></li>
                            <li id="xm-jizhu">记住登录账号</li>
                        </ul>
                    </div>
                	<div id="xm-dl-left5">
                    	<ul>
                        	<li><input type="image" src="../Public/image/12.jpg" width="102" height="37" /></li>
                            <li id="xm-jz"><a href="__APP__/Index/forgot_password">忘记密码?</a></li>
                        </ul>
                    </div>
                    <div id="xm-dl-left7">&nbsp;</div>
                    <div id="xm-zh">使用合作网站账号登录要买家具：</div>
                    <div id="xm-zuo">
                    	<ul>
                            <li id="xm-qq"><a href="javascript:;" class="qq-weibo-login">腾讯QQ</a></li>
                        </ul>
                    </div>
                </form>
              </li>
                
                <li id="xm-dl-line"></li>
                
              	<li id="xm-dl-right">
                    <form action="javascript:;" name="signup_check" id="signup_check">
                    	<div id="xm-dl-right1">注册新用户</div>
                        <div class="xm-dl-right2">
                        	<ul>
                                <li class="xm-dl-right3"><span>*</span> 账&nbsp;&nbsp;&nbsp;&nbsp;号：</li>
                                <li class="xm-dl-right4"><input type="text" name="username" /></li>
                            </ul>
                        </div>
                        <div class="xm-dl-right2">
                        	<ul>
                                <li class="xm-dl-right3"><span>*</span> 电子邮箱：</li>
                                <li class="xm-dl-right4"><input type="text" name="email" /></li>
                            </ul>
                        </div>
                        <div class="xm-dl-right2">
                        	<ul>
                                <li class="xm-dl-right3"><span>*</span> 设置密码：</li>
                                <li class="xm-dl-right4"><input type="password" name="password" /></li>
                            </ul>
                        </div>
                        <div class="xm-dl-right2">
                        	<ul>
                                <li class="xm-dl-right3"><span>*</span> 确认密码：</li>
                                <li class="xm-dl-right4"><input type="password" name="repassword" /></li>
                            </ul>
                        </div>
                        <div class="xm-dl-right2">
                        	<ul>
                                <li class="xm-dl-right3"><span>*</span> 验&nbsp;证&nbsp;码：</li>
                                <li class="xm-dl-right5"><input type="text" id="insertcode" name="verify" maxlength="4" style="position: absolute;" />
                                    <img style="height:30px;margin-left:105px" id="click_captcha" src="__APP__/Public/verify" />
                                </li>
                            </ul>
                        </div>
                        <div id="xm-wyyd1">
                        	<ul>
                                <li><input type="checkbox" name="treaty" checked="checked" /></li>
                                <li>&nbsp;<span>我已阅读并同意</span><a href="__APP__/SupportCenter/index/id/96">《要买家具用户注册协议》</a></li>
                            </ul>
                        </div>
                        <div id="xm-tongy"><input type="image" src="../Public/image/29.jpg" width="140" height="37" /></div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
   <script>
   $(function(){
                //AJAX登录验证
    $("[name=login_check]").live('submit',function(){
        $("[name=login_check]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        var login_name = $("#login_check [name=login_name]");
        var password = $("#login_check [name=password]");
        if(login_name.val().length<6){
            jBox.tip("帐号有误", 'error',{ timeout: 1000,closed: function () { $("[name=login_check]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(password.val().length<6 || password.val().length>12){
            jBox.tip("密码不能小于6位，大于12位", 'error',{ timeout: 1000,closed: function () { $("[name=login_check]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else{
                jBox.tip("处理中...", 'loading');
                window.setTimeout(function (){
                    $("[name=login_check]").find("[type=submit]").removeAttr('disabled');
                    $.ajax({
                        url: define_app_url+'/Member/ajax_login_check',
                        data: data,
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=msg.data }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () {password.val('');verify.val('');$("[name=login_check]").find("[type=submit]").removeAttr('disabled');$("#click_captcha").trigger('click'); }});
                            }
                        }
                    });
                },500);
            }
    });

        //AJAX注册验证
    $("[name=signup_check]").live('submit',function(){
        $("[name=signup_check]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        var username = $("#signup_check [name=username]");
        var password = $("#signup_check [name=password]");
        var repassword = $("#signup_check [name=repassword]");
        var email = $("#signup_check [name=email]");
        var verify = $("#signup_check [name=verify]");
        var treaty = $("#signup_check [name=treaty]");
        if(username.val().length<6 || username.val().length>12){
            jBox.tip("帐号不能小于6位，大于12位", 'error',{ timeout: 1000,closed: function () { $("[name=signup_check]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(!/^[a-zA-Z0-9_]{6,20}$/.test(username.val())){
            jBox.tip("帐号不能包含符号", 'error',{ timeout: 1000,closed: function () { $("[name=signup_check]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(password.val().length<6 || password.val().length>12){
            jBox.tip("密码不能小于6位，大于12位", 'error',{ timeout: 1000,closed: function () { $("[name=signup_check]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(password.val()!=repassword.val()){
            jBox.tip("两次输入密码不一致", 'error',{ timeout: 1000,closed: function () { $("[name=signup_check]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(!/^[\w\d\-\.]+@[\w\d\-\.]+\.[\w]+$/.test(email.val())){
            jBox.tip("邮件格式不正确", 'error',{ timeout: 1000,closed: function () { $("[name=signup_check]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(verify.val().length<4){
            jBox.tip("请输入四位数字验证码", 'error',{ timeout: 1000,closed: function () { $("[name=signup_check]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(isNaN(verify.val())){
            jBox.tip("验证码必须是数字", 'error',{ timeout: 1000,closed: function () { $("[name=signup_check]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(treaty.attr("checked")!='checked'){
            jBox.tip("请先阅读注册协议", 'error',{ timeout: 1000,closed: function () { $("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else{
            jBox.tip("处理中...", 'loading');
            window.setTimeout(function () {
                $("[name=signup_check]").find("[type=submit]").removeAttr('disabled');
                $.ajax({
                    url: define_app_url+'/Member/ajax_signup_check',
                    data: data,
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=msg.data }});
                        }else{
                            jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=signup_check]").find("[type=submit]").removeAttr('disabled'); }});
                            $("#insertcode").val('');
                            $("#click_captcha").trigger('click');
                        }
                    }
                });
            },500);
        }
    });

   });
   </script>


 <div class="bottom-guanyu">
        <ul>
            <li class="guanyu1 bac1">
                <div class="guanyu2">关于我们</div>
                <div class="guabyu3">
                    <?php if(is_array($hcis)): $i = 0; $__LIST__ = $hcis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_hcis): $mod = ($i % 2 );++$i;?><a href="__APP__/About/index/id/<?php echo ($vo_hcis["id"]); ?>"><?php echo ($vo_hcis["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </li>
            <?php if(is_array($hccl)): $s = 0; $__LIST__ = $hccl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_hccl): $mod = ($s % 2 );++$s;?><li class="guanyu1 bac<?php echo ($s+1); ?>">
                    <div class="guanyu2"><?php echo ($vo_hccl["name"]); ?></div>
                    <div class="guabyu3"> 
                        <?php if(is_array($vo_hccl["HelpCenterInformation"])): $i = 0; $__LIST__ = $vo_hccl["HelpCenterInformation"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_hccl_hci): $mod = ($i % 2 );++$i;?><a href="__APP__/SupportCenter/index/id/<?php echo ($vo_hccl_hci["id"]); ?>"><?php echo ($vo_hccl_hci["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php if(!empty($a4)): ?><li class="guanyu1">
                  <div class="guanyu4">要买微信公众号</div>
                  <div class="guanyu5">
                  <?php if(empty($a4["link"])): ?><img src="__PUBLIC__/Content/AdvertList/<?php echo ($a4["image"]); ?>" width="100" height="100" />
                  <?php else: ?>
                    <a target="_blank" href=""><img src="__PUBLIC__/Content/AdvertList/<?php echo ($a4["image"]); ?>" width="100" height="100" /></a><?php endif; ?>
                  </div>
                  <div class="guanyu6">关注有惊喜，好礼马上到</div>
                </li><?php endif; ?>
        </ul>
    </div>
    <!--底部链接-->
    <div class="foot">
        <ul>
            <li class="foot1"><a href="__APP__/About">关于我们</a></li>
            <li class="foot1"><a href="__APP__/About/index/id/95">联系我们 </a></li>
            <li class="foot1"><a href="__APP__/SupportCenter">帮助中心</a></li>
            <li class="foot1"><a href="http://www.kuaidi100.com/" target="_blank">快递查询</a></li>
            <li class="foot2"><?php echo (C("site_name")); ?> <?php echo (C("site_copyright")); ?> <?php echo (C("site_filing")); ?></li>
        </ul>
    </div>
    <!--底部关于-->
</div></body>

<script src="../Public/script/script.js"></script>
<script src="../Public/script/xm.js"></script>

<div style="clear:both"></div>
<link type="text/css" rel="stylesheet" href="__PUBLIC__/js/jBox/Skins/GreyBlue/jbox.css"/>

<script type="text/javascript" src="__PUBLIC__/js/jBox/jquery.jBox-2.3.min.js"></script>

<link type="text/css" rel="stylesheet" href="__PUBLIC__/js/jqueryUi/jquery-ui.css"/>

<script type="text/javascript" src="__PUBLIC__/js/jqueryUi/jquery-ui.js"></script>

<script type="text/javascript" src="__PUBLIC__/js/jBox/i18n/jquery.jBox-zh-CN.js"></script>

<script type=text/javascript src="__PUBLIC__/js/My97DatePicker/WdatePicker.js"></script>


<script>

    var define_public_url = "__PUBLIC__";   //当前网站的公共目录
    var define_current_public_url = "../Public";    //当前项目的公共模板目录

    var define_root_url = "__ROOT__";  //当前网站的地址（不含域名）
    var define_app_url = "__APP__";    //前项目的URL地址（不含域名）
    var define_group_url = "__GROUP__";    //当前分组的URL地址（不含域名）
    var define_module_url = "__URL__";    //当前模块的URL地址（不含域名）
    var define_action_url = "__ACTION__";  //前操作的URL地址（不含域名）
    var define_self_url = '__SELF__';  //当前的页面URL

    var define_public_images_dir = "__PUBLIC__/images"; //公共目录下的图片目录
    var define_public_css_dir = "__PUBLIC__/css"; //公共目录下的CSS目录
    var define_public_js_dir= '__PUBLIC__/js'; //公共目录下的JS目录

    var define_current_images_dir = "../Public/images"; //当前项目下的图片目录
    var define_current_css_dir = "../Public/css"; //当前项目下的CSS目录
    var define_current_js_dir= '../Public/js'; //当前项目下的JS目录

    var define_group_name = "<?php echo (GROUP_NAME); ?>";  //当前分组名
    var define_module_name = "<?php echo (MODULE_NAME); ?>";   //当前模块名
    var define_action_name = "<?php echo (ACTION_NAME); ?>";   //当前操作名

    var define_fake_action_name = "<?php echo ($fake_action_name); ?>";

    var define_fake_action_value = "<?php echo ($define_fake_action_value); ?>";

    var definde_session_status = "<?php echo ($_SESSION['status']); ?>";

    var definde_session_userid = "<?php echo ($_SESSION['userid']); ?>";

    var define_page = "<?php echo ($_GET['page']); ?>";  //当前page值

    var define_pid = "<?php echo ($_GET['pid']); ?>";  //当前pid值

    var define_rid = "<?php echo ($_GET['rid']); ?>";  //当前rid值

    var define_sid = "<?php echo ($_GET['sid']); ?>";  //当前sid值

    var define_cid = "<?php echo ($_GET['cid']); ?>";  //当前cid值

    var define_id = "<?php echo ($_GET['id']); ?>";    //当前id值

    var define_category = "<?php echo ($_GET['category']); ?>";

    var define_where = "<?php echo ($_GET['where']); ?>";

    var define_price = "<?php echo ($_GET['price']); ?>";

    var define_sales = "<?php echo ($_GET['sales']); ?>";

    var define_search_key = "<?php echo ($_GET['search_key']); ?>";

    var define_userid = "<?php echo ($Userinfo["id"]); ?>";

    var favorites_type = "<?php echo ($_GET['type']); ?>";

    var define_search = "<?php echo ($_GET['search']); ?>";

    var define_when = "<?php echo ($_GET['when']); ?>";

    var defind_localhost = "<?php echo (C("LOCALHOST")); ?>";

</script>
<script type="text/javascript">
    $(function(){
        $("#login_out").click(function(){

            var submit = function (v, h, f) {
             //   jBox.tip("正在处理...", 'loading');
                if (v == 'ok'){
                        window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/Member/ajax_login_out',
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { if(define_module_name=='Member'){window.location=msg.data}else{window.location=define_self_url}  }});
                                }else{
                                    return false;
                                }
                            }
                        });
                    }
                ),500}
                return true; //close
            };
            jBox.confirm("确认退出？", "提示", submit,{top: '40%',opacity: 0.1});

        });
    });
</script>
<script type=text/javascript src="../Public/js/Common.js"></script>
<?php if((MODULE_NAME) == "Member"): ?><script type=text/javascript src="../Public/js/Member.js"></script><?php endif; ?>
<?php if((MODULE_NAME) == "Commodity"): ?><script type=text/javascript src="../Public/js/CommodityList.js"></script><?php endif; ?>
</body>
</html>