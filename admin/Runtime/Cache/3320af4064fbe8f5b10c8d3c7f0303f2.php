<?php if (!defined('THINK_PATH')) exit();?>
<script>
    $(function(){
        var size = $("#wait-insert-parameter2").find('li').size();
        if(size>0){
            var parameter = $("#wait-insert-parameter2").html();
            $("#append-parameter2").html(parameter);
        }
    });
</script>
<div>
    <div style="text-align: center;margin: 20px auto;">
        <p style="text-align: center;font-weight: bold;font-size: 17px;margin-bottom: 15px;position: relative;">产品尺寸参数<button type="button" id="add-parameter2" style="position: absolute;left: 345px;margin: 0;">添加参数</button></p>
        <ul id="append-parameter2">
            <li>
                参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key2[]" maxlength="10" />　
                参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value2[]" maxlength="100" />　
                <img class="delete_parameter2" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
            </li>
            <li>
                参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key2[]" maxlength="10" />　
                参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value2[]" maxlength="100" />　
                <img class="delete_parameter2" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
            </li>
            <li>
                参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key2[]" maxlength="10" />　
                参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value2[]" maxlength="100" />　
                <img class="delete_parameter2" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
            </li>
        </ul>
    </div>
</div>
<ul id="wait-parameter2" style="display: none;">
    <li>
        参数名：<input type="text" style="width: 100px;text-align: center;" name="parameter_key2[]" maxlength="10" />　
        参数值：<input type="text" style="width: 100px;text-align: center;" name="parameter_value2[]" maxlength="100" />　
        <img class="delete_parameter2" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
    </li>
</ul>