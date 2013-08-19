<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>

    <link type="text/css" rel="stylesheet" href="__PUBLIC__/js/jBox/Skins/GreyBlue/jbox.css"/>
    <link href="../Public/css/Common.css" rel="stylesheet" type="text/css"/>
    <link href="../Public/css/<?php echo (MODULE_NAME); ?>.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <link rel="stylesheet" href="__PUBLIC__/js/Jcrop/css/jquery.Jcrop.css" type="text/css" />

    <script src="__PUBLIC__/js/jquery-1.8.2.min.js" type="text/javascript"></script>

    <!--<script src="__PUBLIC__/js/angular.min.js" type="text/javascript"></script>-->

    <script type="text/javascript" src="__PUBLIC__/js/livequery.js"></script>
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/js/jqueryUi/jquery-ui.css"/>

    <script type="text/javascript" src="__PUBLIC__/js/jqueryUi/jquery-ui.js"></script>


</head>
<body>
<table width="100%" height="64" border="0" cellpadding="0"
       cellspacing="0" class="admin_topbg">
    <tr>
        <td width="61%" height="64"><img src="../Public/images/logo_login.png"
                                         width="262" height="64"></td>
        <td width="39%" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="74%" height="38" class="admin_txt">管理员: <?php echo ($_SESSION['username']); ?> 您好,感谢登陆使用！</td>
                    <td width="22%"><input id="ajax_admin_check_logout" type="image"
                            src="../Public/images/out.gif" width="46" height="20" border="0" /></td>
                    <td width="4%">&nbsp;</td>
                </tr>
                <tr>
                    <td height="19" colspan="3">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div id="left">
    <div class="menu">
        <ul>
            <li class="xnfy520_left_main_title">后台管理</li>

            <?php if(($Userinfo["Role"]["level"]) != $p_level): ?><li>
                    <a class="xnfy520_left_title" href="javascript:;">系统管理</a>
                    <ul>

                        <li>
                            <a id="Left-System" class="top-action" href="__APP__/System/configuration">系统配置</a>
                        </li>

                        <li>
                            <a  id="Left-SystemAnnouncement" class="top-action" href="__APP__/SystemAnnouncement/index">系统公告</a>
                        </li>

                     <!--    <li>
                            <a  id="Left-LastUpdate" class="top-action" href="__APP__/LastUpdate/index">最新更新</a>
                        </li> -->

                        <!-- <li>
                            <a  id="Left-Blogroll" class="top-action" href="__APP__/Blogroll/index">友情链接</a>
                        </li>

                        <li>
                            <a  id="Left-OtherLinks" class="top-action" href="__APP__/OtherLinks/index">资质许可</a>
                        </li> -->
                        
                        <li>
                            <a  id="Left-Stylist" class="top-action" href="__APP__/Stylist/index">设计师</a>
                        </li>

                         <li><a  class="set-index-commodity" type="member" class="top-action" href="javascript:;">个人中心页-推荐</a></li>
                        <li><a  class="set-index-commodity" type="cart" class="top-action" href="javascript:;">购物车页-推荐</a></li>
                        <li>
                            <a  id="Left-Evaluate" class="top-action" href="__APP__/Evaluate/index">评价建议</a>
                        </li>
                    </ul>

                </li>

                <li>
                    <a class="xnfy520_left_title" href="javascript:;">广告管理</a>

                    <ul>
                        <!-- <li><a  id="Left-AdvertCategory" class="top-action" href="__APP__/AdvertCategory/index">广告分类</a></li> -->
                        <li><a  id="Left-AdvertList" class="top-action" href="__APP__/AdvertList/index">广告列表</a></li>
                    </ul>
                </li>

                <li>
                    <a class="xnfy520_left_title" href="javascript:;">区域管理</a>

                    <ul>

                        <li><a  id="Left-Address" class="top-action" href="__APP__/Address/index">地区列表</a></li>
                        <!-- <li><a  id="Left-Provinces" class="top-action" href="__APP__/Provinces/index">地域列表</a></li> -->

                    </ul>
                </li><?php endif; ?>
                <li>
                    <a class="xnfy520_left_title" href="javascript:;">用户管理</a>

                    <ul>

                        <li>
                            <a  id="Left-Role" class="top-action" href="__APP__/Role/index">用户分组</a>
                        </li>
                        <hr />

                        <?php if(is_array($Rolelist)): $i = 0; $__LIST__ = $Rolelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_user_list): $mod = ($i % 2 );++$i;?><li>
                                    <a class="top-action" href="__APP__/User/index/rid/<?php echo ($vo_user_list["id"]); ?>"><?php echo ($vo_user_list["name"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </li>

                <li>

                    <a class="xnfy520_left_title" href="javascript:;">商品管理</a>

                    <ul>

                        <li><a id="Left-CommodityCategory" class="top-action" href="__APP__/CommodityCategory/index">商品大类</a></li>
                        <li><a id="Left-CommoditySubclass" class="top-action" href="__APP__/CommoditySubclass/index">商品子类</a></li>

                        <li><a id="Left-CommodityList" class="top-action" href="__APP__/CommodityList/index">商品列表</a></li>

                    </ul>

                </li>

                <li>

                    <a class="xnfy520_left_title" href="javascript:;">投票管理</a>

                    <ul>

                        <li><a id="Left-VoteCommodity" class="top-action" href="__APP__/VoteCommodity/index">投票商品</a></li>

                    </ul>

                </li>

                <li>

                    <a class="xnfy520_left_title" href="javascript:;">团购管理</a>

                    <ul>

                        <li><a id="Left-GrouponCategory" class="top-action" href="__APP__/GrouponCategory/index">团购分类</a></li>

                        <li><a id="Left-GrouponCommodity" class="top-action" href="__APP__/GrouponCommodity/index">团购商品</a></li>

                    </ul>

                </li>

                <li>
                    <a class="xnfy520_left_title" href="javascript:;">订单管理</a>
                    <ul>

                        <li><a class="top-action" id="Left-OrderList1" href="__APP__/OrderList/index/type/1">商品订单</a></li>
                        <li><a class="top-action" id="Left-OrderList2" href="__APP__/OrderList/index/type/2">团购订单</a></li>
                        <li><a class="top-action" id="Left-OrderList3" href="__APP__/OrderList/index/type/3">投票订单</a></li>
                        <li><a class="top-action" id="Left-OrderList4" href="__APP__/OrderList/index/type/4">预订订单</a></li>
                    </ul>
                </li>


                <li>

                    <a class="xnfy520_left_title" href="javascript:;">帮助中心</a>

                    <ul>

                        <li><a  id="Left-HelpCenterCategory" class="top-action" href="__APP__/HelpCenterCategory/index">帮助分类</a></li>
                        <li><a  id="Left-HelpCenterInformation" class="top-action" href="__APP__/HelpCenterInformation/index">帮助信息</a></li>

                    </ul>

                </li>

              <!--   <li>

                    <a class="xnfy520_left_title" href="javascript:;">信息模板</a>

                    <ul>

                        <li><a  id="Left-TemplateList" class="top-action" href="__APP__/TemplateList/index">模板列表</a></li>

                    </ul>

                </li> -->



        </ul>
    </div>
</div>
<div id="content">

<div id="xnfy520-function-index">

    <div id="xnfy520-function-index-title">
        订单列表
    </div>

    <div id="xnfy520-function-index-nav">
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">全部</a>
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); ?>/pid/1<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">昨天</a>
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); ?>/pid/2<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">今天</a>
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); ?>/pid/3<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">本周</a>
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); ?>/pid/4<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">上周</a>
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); ?>/pid/5<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">本月</a>
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); ?>/pid/6<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">上月</a>
    </div>

    <div id="xnfy520-function-index-nav-sub" style="margin-top: -3px;">
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; ?>">全部</a>
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; ?>/cid/1">已付款</a>
        <a href="__APP__/OrderList/index/type/<?php echo ($_GET['type']); if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; ?>/cid/2">未付款</a>
    </div>

    <div id="xnfy520-function-index-search">

        <form action="__APP__/OrderList/index/type/<?php echo ($_GET['type']); if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>" method="post" name="form_search"  style="line-height: 35px;">
            关键字 <input type="text" name="key" /> 按&nbsp;
            <select name="search">
                <option value="2">订单号</option>
                <option value="3">用户</option>
            </select>
            <?php if(empty($list)): ?><input type="submit" value="搜索" disabled="disabled" />
                <?php else: ?>
                <input type="submit" value="搜索" /><?php endif; ?>
        </form>

    </div>

    <div id="xnfy520-function-index-content" style="max-height:460px;overflow-y:scroll;">

        <form action="javascript:;" method="post" name="OrderList-del" class="delete">
            <table id="xnfy520-function-index-table">
                <thead>
                <tr>
                    <th class="xnfy520-function-index-table-th-100">订单号</th>
                    <th class="xnfy520-function-index-table-th-100">用户</th>
                    <th class="xnfy520-function-index-table-th-150">订单总金额</th>
                    <th class="xnfy520-function-index-table-th-50">订单状态</th>
                    <th class="xnfy520-function-index-table-th-150">下单时间</th>
                    <th class="xnfy520-function-index-table-th-50">操作</th>
                    <th class="xnfy520-function-index-table-th-50">详单</th>
                    <th id="xnfy520-function-index-table-th-check-all" style="display: none;">
                        <input type="button" value="全选" />
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($list)): ?><tr><td colspan="8" style="height:50px;">暂无数据</td></tr>
                <?php else: ?>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="znxx">
                            <td><?php echo ($vo["out_trade_no"]); ?></td>
                            <td><?php echo ($vo["username"]); ?></td>
                            <td style="text-indent:10px;<?php if(($_GET['type']) == "4"): ?>text-align:center;<?php else: ?>text-align:left;<?php endif; ?>">
                                <span style="min-width:80px;display:inline-block">&#165;<?php echo ($vo["total_fee"]); ?></span>
                                <?php if(($_GET['type']) != "4"): ?>(
                                物流:<?php echo ($vo["other_data"]["logistics"]); ?>
                                <?php if(!empty($vo["other_data"]["coupon"])): ?>优惠:-<?php echo ($vo["other_data"]["coupon"]); endif; ?>
                                )<?php endif; ?>
                            </td>
                            <td>
                                <?php if(($_GET['type']) == "4"): if(($vo["abolish"]) == "1"): ?><span style="font-weight:bold;color:blue">已取消预订</span>
                                    <?php else: ?>
                                        <?php if(($vo["pay_type"]) == "0"): ?>未付款
                                        <?php else: ?>
                                            已付款<?php endif; endif; ?>
                                <?php else: ?>
                                    <?php if(($vo["pay_type"]) == "0"): if(($vo["other_data"]["payment_model"]) != "1"): ?><span by="<?php echo ($vo["id"]); ?>" is_payment="<?php echo ($vo["pay_type"]); ?>" class="manual_payment" style="color:red;font-weight:bold;cursor:pointer">未付款</span>
                                        <?php else: ?>
                                            未付款<?php endif; ?>
                                    <?php else: ?>
                                        <?php if(($vo["other_data"]["payment_model"]) != "1"): ?><span by="<?php echo ($vo["id"]); ?>" is_payment="<?php echo ($vo["pay_type"]); ?>" class="manual_payment" style="color:blue;font-weight:bold;cursor:pointer">已付款</span>
                                        <?php else: ?>
                                            已付款<?php endif; endif; endif; ?>
                            </td>
                            <td><?php echo (date("Y-m-d H:i:s",$vo["create_date"])); ?></td>
                            <td>
                               <?php if(($_GET['type']) == "4"): if(($vo["abolish"]) == "1"): if(($vo["abolish_dispose"]) == "1"): ?><span by="<?php echo ($vo["id"]); ?>" type="abolish_dispose" value="<?php echo ($vo["abolish_dispose"]); ?>" class="abolish_dispose" style="color:blue;font-weight:bold;cursor:pointer">已处理</span>
                                        <?php else: ?>
                                            <span by="<?php echo ($vo["id"]); ?>" type="abolish_dispose" value="<?php echo ($vo["abolish_dispose"]); ?>" class="abolish_dispose" style="color:red;font-weight:bold;cursor:pointer">处理</span><?php endif; ?>
                                        <span style="display: none;" data_on="确认已经处理？" data_off="确认设为未处理？"></span>
                                    <?php else: ?>
                                        -<?php endif; ?> 
                               <?php else: ?>
                                    <?php if(($vo["pay_type"]) == "0"): ?>-
                                    <?php else: ?>
                                        <?php if(empty($vo["shipments_data"])): ?><span class="send_out" by="<?php echo ($vo["id"]); ?>" style="color:red;font-weight:bold;cursor:pointer">发货</span>
                                        <?php else: ?>
                                            <span class="send_out" by="<?php echo ($vo["id"]); ?>" style="color:blue;font-weight:bold;cursor:pointer">发货信息</span><?php endif; endif; endif; ?>
                            </td>
                            <td><div style="color:#ec651a;cursor:pointer"  class="znxx03" status="1" >展开</div></td>
                            <td class="xnfy520-function-index-table-td-checkbox" style="display: none;">
                                <input class="xnfy520-function-index-table-check-this" type="checkbox" name="deleteid[]" value="<?php echo ($vo["id"]); ?>" />
                            </td>
                        </tr>
                        <tr class="znxx01" style="display: none;border: none;">
                            <td colspan="8" style="padding:1px; border:none;" class="none-background-color">
                                <table width="100%" cellpadding="0" cellspacing="0" class="tab0001">
                                    <?php if(($_GET['type']) == "4"): ?><tr style="line-height: 0;">
                                            <td colspan="7" style="padding-top:0; border:none">
                                                <div class="znxx_m" style="width:100%; padding:0;">
                                                    <table  width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;border:none">
                                                        <tr style="border:none;">
                                                            <td width="100" align="center" style="border: none;">
                                                                <img src="__PUBLIC__/Content/VoteCommodity/thumb_<?php echo ($vo["commodity_data"]["image"]); ?>" style="width:55px; height:30px; padding:3px; border:1px solid #ddd;position: relative;top: 4px;" />
                                                            </td>
                                                            <td colspan="5" style="color:#ec651a;border: none;text-align: left;">
                                                                <?php echo ($vo["commodity_data"]["name"]); ?>
                                                            </td>
                                                            <td colspan="1" style="border: none;" width="100" align="center">订金：&#165; <?php echo ($vo["commodity_data"]["subscription"]); ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php if(is_array($vo["commodity_data"])): $i = 0; $__LIST__ = $vo["commodity_data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_mo_ci): $mod = ($i % 2 );++$i;?><tr style="line-height: 0;">
                                                <td colspan="7" style="padding-top:0; border:none">
                                                    <div class="znxx_m" style="width:100%; padding:0;">
                                                        <table  width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;border:none">
                                                            <tr style="border:none;">
                                                                <td width="100" align="center" style="border: none;">
                                                                    <img src="__PUBLIC__/Content/<?php echo ($vo_mo_ci["CIDir"]); ?>/thumb_<?php echo ($vo_mo_ci["Commodity"]["image"]); ?>" style="width:55px; height:30px; padding:3px; border:1px solid #ddd;position: relative;top: 4px;" />
                                                                </td>
                                                                <td style="color:#ec651a;border: none;text-align: left;">
                                                                    <?php echo ($vo_mo_ci["Commodity"]["name"]); ?>
                                                                </td>
                                                                <td style="border: none;" width="100" align="center">单价：&#165; <?php echo ($vo_mo_ci["Commodity"]["price"]); ?></td>
                                                                <td style="border: none;" width="100" align="center">数量： <?php echo ($vo_mo_ci["quantity"]); ?></td>
                                                                <td style="border: none;" width="150" align="center">小计：&#165; <?php echo ($vo_mo_ci["xiaoji"]); ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>

                                    <tr>
                                        <td colspan="7" style="border: none;text-align:left;text-indent:20px">
                                            支付信息：
                                            <strong>支付方式</strong>：
                                            <?php if(($_GET['type']) == "4"): ?>在线支付　
                                                <strong>支付平台</strong>：
                                                <?php switch($vo["pay_type"]): case "1": ?>支付宝 ( 支付帐号 <?php echo (($vo["alipay_data"]["buyer_email"])?($vo["alipay_data"]["buyer_email"]):"-"); ?> )　
                                                    <strong>支付时间</strong>: <?php echo (date("Y-m-d H:i:s",$vo["alipay_data"]["pay_date"])); break;?>
                                                    <?php case "2": ?>网上银行<?php break; endswitch;?>　
                                                <?php if(!empty($vo["abolish_date"])): ?><span style="color:blue">取消预订时间:<?php echo (date("Y-m-d H:i:s",$vo["abolish_date"])); ?></span><?php endif; ?>
                                            <?php else: ?>
                                                <?php switch($vo["other_data"]["payment_model"]): case "3": ?><span title="快递可付现金、刷卡">货到付款</span><?php break;?>
                                                    <?php case "2": ?><span title="通过银行转账或现金直接存入指定帐号，需注明订单号">银行电汇</span><?php break;?>
                                                    <?php case "1": ?><span title="通过网上银行或支付平台在线付款">在线支付</span><?php break; endswitch;?>　
                                                <?php if(($vo["other_data"]["payment_model"]) == "1"): ?><strong>支付平台</strong>：
                                                    <?php switch($vo["other_data"]["payment"]): case "1": ?>支付宝 ( 支付帐号 <?php echo (($vo["alipay_data"]["buyer_email"])?($vo["alipay_data"]["buyer_email"]):"-"); ?> )　
                                                        <strong>支付时间</strong>: <?php echo (date("Y-m-d H:i:s",$vo["alipay_data"]["pay_date"])); break;?>
                                                        <?php case "2": ?>网上银行<?php break; endswitch; endif; ?>　<?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php if(($_GET['type']) != "4"): ?><tr>
                                            <td colspan="7" style="border: none;text-align:left;text-indent:20px">
                                                收货人信息：
                                                <strong>姓名</strong>：<?php echo ($vo["address"]["consignee"]); ?>　
                                                <strong>地址</strong>：<?php echo ($vo["address"]["where_text"]); ?>　<?php echo ($vo["address"]["street"]); ?>　
                                                <strong>邮编</strong>：<?php echo ($vo["address"]["zip"]); ?>　
                                                <?php if(!empty($vo["address"]["cellphone"])): ?><strong>手机</strong>：<?php echo ($vo["address"]["cellphone"]); ?>　<?php endif; ?>
                                                <?php if(!empty($vo["address"]["phone"])): ?><strong>电话</strong>：<?php echo ($vo["address"]["phone"]); endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" style="border: none;text-align:left;text-indent:20px">
                                                订单备注：
                                                <strong>配送方式</strong>：
                                                <?php switch($vo["other_data"]["delivery"]): case "1": ?><span title="用户到相应提货点自提安装">提货点自提 ( 运费 <?php echo ($vo["other_data"]["logistics"]); ?> )</span><?php break;?>
                                                    <?php case "2": ?><span title="非电梯楼上楼费用由用户另付">送货上门安装 ( 运费 <?php echo ($vo["other_data"]["logistics"]); ?> + 服务费 <?php echo ($vo["other_data"]["delivery_price"]); ?> )</span><?php break; endswitch;?>　
                                                <?php if(!empty($vo["other_data"]["ask_for_date"])): ?><strong>要求到货时间</strong>：<?php echo ($vo["other_data"]["ask_for_date"]); endif; ?>　
                                                <strong>发票信息</strong>：
                                                类型/<?php echo ($vo["other_data"]["invoice_type"]); ?>　抬头/<?php echo ($vo["other_data"]["invoice_rise"]); ?>　<?php echo ($vo["other_data"]["invoice_info"]); ?>
                                            </td>
                                        </tr><?php endif; ?>
                                </table>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </tbody>
            </table>
            <?php if(!empty($list)): ?><div style="border:1px solid #ccc;height: 37px;">

                    <div class="emit-fanye-box">
                        <div class="emit-fanye-text">
                            <?php echo ($fpage); ?>
                        </div>
                    </div>
                </div><?php endif; ?>
        </form>
        <style>
            .none-background-color:hover{
                background: white;
            }

        </style>
        <script>
            $(function(){
                $(".znxx03").live('click',function(){
                    $(".znxx01").hide();

                    if($(this).text()=="展开"){
                        $(".znxx03").text("展开");
                        $(this).parents(".znxx").next(".znxx01").show();
                        $(this).html("关闭");
                    }else{
                        $(this).parents(".znxx").next(".znxx01").hide();
                        $(this).html("展开");
                    }

                })
            })
        </script>
    </div>
