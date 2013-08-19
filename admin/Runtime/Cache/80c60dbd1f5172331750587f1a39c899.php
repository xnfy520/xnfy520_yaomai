<?php if (!defined('THINK_PATH')) exit();?>
 <form action="javascript:;" method="post" name="OrderList-del" class="delete">
            <table id="xnfy520-function-index-table">
                <thead>
                <tr>
                    <th class="xnfy520-function-index-table-th-100">订单号</th>
                    <th class="xnfy520-function-index-table-th-100">用户</th>
                    <th class="xnfy520-function-index-table-th-150">订单总金额</th>
                    <th class="xnfy520-function-index-table-th-50">订单状态</th>
                    <th class="xnfy520-function-index-table-th-150">下单时间</th>
                    <th class="xnfy520-function-index-table-th-50">操作</th>
                    <th class="xnfy520-function-index-table-th-50">详单</th>
                    <th id="xnfy520-function-index-table-th-check-all" style="display: none;">
                        <input type="button" value="全选" />
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($list)): ?><tr><td colspan="8" style="height:50px;">暂无数据</td></tr>
                <?php else: ?>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="znxx">
                            <td><?php echo ($vo["out_trade_no"]); ?></td>
                            <td><?php echo ($vo["username"]); ?></td>
                            <td style="text-indent:10px;<?php if(($_GET['type']) == "4"): ?>text-align:center;<?php else: ?>text-align:left;<?php endif; ?>">
                                <span style="min-width:80px;display:inline-block">&#165;<?php echo ($vo["total_fee"]); ?></span>
                                <?php if(($_GET['type']) != "4"): ?>(
                                物流:<?php echo ($vo["other_data"]["logistics"]); ?>
                                <?php if(!empty($vo["other_data"]["coupon"])): ?>优惠:-<?php echo ($vo["other_data"]["coupon"]); endif; ?>
                                )<?php endif; ?>
                            </td>
                            <td>
                                <?php if(($_GET['type']) == "4"): if(($vo["abolish"]) == "1"): ?><span style="font-weight:bold;color:blue">已取消预订</span>
                                    <?php else: ?>
                                        <?php if(($vo["pay_type"]) == "0"): ?>未付款
                                        <?php else: ?>
                                            已付款<?php endif; endif; ?>
                                <?php else: ?>
                                    <?php if(($vo["pay_type"]) == "0"): if(($vo["other_data"]["payment_model"]) != "1"): ?><span by="<?php echo ($vo["id"]); ?>" is_payment="<?php echo ($vo["pay_type"]); ?>" class="manual_payment" style="color:red;font-weight:bold">未付款</span>
                                        <?php else: ?>
                                            未付款<?php endif; ?>
                                    <?php else: ?>
                                        <?php if(($vo["other_data"]["payment_model"]) != "1"): ?><span by="<?php echo ($vo["id"]); ?>" is_payment="<?php echo ($vo["pay_type"]); ?>" class="manual_payment" style="color:blue;font-weight:bold">已付款</span>
                                        <?php else: ?>
                                            已付款<?php endif; endif; endif; ?>
                            </td>
                            <td><?php echo (date("Y-m-d H:i:s",$vo["create_date"])); ?></td>
                            <td>
                               <?php if(($_GET['type']) == "4"): if(($vo["abolish"]) == "1"): if(($vo["abolish_dispose"]) == "1"): ?><span by="<?php echo ($vo["id"]); ?>" type="abolish_dispose" value="<?php echo ($vo["abolish_dispose"]); ?>" class="abolish_dispose" style="color:blue;font-weight:bold;cursor:pointer">已处理</span>
                                        <?php else: ?>
                                            <span by="<?php echo ($vo["id"]); ?>" type="abolish_dispose" value="<?php echo ($vo["abolish_dispose"]); ?>" class="abolish_dispose" style="color:red;font-weight:bold;cursor:pointer">处理</span><?php endif; ?>
                                        <span style="display: none;" data_on="确认已经处理？" data_off="确认设为未处理？"></span>
                                    <?php else: ?>
                                        -<?php endif; ?> 
                               <?php else: ?>
                                    <?php if(($vo["pay_type"]) == "0"): ?>-
                                    <?php else: ?>
                                        <?php if(empty($vo["shipments_data"])): ?><span class="send_out" by="<?php echo ($vo["id"]); ?>" style="color:red;font-weight:bold;cursor:pointer">发货</span>
                                        <?php else: ?>
                                            <span class="send_out" by="<?php echo ($vo["id"]); ?>" style="color:blue;font-weight:bold;cursor:pointer">发货信息</span><?php endif; endif; endif; ?>
                            </td>
                            <td><div style="color:#ec651a;cursor:pointer"  class="znxx03" status="1" >展开</div></td>
                            <td class="xnfy520-function-index-table-td-checkbox" style="display: none;">
                                <input class="xnfy520-function-index-table-check-this" type="checkbox" name="deleteid[]" value="<?php echo ($vo["id"]); ?>" />
                            </td>
                        </tr>
                        <tr class="znxx01" style="display: none;border: none;">
                            <td colspan="8" style="padding:1px; border:none;" class="none-background-color">
                                <table width="100%" cellpadding="0" cellspacing="0" class="tab0001">
                                    <?php if(($_GET['type']) == "4"): ?><tr style="line-height: 0;">
                                            <td colspan="7" style="padding-top:0; border:none">
                                                <div class="znxx_m" style="width:100%; padding:0;">
                                                    <table  width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;border:none">
                                                        <tr style="border:none;">
                                                            <td width="100" align="center" style="border: none;">
                                                                <img src="__PUBLIC__/Content/VoteCommodity/thumb_<?php echo ($vo["commodity_data"]["image"]); ?>" style="width:55px; height:30px; padding:3px; border:1px solid #ddd;position: relative;top: 4px;" />
                                                            </td>
                                                            <td colspan="5" style="color:#ec651a;border: none;text-align: left;">
                                                                <?php echo ($vo["commodity_data"]["name"]); ?>
                                                            </td>
                                                            <td colspan="1" style="border: none;" width="100" align="center">订金：&#165; <?php echo ($vo["commodity_data"]["subscription"]); ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php if(is_array($vo["commodity_data"])): $i = 0; $__LIST__ = $vo["commodity_data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_mo_ci): $mod = ($i % 2 );++$i;?><tr style="line-height: 0;">
                                                <td colspan="7" style="padding-top:0; border:none">
                                                    <div class="znxx_m" style="width:100%; padding:0;">
                                                        <table  width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;border:none">
                                                            <tr style="border:none;">
                                                                <td width="100" align="center" style="border: none;">
                                                                    <img src="__PUBLIC__/Content/<?php echo ($vo_mo_ci["CIDir"]); ?>/thumb_<?php echo ($vo_mo_ci["Commodity"]["image"]); ?>" style="width:55px; height:30px; padding:3px; border:1px solid #ddd;position: relative;top: 4px;" />
                                                                </td>
                                                                <td style="color:#ec651a;border: none;text-align: left;">
                                                                    <?php echo ($vo_mo_ci["Commodity"]["name"]); ?>
                                                                </td>
                                                                <td style="border: none;" width="100" align="center">单价：&#165; <?php echo ($vo_mo_ci["Commodity"]["price"]); ?></td>
                                                                <td style="border: none;" width="100" align="center">数量： <?php echo ($vo_mo_ci["quantity"]); ?></td>
                                                                <td style="border: none;" width="150" align="center">小计：&#165; <?php echo ($vo_mo_ci["xiaoji"]); ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>

                                    <tr>
                                        <td colspan="7" style="border: none;text-align:left;text-indent:20px">
                                            支付信息：
                                            <strong>支付方式</strong>：
                                            <?php if(($_GET['type']) == "4"): ?>在线支付　
                                                <strong>支付平台</strong>：
                                                <?php switch($vo["pay_type"]): case "1": ?>支付宝 ( 支付帐号 <?php echo (($vo["alipay_data"]["buyer_email"])?($vo["alipay_data"]["buyer_email"]):"-"); ?> )　
                                                    <strong>支付时间</strong>: <?php echo (date("Y-m-d H:i:s",$vo["alipay_data"]["pay_date"])); break;?>
                                                    <?php case "2": ?>网上银行<?php break; endswitch;?>　
                                                <?php if(!empty($vo["abolish_date"])): ?><span style="color:blue">取消预订时间:<?php echo (date("Y-m-d H:i:s",$vo["abolish_date"])); ?></span><?php endif; ?>
                                            <?php else: ?>
                                                <?php switch($vo["other_data"]["payment_model"]): case "3": ?><span title="快递可付现金、刷卡">货到付款</span><?php break;?>
                                                    <?php case "2": ?><span title="通过银行转账或现金直接存入指定帐号，需注明订单号">银行电汇</span><?php break;?>
                                                    <?php case "1": ?><span title="通过网上银行或支付平台在线付款">在线支付</span><?php break; endswitch;?>　
                                                <?php if(($vo["other_data"]["payment_model"]) == "1"): ?><strong>支付平台</strong>：
                                                    <?php switch($vo["other_data"]["payment"]): case "1": ?>支付宝 ( 支付帐号 <?php echo (($vo["alipay_data"]["buyer_email"])?($vo["alipay_data"]["buyer_email"]):"-"); ?> )　
                                                        <strong>支付时间</strong>: <?php echo (date("Y-m-d H:i:s",$vo["alipay_data"]["pay_date"])); break;?>
                                                        <?php case "2": ?>网上银行<?php break; endswitch; endif; ?>　<?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php if(($_GET['type']) != "4"): ?><tr>
                                            <td colspan="7" style="border: none;text-align:left;text-indent:20px">
                                                收货人信息：
                                                <strong>姓名</strong>：<?php echo ($vo["address"]["consignee"]); ?>　
                                                <strong>地址</strong>：<?php echo ($vo["address"]["where_text"]); ?>　<?php echo ($vo["address"]["street"]); ?>　
                                                <strong>邮编</strong>：<?php echo ($vo["address"]["zip"]); ?>　
                                                <?php if(!empty($vo["address"]["cellphone"])): ?><strong>手机</strong>：<?php echo ($vo["address"]["cellphone"]); ?>　<?php endif; ?>
                                                <?php if(!empty($vo["address"]["phone"])): ?><strong>电话</strong>：<?php echo ($vo["address"]["phone"]); endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" style="border: none;text-align:left;text-indent:20px">
                                                订单备注：
                                                <strong>配送方式</strong>：
                                                <?php switch($vo["other_data"]["delivery"]): case "1": ?><span title="用户到相应提货点自提安装">提货点自提 ( 运费 <?php echo ($vo["other_data"]["logistics"]); ?> )</span><?php break;?>
                                                    <?php case "2": ?><span title="非电梯楼上楼费用由用户另付">送货上门安装 ( 运费 <?php echo ($vo["other_data"]["logistics"]); ?> + 服务费 <?php echo ($vo["other_data"]["delivery_price"]); ?> )</span><?php break; endswitch;?>　
                                                <?php if(!empty($vo["other_data"]["ask_for_date"])): ?><strong>要求到货时间</strong>：<?php echo ($vo["other_data"]["ask_for_date"]); endif; ?>　
                                                <strong>发票信息</strong>：
                                                类型/<?php echo ($vo["other_data"]["invoice_type"]); ?>　抬头/<?php echo ($vo["other_data"]["invoice_rise"]); ?>　<?php echo ($vo["other_data"]["invoice_info"]); ?>
                                            </td>
                                        </tr><?php endif; ?>
                                </table>
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
                </div><?php endif; ?>
        </form>
        <style>
            .none-background-color:hover{
                background: white;
            }

        </style>
        <script>
            $(function(){
                $(".znxx03").live('click',function(){
                    $(".znxx01").hide();

                    if($(this).text()=="展开"){
                        $(".znxx03").text("展开");
                        $(this).parents(".znxx").next(".znxx01").show();
                        $(this).html("关闭");
                    }else{
                        $(this).parents(".znxx").next(".znxx01").hide();
                        $(this).html("展开");
                    }

                })
            })
        </script>