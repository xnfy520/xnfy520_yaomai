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
    <?php if(!empty($newest_buy)): ?><div id="mid-new">
            <ul>
                <li id="new">
                    <?php if(is_array($newest_buy)): $i = 0; $__LIST__ = $newest_buy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_b): $mod = ($i % 2 );++$i;?><div><a href="__APP__/<?php echo ($vo_b["commodity_url"]); ?>/details/id/<?php echo ($vo_b["commodity_id"]); ?>"><?php echo ($vo_b["username"]); ?>买了<?php echo (($vo_b["commodity_quantity"])?($vo_b["commodity_quantity"]):"1"); ?>件<?php echo ($vo_b["commodity_name"]); ?> <?php echo ($vo_b["times"]); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
                <li id="close"><a href="javascript:void(0);"><img src="../Public/image/3.png" width="9" height="9" /></a></li>
            </ul>
        </div><?php endif; ?>

<div style="clear: both;height: 38px;line-height: 38px;width: 978px;margin: 13px auto 0 auto;" id="dd-bz-title">
<a href="__APP__/Index">首页</a> 
<?php if(!empty($ccname)): ?>&nbsp;>> <span style="color:#666;"><a href="__APP__/Commodity/index/pid/<?php echo ($ccname["id"]); ?>"><?php echo ($ccname["name"]); ?></a></span><?php endif; ?>
<?php if(!empty($csname)): ?>&nbsp;>> <span style="color:#666;"><a href="__APP__/Commodity/index/pid/<?php echo ($ccname["id"]); ?>"><?php echo ($csname["name"]); ?></a></span><?php endif; ?>
</div>
<?php if(empty($list)): ?><div style="clear: both;height: 38px;line-height: 38px;width: 978px;margin: 13px auto 0 auto;">无商品</div>
<?php else: ?>
    <div id="dd-sf">
            <span style="float:left">商品排序：</span>
            <a class="dd-sf-mr <?php if(($_GET['sort']) == "sales_volume"): if(($_GET['by']) == "asc"): ?>arrow-down2<?php else: ?>arrow-up2<?php endif; endif; ?>" href="?<?php if(!empty($_GET['page'])): ?>&page=<?php echo ($_GET['page']); endif; ?>&sort=sales_volume&by=<?php if(($_GET['by']) == "desc"): ?>asc<?php else: ?>desc<?php endif; ?>">销量</a>

            <a class="dd-sf-mr dd-sf-border-lr <?php if(($_GET['sort']) == "price"): if(($_GET['by']) == "asc"): ?>arrow-down2<?php else: ?>arrow-up2<?php endif; endif; ?>" href="?<?php if(!empty($_GET['page'])): ?>&page=<?php echo ($_GET['page']); endif; ?>&sort=price&by=<?php if(($_GET['by']) == "desc"): ?>asc<?php else: ?>desc<?php endif; ?>">价格</a>

            <a class="dd-sf-mr <?php if(!in_array(($_GET['sort']), explode(',',"sales_volume,price,news"))): ?>arrow-up2<?php endif; if(($_GET['sort']) == "news"): if(($_GET['by']) == "asc"): ?>arrow-down2<?php else: ?>arrow-up2<?php endif; endif; ?>" href="?<?php if(!empty($_GET['page'])): ?>&page=<?php echo ($_GET['page']); endif; ?>&sort=news&by=<?php if(($_GET['by']) == "desc"): ?>asc<?php else: ?>desc<?php endif; ?>">最新</a>
            <div id="dd-fy">
            
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>共<span><?php echo ($fpage["total"]); ?></span>个商品<span><?php echo ($fpage["current"]); ?></span></td>
                    <td>
                        <?php if(empty($fpage["prev"]["page"])): ?><a href="javascript:;" class="dd-fy-prev"></a>
                        <?php else: ?>
                            <a href="?page=<?php echo ($fpage["prev"]["page"]); ?>" class="dd-fy-prev"></a><?php endif; ?>
                    </td>
                    <td>
                        <?php if(empty($fpage["next"]["page"])): ?><a href="javascript:;" class="dd-fy-next"></a>
                        <?php else: ?>
                            <a href="?page=<?php echo ($fpage["next"]["page"]); ?>" class="dd-fy-next"></a><?php endif; ?>
                    </td>
                  </tr>
                </table>
            </div>
    </div>
    
    <div id="dd-sf-picList">
        <div>
            <ul>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_list): $mod = ($i % 2 );++$i;?><li>
                        <a href="__APP__/Commodity/details/id/<?php echo ($vo_list["id"]); ?>">
                            <img style="width:210px;height:131px" src="__PUBLIC__/Content/CommodityList/thumb_<?php echo ($vo_list["image"]); ?>" />
                            <div>
                                <?php if((mb_strlen($vo_list["name"],'utf-8')) > "15"): ?><span title="<?php echo ($vo_list["name"]); ?>"><?php echo (mb_substr($vo_list["name"],0,15,"utf-8")); ?>...</span>
                                <?php else: ?>
                                    <span><?php echo ($vo_list["name"]); ?></span><?php endif; ?>
                            </div>
                            <div><strong>&#165; <?php echo ($vo_list["price"]); ?></strong></div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

    <div id="dd-page-num" align="right">
        <?php if(is_array($fpage["list"])): $i = 0; $__LIST__ = $fpage["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_flist): $mod = ($i % 2 );++$i;?><a href="?page=<?php echo ($vo_flist["page"]); ?>" style="margin-right:3px"><?php echo ($vo_flist["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        共<?php echo ($fpage["tpage"]); ?>页 到第<input type="text" name="jump_page" /><input type="submit" id="jump_page" value="确定" />
    </div><?php endif; ?>
<script>
    $(function(){
        if(define_page==''){
            $("#dd-page-num a:first").css("background","#95D0DE").css("color","black");
        }
        
        $("#dd-page-num a").each(function(){
            var a = $(this);
            var str = new RegExp("page="+define_page);
            if(define_page && str.test(a.attr('href'))){
                $(this).css("background","#95D0DE").css("color","black");
            }
        });

        $("#jump_page").click(function(){
            var page = $("[name=jump_page]").val();
            
            if(!isNaN(page) && page!='' && page>0){
                window.location=define_action_url+((define_pid)?'/pid/'+define_pid:'')+((define_cid)?'/cid/'+define_cid:'')+'?page='+page;
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