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
        <li id="xj-der" style="display:none">
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
            <li><a style="padding: 10px 15px;" href="__APP__/Vote">设计师产品投票区</a></li>
            <li class="car" style="margin-left: 99px;"><div><a href="__APP__/Cart">购物车：&nbsp;<span id="header_carts"><?php echo (($Cart_counts)?($Cart_counts):"0"); ?></span>&nbsp;件</a></div></li>
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


    <div id="dd-bz">
    	<div id="dd-bz-title">首页 >> <span style="color:#666;">我的购物车</span> >> <span style="color:#666;">确认订单信息</span></div>
        <div id="dd-tjddcg-bz3"><img src="../Public/image/27.png" /></div>
    </div>
    <form action="javascript:;" name="order_confirm" method="post">
<div id="xm-ddqr">
   	<div class="xm-ddqr1">收货信息</div>
        <div id="xm-ddqr2" class="new_address_insert" style="height:auto;">
              <div id="xm-xdz1">使用地址簿中的地址：</div>
              <?php if(is_array($my_addresss)): $i = 0; $__LIST__ = $my_addresss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_ad): $mod = ($i % 2 );++$i;?><div id="xm-xdz2" style="margin:0 0 10px">
                      <ul>
                          <li style="margin-right:10px;">
                            <input index="<?php echo ($i-1); ?>" dropin="<?php echo ($vo_ad["logistics"]["dropin"]); ?>" dropin_lowest_price="<?php echo ($vo_ad["logistics"]["dropin_lowest_price"]); ?>" dropin_average_price="<?php echo ($vo_ad["logistics"]["dropin_average_price"]); ?>" average_price="<?php echo ($vo_ad["logistics"]["average_price"]); ?>" name="use_address" type="radio" value="<?php echo ($vo_ad["id"]); ?>" />
                          </li>
                          <li>
                            <strong><?php echo ($vo_ad["consignee"]); ?></strong> 
                            地址：
                            <?php echo ($vo_ad["where_text"]); ?>
                            <!-- 邮编：<?php echo ($vo_ad["zip"]); ?> -->
                            <?php if(!empty($vo_ad["cellphone"])): ?>手机：<?php echo ($vo_ad["cellphone"]); endif; ?>
                            <?php if(!empty($vo_ad["phone"])): ?>电话：<?php echo ($vo_ad["phone"]); endif; ?>
                            <a href="javascript:;" class="delete_address">  [删除]</a>
                          </li>
                      </ul>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
    	<div class="xm-txxdz">
        	<ul>
            	<li class="xm-txxdz1"><span>*</span> 收货人姓名：</li>
                <li class="xm-txxdz2"><input name="consignee" type="text" /></li>
                <li class="xm-txxdz1"><span>*</span> 收货人地址：</li>
                <li class="xm-txxdz2">
                  <select name="information_province">
                        <option value="0">--请选择--</option>
                        <?php if(is_array($provice_level)): $i = 0; $__LIST__ = $provice_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_pl): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo_pl["id"]); ?>"><?php echo ($vo_pl["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                  <span id="information_city"></span>
                  <span id="information_county"></span>
                  <input type="hidden" name="where_id" />
                  <input type="hidden" name="where_text" />
                </li>
                <li class="xm-txxdz1"><span>*</span> 街道：</li>
                <li class="xm-txxdz2">
                  <input style="width:267px;" name="street" type="text" />
                </li>
                <!-- <li class="xm-txxdz1"><span>*</span> 邮编：</li>
                <li class="xm-txxdz2">
                  <input type="text" name="zip" />
                </li> -->
                <li class="xm-txxdz1"><span>*</span> 填写手机号：</li>
                <li class="xm-txxdz2">
                	<input type="text" name="cellphone" />
                   <span class="xm-mg10"> 座机（选填）：<input name="phone" type="text" /></span>
                </li>
                <li class="xm-txxdz3"><a href="javascript:;" id="add_address">确认收货地址</a></li>
            </ul>
      </div>
    <div class="xm-ddqr1">配送方式</div>
    <div class="xm-zffs" style="height:auto;">
    	<div class="xm-zffs1" style="width:auto;height:auto">
             <ul>
                <li><input name="delivery" type="radio" value="2" /></li>
                <li class="xm-mg10">送货上门安装</li>
                <li id="delivery_status1" style="clear:both;float:none;">（送货上门费用包含货物由当地提货点至用户家最近停车点，停车点至楼梯口/电梯口/门口40米以内的免费平移，非电梯楼7层以内的免费搬楼，以及安装服务，超出部分由配送员另收现金，参考价格为超出的平移距离20元每20米每立方，超出的楼层20元每层每立方；）</li>
                <li id="delivery_status2" style="color:red;clear:both;float:none;display:none">该地区暂不支持送货上门，需要当地第三方配送服务商联系方式请联系客服</li>
             </ul>
        </div>

        <div class="xm-zffs1">
             <ul>
                <li><input name="delivery" type="radio" value="1" checked="checked" /></li>
                <li class="xm-mg10">提货点自提（用户到相应提货点自提安装）</li>
             </ul>
        </div>
        <div class="xm-zffs1" style="height:auto;width:auto;line-height:20px">
        	物流费用：&#165;<span class="logistics">0.00</span> <span class="logistics_text"></span>
        </div>
        <div class="xm-zffs1">
        	要求到货时间<input class="Wdate" readonly="readonly" name="ask_for_date" style="width:100px" type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:'%y-%M-{%d+3}',onpicked:function(){ },oncleared:function(){}})" />以后
        </div>
        <div class="xm-zffs1">
        	有其他时间要求请与客服联系
        </div>
        <div class="xm-zffs1">
          <a href="__APP__/SupportCenter/index/id/88">请阅读物流详细介绍</a>
        </div>
