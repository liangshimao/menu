<?php
use yii\helpers\Url;
use backend\components\widgets\GoLinkPager;
use common\models\order\OrderDetail;
?>
<link href="/css/form.css" rel="stylesheet">

<div class="search-nav">
    <form class="form-inline" action="<?= Url::toRoute('/order/eating/index') ?>" method="get">
        <div class="form-group input-group-sm">
            <label for="txtName">桌号：</label>
            <input class="form-control ipt" id="txtName" placeholder="桌号" name="tableId" value="<?= empty($tableId) ? '' : $tableId ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-default" id="btnSearch" type="submit"><i class="glyphicon glyphicon-search"></i> 查询</button>
            <button class="btn btn-default" id="btnSearch" type="button" onclick="add()"><i class="glyphicon glyphicon-plus-sign"></i> 新增</button>
        </div>
    </form>
</div>

<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
    <tr>
        <th>ID</th>
        <th>桌号</th>
        <th>添加时间</th>
        <th>费用总计</th>
        <th>是否打印</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php $k=($pages->limit) * ($pages->page);foreach ($info as $val): ?>
        <tr>
            <td><?= ++$k; ?></td>
            <td><?= $val->table_id;?></td>
            <td><?= $val->start_time;?></td>
            <td><?= OrderDetail::getSum($val->id).'元';?></td>
            <td><?= $val->print==0?'未打印':'已打印'?></td>
            <td>
                <a class="btn btn-info button"
                   href="javascript:window.parent.edit(1,'修改订单信息','<?php echo Url::toRoute(['/order/eating/edit', 'id' => $val->id]); ?>', 800, 600)"><i
                        class="glyphicon glyphicon-edit"></i> 修改</a>
                <a class="btn btn-info button"
                   href="javascript:omnipotent('edit','<?php echo Url::toRoute(['/order/eating/info', 'id' => $val->id]); ?>','查看订单详情', 800, 500,1)"><i
                        class="glyphicon  glyphicon-search"></i> 查看</a>
                <a class="btn btn-info button"
                   href="javascript:confirmurl('<?= Url::toRoute(['/order/eating/account', 'id' => $val->id]); ?>', '确定要结算此订单吗?')"><i
                        class="glyphicon glyphicon-usd"></i> 结算</a>
                <a class="btn btn-danger button"
                   href="javascript:confirmurl('<?= Url::toRoute(['/order/eating/delete', 'id' => $val->id]); ?>', '确定要作废此订单吗?')"><i
                        class="glyphicon glyphicon-trash"></i> 作废</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo GoLinkPager::widget(['pagination' => $pages,'go' => false]);?>
</div>

<script type="text/javascript">
    /**
     * 添加用户
     */
    function add()
    {
        omnipotent('edit','<?=Url::toRoute('/order/eating/add')?>', '添加新订单', 800, 600, 0);
    }

</script>