<?php if (!defined('THINK_PATH')) exit();?>
<form action="javascript:;" method="post" name="Provinces-del" class="delete">
    <table id="xnfy520-function-index-table">
        <thead>
        <tr>
            <th id="xnfy520-function-index-table-th-name" colspan="3">名称</th>
            <th id="xnfy520-function-index-table-th-enable">开启</th>
            <th id="xnfy520-function-index-table-th-sort">排序</th>
            <th id="xnfy520-function-index-table-th-description">市级列表</th>
            <th class="xnfy520-function-index-table-th-time">创建时间</th>
            <th class="xnfy520-function-index-table-th-time">修改时间</th>
            <th id="xnfy520-function-index-table-th-check-all">
                <input type="button" value="全选" />
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if(empty($list)): ?><tr><td colspan="8" style="height:50px;">暂无数据</td></tr>
            <?php else: ?>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td class="xnfy520-function-index-table-td-name">
                                   <span class="xnfy520-function-index-edit">
                                       <?php if((mb_strlen($vo["name"],'utf-8')) > "20"): ?><span><?php echo (mb_substr($vo["name"],0,20,"utf-8")); ?>...</span>
                                           <?php else: ?>
                                           <span><?php echo ($vo["name"]); ?></span><?php endif; ?>
                                    </span>
                    </td>
                    <td class="xnfy520-function-index-table-td-ini-50">
                        <?php echo (count($vo["sub"])); ?>
                    </td>
                    <td class="xnfy520-function-index-table-td-ini-50">
                        <a href="__APP__/Provinces/city/pid/<?php echo ($vo["id"]); ?>">进入</a>
                    </td>
                    <td class="xnfy520-function-index-table-td-enable">
                        <?php if(($vo["publish"]) == "1"): ?><span class="switchpublish" value="<?php echo ($vo["id"]); ?>" publish="<?php echo ($vo["publish"]); ?>">是</span>
                            <?php else: ?>
                            <span class="switchpublish" value="<?php echo ($vo["id"]); ?>" publish="<?php echo ($vo["publish"]); ?>">否</span><?php endif; ?>
                    </td>
                    <td class="xnfy520-function-index-table-td-sort"><span class="xnfy520-function-index-edit"><?php echo ($vo["sort"]); ?></span></td>
                    <td>

                    </td>
                    <td><?php echo (date("Y-m-d H:i:s",$vo["create_date"])); ?></td>
                    <td><?php if(empty($vo["modify_date"])): ?>-<?php else: echo (date("Y-m-d H:i:s",$vo["modify_date"])); endif; ?></td>
                    <td class="xnfy520-function-index-table-td-checkbox">
                        <input class="xnfy520-function-index-table-check-this" type="checkbox" name="deleteid[]" value="<?php echo ($vo["id"]); ?>" this_pid="<?php echo ($vo["pid"]); ?>" />
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