<!--         <div class="xm-txxdz3"><a href="#">确认配送方式</a></div> -->
    </div>
    
    <div class="xm-ddqr1">支付方式</div>
    <div class="xm-psfs3" style="height:auto;">
        	<ul>
            	<li class="xm-psfs2" style="display:none">
                	<div>
                    	<ul>
                        	<li><input name="payment_model" type="radio" value="3" /></li>
                            <li class="xm-mg10">货到付款</li>
                        </ul>
                    </div>
                </li>
                <li class="xm-psfs1" style="display:none">快递可付现金、刷卡；</li>
                <li class="xm-psfs2" style="display:none">
               		 <div>
                    	<ul>
                        	<li><input name="payment_model" type="radio" value="2" /></li>
                            <li class="xm-mg10">银行电汇</li>
                           
                        </ul>
                    </div>
                </li>
                <li class="xm-psfs1" style="display:none">通过银行转账或现金直接存入指定帐号，需注明订单号。</li>
                <li class="xm-psfs2" style="width:auto">
               		 <div>
                  <label>
                    	<ul>
                        	<li><input name="payment_model" checked="checked" type="radio" value="1" style="display:none" /></li>
                          <li class="xm-mg10">通过网上银行或支付平台在线付款</li>
                        </ul>
                  </label>
                    </div>
                </li>                
                <li class="xm-psfs1">
                <!-- 通过网上银行或支付平台在线付款 -->
                  <ul style="margin-top:5px;display:none;margin-left:65px" id="child-payment">
                    <li style="clear:both;position:relative;top:-5px">
                      <label><input type="radio" name="payment" value="1" checked="checked" /> 支付宝支付</label>
                    </li>
                    <li style="clear:both;margin-top:5px">
                      <label><input type="radio" name="payment" value="2" /> 网上银行支付</label>
                    </li>
                  </ul>
                </li>
            </ul>
      </div>
      </form>
      <script type="text/javascript">
        $(function(){
          if($("[name=payment_model]:checked").val()==1){
            $("#child-payment").show();
          }
          $("[name=payment_model]").change(function(){
            if($(this).val()==1){
              $("#child-payment").show();
            }else{
              $("#child-payment").hide();
            }
          });
        });
      </script>
