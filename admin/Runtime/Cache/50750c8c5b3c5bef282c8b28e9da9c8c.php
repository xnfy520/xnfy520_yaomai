<?php if (!defined('THINK_PATH')) exit();?>
<form action="javascript:;" method="post" name="GrouponCommodity-del" class="delete">
            <table id="xnfy520-function-index-table">
                <thead>
                <tr>
                    <th class="xnfy520-function-index-table-th-50">#</th>
                    <th id="xnfy520-function-index-table-th-name">商品名称</th>
                    <th class="xnfy520-function-index-table-th-50">上架</th>
                    <th class="xnfy520-function-index-table-th-50">推荐</th>
                    <th class="xnfy520-function-index-table-th-50">排序</th>
                    <th class="xnfy520-function-index-table-th-50">浏览</th>
                    <th class="xnfy520-function-index-table-th-50">原价</th>
                    <th class="xnfy520-function-index-table-th-50">现价</th>
                    <th class="xnfy520-function-index-table-th-time">创建时间</th>
                    <th id="xnfy520-function-index-table-th-check-all">
                        <input type="button" value="全选" />
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($list)): ?><tr><td colspan="11" style="height:50px;">暂无数据</td></tr>
                    <?php else: ?>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td>
                               <span><?php echo ($vo["id"]); ?></span>
                            </td>
                            <td class="xnfy520-function-index-table-td-name">
                                   <span class="xnfy520-function-index-edit">
                                       <?php if((mb_strlen($vo["name"],'utf-8')) > "15"): ?><span title="<?php echo ($vo["name"]); ?>"><?php echo (mb_substr($vo["name"],0,15,"utf-8")); ?>...</span>
                                           <?php else: ?>
                                           <span><?php echo ($vo["name"]); ?></span><?php endif; ?>
                                    </span>
                            </td>
                            <td class="xnfy520-function-index-table-td-hover">
                                <?php if(($vo["enable"]) == "1"): ?><span class="switch_status" by="<?php echo ($vo["id"]); ?>" type="enable" value="<?php echo ($vo["enable"]); ?>">是</span>
                                    <?php else: ?>
                                    <span class="switch_status" by="<?php echo ($vo["id"]); ?>" type="enable" value="<?php echo ($vo["enable"]); ?>">否</span><?php endif; ?>
                                <span style="display: none;" data_on="确认下架此商品？" data_off="确认上架此商品？"></span>
                            </td>
                            <td class="xnfy520-function-index-table-td-hover">
                                <?php if(($vo["recommend"]) == "1"): ?><span class="switch_status" by="<?php echo ($vo["id"]); ?>" type="recommend" value="<?php echo ($vo["recommend"]); ?>">是</span>
                                    <?php else: ?>
                                    <span class="switch_status" by="<?php echo ($vo["id"]); ?>" type="recommend" value="<?php echo ($vo["recommend"]); ?>">否</span><?php endif; ?>
                                <span style="display: none;" data_on="确认取消推荐此商品？" data_off="确认推荐此商品？"></span>
                            </td>
                            <td>
                                <?php echo ($vo["sort"]); ?>
                            </td>
                            <td>
                                <?php echo ($vo["views"]); ?>
                            </td>
                            <td>
                                &#165; <?php echo ($vo["org_price"]); ?>
                            </td>
                            <td>
                                &#165; <?php echo ($vo["price"]); ?>
                            </td>
                            <td><?php echo (date("Y-m-d H:i:s",$vo["create_date"])); ?></td>
                            <td class="xnfy520-function-index-table-td-checkbox">
                                <input class="xnfy520-function-index-table-check-this" type="checkbox" pid="<?php echo ($vo["pid"]); ?>" cid="<?php echo ($vo["cid"]); ?>" name="deleteid[]" value="<?php echo ($vo["id"]); ?>" />
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </tbody>
            </table>
            <?php if(!empty($list)): ?><div style="border:1px solid #ccc;height: 37px;line-height: 37px;">
                    <?php echo ($fpage); ?>
                    <span style="float: right;"><input type="submit" value="删除" /></span>
                </div><?php endif; ?>
        </form>