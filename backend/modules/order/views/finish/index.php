<?php
use yii\helpers\Url;
use backend\components\widgets\GoLinkPager;

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
        <th>结算时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php $k=($pages->limit) * ($pages->page);foreach ($info as $val): ?>
        <tr>
            <td><?= ++$k; ?></td>
            <td><?= $val->table_id;?></td>
            <td><?= $val->start_time;?></td>
            <td><?= $val->end_time;?></td>
            <td>
                <a class="btn btn-info button"
                   href="javascript:omnipotent('edit','<?php echo Url::toRoute(['/order/finish/info', 'id' => $val->id]); ?>','查看订单详情', 800, 500,1)"><i
                        class="glyphicon  glyphicon-search"></i> 查看详情</a>
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