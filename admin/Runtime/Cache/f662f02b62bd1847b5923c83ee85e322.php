<?php if (!defined('THINK_PATH')) exit();?>
<div id="User-add-edit">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
    <table>
        <tr>
            <th rowspan="3" style="width: 100px;">
                 <span class="positioning_images">
                     <?php if(empty($data["avatar"])): ?><img class="thumb_image" style="width: 85px;height: 85px;padding: 1px;border: 1px dashed #CCC;margin-left: -1px;" flag="0" src="__PUBLIC__/images/default.jpg">
                         <?php else: ?>
                         <img class="thumb_image" style="width: 85px;height: 85px;padding: 1px;border: 1px dashed #CCC;margin-left: -1px;" src="__PUBLIC__/Content/Avatar/cut_thumb_<?php echo ($data["avatar"]); ?>"><?php endif; ?>
                    <img class="delete_images" src="../Public/images/bullet_cross.png" />
                 </span>
            </th>
            <td colspan="2" style="height: 30px;max-height:30px;font-size: 1.6em;margin-bottom: 1px;">
                <strong>所属分组 <span class="table_star">*</span>：</strong>
                <select name="roleid" style="width: 204px;padding: 1px 1px 1px 0;color: #546C83;">
                    <?php if(is_array($Roleinfo)): $i = 0; $__LIST__ = $Roleinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["id"]) == $data["roleid"]): ?><option value="<?php echo ($vo["id"]); ?>" selected="selected"><?php echo ($vo["name"]); ?></option>
                            <?php else: ?>
                                <option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr style="height: 30px;max-height:30px;">
            <td colspan="2" style="font-size: 1.6em;">
                <strong>用户名称 <span class="table_star">*</span>：</strong>
                <input style="width: 200px;" type="text" name="username" value="<?php echo ($data["username"]); ?>" maxlength="20" title="用户名不能为空 (必填)" />
            </td>
        </tr>
        <tr style="height: 30px;max-height:30px;">
            <td colspan="2" style="font-size: 1.6em;">
                <strong>密　　码 <span class="table_star" style="visibility: hidden;">*</span>：</strong>
                <input style="width: 200px;" type="password" name="password" maxlength="16" title="不填为原密码" />
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="text-align: center;width: 100px;">
                <button style="margin-left: 0;" id="file_upload_button" type="button">上传</button>
                <button id="tailor_image" style="cursor: pointer;" disabled="disabled">裁剪</button>
            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>启　　用 <span class="table_star">*</span>：</strong>
                <select name="status" style="padding: 1px 1px 1px 0;margin-left: 0;">
                    <?php if(($data["status"]) == "1"): ?><option value="1" selected="selected">是</option>
                        <option value="0">否</option>
                        <?php else: ?>
                        <option value="1">是</option>
                        <option value="0" selected="selected">否</option><?php endif; ?>
                </select>
                <!--<span style="float: right;margin-right: -1px;">-->
                    <!--<strong>审　　核 <span class="table_star">*</span>：</strong>-->
                    <!--<select name="audit" style="padding: 1px 1px 1px 0;">-->
                        <!--<?php if(($data["audit"]) == "1"): ?>-->
                            <!--<option value="1" selected="selected">是</option>-->
                            <!--<option value="0">否</option>-->
                            <!--<?php else: ?>-->
                            <!--<option value="1">是</option>-->
                            <!--<option value="0" selected="selected">否</option>-->
                        <!--<?php endif; ?>-->

                    <!--</select>-->
                <!--</span>-->
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="width: 100px;">
                <?php if(($data["Role"]["level"]) == "5"): ?><button style="width: 92px;margin-left: -2px;" type="button" class="send_message" message_type="<?php echo ($instation_message_type["personal"]); ?>" addressee_id="<?php echo ($data["id"]); ?>" messge_title="<?php echo ($data["username"]); ?>">发站内信</button><?php endif; ?>
            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>邮　　箱 <span class="table_star">*</span>：</strong>
                <input style="width: 200px;" type="text" name="email" value="<?php echo ($data["email"]); ?>" maxlength="20" title="邮箱不能为空 (必填)" />
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="width: 100px;">
                <!--<button style="width: 92px;margin-left: -2px;" type="button">权限设置</button>-->
            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>昵　　称 <span class="table_star" style="visibility:hidden;">*</span>：</strong>
                <input style="width: 200px;" type="text" name="nickname" maxlength="20" value="<?php echo ($data["nickname"]); ?>" />
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="width: 100px;">
                <!--<button style="width: 92px;margin-left: -2px;" type="button">交易记录</button>-->
            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>姓　　名 <span class="table_star" style="visibility:hidden;">*</span>：</strong>
                <input style="width: 200px;" type="text" name="truename" maxlength="4" value="<?php echo ($data["truename"]); ?>" />
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="width: 100px;">
            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>Ｑ　　Ｑ <span class="table_star" style="visibility:hidden;">*</span>：</strong>
                <input style="width: 200px;" type="text" name="qq" maxlength="11" value="<?php echo ($data["qq"]); ?>" />
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="width: 100px;">
            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>电　　话 <span class="table_star" style="visibility:hidden;">*</span>：</strong>
                <input style="width: 200px;" type="text" name="phone" maxlength="11" data="<?php echo ($data["location"]); ?>" value="<?php echo ($data["phone"]); ?>" />
                <span style="position: absolute;right: 22px;margin-top: -28px;font-size: 12px;"><?php echo ($data["location"]); ?></span>
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="width: 100px;">
            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>生　　日 <span class="table_star" style="visibility:hidden;">*</span>：</strong>
                <input value="<?php echo ($data["birthday"]); ?>" readonly="readonly" style="width: 202px;" type="text" name="birthday" maxlength="20" class="Wdate" type="text" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd',maxDate:'%y-%M-%d',onpicked:function(){ get_zodiac(this.value) },oncleared:function(){get_zodiac(this.value)}})" />
                <span style="position: absolute;right: 40px;margin-top: -28px;font-size: 12px;"><?php echo ($data["zodiac"]); ?></span>
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="width: 100px;">

            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>注册时间 <span class="table_star" style="visibility:hidden;">*</span>：</strong>
                <input style="width: 202px;" readonly="readonly" type="text" name="regdate" value='<?php echo (date("Y-m-d H:i:s",$data["regdate"])); ?>' maxlength="20" id="d4311" class="Wdate" type="text" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'d4312\')||\'2020-10-01\'}'})" />
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="width: 100px;">

            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>注册ＩＰ <span class="table_star" style="visibility:hidden;">*</span>：</strong>
                <input style="width: 200px;max-width: 200px;" type="text" name="regip" value="<?php echo ($data["regip"]); ?>" maxlength="15" />
                <span style="position: absolute;right: 22px;margin-top: -28px;font-size: 12px;"><?php echo ($data["reg_area"]); ?></span>
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="text-align: center;width: 100px;">

            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>登录时间 <span class="table_star" style="visibility:hidden;">*</span>：</strong>
                <input style="width: 202px;" readonly="readonly" type="text" name="logindate" value='<?php if(!empty($data["logindate"])): echo (date("Y-m-d H:i:s",$data["logindate"])); endif; ?>' maxlength="20" id="d4312" class="Wdate" type="text" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:'#F{$dp.$D(\'d4311\')}',maxDate:'2020-10-01'})" />
            </td>
        </tr>
        <tr style="line-height: 30px;height: 30px;">
            <th style="text-align: center;width: 100px;">

            </th>
            <td colspan="2" style="font-size: 1.6em;">
                <strong>登录ＩＰ <span class="table_star" style="visibility:hidden;">*</span>：</strong>
                <input style="width: 200px;" type="text" name="loginip" value="<?php echo ($data["loginip"]); ?>" maxlength="15" />
                <span style="position: absolute;right: 22px;margin-top: -28px;font-size: 12px;"><?php echo ($data["log_area"]); ?></span>
            </td>
        </tr>
    </table>
