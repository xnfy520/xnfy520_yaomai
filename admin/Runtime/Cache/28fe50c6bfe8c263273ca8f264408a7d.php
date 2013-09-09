<?php if (!defined('THINK_PATH')) exit();?>
<div id="OtherLinks-add-edit">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
    <table>
        <caption>修改订单价格</caption>
        <tr class="table_tr">
            <th class="table_th"><span class="table_star">*</span> 价　　格：</th>
            <td><input type="text" style="width:100px" name="new_price" maxlength="10" value="<?php echo ($data["new_price"]); ?>" /></td>
        </tr>
        <tr class="table_tr">
            <th class="table_th"><span class="table_star"></span> 改价记录：</th>
            <td>
                <?php if(empty($data["new_price_change_record"])): ?>无记录
                <?php else: ?>
                    <ul style="height:100px;overflow-y: scroll;width: 300px;margin-top:3px">
                        <?php if(is_array($data["new_price_change_record"])): $i = 0; $__LIST__ = $data["new_price_change_record"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dd): $mod = ($i % 2 );++$i;?><li><?php echo (date("Y-m-d H:i:s",$dd["update_date"])); ?>　修改价格为　&#165;<?php echo ($dd["price"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul><?php endif; ?>

            </td>
        </tr>
    </table>
</div>

<style>


/****添加 修改相关********/
#OtherLinks-add-edit{
    background:white;
    padding:  0 10px 5px 10px;
    color: #546C83;
}

#OtherLinks-add-edit table caption{
    font-size:20px;
    font-weight:bold;
    height:30px;
    margin:0 auto;
    line-height:30px;
    text-align:center;
}

#OtherLinks-add-edit table .table_tr{
    height: 25px;
    line-height:25px;
}

#OtherLinks-add-edit table .table_th{
    height: 25px;
    line-height:25px;
    text-align: right;
    display: inline-block;
    width: 100px;
    font-size: 1.6em;
}

#OtherLinks-add-edit table{
    margin-top: 5px;
}

#OtherLinks-add-edit .table_td{
    width: 300px;
    max-width: 300px;
    min-width: 300px;
}

#OtherLinks-add-edit{

}

#OtherLinks-add-edit table .table_th_top{
    height: 25px;
    line-height:25px;
    text-align: right;
    display: inline-block;
    width: 100px;
    font-size: 1.6em;
    vertical-align: top;
}

#OtherLinks-add-edit table .table_star{
    color: red;
}

#OtherLinks-add-edit table input[type=text]{
    width: 300px;
    color:#546C83;
}

#OtherLinks-add-edit table .table_radio{
    position: relative;
    top: 3px;
}

#OtherLinks-add-edit table .table_sort_title{
    font-size: 1.6em;
    font-weight: bold;
    position: relative;
    top:2px;
}

#OtherLinks-add-edit table .table_sort_input{
    text-align: center;
    position: relative;
    width: 50px;
    max-width: 50px;;
}

#OtherLinks-add-edit table .table_sort_span{
    float: right;
}

#OtherLinks-add-edit table .table_select{
    padding:2px 2px 2px 0;
    width: 304px;
    color:#546C83;
}

#OtherLinks-add-edit table .table_radio label{
    cursor:pointer;
}

#OtherLinks-add-edit table .textarea{
    resize: none;
    width: 298px;
    height: 100px;
    margin-top: 3px;
    color:#546C83;
}

</style>