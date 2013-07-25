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

                        <li>
                            <a  id="Left-LastUpdate" class="top-action" href="__APP__/LastUpdate/index">最新更新</a>
                        </li>

                        <li>
                            <a  id="Left-Blogroll" class="top-action" href="__APP__/Blogroll/index">友情链接</a>
                        </li>

                        <li>
                            <a  id="Left-OtherLinks" class="top-action" href="__APP__/OtherLinks/index">资质许可</a>
                        </li>
                        
                        <li>
                            <a  id="Left-Stylist" class="top-action" href="__APP__/Stylist/index">设计师</a>
                        </li>

                    </ul>

                </li>

                <li>
                    <a class="xnfy520_left_title" href="javascript:;">广告管理</a>

                    <ul>
                        <li><a  id="Left-AdvertCategory" class="top-action" href="__APP__/AdvertCategory/index">广告分类</a></li>
                        <li><a  id="Left-AdvertList" class="top-action" href="__APP__/AdvertList/index">广告列表</a></li>
                    </ul>
                </li>

                <li>
                    <a class="xnfy520_left_title" href="javascript:;">区域管理</a>

                    <ul>

                        <li><a  id="Left-Provinces" class="top-action" href="__APP__/Provinces/index">地域列表</a></li>

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

                        <li><a id="Left-CommodityCategory" class="top-action" href="__APP__/CommodityCategory/index">商品分类</a></li>

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

                        <li>
                            <a class="top-action" id="Left-OrderList" href="__APP__/OrderList/index">全部订单</a>
                        </li>
                    </ul>
                </li>


                <li>

                    <a class="xnfy520_left_title" href="javascript:;">帮助中心</a>

                    <ul>

                        <li><a  id="Left-HelpCenterCategory" class="top-action" href="__APP__/HelpCenterCategory/index">帮助分类</a></li>
                        <li><a  id="Left-HelpCenterInformation" class="top-action" href="__APP__/HelpCenterInformation/index">帮助信息</a></li>

                    </ul>

                </li>

                <li>

                    <a class="xnfy520_left_title" href="javascript:;">信息模板</a>

                    <ul>

                        <li><a  id="Left-TemplateList" class="top-action" href="__APP__/TemplateList/index">模板列表</a></li>

                    </ul>

                </li>



        </ul>
    </div>
</div>
<div id="content">

