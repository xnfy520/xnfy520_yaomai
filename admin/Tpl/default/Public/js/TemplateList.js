$(function(){

    //添加数据
    $("#xnfy520-function-index-add").live('click',function(){
        window.location = define_app_url+"/TemplateList/add"+((define_pid!='' && define_pid!=0) ? '/pid/'+define_pid : '')+((define_cid!='' && define_cid!=0) ? '/cid/'+define_cid : '')+((define_sid!='' && define_sid!=0) ? '/sid/'+define_sid : '');
    });

    $("[name=pid]").change(function(){
        var v = $(this).val();
        var cid = $("[name=cid]");
        cid.html("");
        $('<option value="0" style="background: #ccc;">--请选择--</option>').appendTo(cid);
        if(v!=0){
            $.ajax({
                url: define_app_url+'/TemplateList/return_infos',
                data: {pid:v},
                type:'POST',
                success: function(datas){
                    var obj = JSON.parse(datas);
                    var cid = $("[name=cid]");
                    cid.html("");
                    $('<option value="0">--请选择--</option>').appendTo(cid);
                    for(var i=0; i<obj.length; i++){
                        $('<option value="'+obj[i].id+'">'+obj[i].name+'</option>').appendTo(cid);
                    }
                }
            });
        }

    });

    //AJAX添加
    $("[name=TemplateList-add]").live('submit', function() {
        var data = $(this).serializeArray();
        $("[type=submit]").attr('disabled','disabled');
        var name = $("[name=name]").val();
        var pid = $("[name=pid]").val();
        var cid = $("[name=cid]").val();
        var sid = $("[name=sid]").val();
        if(pid==0){
            jBox.tip('请选择所属区域！', 'error',{ timeout: 1000,closed: function () { $("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(cid==0){
            jBox.tip('请选择所属省市！', 'error',{ timeout: 1000,closed: function () { $("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else if(sid==0){
            jBox.tip('请选择所属资讯！', 'error',{ timeout: 1000,closed: function () { $("[type=submit]").removeAttr('disabled'); }});
            return false;
        }else{
            jBox.tip("正在处理...", 'loading');
            $.ajax({
                url: define_app_url+'/TemplateList/ajaxinsert',
                data: data,
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        window.setTimeout(function () {
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                window.location=define_module_url+'/index'+((define_pid!='' && define_pid!=0) ? '/pid/'+define_pid : '')+((define_cid!='' && define_cid!=0) ? '/cid/'+define_cid : '')+((define_sid!='' && define_sid!=0) ? '/sid/'+define_sid : '');
                            }});
                        },500);
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[type=submit]").removeAttr('disabled'); }});
                    }
                }
            });
        }

    });

    //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        var id = $(this).parents('tr').find("[name='deleteid[]']").val();
        if(id!='' && id!=0){
            window.location=define_app_url+"/TemplateList/edit/id/"+id+((define_pid!='' && define_pid!=0) ? '/pid/'+define_pid : '')+((define_cid!='' && define_cid!=0) ? '/cid/'+define_cid : '')+((define_sid!='' && define_sid!=0) ? '/sid/'+define_sid : '');
        }else{
            jBox.tip('程序异常', 'error');
        }

    });

    //AJAX修改
    $("[name=TemplateList-edit]").live('submit',function(){
        jBox.tip("正在处理...", 'loading');
        $("[name=TemplateList-edit]").find("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        window.setTimeout(function () {
            $.ajax({
                url: define_app_url+'/TemplateList/ajaxedit',
                data: data,
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                window.location=define_module_url+'/index'+((define_pid!='' && define_pid!=0) ? '/pid/'+define_pid : '')+((define_cid!='' && define_cid!=0) ? '/cid/'+define_cid : '')+((define_sid!='' && define_sid!=0) ? '/sid/'+define_sid : '');
                        }});
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function(){$("[type=submit]").removeAttr('disabled');}});
                    }
                }
            });
        },500);
    });

    //AJAX删除
    $("[name=TemplateList-del]").live('submit',function(){
        var data = $(this).serializeArray();
        if(data==''){
            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
        }else{
            var submit = function (v, h, f) {
                if (v == 'ok'){
                    jBox.tip("正在处理...", 'loading');
                    $("[type=submit]").attr('disabled','disabled');
                    window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/TemplateList/ajaxdel',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=TemplateList-del]").find("[type=submit]").removeAttr('disabled'); }});
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
                        url: define_app_url+'/TemplateList/ajax_switch_status',
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

});