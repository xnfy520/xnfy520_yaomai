<?php if (!defined('THINK_PATH')) exit();?>

<div id="GrouponCategory-add-edit">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
    <table>
        <caption>修改团购分类</caption>
        <tr class="table_tr">
            <th class="table_th"><span class="table_star">*</span> 名　　称：</th>
            <td><input type="text" name="name" maxlength="10" value="<?php echo ($data["name"]); ?>" title="限1-10字符 (必填)" /></td>
        </tr>
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
        <tr><th class="table_th_top">描　　述：</th><td><textarea class="textarea" name="description" title="限1-255字符 (可为空)"><?php echo ($data["description"]); ?></textarea></td></tr>
    </table>
</div>