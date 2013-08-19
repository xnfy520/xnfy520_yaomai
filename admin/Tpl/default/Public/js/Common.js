
$(function(){

    var form_check ={
        info:'',
        rules:{

            english_name:{//英文名
                rule:'^[a-zA-Z0-9_]+$',
                tip:'必须为字母，数字，或下划线'
            },

            positive_integer:{//正整数
                rule:'^[0-9]+$',
                tip:'必须为数字'
            },

            email:{//电子邮箱
                rule:'^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$',
                tip:'必须为邮箱格式'
            },

            ip:{
                rule:'((?:(?:25[0-5]|2[0-4]\d|[01]?\d?\d)\.){3}(?:25[0-5]|2[0-4]\d|[01]?\d?\d))',
                tip:'必须为IP地地址格式'
            }

        },
        tmp:'',

        check_length: //检测字符串长度
            function(key,value,min,max)
            {
                if(value.length<min || value.length>max){
                    this.info = key+'不能少于'+min+'位，大于'+max+'位';
                    return false;
                }else{
                    this.info = null;
                    return true;
                }
            },

        check_regular_matching:
            function(key,value,regular){
                var reg = new RegExp(this.rules[regular].rule);
                if(!reg.test(value)){
                    this.info = key+this.rules[regular].tip;
                    return false;
                }else{
                    this.info = null;
                    return true;
                }
            }

    };

	$('.menu').lksMenu();

    $("#content").css("min-height",$(window).height()-68).css("height",$(window).height()-68);
    $("#left").height($("#content").css("height"));

    $(window).resize(function() {
        $("#content").css("min-height",$(window).height()-68).css("height",$(window).height()-68);
        $("#left").height($("#content").css("height"));
    });

    // if(define_action_name=='index' || define_action_name=='add' || define_action_name=='edit'){
    //     if(define_module_name=='IntegralGiftList' || define_module_name =='IntegralExchangeLogs'){
    //         var current = define_module_name;
    //     }else if(define_module_name=='OrderList'){
    //         var current = define_module_name+'-'+define_action_name;
    //     }else{
    //         var current = define_module_name+((define_pid!='' && define_pid!=0) ? '-'+define_action_name+'-pid-'+define_pid : '')+((define_cid!='' && define_cid!=0) ? '-'+define_action_name+'-cid-'+define_cid : '')+((define_rid!='' && define_rid!=0) ? '-'+define_action_name+'-rid-'+define_rid : '');
    //     }
    // }else{
    //     var current = define_module_name+'-'+define_action_name;
    // }
    var sd = [
                'System','SystemAnnouncement','LastUpdate','Blogroll','OtherLinks','Evaluate',
                'AdvertCategory','AdvertList',
                'Address','Provinces','Role',
                'CommodityCategory','CommoditySubclass','CommodityList',
                'VoteCommodity',
                'GrouponCategory','GrouponCommodity',
                'OrderList',
                'HelpCenterCategory','HelpCenterInformation',
                'TemplateList','Stylist'
    ];
    if(define_module_name=='User'){
        $("#Left-Role").css("background","#4698CA").css("color","#fff").parents('ul').css("display","block");
    }else if(define_module_name=='CommodityDetails'){
        $("#Left-CommodityList").css("background","#4698CA").css("color","#fff").parents('ul').css("display","block");
    }else if(define_module_name=='VoteDetails'){
        $("#Left-VoteCommodity").css("background","#4698CA").css("color","#fff").parents('ul').css("display","block");
    }else if(define_module_name=='OrderList'){
        if(define_type){
            $("#Left-OrderList"+define_type).css("background","#4698CA").css("color","#fff").parents('ul').css("display","block");
        }
    }else{
        for(var i in sd){
            if(sd[i]==define_module_name){
                $("#Left-"+sd[i]).css("background","#4698CA").css("color","#fff").parents('ul').css("display","block");
                break;
            }
        }
    }

// var md = define_module_name;
// switch(define_module_name){
//     case 'User':
//         md = 'Role';
//         break;
//     default:
//         md = define_module_name;
// }

// var current = md;

    $("[name=username]").live('keyup',function(){
        if(this.value!=this.value.toLowerCase()){
            this.value=this.value.toLowerCase();
        }
    });

//    if(define_module_name=='InformationList'){
//            if(define_cid==1){
//                $("#Left-Conferences").css("background","#4698CA").css("color","#fff");
//            }else if(define_cid==2){
//                $("#Left-News").css("background","#4698CA").css("color","#fff");
//            }else if(define_cid==3){
//                $("#Left-AboutUs").css("background","#4698CA").css("color","#fff");
//            }else if(define_cid==4){
//                $("#Left-Resources").css("background","#4698CA").css("color","#fff");
//            }else{
//                $("#Left-"+define_module_name).css("background","#4698CA").css("color","#fff");
//            }
//    }else{
//        $("#Left-"+define_module_name).css("background","#4698CA").css("color","#fff").parents('ul').css("display","block");
//    }

    //AJAX管理员登出验证
    $("#ajax_admin_check_logout").click(function(){
        var submit = function (v, h, f) {
            if (v == 'ok'){
                $.ajax({
                    url: define_app_url+'/Public/ajax_admin_check_logout',
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=msg.data}});
                        }else{
                            return false;
                        }
                    }
                });
            }
            return true; //close
        };
        jBox.confirm("确认退出？", "提示", submit,{top: '40%'});
    });

