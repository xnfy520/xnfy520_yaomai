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

<script>
  function lxfEndtime(){
      $(".lxftime").each(function(){
        var lxfday=$(this).attr("lxfday");//用来判断是否显示天数的变量
        var endtime = $(this).attr("endtime");//取结束日期(毫秒值)

        var nowtime = new Date().getTime();        //今天的日期(毫秒值)
        var youtime = endtime-nowtime;//还有多久(毫秒值)
        var seconds = youtime/1000;
        var minutes = Math.floor(seconds/60);
        var hours = Math.floor(minutes/60);
        var days = Math.floor(hours/24);
        var CDay= days ;
        var CHour= hours % 24;
        var CMinute= minutes % 60;
        var CSecond= Math.floor(seconds%60);//"%"是取余运算，可以理解为60进一后取余数，然后只要余数。
        if(endtime<=nowtime){
                $(this).html("已结束")//如果结束日期小于当前日期就提示过期啦
                }else{
                        if($(this).attr("lxfday")=="no"){
                                $(this).html("预售中：<span>"+CHour+"</span>时<span>"+CMinute+"</span>分<span>"+CSecond+"</span>秒");          //输出没有天数的数据
                                }else{
            //    $(this).html("<span>"+days+"</span>天<span>"+CHour+"</span>时<span>"+CMinute+"</span>分<span>"+CSecond+"</span>秒");          //输出有天数的数据
                $(this).html("<span>"+days+"</span>天<span>"+CHour+"</span>时<span>");          //输出有天数的数据
                        }
                }
      });
   setTimeout("lxfEndtime()",1000);
  };
$(function(){
      lxfEndtime();
   });