<!--        <div class="xm-ddqr1">发票信息</div>
       <div class="xm-fpxn" style="height:auto;">
        	<ul>
            	<li class="xm-txxdz1"><span>*</span> 发票类型：</li>
                <li class="xm-txxdz2">
                	<select name="invoice_type">
                  		<option value="商业零售发票">商业零售发票</option>
                	</select>
                 </li>
                <li class="xm-txxdz1"><span>*</span> 发票抬头：</li>
                <li class="xm-txxdz2">
                    <select name="invoice_rise">>
                      <option value="个人">个人</option>
                    </select>
                    <input name="invoice_info" class="xm-mg10" type="text" />
                </li>
            </ul>
      </div> -->
      
      <div class="xm-ddqr1" style="margin-top:10px">
      	<ul>
        	<li>商品清单</li>
          <li class="xm-fhxg"><a href="__APP__/Cart">返回购物车修改</a></li>
        </ul>
      </div>
    <div id="xm-spqd1">
      	<ul>
        	<li class="xm-spqd2" style="width:550px">商品</li>
            <li class="xm-spqd4">价格</li>
            <li class="xm-spqd5">购买数量</li>
            <li class="xm-spqd6">商品总价</li>
        </ul>
      </div>

      <?php if(is_array($Cartslist)): $i = 0; $__LIST__ = $Cartslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_cl): $mod = ($i % 2 );++$i;?><div class="xm-spqd7">
        	<ul>
          	<li class="xm-spqd2" style="width:550px">
                  <div>
                      <ul>
                          <li class="xm-spqd8"><a href="__APP__/<?php echo ($vo_cl["URL"]); ?>/details/id/<?php echo ($vo_cl["Commodity"]["id"]); ?>"><img src="__PUBLIC__/Content/<?php echo ($vo_cl["CIDir"]); ?>/thumb_<?php echo ($vo_cl["Commodity"]["image"]); ?>" width="90" height="58" /></a></li>
                          <li><a href="__APP__/<?php echo ($vo_cl["URL"]); ?>/details/id/<?php echo ($vo_cl["Commodity"]["id"]); ?>"><?php echo ($vo_cl["Commodity"]["name"]); ?></a></li>
                      </ul>
                  </div>
              </li>
              <li class="xm-spqd4">&#165;<span class="commodity-price"><?php echo ($vo_cl["Commodity"]["price"]); ?></span></li>
              <li class="xm-spqd5"><span class="quantity"><?php echo ($vo_cl["quantity"]); ?></span></li>
              <li class="xm-spqd6">&#165;<span class="commodity-xiaoji" xiaoji="<?php echo ($vo_cl["Commodity"]["price_all"]); ?>" ><?php echo ($vo_cl["Commodity"]["price_all"]); ?></span></li>
              <li style="display:none" class="commodity_info_datas" quantity="<?php echo ($vo_cl["quantity"]); ?>" measure="<?php echo ($vo_cl["Commodity"]["measure"]); ?>" name="<?php echo ($vo_cl["Commodity"]["name"]); ?>" ></li>
          </ul>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>

    <div class="xm-ddqr1" style="margin-top:25px; ">订单结算</div>
    <div class="xm-ddqs-1">运费/服务费：<a >¥<span class="logistics">0.00</span></a></div>
    <?php if(($Cartslist["0"]["type"]) == "1"): if(!empty($youhui)): ?><div class="xm-ddqs-2" style="width:auto;margin-left:749px">
          	<ul>
            	<li>使用<a style="color:#cc0000; font-size:12px;">满减</a>优惠卷</li>
                <li class="xm-mg10"><input name="coupon" type="checkbox" checked="checked" value="<?php echo ($youhui); ?>"  /></li>
                <li class="xm-mg10"> 优惠额：<span >&#165;<?php echo ($youhui); ?></span></li>
            </ul>
        </div><?php endif; endif; ?>
    <?php if(($Cartslist["0"]["type"]) == "3"): if(!empty($youhui)): ?><div class="xm-ddqs-2" style="width:auto;margin-left:749px">
            <ul>
              <li>使用<a style="color:#cc0000; font-size:12px;">9折</a>优惠卷</li>
                <li class="xm-mg10"><input name="coupon" type="checkbox" checked="checked" value="<?php echo ($youhui); ?>"  /></li>
                <li class="xm-mg10"> 优惠额：<span >&#165;<?php echo ($youhui); ?></span></li>
            </ul>
        </div><?php endif; endif; ?>
      <input type="text" name="delivery_price" value="<?php echo ((C("conf7"))?(C("conf7")):"20"); ?>" />
      <input type="hidden" name="commodity_volume" value="<?php echo ($commodity_volume); ?>" />
      <input type="hidden" name="commodity_total" value="<?php echo ($commodity_total); ?>" />
      <input type="text" name="logistics" value="0" />
      <input type="hidden" name="price_total" value="<?php echo ($commodity_total); ?>" />
    <style type="text/css">
      .xm-ddqs-1{
        height:auto;
      }
    </style>
    <div class="xm-ddqs-1">产品金额共计：<a>：&#165;<span class="commodity-total" data="<?php echo ($commodity_total); ?>"><?php echo ($commodity_total); ?></span></a></div>
    <div class="xm-ddqs-1"><strong>您共需为订单支付：<span>¥<span id="price_total"><?php echo ($commodity_total); ?></span></span></strong></div>
    <div class="xm-ddqs-1"><strong>备注信息：</strong></div>
    <div class="xm-ddqs-1">
      <textarea name="remark" style="width:200px;height:50px;max-width:300px;max-height:100px;padding:2px;border:1px #dddddd solid"></textarea>
    </div>
    <div class="xm-ddqs-1 xm-cohui">-------------------------------------------------------------</div>
  	<div id="xm-qrzz-1"><input type="image" id="order_confirm" style="cursor:pointer;" src="../Public/image/39.jpg" width="150" height="45" /></div>
  </div>