//    jBox.defaults = {
//        id: null, /* 在页面中的唯一id，如果为null则自动生成随机id,一个id只会显示一个jBox */
//        top: '15%', /* 窗口离顶部的距离,可以是百分比或像素(如 '100px') */
//        border: 5, /* 窗口的外边框像素大小,必须是0以上的整数 */
//        opacity: 0.1, /* 窗口隔离层的透明度,如果设置为0,则不显示隔离层 */
//        timeout: 0, /* 窗口显示多少毫秒后自动关闭,如果设置为0,则不自动关闭 */
//        showType: 'fade', /* 窗口显示的类型,可选值有:show、fade、slide */
//        showSpeed: 'fast', /* 窗口显示的速度,可选值有:'slow'、'fast'、表示毫秒的整数 */
//        showIcon: true, /* 是否显示窗口标题的图标，true显示，false不显示，或自定义的CSS样式类名（以为图标为背景） */
//        showClose: true, /* 是否显示窗口右上角的关闭按钮 */
//        draggable: true, /* 是否可以拖动窗口 */
//        dragLimit: true, /* 在可以拖动窗口的情况下，是否限制在可视范围 */
//        dragClone: false, /* 在可以拖动窗口的情况下，鼠标按下时窗口是否克隆窗口 */
//        persistent: true, /* 在显示隔离层的情况下，点击隔离层时，是否坚持窗口不关闭 */
//        showScrolling: true, /* 是否显示浏览的滚动条 */
//        ajaxData: {},  /* 在窗口内容使用get:或post:前缀标识的情况下，ajax post的数据，例如：{ id: 1 } 或 "id=1" */
//        iframeScrolling: 'auto', /* 在窗口内容使用iframe:前缀标识的情况下，iframe的scrolling属性值，可选值有：'auto'、'yes'、'no' */
//
//        title: 'jBox', /* 窗口的标题 */
//        width: 'auto', /* 窗口的宽度，值为'auto'或表示像素的整数 */
//        height: 'auto', /* 窗口的高度，值为'auto'或表示像素的整数 */
//        bottomText: '', /* 窗口的按钮左边的内容，当没有按钮时此设置无效 */
//        buttons: { '确定': 'ok' }, /* 窗口的按钮 */
//        buttonsFocus: 0, /* 表示第几个按钮为默认按钮，索引从0开始 */
//        loaded: function (h) { }, /* 窗口加载完成后执行的函数，需要注意的是，如果是ajax或iframe也是要等加载完http请求才算窗口加载完成，
//         参数h表示窗口内容的jQuery对象 */
//        submit: function (v, h, f) { return true; },
//        /* 点击窗口按钮后的回调函数，返回true时表示关闭窗口，
//         参数有三个，v表示所点的按钮的返回值，h表示窗口内容的jQuery对象，f表示窗口内容里的form表单键值 */
//        closed: function () { } /* 窗口关闭后执行的函数 */
//    };

    $("#xnfy520-function-index").delegate(".xnfy520_get_this_value","click",function(){
        var v = $(this).attr('value');
        if(v!=''){
            if(define_module_name=='Provinces' || define_module_name=='Address'){
                var level = $("#this_form_datas").attr("level");
                if(define_pid!=0 && define_pid!=''){
                    $("#xnfy520-function-index-content").load(define_app_url+'/'+define_module_name+'/ajax_page_'+define_action_name+'/page/'+v+'/pid/'+define_pid);
                }else{
                    $("#xnfy520-function-index-content").load(define_app_url+'/'+define_module_name+'/ajax_page_'+define_action_name+'/page/'+v);
                }
            }else if(define_module_name=='FolkCustomProvinces'){
                if(define_pid!=0 && define_pid!=''){
                    $("#xnfy520-function-index-content").load(define_app_url+'/'+define_module_name+'/ajax_page_'+define_action_name+'/page/'+v+'/pid/'+define_pid);
                }else{
                    $("#xnfy520-function-index-content").load(define_app_url+'/'+define_module_name+'/ajax_page_'+define_action_name+'/page/'+v);
                }
            }else if(define_module_name=='User'){
                if(define_rid!=''){
                    $("#xnfy520-function-index-content").load(define_app_url+'/'+define_module_name+'/ajax_page_index/page/'+v+'/rid/'+define_rid);
                }else{
                    $("#xnfy520-function-index-content").load(define_app_url+'/'+define_module_name+'/ajax_page_index/page/'+v);
                }
            }else if(define_module_name=='OrderList'){
                $("#xnfy520-function-index-content").load(define_app_url+'/'+define_module_name+'/ajax_page_index/page/'+v+((define_pid!=0 && define_pid!='' ? '/pid/'+define_pid : '')+(define_cid!=0 && define_cid!='' ? '/cid/'+define_cid : '')+(define_type!=0 && define_type!='' ? '/type/'+define_type : '')));
            }else{
                $("#xnfy520-function-index-content").load(define_app_url+'/'+define_module_name+'/ajax_page_index/page/'+v+((define_pid!=0 && define_pid!='' ? '/pid/'+define_pid : '')+(define_cid!=0 && define_cid!='' ? '/cid/'+define_cid : '')+(define_sid!=0 && define_sid!='' ? '/sid/'+define_sid : '')+(define_rid!=0 && define_rid!='' ? '/rid/'+define_rid : '')));
            }

        }else{
            jBox.tip('异常操作！', 'error',{ timeout: 1000});
        }

    });


    $("#xnfy520-function-index-table-th-check-all [type=button]").live("click",function(){
        $("#xnfy520-function-index-table").find(".xnfy520-function-index-table-check-this").attr('checked', 'checked');
        $(this).toggle(function(){
            $("#xnfy520-function-index-table").find(".xnfy520-function-index-table-check-this").attr('checked',null);
        },function(){
            $("#xnfy520-function-index-table").find(".xnfy520-function-index-table-check-this").attr('checked', 'checked');
        });
    });


    $("#xnfy520-function-index [name=form_search]").submit(function(){
        var key = $("#xnfy520-function-index input[name=key]").val();
        if(key==''){
            jBox.tip('搜索内容不能为空！', 'error',{ timeout: 1000});
            return false;
        }
    });

    $("[name=link]").live('dblclick',function(){
        if($(this).val()==''){
            $(this).val('http://');
        }
    });

    $("#xnfy520-function-index-nav a").each(function(){
        var a = $(this);
        if(a.attr('href')==define_self_url){
            a.css("background","#95D0DE").css("color","black");
        }else if(define_pid){
            // var str = new RegExp("pid/"+define_pid);
            // if(str.test(a.attr('href'))){
            //     alert(str);
            //     $("#xnfy520-function-index-nav a").css("background","#546C83").css("color","white");
            //     $(this).css("background","#95D0DE").css("color","black");
            // }
        }
    });

    $("#xnfy520-function-index-nav-sub a").each(function(){
        var a = $(this);
        if(a.attr('href')==define_self_url){
            a.css("background","#95D0DE").css("color","black");
        }else if(define_pid && define_cid){
            var str = new RegExp("/pid/"+define_pid+"/cid/"+define_cid);
            if(str.test(a.attr('href'))){
                $("#xnfy520-function-index-nav-sub a").css("background","#546C83").css("color","white");
                a.css("background","#95D0DE").css("color","black");
            }
        }
    });

    $("#xnfy520-function-index-nav-subs a").each(function(){
        var a = $(this);
        if(a.attr('href')==define_self_url){
            a.css("background","#95D0DE").css("color","black");
        }else if(define_pid && define_cid && define_sid){
            var str = new RegExp("/pid/"+define_pid+"/cid/"+define_cid+"/sid/"+define_sid);
            if(str.test(a.attr('href'))){
                $("#xnfy520-function-index-nav-subs a").css("background","#546C83").css("color","white");
                a.css("background","#95D0DE").css("color","black");
            }
        }
    });

    $('#xnfy520-function-index-add').jrumble({
        x: 2,
        y: 2,
        rotation: 10,
        speed: 50,
        opacity: false,
        opacityMin: .05
    });

    var jumpStart = function(){
        if($('#xnfy520-function-index-add').attr('statu')!=0){
            $('#xnfy520-function-index-add').trigger('startRumble');
            $('#xnfy520-function-index-add').css("background","white").css("color","#5C5C5C");
            setTimeout(jumpStop, 3000);
        }
    };

    var jumpStop = function(){
        $('#xnfy520-function-index-add').trigger('stopRumble');
        $('#xnfy520-function-index-add').css("background","#95D0DE").css("color","white");
        setTimeout(jumpStart, 10000);
    };

    jumpStart();

    $("#xnfy520-function-index-add").live('click',function(){
        if($(this).attr('statu')==undefined){
            $(this).attr("statu",0);
            $(this).trigger('stopRumble');
        }
    });

    $("#xnfy520-function-index-add").live('mouseover',function(){
        $(this).trigger('stopRumble');
        $(this).css("background","#fff").css("color","#546C83");
    });

    $("#xnfy520-function-index-add").live('mouseout',function(){
        $(this).css("background","#95D0DE").css("color","#fff");
    });

    $("[name='commodity_sort[]']").live('keyup',function(){
        if($(this).val()!='' && $(this).val()>=0 && $(this).val()<=255 && !isNaN($(this).val())){
            $(this).css("background","white");
        }else{
            $(this).css("background","yellow");
        }
    });

    $(".set-index-commodity").live('click',function(){
        var type = $(this).attr('type');
            var edit_submit = function (v, h, f) {
                var orgs = $("#append-commodity");
                if (v == 'ok') {
                    var flag = true;
                    var n = 0;

                    orgs.find("li").find("[name='commodity_name[]']").each(function(e){

                        var name = orgs.find("li:eq("+e+")").find("[name='commodity_name[]']");
                        var id = orgs.find("li:eq("+e+")").find("[name='commodity_id[]']");
                        var sort = orgs.find("li:eq("+e+")").find("[name='commodity_sort[]']");

                        if(name.val()!=''){
                            n++;
                            if(id.val()=='' || id.val()<=0 || isNaN(id.val())){
                                id.css("background","yellow");
                                flag = false;
                            }else{
                                id.attr("value",id.val());
                            }
                            if(sort.val()=='' || sort.val()<0 || sort.val()>255 || isNaN(sort.val())){
                                sort.css("background","yellow");
                                flag = false;
                            }else{
                                sort.attr("value",sort.val());
                            }
                        }

                    });


                    if(n<=0){
                        jBox.tip('还没有添加商品', 'error',{ timeout: 1000});
                        return false;
                    }else{

                        orgs.find("li").find("[name='commodity_name[]']").each(function(){
                            if($(this).val()==''){
                                $(this).parent("li").remove();
                            }
                        });

                        var data = $("[name=commodity]").serializeArray();

                        if(flag==false){

                            return false;
                        }else{
                            jBox.tip("正在处理...", 'loading');
                            $.ajax({
                                url: define_app_url+'/System/ajax_set_index_commodity',
                                data:data,
                                type:'POST',
                                success: function(data){
                                    var msg = JSON.parse(data);
                                    if(msg.status==1){
                                        jBox.close();
                                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { 
                                            window.location = define_self_url;
                                        }});
                                    }else{
                                        jBox.tip(msg.info, 'error',{ timeout: 1000});
                                    }
                                }
                            });
                            return false;
                        }
                    }
                }
            };

            jBox("get:"+define_app_url+"/System/set_index_commodity/type/"+type,{
                width:500,
                title: '',
                top: '20%',
                draggable: true,
                opacity: 0.01,
                persistent: true,
                showIcon: false,
                showSpeed: 'slow',
                buttons: { '设置': 'ok','取消':'cancel'},
                submit:edit_submit,
                closed:function(){
                    window.location = define_self_url;
                }
            });

    });

    $("#add-commodity").live('click',function(){
        var orgs = $("#append-commodity");
        var news = $("#wait-commodity").html();
        var type = $("[name=type]").val();
        var num = 0;
        var name = '';
        switch(type){
            case 'groupon':
                num = 6;
                name = '团购详情页-推荐';
                break;
            case 'member':
                num = 12;
                name = '个人中心页-推荐';
                break;
            case 'cart':
                num = 5;
                name = '购物车页-推荐';
                break;
        }
        if(orgs.find("li").size()>=num){
            jBox.tip(name+' 最多推荐 '+num+' 个商品', 'error',{ timeout: 1000});
            return false;
        }else{
            $(news).appendTo(orgs);
        }

    });

    $(".delete_commodity").live("click",function(){
        var self = $(this);
        var submit = function (v, h, f) {
            if (v == 'ok'){
                //    jBox.tip("正在处理...", 'loading');
                if($("#append-commodity").find("li").size()<=1){
                    $(".jbox-body").remove();
                    $("#wait-insert-commodity").html('');
                }else{
                    self.parent("li").remove();
                    jBox.tip('删除商品成功！', 'success',{ timeout: 1000,closed: function () {}});
                }
            }
            return true; //close
        };
        if(self.parent("li").find("[name='commodity_name[]']").val()==''){
            if($("#append-commodity").find("li").size()<=1){
                jBox.close();
            }else{
                self.parent("li").remove();
            }
        }else{
            jBox.confirm("确认删除该商品?", "提示", submit,{top: '40%'});
        }
    });

});