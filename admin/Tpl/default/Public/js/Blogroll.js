$(function(){

    $("#Blogroll-add-edit [title]").live('hover',function(){
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
                    url: define_app_url+'/Blogroll/ajaxinsert',
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

        jBox("get:"+define_app_url+"/Blogroll/add",{
            width:420,
            title: '',
            top: '30%',
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

    //修改数据
    $(".xnfy520-function-index-edit").live('click',function(){
        var value = $(this).parents("tr").find(".xnfy520-function-index-table-check-this").val();
        if(value!='' && !isNaN(value)){
            var edit_submit = function (v, h, f) {
                if (v == 'ok') {
                    jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/Blogroll/ajaxedit',
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

            jBox("get:"+define_app_url+"/Blogroll/edit/id/"+value,{
                width:420,
                title: '',
                top: '30%',
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
	$("[name=Blogroll-del]").live('submit',function(){
		var data = $(this).serializeArray();
		if(data==''){
            jBox.tip("请选择要删除的数据！", 'error',{timeout: 1000});
		}else{
            var submit = function (v, h, f) {
                if (v == 'ok'){
                    jBox.tip("正在处理...", 'loading');
                    $("[name=Blogroll-del]").find("[type=submit]").attr('disabled','disabled');
                    window.setTimeout(function () {
                        $.ajax({
                            url: define_app_url+'/Blogroll/ajaxdel',
                            data: data,
                            type:'POST',
                            success: function(data){
                                var msg = JSON.parse(data);
                                if(msg.status==1){
                                    jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location=define_self_url }});
                                }else{
                                    jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { $("[name=Blogroll-del]").find("[type=submit]").removeAttr('disabled'); }});
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
                        url: define_app_url+'/Blogroll/ajax_switch_status',
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