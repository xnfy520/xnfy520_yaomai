<?php if (!defined('THINK_PATH')) exit();?>
<style>
    input{
        border: 1px solid #ABADB3;
    }
</style>
<div style="text-align: center;margin: 20px auto;">
    <p style="text-align: center;font-weight: bold;font-size: 17px;margin-bottom: 15px;position: relative;">
        <?php switch($_GET['type']): case "groupon": ?>团购详情页-推荐<?php break;?>
            <?php case "member": ?>个人中心页-推荐<?php break;?>
            <?php case "cart": ?>购物车页-推荐<?php break;?>
            <?php default: ?>团购详情页-推荐<?php endswitch;?>
        <button type="button" id="add-commodity" style="position: absolute;left: 370px;margin: 0;">添加商品</button></p>
    <form action="javascript:;" method="post" name="commodity">
        <input type="hidden" name="type" value="<?php echo ($_GET['type']); ?>" />
    <ul id="append-commodity">
        <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volist): $mod = ($i % 2 );++$i;?><li><input type="hidden" name="id[]" value="<?php echo ($volist["id"]); ?>" />
                    商品：<input type="text" style="width: 300px;" name="commodity_name[]" title="<?php echo ($volist["CommodityList"]["name"]); ?>" value="<?php echo ($volist["CommodityList"]["name"]); ?>" />　
                    <input type="hidden" name="commodity_id[]" value="<?php echo ($volist["CommodityList"]["id"]); ?>" />
                    排序：<input type="text" style="width: 50px;text-align: center;" name="commodity_sort[]" value="<?php echo ($volist["sort"]); ?>" maxlength="3" />
                    <img class="delete_commodity" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?>
            <li>
                商品：<input type="text" style="width: 300px;" name="commodity_name[]" />　
                <input type="hidden" name="commodity_id[]" />
                排序：<input type="text" style="width: 50px;text-align: center;" name="commodity_sort[]" value="99" maxlength="3" />
                <img class="delete_commodity" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
            </li>
            <li>
                商品：<input type="text" style="width: 300px;" name="commodity_name[]" />　
                <input type="hidden" name="commodity_id[]" />
                排序：<input type="text" style="width: 50px;text-align: center;" name="commodity_sort[]" value="99" maxlength="3" />
                <img class="delete_commodity" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
            </li>
            <li>
                商品：<input type="text" style="width: 300px;" name="commodity_name[]" />　
                <input type="hidden" name="commodity_id[]" />
                排序：<input type="text" style="width: 50px;text-align: center;" name="commodity_sort[]" value="99" maxlength="3" />
                <img class="delete_commodity" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
            </li><?php endif; ?>

    </ul>
    </form>
</div>
<ul id="wait-commodity" style="display: none;">
    <li>
        商品：<input type="text" style="width: 300px;" name="commodity_name[]" />　
        <input type="hidden" name="commodity_id[]" />
        排序：<input type="text" style="width: 50px;text-align: center;" name="commodity_sort[]" value="99" maxlength="3" />
        <img class="delete_commodity" src="../Public/images/bullet_cross.png" style="cursor: pointer;position: relative;top:3px" />
    </li>
</ul>
<script type="text/javascript" src="__PUBLIC__/js/livequery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jqueryUi/jquery-ui.js"></script>
        <script>
            $(function(){
                $("[name='commodity_name[]']").livequery(function() {
                  //  var cache = {};
                    $("[name='commodity_name[]']").autocomplete({
                        minLength: 1,
                        source: function( request, response ) {
                            var term = request.term;
                            // if ( term in cache ) {
                            //     response( cache[ term ] );
                            //     return;
                            // }
                            $.getJSON( define_app_url+'/System/get_commodity', request, function( data, status, xhr ) {
                            //    cache[ term ] = data;
                                response( data );
                            });
                        },
                        select: function( event, ui ) {
                            $(this).parent("li").find("[name='commodity_id[]']").val(ui.item.product_id);
                            $(this).attr("title",ui.item.label);
                        },
                        close: function(){
                            if($(this).parent("li").find("[name='commodity_id[]']").val()==''){
                                $(this).val('');
                            }
                        }
                    }).data( "autocomplete" )._renderItem = function( ul, item ) {
                        if(item.label.length>24){
                            return $( "<li title='"+item.label+"'>" ).data( "item.autocomplete", item ).append( "<a>" + item.label.substr(0,24)+'...'+"</a>" ).appendTo( ul );
                        }else{
                            return $( "<li title='"+item.label+"'>" ).data( "item.autocomplete", item ).append( "<a>" + item.label+"</a>" ).appendTo( ul);
                        }
                    };
                });
            });
        </script>