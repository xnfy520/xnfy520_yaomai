<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理员登录</title>
<style type="text/css">
    <!--
    body {
        margin-left: 0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        background-color: #1D3647;
    }

    .login_bg {
        background-image: url(../Public/images/login_bg.jpg);
        background-repeat: repeat-x;
    }

    .left_txt {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        line-height: 25px;
        color: #666666;
    }

    .left_txt3 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        line-height: 25px;
        color: #003366;
        text-decoration: none;
    }

        /* simple css-based tooltip */
    .tooltip {
        background-color:#000;
        border:1px solid #fff;
        padding:10px 15px;
        display:none;
        color:#fff;
        text-align:left;
        font-size:12px;
        z-index: 99999;
        /* outline radius for mozilla/firefox only */
        -moz-box-shadow:0 0 10px #000;
        -webkit-box-shadow:0 0 10px #000;
    }
    -->
</style>
    <script src="__PUBLIC__/js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="__PUBLIC__/js/jBox/Skins/GreyBlue/jbox.css"/>
    <script type="text/javascript" src="__PUBLIC__/js/jBox/jquery.jBox-2.3.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/jBox/i18n/jquery.jBox-zh-CN.js"></script>
    <!--<script type=text/javascript src="__PUBLIC__/js/jquery.tools.min.js"></script>-->
    <script src="../Public/js/Public.js" type="text/javascript"></script>
</head>
<body>
<table width="100%" height="166" border="0" cellpadding="0"
       cellspacing="0">
    <tr>
        <td height="42" valign="top">
            <table width="100%" height="42" border="0" cellpadding="0"
                   cellspacing="0" class="login_top_bg">
                <tr>
                    <td width="1%" height="21">&nbsp;</td>
                    <td height="42">&nbsp;</td>
                    <td width="17%">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">
            <table width="100%" height="532" border="0" cellpadding="0"
                   cellspacing="0" class="login_bg">
                <tr>
                    <td width="49%" align="right">
                        <table width="91%" height="532" border="0" cellpadding="0"
                               cellspacing="0" class="login_bg2">
                            <tr>
                                <td height="138" valign="top">
                                    <table width="89%" height="427" border="0" cellpadding="0"
                                           cellspacing="0">
                                        <tr>
                                            <td height="149">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td height="80" align="right" valign="top"><img
                                                    src="../Public/images/logo_login.png" width="279" height="68"></td>
                                        </tr>
                                        <tr>
                                            <td height="198" align="right" valign="top">
                                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td width="35%">&nbsp;</td>
                                                        <td height="25" colspan="2" class="left_txt">
                                                            <p>1- 时间造就我们，最优秀实力造就我们...</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td height="25" colspan="2" class="left_txt">
                                                            <p>2- 强大的后台系统，管理内容易如反掌...</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td height="25" colspan="2" class="left_txt">
                                                            <p>3- 提供完备的项目售后服务支持，服务内容包括系统故障报修、在线咨询、操作培训、续费等等...</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td width="30%" height="40"><img src="../Public/images/icon-demo.gif"
                                                                                         width="16" height="16"><a href="http://www.whldcy.com/" target="_blank"
                                                                                                                   class="left_txt3">联系我们</a></td>
                                                        <td width="35%"><img src="../Public/images/icon-login-seaver.gif"
                                                                             width="16" height="16"><a href="javascript:;" class="left_txt3">027-67886151</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                    <td width="1%">&nbsp;</td>
                    <td width="50%" valign="bottom">
                        <table width="100%" height="59" border="0" align="center"
                               cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="4%">&nbsp;</td>
                                <td width="96%" height="38"><span class="login_txt_bt">登陆信息网后台管理</span></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td height="21">
                                    <table cellSpacing="0" cellPadding="0" width="100%" border="0"
                                           id="table211" height="328">
                                        <tr>
                                            <td height="164" colspan="2" align="middle">
                                                <form method="post" action="javascript:;" id="ajax_admin_check_login">
                                                    <table cellSpacing="0" cellPadding="0" width="100%" border="0"
                                                           height="143" id="table212">
                                                        <tr>
                                                            <td width="13%" height="38" class="top_hui_text">
                                                                <span class="login_txt">管理员：&nbsp;&nbsp; </span>
                                                            </td>
                                                            <td height="38" colspan="2" class="top_hui_text">
                                                                <input name="login_name" class="editbox4" size="20">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="13%" height="35" class="top_hui_text"><span
                                                                    class="login_txt">密码：&nbsp;&nbsp; </span></td>
                                                            <td height="35" colspan="2" class="top_hui_text"><input
                                                                    class="editbox4" type="password" size="20" name="password"> <img
                                                                    src="../Public/images/luck.gif" width="19" height="18"></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="13%" height="35"><span class="login_txt">验证码：</span></td>
                                                            <td height="35" colspan="2" class="top_hui_text">
                                                                <img id="clickcode" src="__APP__/Public/verify" style="position: relative;top:5px;" width="70" height="20" />
                                                                <input class=wenbenkuang name="verify" id="insertcode" type="text" maxLength=4 title="验证码不能为空，且必须为数字"
                                                                    size=10>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="35">&nbsp;</td>
                                                            <td width="20%" height="35"><input name="denglu" type="submit"
                                                                                               class="button" id="Submit" value="登录"></td>
                                                            <td width="67%" class="top_hui_text"></td>
                                                        </tr>
                                                    </table>
                                                    <br>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="433" height="164" align="right" valign="bottom"><img
                                                    src="../Public/images/login-wel.gif" width="242" height="138"></td>
                                            <td width="57" align="right" valign="bottom">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="20">
            <table width="100%" border="0" cellspacing="0" cellpadding="0"
                   class="login-buttom-bg">
                <tr>
                    <td align="center"><span class="login-buttom-txt">Copyright &copy;
                        2009-2010 www.865171.cn</span></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
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

    var define_page = "<?php echo ($_GET['page']); ?>";  //当前sid值

    var define_sid = "<?php echo ($_GET['sid']); ?>";  //当前sid值

    var define_cid = "<?php echo ($_GET['cid']); ?>";  //当前cid值

    var define_id = "<?php echo ($_GET['id']); ?>";    //当前id值

</script>
</body>
</html>