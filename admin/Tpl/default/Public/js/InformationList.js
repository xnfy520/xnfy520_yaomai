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



    //添加数据
    $("#xnfy520-function-index-add").live('click',function(){
        if(define_cid){
            window.location=define_app_url+"/InformationList/add/cid/"+define_cid;
        }else{
            window.location=define_app_url+"/InformationList/add";
        }
    });

    //AJAX添加
    $("[name=InformationList-add]").live('submit', function() {

        jBox.tip("正在处理...", 'loading');
        $("[name=InformationList-add]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        $.ajax({
            url: define_app_url+'/InformationList/ajaxinsert',
            data: data,
            type:'POST',
            success: function(data){
                var msg = JSON.parse(data);
                if(msg.status==1){
                    window.setTimeout(function () {
                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                            if(define_cid){
                                window.location=define_module_url+'/index/cid/'+define_cid;
                            }else{
                                window.location=define_module_url+'/index';
                            }
                        }});
                    },500);
                }else{
                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=InformationList-add]").find("[type=submit]").removeAttr('disabled'); }});
                }
            }
        });
    });

    //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        var id = $(this).parents('tr').find("[name='deleteid[]']").val();
        if(id){
            if(define_cid){
                window.location=define_app_url+"/InformationList/edit/cid/"+define_cid+'/id/'+id;
            }else{
                window.location=define_app_url+"/InformationList/edit/id/"+id;
            }
        }else{
            jBox.tip('程序异常', 'error');
        }

    });

    //AJAX修改
    $("[name=InformationList-edit]").live('submit',function(){
        jBox.tip("正在处理...", 'loading');
        $("[name=InformationList-edit]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        window.setTimeout(function () {
            $.ajax({
                url: define_app_url+'/InformationList/ajaxedit',
                data: data,
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                            if(define_cid){
                                window.location=define_module_url+'/index/cid/'+define_cid;
                            }else{
                                window.location=define_module_url+'/index';
                            }
                        }});
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function(){$("[name=InformationList-edit]").find("[type=submit]").removeAttr('disabled');}});
                    }
                }
            });
        },500);
    });

    //AJAX删除
    $("[name=InformationList-del]").live('submit',function(){
        var data = $(this).serializeArray();
        if(data==''){
            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
        }else{
            var submit = function (v, h, f) {
                if (v == 'ok'){
                    jBox.tip("正在处理...", 'loading');
                    $("[name=InformationList-del]").find("[type=submit]").attr('disabled','disabled');
                    window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/InformationList/ajaxdel',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=InformationList-del]").find("[type=submit]").removeAttr('disabled'); }});
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

    //AJAX开启切换
    $(".switchpublish").click(function(){
        jBox.tip("正在处理...", 'loading');
        var t = $(this);
        var k = $(this).attr("publish");
        var v = $(this).attr("value");
        window.setTimeout(function () {
            $.ajax({
                url: define_app_url+'/InformationList/ajaxpublish',
                data: {id:v,publish:k},
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        if(msg.data==1){
                            t.text('是');
                            t.attr("publish",1);
                            jBox.tip('修改成功！', 'success',{ timeout: 1000});
                        }else{
                            t.text('否');
                            t.attr("publish",0);
                            jBox.tip('修改成功！', 'success',{ timeout: 1000});
                        }
                    }else{
                        jBox.tip('修改失败！', 'success',{ timeout: 1000});
                    }
                }
            });
        }, 500);
    });

    $(".thumb_image").live('click',function(){
        var image = $("[name=image]").val();
        var info = $(".thumb_image").attr('info');
        if(info){
            var infos = JSON.parse(info);
        }

            if(image){
                jBox('<img style="padding: 3px 5px 0 5px;" src="'+define_public_url+'/Content/tmp/thumb_'+image+'" />',{
                    width:infos.width+10,
                    height:'auto',
                    title: '',
                    top: '20%',
                    draggable: true,
                    opacity: 0.01,
                    persistent: false,
                    showIcon: false,
                    showSpeed: 'slow',
                    buttons: { '关闭': true }
                });
            }else{
                jBox("<img style='padding: 3px 5px 0 5px;' src='"+define_public_url+"/images/default.jpg'/>",{
                    width:'auto',
                    height:'auto',
                    title: '',
                    top: '20%',
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
        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                $(".positioning_images").fadeOut('slow');
                $("[name=image]").val('');
                jBox.tip('删除图片成功！', 'success',{ timeout: 1000,closed: function () {}});
            }
            return true; //close
        };
        jBox.confirm("确认删除该图片?", "提示", submit,{top: '40%'});
    });

    $(".positioning_images").hover(function(){
        $(".delete_images").css("display","block")
    },function(){
        $(".delete_images").css("display","none")
    });

    var file_upload_button = $('#file_upload_button'), newinterval;
    var newfileType = "image";
    new AjaxUpload(file_upload_button,{

        action: define_app_url+'/InformationList/uploads',
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
                $(".thumb_image").attr('src', PUBLIC+"/Content/tmp/"+msg.cut_image);
                $(".thumb_image").parent("a").attr('href', PUBLIC+"/Content/tmp/"+msg.image_name);
                $("[name=image]").val(msg.image_name);
                var str = JSON.stringify(msg.thumb_image_info);
                $(".thumb_image").attr("info",str);
                $(".positioning_images").fadeOut('fast');
                $(".positioning_images").fadeIn('slow');
                jBox.tip('上传图片成功！', 'success',{ timeout: 1000});
            }else{
                jBox.tip(msg.error, 'error',{ timeout: 1000});
            }

        }
    });

});