</div>
</div>
<script type="text/javascript" src="__PUBLIC__/js/jBox/jquery.jBox-2.3.min.js"></script>

<script type="text/javascript" src="__PUBLIC__/js/jBox/i18n/jquery.jBox-zh-CN.js"></script>

<script type=text/javascript src="__PUBLIC__/js/jquery.tools.min.js"></script>

<script type=text/javascript src="__PUBLIC__/js/jrumble/jquery.jrumble.1.3.min.js"></script>

<script type=text/javascript src="__PUBLIC__/js/My97DatePicker/WdatePicker.js"></script>

<script src="__PUBLIC__/js/jquery.lksMenu.js" type="text/javascript"></script>

<script type=text/javascript src="../Public/js/Common.js"></script>

<script type=text/javascript src="../Public/js/<?php echo (MODULE_NAME); ?>.js"></script>

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

    var definde_session_status = "<?php echo ($_SESSION['status']); ?>";

    var define_type = "<?php echo ($_GET['type']); ?>";  //当前page值

    var define_page = "<?php echo ($_GET['page']); ?>";  //当前page值

    var define_pid = "<?php echo (($_GET['pid'])?($_GET['pid']):0); ?>";  //当前pid值

    var define_rid = "<?php echo ($_GET['rid']); ?>";  //当前rid值

    var define_sid = "<?php echo ($_GET['sid']); ?>";  //当前sid值

    var define_cid = "<?php echo ($_GET['cid']); ?>";  //当前cid值

    var define_id = "<?php echo ($_GET['id']); ?>";    //当前id值

    var define_did = "<?php echo ($_GET['did']); ?>";    //当前id值

    var define_userid = "<?php echo ($Userinfo["id"]); ?>";

</script>

</body>
</html>