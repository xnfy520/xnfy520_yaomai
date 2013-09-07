    //AJAX修改状态
    $(".abolish_dispose").live("click",function(){
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
                        url: define_app_url+'/OrderList/ajax_switch_abolish_dispose',
                        data: {by:by,type:type,value:value},
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                if(msg.data==1){
                                    self.css('color','blue');
                                    self.text('已处理');
                                    self.attr("value",1);
                                    jBox.tip('修改成功！', 'success',{ timeout: 1000});
                                }else{
                                    self.css('color','red');
                                    self.text('处理');
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
        if(value==1){
            jBox.confirm(tip.attr("data_off"), "提示", submit,{top: '40%'});
        }else{
            jBox.confirm(tip.attr("data_on"), "提示", submit,{top: '40%'});
        }
    });

    $(".manual_payment").live('click',function(){
        var self = $(this);
        var value = $(this).attr('by');
        if(value!='' && !isNaN(value)){
            var edit_submit = function (v, h, f) {
                if (v == 'ok') {
                //    jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/OrderList/set_manual_payment',
                        data: f,
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.close();
                                console.log(msg.data);
                                window.location = define_self_url;
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000});
                            }
                        }
                    });
                    return false;
                }
            };

            jBox("get:"+define_app_url+"/OrderList/manual_payment/id/"+value,{
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

        $(".change_price").live('click',function(){
        var self = $(this);
        var value = $(this).attr('by');
        if(value!='' && !isNaN(value)){
            var edit_submit = function (v, h, f) {
                if (v == 'ok') {
                    if(isNaN(f.new_price) || f.new_price<0 || f.new_price===''){
                        jBox.tip('所填价格有误', 'error',{ timeout: 1000});
                         return false;
                    }
                   jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/OrderList/set_change_price',
                        data: f,
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.close();
                                jBox.tip('修改成功', 'success',{ timeout: 1000,closed:function(){
                                    window.location = define_self_url;
                                }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000});
                            }
                        }
                    });
                    return false;
                }
            };

            jBox("get:"+define_app_url+"/OrderList/change_price/id/"+value,{
                width:420,
                height: 'auto',
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

    $(".edit_remark").live('click',function(){
        var self = $(this);
        var value = $(this).attr('by');
        if(value!='' && !isNaN(value)){
            var edit_submit = function (v, h, f) {
                if (v == 'ok') {
                    if(f.remark===''){
                        jBox.tip('内容不能为空', 'error',{ timeout: 1000});
                         return false;
                    }
                   jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/OrderList/set_edit_remark',
                        data: f,
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.close();
                                jBox.tip('修改成功', 'success',{ timeout: 1000,closed:function(){
                                    window.location = define_self_url;
                                }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000});
                            }
                        }
                    });
                    return false;
                }
            };

            jBox("get:"+define_app_url+"/OrderList/edit_remark/id/"+value,{
                width:420,
                height: 'auto',
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

        //修改数据
    $(".send_out").live('click',function(){
        var self = $(this);
        var value = $(this).attr('by');
        if(value!='' && !isNaN(value)){
            var edit_submit = function (v, h, f) {
                if (v == 'ok') {

                    if(f.logistics_company_id!=''){
                         if(f.express_number==''){
                            jBox.tip('请填写快递单号', 'success',{ timeout: 1000});
                             return false;
                        }
                    }

                     if(f.express_number!=''){
                         if(f.logistics_company_id==''){
                            jBox.tip('请选择快递公司', 'success',{ timeout: 1000});
                             return false;
                        }
                    }
                    
                    jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/OrderList/set_shipments_data',
                        data: f,
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.close();
                                console.log(msg.data);
                                if(msg.data==1){
                                    self.text('发货信息').css('color','blue');
                                }else{
                                    self.text('发货').css('color','red');
                                }
                                jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { 
                                 //   window.location=define_self_url 
                                    
                                }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000});
                            }
                        }
                    });
                    return false;
                }
            };

            jBox("get:"+define_app_url+"/OrderList/get_shipments_data/id/"+value,{
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