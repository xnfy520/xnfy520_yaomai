$(function(){

	$("[name=information_province]").live('change',function(){
        var v = $(this).val();
        var city = $("#information_city");
		var county = $("#information_county");
        city.html("");
        // $('<select name="information_city"><option value="0" style="background: #ccc;">--请选择--</option></select>').appendTo(city);
        $("[name=where_id]").val(v);
        if(v==0){
			city.html("");
            county.html("");
            $("[name=where_text]").val('');
        }else{
            $("[name=where_text]").val($(this).find("option:selected").text());
            $.ajax({
                url: define_app_url+'/Member/return_provinces',
                data: {pid:v},
                type:'POST',
                success: function(datas){
                    var obj = JSON.parse(datas);
					if(obj.length>0){
						city.html("");
						$('<select name="information_city"><option value="0" style="background: #ccc;">--请选择--</option></select>').appendTo(city);
						var citys = $("[name=information_city]");
						for(var i=0; i<obj.length; i++){
							$('<option value="'+obj[i].id+'">'+obj[i].name+'</option>').appendTo(citys);
						}
					}else{
						city.html("");
					}
                }
            });
        }
    });

    $("[name=information_city]").live('change',function(){
        var v = $(this).val();
        var county = $("#information_county");
        county.html("");
        if(v==0){
			county.html("");
            $("[name=where_id]").val($("[name=information_province]").val());
            $("[name=where_text]").val($("[name=information_province]").find("option:selected").text());
        }else{
			$("[name=where_id]").val(v);
            $("[name=where_text]").val($("[name=information_province]").find("option:selected").text()+' '+$(this).find("option:selected").text());
            $.ajax({
                url: define_app_url+'/Member/return_provinces',
                data: {pid:v},
                type:'POST',
                success: function(datas){
                    var obj = JSON.parse(datas);
					if(obj.length>0){
						county.html("");
						$('<select name="information_county"><option value="0" style="background: #ccc;">--请选择--</option></select>').appendTo(county);
						var countys = $("[name=information_county]");
						for(var i=0; i<obj.length; i++){
							$('<option value="'+obj[i].id+'">'+obj[i].name+'</option>').appendTo(countys);
						}
					}else{
						county.html("");
					}
                }
            });
        }
    });

    $("[name=information_county]").live('change',function(){
		var v = $(this).val();
		if(v!=0){
			$("[name=where_id]").val(v);
            $("[name=where_text]").val($("[name=information_province]").find("option:selected").text()+' '+$("[name=information_city]").find("option:selected").text()+' '+$(this).find("option:selected").text());
		}else{
            $("[name=where_id]").val($("[name=information_city]").val());
            $("[name=where_text]").val($("[name=information_province]").find("option:selected").text()+' '+$("[name=information_city]").find("option:selected").text());
        }
    });

    $("[name=update_information]").submit(function(){
        var data = $(this).serializeArray();

        var nickname = $("[name=update_information]").find("[name=nickname]");
        var truename = $("[name=update_information]").find("[name=truename]");
        var email = $("[name=update_information]").find("[name=email]");
        var phone = $("[name=update_information]").find("[name=phone]");
        if(nickname.val()==''){
            jBox.tip("昵称不能为空", 'error',{ timeout: 1000,closed: function () { }});
            return false;
        }
        if(truename.val()!=''){
			if(!/[\u4e00-\u9fa5]+/.test(truename.val())){
				jBox.tip("真实名称必须为中文", 'error',{ timeout: 1000,closed: function () {  }});
				return false;
			}
        }
        if(email.val()!=''){
			if(!/^[\w\d\-\.]+@[\w\d\-\.]+\.[\w]+$/.test(email.val())) {
				jBox.tip("邮箱格式错误", 'error',{ timeout: 1000,closed: function () { }});
				return false;
			}
        }
        if(phone.val()!=''){
			if(phone.val().length<11 || phone.val().length>11 || phone.val()[0]!=1 || phone.val()[1]==2){
				console.log('e');
				jBox.tip("请输入正确的手机号码", 'error',{ timeout: 1000,closed: function () {  }});
				return false;
			}
        }
        jBox.tip("正在处理...", 'loading');
        window.setTimeout(function () {
            $.ajax({
                url: define_app_url+'/Member/ajax_update_information',
                data: data,
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        if($("[name=update_information]").find("[name=tencent_qq_nickname]").attr("checked")=='checked'){
                            $('.cancel_qq').remove();
                            $('.cancel_qq_text').text('未绑定');
                        }
                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                            
                        }});
                    }else{
                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                            
                        }});
                    }
                }
            });
        },500);
    });

    $("[name=change_password]").submit(function(){
    	var data = $(this).serializeArray();
		var oldpassword = $("#change_password").find("[name=oldpassword]");
        var newpassword = $("#change_password").find("[name=newpassword]");
        var renewpassword = $("#change_password").find("[name=renewpassword]");
        if(oldpassword.val()==''){
            jBox.tip('原始密码不能为空', 'error',{ timeout: 1000});
            return false;
        }else if(newpassword.val()==''){
            jBox.tip('新密码不能为空', 'error',{ timeout: 1000});
            return false;
        }else if(oldpassword.val()==newpassword.val()){
            jBox.tip('原密码不能与新密码相同', 'error',{ timeout: 1000});
            return false;
        }else if(renewpassword.val()!=newpassword.val()){
            jBox.tip('两次新密码输入不一致', 'error',{ timeout: 1000});
            return false;
        }else if(oldpassword.val().length<6 || newpassword.val()<6 || renewpassword.val()<6){
            jBox.tip('密码均不能小于6位', 'error',{ timeout: 1000});
            return false;
        }else{
            $.ajax({
                url: define_app_url+'/Member/ajax_change_password',
                data: data,
                type:'POST',
                success: function(data){
                    var msg = JSON.parse(data);
                    if(msg.status==1){
                        jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
							oldpassword.val('');
							newpassword.val('');
							renewpassword.val('');
                         }});
                    }else{
                        jBox.tip(msg.info, 'error',{ timeout: 1000});
                    }
                }
            });
            return false;
        }
    });

    $("#add_new_address").click(function(){
            var add_submit = function (v, h, f) {
            var ics = $("[name=information_city]");
            var iccs = $("[name=information_county]");
                if (v == 'ok') {
                    if(f.consignee=='' || !/[\u4e00-\u9fa5]+/.test(f.consignee) || f.consignee.length<2){
                        jBox.tip('请填写收货人姓名', 'error',{ timeout: 1000});
                        return false;
                    }
                     if(f.where_id=='' || f.where_id==0){
                        jBox.tip('请选择所在城市', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(ics.find('option').size()>0 && ics.val()==0){
                        jBox.tip('请选择所在城市', 'error',{ timeout: 1000});
                        return false;
                    }

                    if(iccs.find('option').size()>0 && iccs.val()==0){
                        jBox.tip('请选择所在城市', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.street==''){
                        jBox.tip('请填写街道地址', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.street==''){
                        jBox.tip('邮编不能为空', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.zip=='' || isNaN(f.zip) || f.zip.length<6){
                        jBox.tip('请输入正确的邮编', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.phone=='' && f.cellphone==''){
                        jBox.tip('电话和手机必须填写一个', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.phone!=''){
                        if(isNaN(f.phone) || f.phone.length<7){
                            jBox.tip('请填写正确电话号码', 'error',{ timeout: 1000});
                            return false;
                        }
                    }
                    if(f.cellphone!=''){
                        if(f.cellphone.length<11 || f.cellphone.length>11 || f.cellphone[0]!=1 || f.cellphone[1]==2){
                            jBox.tip("请输入正确的手机号码", 'error',{ timeout: 1000,closed: function () {  }});
                            return false;
                        }
                    }
                    jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/'+define_module_name+'/insert_address',
                        data: f,
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.close();
                                jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                    window.location.reload();
                                }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000});
                            }
                        }
                    });
                    return false;
                }
            };

            jBox('post:'+define_app_url+'/'+define_module_name+'/add_address',{
            //    ajaxData: {pid:define_pid,level:obj_level},
                width:450,
                title: '',
                top: '30%',
                draggable: true,
                opacity: 0.01,
                persistent: true,
                showIcon: false,
                showSpeed: 'slow',
            //    bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
                buttons: { '添加': 'ok','取消':'cancel'},
                loaded: function (h) {
                    if($(".xm-sx3").length>=10){
                        jBox.close();
                         jBox.tip("收货地址上限10个", 'error',{ timeout: 1000,closed: function () {  }});
                        return false;
                    }
                },
                submit:add_submit
            });
    });

