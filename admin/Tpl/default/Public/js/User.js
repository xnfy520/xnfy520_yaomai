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

            ip_address:{
                rule:'^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$',
                tip:'必须为IP地地址格式'
            },

            phone:{
                rule:'^1[3|4|5|8][0-9][0-9]{4,8}$',
                tip:'电话格式错误'
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
            },


        check_ip_address:
            function(str){

                ip = str;

                if (ip.indexOf(" ")>=0){
                    ip = ip.replace(/ /g,"");
                }

                ipArray = ip.split(".");
                j = ipArray.length;
                if(j!=4)
                {
                    this.info = "IP地址格式不正确";
                    return false;
                }

                for(var i=0;i<4;i++)
                {
                    if(ipArray[i].length==0  || isNaN(ipArray[i]) || ipArray[i]>255)
                    {
                        this.info = "IP地址格式不正确";
                        return false;
                    }else{
                        this.info = null;
                        return true;
                    }
                }

            }

    };

    var jcrop_api;
    var p_w;
    var p_h;

    function initJcrop(){
        jcrop_api = $.Jcrop("#jcrop_target");
        p_w = $("#jcrop_target").width();
        p_h = $("#jcrop_target").height();

        var ratio = 1;
     //   alert(Math.round((p_w-(p_h*ratio))/2)+' : 0 '+' | '+Math.round(p_h*ratio)+' : '+p_h);
        var datas = $("body").data('TailorIimageInfo');
        if(datas){
            jcrop_api.setOptions({
                aspectRatio:ratio/1,
                minSize:[100,100],
                onChange:showPreview,
                onSelect:showPreview,
                setSelect:[datas.x1,datas.y1,datas.x2,datas.y2]
            });
        }else{
            jcrop_api.setOptions({
                aspectRatio:ratio/1,
                minSize:[100,100],
                onChange:showPreview,
                onSelect:showPreview,
                setSelect:[Math.round((p_w-(p_h*ratio))/2),0,Math.round(p_h*ratio),p_h]
            });
        }

    }

    //简单的事件处理程序，响应自onChange,onSelect事件，按照上面的Jcrop调用
    function showPreview(coords){
        if(parseInt(coords.w) > 0){
//            //计算预览区域图片缩放的比例，通过计算显示区域的宽度(与高度)与剪裁的宽度(与高度)之比得到
//            var rx = $("#preview_box").width() / coords.w;
//            var ry = $("#preview_box").height() / coords.h;
//            //通过比例值控制图片的样式与显示
//            $("#crop_preview").css({
//                width:Math.round(rx * $("#jcrop_target").width()) + "px",	//预览图片宽度为计算比例值与原图片宽度的乘积
//                height:Math.round(rx * $("#jcrop_target").height()) + "px",	//预览图片高度为计算比例值与原图片高度的乘积
//                marginLeft:"-" + Math.round(rx * coords.x) + "px",
//                marginTop:"-" + Math.round(ry * coords.y) + "px"
//            });
//
//            $("#preview_box").css({
//                left:$("#jcrop_target").width()+10+'px'
//            });

            $("#x1").val(Math.round(coords.x));
            $("#y1").val(Math.round(coords.y));
            $("#x2").val(Math.round(coords.x2));
            $("#y2").val(Math.round(coords.y2));
            $("#w").val(Math.round(coords.w));
            $("#h").val(Math.round(coords.h));
        }
    }

    $("#tailor_image").live('click',function(){

        var submit = function (v, h, f) {

            if (v == 'ok') {
                jBox.tip("正在处理...", 'loading');
                $("button").attr("disabled","disabled");
                $.ajax({
                    url: define_app_url+'/User/ajaxTailorIimage',
                    data: f,
                    type:'POST',
                    success: function(datas){
                        var msg = JSON.parse(datas);
                        if(msg.status==1){
                            $("body").data('TailorIimageInfo',msg.data);
                            $(".thumb_image").attr("src",define_public_url+"/Content/tmp/cut_thumb_"+$("[name=avatar]").val());
                            $(".thumb_image").fadeOut('slow').fadeIn('slow');
                            $(".thumb_image").attr("flag",1).attr("status",0);
                            jBox.tip(msg.info, 'success',{
                                timeout: 1000,
                                closed: function () {
                                    jBox.close();
                                    $("button").removeAttr("disabled");
                                    $("#tailor_image").text("重裁");
                                }
                            });
                        }else{
                            alert(msg.info);
                            return false;
                        }
                    }
                });
                return false;
            }
        };

        var tops = (($(window).height()-$("#tailor_image").data("tailor_info").thumb_image_info.height-55)/2)*10/100;

        jBox("get:"+define_app_url+"/User/tailor_image",{
            width:$("#tailor_image").data("tailor_info").thumb_image_info.width+10,
            title: '',
            top: tops+'%',
            draggable: true,
            opacity: 0.01,
            persistent: true,
            showIcon: false,
            showSpeed: 'slow',
            dragLimit: false,
            showScrolling: false,
            bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
            buttons: { '裁剪': 'ok','取消':'cancel'},
            loaded: function (h) {
                $("#jcrop_image").find("[name=jcrop_image]").val($("#tailor_image").data("tailor_info").image_name);
                $("#jcrop_target").width($("#tailor_image").data("tailor_info").thumb_image_info.width);
                $("#jcrop_target").height($("#tailor_image").data("tailor_info").thumb_image_info.height);
                $("#jcrop_target").attr("src",define_public_url+"/Content/tmp/"+$("#tailor_image").data("tailor_info").thumb_image);
                initJcrop();
            },
            submit:submit
        });
    });


    $("#User-add-edit [title]").live('hover',function(){
        $(this).tooltip({
            position: "center right",
            offset: [-2, 10],
            effect: "fade",
            opacity: 0.7
        });
    });

    $(".jbox-title").live('mouseover',function(){
        $(".tooltip").fadeOut();
    });

    //添加数据
    $("#xnfy520-function-index-add").live('click',function(){
        $("body").removeData("TailorIimageInfo");
        var add_submit = function (v, h, f) {
            if (v == 'ok') {
                jBox.tip("正在处理...", 'loading');
                $.ajax({
                    url: define_app_url+'/User/ajaxinsert',
                    data: f,
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            jBox.close();
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                        }else{
                            jBox.tip(msg.info, 'error',{ timeout: 1000});
                        }
                    }
                });
                return false;
            }
        };

        jBox("get:"+define_app_url+"/User/add"+((define_rid) ? '/rid/'+define_rid : ''),{
            width:422,
            title: '',
            top: '15%',
            draggable: true,
            opacity: 0.01,
            persistent: true,
            showIcon: false,
            showSpeed: 'slow',
            dragLimit: false,
            showScrolling: false,
            bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
            buttons: { '添加': 'ok','取消':'cancel'},
            loaded: function (h) {
//                var level = $("#User-add-edit [name=level]").val();
//                alert(level);
//                if(level==null){
//                    jBox.close();
//                    jBox.tip("请先添加用户分组！", 'error',{ timeout: 1000,closed: function () { window.location=define_app_url+'/Role/index' }});
//                }
            },
            submit:add_submit
        });

    });



    //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        $("body").removeData("TailorIimageInfo");
        var value = $(this).parents("tr").find(".xnfy520-function-index-table-check-this").val();
        if(value!='' && !isNaN(value)){
            var edit_submit = function (v, h, f) {
                if (v == 'ok') {
                    jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/User/ajaxedit',
                        data: f,
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.close();
                                jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000});
                            }
                        }
                    });
                    return false;
                }
            };

            jBox("get:"+define_app_url+"/User/edit/id/"+value,{
                width:425,
                title: '',
                top: '15%',
                draggable: true,
                opacity: 0.01,
                persistent: true,
                showIcon: false,
                showSpeed: 'slow',
                dragLimit: false,
                showScrolling: false,
                bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
                buttons: { '修改': 'ok','取消':'cancel'},
                loaded: function (h) {
                    if($("[name=id]").val()==''){
                        jBox.close();
                        jBox.tip('程序异常', 'error',{ timeout: 1000});
                    }else{

                    }
                },
                submit:edit_submit
            });
        }else{
            jBox.tip('程序异常', 'error',{ timeout: 1000});
        }

    });

    //AJAX删除
    $("[name=User-del]").live('submit',function(){
        var data = $(this).serializeArray();
        if(data==''){
            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
        }else{
            var submit = function (v, h, f) {
                if (v == 'ok'){
                    jBox.tip("正在处理...", 'loading');
                    $("[name=User-del]").find("[type=submit]").attr('disabled','disabled');
                    window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/User/ajaxdel',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=User-del]").find("[type=submit]").removeAttr('disabled'); }});
                                }
                            }
                        });
                    },500);
                }
                return true; //close
            };
            jBox.confirm("确认删除这些数据？", "提示", submit,{top: '40%'});
        }

    });

    //AJAX修改状态
    $(".switch_status").live("click",function(){
        var self = $(this);
        var type = $(this).attr("type");
        var by = $(this).attr("by");
        var value = $(this).attr("value");
        var tip = $(this).next();

        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                window.setTimeout(function () {
                    $.ajax({
                        url: define_app_url+'/User/ajax_switch_status',
                        data: {by:by,type:type,value:value},
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                if(msg.data==1){
                                    self.text('是');
                                    self.attr("value",1);
                                    jBox.tip('修改成功！', 'success',{ timeout: 1000});
                                }else{
                                    self.text('否');
                                    self.attr("value",0);
                                    jBox.tip('修改成功！', 'success',{ timeout: 1000});
                                }
                            }else{
                                jBox.tip(msg.info, 'success',{ timeout: 1000});
                            }
                        }
                    });
                }, 500);
            }
        };
        if(value==0){
            jBox.confirm(tip.attr("data_off"), "提示", submit,{top: '40%'});
        }else{
            jBox.confirm(tip.attr("data_on"), "提示", submit,{top: '40%'});
        }
    });

    $(".positioning_images").live('mouseover',function(){
        var flag = $(this).find(".thumb_image").attr("flag");
        $(this).find(".thumb_image").css("border-color","#546C83");
        if(flag != 0){
            $(".delete_images").css("display","block");
        }
    });

    $(".positioning_images").live('mouseout',function(){
        var flag = $(this).find(".thumb_image").attr("flag");
        $(this).find(".thumb_image").css("border-color","#ccc");
        if(flag != 0){
            $(".delete_images").css("display","none");
        }
    });

    $("#User-add-edit [name=regip]").live("blur",function(){
        var self = $(this);
        var area = self.val();

            if(area!=''){

                if(!form_check.check_ip_address(area)){
                    jBox.tip(form_check.info, 'error',{ timeout: 1000,closed: function () { self.next().text(''); }});
                    return false;
                }else{
                    $.ajax({
                        url: define_app_url+'/User/ajax_get_area',
                        data: {area:area},
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                self.next().text(msg.data);
                            }else{
                                self.next().text(msg.data);
                            }
                        }
                    });
                }
            }else{
                self.next().text('');
            }

    });

    $("#User-add-edit [name=loginip]").live("blur",function(){
        var self = $(this);
        var area = self.val();

            if(area!=''){
                if(!form_check.check_ip_address(area)){
                    jBox.tip(form_check.info, 'error',{ timeout: 1000,closed: function () { self.next().text(''); }});
                    return false;
                }else{
                    $.ajax({
                        url: define_app_url+'/User/ajax_get_area',
                        data: {area:area},
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                self.next().text(msg.data);
                            }else{
                                self.next().text(msg.data);
                            }
                        }
                    });
                }
            }else{
                self.next().text('');
            }

    });

    $("#User-add-edit [name=phone]").live("blur",function(){
        var self = $(this);
        var value = self.val();

        if(value!=''){
            if(!form_check.check_regular_matching('',value,'phone')){
                jBox.tip(form_check.info, 'error',{ timeout: 1000,closed: function () { self.next().text(''); }});
                return false;
            }else{
                $.ajax({
                    url: define_app_url+'/User/get_phone_location',
                    data: {phone:value},
                    type:'POST',
                    success: function(data){
                        self.next().text(data);
                    }
                });
            }
        }else{
            self.next().text('');
        }

    });

    $(".delete_images").live("click",function(){
        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                $("[name=avatar]").val('');
                $(".thumb_image").attr('src',define_public_url+'/images/default.jpg');
                $(".thumb_image").attr("flag",0);
                $("body").removeData("TailorIimageInfo");
                $("#tailor_image").removeData("tailor_info");
                $("#tailor_image").attr("disabled","disabled").text('裁剪');
                jBox.tip('删除图片成功！', 'success',{ timeout: 1000,closed: function () {}});
            }
            return true; //close
        };
        jBox.confirm("确认删除该图片?", "提示", submit,{top: '40%'});
    });

    $(".send_message").live('click',function(){

        var message_type = $(this).attr("message_type");
        var addressee_id = $(this).attr("addressee_id");
        var messge_title = $(this).attr("messge_title");

        if(message_type!='' && addressee_id!='' && messge_title!=''){

            var submit = function (v, h, f) {
                if (v == 'ok') {
                    var name = $("#send-message-box [name=name]").val();
                    var details = $("#send-message-box [name=details]").val();
                    if(name==''){
                        jBox.tip('标题不能为空', 'error',{ timeout: 1000});
                        return false;
                    }else if(details==''){
                        jBox.tip('内容不能为空', 'error',{ timeout: 1000});
                        return false;
                    }else{
                        jBox.tip("正在处理...", 'loading');
                        $.ajax({
                            url: define_app_url+'/User/ajax_send_message',
                            data: f,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.close();
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { /*window.location=define_self_url  */}});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000});
                                }
                            }
                        });
                        return false;
                    }
                }
            };

            jBox("post:"+define_app_url+"/User/send_message",{
                ajaxData: {message_type:message_type,addressee_id:addressee_id},
                width:425,
                title: '发送站内信给 '+messge_title,
                top: '30%',
                draggable: true,
                opacity: 0.01,
                persistent: true,
                showIcon: false,
                showSpeed: 'slow',
                dragLimit: false,
                showScrolling: false,
                bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
                buttons: { '发送': 'ok','取消':'cancel'},
                submit:submit
            });

        }else{
            jBox.tip('异常操作', 'error',{ timeout: 1000});
        }

    });


    $(".Set-Permission").live('click',function(){
        var id = $(this).parents("tr").find(".xnfy520-function-index-table-check-this").val();
        var rid = $(this).attr("roleid");
        var username = $(this).attr("set_user");
        if(!isNaN(id) && id!=''){

            var submit = function (v, h, f) {
                if (v == 'ok') {
                 //   jBox.tip("正在处理...", 'loading');
                    var ap = '';
                    if(f["allow_provinces[]"]!=undefined){
                        ap = f["allow_provinces[]"].toString();
                    }
                    $.ajax({
                        url: define_app_url+'/User/ajax_set_permission',
                        data: {userid:id,roleid:rid,allow_provinces:ap},
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.close();
                                jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000});
                            }
                        }
                    });
                    return false;
                }
            };

            jBox("post:"+define_app_url+"/User/set_permission",{
                ajaxData: {id:id,rid:rid},
                width:425,
                title: '给 '+username+' 分配管理省份',
                top: '30%',
                draggable: true,
                opacity: 0.01,
                persistent: true,
                showIcon: false,
                showSpeed: 'slow',
                dragLimit: false,
                showScrolling: false,
             //   bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
                buttons: { '确定': 'ok','取消':'cancel'},
                loaded: function (h) {
                    if($("[name=id]").val()=='' || $("[name=roleid]").val()==''){
                        jBox.close();
                        jBox.tip('程序异常', 'error',{ timeout: 1000});
                    }
                },
                submit:submit
            });

        }
    });

    $(".into-merchant").live('click',function(){
        var by_user = $(this).attr('by_user');
        $.ajax({
            url: define_app_url+'/User/ajax_into_merchant_setting',
            data: {by_user:by_user},
            type:'POST',
            success: function(data){
                var msg = JSON.parse(data);
                if(msg.status==1){
                 //   jBox.close();
                 //   jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                    window.setTimeout(function () { window.open(define_root_url+'/merchant.php') },1000);
                }else{
                    jBox.tip(msg.info, 'error',{ timeout: 1000});
                }
            }
        });
    });

    $(".into-member").live('click',function(){
        var by_user = $(this).attr('by_user');
        $.ajax({
            url: define_app_url+'/User/ajax_into_member_setting',
            data: {by_user:by_user},
            type:'POST',
            success: function(data){
                var msg = JSON.parse(data);
                if(msg.status==1){
                    //   jBox.close();
                    //   jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                    window.setTimeout(function () { window.open(define_root_url+'/index.php/Member/index.html') },1000);
                }else{
                    jBox.tip(msg.info, 'error',{ timeout: 1000});
                }
            }
        });
    });

    $(".view-certificate-image").live("click",function(){
        var image = $(this).attr("image");
        jBox('<img style="padding: 3px 5px 0 5px;" src="'+define_public_url+'/Content/CertificateImage/thumb_'+image+'" />',{
            width:'500',
            height:'auto',
            title: '',
            top: '20%',
            draggable: true,
            dragLimit: false,
            opacity: 0.01,
            persistent: false,
            showIcon: false,
            showSpeed: 'slow',
            buttons: { '关闭': true }
        });
    });


});