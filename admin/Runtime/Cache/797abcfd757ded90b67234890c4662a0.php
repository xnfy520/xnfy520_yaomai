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

                        <li><a id="Left-MainCategory" class="top-action" href="__APP__/MainCategory/index">团购分类</a></li>

                        <li><a id="Left-MainCategory" class="top-action" href="__APP__/MainCategory/index">团购商品</a></li>

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
        帮助列表
    </div>

    <div id="xnfy520-function-index-nav">
        <a href="__APP__/HelpCenterInformation/index">全部</a>
        <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voc): $mod = ($i % 2 );++$i;?><a href="__APP__/HelpCenterInformation/index/pid/<?php echo ($voc["id"]); ?>"><?php echo ($voc["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

    <div id="xnfy520-function-index-search">

        <span id="xnfy520-function-index-add">添 加</span>

        <form action="__APP__/HelpCenterInformation/index<?php if(!empty($_GET['pid'])): ?>/pid/<?php echo ($_GET['pid']); endif; if(!empty($_GET['cid'])): ?>/cid/<?php echo ($_GET['cid']); endif; if(!empty($_GET['sid'])): ?>/sid/<?php echo ($_GET['sid']); endif; ?>" method="post" name="form_search"  style="line-height: 35px;">
            关键字 <input type="text" name="key" /> 按&nbsp;
            <select name="search">
                <option value="2">名称</option>
            </select>
            <?php if(empty($list)): ?><input type="submit" value="搜索" disabled="disabled" />
                <?php else: ?>
                <input type="submit" value="搜索" /><?php endif; ?>
        </form>

    </div>

    <div id="xnfy520-function-index-content">

        <form action="javascript:;" method="post" name="HelpCenterInformation-del" class="delete">
            <table id="xnfy520-function-index-table">
                <thead>
                <tr>
                    <th>名称</th>
                    <th class="xnfy520-function-index-table-th-50">开启</th>
                    <th class="xnfy520-function-index-table-th-50">排序</th>
                    <th class="xnfy520-function-index-table-th-50">浏览</th>
                    <th class="xnfy520-function-index-table-th-150">创建时间</th>
                    <th id="xnfy520-function-index-table-th-check-all">
                        <input type="button" value="全选" />
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($list)): ?><tr><td colspan="6" style="height:50px;">暂无数据</td></tr>
                    <?php else: ?>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="xnfy520-function-index-table-td-name" style="width: auto;">
                                   <span class="xnfy520-function-index-edit">
                                       <?php if((mb_strlen($vo["name"],'utf-8')) > "25"): ?><span title="<?php echo ($vo["name"]); ?>"><?php echo (mb_substr($vo["name"],0,25,"utf-8")); ?>...</span>
                                       <?php else: ?>
                                           <span><?php echo ($vo["name"]); ?></span><?php endif; ?>
                                    </span>
                            </td>
                            <td class="xnfy520-function-index-table-td-sort">
                                <?php if(($vo["publish"]) == "1"): ?><span class="switch_status" by="<?php echo ($vo["id"]); ?>" type="publish" value="<?php echo ($vo["publish"]); ?>">是</span>
                                    <?php else: ?>
                                    <span class="switch_status" by="<?php echo ($vo["id"]); ?>" type="publish" value="<?php echo ($vo["publish"]); ?>">否</span><?php endif; ?>
                                <span style="display: none;" data_on="确认关闭？" data_off="确认启用？"></span>
                            </td>
                            <td class="xnfy520-function-index-table-td-sort"><span class="xnfy520-function-index-edit"><?php echo ($vo["sort"]); ?></span></td>
                            <td>
                                <?php echo ($vo["views"]); ?>
                            </td>
                            <td>
                                <?php echo (date("Y-m-d H:i:s",$vo["create_date"])); ?>
                            </td>
                            <td class="xnfy520-function-index-table-td-checkbox">
                                <input class="xnfy520-function-index-table-check-this" type="checkbox" name="deleteid[]" value="<?php echo ($vo["id"]); ?>" />
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

                    <span style="float: right;"><input type="submit" value="删除" /></span>

                </div><?php endif; ?>
        </form>

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