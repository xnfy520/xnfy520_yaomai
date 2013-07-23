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
                            <a id="Left-System-configuration" class="top-action" href="__APP__/System/configuration">系统配置</a>
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

                    </ul>

                </li>

                <li>
                    <a class="xnfy520_left_title" href="javascript:;">广告管理</a>

                    <ul>

                        <li><a  id="Left-AdvertCategory" class="top-action" href="__APP__/AdvertCategory/index">广告分类</a></li>
                        <li><a  id="Left-AdvertList" class="top-action" href="__APP__/AdvertList/index">广告列表</a></li>
                        <li><hr /></li>
                        <?php if(is_array($AdvertCategory_left)): $i = 0; $__LIST__ = $AdvertCategory_left;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_acl): $mod = ($i % 2 );++$i;?><li><a  id="Left-AdvertList-index-pid-<?php echo ($vo_acl["id"]); ?>" class="top-action" href="__APP__/AdvertList/index/pid/<?php echo ($vo_acl["id"]); ?>"><?php echo ($vo_acl["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>

                <li>
                    <a class="xnfy520_left_title" href="javascript:;">区域管理</a>

                    <ul>

                        <li><a  id="Left-Provinces" class="top-action" href="__APP__/Provinces/index">地域列表</a></li>
                        <li><a  id="Left-Provinces-province" class="top-action" href="__APP__/Provinces/province">省份列表</a></li>
                        <li><a  id="Left-Provinces-city" class="top-action" href="__APP__/Provinces/city">市级列表</a></li>
                        <li><a  id="Left-Provinces-county" class="top-action" href="__APP__/Provinces/county">县区列表</a></li>

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
                                        <a  id="Left-User-index-rid-<?php echo ($vo_user_list["id"]); ?>" class="top-action" href="__APP__/User/index/rid/<?php echo ($vo_user_list["id"]); ?>"><?php echo ($vo_user_list["name"]); ?></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </li>
            <li>

                <a class="xnfy520_left_title" href="javascript:;">商品管理</a>

                <ul>

                    <li><a  id="Left-CommodityCategory" class="top-action" href="__APP__/CommodityCategory/index">商品分类</a></li>
                    <li><a  id="Left-CommoditySubclass" class="top-action" href="__APP__/CommoditySubclass/index">商品子类</a></li>
                    <!--<li><a  id="Left-CommodityList" class="top-action" href="__APP__/CommodityList/index">商品列表</a></li>-->
                    <li><hr /></li>
                    <?php if(is_array($CommodityCategory_left)): $i = 0; $__LIST__ = $CommodityCategory_left;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vocc_left): $mod = ($i % 2 );++$i; endforeach; endif; else: echo "" ;endif; ?>
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
                        </tr>

                    </volist>
                </empty>
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