<?php if (!defined('THINK_PATH')) exit();?>

<div id="CommodityCategory-add-edit">
    <table>
        <caption>添加分类</caption>
        <tr class="table_tr" style="display: none;"><th class="table_th"><span class="table_star">*</span> 名　　称：</th><td class="table_td"><input type="text" name="name" maxlength="10" title="限1-10字符 (必填)" /></td></tr>
        <tr><th class="table_th table_th_adjust"><span class="table_star">*</span> 名　　称：</th>
            <td>
                <select name="function" class="table_select">
                    <?php if(is_array($Commodity_Category)): $i = 0; $__LIST__ = $Commodity_Category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["function"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr class="table_tr"><th class="table_th"><span class="table_star">*</span> 启　　用：</th>
            <td>
                <span class="table_radio">
                    <label><input type="radio" checked="checked" name="publish" value="1" />是</label>
                    <label><input type="radio" name="publish" value="0" />否</label>
                </span>
                <span class="table_sort_span">
                     <span class="table_sort_title"><span class="table_star">*</span> 排　　序：</span>
                    <input class="table_sort_input" title="值必须在0-255 (必填)" type="text" name="sort" value="99" maxlength="3" />
                </span>
            </td>
        </tr>
        <tr>
            <th class="table_th table_th_adjust"><span class="table_star">*</span> 图　　片：</th>
            <td class="table_td">
                <button id="file_upload_button" type="button">上传</button>
                <span class="table_image_tip_size">请上传尺寸为 宽1024px*高165px 的图片</span>
            </td>
        </tr>
        <tr class="thumb_image_tr" style="display: none;"><th class="table_th"></th>
            <td>
                <span class="positioning_image">
                    <img class="thumb_image" src="__PUBLIC__/images/default.jpg">
                    <img class="delete_image" src="../Public/images/bullet_cross.png" />
                    <input type="hidden" name="image" />
                </span>
            </td>
        </tr>
        <tr class="table_tr"><th class="table_th">图片链接：</th><td class="table_td"><input type="text" name="link" title="必须以 http:// 开头 双击可显示 (可为空)" /></td></tr>
        <tr><th class="table_th_top">描　　述：</th><td><textarea class="textarea" name="description" title="限1-255字符 (可为空)"></textarea></td></tr>
    </table>
</div>
<script src="__PUBLIC__/js/ajaxupload.3.6.js" type="text/javascript"></script>
<script>
    $(function(){
        var file_upload_button = $('#file_upload_button');
        var newfileType = "image";
        new AjaxUpload(file_upload_button,{
            action: define_app_url+'/CommodityCategory/uploads',
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

                file_upload_button.parents("tr").next("tr").fadeOut('slow');
                $("[type=submit]").attr("disabled","disabled");

            },

            onComplete: function(file, response){
                this.enable();
                var msg = JSON.parse(response);
                if(msg.status){
                    file_upload_button.parents("tr").next("tr").find("[type=hidden]").val(msg.filename);
                    file_upload_button.parents("tr").next("tr").find(".thumb_image").attr('src', define_public_url+"/Content/tmp/"+msg.thumb_filename);
                    file_upload_button.parents("tr").next("tr").fadeIn('slow');
                    jBox.tip('上传图片成功！', 'success',{ timeout: 1000,closed:function(){
                        $("[type=submit]").removeAttr("disabled");
                    }});
                }else{
                    jBox.tip(msg.error, 'error',{ timeout: 1000,closed:function(){
                        $("[type=submit]").removeAttr("disabled");
                    }});
                }
            }
        });
    });
</script>