<div id="xnfy520-function-index">

    <div id="xnfy520-function-index-title">
        订单列表
    </div>

    <div id="xnfy520-function-index-nav">
        <a href="__APP__/OrderList/index<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">全部</a>
        <a href="__APP__/OrderList/index/pid/1<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">昨天</a>
        <a href="__APP__/OrderList/index/pid/2<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">今天</a>
        <a href="__APP__/OrderList/index/pid/3<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">本周</a>
        <a href="__APP__/OrderList/index/pid/4<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">上周</a>
        <a href="__APP__/OrderList/index/pid/5<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">本月</a>
        <a href="__APP__/OrderList/index/pid/6<?php if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>">上月</a>
    </div>

    <div id="xnfy520-function-index-nav-sub" style="margin-top: -3px;">
        <a href="__APP__/OrderList/index<?php if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; ?>">全部</a>
        <a href="__APP__/OrderList/index<?php if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; ?>/cid/1">未付款</a>
        <a href="__APP__/OrderList/index<?php if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; ?>/cid/2">待发货</a>
        <a href="__APP__/OrderList/index<?php if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; ?>/cid/3">已完结</a>
    </div>

    <div id="xnfy520-function-index-search">

        <form action="__APP__/OrderList/index<?php if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; ?>" method="post" name="form_search"  style="line-height: 35px;">
            关键字 <input type="text" name="key" /> 按&nbsp;
            <select name="search">
                <option value="2">订单号</option>
            </select>
            <?php if(empty($list)): ?><input type="submit" value="搜索" disabled="disabled" />
                <?php else: ?>
                <input type="submit" value="搜索" /><?php endif; ?>
        </form>

    </div>

    <div id="xnfy520-function-index-content">

        <form action="javascript:;" method="post" name="OrderList-del" class="delete">
            <table id="xnfy520-function-index-table">
                <thead>
                <tr>
                    <th class="xnfy520-function-index-table-th-100">订单号</th>
                    <th class="xnfy520-function-index-table-th-100">用户</th>
                    <th class="xnfy520-function-index-table-th-100">收货人</th>
                    <th class="xnfy520-function-index-table-th-50">订单总金额</th>
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
                            <td><?php echo ($vo["User"]["username"]); ?></td>
                            <td><?php echo ($vo["address_info"]["name"]); ?></td>
                            <td><?php echo ($vo["total_fee"]); ?></td>
                            <td>
                                <?php switch($vo["trade_status"]): case "WAIT_BUYER_PAY": ?>待付款<?php break;?>
                                    <?php case "WAIT_SELLER_SEND_GOODS": ?>未发货<?php break;?>
                                    <?php case "WAIT_BUYER_CONFIRM_GOODS": ?>已发货<?php break;?>
                                    <?php case "TRADE_FINISHED": ?>已完结<?php break;?>
                                    <?php default: ?>待付款<?php endswitch;?>
                            </td>
                            <td><?php echo (date("Y-m-d H:i:s",$vo["create_date"])); ?></td>
                            <td>
                                <?php switch($vo["trade_status"]): case "WAIT_BUYER_PAY": ?>-<?php break;?>
                                    <?php case "WAIT_SELLER_SEND_GOODS": ?><a target="_blank" href="https://lab.alipay.com/consume/queryTradeDetail.htm?actionName=SEND_GOODS&tradeNo=<?php echo ($vo["trade_no"]); ?>">发货</a><?php break;?>
                                    <?php case "WAIT_BUYER_CONFIRM_GOODS": ?>-<?php break;?>
                                    <?php case "TRADE_FINISHED": ?>-<?php break;?>
                                    <?php default: ?>-<?php endswitch;?>
                            </td>
                            <td><div style="color:#ec651a;cursor:pointer"  class="znxx03" status="1" >展开</div></td>
                            <td class="xnfy520-function-index-table-td-checkbox" style="display: none;">
                                <input class="xnfy520-function-index-table-check-this" type="checkbox" name="deleteid[]" value="<?php echo ($vo["id"]); ?>" />
                            </td>
                        </tr>
                        <tr class="znxx01" style="display: none;border: none;">
                            <td colspan="8" style="padding:1px; border:none;" class="none-background-color">
                                <table width="100%" cellpadding="0" cellspacing="0" class="tab0001">
                                    <?php if(is_array($vo["commodify_list"])): $i = 0; $__LIST__ = $vo["commodify_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_mo_ci): $mod = ($i % 2 );++$i;?><tr style="line-height: 0;">
                                            <td colspan="7" style="padding-top:0; border:none">
                                                <div class="znxx_m" style="width:100%; padding:0;">
                                                    <table  width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;border:none">
                                                        <tr style="border:none;">
                                                            <td width="100" align="center" style="border: none;">
                                                                <a target="_blank" href="__ROOT__/Shops/<?php echo ($vo_mo_ci["merchant_no"]); ?>/details/<?php echo ($vo_mo_ci["id"]); ?>.html">
                                                                    <img src="__PUBLIC__/Content/CommodityList/cut_<?php echo ($vo_mo_ci["image"]); ?>" style="width:30px; height:30px; padding:3px; border:1px solid #ddd;position: relative;top: 4px;" />
                                                                </a>
                                                            </td>
                                                            <td style="color:#ec651a;border: none;text-align: left;">
                                                                <a target="_blank" href="__ROOT__/Shops/<?php echo ($vo_mo_ci["merchant_no"]); ?>/details/<?php echo ($vo_mo_ci["id"]); ?>.html">
                                                                    <?php echo ($vo_mo_ci["name"]); ?>　<?php if(empty($vo_mo_ci["CommoditySpecification"])): ?>[ <?php echo ($vo_mo_ci["default_specification"]); ?> ]<?php else: ?>[ <?php echo ($vo_mo_ci["CommoditySpecification"]["specification"]); ?> ]<?php endif; ?>
                                                                </a>
                                                            </td>
                                                            <td style="border: none;" width="150" align="center">商户：<a target="_blank" href="__ROOT__/Shops/<?php echo ($vo_mo_ci["merchant_no"]); ?>.html"><?php echo ($vo_mo_ci["merchant_name"]); ?></a></td>
                                                            <td style="border: none;" width="150" align="center">状态：
                                                                <?php if(($vo_mo_ci["deliver_goods_status"]) == "1"): ?>商户已发货
                                                                    <?php else: ?>
                                                                    <span style="color: #ff0000;font-weight: bold;;">商户未发货</span><?php endif; ?>
                                                            </td>
                                                            <td style="border: none;" width="100" align="center">单价：&#165; <?php echo ($vo_mo_ci["current_price"]); ?></td>
                                                            <td style="border: none;" width="100" align="center">数量： <?php echo ($vo_mo_ci["buy_quantity"]); ?></td>
                                                            <td style="border: none;" width="150" align="center">小计：&#165; <?php echo ($vo_mo_ci["total_price"]); ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <tr>
                                        <td colspan="7" style="border: none;">
                                            <?php if(!empty($vo["gmt_payment"])): ?>付款时间：
                                                <?php echo ($vo["gmt_payment"]); ?>　<?php endif; ?>
                                            收货人信息：
                                            <strong>姓名</strong>：<?php echo ($vo["address_info"]["name"]); ?>　
                                            <strong>地址</strong>：<?php echo ($vo["address_info"]["provinces"]); ?>　<?php echo ($vo["address_info"]["street"]); ?>　
                                            <strong>邮编</strong>：<?php echo ($vo["address_info"]["zip"]); ?>　
                                            <strong>手机</strong>：<?php echo ($vo["address_info"]["mobile"]); ?>
                                            <?php if(!empty($vo["address_info"]["phone"])): ?>　<strong>电话</strong>：<?php echo ($vo["address_info"]["pre_phone"]); ?>-<?php echo ($vo["address_info"]["phone"]); endif; ?>
                                        </td>
                                    </tr>
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

    var define_page = "<?php echo ($_GET['page']); ?>";  //当前page值

    var define_pid = "<?php echo (($_GET['pid'])?($_GET['pid']):0); ?>";  //当前pid值

    var define_rid = "<?php echo ($_GET['rid']); ?>";  //当前rid值

    var define_sid = "<?php echo ($_GET['sid']); ?>";  //当前sid值

    var define_cid = "<?php echo ($_GET['cid']); ?>";  //当前cid值

    var define_id = "<?php echo ($_GET['id']); ?>";    //当前id值

    var define_userid = "<?php echo ($Userinfo["id"]); ?>";

</script>

</body>
</html>