</div>
<input type="hidden" name="avatar" value="<?php echo ($data["avatar"]); ?>" />
<script type="text/javascript" src="__PUBLIC__/js/Jcrop/js/jquery.Jcrop.js"></script>
<script src="__PUBLIC__/js/ajaxupload.3.6.js" type="text/javascript"></script>
<script>

    function get_zodiac(date){
        if(date!=''){
            $.ajax({
                url: define_app_url+'/User/get_zodiac',
                data: {date:date},
                type:'POST',
                success: function(data){
                    $("[name=birthday]").next().text(data);
                }
            });
        }else{
            $("[name=birthday]").next().text('');
        }
    }

    $(function(){

        var file_upload_button = $('#file_upload_button'), newinterval;
        var newfileType = "image";
        new AjaxUpload(file_upload_button,{
            action: define_app_url+'/User/uploads',
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

                $("[type=submit]").attr("disabled","disabled");

            },

            onComplete: function(file, response){
                this.enable();
                var msg = JSON.parse(response);
                if(msg.status){

                    $("#newbutton").removeAttr("disabled");
                    $("[type=submit]").removeAttr("disabled");
                    $("[name=avatar]").val(msg.image_name);

                    if(msg.thumb_image_info.width>=200 && msg.thumb_image_info.height>=200){

                        $("#tailor_image").removeAttr("disabled");
                        $("#tailor_image").data("tailor_info",msg);
                        $("#tailor_image").trigger('click');

                    }else if(msg.thumb_image_info.width>=100 && msg.thumb_image_info.height>=100){
                        $("#tailor_image").attr("disabled","disabled");
                        $.ajax({
                            url: define_app_url+'/User/copyOrgImage',
                            data: {imagename:msg.image_name},
                            type:'POST',
                            success: function(datas){
                                var msg = JSON.parse(datas);
                                if(msg.status==1){
                                    $("#tailor_image").text("裁剪");
                                    $(".thumb_image").attr("src",define_public_url+"/Content/tmp/cut_thumb_"+$("[name=avatar]").val());
                                    $(".thumb_image").fadeOut('slow').fadeIn('slow');
                                    $(".thumb_image").attr("flag",1).attr("status",0);
                                    jBox.tip(msg.info, 'success',{timeout: 1000,closed: function () {} });
                                }else{
                                    alert(msg.info);
                                    return false;
                                }
                            }
                        });

                    }else{

                        jBox.tip('上传的图片尺寸太小,请重新上传！', 'error',{ timeout: 1000});
                        return false;

                    }

                }else{

                    jBox.tip(msg.error, 'error',{ timeout: 1000,
                        closed: function () {
                            $("[type=submit]").removeAttr("disabled");
                        }
                    })

                }

            }

        });

    });
</script>