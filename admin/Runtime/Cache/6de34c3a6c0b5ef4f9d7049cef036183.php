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

<div id="VoteCommodity-add-edit">

    <div id="xnfy520-function-index-title">
        修改商品
    </div>

    <form action="javascript:;" method="POST" name="VoteCommodity-edit">
        <input type="hidden" name="image" value="<?php echo ($data["image"]); ?>" />
        <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
        <ul style="margin-top: 10px;">
            <li class="xnfy520-function-index-add-edit-ul-li">
                <strong>标　　题：</strong><input type="text" maxlength="50" style="width: 720px;margin: 0 0 0 5px;text-indent: 5px;padding: 2px;" name="name" value="<?php echo ($data["name"]); ?>" />　
            </li>
            <li class="xnfy520-function-index-add-edit-ul-li" style="margin-top: 2px;">
                <strong>上　　架：</strong>
                <select name="enable" style="width: 56px;padding: 2px">
                    <?php if(($data["enable"]) == "1"): ?><option value="1" selected="selected">是</option>
                        <option value="0">否</option>
                        <?php else: ?>
                        <option value="1">是</option>
                        <option value="0" selected="selected">否</option><?php endif; ?>
                </select>　
                <strong>推　荐：</strong>
                <select name="recommend" style="width: 56px;padding: 2px">
                    <?php if(($data["recommend"]) == "1"): ?><option value="1" selected="selected">是</option>
                        <option value="0">否</option>
                    <?php else: ?>
                        <option value="1">是</option>
                        <option value="0" selected="selected">否</option><?php endif; ?>
                </select>
            </li>
            <li class="xnfy520-function-index-add-edit-ul-li" style="margin-top: 3px;">
                <strong>售　　价：</strong>
                <input type="text" name="price" value="<?php echo (($data["price"])?($data["price"]):'0.00'); ?>" style="width: 48px;text-align: center;height: 18px;" maxlength="8" />　
                <strong>订　金：</strong>
                <input type="text" name="subscription" value="<?php echo (($data["subscription"])?($data["subscription"]):'0.00'); ?>" style="width: 47px;text-align: center;height: 18px;" maxlength="10" />　
                <strong>预订基数：</strong>
                <input type="text" name="subscribe" value="<?php echo ($data["subscribe"]); ?>" style="width: 47px;text-align: center;height: 18px;" maxlength="10" />　
                <strong>截止日期：</strong>
                <input type="text" name="expiration_date" value="<?php echo (date("Y-m-d",($data["expiration_date"])?($data["expiration_date"]):'')); ?>" class="Wdate" type="text" onfocus="WdatePicker({minDate:'%y-%M-{%d+1}'})" readonly="readonly" style="width: 90px;height: 18px;text-indent:5px" />　
                <strong>排　序：</strong>
                <input title="值必须在0-255 (必填)" type="text" name="sort"  value="<?php echo (($data["sort"])?($data["sort"]):0); ?>" style="width: 50px;text-align: center;height: 18px;" maxlength="3" />　
                <strong>体　积：</strong>
                <input type="text" name="measure"  value="<?php echo (($data["measure"])?($data["measure"]):0.00); ?>" style="width: 50px;text-align: center;height: 18px;" maxlength="8" />
            </li>
            <li class="xnfy520-function-index-add-edit-ul-li" style="margin-top: 5px;height: 50px;background: #d6fffa;padding: 5px 0;">

                  <span class="positioning_images" style="float: left;position: relative;margin-left: 8px;width: 50px;height: 50px;display: block;padding-right: 16px;border-right: 1px dashed blue;">
                        <img class="thumb_image"
                             style="width:50px;height:50px;cursor: pointer;margin-right: 5px;"
                             flag="1"
                             info='{"width":<?php echo ($data["width"]); ?>,"height":<?php echo ($data["height"]); ?>,"type":"<?php echo ($data["type"]); ?>"}'
                             src="__PUBLIC__/Content/VoteCommodity/cut_<?php echo ($data["image"]); ?>" />
                        <img class="delete_images" src="../Public/images/bullet_cross.png" style="position: absolute;right: 12px;top:1px;cursor: pointer;display: none;" />
                    </span>

                    <span style="margin-left: 7px;float: left;" id="insert_more_image">
                         <!--<span class="positioning_images_list" style="float: left;position: relative;width: 50px;height: 50px;display: block;padding-right: 16px;">-->
                            <!--<img class="thumb_image_list"-->
                                 <!--style="width:50px;height:50px;cursor: pointer;margin-right: 5px;"-->
                                 <!--flag="0"-->
                                 <!--src="__PUBLIC__/images/default.jpg" />-->
                            <!--<img class="delete_images_list" src="../Public/images/bullet_cross.png" style="position: absolute;right: 12px;top:1px;cursor: pointer;display: none;" />-->
                        <!--</span>-->
                        <?php if(is_array($ciinfo)): $i = 0; $__LIST__ = $ciinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vociinfo): $mod = ($i % 2 );++$i;?><span class="positioning_images_list"
                                style="float: left;position: relative;width: 50px;height: 50px;display: block;padding-right: 16px;">
                                <img class="thumb_image_list"
                                style="width:50px;height:50px;cursor: pointer;margin-right: 5px;" info='{"width":<?php echo ($vociinfo["width"]); ?>,"height":<?php echo ($vociinfo["height"]); ?>,"type":"<?php echo ($vociinfo["type"]); ?>"}' flag="1"
                                src="__PUBLIC__/Content/CommodityImages/cut_<?php echo ($vociinfo["image"]); ?>" />
                                <img delete_id="<?php echo ($vociinfo["id"]); ?>" class="delete_images_list" src="__PUBLIC__/images/bullet_cross.png" style="position: absolute;right: 12px;top:1px;cursor: pointer;display: none;" />
                                <input type="hidden" class="image_more" name="image_more[]" value="<?php echo ($vociinfo["image"]); ?>" />
                            </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </span>
            </li>
            <li class="xnfy520-function-index-add-edit-ul-li" style="margin-top: 3px;background: #d6fffa;">
                <button id="file_upload_button" type="button" style="cursor: pointer;padding:5px 2px;margin-left:4px">封面上传</button>　
                <button id="file_upload_button_more" type="button" style="cursor: pointer;padding:5px 2px">图片上传</button>　
                <span style="font-size: 12px;">( 封面或商品请上传高宽比例为1：1的图片，商品图片最多为10张 )</span>
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
                <span class="switch_textarea" style="background: #546C83;color:white;">描述</span>
                <span class="switch_textarea">简介</span>
                <button type="button" style="margin: 0;padding:5px 2px" id="Parameter">送货和退货</button>
                <button type="button" style="margin: 0;padding:5px 2px" id="Parameter2">产品尺寸</button>
                <button type="button" style="margin: 0;padding:5px 2px" id="Parameter3">产品详细信息</button>
 
                <select id="stylist_id" name="stylist_id" style="padding:4px 2px" sid="<?php echo ($data["stylist_id"]); ?>" ssay="<?php echo ($data["stylist_say"]); ?>">
                    <option value="0">选择设计师</option>
                    <?php if(is_array($stylist)): $i = 0; $__LIST__ = $stylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_s): $mod = ($i % 2 );++$i; if(($vo_s["id"]) == $data["stylist_id"]): ?><option value="<?php echo ($vo_s["id"]); ?>" selected="selected"><?php echo ($vo_s["name"]); ?></option>
                        <?php else: ?>
                            <option value="<?php echo ($vo_s["id"]); ?>"><?php echo ($vo_s["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <span class="stylist_say" style="display:none">
                    <input type="text" maxlength="50" style="width: 385px;margin: 0 0 0 5px;text-indent: 5px;padding: 2px;" name="stylist_say" value="<?php echo ($data["stylist_say"]); ?>" />　
                </span>
            </li>
            <li class="texli" style="margin-bottom: 10px;">
                 <textarea class="description" name="description" style="resize: none;position:absolute;visibility: hidden;float: left;"><?php echo ($data["description"]); ?></textarea>
            </li>
            <li class="texli" style="margin-bottom: 10px;display: none;">
                <textarea class="textareas" name="details" style="resize: none;position:absolute;visibility: hidden;float: left;"><?php echo ($data["details"]); ?></textarea>
            </li>
            <li>
                <input style="margin-left: 0;" type="submit" name="" value="修改" />
            </li>
        </ul>
        <ul id="wait-insert-parameter" style="display:none">
            <?php if(is_array($data["p1"])): $i = 0; $__LIST__ = $data["p1"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_p1): $mod = ($i % 2 );++$i;?><li>
                    参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key[]" maxlength="10" value="<?php echo (key($vo_p1)); ?>" />　
                    参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value[]" maxlength="100" value="<?php echo (current($vo_p1)); ?>" />　
                    <img class="delete_parameter" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
         <ul id="wait-insert-parameter2" style="display:none">
            <?php if(is_array($data["p2"])): $i = 0; $__LIST__ = $data["p2"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_p2): $mod = ($i % 2 );++$i;?><li>
                    参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key2[]" maxlength="10" value="<?php echo (key($vo_p2)); ?>" />　
                    参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value2[]" maxlength="100" value="<?php echo (current($vo_p2)); ?>" />　
                    <img class="delete_parameter2" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
         <ul id="wait-insert-parameter3" style="display:none">
            <?php if(is_array($data["p3"])): $i = 0; $__LIST__ = $data["p3"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_p3): $mod = ($i % 2 );++$i;?><li>
                    参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key3[]" maxlength="10" value="<?php echo (key($vo_p3)); ?>" />　
                    参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value3[]" maxlength="100" value="<?php echo (current($vo_p3)); ?>" />　
                    <img class="delete_parameter3" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </form>
    </div>

<script src="__PUBLIC__/js/ajaxupload.3.6.js" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/js/kindeditor/kindeditor-min.js"></script>
<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('.description', {
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
        editor2 = K.create('.textareas', {
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
<script type="text/javascript">
    $(function(){
        $(".switch_textarea").live('click',function(){
            self = $(this);

            $(".switch_textarea").css("background","#ccc").css("color","#C61A69");
            self.css("background","#546C83").css("color","white");

            $(".texli").css("display","none");

            $(".texli:eq("+self.index()+")").css("display","block");

        });

        if($("[name=stylist_id]").val()!=0){
            $(".stylist_say").css('display','inline-block');
        }

        $("[name=stylist_id]").change(function(){
            console.log($(this).val());
            console.log($(this).attr('sid'));
            if($(this).val()!=$(this).attr('sid')){
                $("[name=stylist_say]").val('');
            }else{
                $("[name=stylist_say]").val($(this).attr('ssay'));
            }
            if($(this).val()!=0){
                $(this).next().css('display','inline-block');
            }else{
                $(this).next().css('display','none');
            }
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