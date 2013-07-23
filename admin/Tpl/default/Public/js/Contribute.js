$(function(){


    $(".jbox-title").live('mouseover',function(){
        $(".tooltip").fadeOut();
    });



    //添加数据
    $("#xnfy520-function-index-add").live('click',function(){
        if(define_cid){
            window.location=define_app_url+"/Contribute/add/cid/"+define_cid;
        }else{
            window.location=define_app_url+"/Contribute/add";
        }
    });

    //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        var id = $(this).parents('tr').find("[name='deleteid[]']").val();
        if(id){
            if(define_cid){
                window.location=define_app_url+"/Contribute/edit/cid/"+define_cid+'/id/'+id;
            }else{
                window.location=define_app_url+"/Contribute/edit/id/"+id;
            }
        }else{
            jBox.tip('程序异常', 'error');
        }

    });


    //AJAX发布文章
    $("[name=insert_contribute]").live('submit',function(){
        $("[name=insert_contribute]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        var title = $("#insert_contribute [name=title]");
        var name = $("#insert_contribute [name=name]");
        var alias = $("#insert_contribute [name=alias]");
        var author = $("#insert_contribute [name=author]");
        var publisher = $("#insert_contribute [name=publisher]");
        var publication_date = $("#insert_contribute [name=publication_date]");
        var price = $("#insert_contribute [name=price]");
        var folio = $("#insert_contribute [name=folio]");
        var revision = $("#insert_contribute [name=revision]");
        var pages = $("#insert_contribute [name=pages]");
        var format = $("#insert_contribute [name=format]");
        var isbn = $("#insert_contribute [name=isbn]");
        var poi = $("#insert_contribute [name=poi]");
        var description = $("#insert_contribute [name=description]");
        var details = $("#insert_contribute [name=details]");
        var image = $("#insert_contribute [name=image]");
        var file = $("#insert_contribute [name=file]");

        if(title.val()==''){
            jBox.tip("标题不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(name.val()==''){
            jBox.tip("名称不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(alias.val()==''){
            jBox.tip("别名不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(author.val()==''){
            jBox.tip("作者不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(publisher.val()==''){
            jBox.tip("发行商不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(publication_date.val()==''){
            jBox.tip("发行日期不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(price.val()==''){
            jBox.tip("价格不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(folio.val()==''){
            jBox.tip("对开本不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(pages.val()==''){
            jBox.tip("页数不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(isbn.val()==''){
            jBox.tip("国际标准图书编号不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(description.val()==''){
            jBox.tip("描述不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(details.val()==''){
            jBox.tip("详情不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(image.val()==''){
            jBox.tip("封面不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else{
            jBox.tip("正在处理...", 'loading');
            window.setTimeout(function () {
                $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled');
                $.ajax({
                    url: define_app_url+'/Contribute/ajax_insert_contribute',
                    data: data,
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=msg.data}});
                        }else{
                            jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=insert_contribute]").find("[type=submit]").removeAttr('disabled'); }});
                        }
                    }
                });
            },500);
        }
    });

    //AJAX修改文章
    $("[name=edit_contribute]").live('submit',function(){
        $("[name=edit_contribute]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        var title = $("#edit_contribute [name=title]");
        var name = $("#edit_contribute [name=name]");
        var alias = $("#edit_contribute [name=alias]");
        var author = $("#edit_contribute [name=author]");
        var publisher = $("#edit_contribute [name=publisher]");
        var publication_date = $("#edit_contribute [name=publication_date]");
        var price = $("#edit_contribute [name=price]");
        var folio = $("#edit_contribute [name=folio]");
        var revision = $("#edit_contribute [name=revision]");
        var pages = $("#edit_contribute [name=pages]");
        var format = $("#edit_contribute [name=format]");
        var isbn = $("#edit_contribute [name=isbn]");
        var poi = $("#edit_contribute [name=poi]");
        var description = $("#edit_contribute [name=description]");
        var details = $("#edit_contribute [name=details]");
        var image = $("#edit_contribute [name=image]");
        var file = $("#edit_contribute [name=file]");
        var publish = $("#edit_contribute [name=publish]");
        var status = $("#edit_contribute [name=status]");

        if(title.val()==''){
            jBox.tip("标题不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(name.val()==''){
            jBox.tip("名称不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(alias.val()==''){
            jBox.tip("别名不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(author.val()==''){
            jBox.tip("作者不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(publisher.val()==''){
            jBox.tip("发行商不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(publication_date.val()==''){
            jBox.tip("发行日期不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(price.val()==''){
            jBox.tip("价格不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(folio.val()==''){
            jBox.tip("对开本不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(pages.val()==''){
            jBox.tip("页数不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(isbn.val()==''){
            jBox.tip("国际标准图书编号不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(description.val()==''){
            jBox.tip("描述不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(details.val()==''){
            jBox.tip("详情不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(image.val()==''){
            jBox.tip("封面不能为空", 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else{
            jBox.tip("正在处理...", 'loading');
            window.setTimeout(function () {
                $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled');
                $.ajax({
                    url: define_app_url+'/Contribute/ajax_edit_contribute',
                    data: data,
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=msg.data}});
                        }else{
                            jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=edit_contribute]").find("[type=submit]").removeAttr('disabled'); }});
                        }
                    }
                });
            },500);
        }
    });


    $(".thumb_image").live('click',function(){
        var image = $("[name=image]").val();
        var info = $(".thumb_image").attr('info');
        if(info){
            var infos = JSON.parse(info);
        }
        if($(this).attr("status")==1){
            jBox('<img style="padding: 3px 5px 5px 5px;" src="'+define_public_url+'/Content/Contribute/thumb_'+image+'" />',{
                width:infos.width+10,
                height:'auto',
                title: '',
                top: '20%',
                draggable: true,
                opacity: 0.01,
                persistent: false,
                showIcon: false,
                showSpeed: 'slow',
                buttons: { 'close': true }
            });
        }else{
            if($(this).attr("flag")==1){
                if(image){
                    jBox('<img style="padding: 3px 5px 5px 5px;" src="'+define_public_url+'/Content/tmp/thumb_'+image+'" />',{
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
                    jBox("<img style='padding: 3px 5px 5px 5px;' src='"+define_public_url+"/images/default.jpg'/>",{
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
            }
        }
    });


    $(".delete_images").live("click",function(){
        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
//                $("#table_tr_show_image").fadeOut('slow');
//                $("#table_tr_show_image_add").fadeOut('slow');
                $(".thumb_image").attr('src',define_public_url+'/images/default.jpg').attr("flag",0);
                $("[name=image]").val('');
                jBox.tip('删除图片成功！', 'success',{ timeout: 1000,closed: function () {}});
            }
            return true; //close
        };
        jBox.confirm("确认删除该图片?", "提示", submit,{top: '40%'});
    });

    $(".delete_file").live("click",function(){
        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                $("[name=file]").val('').attr("flag",0);
                jBox.tip('删除文件成功！', 'success',{ timeout: 1000,closed: function () {}});
            }
            return true; //close
        };
        jBox.confirm("确认删除该文件?", "提示", submit,{top: '40%'});
    });

    $(".positioning_images").live('mouseover',function(){
        var flag = $(this).find(".thumb_image").attr("flag");
        if(flag != 0){
            $(".delete_images").css("display","block");
        }
    });

    $(".positioning_images").live('mouseout',function(){
        var flag = $(this).find(".thumb_image").attr("flag");
        if(flag != 0){
            $(".delete_images").css("display","none");
        }
    });

    $(".positioning_file").live('mouseover',function(){
        var flag = $(this).find("[name=file]").attr("flag");
        if(flag != 0){
            $(".delete_file").css("display","block");
        }
    });

    $(".positioning_file").live('mouseout',function(){
        var flag = $(this).find("[name=file]").attr("flag");
        if(flag != 0){
            $(".delete_file").css("display","none");
        }
    });

    //AJAX启用切换
    $(".switchpublish").click(function(){
        var t = $(this);
        var k = $(this).attr("publish");
        var va = $(this).attr("value");
        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                window.setTimeout(function () {
                    $.ajax({
                        url: define_app_url+'/Contribute/ajaxpublish',
                        data: {id:va,publish:k},
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                if(msg.data==1){
                                    t.text('是');
                                    t.attr("publish",1).css("color","red");
                                    jBox.tip(msg.info, 'success',{ timeout: 1000});
                                }else{
                                    t.text('否');
                                    t.attr("publish",0).css("color","#5C5C5C");
                                    jBox.tip(msg.info, 'success',{ timeout: 1000});
                                }
                            }else{
                                jBox.tip(msg.info, 'success',{ timeout: 1000});
                            }
                        }
                    });
                }, 500);
            }
            return true; //close
        };

        if(k==0){
            jBox.confirm("确认发布？", "提示", submit,{top: '40%'});
        }else{
            jBox.confirm("确认取消发布？", "提示", submit,{top: '40%'});
        }

    });

    //AJAX推荐切换
    $(".switchrecommend").click(function(){

        var t = $(this);
        var k = $(this).attr("recommend");
        var va = $(this).attr("value");
        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                window.setTimeout(function () {
                    $.ajax({
                        url: define_app_url+'/Contribute/ajaxrecommend',
                        data: {id:va,recommend:k},
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                if(msg.data==1){
                                    t.text('是');
                                    t.attr("recommend",1).css("color","red");
                                    jBox.tip('修改成功！', 'success',{ timeout: 1000});
                                }else{
                                    t.text('否');
                                    t.attr("recommend",0).css("color","#5C5C5C");
                                    jBox.tip('修改成功！', 'success',{ timeout: 1000});
                                }
                            }else{
                                jBox.tip('修改失败！', 'success',{ timeout: 1000});
                            }
                        }
                    });
                }, 500);
            }
            return true; //close
        };
        if(k==0){
            jBox.confirm("确认推荐？", "提示", submit,{top: '40%'});
        }else{
            jBox.confirm("确认取消推荐？", "提示", submit,{top: '40%'});
        }

    });

    //AJAX状态切换
    $(".switchstatus").click(function(){
        var t = $(this);
        var k = $(this).attr("status");
        var va = $(this).attr("value");

        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                window.setTimeout(function () {
                    $.ajax({
                        url: define_app_url+'/Contribute/ajaxstatus',
                        data: {id:va,status:k},
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                if(msg.data==1){
                                    t.text('是');
                                    t.attr("status",1).css("color","red");
                                    jBox.tip(msg.info, 'success',{ timeout: 1000});
                                }else{
                                    t.text('否');
                                    t.attr("status",0).css("color","#5C5C5C");
                                    jBox.tip(msg.info, 'success',{ timeout: 1000});
                                }
                            }else{
                                jBox.tip(msg.info, 'success',{ timeout: 1000});
                            }
                        }
                    });
                }, 500);
            }
            return true; //close
        };
        if(k==0){
            jBox.confirm("确认通过审核？", "提示", submit,{top: '40%'});
        }else{
            jBox.confirm("确认取消审核？", "提示", submit,{top: '40%'});
        }
    });


    //AJAX删除
    $("[name=Contribute-del]").live('submit',function(){
        var data = $(this).serializeArray();
        if(data==''){
            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
        }else{
            var submit = function (v, h, f) {
                if (v == 'ok'){
                    jBox.tip("正在处理...", 'loading');
                    $("[name=delete_contribute]").find("[type=submit]").attr('disabled','disabled');
                    window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/Contribute/ajax_delete_contribute',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=delete_contribute]").find("[type=submit]").removeAttr('disabled'); }});
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



    var file_upload_button = $('#file_upload_button'), newinterval;
    var newfileType = "image";
    new AjaxUpload(file_upload_button,{

        action: define_app_url+'/Contribute/uploads',
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
            jBox.tip("正在上传...", 'loading');
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
                $(".thumb_image").attr("info",str).attr("flag",1).attr("status",0);
//                    $(".positioning_images").fadeOut('fast');
//                    $(".positioning_images").fadeIn('slow');
                jBox.tip('上传图片成功！', 'success',{ timeout: 1000});
            }else{
                jBox.tip(msg.error, 'error',{ timeout: 1000});
            }

        }
    });

    var file_upload_button_2 = $('#file_upload_button_2'), newinterval_2;
    var newfileType_2 = "pdf";
    new AjaxUpload(file_upload_button_2,{

        action: define_app_url+'/Contribute/uploadFile',
        name: 'myfile',
        onSubmit : function(file, ext){

            if(newfileType_2 == "image")
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

            if(ext!='pdf'){
                jBox.tip('非PDF类型文件,请重新上传！', 'error',{ timeout: 1000});
                return false;
            }else{
                this.disable();
                $("#file_upload_button_2").attr("disabled","disabled");
                $("[type=submit]").attr("disabled","disabled");
                jBox.tip("正在上传...", 'loading');
            }
        },
        onComplete: function(file, response){
            this.enable();
            var msg = JSON.parse(response);

            if(msg.status){
                $("#file_upload_button_2").removeAttr("disabled");
                $("[type=submit]").removeAttr("disabled");
                $("[name=file]").val(msg.file_name);
                $("[name=file]").attr("flag",1).attr("value",msg.file_name);
                jBox.tip('上传文件成功！', 'success',{ timeout: 1000});
            }else{
                jBox.tip(msg.error, 'error',{ timeout: 1000});
            }

        }

    });


//    $("#Contribute-add-edit [title]").live('hover',function(){
//        $(this).tooltip({
//            position: "center right",
//            offset: [-2, 10],
//            effect: "fade",
//            opacity: 0.7
//        });
//    });

//    //AJAX添加
//    $("[name=Contribute-add]").live('submit', function() {
//
//        jBox.tip("正在处理...", 'loading');
//        $("[name=Contribute-add]").find("[type=submit]").attr('disabled','disabled');
//        var data = $(this).serializeArray();
//        $.ajax({
//            url: define_app_url+'/Contribute/ajaxinsert',
//            data: data,
//            type:'POST',
//            success: function(data){
//                var msg = JSON.parse(data);
//                if(msg.status==1){
//                    window.setTimeout(function () {
//                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
//                            if(define_cid){
//                                window.location=define_module_url+'/index/cid/'+define_cid;
//                            }else{
//                                window.location=define_module_url+'/index';
//                            }
//                        }});
//                    },500);
//                }else{
//                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=Contribute-add]").find("[type=submit]").removeAttr('disabled'); }});
//                }
//            }
//        });
//    });

//    //AJAX修改
//    $("[name=Contribute-edit]").live('submit',function(){
//        jBox.tip("正在处理...", 'loading');
//        $("[name=Contribute-edit]").find("[type=submit]").attr('disabled','disabled');
//        var data = $(this).serializeArray();
//        window.setTimeout(function () {
//            $.ajax({
//                url: define_app_url+'/Contribute/ajaxedit',
//                data: data,
//                type:'POST',
//                success: function(data){
//                    var msg = JSON.parse(data);
//                    if(msg.status==1){
//                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
//                            if(define_cid){
//                                window.location=define_module_url+'/index/cid/'+define_cid;
//                            }else{
//                                window.location=define_module_url+'/index';
//                            }
//                        }});
//                    }else{
//                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function(){$("[name=Contribute-edit]").find("[type=submit]").removeAttr('disabled');}});
//                    }
//                }
//            });
//        },500);
//    });

//    //AJAX删除
//    $("[name=Contribute-del]").live('submit',function(){
//        var data = $(this).serializeArray();
//        if(data==''){
//            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
//        }else{
//            var submit = function (v, h, f) {
//                if (v == 'ok'){
//                    jBox.tip("正在处理...", 'loading');
//                    $("[name=Contribute-del]").find("[type=submit]").attr('disabled','disabled');
//                    window.setTimeout(function () {
//                        $.ajax({
//                            url: define_app_url+'/Contribute/ajaxdel',
//                            data: data,
//                            type:'POST',
//                            success: function(data){
//                                var msg = JSON.parse(data);
//                                if(msg.status==1){
//                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
//                                }else{
//                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=Contribute-del]").find("[type=submit]").removeAttr('disabled'); }});
//                                }
//                            }
//                        });
//                    },500);
//                }
//                return true; //close
//            };
//            jBox.confirm("确认删除这些数据？", "提示", submit,{top: '40%'});
//        }
//
//    });

//    //AJAX开启切换
//    $(".switchpublish").click(function(){
//        jBox.tip("正在处理...", 'loading');
//        var t = $(this);
//        var k = $(this).attr("publish");
//        var v = $(this).attr("value");
//        window.setTimeout(function () {
//            $.ajax({
//                url: define_app_url+'/Contribute/ajaxpublish',
//                data: {id:v,publish:k},
//                type:'POST',
//                success: function(data){
//                    var msg = JSON.parse(data);
//                    if(msg.status==1){
//                        if(msg.data==1){
//                            t.text('是');
//                            t.attr("publish",1);
//                            jBox.tip('修改成功！', 'success',{ timeout: 1000});
//                        }else{
//                            t.text('否');
//                            t.attr("publish",0);
//                            jBox.tip('修改成功！', 'success',{ timeout: 1000});
//                        }
//                    }else{
//                        jBox.tip('修改失败！', 'success',{ timeout: 1000});
//                    }
//                }
//            });
//        }, 500);
//    });

//    $(".thumb_image").live('click',function(){
//        var image = $("[name=image]").val();
//        var info = $(".thumb_image").attr('info');
//        if(info){
//            var infos = JSON.parse(info);
//        }
//
//            if(image){
//                jBox('<img style="padding: 3px 5px 0 5px;" src="'+define_public_url+'/Content/tmp/thumb_'+image+'" />',{
//                    width:infos.width+10,
//                    height:'auto',
//                    title: '',
//                    top: '20%',
//                    draggable: true,
//                    opacity: 0.01,
//                    persistent: false,
//                    showIcon: false,
//                    showSpeed: 'slow',
//                    buttons: { '关闭': true }
//                });
//            }else{
//                jBox("<img style='padding: 3px 5px 0 5px;' src='"+define_public_url+"/images/default.jpg'/>",{
//                    width:'auto',
//                    height:'auto',
//                    title: '',
//                    top: '20%',
//                    draggable: true,
//                    opacity: 0.01,
//                    persistent: false,
//                    showIcon: false,
//                    showSpeed: 'slow',
//                    buttons: { '关闭': true }
//                });
//            }
//
//    });
//
//    $(".delete_images").live("click",function(){
//        var submit = function (v, h, f) {
//            if (v == 'ok'){
//                jBox.tip("正在处理...", 'loading');
//                $(".positioning_images").fadeOut('slow');
//                $("[name=image]").val('');
//                jBox.tip('删除图片成功！', 'success',{ timeout: 1000,closed: function () {}});
//            }
//            return true; //close
//        };
//        jBox.confirm("确认删除该图片?", "提示", submit,{top: '40%'});
//    });

//    $(".positioning_images").hover(function(){
//        $(".delete_images").css("display","block")
//    },function(){
//        $(".delete_images").css("display","none")
//    });

//    var file_upload_button = $('#file_upload_button'), newinterval;
//    var newfileType = "image";
//    new AjaxUpload(file_upload_button,{
//
//        action: define_app_url+'/Contribute/uploads',
//        name: 'myfile',
//        onSubmit : function(file, ext){
//
//            if(newfileType == "image")
//            {
//                if (ext && /^(jpg|png|jpeg|gif)$/.test(ext)){
//                    this.setData({
//                        'info': 'Document type for pictures'
//                    });
//                } else {
//                    jBox.tip('非图像类型文件,请重新上传！', 'error',{ timeout: 1000});
//                    return false;
//                }
//            }
//
//            this.disable();
//            $("#file_upload_button").attr("disabled","disabled");
//            $("[type=submit]").attr("disabled","disabled");
//
//        },
//        onComplete: function(file, response){
//            this.enable();
//            var msg = JSON.parse(response);
//
//            if(msg.status){
//                $("#file_upload_button").removeAttr("disabled");
//                $("[type=submit]").removeAttr("disabled");
//                $(".thumb_image").attr('src', PUBLIC+"/Content/tmp/"+msg.cut_image);
//                $(".thumb_image").parent("a").attr('href', PUBLIC+"/Content/tmp/"+msg.image_name);
//                $("[name=image]").val(msg.image_name);
//                var str = JSON.stringify(msg.thumb_image_info);
//                $(".thumb_image").attr("info",str);
//                $(".positioning_images").fadeOut('fast');
//                $(".positioning_images").fadeIn('slow');
//                jBox.tip('上传图片成功！', 'success',{ timeout: 1000});
//            }else{
//                jBox.tip(msg.error, 'error',{ timeout: 1000});
//            }
//
//        }
//    });

});