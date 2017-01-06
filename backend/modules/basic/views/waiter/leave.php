<?php
use yii\helpers\Url;
use backend\components\widgets\GoLinkPager;

?>
<link href="/css/form.css" rel="stylesheet">

<div class="search-nav">
    <form class="form-inline" action="<?= Url::toRoute('/basic/waiter/leave') ?>" method="get">
        <div class="form-group input-group-sm">
            <label for="txtName">姓名：</label>
            <input class="form-control ipt" id="txtName" placeholder="姓名" name="name" value="<?= empty($name) ? '' : $name ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-default" id="btnSearch" type="submit"><i class="glyphicon glyphicon-search"></i> 查询</button>
        </div>
    </form>
</div>

<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>性别</th>
        <th>手机号</th>
        <th>家庭住址</th>
        <th>入职时间</th>
        <th>离职时间</th>
        <th>给付薪水</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php $k=($pages->limit) * ($pages->page);foreach ($info as $val): ?>
        <tr>
            <td><?= ++$k; ?></td>
            <td><?= $val->name; ?></td>
            <td><?= $val->sex == 0?'男':'女'; ?></td>
            <td><?= $val->mobile; ?></td>
            <td><?= $val->address; ?></td>
            <td><?= $val->add_time; ?></td>
            <td><?= $val->leave_time;?></td>
            <td><?= $val->salary; ?></td>
            <td>
                <a class="btn btn-danger button"
                   href="javascript:confirmurl('<?= Url::toRoute(['/basic/waiter/resume', 'id' => $val->id]); ?>', '确定要将<?=$val->name?>恢复在职吗?')"><i
                        class="glyphicon glyphicon-arrow-left"></i> 恢复在职</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo GoLinkPager::widget(['pagination' => $pages,'go' => false]);?>
</div>