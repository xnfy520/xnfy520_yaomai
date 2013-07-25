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
//            window.location=define_app_url+"/GrouponCommodity/add/cid/"+define_cid;
//        }else{
//            window.location=define_app_url+"/GrouponCommodity/add";
//        }
//    });

        //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        var pid = $(this).parents('tr').find("[name='deleteid[]']").attr("pid");
        var id = $(this).parents('tr').find("[name='deleteid[]']").val();
        if(pid && id){
            window.location=define_app_url+"/GrouponCommodity/edit/pid/"+pid+'/id/'+id;
        }else{
            jBox.tip('程序异常', 'error');
        }
    });

    //AJAX添加
    $("[name=GrouponCommodity-add]").live('submit', function() {
        $("[name=GrouponCommodity-add]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        var name = $("[name=name]");
        var org_price = $("[name=org_price]");
        var price = $("[name=price]");
        var expiration_date = $("[name=expiration_date]");
        var image = $("[name=image]");

        if(name.val()===''){
            jBox.tip('商品名称不能为空', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-add]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(org_price.val()==='' || org_price.val()<=0 || org_price.val()[0]==0 || isNaN(org_price.val())){
            jBox.tip('请填写商品原价', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-add]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(price.val()==='' || price.val()<=0 || price.val()[0]==0 || isNaN(price.val())){
            jBox.tip('请填写商品现价', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-add]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(expiration_date.val()==''){
            jBox.tip('请选择预订截止日期', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-add]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(image.val()===''){
            jBox.tip('商品封面，不能为空', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-add]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else{
           jBox.tip("正在处理...", 'loading');
            $.ajax({
                url: define_app_url+'/GrouponCommodity/ajax_insert',
                data: data,
                type:'POST',
                success: function(datas){
                    var msg = JSON.parse(datas);
                    if(msg.status==1){
                        window.setTimeout(function () {
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                window.location=define_module_url+'/index';
                            }});
                        },500);
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () {
                            $("[name=GrouponCommodity-add]").find("[type=submit]").removeAttr('disabled');
                        }});
                    }
                }
            });
        }

    });

    //AJAX修改
    $("[name=GrouponCommodity-edit]").live('submit',function(){
        $("[name=GrouponCommodity-edit]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        var pid = $("[name=pid]");
        var id = $("[name=id]");
        var org_price = $("[name=org_price]");
        var expiration_date = $("[name=expiration_date]");
        var price = $("[name=price]");
        var image = $("[name=image]");

        if(pid.val()==='' && id.val()===''){
            jBox.tip('异常操作', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-edit]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(org_price.val()==='' || org_price.val()<=0 || org_price.val()[0]==0 || isNaN(org_price.val())){
            jBox.tip('请填写商品原价', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-edit]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(price.val()==='' || price.val()<=0 || price.val()[0]==0 || isNaN(price.val())){
            jBox.tip('请填写商品售价', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-edit]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(expiration_date.val()==''){
            jBox.tip('请选择预订截止日期', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-edit]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else if(image.val()===''){
            jBox.tip('商品封面，不能为空', 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-edit]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }
        else{
            jBox.tip("正在处理...", 'loading');
            $.ajax({
                url: define_app_url+'/GrouponCommodity/ajax_edit',
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
                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-edit]").find("[type=submit]").removeAttr('disabled'); }});
                    }
                }
            });
        }
    });

    //AJAX删除
    $("[name=GrouponCommodity-del]").live('submit',function(){
        var data = $(this).serializeArray();
        if(data==''){
            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
        }else{
            var submit = function (v, h, f) {
                if (v == 'ok'){
                    jBox.tip("正在处理...", 'loading');
                    $("[name=GrouponCommodity-del]").find("[type=submit]").attr('disabled','disabled');
                    window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/GrouponCommodity/ajax_del',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=GrouponCommodity-del]").find("[type=submit]").removeAttr('disabled'); }});
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
                        url: define_app_url+'/GrouponCommodity/ajax_switch_status',
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
                jBox('<img style="padding: 3px 5px 0 5px;" src="'+define_public_url+'/Content/GrouponCommodity/thumb_'+image+'" />',{
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
                        url: define_app_url+'/GrouponCommodity/delete_image',
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

    var file_upload_button = $('#file_upload_button');
    var newfileType = "image";
    new AjaxUpload(file_upload_button,{

        action: define_app_url+'/GrouponCommodity/uploads',
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

});