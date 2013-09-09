<?php if (!defined('THINK_PATH')) exit();?>
<div id="OtherLinks-add-edit">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
    <table>
        <caption>订单备注</caption>
        <tr><th class="table_th_top"><span class="table_star">*</span>备注信息：</th><td><textarea class="textarea" name="remark" title="限1-255字符 (可为空)"><?php echo ($data["remark"]); ?></textarea></td></tr>
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