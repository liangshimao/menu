<?php
use yii\helpers\Url;
?>
<link href="/css/form.css" rel="stylesheet">
<div style="padding:10px;">
    <table class="table table-bordered table-striped table-hover table-condensed">
        <thead>
        <tr>
            <th>ID</th>
            <th>餐桌号</th>
            <th>菜品名称</th>
            <th>备注</th>
            <th>菜品单价</th>
            <th>数量</th>
            <th>合计费用</th>
        </tr>
        </thead>
        <tbody>
        <?php $k = 0;$sum = 0;foreach ($list as $val):?>
            <tr>
                <td><?php echo ++$k;;?></td>
                <td><?php echo isset($val->order->table_id)?$val->order->table_id:'';?></td>
                <td><?php echo isset($val->food->name)?$val->food->name:'';?></td>
                <td><?php echo $val->remark;?></td>
                <td><?php echo isset($val->food->price)?$val->food->price:'';?></td>
                <td><?php echo $val->count;?></td>
                <td><?php $s = isset($val->food->price)?($val->count * $val->food->price):0; $sum += $s; echo $s;?></td>

            </tr>
        <?php endforeach;?>
        <tr style="text-align: center;">
            <td colspan="6">消费总计:</td>
            <td><?=$sum;?>元</td>
        </tr>
        </tbody>
    </table>
</div>
<div style="padding-right:30px;float:right;">
    <button class="btn btn-success">打印</button>
</div>
