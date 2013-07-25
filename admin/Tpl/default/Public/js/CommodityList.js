$(function(){

//    $("#InformationList-add-edit [title]").live('hover',function(){
//        $(this).tooltip({
//            position: "center right",
//            offset: [-2, 10],
//            effect: "fade",
//            opacity: 0.7
//        });
//    });

    $(".jbox-title").live('mouseover',function(){
        $(".tooltip").fadeOut();
    });



//    //添加数据
//    $("#xnfy520-function-index-add").live('click',function(){
//        if(define_cid!=''){
//            window.location=define_app_url+"/CommodityList/add/cid/"+define_cid;
//        }else{
//            window.location=define_app_url+"/CommodityList/add";
//        }
//    });

        //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        var pid = $(this).parents('tr').find("[name='deleteid[]']").attr("pid");
        var id = $(this).parents('tr').find("[name='deleteid[]']").val();
        if(pid && id){
            window.location=define_app_url+"/CommodityList/edit/pid/"+pid+'/id/'+id;
        }else{
            jBox.tip('程序异常', 'error');
        }
    });

    //AJAX添加
    $("[name=CommodityList-add]").live('submit', function() {
        $("[name=CommodityList-add]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        var name = $("[name=name]");
        var price = $("[name=price]");
        var image = $("[name=image]");
        var more_image = $("[name='image_more[]']").length;

        if(name.val()===''){
            jBox.tip('商品名称不能为空', 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-add]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(price.val()==='' || price.val()<=0 || price.val()[0]==0 || isNaN(price.val())){
            jBox.tip('请填写商品售价', 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-add]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(image.val()===''){
            jBox.tip('商品封面，不能为空', 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-add]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(more_image<=0){
            jBox.tip('商品图片至少上传一张', 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-add]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else{
           jBox.tip("正在处理...", 'loading');
            $.ajax({
                url: define_app_url+'/CommodityList/ajax_insert',
                data: data,
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        window.setTimeout(function () {
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                if(define_pid){
                                    window.location=define_module_url+'/index/pid/'+define_pid;
                                }else{
                                    window.location=define_module_url+'/index';
                                }
                            }});
                        },500);
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () {
                            $("[name=CommodityList-add]").find("[type=submit]").removeAttr('disabled');
                             }});
                    }
                }
            });
        }

    });

    //AJAX修改
    $("[name=CommodityList-edit]").live('submit',function(){
        $("[name=CommodityList-edit]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        var pid = $("[name=pid]");
        var id = $("[name=id]");
        var price = $("[name=price]");
        var image = $("[name=image]");
        var more_image = $("[name='image_more[]']").length;

        if(pid.val()==='' && id.val()===''){
            jBox.tip('异常操作', 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-edit]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(price.val()==='' || price.val()<=0 || price.val()[0]==0 || isNaN(price.val())){
            jBox.tip('请填写商品售价', 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-edit]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(image.val()===''){
            jBox.tip('商品封面，不能为空', 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-edit]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(more_image<=0){
            jBox.tip('商品图片至少上传一张', 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-edit]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else{
            jBox.tip("正在处理...", 'loading');
            $.ajax({
                url: define_app_url+'/CommodityList/ajax_edit',
                data: data,
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        window.setTimeout(function () {
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                if(define_pid){
                                    window.location=define_module_url+'/index/pid/'+define_pid;
                                }else{
                                    window.location=define_module_url+'/index';
                                }
                            }});
                        },500);
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-edit]").find("[type=submit]").removeAttr('disabled'); }});
                    }
                }
            });
        }
    });

    //AJAX删除
    $("[name=CommodityList-del]").live('submit',function(){
        var data = $(this).serializeArray();
        if(data==''){
            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
        }else{
            var submit = function (v, h, f) {
                if (v == 'ok'){
                    jBox.tip("正在处理...", 'loading');
                    $("[name=CommodityList-del]").find("[type=submit]").attr('disabled','disabled');
                    window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/CommodityList/ajax_del',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=CommodityList-del]").find("[type=submit]").removeAttr('disabled'); }});
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
                        url: define_app_url+'/CommodityList/ajax_switch_status',
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

    $(".thumb_image").live('click',function(){
        var image = $("[name=image]").val();
        var flag = $(this).attr("flag");
        var info = $(".thumb_image").attr('info');
        if(info){
            var infos = JSON.parse(info);
        }

        if(image){
            if(flag==1){
                jBox('<img style="padding: 3px 5px 0 5px;" src="'+define_public_url+'/Content/CommodityList/thumb_'+image+'" />',{
                    width:infos.width+10,
                    height:'auto',
                    title: '',
                    top: '5%',
                    draggable: true,
                    dragLimit: false,
                    opacity: 0.01,
                    persistent: false,
                    showIcon: false,
                    showSpeed: 'slow',
                    buttons: { '关闭': true }
                });
            }else{
                jBox('<img style="padding: 3px 5px 0 5px;" src="'+define_public_url+'/Content/tmp/thumb_'+image+'" />',{
                    width:infos.width+10,
                    height:'auto',
                    title: '',
                    top: '5%',
                    draggable: true,
                    dragLimit: false,
                    opacity: 0.01,
                    persistent: false,
                    showIcon: false,
                    showSpeed: 'slow',
                    buttons: { '关闭': true }
                });
            }
        }else{
            jBox("<img style='padding: 3px 5px 0 5px;' src='"+define_public_url+"/images/default.jpg'/>",{
                width:'auto',
                height:'auto',
                title: '',
                top: '5%',
                draggable: true,
                opacity: 0.01,
                persistent: false,
                showIcon: false,
                showSpeed: 'slow',
                buttons: { '关闭': true }
            });
        }

    });

    $(".thumb_image_list").live('click',function(){
        var self = $(this);
        var image = self.parent(".positioning_images_list").find(".image_more").val();
        var flag = self.attr("flag");
        var info = self.attr('info');
        if(info){
            var infos = JSON.parse(info);
        }
        if(image && flag==1){
            jBox('<img style="padding: 3px 5px 0 5px;" src="'+define_public_url+'/Content/CommodityImages/thumb_'+image+'" />',{
                width:infos.width+10,
                height:'auto',
                title: '',
                top: '5%',
                draggable: true,
                opacity: 0.01,
                persistent: false,
                showIcon: false,
                showSpeed: 'slow',
                buttons: { '关闭': true }
            });
        }else{
            jBox('<img style="padding: 3px 5px 0 5px;" src="'+define_public_url+'/Content/tmp/thumb_'+image+'" />',{
                width:infos.width+10,
                height:'auto',
                title: '',
                top: '5%',
                draggable: true,
                opacity: 0.01,
                persistent: false,
                showIcon: false,
                showSpeed: 'slow',
                buttons: { '关闭': true }
            });
        }

    });

    $(".delete_images").live("click",function(){
        var self = $(this);
        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                self.prev('img').attr("flag",0).attr('src',define_public_url+"/images/default.jpg");
                self.parent(".positioning_images").fadeOut('slow').fadeIn('slow');
                $("[name=image]").val('');
                jBox.tip('删除图片成功！', 'success',{ timeout: 1000,closed: function () {}});
            }
            return true; //close
        };
        jBox.confirm("确认删除该图片?", "提示", submit,{top: '40%'});
    });

    $(".delete_images_list").live("click",function(){
        var self = $(this);
        var id = self.attr("delete_id");
        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                self.parent(".positioning_images_list").fadeOut('slow');

                if(id){
                    $.ajax({
                        url: define_app_url+'/CommodityList/delete_image',
                        data: {id:id},
                        type:'POST',
                        success: function(datas){
                            var msg = JSON.parse(datas);
                            if(msg.status==1){
                                jBox.tip('删除图片成功！', 'success',{ timeout: 1000,closed: function () {
                                    self.parent(".positioning_images_list").remove();
                                    if($("#insert_more_image").find(".positioning_images_list").size()<10){
                                        $("#file_upload_button_more").removeAttr("disabled");
                                    }
                                }});
                            }else{
                                jBox.tip('删除图片失败！', 'error',{ timeout: 1000});
                            }
                        }
                    });
                }else{

                    jBox.tip('删除图片成功！', 'success',{ timeout: 1000,closed: function () {
                        self.parent(".positioning_images_list").remove();
                        if($("#insert_more_image").find(".positioning_images_list").size()<10){
                            $("#file_upload_button_more").removeAttr("disabled");
                        }
                    }});
                }

            }
            return true; //close
        };
        jBox.confirm("确认删除该图片?", "提示", submit,{top: '40%'});
    });

    $(".delete_parameter").live("click",function(){
        var self = $(this);
        var submit = function (v, h, f) {
            if (v == 'ok'){
            //    jBox.tip("正在处理...", 'loading');
                if($("#append-parameter").find("li").size()<=1){
                    $(".jbox-body").remove();
                    $("#wait-insert-parameter").html('');
                }else{
                    self.parent("li").remove();
                    jBox.tip('删除参数成功！', 'success',{ timeout: 1000,closed: function () {}});
                }
            }
            return true; //close
        };

        if(self.parent("li").find("[name='parameter_key[]']").val()==''){
            if($("#append-parameter").find("li").size()<=1){
                jBox.close();
            }else{
                self.parent("li").remove();
            }
        }else{
            jBox.confirm("确认删除该参数?", "提示", submit,{top: '40%'});
        }

    });

    $(".delete_parameter2").live("click",function(){
        var self = $(this);
        var submit = function (v, h, f) {
            if (v == 'ok'){
            //    jBox.tip("正在处理...", 'loading');
                if($("#append-parameter2").find("li").size()<=1){
                    $(".jbox-body").remove();
                    $("#wait-insert-parameter2").html('');
                }else{
                    self.parent("li").remove();
                    jBox.tip('删除参数成功！', 'success',{ timeout: 1000,closed: function () {}});
                }
            }
            return true; //close
        };

        if(self.parent("li").find("[name='parameter_key2[]']").val()==''){
            if($("#append-parameter2").find("li").size()<=1){
                jBox.close();
            }else{
                self.parent("li").remove();
            }
        }else{
            jBox.confirm("确认删除该参数?", "提示", submit,{top: '40%'});
        }

    });

    $(".delete_parameter3").live("click",function(){
        var self = $(this);
        var submit = function (v, h, f) {
            if (v == 'ok'){
            //    jBox.tip("正在处理...", 'loading');
                if($("#append-parameter3").find("li").size()<=1){
                    $(".jbox-body").remove();
                    $("#wait-insert-parameter3").html('');
                }else{
                    self.parent("li").remove();
                    jBox.tip('删除参数成功！', 'success',{ timeout: 1000,closed: function () {}});
                }
            }
            return true; //close
        };

        if(self.parent("li").find("[name='parameter_key3[]']").val()==''){
            if($("#append-parameter3").find("li").size()<=1){
                jBox.close();
            }else{
                self.parent("li").remove();
            }
        }else{
            jBox.confirm("确认删除该参数?", "提示", submit,{top: '40%'});
        }

    });

    $(".positioning_images").live('mouseover',function(){
        var flag = $(this).find(".thumb_image").attr("flag");
        $(this).find(".thumb_image").css("border-color","#546C83");
        if(flag != 0){
            $(this).find(".delete_images").css("display","block");
        }
    });

    $(".positioning_images").live('mouseout',function(){
        var flag = $(this).find(".thumb_image").attr("flag");
        $(this).find(".thumb_image").css("border-color","#ccc");
        if(flag != 0){
            $(this).find(".delete_images").css("display","none");
        }
    });

    $(".positioning_images_list").live('mouseover',function(){
        var flag = $(this).find(".thumb_image_list").attr("flag");
        $(this).find(".thumb_image_list").css("border-color","#546C83");
        if(flag != 0){
            $(this).find(".delete_images_list").css("display","block");
        }
    });

    $(".positioning_images_list").live('mouseout',function(){
        var flag = $(this).find(".thumb_image_list").attr("flag");
        $(this).find(".thumb_image_list").css("border-color","#ccc");
        if(flag != 0){
            $(this).find(".delete_images_list").css("display","none");
        }
    });


    $("#add-parameter").live('click',function(){
        var orgs = $("#append-parameter");
        var news = $("#wait-parameter").html();
        if(orgs.find("li").size()>=15){
            jBox.tip('最多只能有15个参数', 'error',{ timeout: 1000});
            return false;
        }else{
            $(news).appendTo(orgs);
        }
    });

    $("[name='parameter_value[]']").live('keyup',function(){
        if($(this).val()!=''){
            $(this).css("background","white");
        }else{
            $(this).css("background","yellow");
        }
    });
/*****/
    $("#add-parameter2").live('click',function(){
        var orgs = $("#append-parameter2");
        var news = $("#wait-parameter2").html();
        if(orgs.find("li").size()>=15){
            jBox.tip('最多只能有15个参数', 'error',{ timeout: 1000});
            return false;
        }else{
            $(news).appendTo(orgs);
        }
    });

    $("[name='parameter_value2[]']").live('keyup',function(){
        if($(this).val()!=''){
            $(this).css("background","white");
        }else{
            $(this).css("background","yellow");
        }
    });

    /*****/
    $("#add-parameter3").live('click',function(){
        var orgs = $("#append-parameter3");
        var news = $("#wait-parameter3").html();
        if(orgs.find("li").size()>=15){
            jBox.tip('最多只能有15个参数', 'error',{ timeout: 1000});
            return false;
        }else{
            $(news).appendTo(orgs);
        }
    });

    $("[name='parameter_value3[]']").live('keyup',function(){
        if($(this).val()!=''){
            $(this).css("background","white");
        }else{
            $(this).css("background","yellow");
        }
    });

    $("#Parameter").click(function(){
        var add_submit = function (v, h, f) {
            var orgs = $("#append-parameter");
            if (v == 'ok') {
                var n = 0;
                var flag = true;
                orgs.find("li").find("[name='parameter_key[]']").each(function(e){
                    var parameter_key = orgs.find("li:eq("+e+")").find("[name='parameter_key[]']");
                    var parameter_value = orgs.find("li:eq("+e+")").find("[name='parameter_value[]']");

                    if($(this).val()!=''){
                        n++;
                        parameter_key.attr("value",parameter_key.val());
                        if(parameter_value.val()==''){
                            parameter_value.css("background","yellow");
                            flag = false;
                        }else{
                            parameter_value.attr("value",parameter_value.val());
                        }
                        if(parameter_value.val()==''){
                            parameter_value.css("background","yellow");
                            flag = false;
                        }else{
                            parameter_value.attr("value",parameter_value.val());
                        }
                    }

                });
                if(n<=0){
                    jBox.tip('还没有填写此商品参数', 'error',{ timeout: 1000});
                    return false;
                }else{
                    orgs.find("li").find("[name='parameter_key[]']").each(function(){
                        if($(this).val()==''){
                            $(this).parent("li").remove();
                        }
                    });

                    if(flag==false){
                        return false;
                    }else{
                        $("#wait-insert-parameter").html(h.find("#append-parameter").html());
                        $("#wait-insert-parameter").data("parameter",h.find("#append-parameter").html())
                    }
                }
            }
        };

        jBox("get:"+define_app_url+"/CommodityList/add_edit_parameter",{
            width:460,
            title: '',
            top: '10%',
            draggable: true,
            opacity: 0.01,
            persistent: true,
            showIcon: false,
            showSpeed: 'slow',
            dragLimit: false,
            bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
            buttons: { '确定': 'ok','取消':'cancel'},
            loaded: function (h) {},
            submit:add_submit
        });
    });

    $("#Parameter2").click(function(){

        var add_submit = function (v, h, f) {
            var orgs = $("#append-parameter2");
            if (v == 'ok') {
                var n = 0;
                var flag = true;
                orgs.find("li").find("[name='parameter_key2[]']").each(function(e){
                    var parameter_key = orgs.find("li:eq("+e+")").find("[name='parameter_key2[]']");
                    var parameter_value = orgs.find("li:eq("+e+")").find("[name='parameter_value2[]']");

                    if($(this).val()!=''){
                        n++;
                        parameter_key.attr("value",parameter_key.val());
                        if(parameter_value.val()==''){
                            parameter_value.css("background","yellow");
                            flag = false;
                        }else{
                            parameter_value.attr("value",parameter_value.val());
                        }
                        if(parameter_value.val()==''){
                            parameter_value.css("background","yellow");
                            flag = false;
                        }else{
                            parameter_value.attr("value",parameter_value.val());
                        }
                    }

                });
                if(n<=0){
                    jBox.tip('还没有填写此商品参数', 'error',{ timeout: 1000});
                    return false;
                }else{
                    orgs.find("li").find("[name='parameter_key2[]']").each(function(){
                        if($(this).val()==''){
                            $(this).parent("li").remove();
                        }
                    });

                    if(flag==false){
                        return false;
                    }else{
                        $("#wait-insert-parameter2").html(h.find("#append-parameter2").html());
                        $("#wait-insert-parameter2").data("parameter",h.find("#append-parameter2").html())
                    }
                }
            }
        };

        jBox("get:"+define_app_url+"/CommodityList/add_edit_parameter2",{
            width:460,
            title: '',
            top: '10%',
            draggable: true,
            opacity: 0.01,
            persistent: true,
            showIcon: false,
            showSpeed: 'slow',
            dragLimit: false,
            bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
            buttons: { '确定': 'ok','取消':'cancel'},
            loaded: function (h) {},
            submit:add_submit
        });
    });

    $("#Parameter3").click(function(){
        var add_submit = function (v, h, f) {
            var orgs = $("#append-parameter3");
            if (v == 'ok') {
                var n = 0;
                var flag = true;
                orgs.find("li").find("[name='parameter_key3[]']").each(function(e){
                    var parameter_key = orgs.find("li:eq("+e+")").find("[name='parameter_key3[]']");
                    var parameter_value = orgs.find("li:eq("+e+")").find("[name='parameter_value3[]']");

                    if($(this).val()!=''){
                        n++;
                        parameter_key.attr("value",parameter_key.val());
                        if(parameter_value.val()==''){
                            parameter_value.css("background","yellow");
                            flag = false;
                        }else{
                            parameter_value.attr("value",parameter_value.val());
                        }
                        if(parameter_value.val()==''){
                            parameter_value.css("background","yellow");
                            flag = false;
                        }else{
                            parameter_value.attr("value",parameter_value.val());
                        }
                    }

                });
                if(n<=0){
                    jBox.tip('还没有填写此商品参数', 'error',{ timeout: 1000});
                    return false;
                }else{
                    orgs.find("li").find("[name='parameter_key3[]']").each(function(){
                        if($(this).val()==''){
                            $(this).parent("li").remove();
                        }
                    });

                    if(flag==false){
                        return false;
                    }else{
                        $("#wait-insert-parameter3").html(h.find("#append-parameter3").html());
                        $("#wait-insert-parameter3").data("parameter",h.find("#append-parameter3").html())
                    }
                }
            }
        };

        jBox("get:"+define_app_url+"/CommodityList/add_edit_parameter3",{
            width:460,
            title: '',
            top: '10%',
            draggable: true,
            opacity: 0.01,
            persistent: true,
            showIcon: false,
            showSpeed: 'slow',
            dragLimit: false,
            bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
            buttons: { '确定': 'ok','取消':'cancel'},
            loaded: function (h) {},
            submit:add_submit
        });
    });

    var file_upload_button = $('#file_upload_button');
    var newfileType = "image";
    new AjaxUpload(file_upload_button,{

        action: define_app_url+'/CommodityList/uploads',
        name: 'myfile',
        onSubmit : function(file, ext){

            if(newfileType == "image")
            {
                if (ext && /^(jpg|png|jpeg|gif)$/.test(ext)){
                    this.setData({
                        'info': 'Document type for pictures'
                    });
                } else {
                    jBox.tip('非图像类型文件,请重新上传！', 'error',{ timeout: 1000});
                    return false;
                }
            }
            jBox.tip("正在上传...", 'loading');
            this.disable();
            $("#file_upload_button").attr("disabled","disabled");
            $("[type=submit]").attr("disabled","disabled");
        },
        onComplete: function(file, response){
            this.enable();
            var msg = JSON.parse(response);

            if(msg.status){
                $("#file_upload_button").removeAttr("disabled");
                $("[type=submit]").removeAttr("disabled");
                $(".thumb_image").attr('src', define_public_url+"/Content/tmp/"+msg.cut_image);
                $("[name=image]").val(msg.image_name);
                var str = JSON.stringify(msg.thumb_image_info);
                $(".thumb_image").attr("info",str);
                $(".thumb_image").fadeOut('slow').fadeIn('slow');
                $(".thumb_image").attr("flag",0);
                jBox.tip('上传图片成功！', 'success',{ timeout: 1000});
            }else{
                jBox.tip(msg.error, 'error',{ timeout: 1000});
            }

        }
    });

    if($("#insert_more_image").find(".positioning_images_list").size()>=10){
        $("#file_upload_button_more").attr("disabled","disabled");
    }

    var file_upload_button_more = $('#file_upload_button_more');
    var newfileType_more = "image";
    new AjaxUpload(file_upload_button_more,{

        action: define_app_url+'/CommodityList/uploads',
        name: 'myfile',
        onSubmit : function(file, ext){

            if(newfileType_more == "image")
            {
                if (ext && /^(jpg|png|jpeg|gif)$/.test(ext)){
                    this.setData({
                        'info': 'Document type for pictures'
                    });
                } else {
                    jBox.tip('非图像类型文件,请重新上传！', 'error',{ timeout: 1000});
                    return false;
                }
            }
            jBox.tip("正在上传...", 'loading');
            this.disable();
            $("#file_upload_button_more").attr("disabled","disabled");
            $("[type=submit]").attr("disabled","disabled");
        },
        onComplete: function(file, response){
            this.enable();
            var msg = JSON.parse(response);
            $("[type=submit]").removeAttr("disabled");

            if(msg.status){

                var str = JSON.stringify(msg.thumb_image_info);

                var pid = $("#CommodityList-add-edit").find("[name=pid]").val();
                var id = $("#CommodityList-add-edit").find("[name=id]").val();

                if(pid && id){

                    $.ajax({
                        url: define_app_url+'/CommodityList/add_image',
                        data: {pid:pid,id:id,image:msg.image_name},
                        type:'POST',
                        success: function(datas){
                            var msgs = JSON.parse(datas);
                            if(msgs.status==1){
                                    $(
                                        '<span class="positioning_images_list"' +
                                            'style="float: left;position: relative;width: 50px;height: 50px;display: block;padding-right: 16px;">' +
                                            '<img class="thumb_image_list" ' +
                                            'style="width:50px;height:50px;cursor: pointer;margin-right: 5px;" info='+str+' flag="0" ' +
                                            'src="'+define_public_url+'/Content/tmp/'+msg.cut_image+'" />' +
                                            '<img class="delete_images_list" src="'+define_public_url+'/images/bullet_cross.png" style="position: absolute;right: 12px;top:1px;cursor: pointer;display: none;" />' +
                                            '<input type="hidden" class="image_more" name="image_more[]" value="'+msg.image_name+'"/></span>'
                                    ).appendTo('#insert_more_image').fadeOut("slow").fadeIn("slow");
                                if($("#insert_more_image").find(".positioning_images_list").size()>=10){
                                    $("#file_upload_button_more").attr("disabled","disabled");
                                }else{
                                    $("#file_upload_button_more").removeAttr("disabled");
                                }
                                jBox.tip('上传图片成功！', 'success',{ timeout: 1000,closed: function () {}});
                            }else{
                                jBox.tip('上传图片失败！', 'error',{ timeout: 1000});
                            }
                        }
                    });
                }else{
                    $(
                        '<span class="positioning_images_list"' +
                            'style="float: left;position: relative;width: 50px;height: 50px;display: block;padding-right: 16px;">' +
                            '<img class="thumb_image_list" ' +
                            'style="width:50px;height:50px;cursor: pointer;margin-right: 5px;" info='+str+' flag="0" ' +
                            'src="'+define_public_url+'/Content/tmp/'+msg.cut_image+'" />' +
                            '<img class="delete_images_list" src="'+define_public_url+'/images/bullet_cross.png" style="position: absolute;right: 12px;top:1px;cursor: pointer;display: none;" />' +
                            '<input type="hidden" class="image_more" name="image_more[]" value="'+msg.image_name+'"/></span>'
                    ).appendTo('#insert_more_image').fadeOut("slow").fadeIn("slow");
                    if($("#insert_more_image").find(".positioning_images_list").size()>=10){
                        $("#file_upload_button_more").attr("disabled","disabled");
                    }else{
                        $("#file_upload_button_more").removeAttr("disabled");
                    }
                    jBox.tip('上传图片成功！', 'success',{ timeout: 1000});
                }

            }else{
                jBox.tip(msg.error, 'error',{ timeout: 1000});
            }

        }
    });

});