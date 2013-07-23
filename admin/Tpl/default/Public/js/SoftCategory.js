$(function(){

    $("#SoftCategory-add-edit [title]").live('hover',function(){
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
        var add_submit = function (v, h, f) {
            if (v == 'ok') {
                jBox.tip("正在处理...", 'loading');
                $.ajax({
                    url: define_app_url+'/SoftCategory/ajaxinsert',
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

        jBox("get:"+define_app_url+"/SoftCategory/add",{
            width:423,
            title: '',
            top: '20%',
            draggable: true,
            opacity: 0.01,
            persistent: true,
            showIcon: false,
            showSpeed: 'slow',
            bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
            buttons: { '添加': 'ok','取消':'cancel'},
            submit:add_submit
        });

    });

    var a = $("#xnfy520-function-index-table-th-name").width();
    var b = $("#xnfy520-function-index-table-th-number").width();
    var c = $("#xnfy520-function-index-table-th-enable").width();
    var d = $("#xnfy520-function-index-table-th-sort").width();
    var e = $("#xnfy520-function-index-table-th-description").width();
    var f = $("#xnfy520-function-index-table-th-check-all").width();

    var all = $("#xnfy520-function-index-table").width();
    var end = all-a-b-c-d-f;

    $("#index-edit-description").css("max-width","500px");
    //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        var self = $(this);
        var value = $(this).parents("tr").find(".xnfy520-function-index-table-check-this").val();
        if(value!='' && !isNaN(value)){
            var edit_submit = function (v, h, f) {
                if (v == 'ok') {
//                    jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/SoftCategory/ajaxedit',
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

            jBox("get:"+define_app_url+"/SoftCategory/edit/id/"+value,{
                width:420,
                title: '',
                top: '15%',
                draggable: true,
                opacity: 0.01,
                persistent: true,
                showIcon: false,
                showSpeed: 'slow',
                bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
                buttons: { '修改': 'ok','取消':'cancel'},
                loaded: function (h) {
                    if($("[name=id]").val()==''){
                        jBox.close();
                        jBox.tip('程序异常', 'error',{ timeout: 1000});
                    }
                },
                submit:edit_submit
            });
        }else{
            jBox.tip('程序异常', 'error',{ timeout: 1000});
        }

    });

    //AJAX删除
    $("[name=SoftCategory-del]").live('submit',function(){
        var data = $(this).serializeArray();
        if(data==''){
            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
        }else{
            var submit = function (v, h, f) {
                if (v == 'ok'){
                    jBox.tip("正在处理...", 'loading');
                    $("[name=SoftCategory-del]").find("[type=submit]").attr('disabled','disabled');
                    window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/SoftCategory/ajaxdel',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=SoftCategory-del]").find("[type=submit]").removeAttr('disabled'); }});
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
                url: define_app_url+'/SoftCategory/ajaxpublish',
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

    $(".delete_images").live("click",function(){
        var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                $("#table_tr_show_image").fadeOut('slow');
                $("#table_tr_show_image_add").fadeOut('slow');
                $("[name=image]").val('');
                jBox.tip('删除图片成功！', 'success',{ timeout: 1000,closed: function () {}});
            }
            return true; //close
        };
        jBox.confirm("确认删除该图片?", "提示", submit,{top: '40%'});
    });

    $(".positioning_images").live('mouseover',function(){
        $(".delete_images").css("display","block");
    });

    $(".positioning_images").live('mouseout',function(){
        $(".delete_images").css("display","none");
    });

});