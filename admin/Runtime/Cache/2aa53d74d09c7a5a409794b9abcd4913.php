<?php if (!defined('THINK_PATH')) exit();?>
<script>
    $(function(){
        var size = $("#wait-insert-parameter3").find('li').size();
        if(size>0){
            var parameter = $("#wait-insert-parameter3").html();
            $("#append-parameter3").html(parameter);
        }
    });
</script>
<div>
    <div style="text-align: center;margin: 20px auto;">
        <p style="text-align: center;font-weight: bold;font-size: 17px;margin-bottom: 15px;position: relative;">产品详细信息参数<button type="button" id="add-parameter3" style="position: absolute;left: 345px;margin: 0;">添加参数</button></p>
        <ul id="append-parameter3">
            <li>
                参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key3[]" maxlength="10" />　
                参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value3[]" maxlength="100" />　
                <img class="delete_parameter3" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
            </li>
            <li>
                参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key3[]" maxlength="10" />　
                参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value3[]" maxlength="100" />　
                <img class="delete_parameter3" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
            </li>
            <li>
                参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key3[]" maxlength="10" />　
                参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value3[]" maxlength="100" />　
                <img class="delete_parameter3" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
            </li>
        </ul>
    </div>
</div>
<ul id="wait-parameter3" style="display: none;">
    <li>
        参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key3[]" maxlength="10" />　
        参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value3[]" maxlength="100" />　
        <img class="delete_parameter3" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
    </li>
</ul>