<?php if (!defined('THINK_PATH')) exit();?>
<form action="javascript:;" method="post" name="HelpCenterInformation-del" class="delete">
    <table id="xnfy520-function-index-table">
        <thead>
        <tr>
            <th>名称</th>
            <th class="xnfy520-function-index-table-th-50">开启</th>
            <th class="xnfy520-function-index-table-th-50">排序</th>
            <th class="xnfy520-function-index-table-th-50">浏览</th>
            <th class="xnfy520-function-index-table-th-150">创建时间</th>
            <th id="xnfy520-function-index-table-th-check-all">
                <input type="button" value="全选" />
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if(empty($list)): ?><tr><td colspan="7" style="height:50px;">暂无数据</td></tr>
            <?php else: ?>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td class="xnfy520-function-index-table-td-name" style="width: auto;">
                                   <span class="xnfy520-function-index-edit">
                                       <?php if((mb_strlen($vo["name"],'utf-8')) > "25"): ?><span title="<?php echo ($vo["name"]); ?>"><?php echo (mb_substr($vo["name"],0,25,"utf-8")); ?>...</span>
                                           <?php else: ?>
                                           <span><?php echo ($vo["name"]); ?></span><?php endif; ?>
                                    </span>
                    </td>
                    <td class="xnfy520-function-index-table-td-sort">
                        <?php if(($vo["publish"]) == "1"): ?><span class="switch_status" by="<?php echo ($vo["id"]); ?>" type="publish" value="<?php echo ($vo["publish"]); ?>">是</span>
                            <?php else: ?>
                            <span class="switch_status" by="<?php echo ($vo["id"]); ?>" type="publish" value="<?php echo ($vo["publish"]); ?>">否</span><?php endif; ?>
                        <span style="display: none;" data_on="确认关闭？" data_off="确认启用？"></span>
                    </td>
                    <td class="xnfy520-function-index-table-td-sort"><span class="xnfy520-function-index-edit"><?php echo ($vo["sort"]); ?></span></td>
                    <td>
                        <?php echo ($vo["views"]); ?>
                    </td>
                    <td>
                        <?php echo (date("Y-m-d H:i:s",$vo["create_date"])); ?>
                    </td>
                    <td class="xnfy520-function-index-table-td-checkbox">
                        <input class="xnfy520-function-index-table-check-this" type="checkbox" name="deleteid[]" value="<?php echo ($vo["id"]); ?>" />
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </tbody>
    </table>
    <?php if(!empty($list)): ?><div style="border:1px solid #ccc;height: 37px;">

            <div class="emit-fanye-box">
                <div class="emit-fanye-text">
                    <?php echo ($fpage); ?>
                </div>
            </div>

            <span style="float: right;"><input type="submit" value="删除" /></span>

        </div><?php endif; ?>
</form>