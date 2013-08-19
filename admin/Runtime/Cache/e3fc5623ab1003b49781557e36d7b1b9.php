<?php if (!defined('THINK_PATH')) exit();?>
<div id="OtherLinks-add-edit">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
    <table>
        <caption>发货信息</caption>
        <tr><th class="table_th table_th_adjust"><span class="table_star">*</span> 快递公司：</th>
            <td class="table_td">
                <select name="logistics_company_id" class="table_select">
                    <option value="">请选择快递公司</option>
                    <?php if(is_array($lc)): $i = 0; $__LIST__ = $lc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["id"]) == $data["shipments_data"]["logistics_company_id"]): ?><option value="<?php echo ($vo["id"]); ?>" selected="selected"><?php echo ($vo["name"]); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
        </tr>
        <tr class="table_tr">
            <th class="table_th"><span class="table_star">*</span> 快递单号：</th>
            <td><input type="text" name="express_number" maxlength="15" value="<?php echo ($data["shipments_data"]["express_number"]); ?>" /></td>
        </tr>
        <tr><th class="table_th_top">备注信息：</th><td><textarea class="textarea" name="remarks" title="限1-255字符 (可为空)"><?php echo ($data["shipments_data"]["remarks"]); ?></textarea></td></tr>
        <?php if(!empty($data["shipments_data"]["update_date"])): ?><tr><th class="table_th_top">发货时间：</th><td><?php echo (date("Y-m-d H:i:s",$data["shipments_data"]["update_date"])); ?></td></tr><?php endif; ?>
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