<?php if (!defined('THINK_PATH')) exit();?>
<div id="Address-add-edit">
        <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
        <table>
            <caption>修改区域</caption>
            <?php if(($_POST['pid']) != "0"): ?><tr class="table_tr"><th class="table_th table_th_adjust"><span class="table_star">*</span> 所属区域：</th>
                    <td>
                        <select name="pid" class="table_select">
                            <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voc): $mod = ($i % 2 );++$i; if(($_POST['pid']) == $voc["id"]): ?><option value="<?php echo ($voc["id"]); ?>" selected="selected"><?php echo ($voc["name"]); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo ($voc["id"]); ?>"><?php echo ($voc["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr><?php endif; ?>
            <tr class="table_tr"><th class="table_th"><span class="table_star">*</span> 名　　称：</th><td class="table_td"><input type="text" name="name" value="<?php echo ($data["name"]); ?>" maxlength="10" title="限1-10字符 (必填)" /></td></tr>
            <tr class="table_tr"><th class="table_th"><span class="table_star">*</span> 启　　用：</th>
                <td>
                <span class="table_radio">
                    <?php if(($data["publish"]) == "1"): ?><label><input type="radio" checked="checked" name="publish" value="1" />是</label>
                        <label><input type="radio" name="publish" value="0" />否</label>
                        <?php else: ?>
                        <label><input type="radio" name="publish" value="1" />是</label>
                        <label><input type="radio" checked="checked" name="publish" value="0" />否</label><?php endif; ?>
                </span>
                <span class="table_sort_span">
                     <span class="table_sort_title"><span class="table_star">*</span> 排　　序：</span>
                    <input class="table_sort_input" title="值必须在0-255 (必填)" type="text" name="sort" value="<?php echo ($data["sort"]); ?>" maxlength="3" />
                </span>
                </td>
            </tr>
            
            <?php if(($data["id"] < 5) AND ($Think.post.pid == 0) ): ?><tr class="table_tr"><th class="table_th"><span class="table_star"></span> 初始配送地：</th>
                        <td>
                            <span class="table_radio">
                                <?php if(($data["start"]) == "1"): ?><label><input type="radio" checked="checked" name="start" value="1" />是</label>
                                    <label><input type="radio" name="start" value="0" />否</label>
                                <?php else: ?>
                                    <label><input type="radio" name="start" value="1" />是</label>
                                    <label><input type="radio" checked="checked" name="start" value="0" />否</label><?php endif; ?>
                            </span>
                            <span class="table_sort_span" style="font-weight: normal;">
                                 <span class="table_sort_title"><span class="table_star"></span> 每立方米价格：</span>
                                <input class="table_sort_input" type="text" name="average_price" value="<?php echo ($data["average_price"]); ?>" maxlength="10" />
                            </span>
                        </td>
                </tr>
                <tr class="en-show" style="display:none"><th class="table_th"><span class="table_star"></span></th>
                        <td>
                            <?php if(!empty($st["name"])): ?><div>
                                从 <strong><?php echo ($st["name"]); ?></strong> 至 <strong class="en_show"></strong>
                                </div><?php endif; ?>
                        </td>
                    </tr>
                <tr class="table_tr"><th class="table_th"><span class="table_star"></span></th>
                        <td>
                            <span class="table_radio" style="visibility:hidden">
                                 <input class="table_sort_input" type="text" name="initiate_price" value="<?php echo ($data["initiate_price"]); ?>" maxlength="10" />
                            </span>
                            <span class="table_sort_span" style="font-weight: normal;">
                                <span class="table_sort_title"><span class="table_star"></span> 送货上门：</span>
                                <span class="table_radio">
                                    <?php if(($data["dropin"]) == "1"): ?><label><input type="checkbox" checked="checked" name="dropin" value="1" />提供</label>　
                                    <?php else: ?>
                                        <label><input type="checkbox" name="dropin" value="1" />提供</label>　<?php endif; ?>
                                </span>
                            </span>
                        </td>
                    </tr>
                    <tr class="table_tr"><th class="table_th"><span class="table_star"></span></th>
                        <td>
                            <span class="table_sort_span" style="font-weight: normal;">
                                 <span class="table_sort_title"><span class="table_star"></span> 送货上门最低价：</span>
                                <input class="table_sort_input" type="text" value="<?php echo ($data["dropin_lowest_price"]); ?>" name="dropin_lowest_price" value="0.00" maxlength="10" />
                            </span>
                        </td>
                    </tr>
                    <tr class="table_tr"><th class="table_th"><span class="table_star"></span></th>
                        <td>
                            <span class="table_sort_span" style="font-weight: normal;">
                                 <span class="table_sort_title"><span class="table_star"></span> 送货上门每立方价格：</span>
                                <input class="table_sort_input" type="text" value="<?php echo ($data["dropin_average_price"]); ?>" name="dropin_average_price" value="0.00" maxlength="10" />
                            </span>
                        </td>
                    </tr>
            <?php else: ?>
                <?php if(($_POST['pid']) != "0"): ?><tr class="table_tr"><th class="table_th"><span class="table_star"></span> 初始配送地：</th>
                        <td>
                            <span class="table_radio">
                                <?php if(($data["start"]) == "1"): ?><label><input type="radio" checked="checked" name="start" value="1" />是</label>
                                    <label><input type="radio" name="start" value="0" />否</label>
                                <?php else: ?>
                                    <label><input type="radio" name="start" value="1" />是</label>
                                    <label><input type="radio" checked="checked" name="start" value="0" />否</label><?php endif; ?>
                            </span>
                            <span class="table_sort_span" style="font-weight: normal;">
                                 <span class="table_sort_title"><span class="table_star"></span> 每立方米价格：</span>
                                <input class="table_sort_input" type="text" name="average_price" value="<?php echo ($data["average_price"]); ?>" maxlength="10" />
                            </span>
                        </td>
                    </tr>
                <tr class="en-show" style="display:none"><th class="table_th"><span class="table_star"></span></th>
                        <td>
                            <?php if(!empty($st["name"])): ?><div>
                                从 <strong><?php echo ($stt["name"]); ?> <?php echo ($st["name"]); ?></strong> 至 
                                <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voc): $mod = ($i % 2 );++$i; if(($_POST['pid']) == $voc["id"]): echo ($voc["name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
                                <span class="en_show"></span>
                                </div><?php endif; ?>
                        </td>
                    </tr>
                    <tr class="table_tr"><th class="table_th"><span class="table_star"></span></th>
                        <td>
                            <span class="table_radio" style="visibility:hidden">
                                 <input class="table_sort_input" type="text" name="initiate_price" value="<?php echo ($data["initiate_price"]); ?>" maxlength="10" />
                            </span>
                            <span class="table_sort_span" style="font-weight: normal;">
                                <span class="table_sort_title"><span class="table_star"></span> 送货上门：</span>
                                <span class="table_radio">
                                    <?php if(($data["dropin"]) == "1"): ?><label><input type="checkbox" checked="checked" name="dropin" value="1" />提供</label>　
                                    <?php else: ?>
                                        <label><input type="checkbox" name="dropin" value="1" />提供</label>　<?php endif; ?>
                                </span>
                            </span>
                        </td>
                    </tr>
                     <tr class="table_tr"><th class="table_th"><span class="table_star"></span></th>
                        <td>
                            <span class="table_sort_span" style="font-weight: normal;">
                                 <span class="table_sort_title"><span class="table_star"></span> 送货上门最低价：</span>
                                <input class="table_sort_input" type="text" value="<?php echo ($data["dropin_lowest_price"]); ?>" name="dropin_lowest_price" value="0.00" maxlength="10" />
                            </span>
                        </td>
                    </tr>
                    <tr class="table_tr"><th class="table_th"><span class="table_star"></span></th>
                        <td>
                            <span class="table_sort_span" style="font-weight: normal;">
                                 <span class="table_sort_title"><span class="table_star"></span> 送货上门每立方价格：</span>
                                <input class="table_sort_input" type="text" value="<?php echo ($data["dropin_average_price"]); ?>" name="dropin_average_price" value="0.00" maxlength="10" />
                            </span>
                        </td>
                    </tr><?php endif; endif; ?>
            <tr><th class="table_th_top">描　　述：</th><td><textarea class="textarea" name="description" title="限1-255字符 (可为空)"><?php echo ($data["description"]); ?></textarea></td></tr>
        </table>
</div>
<script>
$(function(){
    $("[name=name]").keyup(function(){
        var val = $(this).val();
        if(val!=''){
            $(".en-show").show();
            $(".en_show").text(val);
        }else{
            $(".en-show").hide();
        }
        
    });

    if($("[name=name]").val()!=''){
        $(".en-show").show();
        $(".en_show").text($("[name=name]").val());
    }
});
</script>