</script>
<div class="mid-xq">
    	<ul>
          <li class="xq-weizhi">首页 >> <span style="color:#666;">个人中心</span> >> <span style="color:#666;">投票订单</span></li>
                        <li class="xq-grzx" style="height:auto;">
            	<div>
                	<ul id="check_menu_now">
						<li class="grzx"><a>个人中心</a></li>
                        <li><a class="xq-nemu1 xq-bac1">订单中心</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/commodityOrder">商品订单</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/grouponOrder">团购订单</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/votesOrder">投票订单</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/voteOrder">预定订单</a></li>
                        <li><a  class="xq-nemu1 xq-bac2">个人账户</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Cart">我的购物车</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/coupon">我的优惠劵</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/information">我的资料</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/address">收货地址</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/password">密码修改</a></li>
                        <li><a  class="xq-nemu1 xq-bac3">客户服务</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/message">消息提醒</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/production_tracking">生产跟踪</a></li>
                        <li><a  class="xq-nemu" href="__APP__/Member/suggest">网站评价建议</a></li>
                    </ul>
                </div>
            </li>
            <script>
                $(function(){
                    if(define_module_name=='Member'){
                        var regx = new RegExp(define_action_name);
                        $("#check_menu_now li a").each(function(){
                            var self = $(this);
                            if(regx.test(self.attr("href"))){
                                $("#check_menu_now li a").removeClass('xq-now');
                                self.addClass('xq-now');
                            }
                        });
                    }
                });
            </script>

            <li class="xq-dingpiao">

            	<div class="wdyd">
                	投票订单
                </div>
                
                <?php if(empty($orders)): ?><div>无内容</di>

                <?php else: ?>
                    
                    <div class="wd">

                        <div class="ding">
                            <ul>
                                <li class="ding1">订单号</li>
                                <li class="ding2">产品图片名称</li>
                                <li class="ding3">投票</li>
                                <li class="ding4">预订人数</li>
                                <li class="ding5">倒计时</li>
                                <li class="ding6">状态</li>
                                <li class="ding7">操作</li>
                            </ul>
                        </div>

                        <div class="de-yuding">
                            <?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_o): $mod = ($i % 2 );++$i;?><div class="de1">
                                    <ul>
                                        <li class="de2"><?php echo ($vo_o["out_trade_no"]); ?></li>
                                        <li class="de3">
                                        <a href="__APP__/Vote/details/id/<?php echo ($vo_o["commodity"]["id"]); ?>">
                                            <img src="__PUBLIC__/Content/VoteCommodity/thumb_<?php echo ($vo_o["commodity"]["image"]); ?>" width="75" height="49" />
                                        </a>
                                        </li>
                                        <li class="de4"><a href="__APP__/Vote/details/id/<?php echo ($vo_o["commodity"]["id"]); ?>"><?php echo ($vo_o["commodity"]["name"]); ?></a></li>
                                        <li class="de5"><?php echo ($vo_o["commodity"]["vote"]); ?></li>
                                        <li class="de6"><?php echo ($vo_o["commodity"]["subscribe_volume"]); ?>/<?php echo ($vo_o["commodity"]["subscribe"]); ?></li>
                                        <li class="de7 lxftime" endtime="<?php echo ($vo_o['commodity']['expiration_date']*1000); ?>"></li>
                                        <li class="de8">
                                            <?php if(($vo_o["pay_type"]) != "0"): if(($vo_o["abolish"]) == "1"): ?>已取消预定
                                                <?php else: ?>
                                                    已预定<?php endif; ?>
                                            <?php else: ?>
                                                未预订<?php endif; ?>
                                        </li>
                                        <li class="de9">
                                          <?php switch($vo_o["order_status"]): case "0": ?>-<?php break;?>
                                            <?php case "1": ?><a href="__APP__/Vote/schedule/id/<?php echo ($vo_o["commodity"]["id"]); ?>" >支付订金</a><?php break;?>
                                            <?php case "2": ?><a class="cancel_yuding" subscribe_volume="<?php echo ($vo_o["commodity"]["subscribe_volume"]); ?>" subscribe="<?php echo ($vo_o["commodity"]["subscribe"]); ?>" endtime="<?php echo ($vo_o['commodity']['expiration_date']*1000); ?>" commodity_id="<?php echo ($vo_o["commodity"]["id"]); ?>" order_id="<?php echo ($vo_o["id"]); ?>" href="javascript:;">取消预订</a><?php break;?>
                                            <?php case "3": ?><a href="javascript:;" order_id="<?php echo ($vo_o["id"]); ?>" class="add_to_cart">加入购物车</a><?php break;?>
                                            <?php default: ?>
                                            --<?php endswitch;?>
                                          

                                        </li>
                                        
                                    </ul>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>

                        
                        <div class="fanye">
                      <ul>
                          <li style="width:390px; text-align:right">总计 <?php echo ($fpage["total"]); ?> 条记录</li>
                            <li>共 <span class="se1"><?php echo ($fpage["tpage"]); ?></span> 页</li>
                            <li>
                              <?php if(($fpage["header"]["page"]) == "0"): ?><a>« 第一页</a>
                              <?php else: ?>
                                  <a class="se2" href="__APP__/Member/voteOrder/page/<?php echo ($fpage["header"]["page"]); ?>">« 第一页</a><?php endif; ?>
                            </li>
                            <li>
                              <?php if(($fpage["prev"]["page"]) == "0"): ?><a>‹上一页</a>
                              <?php else: ?>
                                  <a class="se2" href="__APP__/Member/voteOrder/page/<?php echo ($fpage["prev"]["page"]); ?>">‹上一页</a><?php endif; ?>
                            </li>
                            <li>
                              <?php if(($fpage["next"]["page"]) == "0"): ?><a>下一页›</a>
                              <?php else: ?>
                                  <a class="se2" href="__APP__/Member/voteOrder/page/<?php echo ($fpage["next"]["page"]); ?>">下一页›</a><?php endif; ?>
                            </li>
                            <li>
                              <?php if(($fpage["footer"]["page"]) == "0"): ?><a>最末页 »</a>
                              <?php else: ?>
                                    <a class="se2" href="__APP__/Member/voteOrder/page/<?php echo ($fpage["footer"]["page"]); ?>">最末页 »</a><?php endif; ?>
                            </li>
                            <li class="op"><select id="change_page">
                              <?php if(is_array($fpage["list"])): $i = 0; $__LIST__ = $fpage["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_flist): $mod = ($i % 2 );++$i; if(($vo_flist["page"]) == $_GET['page']): ?><option value="<?php echo ($vo_flist["page"]); ?>" selected="selected"><?php echo ($vo_flist["page"]); ?></option>
                                <?php else: ?>
                                  <option value="<?php echo ($vo_flist["page"]); ?>"><?php echo ($vo_flist["page"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                          </select></li>
                        </ul>
                    </div>
                
              </div><?php endif; ?>

            </li>
        </ul>
    </div>

    <script>
    $(function(){
        $("#change_page").change(function(){
          window.location = define_action_url+'/page/'+$(this).val();
        });
    });
    </script>
      <script>
    $(function(){
      $(".cancel_yuding").click(function(){
          var id = $(this).attr('order_id');
          var commodity_id = $(this).attr('commodity_id');
          var subscribe_volume = $(this).attr('subscribe_volume');
          var subscribe = $(this).attr('subscribe');
          var times = $(this).attr('endtime');
          var d = new Date;
          if(parseInt(times)<=d.getTime()){
            jBox.tip('此投票商品已经结束,不能取消定单1', 'success',{ timeout: 2000,closed: function () {  }});
            return;
          }
          if(parseInt(subscribe_volume)>=parseInt(subscribe)){
            jBox.tip('此投票商品已经开始生产,不能取消定单2', 'success',{ timeout: 2000,closed: function () {  }});
            return;
          }

        var submit = function (v, h, f) {
          if (v == 'ok'){

              jBox.tip("正在处理...", 'loading');
                window.setTimeout(function () {
                    $.ajax({
                        url: define_app_url+'/Member/cancelVoteOrder',
                        data:{order_id:id,commodity_id:commodity_id},
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                    window.location.reload();
                                 }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { }});
                            }
                        }
                    });
                },500);

          }
          return true; //close
      };

      if(define_userid){
          jBox.confirm("确认取消此预订商品?", "提示", submit,{top: '40%'});
      }else{
          jBox.tip('您还没有登录，请登录后再购买', 'success',{ timeout: 2000,closed: function () {  }});
      }

      });


        $(".add_to_cart").live('click',function(){
            if(!define_userid){
                jBox.tip('您还没有登录，请登录后再购买', 'success',{ timeout: 2000,closed: function () {  }});
                return false;
            }
           var order_id = $(this).attr('order_id');
           jBox.tip("正在处理...", 'loading');
              window.setTimeout(function () {
                  $.ajax({
                      url: define_app_url+'/Member/addVoteTOCart',
                      data:{order_id:order_id},
                      type:'POST',
                      success: function(data){
                          var msg = JSON.parse(data);
                          if(msg.status==1){
                            $("#header_carts").text(msg.data);
                              jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                
                               }});
                          }else{
                              jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { }});
                          }
                      }
                  });
              },500);
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