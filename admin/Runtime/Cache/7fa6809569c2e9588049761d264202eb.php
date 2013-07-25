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

<div id="GrouponCommodity-add-edit">

    <div id="xnfy520-function-index-title">
        添加商品
    </div>

    <form action="javascript:;" method="POST" name="GrouponCommodity-add">
        <input type="hidden" name="image" />
        <ul style="margin-top: 10px;">
            <li class="xnfy520-function-index-add-edit-ul-li">
                <strong>标　　题：</strong><input type="text" maxlength="50" style="width: 720px;margin: 0 0 0 5px;text-indent: 5px;padding: 2px;" name="name" />　
            </li>
            <li class="xnfy520-function-index-add-edit-ul-li" style="margin-top: 2px;">
                <strong>所属分类：</strong>
                <select name="pid" style="padding: 2px;margin-left: 0;min-width:50px">
                    <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i; if(!empty($_GET['pid'])): if(($volist["id"]) == $_GET['pid']): ?><option selected="selected" value="<?php echo ($volist["id"]); ?>"><?php echo ($volist["name"]); ?></option>
                                <?php else: ?>
                                <option value="<?php echo ($volist["id"]); ?>"><?php echo ($volist["name"]); ?></option><?php endif; ?>
                            <?php else: ?>
                            <option value="<?php echo ($volist["id"]); ?>"><?php echo ($volist["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>　
                <strong>上　　架：</strong>
                <select name="enable" style="width: 53px;padding: 2px">
                    <option value="1" selected="selected">是</option>
                    <option value="0">否</option>
                </select>　
                <strong>推　　荐：</strong>
                <select name="recommend" style="width: 53px;padding: 2px">
                    <option value="1">是</option>
                    <option value="0" selected="selected">否</option>
                </select>
            </li>
            <li class="xnfy520-function-index-add-edit-ul-li" style="margin-top: 3px;">
                <strong>原　　价：</strong>
                    <input type="text" name="org_price" value="0.00" style="width: 47px;text-align: center;height: 18px;" maxlength="8" />　
                <strong>现　　价：</strong>
                    <input type="text" name="price" value="0.00" style="width: 47px;text-align: center;height: 18px;" maxlength="8" />　
                <strong>截止日期：</strong>
                <input type="text" name="expiration_date" class="Wdate" type="text" onfocus="WdatePicker({minDate:'%y-%M-{%d+1}'})" readonly="readonly" style="width: 100px;height: 18px;text-indent:5px" />　
                <strong>排　　序：</strong>
                <input title="值必须在0-255 (必填)" type="text" name="sort" value="99" style="width: 49px;text-align: center;height: 18px;" maxlength="3" />　
                <strong>商品体积：</strong>
                <input type="text" name="measure" value="0.00" style="width: 47px;text-align: center;height: 18px;" maxlength="8" />
            </li>
            <li class="xnfy520-function-index-add-edit-ul-li" style="margin-top: 5px;height: 50px;background: #d6fffa;padding: 5px 0;">
                  <span class="positioning_images" style="float: left;position: relative;margin-left: 8px;width: 50px;height: 50px;display: block;padding-right: 16px;border-right: 1px dashed blue;">
                        <img class="thumb_image"
                             style="width:50px;height:50px;cursor: pointer;margin-right: 5px;"
                             flag="0"
                             src="__PUBLIC__/images/default.jpg" />
                        <img class="delete_images" src="../Public/images/bullet_cross.png" style="position: absolute;right: 12px;top:1px;cursor: pointer;display: none;" />
                    </span>
            </li>
            <style type="text/css">
                .switch_textarea{
                    width:100px;
                    padding: 5px 10px;
                    background-color: #ccc;
                    cursor:pointer;
                }
            </style>
            <li style="height: 25px;line-height: 25px;margin-bottom: 2px;">
                <span class="switch_textarea" style="background: #546C83;color:white;">详情</span>
                 <button id="file_upload_button" type="button" style="cursor: pointer;padding:5px 2px;margin-left:4px">封面上传</button>　
                <span style="font-size: 12px;">( 封面请上传高宽比例为1：1的图片 )</span>
            </li>
            <li class="texli" style="margin-bottom: 10px;">
                 <textarea class="details" name="details" style="resize: none;position:absolute;visibility: hidden;float: left;"></textarea>
            </li>
            <li>
                <input style="margin-left:0;" type="submit" name="" value="添加" />
            </li>
        </ul>
    </form>
    </div>

<script src="__PUBLIC__/js/ajaxupload.3.6.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/kindeditor/kindeditor-min.js"></script>
<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('.details', {
            newlineTag : 'br',
            resizeType : 1,
            allowPreviewEmoticons : false,
            allowImageUpload : true,
            width:796,
            height:300,
            pasteType : 2,
            filterMode : false,
            items :  [
                'source','justifyleft', 'justifycenter', 'justifyright','justifyfull', 
                'insertorderedlist','insertunorderedlist',
                'clearhtml', 'quickformat',
                'forecolor', 'hilitecolor', 'bold','italic', 'underline', 'strikethrough',
                'removeformat','emoticons', 'link', 'unlink', 'selectall',  'fullscreen'
            ]
        });

    });

</script>

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