<script>

    $(function(){

      $("[name=order_confirm]").submit(function(){

        if(!define_userid){
            window.location = define_app_url+'/Cat';
        }

        var s_a = $("[name=use_address]");

        var use_address = $("[name=use_address]:checked"); //地址
        var payment_model = $("[name=payment_model]:checked");//支付方式
        var payment = $("[name=payment]:checked"); //平台类型
        var delivery = $("[name=delivery]:checked"); //配送类型
        var ask_for_date = $("[name=ask_for_date]"); //要求到货日期
        // var invoice_type = $("[name=invoice_type]"); //发票信息
        // var invoice_rise = $("[name=invoice_rise]"); //发票信息
        // var invoice_info = $("[name=invoice_info]"); //发票信息
        var commodity_total = $("[name=commodity_total]"); //商品总价
        var price_total = $("[name=price_total]"); //订单总价
        var logistics = $("[name=logistics]"); //运费+服务费
        var delivery_price = $("[name=delivery_price]"); //服务费
        var coupon = $("[name=coupon]:checked"); //优惠金额
        var remark = $("[name=remark]"); //备注信息

        if(s_a.size()<1 || !s_a.val()){
          jBox.tip('请添加或选择收货地址', 'error',{ timeout: 2000});
          return false;
        }

        var ob = {
          use_address:use_address.val(),
          payment_model:payment_model.val(),
          payment:payment.val(),
          delivery:delivery.val(),
          ask_for_date:ask_for_date.val(),
          //invoice_type:invoice_type.val(),
          //invoice_rise:invoice_rise.val(),
          //invoice_info:invoice_info.val(),
          commodity_total:commodity_total.val(),
          price_total:price_total.val(),
          logistics:logistics.val(),
          delivery_price:delivery_price.val(),
          remark:remark.val(),
          coupon:parseInt(coupon.val() ? coupon.val() :0)
        };

          if(payment_model.val()==1){
              if(payment.val()==1){
                   var submit = function (v, h, f) {
                    if (v == 'ok'){

                        window.setTimeout(function () {

                           jBox.tip("正在处理...", 'loading');
                            $.ajax({
                                url: define_app_url+'/'+define_module_name+'/order_confirm',
                                data: ob,
                                type:'POST',
                                success: function(data){
                                    var msg = JSON.parse(data);
                                    if(msg.status==1){
 
                                      window.open(define_app_url+'/Pay/alipay_to_cart/out_trade_no/'+msg.data);

                                      window.setTimeout(function () {
                                        window.location=define_app_url+'/Cart/order_complete/out_trade_no/'+msg.data;
                                      },500);

                                    }else{
                                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { }});
                                    }
                                }
                            });

                        },500);

                    }
                    return true; //close
                };

                jBox.confirm("确认提交订单，并跳转到支付页面？", "提示", submit,{top: '40%'});

              }else{
                console.log('网银支付');
              }
          }else{
            console.log('其它支付方式');
                  var submit = function (v, h, f) {
                    if (v == 'ok'){

                        window.setTimeout(function () {

                           jBox.tip("正在处理...", 'loading');
                            $.ajax({
                                url: define_app_url+'/'+define_module_name+'/order_confirm',
                                data: ob,
                                type:'POST',
                                success: function(data){
                                    var msg = JSON.parse(data);
                                    if(msg.status==1){
 
                                      window.setTimeout(function () {
                                        window.location=define_app_url+'/Cart/order_complete/out_trade_no/'+msg.data;
                                      },500);

                                    }else{
                                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { }});
                                    }
                                }
                            });

                        },500);

                    }
                    return true; //close
                };

                jBox.confirm("确认提交订单？", "提示", submit,{top: '40%'});
          }
      });

    if($("[name=use_address]").size()>0){
        $("[name=use_address]").eq($("[name=use_address]").size()-1).attr('checked','checked');
        var data = get_logistics($("[name=use_address]").size()-1);
        if(data.dropin==0){
          $("#delivery_status1").css('display','none');
          $("#delivery_status2").css('display','block');
          $("[name=delivery][value=2]").attr('disabled','disabled');
        }else{
          $("#delivery_status1").css('display','block');
          $("#delivery_status2").css('display','none');
        }
        $(".logistics").text(data.price.toFixed(2));
        $("[name=logistics]").val(data.price);
    }

    $("[name=use_address]").change(function(){
        var i = $(this).attr('index'); 
        set_logistics(i);
    });

    function set_logistics(i){ //设置物流费用
        var data = get_logistics(i); //获取当前把选地区物流价格
        if(data.dropin){
          $("#delivery_status1").css('display','block');
          $("#delivery_status2").css('display','none');
          $("[name=delivery][value=2]").removeAttr('disabled','disabled');
        }else{
          $("#delivery_status1").css('display','none');
          $("#delivery_status2").css('display','block');
          $("[name=delivery][value=2]").attr('disabled','disabled');
        }
        var v = $("[name=delivery]:checked").val(); //获取当所选物流方法
        if(v==1){//提货点自提
          $(".logistics").text(data.price.toFixed(2)); //更改物流价格用于显示
          $("[name=logistics]").val(data.price); //更改物流价格发送表单
        }else if(v==2){//送货上门安装
          $(".logistics").text(data.drop_price.toFixed(2));//更改物流价格用于显示
          $("[name=logistics]").val(data.drop_price);//更改物流价格发送表单
          $("[name=delivery][value=1]").attr('checked','checked');
        }
        get_totals();
    }

    $("[name=delivery]").change(function(){ //当物流方式更改
        var v = $(this).val();
        var data = get_logistics($("[name=use_address]:checked").attr('index'));//运费数据
        if(v==1){//提货点自提
          $(".logistics").text(data.price.toFixed(2));
          $("[name=logistics]").val(data.price);
          $("#delivery_status1").css('display','block');
          $("#delivery_status2").css('display','none');
        }else if(v==2){//送货上门安装
          if(data.dropin){
            $("#delivery_status1").css('display','block');
            $("#delivery_status2").css('display','none');
          }else{
            $("#delivery_status1").css('display','none');
            $("#delivery_status2").css('display','block');
          }
          $(".logistics").text((data.drop_price).toFixed(2));
          $("[name=logistics]").val((data.drop_price));
        }
        get_totals();
    });

    $("[name=coupon]").click(function(){
       get_totals();
    });

    get_totals();

    function get_totals(){//获取总价格
        var lo = parseInt($("[name=logistics]").val());
        var total = parseInt($("[name=commodity_total]").val());
        var coupon = parseInt($("[name=coupon]:checked").val() ? $("[name=coupon]:checked").val() : 0);
        $("[name=price_total]").val(lo+total-coupon);
        $("#price_total").text((lo+total-coupon).toFixed(2));
    }

    function get_logistics(i){//获取当前把选地区物流价格
      var addinit = $("[name=use_address]").eq(i); //获取所选地址
      var commoditys = $(".commodity_info_datas");//商品信息载体
      var average_price = parseFloat(addinit.attr('average_price')); //获取每平方均价
      var dropin = parseInt(addinit.attr('dropin')); //是否支持送货上门
      var dropin_lowest_price = parseFloat(addinit.attr('dropin_lowest_price')); //送货上门最低价
      var dropin_average_price = parseFloat(addinit.attr('dropin_average_price')); //送货上门每平方均价
      console.log('所在地每立方均价:'+average_price+'; 是否支支送货上门:'+dropin+'; 送货上门最低价:'+dropin_lowest_price+' ;送货上门每平方均价:'+dropin_average_price);
      var price = 0;//measure quantity
      var drop_price = 0;
      var t_measure = 0;
        function dp(){
          for(var i=0;i<commoditys.length;i++){
            var measure = parseFloat(commoditys.eq(i).attr('measure'));
            var quantity = parseInt(commoditys.eq(i).attr('quantity'));
            console.log('商品'+i+' 体积:'+measure+'; 数量:'+quantity);
            t_measure+=measure;
            var p = measure*dropin_average_price;
            if(p<dropin_lowest_price){
              p = dropin_lowest_price;
              console.log('此商品送货上门价格(体积'+measure+'*送货上门每平方均价'+dropin_average_price+')'+p+'小于送货上门起步价'+dropin_lowest_price+',送货上门价为起步价:'+dropin_lowest_price);
            }else{
              console.log('此商品送货上门价格(体积'+measure+'*送货上门每平方均价'+dropin_average_price+')'+p+'大于送货上门起步价'+dropin_lowest_price+',送货上门价为 (体积:'+measure+'*送货上门每平方均价:'+dropin_average_price+') :'+p);
            }
            var sum = (measure*average_price*quantity)+(p*quantity);
            drop_price+=sum;
            console.log('商品'+i+' 运费为:'+sum+' ( (体积'+measure+'*均价'+average_price+'*数量'+quantity+')+(送货上门价'+p+'*数量'+quantity+') )');
            console.log('---------------');
            console.log('总运费:'+drop_price);
            console.log('++++++++++++++++++++++++++++++++++++++++++');
            $('.logistics_text').text('该地区每立方单价'+average_price+'元*该订单商品总体积'+t_measure+'立方+商品A上门安装服务费200元*2件+商品B上门安装服务费180元');
        }
      }
       
      function pp(){
        for(var i=0;i<commoditys.length;i++){
          var measure = parseFloat(commoditys.eq(i).attr('measure'));
          var quantity = parseInt(commoditys.eq(i).attr('quantity'));
          console.log('商品'+i+' 体积:'+measure+'; 数量:'+quantity);
          var sum = measure*average_price*quantity;
          price+=sum;
          console.log('商品'+i+' 运费为:'+sum+' (体积'+measure+'*均价'+average_price+'*数量'+quantity+') ');
          console.log('---------------');
        }
        console.log('总运费:'+price);
        console.log('++++++++++++++++++++++++++++++++++++++++++');
      }

      dp();
      pp();
 
      var data = {price:price,drop_price:drop_price,dropin:dropin}
      if(data){
        console.log(data);
        return data;
      }else{
        return 0;
      }

    }

    $("[name=information_province]").live('change',function(){
        var v = $(this).val();
        var city = $("#information_city");
        var county = $("#information_county");
        city.html("");
        // $('<select name="information_city"><option value="0" style="background: #ccc;">--请选择--</option></select>').appendTo(city);
        $("[name=where_id]").val(v);
        if(v==0){
      city.html("");
            county.html("");
            $("[name=where_text]").val('');
        }else{
            $("[name=where_text]").val($(this).find("option:selected").text());
            $.ajax({
                url: define_app_url+'/Member/return_provinces',
                data: {pid:v},
                type:'POST',
                success: function(datas){
                    var obj = JSON.parse(datas);
          if(obj.length>0){
            city.html("");
            $('<select name="information_city"><option value="0" style="background: #ccc;">--请选择--</option></select>').appendTo(city);
            var citys = $("[name=information_city]");
            for(var i=0; i<obj.length; i++){
              $('<option value="'+obj[i].id+'">'+obj[i].name+'</option>').appendTo(citys);
            }
          }else{
            city.html("");
          }
                }
            });
        }
    });

    $("[name=information_city]").live('change',function(){
        var v = $(this).val();
        var county = $("#information_county");
        county.html("");
        if(v==0){
      county.html("");
            $("[name=where_id]").val($("[name=information_province]").val());
            $("[name=where_text]").val($("[name=information_province]").find("option:selected").text());
        }else{
      $("[name=where_id]").val(v);
            $("[name=where_text]").val($("[name=information_province]").find("option:selected").text()+' '+$(this).find("option:selected").text());
            $.ajax({
                url: define_app_url+'/Member/return_provinces',
                data: {pid:v},
                type:'POST',
                success: function(datas){
                    var obj = JSON.parse(datas);
          if(obj.length>0){
            county.html("");
            $('<select name="information_county"><option value="0" style="background: #ccc;">--请选择--</option></select>').appendTo(county);
            var countys = $("[name=information_county]");
            for(var i=0; i<obj.length; i++){
              $('<option value="'+obj[i].id+'">'+obj[i].name+'</option>').appendTo(countys);
            }
          }else{
            county.html("");
          }
                }
            });
        }
    });

    $("[name=information_county]").live('change',function(){
    var v = $(this).val();
    if(v!=0){
      $("[name=where_id]").val(v);
            $("[name=where_text]").val($("[name=information_province]").find("option:selected").text()+' '+$("[name=information_city]").find("option:selected").text()+' '+$(this).find("option:selected").text());
    }else{
            $("[name=where_id]").val($("[name=information_city]").val());
            $("[name=where_text]").val($("[name=information_province]").find("option:selected").text()+' '+$("[name=information_city]").find("option:selected").text());
        }
    });

    $("#add_address").click(function(){

        if($("[name=use_address]").size()>=10){
          jBox.tip('最多只能添加10个地址', 'error',{ timeout: 1000});
            return false;
        }

        var ics = $("[name=information_city]");
        var iccs = $("[name=information_county]");

        var consignee = $("[name=consignee]").val();
        var where_id = $("[name=where_id]").val();
        var street = $("[name=street]").val();
        // var zip = $("[name=zip]").val();
        var phone = $("[name=phone]").val();
        var cellphone = $("[name=cellphone]").val();
        var where_text = $("[name=where_text]").val();

        if(consignee=='' || !/[\u4e00-\u9fa5]+/.test(consignee) || consignee.length<2){
            jBox.tip('请填写收货人姓名', 'error',{ timeout: 1000});
            return false;
        }
         if(where_id=='' || where_id==0){
            jBox.tip('请选择所在城市', 'error',{ timeout: 1000});
            return false;
        }

        if(ics.find('option').size()>0 && ics.val()==0){
            jBox.tip('请选择所在城市', 'error',{ timeout: 1000});
            return false;
        }

        if(iccs.find('option').size()>0 && iccs.val()==0){
            jBox.tip('请选择所在城市', 'error',{ timeout: 1000});
            return false;
        }

        if(street==''){
            jBox.tip('请填写街道地址', 'error',{ timeout: 1000});
            return false;
        }
        if(street==''){
            jBox.tip('邮编不能为空', 'error',{ timeout: 1000});
            return false;
        }
        // if(zip=='' || isNaN(zip) || zip.length<6){
        //     jBox.tip('请输入正确的邮编', 'error',{ timeout: 1000});
        //     return false;
        // }

        if(cellphone.length<11 || cellphone.length>11 || cellphone[0]!=1 || cellphone[1]==2){
            jBox.tip("请输入正确的手机号码", 'error',{ timeout: 1000,closed: function () {  }});
            return false;
        }

        if(phone!=''){
            if(isNaN(phone) || phone.length<7){
                jBox.tip('请填写正确的座机号码', 'error',{ timeout: 1000});
                return false;
            }
        }

        //var ob = {consignee:consignee,where_id:where_id,street:street,zip:zip,cellphone:cellphone,phone:phone,where_text:where_text}
        var ob = {consignee:consignee,where_id:where_id,street:street,cellphone:cellphone,phone:phone,where_text:where_text}
        jBox.tip("正在处理...", 'loading');
        $.ajax({
            url: define_app_url+'/'+define_module_name+'/insert_address',
            data: ob,
            type:'POST',
            success: function(data){
                var msg = JSON.parse(data);
                if(msg.status==1){

                    // var ht = '<div id="xm-xdz2" style="margin:0 0 10px"><ul><li style="margin-right:10px;"><input  index="'+$("[name=use_address]").size()+'" initiate_price="'+msg.data.initiate_price+'" average_price="'+msg.data.average_price+'" name="use_address" type="radio" value="'+msg.data.id+'" /></li><li><strong>'+consignee+'</strong> 地址：'+where_text+' 邮编：'+zip+' '+(cellphone ? '手机：'+cellphone : '')+' '+(phone ? '电话：'+phone : '')+'<a href="javascript:;" class="delete_address">  [删除]</a></li></ul></div>';
                     var ht = '<div id="xm-xdz2" style="margin:0 0 10px"><ul><li style="margin-right:10px;"><input  index="'+$("[name=use_address]").size()+'" dropin="'+msg.data.dropin+'" dropin_lowest_price="'+msg.data.dropin_lowest_price+'" dropin_average_price="'+msg.data.dropin_average_price+'" average_price="'+msg.data.average_price+'" name="use_address" type="radio" value="'+msg.data.id+'" /></li><li><strong>'+consignee+'</strong> 地址：'+where_text+' '+(cellphone ? '手机：'+cellphone : '')+' '+(phone ? '电话：'+phone : '')+'<a href="javascript:;" class="delete_address">  [删除]</a></li></ul></div>';

                    var ap = $(".new_address_insert");
                    ap.append(ht);
                    $("[name=use_address]").removeAttr('checked');
                    $("[name=use_address]").eq($("[name=use_address]").size()-1).attr('checked','checked');
                    set_logistics($("[name=use_address]").size()-2);
                    jBox.close();
                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                        $("[name=information_province]").val(0);
                        $("#information_city").html('');
                        $("#information_county").html('');
                        $("[name=consignee]").val('');
                        $("[name=where_id]").val('');
                        $("[name=street]").val('');
                        // $("[name=zip]").val('');
                        $("[name=phone]").val('');
                        $("[name=cellphone]").val('');
                        $("[name=where_text]").val('');
                    }});
                }else{
                    jBox.tip(msg.info, 'error',{ timeout: 1000});
                }
            }
        });
    });

    $(".delete_address").live('click',function(){
        if($("[name=use_address]").size()<=1){
            jBox.tip('至少有一个地址!', 'error',{ timeout: 2000});
            return false;
        }
        var self = $(this);
        var id = self.parents('#xm-xdz2').find("[name=use_address]").val();
        if(id){
          var deleteid = [];
          deleteid.push(id);
          var submit = function (v, h, f) {
              if (v == 'ok'){
                  jBox.tip("正在处理...", 'loading');
                  $.ajax({
                      url: define_app_url+'/'+define_module_name+'/delete_address',
                      data: {deleteid:deleteid},
                      type:'POST',
                      success: function(data){
                          var msg = JSON.parse(data);
                          if(msg.status==1){
                              self.parents('#xm-xdz2').remove();
                              $("[name=use_address]").removeAttr('checked');
                              $("[name=use_address]").eq($("[name=use_address]").size()-1).attr('checked','checked');
                              set_logistics($("[name=use_address]").size()-1);
                              jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { }});
                          }else{
                              jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { }});
                          }
                      }
                  });
              }
              return true; //close
          };
          jBox.confirm("确认删除这个地址？", "提示", submit,{top: '40%'});
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