$(".edit_address").click(function(){
    var id = $(this).attr('edit_id');

    var edit_submit = function (v, h, f) {
        var ics = $("[name=information_city]");
        var iccs = $("[name=information_county]");
                if (v == 'ok') {
                    if(f.consignee=='' || !/[\u4e00-\u9fa5]+/.test(f.consignee) || f.consignee.length<2){
                        jBox.tip('请填写收货人姓名', 'error',{ timeout: 1000});
                        return false;
                    }
                     if(f.where_id=='' || f.where_id==0){
                        jBox.tip('请选择所在城市', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(ics.find('option').size()>0 && ics.val()==0){
                        jBox.tip('请选择所在城市', 'error',{ timeout: 1000});
                        return false;
                    }

                    if(iccs.find('option').size()>0 && iccs.val()==0){
                        jBox.tip('请选择所在城市', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.street==''){
                        jBox.tip('请填写街道地址', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.street==''){
                        jBox.tip('邮编不能为空', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.zip=='' || isNaN(f.zip) || f.zip.length<6){
                        jBox.tip('请输入正确的邮编', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.phone=='' && f.cellphone==''){
                        jBox.tip('电话和手机必须填写一个', 'error',{ timeout: 1000});
                        return false;
                    }
                    if(f.phone!=''){
                        if(isNaN(f.phone) || f.phone.length<7){
                            jBox.tip('请填写正确电话号码', 'error',{ timeout: 1000});
                            return false;
                        }
                    }
                    if(f.cellphone!=''){
                        if(f.cellphone.length<11 || f.cellphone.length>11 || f.cellphone[0]!=1 || f.cellphone[1]==2){
                            jBox.tip("请输入正确的手机号码", 'error',{ timeout: 1000,closed: function () {  }});
                            return false;
                        }
                    }
                    jBox.tip("正在处理...", 'loading');
                    $.ajax({
                        url: define_app_url+'/'+define_module_name+'/update_address',
                        data: f,
                        type:'POST',
                        success: function(data){
                            var msg = JSON.parse(data);
                            if(msg.status==1){
                                jBox.close();
                                jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () {
                                    window.location.reload();
                                }});
                            }else{
                                jBox.tip(msg.info, 'error',{ timeout: 1000});
                            }
                        }
                    });
                    return false;
                }
            };

            jBox('post:'+define_app_url+'/'+define_module_name+'/edit_address',{
                ajaxData: {id:id},
                width:450,
                title: '',
                top: '30%',
                draggable: true,
                opacity: 0.01,
                persistent: true,
                showIcon: false,
                showSpeed: 'slow',
            //    bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
                buttons: { '修改': 'ok','取消':'cancel'},
                loaded: function (h) {
                },
                submit:edit_submit
            });
    });

    $(".delete_address").click(function(){
        var id = $(this).attr('delete_id');
        var deleteid = [];
        deleteid.push(id);
        console.log(deleteid);
        delete_address(deleteid);
    });

    $(".delete_more_address").click(function(){
        var deleteid = [];
        $(".is_checked").each(function(){
            if($(this).attr('checked')=='checked'){
                deleteid.push($(this).val());
            }
        });
        if(deleteid.length>0){
            delete_address(deleteid);
        }else{
            jBox.tip('请选择要删除的信息', 'error',{ timeout: 1000});
        }
    });

    function delete_address(data){
            var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                $.ajax({
                    url: define_app_url+'/'+define_module_name+'/delete_address',
                    data: {deleteid:data},
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location.reload(); }});
                        }else{
                            jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { }});
                        }
                    }
                });
            }
            return true; //close
        };
        jBox.confirm("确认删除这条信息？", "提示", submit,{top: '40%'});
    }

    $(".view_message").click(function(){
        var self = $(this);
        var id = $(this).attr("message_id");
        jBox('post:'+define_app_url+'/'+define_module_name+'/view_message',{
                        ajaxData: {id:id},
                        width:450,
                        title: '',
                        top: '30%',
                        draggable: true,
                        opacity: 0.01,
                        persistent: true,
                        showIcon: false,
                        showSpeed: 'slow',
                    //    bottomText: '带 <span style="color: red;font-weight:bold;">*</span> 为必填',
                        buttons: {'关闭':'cancel'},
                        loaded: function (h) {
                            var n = parseInt($("#is_read").text())-1;
                            if(n>=0){
                                $("#is_read").text(n);
                            }
                            self.parents('tr').find('.xm-xxtt4').css('font-weight','normal');
                            self.parents('tr').find('.msg_img').attr('src',define_current_public_url+'/image/16_b.jpg');
                        }
                    });
    });

    $(".delete_more_message").click(function(){
        var deleteid = [];
        $(".is_checked").each(function(){
            if($(this).attr('checked')=='checked'){
                deleteid.push($(this).val());
            }
        });
        if(deleteid.length>0){
            delete_message(deleteid);
        }else{
             jBox.tip('请选择要删除的信息', 'error',{ timeout: 1000});
        }
        console.log(deleteid);
    });

    function delete_message(data){
            var submit = function (v, h, f) {
            if (v == 'ok'){
                jBox.tip("正在处理...", 'loading');
                $.ajax({
                    url: define_app_url+'/'+define_module_name+'/delete_message',
                    data: {deleteid:data},
                    type:'POST',
                    success: function(data){
                        var msg = JSON.parse(data);
                        if(msg.status==1){
                            jBox.tip(msg.info, 'success',{ timeout: 1000,closed: function () { window.location.reload(); }});
                        }else{
                            jBox.tip(msg.info, 'error',{ timeout: 1000,closed: function () { }});
                        }
                    }
                });
            }
            return true; //close
        };
        jBox.confirm("确认删除这条信息？", "提示", submit,{top: '40%'});
    }

});