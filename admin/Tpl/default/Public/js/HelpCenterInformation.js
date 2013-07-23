$(function(){

    //添加数据
    $("#xnfy520-function-index-add").live('click',function(){
        window.location = define_app_url+"/HelpCenterInformation/add"+((define_pid!='' && define_pid!=0) ? '/pid/'+define_pid : '');
    });

    //AJAX添加
    $("[name=HelpCenterInformation-add]").live('submit', function() {
        var data = $(this).serializeArray();
        $("[type=submit]").attr('disabled','disabled');

        jBox.tip("正在处理...", 'loading');
        $.ajax({
            url: define_app_url+'/HelpCenterInformation/ajaxinsert',
            data: data,
            type:'POST',
            success: function(data){
                var msg = JSON.parse(data);
                if(msg.status==1){
                    window.setTimeout(function () {
                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                            window.location=define_module_url+'/index'+((define_pid!='' && define_pid!=0) ? '/pid/'+define_pid : '');
                        }});
                    },500);
                }else{
                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[type=submit]").removeAttr('disabled'); }});
                }
            }
        });
    });

    //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        var id = $(this).parents('tr').find("[name='deleteid[]']").val();
        if(id!='' && id!=0){
            window.location=define_app_url+"/HelpCenterInformation/edit/id/"+id+((define_pid!='' && define_pid!=0) ? '/pid/'+define_pid : '');
        }else{
            jBox.tip('程序异常', 'error');
        }
    });

    //AJAX修改
    $("[name=HelpCenterInformation-edit]").live('submit',function(){
        jBox.tip("正在处理...", 'loading');
        $("[type=submit]").attr('disabled','disabled');
        var data = $(this).serializeArray();
        window.setTimeout(function () {
            $.ajax({
                url: define_app_url+'/HelpCenterInformation/ajaxedit',
                data: data,
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                window.location=define_module_url+'/index'+((define_pid!='' && define_pid!=0) ? '/pid/'+define_pid : '');
                        }});
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function(){$("[type=submit]").removeAttr('disabled');}});
                    }
                }
            });
        },500);
    });

    //AJAX删除
    $("[name=HelpCenterInformation-del]").live('submit',function(){
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
                            url: define_app_url+'/HelpCenterInformation/ajaxdel',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[type=submit]").removeAttr('disabled'); }});
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
                        url: define_app_url+'/HelpCenterInformation/ajax_switch_status',
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
});